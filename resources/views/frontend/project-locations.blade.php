@extends('layouts.app')

@section('title', 'Project Locations')
@section('meta_keywords', env('APP_NAME'))
@section('meta_description', env('APP_NAME'))

@section('dynamicdata')
    <!--Start of About Us Section-->
    <div class="aboutus-wrap">
        <div class="container project-location-list">
			<div class="main-title">
				<h1 style="color:#f26522;"><b>Project Locations</b></h1>
			</div>
            <div class="row">
				@foreach($projectLocations as $projectLocation)

					<div class="col-md-4 col-sm-12">
						<div class="project-location-container">
							<a href="{{ route('project-locations.detail', ['projectType' => $projectType, 'projectLocation' => $projectLocation->slug]) }}">
								<img class="img-responsive" src="{{ asset($projectLocation->getMainImagePath()) }}"/>
								<div class="left-overlay"></div>
								<div class="right-overlay"></div>
								<div class="project-location-name-container">
									<span>{{ $projectLocation->project_location_name }}</span>
								</div>
							</a>
						</div>
					</div>

				@endforeach
            </div>
        </div>
    </div>

@stop