@extends('layouts.guest')


@section('head')
	<title>#{{ $channel->name }} - {{ config('app.name') }}</title>
	<meta property="og:type" content="article" />
	<meta property="og:title" content="#{{ $channel->name }} - {{ config('app.name') }}" />
	<meta property="og:url" content="{{ config('app.url') }}/c/{{ $channel->name }}" />
	<meta property="og:site_name" content="{{ config('app.name') }}" />

	<meta name="twitter:card" content="summary" />
	<meta name="twitter:site" content="{{ config('app.twitter_username') }}" />
	<meta name="twitter:title" content="#{{ $channel->name }} - {{ config('app.name') }}" />

	<meta name="description" content="{{ $channel->description }}"/>
	<meta property="og:description" content="{{ $channel->description }}" />
	<meta name="twitter:description" content="{{ $channel->description }}" />
	<meta property="og:image" content="{{ $channel->avatar }}" />
	<meta name="twitter:image" content="{{ $channel->avatar }}" />
@stop


@section('content')
	<router-view></router-view>
@endsection


@section('script')
	<script>
		var preload = {
			channel: {!! json_encode($channel->resolve()) !!},
			submissions: {!! $submissions->toJson() !!}
		};
	</script>
@endsection