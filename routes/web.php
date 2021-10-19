<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
 */

// test route
// Route::get('/test-home', function () {
//     return view('frontend.home');
// });
// Route::get('/property-management', function () {
//     return view('agent.Property.property-management');
// });
Route::get('/guide', function () {
    return view('agent.Property.guide');
});
// Route::get('/selling', function () {
//     return view('agent.Property.selling');
// });

Route::get('/', 'HomeController@index')->name('home');
Route::get('/send', 'HomeController@send')->name('send');
Route::get('properties/search', 'PropertyController@search')->name('properties.search');
Route::get('properties', 'PropertyController@index')->name('properties.index');
Route::get('properties/{slug}', 'PropertyController@show')->name('properties.show');
Route::post('properties/{slug}', 'PropertyController@submitContact')->name('properties.submit.contact');
Route::get('properties/{slug}/print', 'PropertyController@printProperty')->name('properties.print');

Route::get('project-locations/{projectType}', 'ProjectLocationController@showProjectLocations')->name('project-locations.show-project-locations');
Route::get('project-location-details/{projectType}/{projectLocation}', 'ProjectLocationController@showProjectLocationDetails')->name('project-locations.detail');
Route::get('projects/{projectType}/{projectLocation}', 'ProjectController@showProjects')->name('projects.show-projects');
Route::get('project-properties/{project}', 'ProjectController@showProjectProperties')->name('projects.show-properties');

Route::get('buy/{category?}', 'PropertyController@buy')->name('properties.buy');
Route::get('rent/{category?}', 'PropertyController@rent')->name('properties.rent');
Route::get('leased-properties', 'PropertyController@leasedProperties')->name('properties.leased');

Route::get('aboutus', 'PageController@aboutus')->name('page.aboutus');
Route::get('blogs', 'PageController@blogs')->name('page.blogs');
Route::get('property-management', 'PageController@propertymanagement')->name('page.propertymanagement');
Route::get('selling', 'PageController@selling')->name('page.selling');
Route::get('page/{slug}', 'PageController@show')->name('page.show');

Route::get('blog/{slug}', 'PageController@showBlog')->name('page.blog');

Route::get('agents', 'AgentController@index')->name('agents.index');
Route::get('agents/{id}', 'AgentController@show')->name('agents.show');
Route::post('agents/{id}', 'AgentController@submitContact')->name('agents.submit.contact');

Route::get('login/{provider}', 'SocialController@redirectToProvider')->name('social.login');
Route::get('login/{provider}/callback', 'SocialController@handleProviderCallback');
Route::get('logout', 'HomeController@logout')->name('logout');

Route::middleware('auth:user')->post('property/save', 'PropertyController@save')->name('property.save');

Route::post('subscriber', 'SubscriberController@store')->name('subscriber.store');

Route::get('/application/tenancy-application-form/', 'ApplicationFormController@showForm')->name('showApplicationForm');
Route::post('/application/tenancy-application-form/', 'ApplicationFormController@submitApplication')->name('submitApplicationForm');

Route::prefix('admin')->namespace('Admin')->group(function () {
    Route::get('login', ['as' => 'admin.login', 'uses' => 'LoginController@login']);
    Route::post('login', ['as' => 'admin.authenticate', 'uses' => 'LoginController@authenticate']);
});

/* contact us routes */

Route::get('contact-us', 'ContactUsController@showContactUsForm')->name('contact-us.form');
Route::post('send-enquiry', 'ContactUsController@sendEnquiry')->name('enquiry.send');
Route::get('location-list-for-enquiry-form', 'ContactUsController@getLocationListForEnquiryForm')->name('enquiry.location-list');

// property evaluation and appraisal
Route::post('property-evaluation/enquiry', 'ContactUsController@propertyEvaludation')->name('propertyevaluation');
Route::get('property-evaluation/enquiry/success', 'ContactUsController@propertyEvaludationSuccess')->name('propertyevaluationsuccess');
Route::post('property-appraisal/enquiry', 'ContactUsController@propertyAppraisal')->name('propertyappraisal');
Route::get('property-appraisal/enquiry/success', 'ContactUsController@propertyAppraisalSuccess')->name('propertyappraisalsuccess');
// download guide
Route::post('selling-download-guide', 'DownloadGuideController@sellingdownloadguide')->name('sellingdownloadguide');
Route::post('buying-download-guide', 'DownloadGuideController@buyingdownloadguide')->name('buyingdownloadguide');
Route::get('download-guide/success', 'DownloadGuideController@downloadguidesuccess')->name('downloadguidesuccess');

/* for maintenance request routes */

Route::get('maintenance-request', 'MaintenanceRequestController@showMaintenanceRequestForm')->name('maintenance-request.form');
Route::post('send-maintenance-request', 'MaintenanceRequestController@sendMaintenanceRequest')->name('maintenance-request.send');

