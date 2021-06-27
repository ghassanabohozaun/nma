<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
////////////////////////////////////////////////////////////////////////
/// auth  => that mean : must be admin and login
///

Route::group([
    'namespace' => 'Admin',
    'middleware' => ['auth:admin', 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {
    //////////////////////////////////////////////////////////////////
    /// not found page
    Route::get('/notFound', 'DashboardController@notFound')->name('admin.not.found');
    //////////////////////////////////////////////////////////////////
    /// dashboard
    Route::get('/', 'DashboardController@index')->name('admin.dashboard');
    Route::get('/dashboard', 'DashboardController@index')->name('admin.dashboard');
    //////////////////////////////////////////////////////////////////
    /// settings
    Route::get('settings', 'DashboardController@getSettings')->name('get.admin.settings');
    Route::post('settings', 'DashboardController@storeSettings')->name('store.admin.settings');

    //////////////////////////////////////////////////////////////////
    /// admin routes
    Route::get('/admin', 'AdminsController@index')->name('get.admin');
    Route::get('/get-admin-by-id', 'AdminsController@getAdminById')->name('get.admin.by.id');
    Route::post('/admin-update', 'AdminsController@adminUpdate')->name('admin.update');

    //////////////////////////////////////////////////////////////////
    /// website Main Page Routes
    Route::get('/website-main-page', 'DashboardController@websiteMainPage')->name('website.main.page');
    Route::post('/website-main-page', 'DashboardController@storeWebsiteMainPage')->name('store.website.main.page');

    //////////////////////////////////////////////////////////////////
    /// users Routes

    Route::group(['prefix' => 'users'], function () {
        Route::get('/', 'UserController@index')->name('users');
        Route::get('/get-users', 'UserController@getUsers')->name('get.users');
        Route::post('/destroy', 'UserController@destroy')->name('user.destroy');
        Route::post('/change-status', 'UserController@changeStatus')->name('user.change.status');
        Route::get('/create', 'UserController@create')->name('user.create');
        Route::post('store', 'UserController@store')->name('user.store');
        Route::get('/edit/{id?}', 'UserController@edit')->name('user.edit');
        Route::post('update', 'UserController@update')->name('user.update');

    });


    ///////////////////////////////////////////////////////////////////
    /// about site routes
    Route::group(['prefix' => 'about-site'], function () {

        Route::get('/whom', 'AboutSiteController@whom')->name('admin.about.site.whom');
        Route::post('/store-whom', 'AboutSiteController@storeWhom')->name('admin.about.site.whom.store');
        Route::get('/contact-us', 'AboutSiteController@contactUs')->name('admin.about.site.contact.us');
        Route::post('/store-contact-us', 'AboutSiteController@storeContactUs')->name('admin.about.site.contact.us.store');
        Route::post('/store-brochure', 'AboutSiteController@storeBrochure')->name('admin.about.site.brochure.store');
        Route::get('/download-brochure/{path?}', 'AboutSiteController@downloadBrochure')->name('admin.about.site.brochure.download');
        Route::get('/why-choose-us', 'AboutSiteController@whyChooseUs')
            ->name('admin.about.site.why.choose.us');
        Route::post('/why-choose-us', 'AboutSiteController@storeWhyChooseUs')
            ->name('admin.about.site.why.choose.us.store');

        Route::get('/who-are-we', 'AboutSiteController@whoAreWe')->name('admin.about.site.who.are.we');
        Route::post('/who-are-we', 'AboutSiteController@storeWhoAreWe')
            ->name('admin.about.site.who.are.we.store');
    });


    //////////////////////////////////////////////////////////////////
    /// Communication Requests
    Route::group(['prefix' => 'communication-requests'], function () {
        Route::get('/', 'CommunicationController@index')->name('admin.communication.requests');
        Route::get('/get-communication-request', 'CommunicationController@getCommunicationRequest')->name('get.admin.communication.requests');
        Route::get('/create', 'CommunicationController@create')->name('admin.communication.requests.create');
        Route::post('/store', 'CommunicationController@store')->name('admin.communication.requests.store');
        Route::post('/destroy', 'CommunicationController@destroy')->name('admin.communication.requests.destroy');
        Route::post('/update-status', 'CommunicationController@updateStatus')->name('admin.communication.requests.update.status');
        Route::post('/send-message', 'CommunicationController@sendMessage')->name('admin.communication.requests.send.message');

    });


    ///////////////////////////////////////////////////////////////////
    /// offers routes
    Route::group(['prefix' => 'offers'], function () {
        Route::get('/', 'OffersController@index')->name('admin.offers');
        Route::get('/get-offers', 'OffersController@getOffers')->name('get.admin.offers');
        Route::get('/create', 'OffersController@create')->name('admin.offers.create');
        Route::post('/store', 'OffersController@store')->name('admin.offer.store');
        Route::get('/edit/{id?}', 'OffersController@edit')->name('admin.offer.edit');
        Route::post('/update', 'OffersController@update')->name('admin.offer.update');
        Route::post('/destroy', 'OffersController@destroy')->name('admin.offer.destroy');
        Route::post('/change-status', 'OffersController@ChangeStatus')->name('admin.offer.change.status');
    });


    ///////////////////////////////////////////////////////////////////
    /// client opinion routes
    Route::group(['prefix' => 'client-opinion'], function () {
        Route::get('/', 'ClientOpinionController@index')->name('admin.clients.opinions');
        Route::get('/get-clients-opinions', 'ClientOpinionController@getClientsOpinions')
            ->name('get.admin.Clients.Opinions');
        Route::get('/create', 'ClientOpinionController@create')->name('admin.clients.opinions.create');
        Route::post('/store', 'ClientOpinionController@store')->name('admin.clients.opinions.store');
        Route::get('/edit/{id?}', 'ClientOpinionController@edit')->name('admin.clients.opinions.edit');
        Route::post('/update', 'ClientOpinionController@update')->name('admin.clients.opinions.update');
        Route::post('/destroy', 'ClientOpinionController@destroy')->name('admin.clients.opinions.destroy');
        Route::post('/change-status', 'ClientOpinionController@changeStatus')->name('admin.clients.opinions.change.status');
    });


    ///////////////////////////////////////////////////////////////////
    /// Comments routes
    Route::group(['prefix' => 'comments'], function () {
        Route::get('/{id?}', 'CommentsController@index')->name('admin.comments');
        Route::get('/get-comments/{id?}', 'CommentsController@getComments')->name('get.admin.comments');
        Route::post('/destroy', 'CommentsController@destroy')->name('admin.comments.destroy');
        Route::get('/{id?}/create', 'CommentsController@create')->name('admin.comments.create');
        Route::post('/store', 'CommentsController@store')->name('admin.comments.store');

    });


    /////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /// Medias
    Route::group(['prefix' => 'medias'], function () {
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////
        /// Sliders routes
        Route::group(['prefix' => 'sliders'], function () {
            Route::get('/', 'SlidersController@index')->name('admin.sliders');
            Route::get('/get-sliders', 'SlidersController@getSliders')->name('get.admin.sliders');
            Route::get('/create', 'SlidersController@create')->name('admin.sliders.create');
            Route::post('/store', 'SlidersController@store')->name('admin.slider.store');
            Route::post('/destroy', 'SlidersController@destroy')->name('admin.slider.destroy');
            Route::get('/edit/{id?}', 'SlidersController@edit')->name('admin.slider.edit');
            Route::post('/update', 'SlidersController@update')->name('admin.slider.update');
            Route::post('/change-status', 'SlidersController@changeStatus')->name('admin.slider.change.status');

        });
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////
        /// Videos routes
        Route::group(['prefix' => 'videos'], function () {
            Route::get('/', 'VideosController@index')->name('admin.videos');
            Route::get('/get-videos', 'VideosController@getVideos')->name('get.admin.videos');
            Route::get('/create', 'VideosController@create')->name('admin.videos.create');
            Route::post('/store', 'VideosController@store')->name('admin.videos.store');
            Route::post('/destroy', 'VideosController@destroy')->name('admin.video.destroy');
            Route::get('edit/{id?}', 'VideosController@edit')->name('admin.video.edit');
            Route::post('update', 'VideosController@update')->name('admin.video.update');
            Route::get('/view', 'VideosController@viewVideo')->name('admin.video.view');
            Route::post('/change-status', 'VideosController@changeStatus')->name('admin.video.change.status');
        });

        ///////////////////////////////////////////////////////////////////////////////////////////////////////////
        /// Photo Albums routes
        Route::group(['prefix' => 'photo-albums'], function () {
            Route::get('/', 'PhotoAlbumsController@index')->name('admin.photo.albums');
            Route::get('get-photo-albums', 'PhotoAlbumsController@getPhotoAlbums')->name('get.admin.photo.albums');
            Route::get('/create', 'PhotoAlbumsController@create')->name('admin.photo.albums.create');
            Route::post('/store', 'PhotoAlbumsController@store')->name('admin.photo.albums.store');
            Route::post('/destroy', 'PhotoAlbumsController@destroy')->name('admin.photo.albums.destroy');
            route::get('/edit/{id?}', 'PhotoAlbumsController@edit')->name('admin.photo.albums.edit');
            route::post('/update', 'PhotoAlbumsController@update')->name('admin.photo.albums.update');
            Route::get('/add-other-album-photos/{id?}', 'PhotoAlbumsController@addOtherAlbumPhotos')->name('admin.add.other.album.photos');
            Route::post('/upload/other/album/photos/{paid}', 'PhotoAlbumsController@uploadOtherAlbumPhotos')->name('admin.upload.other.album.photos');
            Route::post('/delete/other/album/photo', 'PhotoAlbumsController@deleteOtherAlbumPhoto')->name('admin.delete.other.album.photo');
            Route::post('/change-status', 'PhotoAlbumsController@changeStatus')->name('admin.photo.albums.change.status');

        });
    });


    ///////////////////////////////////////////////////////////////////
    /// Upload Center routes
    Route::group(['prefix' => 'upload-center'], function () {
        Route::get('/', 'UploadCenterController@index')->name('admin.upload.center');
        Route::get('/get-upload-center-files', 'UploadCenterController@getUploadCenterFiles')
            ->name('get.admin.upload.center.files');
        Route::post('/store', 'UploadCenterController@store')->name('admin.upload.center.store');
        Route::post('/destroy', 'UploadCenterController@destroy')->name('admin.upload.center.destroy');
        Route::get('/get-file-by-id', 'UploadCenterController@getUploadCenterFileById')
            ->name('get.admin.upload.center.file.by.id');
    });


    ///~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ Updates For gbClinic ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~//

    ///////////////////////////////////////////////////////////////////
    /// Trainings Routes
    Route::group(['prefix' => 'trainings'], function () {
        Route::get('/', 'TrainingsController@index')->name('admin.trainings');
        Route::get('/get-trainings', 'TrainingsController@getTrainings')->name('admin.get.trainings');
        Route::get('/create', 'TrainingsController@create')->name('admin.trainings.create');
        Route::post('/store', 'TrainingsController@store')->name('admin.trainings.store');
        Route::get('/edit/{id?}', 'TrainingsController@edit')->name('admin.trainings.edit');
        Route::post('/update', 'TrainingsController@update')->name('admin.trainings.update');
        Route::post('/destroy', 'TrainingsController@destroy')->name('admin.trainings.destroy');
        Route::post('/change-status', 'TrainingsController@changeStatus')->name('admin.trainings.change.status');
        Route::post('/reset_training', 'TrainingsController@resetTraining')->name('admin.trainings.reset');
    });


    ///////////////////////////////////////////////////////////////////
    /// Publications  Routes
    Route::group(['prefix' => 'publications'], function () {
        Route::get('/', 'PublicationsController@index')->name('admin.publications');
        Route::get('/get-publications', 'PublicationsController@getPublications')->name('admin.get.publications');
        Route::post('/destroy', 'PublicationsController@destroy')->name('admin.publications.destroy');
        Route::post('/change-status', 'PublicationsController@changeStatus')->name('admin.publications.change.status');
        Route::get('/create', 'PublicationsController@create')->name('admin.publications.create');
        Route::post('/store', 'PublicationsController@store')->name('admin.publications.store');
        Route::get('/edit/{id?}', 'PublicationsController@edit')->name('admin.publications.edit');
        Route::post('/update', 'PublicationsController@update')->name('admin.publications.update');

    });


    ///////////////////////////////////////////////////////////////////
    /// Sections routes
    Route::group(['prefix' => 'sections'], function () {
        Route::get('/', 'SectionController@index')->name('admin.sections');
        Route::get('/get-sections', 'SectionController@getSections')->name('get.admin.sections');
        Route::get('/create', 'SectionController@create')->name('admin.sections.create');
        Route::post('/store', 'SectionController@store')->name('admin.sections.store');
        Route::post('/destroy', 'SectionController@destroy')->name('admin.sections.destroy');
        Route::get('/edit/{id?}', 'SectionController@edit')->name('admin.sections.edit');
        Route::post('/update', 'SectionController@update')->name('admin.sections.update');
    });

    ///////////////////////////////////////////////////////////////////
    /// services routes
    Route::group(['prefix' => 'services'], function () {
        Route::get('/', 'ServiceController@index')->name('admin.services');
        Route::get('/get-services', 'ServiceController@getServices')->name('get.admin.services');
        Route::get('/create', 'ServiceController@create')->name('admin.services.create');
        Route::post('/store', 'ServiceController@store')->name('admin.services.store');
        Route::get('/edit/{id?}', 'ServiceController@edit')->name('admin.service.edit');
        Route::post('/update', 'ServiceController@update')->name('admin.service.update');
        Route::post('/destroy', 'ServiceController@destroy')->name('admin.service.destroy');
        Route::post('/change-status', 'ServiceController@ChangeStatus')->name('admin.service.change.status');
    });


    ///////////////////////////////////////////////////////////////////
    /// Treatment Areas routes
    Route::group(['prefix' => 'treatment-areas'], function () {
        Route::get('/treatment-areas', 'ServiceController@treatmentAreas')->name('admin.treatment.areas');
        Route::get('/get-treatment-areas', 'ServiceController@getTreatmentAreas')->name('admin.get.treatment.areas');
    });

    ///////////////////////////////////////////////////////////////////
    /// FAQ's routes
    Route::group(['prefix' => 'faqs'], function () {

        Route::get('/', 'FAQController@index')->name('admin.faqs');
        Route::get('/get-faqs', 'FAQController@getFaqs')->name('admin.get.faqs');
        Route::get('/create', 'FAQController@create')->name('admin.faqs.create');
        Route::post('/store', 'FAQController@store')->name('admin.faqs.store');
        Route::get('/edit/{id?}', 'FAQController@edit')->name('admin.faqs.edit');
        Route::post('/update', 'FAQController@update')->name('admin.faqs.update');
        Route::post('/destroy', 'FAQController@destroy')->name('admin.faqs.destroy');
        Route::post('/faq-change-status', 'FAQController@faqChangeStatus')->name('admin.faqs.change.status');

    });


    ///////////////////////////////////////////////////////////////////
    /// About SPA routes
    Route::group(['prefix' => 'about_spa'], function () {
        Route::get('/', 'AboutSpaController@index')->name('admin.about.spa');
        Route::get('/get-about-spa', 'AboutSpaController@getAboutSpa')->name('admin.get.about.spa');
        Route::post('/destroy', 'AboutSpaController@destroy')->name('admin.about.spa.destroy');
        Route::post('/change-status', 'AboutSpaController@changeStatus')->name('admin.about.spa.change.status');
        Route::get('/create', 'AboutSpaController@create')->name('admin.about.spa.create');
        Route::post('/store', 'AboutSpaController@store')->name('admin.about.spa.store');
        Route::get('/edit/{id?}', 'AboutSpaController@edit')->name('admin.about.spa.edit');
        Route::post('/update', 'AboutSpaController@update')->name('admin.about.spa.update');
    });

    //////////////////////////////////////////////////////////////////
    /// Tests and  metrics  Routes
    /////////////////////////////////////////////////////////////////
    /// Tests Routes
    Route::group(['prefix' => 'tests', 'namespace' => 'Tests'], function () {

        Route::get('/', 'TestsController@index')->name('admin.tests');
        Route::get('/get-tests', 'TestsController@getTests')->name('get.admin.tests');
        Route::post('/destroy', 'TestsController@destroy')->name('admin.test.destroy');
        Route::post('/store', 'TestsController@store')->name('admin.test.store');
        Route::get('/edit', 'TestsController@edit')->name('admin.test.edit');
        Route::post('/update', 'TestsController@update')->name('admin.test.update');
        Route::post('/change-status', 'TestsController@changeStatus')->name('admin.test.change.status');
        Route::post('/add_test_file', 'TestsController@addTestFile')->name('admin.add.test.file');

    });

    /////////////////////////////////////////////////////////////////
    /// Tests Manage Routes
    Route::group(['prefix' => 'tests-manage', 'namespace' => 'Tests'], function () {

        Route::get('/{id?}', 'TestQuestionsController@index')->name('admin.tests.questions');
        Route::get('/get-tests-questions/{id?}', 'TestQuestionsController@getTestQuestions')
            ->name('get.admin.test.questions');
        Route::post('/destroy', 'TestQuestionsController@destroy')->name('admin.test.question.destroy');
        Route::get('/create/{id?}', 'TestQuestionsController@create')->name('admin.test.question.create');
        Route::post('/store', 'TestQuestionsController@store')->name('admin.test.question.store');
        Route::get('/edit/{id?}', 'TestQuestionsController@edit')->name('admin.test.question.edit');
        Route::post('/update', 'TestQuestionsController@update')->name('admin.test.question.update');
    });

    /////////////////////////////////////////////////////////////////
    /// Test Metrics Routes
    Route::group(['prefix' => 'tests-scales', 'namespace' => 'Tests'], function () {
        Route::get('/index/{id?}', 'TestScalesController@index')->name('admin.test.scales.index');
        Route::get('/get-test-scales/{id?}', 'TestScalesController@getTestScales')->name('admin.get.test.scales');
        Route::post('/store/{id?}', 'TestScalesController@store')->name('admin.test.scales.store');
        Route::get('/edit', 'TestScalesController@edit')->name('admin.test.scales.edit');
        Route::post('/update/{id?}', 'TestScalesController@update')->name('admin.test.scales.update');
        Route::post('/destroy', 'TestScalesController@destroy')->name('admin.test.scales.destroy');

    });


});


//////////////////////////////////////////////////////////////////////////////
/// Guest => that mean:must not be admin => because any one must be able to access login page
Route::group(['namespace' => 'Admin', 'middleware' => 'guest:admin'], function () {
    Route::get('login', 'LoginController@getLogin')->name('get.admin.login');
    Route::post('login', 'LoginController@doLogin')->name('admin.login');
});

//////////////////////////////////////////////////////////////////////////////
/// Logout
Route::get('logout', 'Admin\LoginController@logout')->name('admin.logout');



