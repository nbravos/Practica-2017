-- phpMyAdmin SQL Dump
-- version 4.0.10.17
-- https://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 17-01-2017 a las 12:52:40
-- Versión del servidor: 5.5.52
-- Versión de PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `bd_constructora`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `afp`
--

CREATE TABLE IF NOT EXISTS `afp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) NOT NULL,
  `porcentaje` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

CREATE TABLE IF NOT EXISTS `asistencia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_trabajador` int(11) NOT NULL,
  `horas` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `avance`
--

CREATE TABLE IF NOT EXISTS `avance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_partida` int(11) NOT NULL,
  `id_cuadrilla` int(11) NOT NULL,
  `cantidad` varchar(20) NOT NULL,
  `porcentaje` varchar(20) NOT NULL,
  `fecha_inicio` datetime NOT NULL,
  `fecha_termino` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `avance_pago`
--

CREATE TABLE IF NOT EXISTS `avance_pago` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_documento` int(11) NOT NULL,
  `monto` varchar(20) NOT NULL,
  `fecha` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banco`
--

CREATE TABLE IF NOT EXISTS `banco` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bono`
--

CREATE TABLE IF NOT EXISTS `bono` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bono_trabajador`
--

CREATE TABLE IF NOT EXISTS `bono_trabajador` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_trabajador` int(11) NOT NULL,
  `id_bono` int(11) NOT NULL,
  `monto` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comuna`
--

CREATE TABLE IF NOT EXISTS `comuna` (
  `id` int(5) NOT NULL DEFAULT '0',
  `nombre` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `comuna`
--

INSERT INTO `comuna` (`id`, `nombre`) VALUES
(1101, 'Iquique'),
(1107, 'Alto Hospicio'),
(1401, 'Pozo Almonte'),
(1402, 'Camiña'),
(1403, 'Colchane'),
(1404, 'Huara'),
(1405, 'Pica'),
(2101, 'Antofagasta'),
(2102, 'Mejillones'),
(2103, 'Sierra Gorda'),
(2104, 'Taltal'),
(2201, 'Calama'),
(2202, 'Ollagüe'),
(2203, 'San Pedro de Atacama'),
(2301, 'Tocopilla'),
(2302, 'María Elena'),
(3101, 'Copiapó'),
(3102, 'Caldera'),
(3103, 'Tierra Amarilla'),
(3201, 'Chañaral'),
(3202, 'Diego de Almagro'),
(3301, 'Vallenar'),
(3302, 'Alto del Carmen'),
(3303, 'Freirina'),
(3304, 'Huasco'),
(4101, 'La Serena'),
(4102, 'Coquimbo'),
(4103, 'Andacollo'),
(4104, 'La Higuera'),
(4105, 'Paihuano'),
(4106, 'Vicuña'),
(4201, 'Illapel'),
(4202, 'Canela'),
(4203, 'Los Vilos'),
(4204, 'Salamanca'),
(4301, 'Ovalle'),
(4302, 'Combarbalá'),
(4303, 'Monte Patria'),
(4304, 'Punitaqui'),
(4305, 'Río Hurtado'),
(5101, 'Valparaíso'),
(5102, 'Casablanca'),
(5103, 'Concón'),
(5104, 'Juan Fernández'),
(5105, 'Puchuncaví'),
(5107, 'Quintero'),
(5109, 'Viña del Mar'),
(5201, 'Isla de Pascua'),
(5301, 'Los Andes'),
(5302, 'Calle Larga'),
(5303, 'Rinconada'),
(5304, 'San Esteban'),
(5401, 'La Ligua'),
(5402, 'Cabildo'),
(5403, 'Papudo'),
(5404, 'Petorca'),
(5405, 'Zapallar'),
(5501, 'Quillota'),
(5502, 'La Calera'),
(5503, 'Hijuelas'),
(5504, 'La Cruz'),
(5506, 'Nogales'),
(5601, 'San Antonio'),
(5602, 'Algarrobo'),
(5603, 'Cartagena'),
(5604, 'El Quisco'),
(5605, 'El Tabo'),
(5606, 'Santo Domingo'),
(5701, 'San Felipe'),
(5702, 'Catemu'),
(5703, 'Llay Llay'),
(5704, 'Panquehue'),
(5705, 'Putaendo'),
(5706, 'Santa María'),
(5801, 'Quilpué'),
(5802, 'Limache'),
(5803, 'Olmué'),
(5804, 'Villa Alemana'),
(6101, 'Rancagua'),
(6102, 'Codegua'),
(6103, 'Coinco'),
(6104, 'Coltauco'),
(6105, 'Doñihue'),
(6106, 'Graneros'),
(6107, 'Las Cabras'),
(6108, 'Machalí'),
(6109, 'Malloa'),
(6110, 'Mostazal'),
(6111, 'Olivar'),
(6112, 'Peumo'),
(6113, 'Pichidegua'),
(6114, 'Quinta de Tilcoco'),
(6115, 'Rengo'),
(6116, 'Requínoa'),
(6117, 'San Vicente'),
(6201, 'Pichilemu'),
(6202, 'La Estrella'),
(6203, 'Litueche'),
(6204, 'Marchihue'),
(6205, 'Navidad'),
(6206, 'Paredones'),
(6301, 'San Fernando'),
(6302, 'Chépica'),
(6303, 'Chimbarongo'),
(6304, 'Lolol'),
(6305, 'Nancagua'),
(6306, 'Palmilla'),
(6307, 'Peralillo'),
(6308, 'Placilla'),
(6309, 'Pumanque'),
(6310, 'Santa Cruz'),
(7101, 'Talca'),
(7102, 'Constitución'),
(7103, 'Curepto'),
(7104, 'Empedrado'),
(7105, 'Maule'),
(7106, 'Pelarco'),
(7107, 'Pencahue'),
(7108, 'Río Claro'),
(7109, 'San Clemente'),
(7110, 'San Rafael'),
(7201, 'Cauquenes'),
(7202, 'Chanco'),
(7203, 'Pelluhue'),
(7301, 'Curicó'),
(7302, 'Hualañé'),
(7303, 'Licantén'),
(7304, 'Molina'),
(7305, 'Rauco'),
(7306, 'Romeral'),
(7307, 'Sagrada Familia'),
(7308, 'Teno'),
(7309, 'Vichuquén'),
(7401, 'Linares'),
(7402, 'Colbún'),
(7403, 'Longaví'),
(7404, 'Parral'),
(7405, 'Retiro'),
(7406, 'San Javier'),
(7407, 'Villa Alegre'),
(7408, 'Yerbas Buenas'),
(8101, 'Concepción'),
(8102, 'Coronel'),
(8103, 'Chiguayante'),
(8104, 'Florida'),
(8105, 'Hualqui'),
(8106, 'Lota'),
(8107, 'Penco'),
(8108, 'San Pedro de la Paz'),
(8109, 'Santa Juana'),
(8110, 'Talcahuano'),
(8111, 'Tomé'),
(8112, 'Hualpén'),
(8201, 'Lebu'),
(8202, 'Arauco'),
(8203, 'Cañete'),
(8204, 'Contulmo'),
(8205, 'Curanilahue'),
(8206, 'Los Álamos'),
(8207, 'Tirúa'),
(8301, 'Los Ángeles'),
(8302, 'Antuco'),
(8303, 'Cabrero'),
(8304, 'Laja'),
(8305, 'Mulchén'),
(8306, 'Nacimiento'),
(8307, 'Negrete'),
(8308, 'Quilaco'),
(8309, 'Quilleco'),
(8310, 'San Rosendo'),
(8311, 'Santa Bárbara'),
(8312, 'Tucapel'),
(8313, 'Yumbel'),
(8314, 'Alto Biobío'),
(8401, 'Chillán'),
(8402, 'Bulnes'),
(8403, 'Cobquecura'),
(8404, 'Coelemu'),
(8405, 'Coihueco'),
(8406, 'Chillán Viejo'),
(8407, 'El Carmen'),
(8408, 'Ninhue'),
(8409, 'Ñiquén'),
(8410, 'Pemuco'),
(8411, 'Pinto'),
(8412, 'Portezuelo'),
(8413, 'Quillón'),
(8414, 'Quirihue'),
(8415, 'Ránquil'),
(8416, 'San Carlos'),
(8417, 'San Fabián'),
(8418, 'San Ignacio'),
(8419, 'San Nicolás'),
(8420, 'Treguaco'),
(8421, 'Yungay'),
(9101, 'Temuco'),
(9102, 'Carahue'),
(9103, 'Cunco'),
(9104, 'Curarrehue'),
(9105, 'Freire'),
(9106, 'Galvarino'),
(9107, 'Gorbea'),
(9108, 'Lautaro'),
(9109, 'Loncoche'),
(9110, 'Melipeuco'),
(9111, 'Nueva Imperial'),
(9112, 'Padre las Casas'),
(9113, 'Perquenco'),
(9114, 'Pitrufquén'),
(9115, 'Pucón'),
(9116, 'Saavedra'),
(9117, 'Teodoro Schmidt'),
(9118, 'Toltén'),
(9119, 'Vilcún'),
(9120, 'Villarrica'),
(9121, 'Cholchol'),
(9201, 'Angol'),
(9202, 'Collipulli'),
(9203, 'Curacautín'),
(9204, 'Ercilla'),
(9205, 'Lonquimay'),
(9206, 'Los Sauces'),
(9207, 'Lumaco'),
(9208, 'Purén'),
(9209, 'Renaico'),
(9210, 'Traiguén'),
(9211, 'Victoria'),
(10101, 'Puerto Montt'),
(10102, 'Calbuco'),
(10103, 'Cochamó'),
(10104, 'Fresia'),
(10105, 'Frutillar'),
(10106, 'Los Muermos'),
(10107, 'Llanquihue'),
(10108, 'Maullín'),
(10109, 'Puerto Varas'),
(10201, 'Castro'),
(10202, 'Ancud'),
(10203, 'Chonchi'),
(10204, 'Curaco de Vélez'),
(10205, 'Dalcahue'),
(10206, 'Puqueldón'),
(10207, 'Queilén'),
(10208, 'Quellón'),
(10209, 'Quemchi'),
(10210, 'Quinchao'),
(10301, 'Osorno'),
(10302, 'Puerto Octay'),
(10303, 'Purranque'),
(10304, 'Puyehue'),
(10305, 'Río Negro'),
(10306, 'San Juan de la Costa'),
(10307, 'San Pablo'),
(10401, 'Chaitén'),
(10402, 'Futaleufú'),
(10403, 'Hualaihué'),
(10404, 'Palena'),
(11101, 'Coyhaique'),
(11102, 'Lago Verde'),
(11201, 'Aysén'),
(11202, 'Cisnes'),
(11203, 'Guaitecas'),
(11301, 'Cochrane'),
(11302, 'O''Higgins'),
(11303, 'Tortel'),
(11401, 'Chile Chico'),
(11402, 'Río Ibáñez'),
(12101, 'Punta Arenas'),
(12102, 'Laguna Blanca'),
(12103, 'Río Verde'),
(12104, 'San Gregorio'),
(12201, 'Cabo de Hornos'),
(12202, 'Antártica'),
(12301, 'Porvenir'),
(12302, 'Primavera'),
(12303, 'Timaukel'),
(12401, 'Natales'),
(12402, 'Torres del Paine'),
(13101, 'Santiago'),
(13102, 'Cerrillos'),
(13103, 'Cerro Navia'),
(13104, 'Conchalí'),
(13105, 'El Bosque'),
(13106, 'Estación Central'),
(13107, 'Huechuraba'),
(13108, 'Independencia'),
(13109, 'La Cisterna'),
(13110, 'La Florida'),
(13111, 'La Granja'),
(13112, 'La Pintana'),
(13113, 'La Reina'),
(13114, 'Las Condes'),
(13115, 'Lo Barnechea'),
(13116, 'Lo Espejo'),
(13117, 'Lo Prado'),
(13118, 'Macul'),
(13119, 'Maipú'),
(13120, 'Ñuñoa'),
(13121, 'Pedro Aguirre Cerda'),
(13122, 'Peñalolén'),
(13123, 'Providencia'),
(13124, 'Pudahuel'),
(13125, 'Quilicura'),
(13126, 'Quinta Normal'),
(13127, 'Recoleta'),
(13128, 'Renca'),
(13129, 'San Joaquín'),
(13130, 'San Miguel'),
(13131, 'San Ramón'),
(13132, 'Vitacura'),
(13201, 'Puente Alto'),
(13202, 'Pirque'),
(13203, 'San José de Maipo'),
(13301, 'Colina'),
(13302, 'Lampa'),
(13303, 'Tiltil'),
(13401, 'San Bernardo'),
(13402, 'Buin'),
(13403, 'Calera de Tango'),
(13404, 'Paine'),
(13501, 'Melipilla'),
(13502, 'Alhué'),
(13503, 'Curacaví'),
(13504, 'María Pinto'),
(13505, 'San Pedro'),
(13601, 'Talagante'),
(13602, 'El Monte'),
(13603, 'Isla de Maipo'),
(13604, 'Padre Hurtado'),
(13605, 'Peñaflor'),
(14101, 'Valdivia'),
(14102, 'Corral'),
(14103, 'Lanco'),
(14104, 'Los Lagos'),
(14105, 'Máfil'),
(14106, 'Mariquina'),
(14107, 'Paillaco'),
(14108, 'Panguipulli'),
(14201, 'La Unión'),
(14202, 'Futrono'),
(14203, 'Lago Ranco'),
(14204, 'Río Bueno'),
(15101, 'Arica'),
(15102, 'Camarones'),
(15201, 'Putre'),
(15202, 'General Lagos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuadrilla`
--

