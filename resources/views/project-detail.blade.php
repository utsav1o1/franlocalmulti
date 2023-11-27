@extends('layouts.app')

@section('title', 'Project Detail')
@section('meta_keywords', env('APP_NAME'))
@section('meta_description', env('APP_NAME'))

@section('dynamicdata')
    <!--Start of About Us Section-->
    <div class="aboutus-wrap">
        <div class="container">
            <div class="row">
            	<div class="project-detail-container custom-top-spacing">
            		<div class="col-md-12">
                        <div class="project-heading"><span class="title">{{ $project->project_name }} -  Master Plan</span></div>
            		</div>
                    <div class="master-plan-container row">
                        <div class="col-md-7">
                            <div class="master-plan-image-container">
                                <img class="img-responsive" src="{{ asset($project->getMasterPlanImageFullPath() ) }}"/>
                            </div>
                        </div>
            			<div class="master-plan-description col-md-5">
            				<p>{!! $project->description !!}</p>
            			</div>
            		</div>
            		<div class="release-plan-navigation col-md-12">
            			<a href="{{ route('projects.show-properties', ['project' => $project->slug]) }}" class="btn btn-default"><span>Go to Release Plan</span></a>
            		</div>
            	</div>
            </div>
        </div>
    </div>

@stop