/* for vacate notice routes */

Route::get('vacate-notice', 'VacateNoticeController@showVacateNoticeForm')->name('vacate-notice.form');
Route::post('send-vacate-notice', 'VacateNoticeController@sendVacateNotice')->name('vacate-notice.send');

/* sell routes */

Route::get('property-estimate', 'SellController@showPropertyEstimationForm')->name('sell-form');
Route::post('send-property-estimation', 'SellController@sendPropertyEstimation')->name('property-estimation.send');

Route::get('get-recently-sold-properties', 'SellController@showRecentlySoldProperties')->name('properties.recently-sold');
Route::get('get-recently-leased-properties', 'SellController@showRecentlyLeasedProperties')->name('properties.recently-leased');

Route::get('application/privacy-policy', 'ApplicationFormController@privacyPolicy');

/* admin routes */

Route::prefix('admin')->middleware('auth:admin')->namespace('Admin')->group(function () {
    Route::get('logout', ['as' => 'admin.logout', 'uses' => 'LoginController@logout']);
    Route::get('change/password', ['as' => 'admin.change.password', 'uses' => 'ResetPasswordController@getChangePassword']);
    Route::post('change/password', ['as' => 'change.password', 'uses' => 'ResetPasswordController@changePassword']);
    Route::get('dashboard', ['as' => 'admin.dashboard', 'uses' => 'DashboardController@index']);
    Route::resource('log', 'LogController', ['only' => ['index', 'show']]);

    Route::resource('banner', 'BannerController');
    Route::put('banner/change/status', ['as' => 'banner.change.status', 'uses' => 'BannerController@changeStatus']);

    Route::get('subscriber', 'SubscriberController@index')->name('admin.subscriber.index');
    Route::get('user', 'UserController@index')->name('admin.user.index');

    Route::resource('page', 'PageController', ['names' => [
        'index' => 'admin.page.index',
        'create' => 'admin.page.create',
        'store' => 'admin.page.store',
        'show' => 'admin.page.show',
        'edit' => 'admin.page.edit',
        'update' => 'admin.page.update',
        'destroy' => 'admin.page.destroy',
    ]]);
    Route::put('page/change/status', ['as' => 'page.change.status', 'uses' => 'PageController@changeStatus']);

    Route::resource('property-type', 'PropertyTypeController', ['names' => [
        'index' => 'admin.property-type.index',
        'create' => 'admin.property-type.create',
        'store' => 'admin.property-type.store',
        'show' => 'admin.property-type.show',
        'edit' => 'admin.property-type.edit',
        'update' => 'admin.property-type.update',
        'destroy' => 'admin.property-type.destroy',
    ]]);
    Route::post('property-type/sort/order', 'PropertyTypeController@sortOrder')->name('admin.property-type.sort.order');

    Route::resource('property-category', 'PropertyCategoryController', ['names' => [
        'index' => 'admin.property-category.index',
        'create' => 'admin.property-category.create',
        'store' => 'admin.property-category.store',
        'show' => 'admin.property-category.show',
        'edit' => 'admin.property-category.edit',
        'update' => 'admin.property-category.update',
        'destroy' => 'admin.property-category.destroy',
    ]]);

    Route::group(['prefix' => 'project'], function () {
        Route::get('list', 'ProjectController@showProjects')
            ->name('admin.project.list');

        Route::get('add-interface', 'ProjectController@showProjectAddInterface')
            ->name('admin.project.add-interface');

        Route::post('add', 'ProjectController@addProject')
            ->name('admin.project.add');

        Route::get('edit/{id}', 'ProjectController@showProjectEditInterface')
            ->name('admin.project.edit-interface');

        Route::put('update/{id}', 'ProjectController@updateProject')
            ->name('admin.project.update');

        Route::get('project-location-list', 'ProjectController@getProjectLocationListForProjectForm')
            ->name('admin.project.project-location-list');

        Route::get('project-type-list', 'ProjectController@getProjectTypeListForProjectForm')
            ->name('admin.project.project-type-list');

        Route::delete('delete/{id}', 'ProjectController@deleteProject')
            ->name('admin.project.delete');
    });

    Route::group(['prefix' => 'project-type'], function () {
        Route::get('list', 'ProjectTypeController@showProjectTypes')
            ->name('admin.project-type.list');

        Route::get('add-interface', 'ProjectTypeController@showProjectTypeAddInterface')
            ->name('admin.project-type.add-interface');

        Route::post('add', 'ProjectTypeController@addProjectType')
            ->name('admin.project-type.add');

        Route::get('edit/{id}', 'ProjectTypeController@showProjectTypeEditInterface')
            ->name('admin.project-type.edit-interface');

        Route::put('update/{id}', 'ProjectTypeController@updateProjectType')
            ->name('admin.project-type.update');

        Route::delete('delete/{id}', 'ProjectTypeController@deleteProjectType')
            ->name('admin.project-type.delete');
    });

    Route::group(['prefix' => 'project-location'], function () {
        Route::get('list', 'ProjectLocationController@showProjectLocations')
            ->name('admin.project-location.list');

        Route::get('add-interface', 'ProjectLocationController@showProjectLocationAddInterface')
            ->name('admin.project-location.add-interface');

        Route::post('add', 'ProjectLocationController@addProjectLocation')
            ->name('admin.project-location.add');

        Route::get('edit/{id}', 'ProjectLocationController@showProjectLocationEditInterface')
            ->name('admin.project-location.edit-interface');

        Route::put('update/{id}', 'ProjectLocationController@updateProjectLocation')
            ->name('admin.project-location.update');

        Route::delete('delete/{id}', 'ProjectLocationController@deleteProjectLocation')
            ->name('admin.project-location.delete');

        Route::get('location-list', 'ProjectLocationController@getLocationListForProjectLocationForm')
            ->name('admin.project-location.location-list');
    });

    Route::post('property-category/sort/order', 'PropertyCategoryController@sortOrder')->name('admin.property-category.sort.order');

    Route::resource('location', 'LocationController', ['names' => [
        'index' => 'admin.location.index',
        'create' => 'admin.location.create',
        'store' => 'admin.location.store',
        'show' => 'admin.location.show',
        'edit' => 'admin.location.edit',
        'update' => 'admin.location.update',
        'destroy' => 'admin.location.destroy',
    ]]);

    Route::resource('agent', 'AgentController', ['names' => [
        'index' => 'admin.agent.index',
        'create' => 'admin.agent.create',
        'store' => 'admin.agent.store',
        'show' => 'admin.agent.show',
        'edit' => 'admin.agent.edit',
        'update' => 'admin.agent.update',
        'destroy' => 'admin.agent.destroy',
    ]]);
    Route::post('agent/sort/order', 'AgentController@sortOrder')->name('admin.agent.sort.order');

    Route::get('property', 'PropertyController@index')->name('admin.property.index');
    Route::get('property/{property}', 'PropertyController@show')->name('admin.property.show');
    Route::put('property/change/status', 'PropertyController@changeStatus')->name('admin.property.change.status');
});

