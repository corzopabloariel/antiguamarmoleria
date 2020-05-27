-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 27-05-2020 a las 13:05:25
-- Versión del servidor: 5.7.30-0ubuntu0.18.04.1
-- Versión de PHP: 7.2.31-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `osolelaravel_antigua`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenidos`
--

CREATE TABLE `contenidos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data` json DEFAULT NULL,
  `elim` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `contenidos`
--

INSERT INTO `contenidos` (`id`, `section`, `data`, `elim`, `created_at`, `updated_at`) VALUES
(1, 'terminos', '{\"texto\": \"<p><strong>INFORMACI&Oacute;N RELEVANTE</strong></p>\\r\\n\\r\\n<p>Es requisito necesario para la adquisici&oacute;n de los productos que se ofrecen en este sitio, que lea y acepte los siguientes T&eacute;rminos y Condiciones que a continuaci&oacute;n se redactan. El uso de nuestros servicios as&iacute; como la compra de nuestros productos implicar&aacute; que usted ha le&iacute;do y aceptado los T&eacute;rminos y Condiciones de Uso en el presente documento. Todas los productos &nbsp;que son ofrecidos por nuestro sitio web pudieran ser creadas, cobradas, enviadas o presentadas por una p&aacute;gina web tercera y en tal caso estar&iacute;an sujetas a sus propios T&eacute;rminos y Condiciones. En algunos casos, para adquirir un producto, ser&aacute; necesario el registro por parte del usuario, con ingreso de datos personales fidedignos y definici&oacute;n de una contrase&ntilde;a.</p>\\r\\n\\r\\n<p>El usuario puede elegir y cambiar la clave para su acceso de administraci&oacute;n de la cuenta en cualquier momento, en caso de que se haya registrado y que sea necesario para la compra de alguno de nuestros productos. https://antiguamarmoleria.com.ar/ no asume la responsabilidad en caso de que entregue dicha clave a terceros.</p>\\r\\n\\r\\n<p>Todas las compras y transacciones que se lleven a cabo por medio de este sitio web, est&aacute;n sujetas a un proceso de confirmaci&oacute;n y verificaci&oacute;n, el cual podr&iacute;a incluir la verificaci&oacute;n del stock y disponibilidad de producto, validaci&oacute;n de la forma de pago, validaci&oacute;n de la factura (en caso de existir) y el cumplimiento de las condiciones requeridas por el medio de pago seleccionado. En algunos casos puede que se requiera una verificaci&oacute;n por medio de correo electr&oacute;nico.</p>\\r\\n\\r\\n<p>Los precios de los productos ofrecidos en esta Tienda Online es v&aacute;lido solamente en las compras realizadas en este sitio web.</p>\\r\\n\\r\\n<p><strong>LICENCIA</strong></p>\\r\\n\\r\\n<p>Antigua Marmoleria&nbsp; a trav&eacute;s de su sitio web concede una licencia para que los usuarios utilicen&nbsp; los productos que son vendidos en este sitio web de acuerdo a los T&eacute;rminos y Condiciones que se describen en este documento.</p>\\r\\n\\r\\n<p><strong>USO NO AUTORIZADO</strong></p>\\r\\n\\r\\n<p>En caso de que aplique (para venta de software, templetes, u otro producto de dise&ntilde;o y programaci&oacute;n) usted no puede colocar uno de nuestros productos, modificado o sin modificar, en un CD, sitio web o ning&uacute;n otro medio y ofrecerlos para la redistribuci&oacute;n o la reventa de ning&uacute;n tipo.</p>\\r\\n\\r\\n<p><strong>PROPIEDAD</strong></p>\\r\\n\\r\\n<p>Usted no puede declarar propiedad intelectual o exclusiva a ninguno de nuestros productos, modificado o sin modificar. Todos los productos son propiedad &nbsp;de los proveedores del contenido. En caso de que no se especifique lo contrario, nuestros productos se proporcionan&nbsp; sin ning&uacute;n tipo de garant&iacute;a, expresa o impl&iacute;cita. En ning&uacute;n esta compa&ntilde;&iacute;a ser&aacute; &nbsp;responsables de ning&uacute;n da&ntilde;o incluyendo, pero no limitado a, da&ntilde;os directos, indirectos, especiales, fortuitos o consecuentes u otras p&eacute;rdidas resultantes del uso o de la imposibilidad de utilizar nuestros productos.</p>\\r\\n\\r\\n<p><strong>POL&Iacute;TICA DE REEMBOLSO Y GARANT&Iacute;A</strong></p>\\r\\n\\r\\n<p>En el caso de productos que sean&nbsp; mercanc&iacute;as irrevocables no-tangibles, no realizamos reembolsos despu&eacute;s de que se env&iacute;e el producto, usted tiene la responsabilidad de entender antes de comprarlo. &nbsp;Le pedimos que lea cuidadosamente antes de comprarlo. Hacemos solamente excepciones con esta regla cuando la descripci&oacute;n no se ajusta al producto. Hay algunos productos que pudieran tener garant&iacute;a y posibilidad de reembolso pero este ser&aacute; especificado al comprar el producto. En tales casos la garant&iacute;a solo cubrir&aacute; fallas de f&aacute;brica y s&oacute;lo se har&aacute; efectiva cuando el producto se haya usado correctamente. La garant&iacute;a no cubre aver&iacute;as o da&ntilde;os ocasionados por uso indebido. Los t&eacute;rminos de la garant&iacute;a est&aacute;n asociados a fallas de fabricaci&oacute;n y funcionamiento en condiciones normales de los productos y s&oacute;lo se har&aacute;n efectivos estos t&eacute;rminos si el equipo ha sido usado correctamente. Esto incluye:</p>\\r\\n\\r\\n<p>&ndash; De acuerdo a las especificaciones t&eacute;cnicas indicadas para cada producto.<br />\\r\\n&ndash; En condiciones ambientales acorde con las especificaciones indicadas por el fabricante.<br />\\r\\n&ndash; En uso espec&iacute;fico para la funci&oacute;n con que fue dise&ntilde;ado de f&aacute;brica.<br />\\r\\n&ndash; En condiciones de operaci&oacute;n el&eacute;ctricas acorde con las especificaciones y tolerancias indicadas.</p>\\r\\n\\r\\n<p><strong>COMPROBACI&Oacute;N ANTIFRAUDE</strong></p>\\r\\n\\r\\n<p>La compra del cliente puede ser aplazada para la comprobaci&oacute;n antifraude. Tambi&eacute;n puede ser suspendida por m&aacute;s tiempo para una investigaci&oacute;n m&aacute;s rigurosa, para evitar transacciones fraudulentas.</p>\\r\\n\\r\\n<p><strong>PRIVACIDAD</strong></p>\\r\\n\\r\\n<p>Este <a href=\\\"https://antiguamarmoleria.com.ar/\\\" target=\\\"_blank\\\">sitio web</a> https://antiguamarmoleria.com.ar/ garantiza que la informaci&oacute;n personal que usted env&iacute;a cuenta con la seguridad necesaria. Los datos ingresados por usuario o en el caso de requerir una validaci&oacute;n de los pedidos no ser&aacute;n entregados a terceros, salvo que deba ser revelada en cumplimiento a una orden judicial o requerimientos legales.</p>\\r\\n\\r\\n<p>La suscripci&oacute;n a boletines de correos electr&oacute;nicos publicitarios es voluntaria y podr&iacute;a ser seleccionada al momento de crear su cuenta.</p>\\r\\n\\r\\n<p>Antigua Marmoleria reserva los derechos de cambiar o de modificar estos t&eacute;rminos sin previo aviso.</p>\", \"titulo\": \"Términos y condiciones de uso\"}', 0, '2020-05-21 08:08:20', '2020-05-22 13:59:36'),
(2, 'empresa', '{\"texto\": \"<p>En sus orígenes Antigua Marmoleria, se dedicaba principalmente a las esculturas y ornamentaciones&nbsp;de&nbsp;fachadas de edificios públicos y privados en la Capital Federal de principios del siglo XX, ministerios, bancos, así como también una fuerte intervención en los principales cementerios de la Zona Norte como el de Recoleta en la confección de mausoleos y arte funerario, algo muy utilizado en la primera mitad del siglo pasado.&nbsp;</p>\\r\\n\\r\\n<p>Mientras tanto y en crecimiento constante, Antigua Marmoleria acompaño el desarrollo de los municipios de San Fernando, los vecinos de San Isidro, Tigre, Vicente López y CABA&nbsp;en los emprendimientos privados de vivienda unifamiliar o multifamiliar, ya sea en sus cocinas, baños, escaleras, pisos, estufas hogares, revestimientos de paredes, hall de entradas, revestimiento de fachadas y edificios comerciales como tanto en su interior como exterior, bancos privados o estatales, locales comerciales de distintos rubros y dimensiones.&nbsp;</p>\\r\\n\\r\\n<p>En los últimos 30 años, Antigua&nbsp;Marmoleria se especializa fundamentalmente en obras de grandes emprendimientos así como también la vivienda unifamiliar destacándose por la calidad de sus materiales y detalles de terminación, todo esto sustentado en la especial atención que se le da al proceso de fabricación, mano de obra artesanal y maquinaria de corte y lustrado de última generación que garantiza la calidad del trabajo, otro factor que consideración es la importancia que se la da a la pronta realización de los trabajos, para darle tranquilidad al cliente respecto a q no sufra atrasos de obra...&nbsp;</p>\", \"mision\": {\"image\": {\"d\": {\"0\": 77, \"1\": 92, \"2\": 3, \"3\": \"width=\\\"77\\\" height=\\\"92\\\"\", \"bits\": 8, \"mime\": \"image/png\"}, \"e\": \"png\", \"i\": \"images/contenido/1590557138_image.png\", \"n\": \"1590557138_image\"}, \"texto\": \"<p>Superar las expectativas de nuestros clientes, convirtiendo sus propuestas en proyectos innovadores y en soluciones concretas que se destaquen por su materialidad.</p>\", \"titulo\": \"Misión\"}, \"titulo\": \"Historia\", \"vision\": {\"image\": {\"d\": {\"0\": 77, \"1\": 92, \"2\": 3, \"3\": \"width=\\\"77\\\" height=\\\"92\\\"\", \"bits\": 8, \"mime\": \"image/png\"}, \"e\": \"png\", \"i\": \"images/contenido/1590557138_image.png\", \"n\": \"1590557138_image\"}, \"texto\": \"<p>Generamos sistemas organizados de trabajo, de acuerdo a las normas vigentes, que apuntan a la calidad total. Contamos con el capital humano capacitado que se desempeña en cada área específica de trabajo: venta, medición en obra, planos en autocad, entrega y colocación.</p>\", \"titulo\": \"Visión\"}}', 0, '2020-05-27 08:14:58', '2020-05-27 08:25:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sections` json DEFAULT NULL,
  `emails` json DEFAULT NULL,
  `phones` json DEFAULT NULL,
  `addresses` json DEFAULT NULL,
  `social_networks` json DEFAULT NULL,
  `images` json DEFAULT NULL,
  `metadata` json DEFAULT NULL,
  `forms` json DEFAULT NULL,
  `headers` json DEFAULT NULL,
  `text` json DEFAULT NULL,
  `captcha` json DEFAULT NULL,
  `attention_schedule` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id`, `sections`, `emails`, `phones`, `addresses`, `social_networks`, `images`, `metadata`, `forms`, `headers`, `text`, `captcha`, `attention_schedule`, `created_at`, `updated_at`) VALUES
(1, '[{\"LINK\": \"/\", \"NAME\": \"Inicio\", \"SHOW\": \"0\", \"REQUEST\": [\"/\", \"/home\"], \"FUNCTION\": \"home\"}, {\"LINK\": \"/empresa\", \"NAME\": \"Empresa\", \"SHOW\": \"1\", \"REQUEST\": [\"empresa\"], \"FUNCTION\": \"empresa\"}, {\"LINK\": \"/presupuesto\", \"NAME\": \"Presupuesto\", \"SHOW\": \"1\", \"REQUEST\": [\"presupuesto\"], \"FUNCTION\": \"presupuesto\"}, {\"LINK\": \"/faq\", \"NAME\": \"FAQ\", \"SHOW\": \"1\", \"REQUEST\": [\"faq\"], \"FUNCTION\": \"faq\"}, {\"LINK\": \"/contacto\", \"NAME\": \"Contacto\", \"SHOW\": \"1\", \"REQUEST\": [\"contacto\"], \"FUNCTION\": \"contacto\"}]', '[{\"email\": \"info@antiguamarmoleria.com\", \"in_header\": \"1\"}]', '[{\"tipo\": \"tel\", \"is_link\": \"1\", \"visible\": \"(11) 4746 - 7664\", \"telefono\": \"1147467664\", \"in_header\": \"1\"}, {\"tipo\": \"tel\", \"is_link\": \"1\", \"visible\": \"(11) 4549-1327\", \"telefono\": \"1145491327\", \"in_header\": \"0\"}]', '{\"cp\": \"B1646CSD\", \"link\": \"https://goo.gl/maps/vkMozJu1NtDjEPrL6\", \"mapa\": \"<iframe src=\\\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3290.6157598245645!2d-58.56768468477472!3d-34.436513980503136!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bca57a0b87902f%3A0x1a8b315b1a9c860!2sAntigua%20Marmoler%C3%ADa!5e0!3m2!1ses!2sar!4v1590215441587!5m2!1ses!2sar\\\" width=\\\"600\\\" height=\\\"450\\\" frameborder=\\\"0\\\" style=\\\"border:0;\\\" allowfullscreen=\\\"\\\" aria-hidden=\\\"false\\\" tabindex=\\\"0\\\"></iframe>\", \"pais\": \"Argentina\", \"calle\": \"Gral. Lavalle\", \"altura\": \"138\", \"detalle\": \"\", \"localidad\": \"San Fernando\", \"provincia\": \"Buenos Aires\"}', '{\"1590098146\": {\"url\": \"https://www.facebook.com/antiguamarmoleria/\", \"redes\": \"facebook\", \"titulo\": \"Facebook\"}, \"1590098922\": {\"url\": \"https://www.instagram.com/antigua_marmoleria/\", \"redes\": \"instagram\", \"titulo\": \"Instagram\"}}', '{\"logo\": {\"d\": {\"0\": 235, \"1\": 109, \"2\": 3, \"3\": \"width=\\\"235\\\" height=\\\"109\\\"\", \"bits\": 8, \"mime\": \"image/png\"}, \"e\": \"png\", \"i\": \"images/empresa/logos/1590270098_logo.png\", \"n\": \"1590270098_logo\"}, \"favicon\": null, \"logoFooter\": {\"d\": {\"0\": 86, \"1\": 77, \"2\": 3, \"3\": \"width=\\\"86\\\" height=\\\"77\\\"\", \"bits\": 8, \"mime\": \"image/png\"}, \"e\": \"png\", \"i\": \"images/empresa/logos/1590215867_logoFooter.png\", \"n\": \"1590215867_logoFooter\"}}', '{\"faq\": {\"section\": \"faq\", \"keywords\": null, \"description\": null}, \"home\": {\"section\": \"home\", \"keywords\": \"home\", \"description\": \"home\"}, \"empresa\": {\"section\": \"empresa\", \"keywords\": null, \"description\": null}, \"contacto\": {\"section\": \"contacto\", \"keywords\": null, \"description\": null}, \"preguntas\": {\"section\": \"preguntas\", \"keywords\": null, \"description\": null}, \"productos\": {\"section\": \"productos\", \"keywords\": null, \"description\": null}, \"presupuesto\": {\"section\": \"presupuesto\", \"keywords\": null, \"description\": null}}', '{\"contacto\": \"corzo.pabloariel@gmail.com\", \"presupuesto\": \"corzo.pabloariel@gmail.com\"}', '[{\"icon\": \"<i class=\\\"far fa-envelope\\\"></i>\", \"type\": \"emails\", \"order\": \"1\", \"title\": \"Envíenos un Mensaje\", \"element\": \"0\"}, {\"icon\": \"<i class=\\\"fas fa-phone-alt\\\"></i>\", \"type\": \"phones\", \"order\": \"2\", \"title\": \"Información\", \"element\": \"0\"}, {\"icon\": \"<i class=\\\"far fa-clock\\\"></i>\", \"type\": \"attention_schedule\", \"order\": \"3\", \"title\": \"Horarios de atención\"}]', '{\"contacto\": \"<p>Ante cualquier consulta, solicitud de presupuesto, información acerca de alguna de nuestras líneas de productos, puede contactarse completando el siguiente formulario. Le responderemos a la brevedad.</p>\"}', '{\"public\": \"6LfIP_sUAAAAADNiVkM4cxumFbBBDJSjs92SGzdV\", \"private\": \"6LfIP_sUAAAAAILizWctMX6NiDPLi0yKJL-3H5H_\"}', 'Lun-Vie: 8:30 - 12:00 a 13:00 - 17:00 / Sáb: 8:30 - 13:00', '2020-05-21 08:25:54', '2020-05-27 09:20:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_slug` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sliders` json DEFAULT NULL,
  `resume` text COLLATE utf8mb4_unicode_ci,
  `answer` text COLLATE utf8mb4_unicode_ci,
  `elim` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `faqs`
--

INSERT INTO `faqs` (`id`, `order`, `title`, `title_slug`, `sliders`, `resume`, `answer`, `elim`, `created_at`, `updated_at`) VALUES
(1, 'aa', '¿Qué tipo de obras se pueden ejecutar con Antigua Marmolería?', 'que-tipo-de-obras-se-pueden-ejecutar-con-antigua-marmoleria', '[{\"image\": {\"d\": {\"0\": 203, \"1\": 204, \"2\": 3, \"3\": \"width=\\\"203\\\" height=\\\"204\\\"\", \"bits\": 8, \"mime\": \"image/png\"}, \"e\": \"png\", \"i\": \"images/faqs/1590456210_image.png\", \"n\": \"1590456210_image\"}, \"order\": \"1\"}]', '<p>Todo tipo de obras ya sean viviendas unifamiliares, viviendas colectivas, comerciales o de otra &iacute;ndole.</p>', NULL, 0, '2020-05-26 04:23:30', '2020-05-26 04:23:30'),
(2, 'bb', '¿Cuanto demoran en realizar y colocar mi mesada?', 'cuanto-demoran-en-realizar-y-colocar-mi-mesada', '[{\"image\": {\"d\": {\"0\": 204, \"1\": 204, \"2\": 3, \"3\": \"width=\\\"204\\\" height=\\\"204\\\"\", \"bits\": 8, \"mime\": \"image/png\"}, \"e\": \"png\", \"i\": \"images/faqs/1590456825_image.png\", \"n\": \"1590456825_image\"}, \"order\": \"1\"}]', '<p>Por lo general, nuestros tiempos son muy cortos, aproximadamente entre 48 y 72 hs seg&uacute;n el nivel de mesada que sea.</p>', NULL, 0, '2020-05-26 04:33:45', '2020-05-26 04:33:45'),
(3, 'cc', '¿Cual es la diferencia entre Silestone y Dekton?', 'cual-es-la-diferencia-entre-silestone-y-dekton', '[{\"image\": {\"d\": {\"0\": 1024, \"1\": 683, \"2\": 2, \"3\": \"width=\\\"1024\\\" height=\\\"683\\\"\", \"bits\": 8, \"mime\": \"image/jpeg\", \"channels\": 3}, \"e\": \"jpg\", \"i\": \"images/faqs/1590456889_image.jpg\", \"n\": \"1590456889_image\"}, \"order\": \"1\"}]', '<p>La diferencia esta en que Dekton no contiene resina en su composicion, lo cual es un producto 100% mineral, y resiste altas temperaturas, ademas de no mancharse ni rayarse, esta ultima no se aplica para las terminaciones pulidas sino que para las Sylk (Mate).</p>', NULL, 0, '2020-05-26 04:34:49', '2020-05-26 04:34:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`id`, `image`, `created_at`, `updated_at`) VALUES
(1, '{\"d\": {\"0\": 534, \"1\": 221, \"2\": 3, \"3\": \"width=\\\"534\\\" height=\\\"221\\\"\", \"bits\": 8, \"mime\": \"image/png\"}, \"e\": \"png\", \"i\": \"images/miscellaneous/signature.png\", \"n\": \"signature\"}', '2020-05-22 14:21:16', '2020-05-22 18:24:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` json DEFAULT NULL,
  `logo2` json DEFAULT NULL,
  `color` json DEFAULT NULL,
  `color_text` json DEFAULT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_slug` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `features` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `resume` text COLLATE utf8mb4_unicode_ci,
  `characteristics` json DEFAULT NULL,
  `sliders` json DEFAULT NULL,
  `advantage` json DEFAULT NULL,
  `is_destacado` tinyint(1) NOT NULL DEFAULT '0',
  `elim` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id`, `order`, `logo`, `logo2`, `color`, `color_text`, `title`, `title_slug`, `features`, `description`, `resume`, `characteristics`, `sliders`, `advantage`, `is_destacado`, `elim`, `created_at`, `updated_at`) VALUES
