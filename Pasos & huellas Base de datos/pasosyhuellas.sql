-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-04-2023 a las 10:56:09
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pasosyhuellas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `cod_cargo` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `salario` double NOT NULL,
  `descripcion_cargo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`cod_cargo`, `nombre`, `salario`, `descripcion_cargo`) VALUES
(1, 'gerente', 1200000, 'Encargado de la tienda'),
(2, 'Vendedor', 1000000, 'encargado de las ventas '),
(3, 'Encargado de Almacén', 1200000, 'Encargado del almacen');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `cod_cliente` int(11) NOT NULL,
  `nombre1` varchar(25) NOT NULL,
  `nombre2` varchar(25) NOT NULL,
  `apellido1` varchar(25) NOT NULL,
  `apellido2` varchar(25) NOT NULL,
  `tipo_documento` enum('cc','ti','nit','rut') NOT NULL,
  `no_documento` varchar(25) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `telefono` varchar(25) NOT NULL,
  `correo_electronico` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`cod_cliente`, `nombre1`, `nombre2`, `apellido1`, `apellido2`, `tipo_documento`, `no_documento`, `direccion`, `telefono`, `correo_electronico`) VALUES
(1, 'Jeronimo', '', 'Burgos', 'Diez', 'cc', '1011082246', 'Calle 10b # 5-51', '0491 570 006', 'jeronimo@gmail.com'),
(2, 'Estefania', '', 'Villegas', 'Sierra', 'rut', '34317773', 'Avenida 19 No. 98-03, sexto piso, Edificio Torre 1', '0491 570 156', 'estefania@gmail.com'),
(3, 'Guillermo', 'Mauricio', 'Fernandez', 'Vallejo', 'cc', '104879334', 'Calle 53 No 10-60/46, Piso 2. ', '0491 570 157', 'Fernandez@hotmail.com'),
(4, 'Eliana', '', 'Ramirez', 'Guerrero', 'nit', '37258970', 'Avenida Calle 26 No 59-51 Edificio Argos - Torre 3', '0491 570 158', 'ramirez@gmail.com'),
(5, 'Jose', 'Gregorio', 'Carmona', 'Guerra', 'cc', '10590309', 'A Calle 9 # 9 – 62, Leticia, Barrio Centro', '0491 570 159', 'joseg@gmail.com'),
(6, 'Marcela', '', 'De santis', 'Rodríguez', 'cc', '10591897 ', 'Calle 19 # 80A-40. Barrio Belén La Nubia', '0491 570 110', 'Marcela@hotmail.com'),
(7, 'Daniela', '', 'Franco', 'Marulanda', 'cc', '76322684', 'Carrera 21 # 17 -63 ', '0491 570 313', 'danimarulanda@hotmail.com'),
(8, 'Rafael', '', 'Cortes', 'Palacio', 'cc', '10484544 ', 'A Carrera 42 # 54-77 Barrio El Recreo', '0491 570 737', 'rafacortez@gmail.com'),
(9, 'Camilo', 'Andres', 'Berrio', 'Bermudez', 'rut', '10549676 ', 'Calle 100 # 11B-27 Bogotá ', '0491 571 266', 'andrescamilo@gmail.com'),
(10, 'Francisco', '', 'Arias', 'Toledo', 'cc', '34552934', 'Carrera 20 B # 29-18. Barrio Pie de la Popa', '0491 571 491', 'franck@hotmai.com'),
(11, 'Antonio', 'Giovanny', 'Merizalde', 'Arango', 'cc', '10522913', 'Transversal 9 a No. 29 - 29 Barrio Maldonado', '0491 571 804', 'antony@gmail.com'),
(12, 'Karen', 'Rocio', 'Restrepo', 'Acevedo', 'cc', '76327873', 'Calle 53 # 25A-35 ', '0491 572 983', 'karen.rocio@gmail.com'),
(13, 'David', 'Santiago', 'Lemus', 'Cock', 'nit', '34538154', 'Carrera 20 B # 29-18. Barrio Pie de la Popa.  ', '0491 573 770', 'davidsa@hotmail.com'),
(14, 'Javier', 'Mauricio', 'Santana', 'Casadiegos', 'nit', '34531526 ', 'Calle 7 # 19-35 ', '0491 573 087', 'javisantana@gmail.com'),
(15, 'Virginia', '', 'Saldarriaga', 'Salamanca', 'cc', '10493464', 'Calle 4 norte # 10B-66 Barrio Modelo', '0491 574 118', 'viginiasalamanca@hotmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `despachos`
--

CREATE TABLE `despachos` (
  `cod_despacho` int(11) NOT NULL,
  `cod_factura_c` int(11) NOT NULL,
  `cod_empleado` int(11) NOT NULL,
  `fecha_expedicion` date NOT NULL,
  `fecha_entrega` date NOT NULL,
  `modo_entrega` enum('Parcial','Total') DEFAULT NULL,
  `guia_envio` varchar(30) NOT NULL,
  `observaciones` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `cod_empleado` int(11) NOT NULL,
  `nombre1` varchar(25) NOT NULL,
  `nombre2` varchar(25) NOT NULL,
  `apellido1` varchar(25) NOT NULL,
  `apellido2` varchar(25) NOT NULL,
  `estado_civil` enum('soltero','casado','viudo','union_libre') NOT NULL,
  `sexo` enum('masculino','femenino') NOT NULL,
  `estudios_realizados` enum('Primarios','Secundarios','Tecnicos','Universitarios','ninguno') NOT NULL,
  `rh` enum('A+',' A-','B+','B-',' AB+','AB-','O+','O-') NOT NULL,
  `eps` enum('Nueva_eps','Salud _total','Compensar','Sanitas','Sisben') NOT NULL,
  `pensiones` enum('Colpensiones','Porvenir') NOT NULL,
  `arl` enum('Sura','Colpatria','Seguros_Bolivar','Colmena') NOT NULL,
  `tipo_documento` enum('cc','ti','nit','rut') NOT NULL,
  `no_documento` varchar(50) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `correo_electronico` varchar(50) NOT NULL,
  `cargo_cod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`cod_empleado`, `nombre1`, `nombre2`, `apellido1`, `apellido2`, `estado_civil`, `sexo`, `estudios_realizados`, `rh`, `eps`, `pensiones`, `arl`, `tipo_documento`, `no_documento`, `direccion`, `telefono`, `correo_electronico`, `cargo_cod`) VALUES
