<?php
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
        "id"        => "faq",
        "nombre"    => "FAQ",
        "icono"     => '<i class="fas fa-users"></i>',
        "url"       => null
    ],
    [
        "separar"   => 1
    ],
    [
        "id"        => "popup",
        "nombre"    => "Pop' up",
        "icono"     => '<i class="fas fa-chalkboard"></i>',
        "url"       => null
    ]
]
);