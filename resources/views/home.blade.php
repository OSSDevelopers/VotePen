@extends('layouts.guest')


@section('content')
	<router-view></router-view>
@endsection


@section('head')
	<title>{{ config('app.name') }}</title>
	<meta property="og:type" content="article" />
	<meta property="og:title" content="{{ config('app.name') }}" />
	<meta property="og:url" content="{{ config('app.url') }}" />
	<meta property="og:site_name" content="{{ config('app.name') }}" />

	<meta name="twitter:card" content="summary" />
	<meta name="twitter:site" content="{{ config('app.twitter_username') }}" />
	<meta name="twitter:title" content="{{ config('app.name') }}" />

	<meta name="description" content="{{ config('app.description') }}"/>
	<meta property="og:description" content="{{ config('app.description') }}" />
	<meta name="twitter:description" content="{{ config('app.description') }}" />
	<meta property="og:image" content="{{ config('app.cdn_url') }}/imgs/{{ config('app.logo') }}">
	<meta name="twitter:image" content="{{ config('app.cdn_url') }}/imgs/{{ config('app.logo') }}" />

	<script type="application/ld+json">
	 {
		 "@context": "http://schema.org",
		 "@type": "WebSite",
		 "url": "https://votepen.com",
		 "name": "VotePen",
			"publisher": {
			 "@type": "Organization",
		  "logo": {
			  "@type": "ImageObject",
				 "url": "https://votepen.com/imgs/v-logo.png",
				 "name": "VotePen",
				 "height": "457",
				 "width": "457"
				}
			},
		 "sameAs": [
			 "https://www.facebook.com/VotePen/",
			 "https://twitter.com/VotePen"
		 ],
		 "potentialAction": {
			"@type": "SearchAction",
			"target": "https://votepen.com/?search={search_term_string}",
			"query-input": "required name=search_term_string"
		 }
	 }
	 </script>

	<script type="application/ld+json">
	{
	  "@context":"http://schema.org",
	  "@type":"ItemList",
	  "itemListElement":[
		{
		  "@type":"SiteNavigationElement",
		  "position":1,
		  "name": "Hot",
		  "url":"https://votepen.com/?sort=hot"
		},
		{
		  "@type":"SiteNavigationElement",
		  "position":2,
		  "name": "New",
		  "url":"https://votepen.com/?sort=new"
		},
		{
		  "@type":"SiteNavigationElement",
		  "position":3,
		  "name": "Rising",
		  "url":"https://votepen.com/?sort=rising"
		},
		{
		  "@type":"SiteNavigationElement",
		  "position":4,
		  "name": "#technology",
		  "url":"https://votepen.com/c/technology"
		},
		{
		  "@type":"SiteNavigationElement",
		  "position":5,
		  "name": "#news",
		  "url":"https://votepen.com/c/news"
		},
		{
		  "@type":"SiteNavigationElement",
		  "position":6,
		  "name": "#funny",
		  "url":"https://votepen.com/c/funny"
		},
		{
		  "@type":"SiteNavigationElement",
		  "position":7,
		  "name": "#politics",
		  "url":"https://votepen.com/c/politics"
		}
	  ]
	}
	</script>
@endsection



@section('script')
	@if (isset($submissions))
		<script>
			var preload = {
				submissions: {!! $submissions->toJson() !!}
			};
		</script>
	@endif
@endsection