CREATE TABLE IF NOT EXISTS `cuadrilla` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_partida` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuadrilla_equipo`
--

CREATE TABLE IF NOT EXISTS `cuadrilla_equipo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cuadrilla` int(11) NOT NULL,
  `id_equipo` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuadrilla_trabajador`
--

CREATE TABLE IF NOT EXISTS `cuadrilla_trabajador` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cuadrilla` int(11) NOT NULL,
  `id_trabajador` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuenta`
--

CREATE TABLE IF NOT EXISTS `cuenta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_empresa` int(11) NOT NULL,
  `id_banco` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `numero` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documento`
--

CREATE TABLE IF NOT EXISTS `documento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_orden` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `monto` varchar(20) NOT NULL,
  `no_contabilidad` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documento_item`
--

CREATE TABLE IF NOT EXISTS `documento_item` (
  `id` int(11) NOT NULL,
  `id_documento` int(11) NOT NULL,
  `id_item` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE IF NOT EXISTS `empresa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rut` varchar(20) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `razon_social` varchar(300) NOT NULL,
  `giro` varchar(300) NOT NULL,
  `nombre_contacto` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `web` varchar(50) NOT NULL,
  `tipo_empresa` int(11) NOT NULL,
  `tipo_proovedor` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

CREATE TABLE IF NOT EXISTS `equipo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) NOT NULL,
  `codigo` varchar(100) NOT NULL,
  `costo` varchar(100) NOT NULL,
  `descripcion` varchar(400) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cantidad` varchar(20) NOT NULL,
  `detalle` varchar(100) NOT NULL,
  `unidad` varchar(20) NOT NULL,
  `unitario` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantencion`
