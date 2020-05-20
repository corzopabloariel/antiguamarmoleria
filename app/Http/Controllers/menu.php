<?php
define( "MENU2" , [
    [
        "id"        => "clientes",
        "nombre"    => "Clientes",
        "icono"     => '<i class="fas fa-users"></i>',
        "url"       => @route('clientes.index')
    ],
    [
        "id"        => "polizas",
        "nombre"    => "Polizas",
        "icono"     => '<i class="fas fa-file-signature"></i>',
        "url"       => @route('polizas.index')
    ],
] );
/**
 *
 */
define( "MENU" ,
[
    [
        "id"        => "home",
        "nombre"    => "Home",
        "icono"     => "<i class='nav-icon fas fa-home'></i>",
        "submenu"   => [
            [
                "nombre"    => "Contenido",
                "icono"     => "<i class='nav-icon fas fa-file-contract'></i>",
                "url"       => @route('contenido.edit', ['seccion' => 'home'])
            ],[
                "nombre"    => "Slider",
                "icono"     => '<i class="far fa-images"></i>',
                "url"       => @route('slider.index', ['seccion' => 'home'])
            ]
        ]
    ],
    [
        "id"        => "empresa",
        "nombre"    => "Quienes somos",
        "icono"     => "<i class='nav-icon fas fa-building'></i>",
        "submenu"   => [
            [
                "nombre"    => "Contenido",
                "icono"     => "<i class='nav-icon fas fa-file-contract'></i>",
                "url"       => @route('contenido.edit', ['seccion' => 'empresa'])
            ],[
                "nombre"    => "Slider",
                "icono"     => '<i class="far fa-images"></i>',
                "url"       => @route('slider.index', ['seccion' => 'empresa'])
            ]
        ]
    ],
    [
        "id"        => "productos",
        "nombre"    => "Productos",
        "icono"     => "<i class='nav-icon fas fa-industry'></i>",
        "submenu"   => [
            [
                "nombre"    => "Coberturas",
                "icono"     => "<i class='nav-icon fas fa-file-contract'></i>",
                "url"       => @route('coberturas.index'),
            ],[
                "nombre"    => "Compañias",
                "icono"     => '<i class="fas fa-boxes"></i>',
                "url"       => @route('companias.index')
            ]
        ]
    ],
    [
        "id"        => "clientes",
        "nombre"    => "Clientes",
        "icono"     => '<i class="fas fa-users"></i>',
        "url"       => @route('clientes.index')
    ],
    [
        "id"        => "novedades",
        "nombre"    => "Novedades",
        "icono"     => '<i class="far fa-newspaper"></i>',
        "url"       => @route('novedades.index')
    ],
    [
        "id"        => "sectores",
        "nombre"    => "Staff",
        "icono"     => '<i class="fas fa-mail-bulk"></i>',
        "url"       => @route('staff.index')
    ],
    [
        "separar"   => 1
    ],
    [
        "id"        => "polizas",
        "nombre"    => "Polizas",
        "icono"     => '<i class="fas fa-file-signature"></i>',
        "url"       => @route('polizas.index')
    ],
    [
        "id"        => "riesgos",
        "nombre"    => "Riesgos",
        "icono"     => '<i class="fab fa-wpforms"></i>',
        "url"       => @route('riesgos.index')
    ],
    [
        "id"        => "localidades",
        "nombre"    => "Localidades",
        "icono"     => '<i class="fas fa-file-alt"></i>',
        "url"       => @route('localidades.index')
    ],
    [
        "id"        => "marcas",
        "nombre"    => "Automóviles",
        "icono"     => '<i class="fas fa-car-side"></i>',
        "submenu"   => [
            [
                "nombre"    => "Marcas y Modelos",
                "icono"     => "<i class='nav-icon fas fa-file-contract'></i>",
                "url"       => @route('marcas.index'),
            ],[
                "nombre"    => "Datos",
                "icono"     => '<i class="fas fa-file-upload"></i>',
                "url"       => @route('automoviles.index')
            ]
        ]
    ],
    [
        'id'        => 'update',
        'nombre'    => 'Actualizar DB',
        'icono'     => '<i class="fas fa-database"></i>',
        'url'       => @route( 'update.index' )
    ]
]
);