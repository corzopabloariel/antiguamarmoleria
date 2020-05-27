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
                "nombre"    => "Marcas",
                "icono"     => "<i class='nav-icon fas fa-file-contract'></i>",
                "url"       => @route('marcas.index'),
            ],[
                "nombre"    => "Productos",
                "icono"     => '<i class="fas fa-boxes"></i>',
                "url"       => @route('productos.index'),
            ]
        ]
    ],
    [
        "id"        => "faq",
        "nombre"    => "FAQ",
        "icono"     => '<i class="fas fa-users"></i>',
        "submenu"   => [
            [
                "nombre"    => "Preguntas",
                "icono"     => '<i class="fas fa-question"></i>',
                "url"       => @route('faqs.index')
            ],
            [
                "nombre"    => "Portada",
                "icono"     => '<i class="far fa-image"></i>',
                "url"       => @route('portada.index', ['seccion' => 'faq'])
            ]
        ]
    ],
    [
        "id"        => "contacto",
        "nombre"    => "Contacto",
        "icono"     => '<i class="fas fa-pager"></i>',
        "submenu"   => [
            [
                "nombre"    => "Portada",
                "icono"     => '<i class="far fa-image"></i>',
                "url"       => @route('portada.index', ['seccion' => 'contacto'])
            ]
        ]
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