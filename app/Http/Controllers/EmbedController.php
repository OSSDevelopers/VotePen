<?php

namespace App\Http\Controllers;

use Embed\Embed;
use App\PhotoTools;
use Illuminate\Http\Request;

class EmbedController extends Controller
{
    use PhotoTools;

    /**
     * fetches and returens the title for the external URL
     *
     * [@return](https://votepen.com/@return) string
     */
    public function title(Request $request)
    {
    	$this->validate($request, [
            'url' => 'required|url',
        ]);

    	try {
            $info = Embed::create($request->url);
        } catch (\Exception $exception)
        {
            return response("Invalid URL", 500);
        }

        return $info->title;
    }


    /**
     * returns all the neccassery data for saving a link submission
     *
     * [@return](https://votepen.com/@return) json
     */
    public function link(Request $request)
    {
    	$this->validate($request, [
            'url' => 'required|url',
        ]);

        try {
            $info = Embed::create($request->url);
        } catch (\Exception $exception)
        {
            return response("Invalid URL", 500);
        }

        return collect([
            "url" => $request->url,
            "title" => $info->title,
            "description" => $info->description,
            "type" => $info->type,
            "embed" => $info->code,
            "image" => $info->image ?? null,
            "providerName" => $info->providerName,
            "publishedTime" => $info->publishedTime,
            "domain" => $this->domain($request->url),
        ]);
    }


    /**
     * [@param](https://votepen.com/@param)  Request instance
     * [@return](https://votepen.com/@return) json data
     */
    protected function linkSubmission(Request $request)
    {
        $this->validate($request, [
            'url' => 'required|url',
        ]);

        try {
        	$info = Embed::create($request->url);
        } catch (\Exception $e) {
        	return response("couldn't go through with it", 500);
        }

        // thumbnail of the url
        if ($info->image) {
            try {
                $img = $this->downloadImg($info->image);
                $thumbnail = $this->createThumbnail($img, 1200, null, "submissions/link/thumbs");
            } catch (\Exception $exception) {
                app('sentry')->captureException($exception);

                $img = null;
                $thumbnail = null;
            }
        } else {
            $img = null;
            $thumbnail = null;
        }

        return collect([
            "url" => $request->url,
            "title" => $info->title,
            "description" => $info->description,
            "type" => $info->type,
            "embed" => $info->code,
            "img" => $img,
            "thumbnail" => $thumbnail,
            "providerName" => $info->providerName,
            "publishedTime" => $info->publishedTime,
            "domain" => $this->domain($request->url),
        ]);
    }


    /**
     * the domain of the URL
     *
     * [@return](https://votepen.com/@return) string
     */
    protected function domain($url)
    {
    	return str_ireplace('www.', '', parse_url($url, PHP_URL_HOST));
    }
}