(1, 'bc', '{\"d\": {\"0\": 190, \"1\": 48, \"2\": 3, \"3\": \"width=\\\"190\\\" height=\\\"48\\\"\", \"bits\": 8, \"mime\": \"image/png\"}, \"e\": \"png\", \"i\": \"images/marcas/1590343501_logo.png\", \"n\": \"1590343501_logo\"}', '{\"d\": {\"0\": 300, \"1\": 73, \"2\": 3, \"3\": \"width=\\\"300\\\" height=\\\"73\\\"\", \"bits\": 8, \"mime\": \"image/png\"}, \"e\": \"png\", \"i\": \"images/marcas/1590561370_logo2.png\", \"n\": \"1590561370_logo2\"}', '{\"hsl\": \"invert(25%) sepia(84%) saturate(4311%) hue-rotate(339deg) brightness(98%) contrast(95%);\", \"color\": \"#f32644\"}', '{\"hsl\": \"invert(100%) sepia(0%) saturate(7447%) hue-rotate(133deg) brightness(113%) contrast(113%);\", \"color_text\": \"#ffffff\"}', 'SILESTONE', 'silestone', '<p>Silestone es una superficie no porosa y altamente resistente a las manchas de café, vino, jugo de limón, aceite de oliva, vinagre, maquillaje y muchos otros productos de uso diario.</p>\r\n\r\n<p>No resiste altas temperaturas.</p>', '<p>SILESTONE es la opción perfecta para mesadas de cocina y baño, ya que presentan una dureza extrema ideal para estos ambientes, donde el uso y desgaste son diarios. Además, se ofrecen amplias posibilidades de colores y texturas. Posee un estilo único y mínima necesidad de mantenimiento.</p>', '<p>Silestone está compuesto en un 94% de Cuarzo Natural, lo que le proporciona una dureza y una resistencia extraordinarias. Es una superficie excelente para encimeras de cocinas, baños, suelos y recubrimientos de paredes con mínimas juntas.</p>', '\"\"', NULL, NULL, 1, 0, '2020-05-24 21:05:01', '2020-05-27 16:12:26'),
(2, 'bd', '{\"d\": {\"0\": 214, \"1\": 48, \"2\": 3, \"3\": \"width=\\\"214\\\" height=\\\"48\\\"\", \"bits\": 8, \"mime\": \"image/png\"}, \"e\": \"png\", \"i\": \"images/marcas/1590389318_logo.png\", \"n\": \"1590389318_logo\"}', '{\"d\": {\"0\": 512, \"1\": 78, \"2\": 3, \"3\": \"width=\\\"512\\\" height=\\\"78\\\"\", \"bits\": 8, \"mime\": \"image/png\"}, \"e\": \"png\", \"i\": \"images/marcas/1590561384_logo2.png\", \"n\": \"1590561384_logo2\"}', '{\"hsl\": \"invert(38%) sepia(54%) saturate(433%) hue-rotate(159deg) brightness(91%) contrast(86%);\", \"color\": \"#3e6f8d\"}', '{\"hsl\": \"invert(100%) sepia(0%) saturate(7500%) hue-rotate(93deg) brightness(106%) contrast(106%);\", \"color_text\": \"#ffffff\"}', 'DEKTON', 'dekton', '<p>TSP &ndash; TECHNOLOGY OF SINTERIZED PARTICLES</p>\r\n\r\n<p>Dekton, la nueva superficie ultracompacta de Cosentino, utiliza en su fabricación la exclusiva tecnología &ldquo;TSP&rdquo;, un proceso tecnológico que supone una versión acelerada de los cambios metamórficos que sufre la piedra natural al exponerse durante milenios a alta presión y alta temperatura.</p>\r\n\r\n<p>La tecnología TSP sintetiza, de una forma absolutamente innovadora, procedimientos de las industrias tecnológicas más avanzadas. Una evolución que partiendo de aquellas, supone un salto tecnológico e industrial capaz de generar un proceso nuevo, un material revolucionario y un producto líder.</p>\r\n\r\n<p>La microscopía electrónica permite apreciar la nula porosidad del material, consecuencia del proceso de sinterización y ultracompactación exclusiva de DEKTON. Esa porosidad cero y la inexistencia de microdefectos causantes de tensiones o puntos débiles, generan la característica diferencial de DEKTON.</p>', '<p>Dekton es un material incombustible y presenta una muy buena resistencia a las altas temperaturas sin que se vea afectada su estética ni sus propiedades.</p>', '<p>DEKTON es una sofisticada mezcla de las materias primas que se utilizan para fabricar vidrios, porcelanatos de ultima generacion y superficies de cuarzo.Dekton ha sido diseñado para ser empleado en prácticamente todas las aplicaciones existentes en lo que respecta a superficies de construcción. Gracias al tamaño y la ligereza de Dekton (Tamaño hasta 320 x 144 cm) crecen exponencialmente las posibilidades de diseño en cocinas, baños, fachadas, paredes o pavimentos de alto tránsito.</p>', '\"<p>ULTRAOLOGY</p>\\r\\n\\r\\n<p>Ir más allá para lograr cotas más altas de calidad, de prestaciones, de exigencia, de rendimiento, eso es ultraology</p>\\r\\n\\r\\n<p>Dekton no sería posible sin este especial concepto de ultracompactación, de esta forma podemos fabricar superficies de un tamaño nunca visto, con un espesor muy fino y asegurando unas prestaciones extremas.</p>\\r\\n\\r\\n<p>La ultracompactación es responsable de las propiedades mecánicas del material. Este nivel de compactación contribuye de forma significativa a la baja porosidad del material, convirtiéndolo en un producto de un bajo mantenimiento y una larga duración. Todo en Dekton es extraordinario.</p>\\r\\n\\r\\n<p>Todo en Dekton es extraordinario. En primer lugar, para el desarrollo de Dekton, sinterizamos las materias primas a partir de componentes básicos para controlar completamente el aspecto y las propiedades de las partículas utilizadas en el proceso de fabricación. En el proceso se utilizan hasta 16 técnicas diferentes de decoración, que permiten un diseño tridimensional e infinidad de posibilidades estéticas.</p>\"', NULL, '[{\"image\": {\"d\": {\"0\": 84, \"1\": 84, \"2\": 3, \"3\": \"width=\\\"84\\\" height=\\\"84\\\"\", \"bits\": 8, \"mime\": \"image/png\"}, \"e\": \"png\", \"i\": \"images/marcas/1590389855_image.png\", \"n\": \"1590389855_image\"}, \"order\": \"1\", \"title\": \"Alta resistencia a los rayos uv\", \"details\": \"\"}, {\"image\": {\"d\": {\"0\": 85, \"1\": 84, \"2\": 3, \"3\": \"width=\\\"85\\\" height=\\\"84\\\"\", \"bits\": 8, \"mime\": \"image/png\"}, \"e\": \"png\", \"i\": \"images/marcas/1590591254_image_1.png\", \"n\": \"1590591254_image_1\"}, \"order\": \"2\", \"title\": \"Altamente resistente al rayado\", \"details\": \"\"}, {\"image\": {\"d\": {\"0\": 88, \"1\": 84, \"2\": 3, \"3\": \"width=\\\"88\\\" height=\\\"84\\\"\", \"bits\": 8, \"mime\": \"image/png\"}, \"e\": \"png\", \"i\": \"images/marcas/1590591254_image_2.png\", \"n\": \"1590591254_image_2\"}, \"order\": \"3\", \"title\": \"Resistencia a las manchas\", \"details\": \"\"}, {\"image\": {\"d\": {\"0\": 63, \"1\": 88, \"2\": 3, \"3\": \"width=\\\"63\\\" height=\\\"88\\\"\", \"bits\": 8, \"mime\": \"image/png\"}, \"e\": \"png\", \"i\": \"images/marcas/1590591254_image_3.png\", \"n\": \"1590591254_image_3\"}, \"order\": \"4\", \"title\": \"Alta resistencia al fuego y al calor\", \"details\": \"\"}, {\"image\": {\"d\": {\"0\": 89, \"1\": 88, \"2\": 3, \"3\": \"width=\\\"89\\\" height=\\\"88\\\"\", \"bits\": 8, \"mime\": \"image/png\"}, \"e\": \"png\", \"i\": \"images/marcas/1590593190_image_4.png\", \"n\": \"1590593190_image_4\"}, \"order\": \"5\", \"title\": \"Resistencia a la abrasión\", \"details\": \"\"}, {\"image\": {\"d\": {\"0\": 89, \"1\": 88, \"2\": 3, \"3\": \"width=\\\"89\\\" height=\\\"88\\\"\", \"bits\": 8, \"mime\": \"image/png\"}, \"e\": \"png\", \"i\": \"images/marcas/1590593666_image_5.png\", \"n\": \"1590593666_image_5\"}, \"order\": \"6\", \"title\": \"Resistencia al hielo y deshielo\", \"details\": \"\"}, {\"image\": {\"d\": {\"0\": 63, \"1\": 90, \"2\": 3, \"3\": \"width=\\\"63\\\" height=\\\"90\\\"\", \"bits\": 8, \"mime\": \"image/png\"}, \"e\": \"png\", \"i\": \"images/marcas/1590593666_image_6.png\", \"n\": \"1590593666_image_6\"}, \"order\": \"7\", \"title\": \"Resistencia mecánica\", \"details\": \"\"}, {\"image\": {\"d\": {\"0\": 64, \"1\": 90, \"2\": 3, \"3\": \"width=\\\"64\\\" height=\\\"90\\\"\", \"bits\": 8, \"mime\": \"image/png\"}, \"e\": \"png\", \"i\": \"images/marcas/1590593666_image_7.png\", \"n\": \"1590593666_image_7\"}, \"order\": \"8\", \"title\": \"Material no poroso\", \"details\": \"\"}, {\"image\": {\"d\": {\"0\": 81, \"1\": 90, \"2\": 3, \"3\": \"width=\\\"81\\\" height=\\\"90\\\"\", \"bits\": 8, \"mime\": \"image/png\"}, \"e\": \"png\", \"i\": \"images/marcas/1590593666_image_8.png\", \"n\": \"1590593666_image_8\"}, \"order\": \"9\", \"title\": \"Estabilidad del color\", \"details\": \"\"}, {\"image\": {\"d\": {\"0\": 99, \"1\": 100, \"2\": 3, \"3\": \"width=\\\"99\\\" height=\\\"100\\\"\", \"bits\": 8, \"mime\": \"image/png\"}, \"e\": \"png\", \"i\": \"images/marcas/1590593666_image_9.png\", \"n\": \"1590593666_image_9\"}, \"order\": \"10\", \"title\": \"Estabilidad dimensional\", \"details\": \"\"}, {\"image\": {\"d\": {\"0\": 74, \"1\": 100, \"2\": 3, \"3\": \"width=\\\"74\\\" height=\\\"100\\\"\", \"bits\": 8, \"mime\": \"image/png\"}, \"e\": \"png\", \"i\": \"images/marcas/1590593666_image_10.png\", \"n\": \"1590593666_image_10\"}, \"order\": \"11\", \"title\": \"Alta resistencia a la hidrólisis\", \"details\": \"\"}, {\"image\": {\"d\": {\"0\": 72, \"1\": 100, \"2\": 3, \"3\": \"width=\\\"72\\\" height=\\\"100\\\"\", \"bits\": 8, \"mime\": \"image/png\"}, \"e\": \"png\", \"i\": \"images/marcas/1590593666_image_11.png\", \"n\": \"1590593666_image_11\"}, \"order\": \"12\", \"title\": \"Material incombustible\", \"details\": \"\"}]', 1, 0, '2020-05-25 09:48:38', '2020-05-27 18:34:26'),
(3, 'aa', NULL, NULL, '{\"hsl\": \"invert(0%) sepia(0%) saturate(10%) hue-rotate(321deg) brightness(100%) contrast(100%);\", \"color\": \"#000000\"}', '{\"hsl\": \"invert(0%) sepia(3%) saturate(7%) hue-rotate(77deg) brightness(101%) contrast(100%);\", \"color_text\": \"#000000\"}', 'GRANITOS IMPORTADOS', 'granitos-importados', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2020-05-25 10:41:47', '2020-05-26 02:16:36'),
(4, 'ab', NULL, NULL, '{\"hsl\": \"invert(0%) sepia(1%) saturate(7482%) hue-rotate(185deg) brightness(106%) contrast(100%);\", \"color\": \"#000000\"}', '{\"hsl\": \"invert(0%) sepia(1%) saturate(7482%) hue-rotate(185deg) brightness(106%) contrast(100%);\", \"color_text\": \"#000000\"}', 'GRANITOS NACIONALES', 'granitos-nacionales', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2020-05-25 10:42:25', '2020-05-25 10:42:25'),
(5, 'bb', NULL, NULL, '{\"hsl\": \"invert(0%) sepia(4%) saturate(18%) hue-rotate(100deg) brightness(104%) contrast(104%);\", \"color\": \"#000000\"}', '{\"hsl\": \"invert(100%) sepia(3%) saturate(12%) hue-rotate(357deg) brightness(102%) contrast(105%);\", \"color_text\": \"#ffffff\"}', 'MÁRMOLES', 'marmoles', '', '', '<p>Distinguido material natural, con características únicas como tus espacios</p>', NULL, NULL, NULL, 0, 0, '2020-05-25 10:43:12', '2020-05-27 10:37:58'),
(6, 'be', '{\"d\": {\"0\": 144, \"1\": 48, \"2\": 3, \"3\": \"width=\\\"144\\\" height=\\\"48\\\"\", \"bits\": 8, \"mime\": \"image/png\"}, \"e\": \"png\", \"i\": \"images/marcas/1590392774_logo.png\", \"n\": \"1590392774_logo\"}', '{\"d\": {\"0\": 94, \"1\": 30, \"2\": 3, \"3\": \"width=\\\"94\\\" height=\\\"30\\\"\", \"bits\": 8, \"mime\": \"image/png\"}, \"e\": \"png\", \"i\": \"images/marcas/1590561397_logo2.png\", \"n\": \"1590561397_logo2\"}', '{\"hsl\": \"invert(85%) sepia(94%) saturate(503%) hue-rotate(328deg) brightness(97%) contrast(102%);\", \"color\": \"#fbd537\"}', '{\"hsl\": \"invert(0%) sepia(27%) saturate(5113%) hue-rotate(245deg) brightness(112%) contrast(101%);\", \"color_text\": \"#000000\"}', 'NEOLITH', 'neolith', '<p>Su ligereza y grandes dimensiones lo convierten además, en un material idóneo para proyectos de Rehabilitación pudiéndose aplicar directamente sobre la superficie ya existente, ahorrando en costes y tiempos de manipulación.</p>', '<p>NEOLITH es el nuevo referente para cualquier proyecto arquitectónico, un producto diseñado para revolucionar el mundo del diseño y la construcción.<br />\r\nSin resinas. No desprende ninguna sustancia nociva para el entorno.</p>', '<p>Neolith presenta tres grandes formatos de 3.200 x 1.500, 3.600 x 1.200 mm y el nuevo 3.200 x 1.600 mm, lo que se traduce en mayor uniformidad y continuidad en los distintos espacios, facilitando su manipulación y minimizando el número de juntas, lo que aporta mayores ventajas estéticas e higiénicas.</p>', '\"\"', NULL, '[{\"image\": {\"d\": {\"0\": 67, \"1\": 90, \"2\": 3, \"3\": \"width=\\\"67\\\" height=\\\"90\\\"\", \"bits\": 8, \"mime\": \"image/png\"}, \"e\": \"png\", \"i\": \"images/marcas/1590594193_image_0.png\", \"n\": \"1590594193_image_0\"}, \"order\": \"1\", \"title\": \"RESISTENTE A LAS ALTAS TEMPERATURAS\", \"details\": \"<p>No se quema en contacto con el fuego ni emite humo ni sustancias tóxicas.</p>\"}, {\"image\": {\"d\": {\"0\": 67, \"1\": 90, \"2\": 3, \"3\": \"width=\\\"67\\\" height=\\\"90\\\"\", \"bits\": 8, \"mime\": \"image/png\"}, \"e\": \"png\", \"i\": \"images/marcas/1590594193_image_1.png\", \"n\": \"1590594193_image_1\"}, \"order\": \"2\", \"title\": \"RESISTENTE A LOS RAYOS UV\", \"details\": \"\"}, {\"image\": {\"d\": {\"0\": 67, \"1\": 90, \"2\": 3, \"3\": \"width=\\\"67\\\" height=\\\"90\\\"\", \"bits\": 8, \"mime\": \"image/png\"}, \"e\": \"png\", \"i\": \"images/marcas/1590594193_image_2.png\", \"n\": \"1590594193_image_2\"}, \"order\": \"3\", \"title\": \"LIGERO\", \"details\": \"\"}, {\"image\": {\"d\": {\"0\": 67, \"1\": 90, \"2\": 3, \"3\": \"width=\\\"67\\\" height=\\\"90\\\"\", \"bits\": 8, \"mime\": \"image/png\"}, \"e\": \"png\", \"i\": \"images/marcas/1590594193_image_3.png\", \"n\": \"1590594193_image_3\"}, \"order\": \"4\", \"title\": \"RESISTENTE AL HIELO Y A LAS HELADAS\", \"details\": \"\"}, {\"image\": {\"d\": {\"0\": 67, \"1\": 90, \"2\": 3, \"3\": \"width=\\\"67\\\" height=\\\"90\\\"\", \"bits\": 8, \"mime\": \"image/png\"}, \"e\": \"png\", \"i\": \"images/marcas/1590594193_image_4.png\", \"n\": \"1590594193_image_4\"}, \"order\": \"5\", \"title\": \"RESISTENTE AL RAYADO\", \"details\": \"\"}, {\"image\": {\"d\": {\"0\": 69, \"1\": 90, \"2\": 3, \"3\": \"width=\\\"69\\\" height=\\\"90\\\"\", \"bits\": 8, \"mime\": \"image/png\"}, \"e\": \"png\", \"i\": \"images/marcas/1590594193_image_5.png\", \"n\": \"1590594193_image_5\"}, \"order\": \"6\", \"title\": \"FÁCIL DE LIMPIAR\", \"details\": \"\"}, {\"image\": {\"d\": {\"0\": 67, \"1\": 90, \"2\": 3, \"3\": \"width=\\\"67\\\" height=\\\"90\\\"\", \"bits\": 8, \"mime\": \"image/png\"}, \"e\": \"png\", \"i\": \"images/marcas/1590594193_image_6.png\", \"n\": \"1590594193_image_6\"}, \"order\": \"7\", \"title\": \"RESISTENTE A LA FLEXIÓN\", \"details\": \"\"}, {\"image\": {\"d\": {\"0\": 67, \"1\": 90, \"2\": 3, \"3\": \"width=\\\"67\\\" height=\\\"90\\\"\", \"bits\": 8, \"mime\": \"image/png\"}, \"e\": \"png\", \"i\": \"images/marcas/1590594193_image_7.png\", \"n\": \"1590594193_image_7\"}, \"order\": \"8\", \"title\": \"HIGIÉNICO\", \"details\": \"\"}, {\"image\": {\"d\": {\"0\": 67, \"1\": 94, \"2\": 3, \"3\": \"width=\\\"67\\\" height=\\\"94\\\"\", \"bits\": 8, \"mime\": \"image/png\"}, \"e\": \"png\", \"i\": \"images/marcas/1590594193_image_8.png\", \"n\": \"1590594193_image_8\"}, \"order\": \"9\", \"title\": \"APTO PARA EL ALTO TRÁNSITO\", \"details\": \"\"}, {\"image\": {\"d\": {\"0\": 67, \"1\": 94, \"2\": 3, \"3\": \"width=\\\"67\\\" height=\\\"94\\\"\", \"bits\": 8, \"mime\": \"image/png\"}, \"e\": \"png\", \"i\": \"images/marcas/1590594193_image_9.png\", \"n\": \"1590594193_image_9\"}, \"order\": \"10\", \"title\": \"100% NATURAL\", \"details\": \"\"}, {\"image\": {\"d\": {\"0\": 67, \"1\": 94, \"2\": 3, \"3\": \"width=\\\"67\\\" height=\\\"94\\\"\", \"bits\": 8, \"mime\": \"image/png\"}, \"e\": \"png\", \"i\": \"images/marcas/1590594193_image_10.png\", \"n\": \"1590594193_image_10\"}, \"order\": \"11\", \"title\": \"IMPERMEABLE\", \"details\": \"\"}, {\"image\": {\"d\": {\"0\": 67, \"1\": 94, \"2\": 3, \"3\": \"width=\\\"67\\\" height=\\\"94\\\"\", \"bits\": 8, \"mime\": \"image/png\"}, \"e\": \"png\", \"i\": \"images/marcas/1590594193_image_11.png\", \"n\": \"1590594193_image_11\"}, \"order\": \"12\", \"title\": \"100% RECICLABLE\", \"details\": \"\"}]', 1, 0, '2020-05-25 10:46:14', '2020-05-27 18:52:27'),
(7, 'cc', '{\"d\": {\"0\": 850, \"1\": 425, \"2\": 3, \"3\": \"width=\\\"850\\\" height=\\\"425\\\"\", \"bits\": 8, \"mime\": \"image/png\"}, \"e\": \"png\", \"i\": \"images/marcas/1590392981_logo.png\", \"n\": \"1590392981_logo\"}', '{\"d\": {\"0\": 701, \"1\": 285, \"2\": 3, \"3\": \"width=\\\"701\\\" height=\\\"285\\\"\", \"bits\": 8, \"mime\": \"image/png\"}, \"e\": \"png\", \"i\": \"images/marcas/1590561414_logo2.png\", \"n\": \"1590561414_logo2\"}', '{\"hsl\": \"invert(0%) sepia(4%) saturate(7466%) hue-rotate(324deg) brightness(94%) contrast(92%);\", \"color\": \"#0a0a0a\"}', '{\"hsl\": \"invert(0%) sepia(0%) saturate(7468%) hue-rotate(292deg) brightness(88%) contrast(107%);\", \"color_text\": \"#000000\"}', 'PURA STONE', 'pura-stone', '', '', '', NULL, NULL, NULL, 0, 0, '2020-05-25 10:49:41', '2020-05-27 09:36:54'),
(8, 'dd', '{\"d\": {\"0\": 225, \"1\": 225, \"2\": 3, \"3\": \"width=\\\"225\\\" height=\\\"225\\\"\", \"bits\": 8, \"mime\": \"image/png\"}, \"e\": \"png\", \"i\": \"images/marcas/1590393146_logo.png\", \"n\": \"1590393146_logo\"}', '{\"d\": {\"0\": 190, \"1\": 123, \"2\": 3, \"3\": \"width=\\\"190\\\" height=\\\"123\\\"\", \"bits\": 8, \"mime\": \"image/png\"}, \"e\": \"png\", \"i\": \"images/marcas/1590561428_logo2.png\", \"n\": \"1590561428_logo2\"}', '{\"hsl\": \"invert(37%) sepia(29%) saturate(3155%) hue-rotate(224deg) brightness(86%) contrast(79%);\", \"color\": \"#655cc9\"}', '{\"hsl\": \"invert(0%) sepia(8%) saturate(7500%) hue-rotate(275deg) brightness(109%) contrast(95%);\", \"color_text\": \"#000000\"}', 'MARMOTECH', 'marmotech', '', '', '', NULL, NULL, NULL, 1, 0, '2020-05-25 10:52:26', '2020-05-27 09:37:08'),
(9, 'ee', '{\"d\": {\"0\": 218, \"1\": 24, \"2\": 3, \"3\": \"width=\\\"218\\\" height=\\\"24\\\"\", \"bits\": 8, \"mime\": \"image/png\"}, \"e\": \"png\", \"i\": \"images/marcas/1590393327_logo.png\", \"n\": \"1590393327_logo\"}', '{\"d\": {\"0\": 218, \"1\": 24, \"2\": 3, \"3\": \"width=\\\"218\\\" height=\\\"24\\\"\", \"bits\": 8, \"mime\": \"image/png\"}, \"e\": \"png\", \"i\": \"images/marcas/1590561443_logo2.png\", \"n\": \"1590561443_logo2\"}', '{\"hsl\": \"invert(10%) sepia(7%) saturate(1826%) hue-rotate(161deg) brightness(90%) contrast(86%);\", \"color\": \"#20262a\"}', '{\"hsl\": \"invert(0%) sepia(95%) saturate(20%) hue-rotate(39deg) brightness(101%) contrast(107%);\", \"color_text\": \"#000000\"}', 'JOHNSON ACERO', 'johnson-acero', '', '', '', NULL, NULL, NULL, 0, 0, '2020-05-25 10:55:27', '2020-05-27 09:37:23'),
(10, 'ff', '{\"d\": {\"0\": 173, \"1\": 60, \"2\": 3, \"3\": \"width=\\\"173\\\" height=\\\"60\\\"\", \"bits\": 8, \"mime\": \"image/png\"}, \"e\": \"png\", \"i\": \"images/marcas/1590439539_logo.png\", \"n\": \"1590439539_logo\"}', '{\"d\": {\"0\": 550, \"1\": 241, \"2\": 3, \"3\": \"width=\\\"550\\\" height=\\\"241\\\"\", \"bits\": 8, \"mime\": \"image/png\"}, \"e\": \"png\", \"i\": \"images/marcas/1590561456_logo2.png\", \"n\": \"1590561456_logo2\"}', '{\"hsl\": \"invert(56%) sepia(5%) saturate(3302%) hue-rotate(168deg) brightness(90%) contrast(88%);\", \"color\": \"#5b89b4\"}', '{\"hsl\": \"invert(0%) sepia(95%) saturate(11%) hue-rotate(333deg) brightness(107%) contrast(100%);\", \"color_text\": \"#000000\"}', 'PIAZZA', 'piazza', '', '', '', '\"\"', NULL, NULL, 1, 0, '2020-05-25 23:45:39', '2020-05-27 16:23:55'),
(11, 'GG', '{\"d\": {\"0\": 332, \"1\": 96, \"2\": 3, \"3\": \"width=\\\"332\\\" height=\\\"96\\\"\", \"bits\": 8, \"mime\": \"image/png\"}, \"e\": \"png\", \"i\": \"images/marcas/1590439660_logo.png\", \"n\": \"1590439660_logo\"}', '{\"d\": {\"0\": 332, \"1\": 96, \"2\": 3, \"3\": \"width=\\\"332\\\" height=\\\"96\\\"\", \"bits\": 8, \"mime\": \"image/png\"}, \"e\": \"png\", \"i\": \"images/marcas/1590561469_logo2.png\", \"n\": \"1590561469_logo2\"}', '{\"hsl\": \"invert(56%) sepia(21%) saturate(2385%) hue-rotate(157deg) brightness(97%) contrast(92%);\", \"color\": \"#0faced\"}', '{\"hsl\": \"invert(0%) sepia(96%) saturate(0%) hue-rotate(108deg) brightness(93%) contrast(103%);\", \"color_text\": \"#000000\"}', 'FV', 'fv', '', '', '', NULL, NULL, NULL, 1, 0, '2020-05-25 23:47:40', '2020-05-27 09:37:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(6, '2014_10_12_000000_create_users_table', 1),
(7, '2014_10_12_100000_create_password_resets_table', 1),
(8, '2019_08_27_140449_create_contenidos_table', 1),
(9, '2019_08_27_144728_create_sliders_table', 1),
(10, '2019_10_21_104917_create_imagenes_table', 1),
(11, '2020_01_21_140014_create_empresa_table', 1),
(12, '2020_04_27_134908_create_popups_table', 1),
(14, '2020_05_24_160124_create_marcas_table', 2),
(15, '2020_05_24_213835_add_campos_marcas_table', 3),
(16, '2020_05_24_220040_add_color_text_marcas_table', 4),
(17, '2020_05_26_002021_create_faqs_table', 5),
(18, '2020_05_26_014307_create_productos_table', 6),
(20, '2020_05_26_114507_add_color_text_productos_table', 7),
(21, '2020_05_26_225454_add_producto_id_productos_table', 8),
(22, '2020_05_27_000653_add_text_empresa_table', 9),
(23, '2020_05_27_063049_add_image2_marca_table', 10),
(24, '2020_05_27_124419_add__marca_table', 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `popups`
--

CREATE TABLE `popups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` json DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `elim` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `marca_id` bigint(20) UNSIGNED DEFAULT NULL,
  `producto_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_slug` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `images` json DEFAULT NULL,
  `characteristics` json DEFAULT NULL,
  `color` json DEFAULT NULL,
  `color_text` json DEFAULT NULL,
  `elim` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `marca_id`, `producto_id`, `order`, `title`, `title_slug`, `images`, `characteristics`, `color`, `color_text`, `elim`, `created_at`, `updated_at`) VALUES
(1, 3, NULL, 'aa', 'Alpinus', 'alpinus', NULL, NULL, NULL, NULL, 0, '2020-05-26 20:12:21', '2020-05-26 20:16:44'),
(2, 3, NULL, 'ab', 'Negro Brasil Extra', 'negro-brasil-extra', NULL, NULL, NULL, NULL, 0, '2020-05-26 20:59:00', '2020-05-26 20:59:00'),
(3, 3, NULL, 'ac', 'Negro Absoluto Extra', 'negro-absoluto-extra', NULL, NULL, NULL, NULL, 0, '2020-05-26 20:59:26', '2020-05-26 20:59:26'),
(4, 3, NULL, 'ad', 'Amarillo Ornamental', 'amarillo-ornamental', NULL, NULL, NULL, NULL, 0, '2020-05-26 21:03:37', '2020-05-26 21:03:37'),
(5, 3, NULL, 'ae', 'Amarillo Santa Cecilia', 'amarillo-santa-cecilia', NULL, NULL, NULL, NULL, 0, '2020-05-26 21:04:00', '2020-05-26 21:04:00'),
(6, 3, NULL, 'af', 'Bianco Antico Star White', 'bianco-antico-star-white', NULL, NULL, NULL, NULL, 0, '2020-05-26 21:04:13', '2020-05-26 21:04:13'),
(7, 3, NULL, 'ag', 'Bianco Romano', 'bianco-romano', NULL, NULL, NULL, NULL, 0, '2020-05-26 21:04:28', '2020-05-26 21:04:28'),
(8, 3, NULL, 'ah', 'Black Forets', 'black-forets', NULL, NULL, NULL, NULL, 0, '2020-05-26 21:04:53', '2020-05-26 21:04:53'),
(9, 3, NULL, 'ai', 'Blanco Fortaleza', 'blanco-fortaleza', NULL, NULL, NULL, NULL, 0, '2020-05-26 21:05:09', '2020-05-26 21:05:09'),
(10, 3, NULL, 'aj', 'Blanco Paris', 'blanco-paris', NULL, NULL, NULL, NULL, 0, '2020-05-26 21:05:20', '2020-05-26 21:05:20'),
(11, 3, NULL, 'ak', 'Blizzard', 'blizzard', NULL, NULL, NULL, NULL, 0, '2020-05-26 21:05:32', '2020-05-26 21:05:32'),
(12, 3, NULL, 'al', 'Blue Pearl', 'blue-pearl', NULL, NULL, NULL, NULL, 0, '2020-05-26 21:05:46', '2020-05-26 21:05:46'),
(13, 3, NULL, 'am', 'Blue Fire', 'blue-fire', NULL, NULL, NULL, NULL, 0, '2020-05-26 21:05:57', '2020-05-26 21:05:57'),
(14, 3, NULL, 'an', 'Blue Marine', 'blue-marine', NULL, NULL, NULL, NULL, 0, '2020-05-26 21:06:08', '2020-05-26 21:06:08'),
(15, 3, NULL, 'ao', 'Blue Roma', 'blue-roma', NULL, NULL, NULL, NULL, 0, '2020-05-26 21:06:20', '2020-05-26 21:06:20'),
(16, 3, NULL, 'ap', 'Brasilian Red', 'brasilian-red', NULL, NULL, NULL, NULL, 0, '2020-05-26 21:06:30', '2020-05-26 21:06:30'),
(17, 3, NULL, 'aq', 'Brilliant Black', 'brilliant-black', NULL, NULL, NULL, NULL, 0, '2020-05-26 21:06:40', '2020-05-26 21:06:40'),
(18, 3, NULL, 'ar', 'Brown Star', 'brown-star', NULL, NULL, NULL, NULL, 0, '2020-05-26 21:06:50', '2020-05-26 21:06:50'),
(19, 3, NULL, 'as', 'Brown Antique', 'brown-antique', NULL, NULL, NULL, NULL, 0, '2020-05-26 21:07:15', '2020-05-26 21:07:15'),
(20, 3, NULL, 'at', 'Butterfly Extra', 'butterfly-extra', NULL, NULL, NULL, NULL, 0, '2020-05-26 23:22:37', '2020-05-26 23:22:37'),
(21, 3, NULL, 'au', 'Calacatta Bhoemia', 'calacatta-bhoemia', NULL, NULL, NULL, NULL, 0, '2020-05-26 23:22:50', '2020-05-26 23:22:50'),
(22, 3, NULL, 'av', 'Calacatta Quartz', 'calacatta-quartz', NULL, NULL, NULL, NULL, 0, '2020-05-26 23:23:32', '2020-05-26 23:23:32'),
(23, 3, NULL, 'avv', 'Caravelas White', 'caravelas-white', NULL, NULL, NULL, NULL, 0, '2020-05-26 23:23:45', '2020-05-26 23:23:45'),
(24, 3, NULL, 'ax', 'Cinza Grey', 'cinza-grey', NULL, NULL, NULL, NULL, 0, '2020-05-26 23:23:57', '2020-05-26 23:23:57'),
(25, 3, NULL, 'ay', 'Coffe Brown', 'coffe-brown', NULL, NULL, NULL, NULL, 0, '2020-05-26 23:24:11', '2020-05-26 23:24:11'),
(26, 3, NULL, 'az', 'Cosmus Brown', 'cosmus-brown', NULL, NULL, NULL, NULL, 0, '2020-05-26 23:24:22', '2020-05-26 23:24:22'),
(27, 4, NULL, 'aa', 'Negro Boreal', 'negro-boreal', NULL, NULL, NULL, NULL, 0, '2020-05-26 23:33:51', '2020-05-26 23:33:51'),
(28, 4, NULL, 'bb', 'Gris Perla', 'gris-perla', NULL, NULL, NULL, NULL, 0, '2020-05-26 23:35:07', '2020-05-26 23:35:07'),
(29, 4, NULL, 'cc', 'Gris Mara', 'gris-mara', NULL, NULL, NULL, NULL, 0, '2020-05-26 23:35:38', '2020-05-26 23:35:38'),
(30, 4, NULL, 'dd', 'Crema Julia', 'crema-julia', NULL, NULL, NULL, NULL, 0, '2020-05-26 23:35:47', '2020-05-26 23:35:47'),
(31, 4, NULL, 'ee', 'Black Cosmic', 'black-cosmic', NULL, NULL, NULL, NULL, 0, '2020-05-26 23:35:55', '2020-05-26 23:35:55'),
(32, 4, NULL, 'ff', 'Beige Mara (Marrón Coco)', 'beige-mara-marron-coco', NULL, NULL, NULL, NULL, 0, '2020-05-26 23:36:06', '2020-05-26 23:36:06'),
(33, 4, NULL, 'gg', 'Rosa de Salto', 'rosa-de-salto', NULL, NULL, NULL, NULL, 0, '2020-05-26 23:36:14', '2020-05-26 23:36:14'),
(34, 4, NULL, 'hh', 'Sierra Chica', 'sierra-chica', NULL, NULL, NULL, NULL, 0, '2020-05-26 23:36:22', '2020-05-26 23:36:22'),
(37, 4, NULL, 'ii', 'Labradorita', 'labradorita', NULL, NULL, NULL, NULL, 0, '2020-05-26 23:37:04', '2020-05-26 23:37:04'),
(38, 4, NULL, 'jj', 'San Felipe', 'san-felipe', NULL, NULL, NULL, NULL, 0, '2020-05-26 23:37:15', '2020-05-26 23:37:15'),
(52, 5, NULL, 'aa', 'Vogue Grey', 'vogue-grey', NULL, NULL, NULL, NULL, 0, '2020-05-27 00:09:51', '2020-05-27 00:09:51'),
(53, 5, NULL, 'ab', 'Verde Ramigiato', 'verde-ramigiato', NULL, NULL, NULL, NULL, 0, '2020-05-27 00:10:00', '2020-05-27 00:10:00'),
(54, 5, NULL, 'ac', 'Verde Oriental', 'verde-oriental', NULL, NULL, NULL, NULL, 0, '2020-05-27 00:10:24', '2020-05-27 00:10:24'),
(55, 5, NULL, 'ad', 'Verde Bosque', 'verde-bosque', NULL, NULL, NULL, NULL, 0, '2020-05-27 00:24:42', '2020-05-27 00:24:42'),
(56, 5, NULL, 'ae', 'Verde Alpe', 'verde-alpe', NULL, NULL, NULL, NULL, 0, '2020-05-27 00:24:53', '2020-05-27 00:24:53'),
(57, 5, NULL, 'af', 'Tundra Grey', 'tundra-grey', NULL, NULL, NULL, NULL, 0, '2020-05-27 00:25:03', '2020-05-27 00:25:03'),
(58, 5, NULL, 'ag', 'Travertino Turco al Agua Extra', 'travertino-turco-al-agua-extra', NULL, NULL, NULL, NULL, 0, '2020-05-27 00:25:39', '2020-05-27 00:25:39'),
(59, 5, NULL, 'ah', 'Travertino Turco a la Veta', 'travertino-turco-a-la-veta', NULL, NULL, NULL, NULL, 0, '2020-05-27 00:25:47', '2020-05-27 00:25:47'),
(60, 5, NULL, 'ai', 'Travertino Silver', 'travertino-silver', NULL, NULL, NULL, NULL, 0, '2020-05-27 00:25:56', '2020-05-27 00:25:56'),
(61, 5, NULL, 'aj', 'Travertino Romano a la Veta Rústico', 'travertino-romano-a-la-veta-rustico', NULL, NULL, NULL, NULL, 0, '2020-05-27 00:26:07', '2020-05-27 00:26:07'),
(62, 5, NULL, 'ak', 'Travertino Black Apomazado', 'travertino-black-apomazado', NULL, NULL, NULL, NULL, 0, '2020-05-27 00:26:22', '2020-05-27 00:26:22'),
(63, 5, NULL, 'al', 'Silver Grey', 'silver-grey', NULL, NULL, NULL, NULL, 0, '2020-05-27 00:26:30', '2020-05-27 00:26:30'),
(64, 5, NULL, 'am', 'Rosso Verona', 'rosso-verona', NULL, NULL, NULL, NULL, 0, '2020-05-27 00:26:37', '2020-05-27 00:26:37'),
(65, 5, NULL, 'an', 'Rosso Levanto', 'rosso-levanto', NULL, NULL, NULL, NULL, 0, '2020-05-27 00:26:45', '2020-05-27 00:26:45'),
(66, 5, NULL, 'añ', 'Rojo Alicante', 'rojo-alicante', NULL, NULL, NULL, NULL, 0, '2020-05-27 00:26:58', '2020-05-27 00:26:58'),
(67, 5, NULL, 'ao', 'Portoro Extra', 'portoro-extra', NULL, NULL, NULL, NULL, 0, '2020-05-27 00:27:04', '2020-05-27 00:27:04'),
(68, 5, NULL, 'ap', 'Pietra Serena', 'pietra-serena', NULL, NULL, NULL, NULL, 0, '2020-05-27 00:27:12', '2020-05-27 00:27:12'),
(69, 5, NULL, 'aq', 'Piedra Jura Grey', 'piedra-jura-grey', NULL, NULL, NULL, NULL, 0, '2020-05-27 00:27:19', '2020-05-27 00:27:19'),
(70, 5, NULL, 'ar', 'Piedra Jura Beige', 'piedra-jura-beige', NULL, NULL, NULL, NULL, 0, '2020-05-27 00:27:33', '2020-05-27 00:27:33'),
(71, 5, NULL, 'as', 'Perlado', 'perlado', NULL, NULL, NULL, NULL, 0, '2020-05-27 00:27:39', '2020-05-27 00:27:39'),
(72, 5, NULL, 'at', 'Onyx Striato', 'onyx-striato', NULL, NULL, NULL, NULL, 0, '2020-05-27 00:27:46', '2020-05-27 00:27:46'),
(73, 5, NULL, 'au', 'Onyx Miele', 'onyx-miele', NULL, NULL, NULL, NULL, 0, '2020-05-27 00:27:55', '2020-05-27 00:27:55'),
(74, 5, NULL, 'av', 'Onyx Light Green', 'onyx-light-green', NULL, NULL, NULL, NULL, 0, '2020-05-27 00:28:04', '2020-05-27 00:28:04'),
(75, 1, NULL, 'aa', 'Grupo 0', 'grupo-0', NULL, '[{\"data\": \"8,00 mm/12,00 mm/20,00 mm\", \"icon\": \"<i class=\\\"fas fa-ruler-combined\\\"></i>\", \"order\": \"1\", \"title\": \"Medida\"}, {\"data\": \"Alta/Media/Baja\", \"icon\": \"<i class=\\\"fas fa-water\\\"></i>\", \"order\": \"2\", \"title\": \"Absorción del agua\"}, {\"data\": \"Interior/Exterior\", \"icon\": \"<i class=\\\"fas fa-street-view\\\"></i>\", \"order\": \"3\", \"title\": \"Uso sugerido\"}, {\"data\": \"Apto/No apto\", \"icon\": \"<i class=\\\"fas fa-exchange-alt\\\"></i>\", \"order\": \"4\", \"title\": \"Alto tránsito\"}, {\"data\": \"Pulido/Flameado/Leather/Apomasado\", \"icon\": \"<i class=\\\"fas fa-asterisk\\\"></i>\", \"order\": \"5\", \"title\": \"Terminaciones\"}, {\"data\": \"Tablas/Marmetas\", \"icon\": \"<i class=\\\"fab fa-modx\\\"></i>\", \"order\": \"6\", \"title\": \"Módulos\"}]', NULL, NULL, 0, '2020-05-27 00:43:38', '2020-05-27 00:43:38'),
(76, 1, NULL, 'bb', 'GRUPO 1', 'grupo-1', NULL, '[{\"data\": \"8,00 mm/12,00 mm/20,00 mm\", \"icon\": \"<i class=\\\"fas fa-ruler-combined\\\"></i>\", \"order\": \"1\", \"title\": \"Medida\"}, {\"data\": \"Alta/Media/Baja\", \"icon\": \"<i class=\\\"fas fa-water\\\"></i>\", \"order\": \"2\", \"title\": \"Absorción del agua\"}, {\"data\": \"Interior/Exterior\", \"icon\": \"<i class=\\\"fas fa-street-view\\\"></i>\", \"order\": \"3\", \"title\": \"Uso sugerido\"}, {\"data\": \"Apto/No apto\", \"icon\": \"<i class=\\\"fas fa-exchange-alt\\\"></i>\", \"order\": \"4\", \"title\": \"Alto tránsito\"}, {\"data\": \"Pulido/Flameado/Leather/Apomasado\", \"icon\": \"<i class=\\\"fas fa-asterisk\\\"></i>\", \"order\": \"5\", \"title\": \"Terminaciones\"}, {\"data\": \"Tablas/Marmetas\", \"icon\": \"<i class=\\\"fab fa-modx\\\"></i>\", \"order\": \"6\", \"title\": \"Módulos\"}]', NULL, NULL, 0, '2020-05-27 01:27:37', '2020-05-27 01:27:37'),
(77, 1, NULL, 'cc', 'GRUPO 2', 'grupo-2', NULL, '[{\"data\": \"8,00 mm/12,00 mm/20,00 mm\", \"icon\": \"<i class=\\\"fas fa-ruler-combined\\\"></i>\", \"order\": \"1\", \"title\": \"Medida\"}, {\"data\": \"Alta/Media/Baja\", \"icon\": \"<i class=\\\"fas fa-water\\\"></i>\", \"order\": \"2\", \"title\": \"Absorción del agua\"}, {\"data\": \"Interior/Exterior\", \"icon\": \"<i class=\\\"fas fa-street-view\\\"></i>\", \"order\": \"3\", \"title\": \"Uso sugerido\"}, {\"data\": \"Apto/No apto\", \"icon\": \"<i class=\\\"fas fa-exchange-alt\\\"></i>\", \"order\": \"4\", \"title\": \"Alto tránsito\"}, {\"data\": \"Pulido/Flameado/Leather/Apomasado\", \"icon\": \"<i class=\\\"fas fa-asterisk\\\"></i>\", \"order\": \"5\", \"title\": \"Terminaciones\"}, {\"data\": \"Tablas/Marmetas\", \"icon\": \"<i class=\\\"fab fa-modx\\\"></i>\", \"order\": \"6\", \"title\": \"Módulos\"}]', NULL, NULL, 0, '2020-05-27 01:30:08', '2020-05-27 01:30:37'),
(78, 1, NULL, 'de', 'GRUPO 3', 'grupo-3', NULL, '[{\"data\": \"8,00 mm/12,00 mm/20,00 mm\", \"icon\": \"<i class=\\\"fas fa-ruler-combined\\\"></i>\", \"order\": \"1\", \"title\": \"Medida\"}, {\"data\": \"Alta/Media/Baja\", \"icon\": \"<i class=\\\"fas fa-water\\\"></i>\", \"order\": \"2\", \"title\": \"Absorción del agua\"}, {\"data\": \"Interior/Exterior\", \"icon\": \"<i class=\\\"fas fa-street-view\\\"></i>\", \"order\": \"3\", \"title\": \"Uso sugerido\"}, {\"data\": \"Apto/No apto\", \"icon\": \"<i class=\\\"fas fa-exchange-alt\\\"></i>\", \"order\": \"4\", \"title\": \"Alto tránsito\"}, {\"data\": \"Pulido/Flameado/Leather/Apomasado\", \"icon\": \"<i class=\\\"fas fa-asterisk\\\"></i>\", \"order\": \"5\", \"title\": \"Terminaciones\"}, {\"data\": \"Tablas/Marmetas\", \"icon\": \"<i class=\\\"fab fa-modx\\\"></i>\", \"order\": \"6\", \"title\": \"Módulos\"}]', NULL, NULL, 0, '2020-05-27 01:31:20', '2020-05-27 01:31:20'),
(79, 1, NULL, 'df', 'GRUPO 4', 'grupo-4', NULL, '[{\"data\": \"8,00 mm/12,00 mm/20,00 mm\", \"icon\": \"<i class=\\\"fas fa-ruler-combined\\\"></i>\", \"order\": \"1\", \"title\": \"Medida\"}, {\"data\": \"Alta/Media/Baja\", \"icon\": \"<i class=\\\"fas fa-water\\\"></i>\", \"order\": \"2\", \"title\": \"Absorción del agua\"}, {\"data\": \"Interior/Exterior\", \"icon\": \"<i class=\\\"fas fa-street-view\\\"></i>\", \"order\": \"3\", \"title\": \"Uso sugerido\"}, {\"data\": \"Apto/No apto\", \"icon\": \"<i class=\\\"fas fa-exchange-alt\\\"></i>\", \"order\": \"4\", \"title\": \"Alto tránsito\"}, {\"data\": \"Pulido/Flameado/Leather/Apomasado\", \"icon\": \"<i class=\\\"fas fa-asterisk\\\"></i>\", \"order\": \"5\", \"title\": \"Terminaciones\"}, {\"data\": \"Tablas/Marmetas\", \"icon\": \"<i class=\\\"fab fa-modx\\\"></i>\", \"order\": \"6\", \"title\": \"Módulos\"}]', NULL, NULL, 0, '2020-05-27 01:32:40', '2020-05-27 01:32:40'),
(80, 1, NULL, 'dg', 'GRUPO 5', 'grupo-5', NULL, '[{\"data\": \"8,00 mm/12,00 mm/20,00 mm\", \"icon\": \"<i class=\\\"fas fa-ruler-combined\\\"></i>\", \"order\": \"1\", \"title\": \"Medida\"}, {\"data\": \"Alta/Media/Baja\", \"icon\": \"<i class=\\\"fas fa-water\\\"></i>\", \"order\": \"2\", \"title\": \"Absorción del agua\"}, {\"data\": \"Interior/Exterior\", \"icon\": \"<i class=\\\"fas fa-street-view\\\"></i>\", \"order\": \"3\", \"title\": \"Uso sugerido\"}, {\"data\": \"Apto/No apto\", \"icon\": \"<i class=\\\"fas fa-exchange-alt\\\"></i>\", \"order\": \"4\", \"title\": \"Alto tránsito\"}, {\"data\": \"Pulido/Flameado/Leather/Apomasado\", \"icon\": \"<i class=\\\"fas fa-asterisk\\\"></i>\", \"order\": \"5\", \"title\": \"Terminaciones\"}, {\"data\": \"Tablas/Marmetas\", \"icon\": \"<i class=\\\"fab fa-modx\\\"></i>\", \"order\": \"6\", \"title\": \"Módulos\"}]', NULL, NULL, 0, '2020-05-27 01:33:07', '2020-05-27 01:33:07'),
(81, 1, NULL, 'dj', 'GRUPO 6', 'grupo-6', NULL, '[{\"data\": \"8,00 mm/12,00 mm/20,00 mm\", \"icon\": \"<i class=\\\"fas fa-ruler-combined\\\"></i>\", \"order\": \"1\", \"title\": \"Medida\"}, {\"data\": \"Alta/Media/Baja\", \"icon\": \"<i class=\\\"fas fa-water\\\"></i>\", \"order\": \"2\", \"title\": \"Absorción del agua\"}, {\"data\": \"Interior/Exterior\", \"icon\": \"<i class=\\\"fas fa-street-view\\\"></i>\", \"order\": \"3\", \"title\": \"Uso sugerido\"}, {\"data\": \"Apto/No apto\", \"icon\": \"<i class=\\\"fas fa-exchange-alt\\\"></i>\", \"order\": \"4\", \"title\": \"Alto tránsito\"}, {\"data\": \"Pulido/Flameado/Leather/Apomasado\", \"icon\": \"<i class=\\\"fas fa-asterisk\\\"></i>\", \"order\": \"5\", \"title\": \"Terminaciones\"}, {\"data\": \"Tablas/Marmetas\", \"icon\": \"<i class=\\\"fab fa-modx\\\"></i>\", \"order\": \"6\", \"title\": \"Módulos\"}]', NULL, NULL, 0, '2020-05-27 01:33:42', '2020-05-27 01:33:42'),
(82, 1, NULL, 'ee', 'GRUPO 7', 'grupo-7', NULL, '[{\"data\": \"8,00 mm/12,00 mm/20,00 mm\", \"icon\": \"<i class=\\\"fas fa-ruler-combined\\\"></i>\", \"order\": \"1\", \"title\": \"Medida\"}, {\"data\": \"Alta/Media/Baja\", \"icon\": \"<i class=\\\"fas fa-water\\\"></i>\", \"order\": \"2\", \"title\": \"Absorción del agua\"}, {\"data\": \"Interior/Exterior\", \"icon\": \"<i class=\\\"fas fa-street-view\\\"></i>\", \"order\": \"3\", \"title\": \"Uso sugerido\"}, {\"data\": \"Apto/No apto\", \"icon\": \"<i class=\\\"fas fa-exchange-alt\\\"></i>\", \"order\": \"4\", \"title\": \"Alto tránsito\"}, {\"data\": \"Pulido/Flameado/Leather/Apomasado\", \"icon\": \"<i class=\\\"fas fa-asterisk\\\"></i>\", \"order\": \"5\", \"title\": \"Terminaciones\"}, {\"data\": \"Tablas/Marmetas\", \"icon\": \"<i class=\\\"fab fa-modx\\\"></i>\", \"order\": \"6\", \"title\": \"Módulos\"}]', NULL, NULL, 0, '2020-05-27 01:34:10', '2020-05-27 01:34:10'),
(83, 1, NULL, 'ff', 'GRUPO 8', 'grupo-8', NULL, '[{\"data\": \"8,00 mm/12,00 mm/20,00 mm\", \"icon\": \"<i class=\\\"fas fa-ruler-combined\\\"></i>\", \"order\": \"1\", \"title\": \"Medida\"}, {\"data\": \"Alta/Media/Baja\", \"icon\": \"<i class=\\\"fas fa-water\\\"></i>\", \"order\": \"2\", \"title\": \"Absorción del agua\"}, {\"data\": \"Interior/Exterior\", \"icon\": \"<i class=\\\"fas fa-street-view\\\"></i>\", \"order\": \"3\", \"title\": \"Uso sugerido\"}, {\"data\": \"Apto/No apto\", \"icon\": \"<i class=\\\"fas fa-exchange-alt\\\"></i>\", \"order\": \"4\", \"title\": \"Alto tránsito\"}, {\"data\": \"Pulido/Flameado/Leather/Apomasado\", \"icon\": \"<i class=\\\"fas fa-asterisk\\\"></i>\", \"order\": \"5\", \"title\": \"Terminaciones\"}, {\"data\": \"Tablas/Marmetas\", \"icon\": \"<i class=\\\"fab fa-modx\\\"></i>\", \"order\": \"6\", \"title\": \"Módulos\"}]', NULL, NULL, 0, '2020-05-27 01:34:29', '2020-05-27 01:34:29'),
(84, 1, NULL, 'kk', 'SERIE ETERNAL', 'serie-eternal', NULL, '[{\"data\": \"8,00 mm/12,00 mm/20,00 mm\", \"icon\": \"<i class=\\\"fas fa-ruler-combined\\\"></i>\", \"order\": \"1\", \"title\": \"Medida\"}, {\"data\": \"Alta/Media/Baja\", \"icon\": \"<i class=\\\"fas fa-water\\\"></i>\", \"order\": \"2\", \"title\": \"Absorción del agua\"}, {\"data\": \"Interior/Exterior\", \"icon\": \"<i class=\\\"fas fa-street-view\\\"></i>\", \"order\": \"3\", \"title\": \"Uso sugerido\"}, {\"data\": \"Apto/No apto\", \"icon\": \"<i class=\\\"fas fa-exchange-alt\\\"></i>\", \"order\": \"4\", \"title\": \"Alto tránsito\"}, {\"data\": \"Pulido/Flameado/Leather/Apomasado\", \"icon\": \"<i class=\\\"fas fa-asterisk\\\"></i>\", \"order\": \"5\", \"title\": \"Terminaciones\"}, {\"data\": \"Tablas/Marmetas\", \"icon\": \"<i class=\\\"fab fa-modx\\\"></i>\", \"order\": \"6\", \"title\": \"Módulos\"}]', NULL, NULL, 0, '2020-05-27 01:34:50', '2020-05-27 01:34:50'),
(85, 1, NULL, 'll', 'SERIE SUEDE', 'serie-suede', NULL, '[{\"data\": \"8,00 mm/12,00 mm/20,00 mm\", \"icon\": \"<i class=\\\"fas fa-ruler-combined\\\"></i>\", \"order\": \"1\", \"title\": \"Medida\"}, {\"data\": \"Alta/Media/Baja\", \"icon\": \"<i class=\\\"fas fa-water\\\"></i>\", \"order\": \"2\", \"title\": \"Absorción del agua\"}, {\"data\": \"Interior/Exterior\", \"icon\": \"<i class=\\\"fas fa-street-view\\\"></i>\", \"order\": \"3\", \"title\": \"Uso sugerido\"}, {\"data\": \"Apto/No apto\", \"icon\": \"<i class=\\\"fas fa-exchange-alt\\\"></i>\", \"order\": \"4\", \"title\": \"Alto tránsito\"}, {\"data\": \"Pulido/Flameado/Leather/Apomasado\", \"icon\": \"<i class=\\\"fas fa-asterisk\\\"></i>\", \"order\": \"5\", \"title\": \"Terminaciones\"}, {\"data\": \"Tablas/Marmetas\", \"icon\": \"<i class=\\\"fab fa-modx\\\"></i>\", \"order\": \"6\", \"title\": \"Módulos\"}]', NULL, NULL, 0, '2020-05-27 01:35:02', '2020-05-27 01:35:02'),
(88, 2, NULL, 'aa', 'Grupo 0', 'grupo-0', NULL, '[{\"data\": \"8,00 mm/12,00 mm/20,00 mm\", \"icon\": \"<i class=\\\"fas fa-ruler-combined\\\"></i>\", \"order\": \"1\", \"title\": \"Medida\"}, {\"data\": \"Alta/Media/Baja\", \"icon\": \"<i class=\\\"fas fa-water\\\"></i>\", \"order\": \"2\", \"title\": \"Absorción del agua\"}, {\"data\": \"Interior/Exterior\", \"icon\": \"<i class=\\\"fas fa-street-view\\\"></i>\", \"order\": \"3\", \"title\": \"Uso sugerido\"}, {\"data\": \"Apto/No apto\", \"icon\": \"<i class=\\\"fas fa-exchange-alt\\\"></i>\", \"order\": \"4\", \"title\": \"Alto tránsito\"}, {\"data\": \"Pulido/Flameado/Leather/Apomasado\", \"icon\": \"<i class=\\\"fas fa-asterisk\\\"></i>\", \"order\": \"5\", \"title\": \"Terminaciones\"}, {\"data\": \"Tablas/Marmetas\", \"icon\": \"<i class=\\\"fab fa-modx\\\"></i>\", \"order\": \"6\", \"title\": \"Módulos\"}]', NULL, NULL, 0, '2020-05-27 01:47:15', '2020-05-27 01:47:15'),
(89, 2, NULL, 'bb', 'Grupo I', 'grupo-i', NULL, '[{\"data\": \"8,00 mm/12,00 mm/20,00 mm\", \"icon\": \"<i class=\\\"fas fa-ruler-combined\\\"></i>\", \"order\": \"1\", \"title\": \"Medida\"}, {\"data\": \"Alta/Media/Baja\", \"icon\": \"<i class=\\\"fas fa-water\\\"></i>\", \"order\": \"2\", \"title\": \"Absorción del agua\"}, {\"data\": \"Interior/Exterior\", \"icon\": \"<i class=\\\"fas fa-street-view\\\"></i>\", \"order\": \"3\", \"title\": \"Uso sugerido\"}, {\"data\": \"Apto/No apto\", \"icon\": \"<i class=\\\"fas fa-exchange-alt\\\"></i>\", \"order\": \"4\", \"title\": \"Alto tránsito\"}, {\"data\": \"Pulido/Flameado/Leather/Apomasado\", \"icon\": \"<i class=\\\"fas fa-asterisk\\\"></i>\", \"order\": \"5\", \"title\": \"Terminaciones\"}, {\"data\": \"Tablas/Marmetas\", \"icon\": \"<i class=\\\"fab fa-modx\\\"></i>\", \"order\": \"6\", \"title\": \"Módulos\"}]', NULL, NULL, 0, '2020-05-27 01:49:03', '2020-05-27 01:49:03'),
(90, 2, NULL, 'cc', 'Grupo II', 'grupo-ii', NULL, '[{\"data\": \"8,00 mm/12,00 mm/20,00 mm\", \"icon\": \"<i class=\\\"fas fa-ruler-combined\\\"></i>\", \"order\": \"1\", \"title\": \"Medida\"}, {\"data\": \"Alta/Media/Baja\", \"icon\": \"<i class=\\\"fas fa-water\\\"></i>\", \"order\": \"2\", \"title\": \"Absorción del agua\"}, {\"data\": \"Interior/Exterior\", \"icon\": \"<i class=\\\"fas fa-street-view\\\"></i>\", \"order\": \"3\", \"title\": \"Uso sugerido\"}, {\"data\": \"Apto/No apto\", \"icon\": \"<i class=\\\"fas fa-exchange-alt\\\"></i>\", \"order\": \"4\", \"title\": \"Alto tránsito\"}, {\"data\": \"Pulido/Flameado/Leather/Apomasado\", \"icon\": \"<i class=\\\"fas fa-asterisk\\\"></i>\", \"order\": \"5\", \"title\": \"Terminaciones\"}, {\"data\": \"Tablas/Marmetas\", \"icon\": \"<i class=\\\"fab fa-modx\\\"></i>\", \"order\": \"6\", \"title\": \"Módulos\"}]', NULL, NULL, 0, '2020-05-27 01:49:41', '2020-05-27 01:49:41'),
(91, 2, NULL, 'dd', 'Grupo III', 'grupo-iii', NULL, '[{\"data\": \"8,00 mm/12,00 mm/20,00 mm\", \"icon\": \"<i class=\\\"fas fa-ruler-combined\\\"></i>\", \"order\": \"1\", \"title\": \"Medida\"}, {\"data\": \"Alta/Media/Baja\", \"icon\": \"<i class=\\\"fas fa-water\\\"></i>\", \"order\": \"2\", \"title\": \"Absorción del agua\"}, {\"data\": \"Interior/Exterior\", \"icon\": \"<i class=\\\"fas fa-street-view\\\"></i>\", \"order\": \"3\", \"title\": \"Uso sugerido\"}, {\"data\": \"Apto/No apto\", \"icon\": \"<i class=\\\"fas fa-exchange-alt\\\"></i>\", \"order\": \"4\", \"title\": \"Alto tránsito\"}, {\"data\": \"Pulido/Flameado/Leather/Apomasado\", \"icon\": \"<i class=\\\"fas fa-asterisk\\\"></i>\", \"order\": \"5\", \"title\": \"Terminaciones\"}, {\"data\": \"Tablas/Marmetas\", \"icon\": \"<i class=\\\"fab fa-modx\\\"></i>\", \"order\": \"6\", \"title\": \"Módulos\"}]', NULL, NULL, 0, '2020-05-27 01:50:11', '2020-05-27 01:50:11'),
(92, 2, NULL, 'ee', 'Grupo IV', 'grupo-iv', NULL, '[{\"data\": \"8,00 mm/12,00 mm/20,00 mm\", \"icon\": \"<i class=\\\"fas fa-ruler-combined\\\"></i>\", \"order\": \"1\", \"title\": \"Medida\"}, {\"data\": \"Alta/Media/Baja\", \"icon\": \"<i class=\\\"fas fa-water\\\"></i>\", \"order\": \"2\", \"title\": \"Absorción del agua\"}, {\"data\": \"Interior/Exterior\", \"icon\": \"<i class=\\\"fas fa-street-view\\\"></i>\", \"order\": \"3\", \"title\": \"Uso sugerido\"}, {\"data\": \"Apto/No apto\", \"icon\": \"<i class=\\\"fas fa-exchange-alt\\\"></i>\", \"order\": \"4\", \"title\": \"Alto tránsito\"}, {\"data\": \"Pulido/Flameado/Leather/Apomasado\", \"icon\": \"<i class=\\\"fas fa-asterisk\\\"></i>\", \"order\": \"5\", \"title\": \"Terminaciones\"}, {\"data\": \"Tablas/Marmetas\", \"icon\": \"<i class=\\\"fab fa-modx\\\"></i>\", \"order\": \"6\", \"title\": \"Módulos\"}]', NULL, NULL, 0, '2020-05-27 01:50:39', '2020-05-27 01:50:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` text COLLATE utf8mb4_unicode_ci,
  `image` json DEFAULT NULL,
  `section` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `elim` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sliders`
--

INSERT INTO `sliders` (`id`, `order`, `text`, `image`, `section`, `elim`, `created_at`, `updated_at`) VALUES
(1, 'aa', '<p>Dise&ntilde;os a&nbsp;medida</p>\r\n\r\n<p><a href=\"http://localhost:8000/presupuesto\">PRESUPUESTO</a></p>', '{\"d\": {\"0\": 1400, \"1\": 650, \"2\": 3, \"3\": \"width=\\\"1400\\\" height=\\\"650\\\"\", \"bits\": 8, \"mime\": \"image/png\"}, \"e\": \"png\", \"i\": \"images/sliders/1590244227_image.png\", \"n\": \"1590244227_image\"}', 'home', 0, '2020-05-23 17:30:27', '2020-05-23 18:00:39'),
(2, 'aa', NULL, '{\"d\": {\"0\": 1400, \"1\": 399, \"2\": 3, \"3\": \"width=\\\"1400\\\" height=\\\"399\\\"\", \"bits\": 8, \"mime\": \"image/png\"}, \"e\": \"png\", \"i\": \"images/sliders/1590246160_image.png\", \"n\": \"1590246160_image\"}', 'empresa', 0, '2020-05-23 18:02:40', '2020-05-23 18:02:40'),
(3, NULL, NULL, '{\"d\": {\"0\": 1400, \"1\": 399, \"2\": 3, \"3\": \"width=\\\"1400\\\" height=\\\"399\\\"\", \"bits\": 8, \"mime\": \"image/png\"}, \"e\": \"png\", \"i\": \"images/sliders/1590250954_image.png\", \"n\": \"1590250954_image\"}', 'home', 1, '2020-05-23 19:22:34', '2020-05-23 19:22:47'),
(4, NULL, NULL, '{\"d\": {\"0\": 1920, \"1\": 700, \"2\": 2, \"3\": \"width=\\\"1920\\\" height=\\\"700\\\"\", \"bits\": 8, \"mime\": \"image/jpeg\", \"channels\": 3}, \"e\": \"jpg\", \"i\": \"images/portadas/1590541360_image.jpg\", \"n\": \"1590541360_image\"}', 'por_contacto', 0, '2020-05-27 04:02:40', '2020-05-27 04:02:40'),
(5, NULL, NULL, '{\"d\": {\"0\": 1400, \"1\": 650, \"2\": 3, \"3\": \"width=\\\"1400\\\" height=\\\"650\\\"\", \"bits\": 8, \"mime\": \"image/png\"}, \"e\": \"png\", \"i\": \"images/portadas/1590541931_image.png\", \"n\": \"1590541931_image\"}', 'por_faq', 0, '2020-05-27 04:12:11', '2020-05-27 04:12:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` int(11) NOT NULL DEFAULT '0',
  `login` timestamp NULL DEFAULT NULL,
  `image` json DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`, `type`, `login`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Pablo Corzo', 'corzo.pabloariel@gmail.com', 'pablo', '$2y$10$.TV1Cypc9bs6ih1Q5iW29eoozFtyF/YcyQnK2GfjUtGbMGP47EggK', 1, '2020-05-27 15:40:28', '{\"d\": {\"0\": 1440, \"1\": 1436, \"2\": 2, \"3\": \"width=\\\"1440\\\" height=\\\"1436\\\"\", \"bits\": 8, \"mime\": \"image/jpeg\", \"channels\": 3}, \"e\": \"jpg\", \"i\": \"images/usuarios/82001744_2288228878135504_1766619597596786688_o.jpg\", \"n\": \"82001744_2288228878135504_1766619597596786688_o\"}', NULL, NULL, '2020-05-27 15:40:28'),
(2, 'Nicolas Casanovas', 'info@antiguamarmoleria.com', 'nicolas', '$2y$10$hAydNkeKowImVB4fl0Ris.1VAKVHqp.EiuZJhHSlUMPpO.VvDSK4K', 1, NULL, NULL, NULL, '2020-05-21 07:01:05', '2020-05-27 15:41:07');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contenidos`
--
ALTER TABLE `contenidos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `faqs_title_unique` (`title`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `marcas_title_unique` (`title`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `popups`
--
ALTER TABLE `popups`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `productos_title_unique` (`title`,`marca_id`) USING BTREE,
  ADD KEY `marca_id` (`marca_id`) USING BTREE,
  ADD KEY `productos_producto_id_foreign` (`producto_id`);

--
-- Indices de la tabla `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contenidos`
--
ALTER TABLE `contenidos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT de la tabla `popups`
--
ALTER TABLE `popups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;
--
-- AUTO_INCREMENT de la tabla `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_marca_id_foreign` FOREIGN KEY (`marca_id`) REFERENCES `marcas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `productos_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