(1, 'Gonzalo', '', 'Betancur', 'Arroyave', 'soltero', 'masculino', 'Secundarios', 'B+', 'Sanitas', 'Colpensiones', 'Sura', 'cc', '34317773', 'Carrera 20 B # 29-18. Barrio Pie de la Popa. ', '0491 574 632', 'ganza02@gmail.com', 2),
(2, 'Santiago', '', 'Betancurt', 'Lemos', 'casado', 'masculino', 'Universitarios', ' AB+', 'Salud _total', 'Porvenir', 'Colmena', 'cc', '104879334', 'Calle 7 # 19-35', '0491 575 254', 'santiago.bentacurt@hotmail.com', 1),
(3, 'Isabella', '', 'Marquez', 'Jaramillo', 'soltero', 'femenino', 'Secundarios', 'AB-', 'Sanitas', 'Porvenir', 'Sura', 'cc', '37258970 ', 'Calle 4 norte # 10B-66 Barrio Modelo', '0491 575 789', 'isabella.marquez@gmail.com', 2),
(4, 'Karla', 'Maria', 'Molina', 'Lema', 'soltero', 'femenino', 'Secundarios', 'AB-', 'Sisben', 'Porvenir', 'Colpatria', 'cc', '10590309', 'carrera 8 #15ª-19, Locales comerciales Santo Domin', '0491 576 398', 'karla.mario01@gmail.com', 3),
(5, 'Hilda', '', 'Rodriguez', 'Caro', 'soltero', 'femenino', 'Secundarios', 'O+', 'Sanitas', 'Colpensiones', 'Sura', 'cc', '10591897 ', 'Calle 28 # 2-27 Barrio Centro', '0491 576 801', 'caro24092021@gmail.com', 2),
(6, 'Victoria', '', 'Hincapie', 'Vergara', 'union_libre', 'femenino', 'Tecnicos', 'O-', 'Nueva_eps', 'Colpensiones', 'Colmena', 'cc', '76322684', 'Calle 25 # 6-08', '0491 577 426', 'victoria10@gmail.com', 2),
(7, 'Pablo', 'Santiago', 'Rojas', 'Duque', 'soltero', 'masculino', 'Secundarios', 'A+', 'Compensar', 'Porvenir', 'Seguros_Bolivar', 'cc', '10484544', 'Calle 10 # 8-07', '0491 577 644', 'pablo.rojas@hotmail.com', 1),
(8, 'Pamela', '', 'Serna', 'Muñoz', 'union_libre', 'femenino', 'Primarios', ' A-', 'Sanitas', 'Porvenir', 'Seguros_Bolivar', 'cc', '10549676', 'Carrera 12 No. 19-00 Local 18 Centro Comercial Alt', '0491 578 957', 'pamela.muñoz@hotmail.com', 2),
(9, 'Stepania', '', 'Zapata', 'Pelaez', 'casado', 'masculino', 'Tecnicos', 'B+', 'Compensar', 'Porvenir', 'Seguros_Bolivar', 'cc', '34552934 ', 'Calle 5 # 4-48 Barrio Centro', '0491 578 148', 'zapata.pelaez@gmail.com', 2),
(10, 'Manuel', 'Andres', 'Toro', 'Sanchez', 'soltero', 'masculino', 'Tecnicos', 'B-', 'Sanitas', 'Colpensiones', 'Colpatria', 'cc', '10522913', 'Calle 16 # 3-28', '0491 578 888', 'andres.toro@gmail.com', 3),
(11, 'Barbara', '', 'Henao', 'Cano', 'soltero', 'masculino', 'Secundarios', ' AB+', 'Nueva_eps', 'Porvenir', 'Sura', 'cc', '76327873', 'Calle 22 # 13 – A 88 Barrio Los Alcazares', '0491 579 212', 'barbara.henao@gmail.com', 2),
(12, 'Leonardo', '', 'Vasquez', 'Uribe', 'union_libre', 'masculino', 'Universitarios', 'AB-', 'Compensar', 'Colpensiones', 'Colmena', 'cc', '34538154', 'Calle 37 # 42-12', '0491 579 760', 'leonardo.uribe@hotmail.com', 3),
(13, 'Juliana', '', 'Castrillón', 'Florez', 'soltero', 'femenino', 'Secundarios', 'O+', 'Sisben', 'Porvenir', 'Colpatria', 'cc', '34531526', 'Calle 17 # 29-70', '0491 579 455', 'Juliana.florez@hotmail.com', 2),
(14, 'Rocio', '', 'Muñoz', 'Gutierrez', 'viudo', 'femenino', 'Tecnicos', 'O-', 'Salud _total', 'Porvenir', 'Seguros_Bolivar', 'cc', '10493464', '1800 160 401', 'Calle 5 # 4-48 Barrio Centro', 'rocio.muñoz@gmail.com', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura_cabeza`
--

CREATE TABLE `factura_cabeza` (
  `cod_facturacab` int(11) NOT NULL,
  `fecha_expedicion` date NOT NULL,
  `cliente_cod` int(11) NOT NULL,
  `fecha_entrega` date NOT NULL,
  `cod_provedor` varchar(30) NOT NULL,
  `empleado_cod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `factura_cabeza`
--

INSERT INTO `factura_cabeza` (`cod_facturacab`, `fecha_expedicion`, `cliente_cod`, `fecha_entrega`, `cod_provedor`, `empleado_cod`) VALUES
(2, '0000-00-00', 1, '0000-00-00', '2', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura_detalle`
--

CREATE TABLE `factura_detalle` (
  `cod_factura_detalle` int(11) NOT NULL,
  `cod_factura_cabeza` int(11) NOT NULL,
  `cod_producto` int(11) NOT NULL,
  `forma_pago` enum('Efectivo','Tarjeta de credito','Cheque') NOT NULL,
  `cantidad` int(11) NOT NULL,
  `valor_unitario` double NOT NULL,
  `subtotal` double NOT NULL,
  `iva` double NOT NULL,
  `descuento` double NOT NULL,
  `neto` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomina`
--

CREATE TABLE `nomina` (
  `cod_nomina` int(11) NOT NULL,
  `cod_empleado` int(11) NOT NULL,
  `fecha_pago` date DEFAULT NULL,
  `auxilio_trasporte` double NOT NULL,
  `comisiones_otros` double NOT NULL,
  `no_horas_extra` int(11) DEFAULT NULL,
  `tipo_horas` enum('Diurnas','Nocturnas','Dominicales','Festivos') NOT NULL,
  `total_horas_extra` double DEFAULT NULL,
  `dias` int(11) NOT NULL,
  `salario_base` double NOT NULL,
  `total_devengado` double NOT NULL,
  `salud` double NOT NULL,
  `pension` double NOT NULL,
  `arl` double NOT NULL,
  `prestamos` double NOT NULL,
  `total_deducido` double NOT NULL,
  `neto` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `nomina`
--

INSERT INTO `nomina` (`cod_nomina`, `cod_empleado`, `fecha_pago`, `auxilio_trasporte`, `comisiones_otros`, `no_horas_extra`, `tipo_horas`, `total_horas_extra`, `dias`, `salario_base`, `total_devengado`, `salud`, `pension`, `arl`, `prestamos`, `total_deducido`, `neto`) VALUES
(14, 1, NULL, 46868.666666667, 10, 10, 'Diurnas', 52083.333333333, 10, 333333.33333333, 432295.33333333, 15417.066666667, 15417.066666667, 0, 1, 30835.133333333, 401460.2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido_cabeza`
--

CREATE TABLE `pedido_cabeza` (
  `cod_pedido_cabeza` int(11) NOT NULL,
  `fecha_expedicion` date NOT NULL,
  `provedor_cod` int(11) NOT NULL,
  `empleado_cod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedido_cabeza`
--

INSERT INTO `pedido_cabeza` (`cod_pedido_cabeza`, `fecha_expedicion`, `provedor_cod`, `empleado_cod`) VALUES
(1, '0000-00-00', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido_detalle`
--

CREATE TABLE `pedido_detalle` (
  `cod_pedido_detalle` int(11) NOT NULL,
  `pedidocabeza_cod` int(11) NOT NULL,
  `producto_cod` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_compra` double NOT NULL,
  `subtotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedido_detalle`
--

INSERT INTO `pedido_detalle` (`cod_pedido_detalle`, `pedidocabeza_cod`, `producto_cod`, `cantidad`, `precio_compra`, `subtotal`) VALUES
(1, 1, 1, 2, 200000, 400000),
(2, 1, 1, 2, 200000, 400000),
(3, 1, 1, 2, 200000, 400000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `cod_producto` int(11) NOT NULL,
  `TIPO_PRODUCTO` varchar(50) NOT NULL,
  `LINEA_PRODUCTO` varchar(50) NOT NULL,
  `REFERENCIA_PRODUCTO` varchar(50) NOT NULL,
  `DESCRIPCION` varchar(50) NOT NULL,
  `CANTIDAD` varchar(50) NOT NULL,
  `TALLA` double NOT NULL,
  `PRECIO_COMPRA` double NOT NULL,
  `PRECIO_VENTA` double NOT NULL,
  `PROVEEDOR_COD` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`cod_producto`, `TIPO_PRODUCTO`, `LINEA_PRODUCTO`, `REFERENCIA_PRODUCTO`, `DESCRIPCION`, `CANTIDAD`, `TALLA`, `PRECIO_COMPRA`, `PRECIO_VENTA`, `PROVEEDOR_COD`) VALUES
(1, 'DAMA', 'INFORMAL', 'BALETAS2896', 'BALETAS AZUL', '50', 35, 80000, 129000, '1'),
(2, 'DAMA', 'INFORMAL', 'BALETAS Z132', 'BALETAS CON TRABILLA CON COMBINACION DE CUEROS', '50', 35, 155120, 193900, '5'),
(3, 'DAMA', 'INFORMAL', 'BALETAS 355Q', 'BALETAS SYBILLA AMYTEX', '50', 33, 29990, 49990, '4'),
(4, 'DAMA', 'INFORMAL', 'BALETAS 3664', 'BALETAS SYBILLA ANTOCH', '50', 34, 29990, 49900, '3'),
(5, 'DAMA', 'FORMAL', 'M- 881458549', 'APOLOGY ANAUTI', '25', 34, 59900, 89990, '6'),
(6, 'DAMA', 'FORMAL', 'M- 881458535', 'APOLOGY ANAUTI ROJO', '25', 34, 59900, 89990, '2'),
(7, 'DAMA', 'FORMAL', 'M-881458573', 'BASEMENT TAMILA', '25', 35, 39900, 99000, '7'),
(8, 'DAMA', 'INFORMAL', 'B-4410043', ' IT SPRING TACON BAJO LUNNA', '50', 35, 125000, 179900, '3'),
(9, 'DAMA', 'FORMAL', 'B-8817461', 'MOSSIMO CAÑA MEDIA ALTO DAFU', '50', 35, 80000, 139900, '2'),
(10, 'DAMA', 'FORMAL', 'B-8817923', 'SYBILLA TACON MEDIO CRUNCH', '50', 35, 85000, 129900, '4'),
(11, 'DAMA', 'FORMAL', 'B-40S0WLM', 'MICHEL KORS TACON BAJO', '50', 35, 79900, 110000, '1'),
(12, 'DAMA', 'FORMAL', 'B-4201944', 'MUJER XTI CAÑA MEDUA TACON BAJO', '50', 35, 89900, 189900, '6'),
(13, 'DAMA', 'INFORMAL', 'BC-881626307', 'BOTAS DE LLUVIA SYBILLA CAÑA ALTA', '50', 37, 49900, 89900, '2'),
(14, 'DAMA', 'FORMAL', 'BC-3893205', 'BOTA ARIANA', '50', 36, 159900, 239000, '3'),
(15, 'DAMA', 'FORMAL', 'BC-4275796', 'MICHALE KORS CAÑA ALTA TACON BAJO', '25', 0, 159900, 239900, '5'),
(16, 'DAMA', 'FORMAL', 'BC-5730592', 'BOTAS KEINA NEGRO CR', '25', 35, 69900, 95000, '6'),
(17, 'DAMA', 'INFORMAL', 'TN-4917879', 'SKECHERS DLITES', '30', 36, 179000, 229900, '2'),
(18, 'DAMA', 'FORMAL', 'TN-881879795', 'SYBILLA MODA HASEE', '30', 35, 99900, 119000, '4'),
(19, 'DAMA', 'FORMAL', 'TN-881811837', 'SYBILLA MODA BOSI', '30', 35, 65000, 89900, '1'),
(20, 'DAMA', 'FORMAL', 'TN-7828740RUNNING DOWNSHIFTER', '9', '30', 36, 179000, 200000, '5'),
(21, 'MASCULINO', 'FORMAL', 'ZF-880961855', 'VANQUISH CRISTIAN LACROIX', '30', 37, 75000, 140000, '4'),
(22, 'MASCULINO', 'FORMAL', 'ZF-4055658', 'CLARKS HAMILTON FREE', '30', 38, 129000, 239000, '3'),
(23, 'MASCULINO', 'FORMAL', 'ZF-4070872', 'CALL IT SPRING JOCKEY001', '30', 38, 76500, 189000, '6'),
(24, 'MASCULINO', 'FORMAL', 'ZF-4931207', 'CALL IT SRPING DARTNALL220', '30', 37, 94500, 189900, '2'),
(25, 'MASCULINO', 'INFORMAL', 'TN-4968479', 'NIKE RUNNING QUEST2', '25', 36, 240000, 309000, '7'),
(26, 'MASCULINO', 'INFORMAL', 'TN-4944775', 'SKECHERS DYNA LITE', '30', 37, 99000, 169900, '5'),
(27, 'MASCULINO', 'INFORMAL', 'TN-3834694', 'NIKE RUNNING LEGEND REACT', '30', 36, 249000, 379000, '4'),
(28, 'MASCULINO', 'INFORMAL', 'TN-4164928', 'ACSIS RUNNING ROADHAWK FT2', '30', 37, 179900, 299900, '3'),
(29, 'MASCULINO', 'INFORMAL', 'ZC-496899', 'XTI WALTER', '30', 36, 74950, 149900, '2'),
(30, 'MASCULINO', 'INFORMAL', 'ZC-4946868', 'XTI RANDY', '25', 36, 74950, 149900, '1'),
(31, 'MASCULINO', 'FORMAL', 'ZC-881722303', 'JIMLOW1', '25', 37, 79900, 169900, '6'),
(32, 'MASCULINO', 'INFORMAL', 'ZC-881398571', 'CASUALES ESPINO3', '25', 35, 75000, 189000, '5'),
(33, 'MASCULINO', 'INFORMAL', 'ZC- 4944655', 'SKECHER MOREWAY BARCO', '25', 37, 146900, 244900, '4'),
(34, 'MASCULINO', 'INFORMAL', 'M-881501225', 'NEWBOAT MOCARENS', '25', 35, 69000, 89900, '3'),
(35, 'MASCULINO', 'INFORMAL', 'M-881748542', 'NEWBOAT MOCACOAST 2', '25', 37, 69000, 89900, '2'),
(36, 'MASCULINO', 'FORMAL', 'M-3484128', 'UNIVERSITY CLUB COLLINS', '25', 36, 99000, 130500, '1'),
(37, 'MASCULINO', 'FORMAL', 'M-881501043', 'MOCARENS', '25', 37, 69000, 89000, '6'),
(38, 'MASCULINO', 'FORMAL', 'M-49456209', 'SPERRY TOPO SIDER LEEWARD', '25', 36, 205000, 259000, '5'),
(39, 'MASCULINO', 'FORMAL', 'M-881356912', 'SIMEON HOMBRE', '25', 37, 76900, 130000, '4'),
(40, 'MASCULINO', 'FORMAL', 'M-4413246', 'MOCALOF', '25', 35, 69900, 89900, '3'),
(41, 'MASCULINO', 'FORMAL', 'M-3786A5', 'APACHE SAN POLOS 174', '25', 36, 131900, 219900, '2'),
(42, 'INFANTIL NIÑO', 'INFORMAL', 'T-4922542', 'ADIDAS MODA IV COURT', '20', 28, 99000, 120000, '1'),
(43, 'INFANTIL NIÑO', 'INFORMAL', 'T-3939054', 'ADIDAS GRAND COURT', '20', 24, 89000, 129900, '6'),
(44, 'INFANTIL NIÑO', 'INFORMAL', 'T-2945671', 'ORIGINALS STAN SMITH', '20', 23, 85000, 169900, '5'),
(45, 'INFANTIL NIÑO', 'INFORMAL', 'T-881855933', 'DIADORA BOY VINTA', '20', 31, 64000, 89900, '1'),
(46, 'INFANTIL NIÑO', 'FORMAL', 'T-4955930', 'SKECHERS GORUN FAST-THARO', '20', 20, 95000, 129900, '5'),
(47, 'INFANTIL NIÑO', 'INFORMAL', 'T-4224057', 'NIÑO GORUN 600- BAXTUX', '20', 21, 95000, 129900, '4'),
(48, 'INFANTIL NIÑO', 'FORMAL', 'C-881722014', 'CASUAL CONIGLIO KID', '20', 20, 35500, 79900, '3'),
(49, 'INFANTIL NIÑO', 'INFORMAL', 'C-8943046', 'TELLENZI 187', '20', 27, 48900, 72000, '6'),
(50, 'INFANTIL NIÑO', 'INFORMAL', 'C-8943070', 'INFANTIL TELLENZI 187-A', '20', 23, 54800, 72000, '2'),
(51, 'INFANTIL NIÑO', 'FORMAL', 'C-7119347', 'KOKO ANTHONY', '20', 22, 35750, 59000, '7'),
(52, 'INFANTIL NIÑO', 'FORMAL', 'B-881722184', 'CONIGLIO CO BOAT', '20', 22, 63500, 100000, '4'),
(53, 'INFANTIL NIÑO', 'FORMAL', 'B-881750868', 'CONIGLIO CO BEST II', '10', 31, 49900, 105000, '3'),
(54, 'INFANTIL NIÑO', 'FORMAL', 'B-881750952', 'CO HORSE II', '10', 30, 58900, 105000, '2'),
(55, 'INFANTIL NIÑO', 'FORMAL', 'ZP-8909589', 'ELASTICA TIPO VANS', '15', 19, 32800, 45000, '1'),
(56, 'INFANTIL NIÑO', 'FORMAL', 'ZP-8909228', 'ELASTICA ECO', '15', 21, 35000, 45000, '6'),
(57, 'INFANTIL NIÑO', 'FORMAL', 'ZP-4213420', 'LIAM MOCASIN', '15', 17, 32800, 47300, '5'),
(58, 'INFANTIL NIÑA', 'FORMAL', 'T-4917289', 'ORIGINALS STAN SMITH', '20', 34, 149000, 229000, '4'),
(59, 'INFANTIL NIÑA', 'INFORMAL', 'T-4917300', 'ADIDAS MODA GRAND COURT', '15', 28, 98900, 160000, '3'),
(60, 'INFANTIL NIÑA', 'INFORMAL', 'T-5052406', 'SKECHERS NIÑA MICROSPEC', '15', 27, 93500, 130000, '2'),
(61, 'INFANTIL NIÑA', 'INFORMAL', 'T-5076957', 'FILA RAY T RACER', '20', 22, 91000, 130000, '1'),
(62, 'INFANTIL NIÑA', 'INFORMAL', 'T-4307094', 'PUMA STREET ACTIVATE', '20', 28, 99000, 130000, '6'),
(63, 'INFANTIL NIÑA', 'INFORMAL', 'BALETA- 881817379', 'YAMP NIÑA BALASICA', '15', 23, 32950, 50000, '5'),
(64, 'INFANTIL NIÑA', 'INFORMAL', 'BALETA-881812930', 'BARBIE BAL BITTI', '10', 24, 42950, 60000, '6'),
(65, 'INFANTIL NIÑA', 'INFORMAL', 'BALETA-881725575', 'BAL BOW III', '20', 22, 22850, 40000, '6'),
(66, 'INFANTIL NIÑA', 'INFORMAL', 'BALETA-89092023', 'ROSETA SHOES', '20', 19, 29800, 45800, '7'),
(67, 'INFANTIL NIÑA', 'FORMAL', 'B-88179535', 'YAMP NIÑA BO WORK UP', '20', 26, 59800, 90000, '1'),
(68, 'INFANTIL NIÑA', 'FORMAL', 'B-881751019', 'ELV NIÑA BO HIKING', '20', 33, 78500, 100000, '5'),
(69, 'INFANTIL NIÑA', 'FORMAL', 'B- 881752607', 'CONIGLIO CO CLOUDY', '20', 22, 75000, 100000, '4'),
(70, 'INFANTIL NIÑA', 'FORMAL', 'Z-CD47042', 'GRAVY ROSADO', '15', 22, 60000, 65000, '3'),
(71, 'INFANTIL NIÑA', 'FORMAL', 'Z-AIR8965', 'FLURRY II', '20', 34, 850000, 105000, '6'),
(72, 'INFANTIL NIÑA', 'FORMAL', 'Z-9591K', 'KIMBRA', '15', 18, 35900, 45000, '2'),
(73, 'INFANTIL NIÑA', 'INFORMAL', 'Z-110-92', 'PBX BUBBLE GUMMERS INGRID', '20', 18, 39900, 49900, '7'),
(74, 'INFANTIL NIÑA', 'INFORMAL', 'Z-4220088', 'BOTA SOLIDA SKP', '20', 30, 32000, 35000, '5'),
(75, 'INFANTIL NIÑA', 'INFORMAL', 'Z-DN218-24', 'SPORT FORRADO EN YUTE', '15', 30, 36000, 46000, '4'),
(76, 'INFANTIL NIÑA', 'FORMAL', 'Z-399905', 'BOTIN CHAROL', '15', 26, 45700, 60000, '2'),
(77, 'INFANTIL NIÑA', 'FORMAL', 'Z-H56923', 'BOLICHERO', '15', 28, 38900, 50000, '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provedores`
--

CREATE TABLE `provedores` (
  `cod_provedor` int(11) NOT NULL,
  `razon_social` varchar(50) NOT NULL,
  `tipo_documento` enum('cc','ce','nit','rut') NOT NULL,
  `no_documento` varchar(30) NOT NULL,
  `direccion` varchar(40) NOT NULL,
  `telefono` varchar(12) NOT NULL,
  `informacion_asesor` varchar(45) NOT NULL,
  `telefono_asesor` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `provedores`
--

INSERT INTO `provedores` (`cod_provedor`, `razon_social`, `tipo_documento`, `no_documento`, `direccion`, `telefono`, `informacion_asesor`, `telefono_asesor`) VALUES
(1, 'CALZADO CAPRINO ', 'cc', '860033182-1', 'CRA 41B NO.9-65', '3701266', 'servicioproveedor@calzadocaprino.co', '319423218'),
(2, 'MANUFACTURAS EN CUERO V&C LTDA', 'cc', '830068579-6', 'CRA 29B No.18A-61 SUR', '7133907', 'clientes@vc.co', '314763218'),
(3, 'VALORES SMITH S.A.', 'ce', '8300965108-4', 'CRA 31A No.10-78', '2084765', 'atencioncliente@smith.co', '3134487965'),
(4, 'CALZADO INCA', 'cc', '9009984523-1', 'CRA 20 No.22-48', '76712474', 'serviciocliente@calinca.co', '3108156311'),
(5, 'GALILEO CALZADO', 'ce', '9010662159-2', 'CRA 24 NO.54-32', '68856743', 'clientes@galileo.co', '3124512107'),
(6, 'FABRICA DE CALZADO ROMULO S.A.S', 'cc', '8000785220-5', 'CLL 12A No.37-122', '24457740', ' servicioalcliente@calzadoromulo.com', '3194321290'),
(7, 'VIVALDI', 'cc', '800186448-6', 'CLL 9B No.24-17 ', '25569002', 'sgc@calzadovivaldi.com', '318 254 490');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`cod_cargo`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`cod_cliente`);

--
-- Indices de la tabla `despachos`
--
ALTER TABLE `despachos`
  ADD PRIMARY KEY (`cod_despacho`),
  ADD KEY `fk_despachos_factura_C` (`cod_factura_c`),
  ADD KEY `fk_despachos_empleados` (`cod_empleado`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`cod_empleado`),
  ADD KEY `cod_cargo` (`cargo_cod`),
  ADD KEY `cargo_cod` (`cargo_cod`);

--
-- Indices de la tabla `factura_cabeza`
--
ALTER TABLE `factura_cabeza`
  ADD PRIMARY KEY (`cod_facturacab`),
  ADD KEY `cod_cliente` (`cliente_cod`),
  ADD KEY `cod_empleado` (`empleado_cod`);

--
-- Indices de la tabla `factura_detalle`
--
ALTER TABLE `factura_detalle`
  ADD PRIMARY KEY (`cod_factura_detalle`),
  ADD KEY `fk_facturaD_facturaC` (`cod_factura_cabeza`),
  ADD KEY `fk_facturaD_producto` (`cod_producto`);

--
-- Indices de la tabla `nomina`
--
ALTER TABLE `nomina`
  ADD PRIMARY KEY (`cod_nomina`),
  ADD KEY `fknomina_empleado` (`cod_empleado`);

--
-- Indices de la tabla `pedido_cabeza`
--
ALTER TABLE `pedido_cabeza`
  ADD PRIMARY KEY (`cod_pedido_cabeza`),
  ADD KEY `cod_provedor` (`provedor_cod`),
  ADD KEY `cod_empleado` (`empleado_cod`) USING BTREE;

--
-- Indices de la tabla `pedido_detalle`
--
ALTER TABLE `pedido_detalle`
  ADD PRIMARY KEY (`cod_pedido_detalle`),
  ADD KEY `cod_pedidocab` (`pedidocabeza_cod`),
  ADD KEY `cod_producto` (`producto_cod`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`cod_producto`);

--
-- Indices de la tabla `provedores`
--
ALTER TABLE `provedores`
  ADD PRIMARY KEY (`cod_provedor`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `cod_cargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `cod_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `despachos`
--
ALTER TABLE `despachos`
  MODIFY `cod_despacho` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `cod_empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `factura_cabeza`
--
ALTER TABLE `factura_cabeza`
  MODIFY `cod_facturacab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `factura_detalle`
--
ALTER TABLE `factura_detalle`
  MODIFY `cod_factura_detalle` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `nomina`
--
ALTER TABLE `nomina`
  MODIFY `cod_nomina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `pedido_cabeza`
--
ALTER TABLE `pedido_cabeza`
  MODIFY `cod_pedido_cabeza` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pedido_detalle`
--
ALTER TABLE `pedido_detalle`
  MODIFY `cod_pedido_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `cod_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT de la tabla `provedores`
--
ALTER TABLE `provedores`
  MODIFY `cod_provedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `idk_car01` FOREIGN KEY (`cargo_cod`) REFERENCES `cargo` (`cod_cargo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `factura_cabeza`
--
ALTER TABLE `factura_cabeza`
  ADD CONSTRAINT `idk_emp02` FOREIGN KEY (`empleado_cod`) REFERENCES `empleados` (`cod_empleado`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idk_fac01` FOREIGN KEY (`cliente_cod`) REFERENCES `clientes` (`cod_cliente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `nomina`
--
ALTER TABLE `nomina`
  ADD CONSTRAINT `fknomina_empleado` FOREIGN KEY (`cod_empleado`) REFERENCES `empleados` (`cod_empleado`);

--
-- Filtros para la tabla `pedido_cabeza`
--
ALTER TABLE `pedido_cabeza`
  ADD CONSTRAINT `idk_emp03` FOREIGN KEY (`empleado_cod`) REFERENCES `empleados` (`cod_empleado`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idk_provedor` FOREIGN KEY (`provedor_cod`) REFERENCES `provedores` (`cod_provedor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedido_detalle`
--
ALTER TABLE `pedido_detalle`
  ADD CONSTRAINT `idk_ped01` FOREIGN KEY (`pedidocabeza_cod`) REFERENCES `pedido_cabeza` (`cod_pedido_cabeza`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
