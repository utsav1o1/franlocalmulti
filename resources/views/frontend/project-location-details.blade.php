@extends('layouts.app')

@section('title', 'Project Location Detail')
@section('meta_keywords', env('APP_NAME'))
@section('meta_description', env('APP_NAME'))

@section('dynamicdata')
    <!--Start of About Us Section-->
    <div class="aboutus-wrap">
        <div class="container">
            <div class="row">
            	<div class="project-detail-container custom-top-spacing">
            		<div class="col-md-12">
                        <div class="project-heading"><span class="title">{{ $projectLocation->name }} -  Master Plan</span></div>
            		</div>
                    <div class="master-plan-container row">
                        <div class="col-md-7">
                            <div class="master-plan-image-container">
                                <img class="img-responsive" src="{{ asset($projectLocation->getMainImagePath() ) }}"/>
                            </div>
                        </div>
            			<div class="master-plan-description col-md-5">
            				<p>{!! $projectLocation->description !!}</p>
            			</div>
            		</div>
            		<div class="release-plan-navigation col-md-12">
            			<a href="{{ route('projects.show-projects', ['projectType' => $projectType, 'projectLocation' => $projectLocation->slug]) }}" class="btn btn-default"><span>Go to Release Plan</span></a>
            		</div>
            	</div>
            </div>
        </div>
    </div>

@stop