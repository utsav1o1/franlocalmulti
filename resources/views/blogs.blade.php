@extends('layouts.app')

@section('title', 'Blogs')
@section('meta_keywords', env('APP_NAME'))
@section('meta_description', env('APP_NAME'))

@section('dynamicdata')
<div class="blog blog__page">
    <div class="container">
        <div class="row">
            @if($blogs->count()>0)
            @foreach($blogs as $blog)

            <div class="col-lg-4">
                <div class="blog__block">
                    <div class="blog-link">
                        <div class=" blog-link-image-container">
                            <a href="{{ route('page.blog', ['slug' => $blog->slug]) }}">
                                <img src="{{ url($blog->getBlogImagePath()) }}" />
                            </a>
                        </div>
                        <div class=" blog-short-details-container">
                            <div class="blog-link-heading">
                                <a href="{{ route('page.blog', ['slug' => $blog->slug]) }}">{{ $blog->title }}</a>
                            </div>
                            <div class="blog-short-descriptions">{{ str_limit($blog->description, 120) }}</div>
                            <div class="row blog-other-attributes">

                                <div class="col-md-6 posted-date-container">
                                    <i class="fa fa-calendar"></i> <span class="posted-date">{{
                                        $blog->getCreatedDate() }}</span>
                                </div>
                                <div class="col-md-6 posted-by-container">
                                    <a href="{{ route('page.blog', ['slug' => $blog->slug]) }}">Read more <i
                                            class="fa fa-arrow-right"></i></a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach
            @endif
        </div>
        {!! $blogs->links() !!}
    </div>
</div>
@stop