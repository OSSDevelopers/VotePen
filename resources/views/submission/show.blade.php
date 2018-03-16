@extends('layouts.guest')


@section('head')
	<title>{{ $submission->title }} - {{ config('app.name') }}</title>
	<meta property="og:type" content="article" />
	<meta property="og:title" content="{{ $submission->title }} - {{ config('app.name') }}" />
	<meta property="og:url" content="{{ config('app.url') }}/c/{{ $submission->channel_name }}/{{ $submission->slug }}" />
	<meta property="og:site_name" content="{{ config('app.name') }}" />

	<meta name="twitter:card" content="summary" />
	<meta name="twitter:site" content="{{ config('app.twitter_username') }}" />
	<meta name="twitter:title" content="{{ $submission->title }} - {{ config('app.name') }}" />

	@if ($submission->type == "text")
		<meta name="description" content="{{ $submission->data['text'] }}"/>
		<meta property="og:description" content="{{ $submission->data['text'] }}" />
		<meta name="twitter:description" content="{{ $submission->data['text'] }}" />
		<meta property="og:image" content="{{ config('app.cdn_url') }}/imgs/v-logo.png">
		<meta name="twitter:image" content="{{ config('app.cdn_url') }}/imgs/v-logo.png" />
	@else
		<meta property="og:image" content="{{ $submission->data['thumbnail'] ?? $submission->data['path'] ?? '{{ config('app.cdn_url') }}/imgs/v-logo.png' }}" />
		<meta name="twitter:image" content="{{ $submission->data['thumbnail'] ?? $submission->data['path'] ?? '{{ config('app.cdn_url') }}/imgs/v-logo.png' }}" />
	@endif
@stop


@section('content')
	<router-view></router-view>
@endsection


@section('script')
	<script>
		var preload = {
			submission: {!! json_encode($submission->resolve()) !!}, 
			channel: {!! json_encode($channel->resolve()) !!}
		};
	</script>
@endsection