--

CREATE TABLE IF NOT EXISTS `mantencion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_equipo` int(11) NOT NULL,
  `tipo` varchar(500) NOT NULL,
  `fecha_inicio` datetime NOT NULL,
  `fecha_termino` datetime NOT NULL,
  `repuesto` varchar(500) NOT NULL,
  `valor_repuesto` varchar(50) NOT NULL,
  `lugar_repuesto` varchar(500) NOT NULL,
  `nombre_taller` varchar(500) NOT NULL,
  `valor_taller` varchar(50) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_compra`
--

CREATE TABLE IF NOT EXISTS `orden_compra` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_partida` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `id_empresa_cargo` int(11) NOT NULL,
  `numero` varchar(200) NOT NULL,
  `uf` varchar(30) NOT NULL,
  `condicion_pago` varchar(200) NOT NULL,
  `fecha_emision` datetime NOT NULL,
  `fecha_entrefa` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_item`
--

CREATE TABLE IF NOT EXISTS `orden_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_orden` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partida`
--

CREATE TABLE IF NOT EXISTS `partida` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_proyecto` int(11) NOT NULL,
  `item` varchar(10) NOT NULL,
  `detalle` varchar(200) NOT NULL,
  `unidad` varchar(50) NOT NULL,
  `cantidad` varchar(50) NOT NULL,
  `unitario` varchar(10) NOT NULL,
  `total` varchar(20) NOT NULL,
  `inicio_teorico` datetime DEFAULT NULL,
  `fin_teorico` datetime DEFAULT NULL,
  `inicio_real` datetime DEFAULT NULL,
  `fin_real` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posicion_equipo`
