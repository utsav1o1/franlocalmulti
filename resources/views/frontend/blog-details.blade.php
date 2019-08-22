@extends('layouts.app')

@section('title', 'Project Locations')
@section('meta_keywords', env('APP_NAME'))
@section('meta_description', env('APP_NAME'))

@section('header_css')


@stop

@section('dynamicdata')


<div class="about-us-page shared-page-top-padding">

	<div class="blog-details-container">
		<div class="container main">
			<div class="page-sub-heading">
				<div class="title">{{ $blog->title }}</div>

				<div class="blog-attributes-details">
					<span class="creator">Posted by: {{ $blog->creator }}</span>, <span class="blog-date">{{ $blog->getCreatedDate() }}</span>
				</div>
			</div>

			<div class="blog-details-description">
				{{ $blog->description }}
			</div>

			<div class="blog-content">
				{!! $blog->content !!}
			</div>
		</div>
		<div class="overlay"></div>
	</div>

</div>

@stop
