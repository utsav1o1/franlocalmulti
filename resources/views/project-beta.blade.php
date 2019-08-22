@extends('layouts.app')

@section('title', 'Projects')
@section('meta_keywords', env('APP_NAME'))
@section('meta_description', env('APP_NAME'))

@section('dynamicdata')
    <!--Start of About Us Section-->
    <div class="aboutus-wrap">
        <div class="container">
			<div class="main-title">
				<h1 style="color:#f26522;"><b>Projects</b></h1>
			</div>
            <div class="row">
				@foreach($projects as $project)

					<div class="col-md-4 col-sm-12">
						<div class="project-container">
							<a href="{{ route('projects.show-properties', ['project' => $project->slug]) }}">
								<img class="img-responsive" src="{{ asset($project->getProjectImagePath()) }}"/>
								<div class="left-overlay"></div>
								<div class="right-overlay"></div>
								<div class="project-name-container">
									<span>{{ $project->project_name }}</span>
								</div>
							</a>
						</div>
					</div>

				@endforeach
            </div>
        </div>
    </div>

@stop