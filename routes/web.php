<?php

// Admin  routes  for user
Route::group([
    'namespace' => 'Admin',
    'prefix' => 'admin'
], function () {
    Auth::routes();
    Route::get('password', 'UserController@getPassword');
    Route::post('password', 'UserController@postPassword');
    Route::get('/', 'ResourceController@home')->name('home');
    Route::get('/dashboard', 'ResourceController@dashboard')->name('dashboard');
    Route::resource('banner', 'BannerResourceController');
    Route::post('/banner/destroyAll', 'BannerResourceController@destroyAll');

    Route::group(['prefix' => 'information','as' => 'information.'], function ($router) {

        //Route::resource('news', 'NewsResourceController');
        //Route::post('/news/destroyAll', 'NewsResourceController@destroyAll')->name('news.destroy_all');
    });

    //Route::get('culture', 'CultureResourceController@getPlantBySlug')->name('culture');
    Route::resource('culture', 'CultureResourceController');
    Route::get('/culture/catalog/create', 'CultureResourceController@createCatalog')->name('culture.catalog.create');
    Route::post('/culture/catalog/store', 'CultureResourceController@storeCatalog')->name('culture.catalog.store');
    Route::get('/culture/catalog/show', 'CultureResourceController@showCatalog')->name('culture.catalog.show');
    Route::post('/culture/catalog/update/{id}', 'CultureResourceController@updateCatalog')->name('culture.catalog.update');
    Route::delete('/culture/catalog/destroy/{id}', 'CultureResourceController@destroyCatalog')->name('culture.catalog.destroy');

    Route::resource('XinJiang_apricot', 'XinJiangApricotResourceController');
    Route::get('/XinJiang_apricot/catalog/create', 'XinJiangApricotResourceController@createCatalog')->name('xinjiang_apricot.catalog.create');
    Route::post('/XinJiang_apricot/catalog/store', 'XinJiangApricotResourceController@storeCatalog')->name('xinjiang_apricot.catalog.store');
    Route::get('/XinJiang_apricot/catalog/show', 'XinJiangApricotResourceController@showCatalog')->name('xinjiang_apricot.catalog.show');
    Route::post('/XinJiang_apricot/catalog/update/{id}', 'XinJiangApricotResourceController@updateCatalog')->name('xinjiang_apricot.catalog.update');
    Route::delete('/XinJiang_apricot/catalog/destroy/{id}', 'XinJiangApricotResourceController@destroyCatalog')->name('xinjiang_apricot.catalog.destroy');

    Route::resource('specimen', 'SpecimenResourceController');
    Route::get('/specimen/catalog/create', 'SpecimenResourceController@createCatalog')->name('specimen.catalog.create');
    Route::post('/specimen/catalog/store', 'SpecimenResourceController@storeCatalog')->name('specimen.catalog.store');
    Route::get('/specimen/catalog/show', 'SpecimenResourceController@showCatalog')->name('specimen.catalog.show');
    Route::post('/specimen/catalog/update/{id}', 'SpecimenResourceController@updateCatalog')->name('specimen.catalog.update');
    Route::delete('/specimen/catalog/destroy/{id}', 'SpecimenResourceController@destroyCatalog')->name('specimen.catalog.destroy');
    Route::post('/specimen/destroyAll', 'SpecimenResourceController@destroyAll')->name('specimen.destroy_all');

    Route::resource('system_page', 'SystemPageResourceController');
    Route::post('/system_page/destroyAll', 'SystemPageResourceController@destroyAll')->name('system_page.destroy_all');
    Route::get('/setting/company', 'SettingResourceController@company')->name('setting.company.index');
    Route::post('/setting/updateCompany', 'SettingResourceController@updateCompany');
    Route::get('/setting/publicityVideo', 'SettingResourceController@publicityVideo')->name('setting.publicity_video.index');
    Route::post('/setting/updatePublicityVideo', 'SettingResourceController@updatePublicityVideo');
    Route::get('/setting/station', 'SettingResourceController@station')->name('setting.station.index');
    Route::post('/setting/updateStation', 'SettingResourceController@updateStation');

    Route::resource('permission', 'PermissionResourceController');
    Route::resource('role', 'RoleResourceController');

    Route::group(['prefix' => 'page','as' => 'page.'], function ($router) {
        Route::resource('page', 'PageResourceController');
        Route::resource('category', 'PageCategoryResourceController');
    });
    Route::group(['prefix' => 'page','as' => 'page.','namespace' => 'Page'], function ($router) {
        Route::get('/about/show', 'AboutResourceController@show')->name('about.show');
        Route::post('/about/store', 'AboutResourceController@store')->name('about.store');
        Route::put('/about/update/{page}', 'AboutResourceController@update')->name('about.update');

        Route::get('/firm/show', 'FirmResourceController@show')->name('firm.show');
        Route::post('/firm/store', 'FirmResourceController@store')->name('firm.store');
        Route::put('/firm/update/{page}', 'FirmResourceController@update')->name('firm.update');

        Route::get('/process_flow/show', 'ProcessFlowResourceController@show')->name('process_flow.show');
        Route::post('/process_flow/store', 'ProcessFlowResourceController@store')->name('process_flow.store');
        Route::put('/process_flow/update/{page}', 'ProcessFlowResourceController@update')->name('process_flow.update');

        Route::resource('news', 'NewsResourceController');
        Route::post('/news/updateRecommend', 'NewsResourceController@updateRecommend')->name('news.updateRecommend');
        Route::post('/news/destroyAll', 'NewsResourceController@destroyAll')->name('news.destroy_all');
    });

    Route::group(['prefix' => 'menu'], function ($router) {
        Route::get('index', 'MenuResourceController@index');
    });

    Route::resource('single_page', 'SinglePageResourceController');
    Route::get('/single_page/slug/{slug}', 'SinglePageResourceController@getSinglePageBySlug');
    Route::get('/single_page/culture', 'SinglePageResourceController@getSinglePageBySlug');

    Route::resource('plant', 'PlantResourceController');

    Route::resource('research', 'ResearchResourceController');

    Route::get('/question','QuestionResourceController@index')->name('question.index');
    Route::get('/question/{id}','QuestionResourceController@show')->name('question.show');
    Route::delete('/question/{question}', 'QuestionResourceController@destroy')->name('question.destroy');
    Route::delete('/question/destroy_comment/{id}', 'QuestionResourceController@destroyComment')->name('question.destroy_comment');
    Route::post('/question/destroyAll', 'QuestionResourceController@destroyAll')->name('question.destroy_all');
    Route::post('/question/storeComment','QuestionResourceController@storeComment')->name('question.store_comment');

    Route::group(['prefix' => 'nav','as' => 'nav.'], function ($router) {
        Route::resource('nav', 'NavResourceController');
        Route::post('/nav/destroyAll', 'NavResourceController@destroyAll')->name('nav.destroy_all');
        Route::resource('category', 'NavCategoryResourceController');
        Route::post('/category/destroyAll', 'NavCategoryResourceController@destroyAll')->name('category.destroy_all');
    });

    Route::post('/upload/{config}/{path?}', 'UploadController@upload')->where('path', '(.*)');

    Route::resource('admin_user', 'AdminUserResourceController');
    Route::post('/admin_user/destroyAll', 'AdminUserResourceController@destroyAll')->name('admin_user.destroy_all');
    Route::resource('permission', 'PermissionResourceController');
    Route::post('/permission/destroyAll', 'PermissionResourceController@destroyAll')->name('permission.destroy_all');
    Route::resource('role', 'RoleResourceController');
    Route::post('/role/destroyAll', 'RoleResourceController@destroyAll')->name('role.destroy_all');
    Route::get('logout', 'Auth\LoginController@logout');
});

