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


Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function() {
    get('/', function() {
        
       // dd(Route::getRoutes());
        return view('admin.pages.dashboard');
    });

    Route::group(['prefix' => 'catalog'], function() {
        Route::group(['prefix' => 'category'], function() {
            get('/', ['as' => 'admin.category.view','test'=>'test' ,'uses' => 'CategoryController@index']);
            get('/add', ['as' => 'admin.category.add', 'uses' => 'CategoryController@add']);
            post('/save', ['as' => 'admin.category.save', 'uses' => 'CategoryController@save']);
            get('/edit', ['as' => 'admin.category.edit', 'uses' => 'CategoryController@edit']);
        });
        Route::group(['prefix' => 'attrSets'], function() {
            get('/', ['as' => 'admin.attrSets.view', 'uses' => 'AttributeSetsController@index']);
            get('/add', ['as' => 'admin.attrSets.add', 'uses' => 'AttributeSetsController@add']);
            post('/save', ['as' => 'admin.attrSets.save', 'uses' => 'AttributeSetsController@save']);
            get('/edit', ['as' => 'admin.attrSets.edit', 'uses' => 'AttributeSetsController@edit']);
        });

        Route::group(['prefix' => 'attrs'], function() {
            get('/', ['as' => 'admin.attrs.view', 'uses' => 'AttributesController@index']);
            get('/add', ['as' => 'admin.attrs.add', 'uses' => 'AttributesController@add']);
            post('/save', ['as' => 'admin.attrs.save', 'uses' => 'AttributesController@save']);
            get('/edit', ['as' => 'admin.attrs.edit', 'uses' => 'AttributesController@edit']);
        });
        
        Route::group(['prefix' => 'products'], function() {
            get('/', ['as' => 'admin.products.view', 'uses' => 'ProductsController@index']);
            get('/add', ['as' => 'admin.products.add', 'uses' => 'ProductsController@add']);
            post('/save', ['as' => 'admin.products.save', 'uses' => 'ProductsController@save']);
            get('/edit-Info', ['as' => 'admin.products.editinfo', 'uses' => 'ProductsController@edit']);
            post('/update', array('as' => 'admin.products.updateProd', 'uses' => 'ProductsController@update'));
            get('/comboProds/{id}', array('as' => 'admin.products.updateComboProds', 'uses' => 'ProductsController@comboProds'));
            post('/update-combo', array('as' => 'admin.products.updateCompoProd', 'uses' => 'ProductsController@update5'));
            post('/combo-attach', array('as' => 'comboAttach', 'uses' => 'ProductsController@comboAttach'));
            post('/combo-detach', array('as' => 'comboDetach', 'uses' => 'ProductsController@comboDetach'));
            get('/catalog-images', ['as' => 'admin.products.images', 'uses' => 'ProductsController@img']);
            post('/save-img', array('as' => 'admin.products.saveImg', 'uses' => 'ProductsController@saveImg'));
            post('/del-img', array('as' => 'admin.products.delImg', 'uses' => 'ProductsController@delImg'));
            get('/update-product-attr/{id}', array('as' => 'admin.products.updateProdAttr', 'uses' => 'ProductsController@prodAttrs'));
            get('/config-product-attrs/{id}', array('as' => 'admin.products.ConfigProdAttrs', 'uses' => 'ProductsController@configProdAttrs'));
            post('/update-conf', array('as' => 'admin.products.updateCProd', 'uses' => 'ProductsController@update4'));
            //edit update
            get('/update-product-variant', array('as' => 'admin.products.updateProdVariant', 'uses' => 'ProductsController@updateProdVariant'));
            post('/update-attributes', array('as' => 'admin.products.update2Prod', 'uses' => 'ProductsController@update2'));
            get('/update-config-product-attr/{id}', array('as' => 'admin.products.updateConfigProdAttr', 'uses' => 'ProductsController@configProdAttrs'));
            //related prods
            post('/update-related-upsell', array('as' => 'admin.products.updateRelUpProd', 'uses' => 'ProductsController@update3'));
            get('/update-related-upsell-products/{id}', array('as' => 'admin.products.updateUpsellRelatedProds', 'uses' => 'ProductsController@updateRelatedUpsellProds'));
            post('/rel-attach', array('as' => 'admin.products.relAttach', 'uses' => 'ProductsController@relAttach'));
            post('/rel-detach', array('as' => 'admin.products.relDetach', 'uses' => 'ProductsController@relDetach'));
            post('/upsell-attach', array('as' => 'admin.products.upsellAttach', 'uses' => 'ProductsController@upsellAttach'));
            post('/upsell-detach', array('as' => 'admin.products.upsellDetach', 'uses' => 'ProductsController@upsellDetach'));
        });
    });



    Route::group(['prefix' => 'acl'], function() {
        Route::group(['prefix' => 'roles'], function() {
            get('/', ['as' => 'admin.roles.view', 'uses' => 'RolesController@index']);
            get('/add', ['as' => 'admin.roles.add', 'uses' => 'RolesController@add']);
            post('/save', ['as' => 'admin.roles.save', 'uses' => 'RolesController@save']);
            get('/edit', ['as' => 'admin.roles.edit', 'uses' => 'RolesController@edit']);
        });

        Route::group(['prefix' => 'systemusers'], function() {
            get('/', ['as' => 'admin.systemusers.view', 'uses' => 'SystemUsersController@index']);
            get('/add', ['as' => 'admin.systemusers.add', 'uses' => 'SystemUsersController@add']);
            post('/save', ['as' => 'admin.systemusers.save', 'uses' => 'SystemUsersController@save']);
            get('/edit', ['as' => 'admin.systemusers.edit', 'uses' => 'SystemUsersController@edit']);
            post('/update', ['as' => 'admin.systemusers.update', 'uses' => 'SystemUsersController@update']);
        });

        Route::group(['prefix' => 'operations'], function() {
            get('/all-products', ['as' => 'admin.operations.allproducs.view', 'uses' => 'OperationsController@all_products_view']);
            get('/ordered-products', ['as' => 'admin.operations.orderedproducts.view', 'uses' => 'OperationsController@ordered_products_view']);
            get('/proforma-invoces', ['as' => 'admin.operations.proformainvoices.view', 'uses' => 'OperationsController@proforma_invoices_view']);
            get('/ready-products', ['as' => 'admin.operations.readyproducs.view', 'uses' => 'OperationsController@ready_products_view']);
            get('/logistic-info', ['as' => 'admin.operations.logisticinfo.view', 'uses' => 'OperationsController@logistic_info_view']);
            get('/warehouse-products', ['as' => 'admin.operations.warehouseproducts.view', 'uses' => 'OperationsController@warehouse_products_view']);
        });
    });
});



Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