--

CREATE TABLE IF NOT EXISTS `posicion_equipo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_equipo` int(11) NOT NULL,
  `lat` varchar(10) NOT NULL,
  `lon` varchar(10) NOT NULL,
  `fecha` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto`
--

CREATE TABLE IF NOT EXISTS `proyecto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_empresa` int(11) NOT NULL,
  `id_comuna` int(11) NOT NULL,
  `tipo_licitacion` int(11) NOT NULL,
  `nombre` varchar(300) NOT NULL,
  `financiamiento` varchar(100) NOT NULL,
  `monto_disponible` varchar(100) NOT NULL,
  `monto_minimo_oferta` int(11) NOT NULL,
  `monto_ofertado` varchar(100) NOT NULL,
  `presupuesto_oficial` varchar(100) NOT NULL,
  `costos_directos` varchar(20) DEFAULT NULL,
  `costos_generales` varchar(20) DEFAULT NULL,
  `fecha_licitacion` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto_contratista`
--

CREATE TABLE IF NOT EXISTS `proyecto_contratista` (
  `id_proyecto` int(11) NOT NULL AUTO_INCREMENT,
  `id_empresa` int(11) NOT NULL,
  `monto_ofertado` varchar(50) NOT NULL,
  `bases` int(11) NOT NULL,
  PRIMARY KEY (`id_proyecto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salud`
--

CREATE TABLE IF NOT EXISTS `salud` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) NOT NULL,
  `porcentaje` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sueldo`
--

CREATE TABLE IF NOT EXISTS `sueldo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_trabajador` int(11) NOT NULL,
  `liquido` varchar(40) NOT NULL,
  `imponible` varchar(40) NOT NULL,
  `des_afp` varchar(40) NOT NULL,
  `des_salud` varchar(40) NOT NULL,
  `bonos` varchar(40) NOT NULL,
  `horas_extras` int(11) NOT NULL,
  `dias_trabajados` int(11) NOT NULL,
  `dias_no_trabajados` int(11) NOT NULL,
  `cesantia` varchar(40) NOT NULL,
  `fecha` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajador`
--

CREATE TABLE IF NOT EXISTS `trabajador` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) NOT NULL,
  `rut` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefono` varchar(40) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `id_afp` int(11) NOT NULL,
  `id_salud` int(11) NOT NULL,
  `fecha_nac` datetime DEFAULT NULL,
  `fecha` datetime NOT NULL,
  `foto` blob,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `salt` varchar(50) NOT NULL,
  `password` varchar(600) NOT NULL,
  `roles` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