Route::group([
    'namespace' => 'Pc',
    'as' => 'pc.',
], function () {
    Auth::routes();
    Route::get('password', 'UserController@getPassword')->name('password');
    Route::post('password', 'UserController@postPassword')->name('post_password');
    Route::get('/user/login','Auth\LoginController@showLoginForm');
    Route::post('/user/upload_avatar','UserController@uploadAvatar')->name('user.upload_avatar');
    Route::post('/user/update','UserController@update')->name('user.update');
    Route::get('/user/questions','UserController@questions')->name('user.questions');
    Route::get('/','HomeController@home')->name('home');
    Route::get('/culture', 'CultureController@index')->name('culture.index');
    Route::get('/xinJiang_apricot', 'XinJiangApricotController@index')->name('xinjiang_apricot.index');
    Route::get('/news/index', 'NewsController@index')->name('news.index');
    Route::get('/news/show/{id}', 'NewsController@show')->name('news.show');
    Route::get('/about', 'AboutController@index')->name('about');
    Route::get('/firm', 'FirmController@index')->name('firm.index');
    Route::get('/process_flow', 'ProcessFlowController@index')->name('process_flow.index');
    Route::get('/specimen/index', 'SpecimenController@index')->name('specimen.index');
    Route::get('/specimen/show/{id}', 'SpecimenController@show')->name('specimen.show');
    Route::get('/research/index', 'ResearchController@index')->name('research.index');
    Route::get('/contact', 'ContactController@index')->name('contact.index');
    Route::get('/user/index', 'UserController@index')->name('user.index');
    Route::post('ajax_login', 'Auth\LoginController@ajaxLogin')->name('ajax_login');;
    Route::get('logout', 'Auth\LoginController@logout');
    Route::get('/question/index','QuestionController@index')->name('question.index');
    Route::get('/question/create','QuestionController@create')->name('question.create');
    Route::post('/question/store','QuestionController@store')->name('question.store');
    Route::post('/question/storeComment','QuestionController@storeComment')->name('question.store_comment');
    Route::get('/question/{id}','QuestionController@show')->name('question.show');
    Route::post('/question/upload_image','QuestionController@uploadImage')->name('question.upload_image');

    Route::get('email-verification/index','Auth\EmailVerificationController@getVerificationIndex')->name('email-verification.index');
    Route::get('email-verification/error','Auth\EmailVerificationController@getVerificationError')->name('email-verification.error');
    Route::get('email-verification/check/{token}', 'Auth\EmailVerificationController@getVerification')->name('email-verification.check');
    Route::get('email-verification-required', 'Auth\EmailVerificationController@required')->name('email-verification.required');


});
//Route::get('
///{slug}.html', 'PagePublicController@getPage');
/*
Route::group(
    [
        'prefix' => trans_setlocale() . '/admin/menu',
    ], function () {
    Route::post('menu/{id}/tree', 'MenuResourceController@tree');
    Route::get('menu/{id}/test', 'MenuResourceController@test');
    Route::get('menu/{id}/nested', 'MenuResourceController@nested');

    Route::resource('menu', 'MenuResourceController');
   // Route::resource('submenu', 'SubMenuResourceController');
});
*/