//Agent panel routes

Route::prefix('agent')->namespace('Agent')->group(function () {
    Route::get('login', ['as' => 'agent.login', 'uses' => 'LoginController@login']);
    Route::post('login', ['as' => 'agent.authenticate', 'uses' => 'LoginController@authenticate']);

    Route::get('forgot/password', ['as' => 'agent.forgot.password.create', 'uses' => 'ForgotPasswordController@create']);
    Route::post('forgot/password', ['as' => 'agent.forgot.password.store', 'uses' => 'ForgotPasswordController@store']);
    Route::get('forgot/password/{token}/edit', ['as' => 'agent.forgot.password.edit', 'uses' => 'ForgotPasswordController@getReset']);
    Route::put('forgot/password/{token}', ['as' => 'agent.forgot.password.update', 'uses' => 'ForgotPasswordController@update']);
});

Route::prefix('agent')->middleware('auth:agent')->namespace('Agent')->group(function () {
    Route::get('dashboard', ['as' => 'agent.dashboard', 'uses' => 'DashboardController@index']);
    Route::get('logout', ['as' => 'agent.logout', 'uses' => 'LoginController@logout']);
    Route::get('change/password', ['as' => 'agent.change.password', 'uses' => 'ResetPasswordController@getChangePassword']);
    Route::post('change/password', ['as' => 'agent.change.password.submit', 'uses' => 'ResetPasswordController@changePassword']);

    Route::resource('property', 'PropertyController', ['names' => [
        'index' => 'agent.property.index',
        'create' => 'agent.property.create',
        'store' => 'agent.property.store',
        'show' => 'agent.property.show',
        'edit' => 'agent.property.edit',
        'update' => 'agent.property.update',
        'destroy' => 'agent.property.destroy',
    ]]);
    Route::get('property/{property}/inquiries', 'PropertyInquiryController@index')->name('agent.properties.inquiries');
    Route::get('inquiry/{inquiry}', 'PropertyInquiryController@show')->name('agent.inquiry.show');

    Route::resource('property.image', 'ImageController',
        [
            'names' => [
                'index' => 'agent.property.image.index',
                'create' => 'agent.property.image.create',
                'store' => 'agent.property.image.store',
                'destroy' => 'agent.property.image.destroy',
            ],
        ]);
    Route::put('property/{property}/image/{image}/makecover', 'ImageController@makeCover');

    Route::get('message', 'MessageController@index')->name('agent.message.index');
    Route::get('message/{message}', 'MessageController@show')->name('agent.message.show');
});

// instagram
Route::get('instagram-get-auth', 'InstgramAuthController@show')->middleware('auth');
