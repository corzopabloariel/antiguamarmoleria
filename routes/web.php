<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes(['register' => false, 'verify' => false, 'reset' => false]);

Route::group(['middleware' => 'auth', 'prefix' => 'adm'], function() {
    Route::get('/', 'Auth\AdmController@index')->name('adm');
    Route::get('logout', ['uses' => 'Auth\LoginController@logout' , 'as' => 'adm.logout']);
    Route::delete('file', ['uses' => 'Auth\AdmController@deleteFile', 'as' => 'deleteFile']);
    Route::post('edit', ['uses' => 'Auth\AdmController@edit', 'as' => 'adm.edit']);
    Route::match(['get', 'post'], 'url',['as' => '.url','uses' => 'Auth\EmpresaController@url' ]);
    Route::get('update', ['uses' => 'Auth\AdmController@update', 'as' => 'update.index']);

    Route::post('relation', ['uses' => 'Auth\AdmController@relation', 'as' => 'adm.relation']);
    Route::post('count', ['uses' => 'Auth\AdmController@count', 'as' => 'adm.count']);

    Route::get('empresa/imagen', ['uses' => 'Auth\AdmController@imagen', 'as' => 'imagen']);
    Route::get('imagen/{id}/edit', ['uses' => 'Auth\AdmController@imagenShow', 'as' => 'imagen.show']);
    Route::post('imagen/update/{element}', ['uses' => 'Auth\AdmController@imagenUpdate', 'as' => 'imagen.update']);
    Route::delete('imagen/delete', ['uses' => 'Auth\AdmController@imagenDestroy', 'as' => 'imagen.delete']);
    Route::post('imagen', ['uses' => 'Auth\AdmController@imagenStore', 'as' => 'imagen.create']);
    /**
     * SLIDERS
     */
    Route::resource('slider', 'Auth\SliderController')->except(['index','update','show']);
    Route::get('slider/{seccion}', ['uses' => 'Auth\SliderController@index', 'as' => 'slider.index']);
    Route::post('slider/update/{id}', ['uses' => 'Auth\SliderController@update', 'as' => 'slider.update']);
    /**
     * PORTADA
     */
    Route::resource('portada', 'Auth\PortadaController')->except(['index','update','show']);
    Route::get('portada/{seccion}', ['uses' => 'Auth\PortadaController@index', 'as' => 'portada.index']);
    Route::post('portada/update/{id}', ['uses' => 'Auth\PortadaController@update', 'as' => 'portada.update']);
    /**
     * CONTENIDO
     */
    Route::group(['prefix' => 'contenido', 'as' => 'contenido'], function() {
        Route::get('{seccion}/edit', ['uses' => 'Auth\ContenidoController@edit', 'as' => '.edit']);
        Route::post('{seccion}/update', ['uses' => 'Auth\ContenidoController@update', 'as' => 'update']);
    });
    /**
     * POP
     */
    Route::resource('pops', 'Auth\PopController')->except(['update']);
    Route::post('pops/update/{id}', ['uses' => 'Auth\PopController@update', 'as' => 'pops.update']);
    /**
     * FAQ
     */
    Route::resource('faqs', 'Auth\FaqController')->except(['update']);
    Route::post('faqs/update/{id}', ['uses' => 'Auth\FaqController@update', 'as' => 'faqs.update']);
    /**
     * Marcas
     */
    Route::resource('marcas', 'Auth\MarcaController')->except(['update']);
    Route::post('marcas/update/{id}', ['uses' => 'Auth\MarcaController@update', 'as' => 'marcas.update']);
    /**
     * PRODUCTOS
     */
    Route::resource('productos', 'Auth\ProductoController')->except(['update', 'index']);
    Route::get('productos/', ['uses' => 'Auth\ProductoController@index', 'as' => 'productos.index']);
    Route::get('producto/{id?}/elementos', ['uses' => 'Auth\ProductoController@index', 'as' => 'productos.elementos']);
    Route::post('productos/update/{id}', ['uses' => 'Auth\ProductoController@update', 'as' => 'productos.update']);
    /**
     * BLOG
     */
    Route::resource('novedades', 'Auth\BlogController')->except(['update']);
    Route::post('novedades/update/{id}', ['uses' => 'Auth\BlogController@update', 'as' => 'novedades.update']);

    Route::resource('blog_categorias', 'Auth\BlogCategoriaController')->except(['update','index']);
    Route::get('novedad/categorias', ['uses' => 'Auth\BlogCategoriaController@index', 'as' => 'blog_categorias.index']);
    Route::post('blog_categorias/update/{id}', ['uses' => 'Auth\BlogCategoriaController@update', 'as' => 'blog_categorias.update']);

    /**********************************
            DATOS DE LA EMPRESA
     ********************************** */
    Route::resource('usuarios', 'Auth\UserController')->except(['update']);
    Route::post('usuarios/update/{id}', ['uses' => 'Auth\UserController@update', 'as' => 'usuarios.update']);
    Route::get('usuario/datos', ['uses' => 'Auth\UserController@datos', 'as' => 'usuarios.datos']);

    Route::get('empresa/metadatos', ['uses' => 'Auth\MetadatosController@index', 'as' => 'metadatos.index']);
    Route::post('metadatos/update/{page}', ['uses' => 'Auth\MetadatosController@update', 'as' => 'metadatos.update']);

    //Route::resource('redes', 'Auth\EmpresaController')->except(['index','update']);
    Route::get('empresa/redes', ['uses' => 'Auth\EmpresaController@redes', 'as' => 'empresa.redes']);
    Route::post('redes', ['uses' => 'Auth\EmpresaController@redesStore', 'as' => 'redes.create']);
    Route::get('redes/{id}/edit', ['uses' => 'Auth\EmpresaController@redesEdit', 'as' => 'empresa.edit']);
    Route::post('redes/update/{id}', ['uses' => 'Auth\EmpresaController@redesUpdate', 'as' => 'redes.update']);
    Route::delete('redes/delete', ['uses' => 'Auth\EmpresaController@redesDestroy', 'as' => 'redes.delete']);

    Route::group(['prefix' => 'empresa', 'as' => 'empresa'], function() {
        Route::get('datos', ['uses' => 'Auth\EmpresaController@datos', 'as' => '.datos']);
        Route::match(['get', 'post'], 'terminos',['as' => '.terminos','uses' => 'Auth\EmpresaController@terminos' ]);
        Route::match(['get', 'post'], 'form',['as' => '.form','uses' => 'Auth\EmpresaController@form' ]);
        Route::post('update', ['uses' => 'Auth\EmpresaController@update', 'as' => '.update']);
    });
});

Route::get( '{link?}' ,
    [ 'uses' => 'Page\GeneralController@index' , 'as' => 'index' ]
)->where( 'link' , "index|faq|empresa|productos|presupuesto|consentino-online-visualizer|novedades|contacto" );
Route::get('producto/{title}', ['uses' => 'Page\GeneralController@marca' , 'as' => 'marca']);
Route::get('producto/{title}/{query}', 'Page\GeneralController@producto')->where('query','.+');
Route::get('novedades/{title}', ['uses' => 'Page\GeneralController@novedades' , 'as' => 'novedades']);
Route::get('novedad/{categoria}/{title}', ['uses' => 'Page\GeneralController@novedad' , 'as' => 'novedad']);
Route::get('search', ['uses' => 'Page\GeneralController@search' , 'as' => 'search']);

Route::post('presupuesto ', ['uses' => 'Page\FormController@presupuesto' , 'as' => 'presupuesto']);
Route::post('contacto', ['uses' => 'Page\FormController@contacto' , 'as' => 'contacto']);