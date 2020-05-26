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
/**
 * Provincias
 */
Route::get('provincia/{id}/localidades', ['uses' => 'Auth\LocalidadController@localidades', 'as' => 'localidades.localidades']);
Route::get('marca/{id}/mmodelos', ['uses' => 'Auth\MarcaController@modelos', 'as' => 'marca.modelos']);

Route::get('marca/{marca_id}', [ 'uses' => 'Page\AutomovilController@marca', 'as' => 'marca' ]);
Route::get('marca/{marca_id}/anio/{anio}', [ 'uses' => 'Page\AutomovilController@anio', 'as' => 'anio' ]);
Route::get('marca/{marca_id}/anio/{anio}/modelo/{modelo_id}', [ 'uses' => 'Page\AutomovilController@modelo', 'as' => 'modelo' ]);
Route::get('marca/{marca_id}/anio/{anio}/modelo/{modelo_id}/{puertas}', [ 'uses' => 'Page\AutomovilController@puertas', 'as' => 'puertas' ]);

Route::match(['get', 'post'] , 'olvide', [ 'uses' => 'PrivateArea\ForgotPasswordController@olvide', 'as' => 'olvide' ]);
Route::match(['get', 'post'] , 'token/{token}', [ 'uses' => 'PrivateArea\ForgotPasswordController@token', 'as' => 'token' ]);

Route::get('salir', 'PrivateArea\LoginController@salir')->name('salir');
Route::group(['prefix' => 'cliente', 'as' => 'client.'], function() {
    Route::get('changeClave/{id}', 'PrivateArea\UsuarioController@changeClave')->name('changeClave');
    Route::post('changepass','PrivateArea\UsuarioController@changepass')->name("changepass");
    Route::post('acceso', 'PrivateArea\LoginController@login')->name("acceso");

    Route::get('cotizacion', 'PrivateArea\UserController@cotizacion')->name("cotizacion");
    Route::post('cotizacion ', ['uses' => 'Page\FormController@presupuesto' , 'as' => 'cotizacion']);
    Route::match(['get', 'post'], 'mis-datos', [ 'uses' => 'PrivateArea\UserController@mis_datos', 'as' => 'mis_datos' ]);
    Route::get('mis-polizas', 'PrivateArea\UserController@descargas')->name("polizas");
});

Route::post('values', ['uses' => 'Page\GeneralController@values' , 'as' => 'values']);
//ACTUALIZACION DE BD
Route::group(['prefix' => 'update'], function() {
    Route::get( 'automoviles', ['uses' => 'Auth\UpdateController@automoviles' , 'as' => '.automoviles']);
    Route::get( 'clientes', ['uses' => 'Auth\UpdateController@clientes' , 'as' => '.clientes']);
    Route::get( 'polizas', ['uses' => 'Auth\UpdateController@polizas' , 'as' => '.polizas']);
});
Route::group(['middleware' => 'auth', 'prefix' => 'adm'], function() {
    Route::get('/', 'Auth\AdmController@index')->name('adm');
    Route::get('logout', ['uses' => 'Auth\LoginController@logout' , 'as' => 'adm.logout']);
    Route::delete('file', ['uses' => 'Auth\AdmController@deleteFile', 'as' => 'deleteFile']);
    Route::post('edit', ['uses' => 'Auth\AdmController@edit', 'as' => 'adm.edit']);
    Route::match(['get', 'post'], 'url',['as' => '.url','uses' => 'Auth\EmpresaController@url' ]);
    Route::get('update', ['uses' => 'Auth\AdmController@update', 'as' => 'update.index']);

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
     * CONTENIDO
     */
    Route::group(['prefix' => 'contenido', 'as' => 'contenido'], function() {
        Route::get('{seccion}/edit', ['uses' => 'Auth\ContenidoController@edit', 'as' => '.edit']);
        Route::post('{seccion}/update', ['uses' => 'Auth\ContenidoController@update', 'as' => 'update']);
    });
    /**
     * PRODUCTOS
     */
    Route::resource('coberturas', 'Auth\ProductoController')->except(['update']);
    Route::post('coberturas/update/{id}', ['uses' => 'Auth\ProductoController@update', 'as' => 'coberturas.update']);
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
     * Novedad
     */
    Route::resource('productos', 'Auth\NovedadController')->except(['update']);
    Route::post('productos/update/{id}', ['uses' => 'Auth\NovedadController@update', 'as' => 'productos.update']);
    /**
     * BLOG
     */
    Route::resource('blogs', 'Auth\BlogController')->except(['update']);
    Route::post('blogs/update/{id}', ['uses' => 'Auth\BlogController@update', 'as' => 'blogs.update']);

    Route::resource('blogcategorias', 'Auth\BlogCategoriaController')->except(['update','index']);
    Route::get('blog/categorias', ['uses' => 'Auth\BlogCategoriaController@index', 'as' => '.blogcategorias.index']);
    Route::post('blogcategorias/update/{id}', ['uses' => 'Auth\BlogCategoriaController@update', 'as' => 'blogcategorias.update']);

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
)->where( 'link' , "index|pedido-de-presupuesto|quienes-somos|productos|servicio-tecnico|galeria|novedades|clientes|contacto" );

Route::get('search', ['uses' => 'Page\GeneralController@search' , 'as' => 'search']);

Route::post('pedido-de-presupuesto ', ['uses' => 'Page\FormController@presupuesto' , 'as' => 'presupuesto']);
Route::post('contacto', ['uses' => 'Page\FormController@contacto' , 'as' => 'contacto']);
Route::post('servicio-tecnico', ['uses' => 'Page\FormController@contacto' , 'as' => 'servicios']);
Route::post('productos/cobertura', ['uses' => 'Page\FormController@cobertura' , 'as' => 'productos.cobertura']);

Route::get('productos/categoria/{title}/{id}', ['uses' => 'Page\GeneralController@categoria' , 'as' => 'categoria']);
Route::get('productos/cobertura/{title}/{id}', ['uses' => 'Page\GeneralController@producto' , 'as' => 'producto']);

Route::get('novedad/{title}/{id}', ['uses' => 'Page\GeneralController@blog' , 'as' => 'blog']);