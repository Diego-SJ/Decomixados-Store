-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 24-05-2020 a las 22:18:35
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `decomixados`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `address`
--

CREATE TABLE `address` (
  `idaddress` int(11) NOT NULL,
  `address` varchar(150) DEFAULT NULL,
  `iduser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `car`
--

CREATE TABLE `car` (
  `idcart` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idproduct` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `idcategories` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(500) DEFAULT NULL,
  `imagev2` varchar(500) DEFAULT NULL,
  `description` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detail_sale`
--

CREATE TABLE `detail_sale` (
  `idsales` int(11) NOT NULL,
  `idproduct` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `messages`
--

CREATE TABLE `messages` (
  `idmessage` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(250) NOT NULL,
  `message` longtext NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `offers`
--

CREATE TABLE `offers` (
  `id_offer` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `description` varchar(500) NOT NULL,
  `image` varchar(500) NOT NULL,
  `idproduct` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product`
--

CREATE TABLE `product` (
  `idproduct` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `image` longtext DEFAULT NULL,
  `price_c` decimal(13,2) DEFAULT NULL,
  `price_v` decimal(13,2) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `provider` varchar(45) DEFAULT NULL,
  `image2` longtext DEFAULT NULL,
  `idcategories` int(11) NOT NULL,
  `image3` longtext DEFAULT NULL,
  `image4` longtext DEFAULT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sales`
--

CREATE TABLE `sales` (
  `idsales` int(11) NOT NULL,
  `date` datetime DEFAULT NULL,
  `total` decimal(13,2) NOT NULL,
  `status` varchar(45) NOT NULL DEFAULT 'en proceso',
  `address` varchar(500) NOT NULL,
  `way2pay` varchar(30) NOT NULL,
  `iduser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `saves`
--

CREATE TABLE `saves` (
  `idsaves` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idproduct` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `user` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `status` int(11) NOT NULL,
  `access_type` varchar(20) NOT NULL,
  `token_password` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`iduser`, `name`, `lname`, `user`, `email`, `password`, `phone`, `status`, `access_type`, `token_password`) VALUES
(1, 'Admin', 'Admin', 'decomixados', 'admin@decomixados.com', '$2y$10$vDK9aVpT6/IWr26Whdou7u2ul5SyaDNG1pBRSrqWGFMPVCvFxo84y', '7777777777', 0, '0', NULL);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_car`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vw_car` (
`idcart` int(11)
,`iduser` int(11)
,`quantity` int(11)
,`idproduct` int(11)
,`name` varchar(50)
,`description` longtext
,`image` longtext
,`price_c` decimal(13,2)
,`price_v` decimal(13,2)
,`stock` int(11)
,`provider` varchar(45)
,`idcategories` int(11)
,`sub_total` decimal(23,2)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_detail_sale`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vw_detail_sale` (
`idsales` int(11)
,`quantity` int(11)
,`idproduct` int(11)
,`name` varchar(50)
,`description` longtext
,`image` longtext
,`price_c` decimal(13,2)
,`price_v` decimal(13,2)
,`stock` int(11)
,`provider` varchar(45)
,`image2` longtext
,`idcategories` int(11)
,`image3` longtext
,`image4` longtext
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_newproducts`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vw_newproducts` (
`idproduct` int(11)
,`name` varchar(50)
,`description` longtext
,`image` longtext
,`price_c` decimal(13,2)
,`price_v` decimal(13,2)
,`stock` int(11)
,`provider` varchar(45)
,`image2` longtext
,`idcategories` int(11)
,`image3` longtext
,`image4` longtext
,`date` datetime
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_offers`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vw_offers` (
`id_offer` int(11)
,`name` varchar(300)
,`description` varchar(500)
,`image` varchar(500)
,`idproduct` int(11)
,`product` varchar(50)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_products`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vw_products` (
`idproduct` int(11)
,`name` varchar(50)
,`description` longtext
,`image` longtext
,`image2` longtext
,`image3` longtext
,`image4` longtext
,`price_c` decimal(13,2)
,`price_v` decimal(13,2)
,`stock` int(11)
,`provider` varchar(45)
,`idcategories` int(11)
,`category` varchar(50)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_purchase`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vw_purchase` (
`idsales` int(11)
,`idproduct` int(11)
,`quantity` int(11)
,`name` varchar(50)
,`image` longtext
,`price_v` decimal(13,2)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_wishlist`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vw_wishlist` (
`idsaves` int(11)
,`iduser` int(11)
,`idproduct` int(11)
,`name` varchar(50)
,`description` longtext
,`image` longtext
,`price_c` decimal(13,2)
,`price_v` decimal(13,2)
,`stock` int(11)
,`provider` varchar(45)
,`idcategories` int(11)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_car`
--
DROP TABLE IF EXISTS `vw_car`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_car`  AS  select `c`.`idcart` AS `idcart`,`c`.`iduser` AS `iduser`,`c`.`quantity` AS `quantity`,`p`.`idproduct` AS `idproduct`,`p`.`name` AS `name`,`p`.`description` AS `description`,`p`.`image` AS `image`,`p`.`price_c` AS `price_c`,`p`.`price_v` AS `price_v`,`p`.`stock` AS `stock`,`p`.`provider` AS `provider`,`p`.`idcategories` AS `idcategories`,`c`.`quantity` * `p`.`price_v` AS `sub_total` from (`car` `c` join `product` `p` on(`c`.`idproduct` = `p`.`idproduct`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_detail_sale`
--
DROP TABLE IF EXISTS `vw_detail_sale`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_detail_sale`  AS  select `ds`.`idsales` AS `idsales`,`ds`.`quantity` AS `quantity`,`p`.`idproduct` AS `idproduct`,`p`.`name` AS `name`,`p`.`description` AS `description`,`p`.`image` AS `image`,`p`.`price_c` AS `price_c`,`p`.`price_v` AS `price_v`,`p`.`stock` AS `stock`,`p`.`provider` AS `provider`,`p`.`image2` AS `image2`,`p`.`idcategories` AS `idcategories`,`p`.`image3` AS `image3`,`p`.`image4` AS `image4` from (`detail_sale` `ds` join `product` `p` on(`p`.`idproduct` = `ds`.`idproduct`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_newproducts`
--
DROP TABLE IF EXISTS `vw_newproducts`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_newproducts`  AS  select `p`.`idproduct` AS `idproduct`,`p`.`name` AS `name`,`p`.`description` AS `description`,`p`.`image` AS `image`,`p`.`price_c` AS `price_c`,`p`.`price_v` AS `price_v`,`p`.`stock` AS `stock`,`p`.`provider` AS `provider`,`p`.`image2` AS `image2`,`p`.`idcategories` AS `idcategories`,`p`.`image3` AS `image3`,`p`.`image4` AS `image4`,`p`.`date` AS `date` from `product` `p` order by `p`.`date` desc limit 12 ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_offers`
--
DROP TABLE IF EXISTS `vw_offers`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_offers`  AS  select `o`.`id_offer` AS `id_offer`,`o`.`name` AS `name`,`o`.`description` AS `description`,`o`.`image` AS `image`,`o`.`idproduct` AS `idproduct`,`p`.`name` AS `product` from (`offers` `o` join `product` `p` on(`o`.`idproduct` = `p`.`idproduct`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_products`
--
DROP TABLE IF EXISTS `vw_products`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_products`  AS  select `p`.`idproduct` AS `idproduct`,`p`.`name` AS `name`,`p`.`description` AS `description`,`p`.`image` AS `image`,`p`.`image2` AS `image2`,`p`.`image3` AS `image3`,`p`.`image4` AS `image4`,`p`.`price_c` AS `price_c`,`p`.`price_v` AS `price_v`,`p`.`stock` AS `stock`,`p`.`provider` AS `provider`,`p`.`idcategories` AS `idcategories`,`c`.`name` AS `category` from (`product` `p` join `categories` `c` on(`p`.`idcategories` = `c`.`idcategories`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_purchase`
--
DROP TABLE IF EXISTS `vw_purchase`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_purchase`  AS  select `ds`.`idsales` AS `idsales`,`ds`.`idproduct` AS `idproduct`,`ds`.`quantity` AS `quantity`,`p`.`name` AS `name`,`p`.`image` AS `image`,`p`.`price_v` AS `price_v` from (`detail_sale` `ds` join `product` `p` on(`ds`.`idproduct` = `p`.`idproduct`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_wishlist`
--
DROP TABLE IF EXISTS `vw_wishlist`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_wishlist`  AS  select `s`.`idsaves` AS `idsaves`,`s`.`iduser` AS `iduser`,`p`.`idproduct` AS `idproduct`,`p`.`name` AS `name`,`p`.`description` AS `description`,`p`.`image` AS `image`,`p`.`price_c` AS `price_c`,`p`.`price_v` AS `price_v`,`p`.`stock` AS `stock`,`p`.`provider` AS `provider`,`p`.`idcategories` AS `idcategories` from (`saves` `s` join `product` `p` on(`s`.`idproduct` = `p`.`idproduct`)) ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`idaddress`);

--
-- Indices de la tabla `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`idcart`);

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`idcategories`);

--
-- Indices de la tabla `detail_sale`
--
ALTER TABLE `detail_sale`
  ADD PRIMARY KEY (`idsales`,`idproduct`);

--
-- Indices de la tabla `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`idmessage`);

--
-- Indices de la tabla `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id_offer`);

--
-- Indices de la tabla `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`idproduct`);

--
-- Indices de la tabla `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`idsales`);

--
-- Indices de la tabla `saves`
--
ALTER TABLE `saves`
  ADD PRIMARY KEY (`idsaves`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `address`
--
ALTER TABLE `address`
  MODIFY `idaddress` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `car`
--
ALTER TABLE `car`
  MODIFY `idcart` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `idcategories` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `messages`
--
ALTER TABLE `messages`
  MODIFY `idmessage` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `offers`
--
ALTER TABLE `offers`
  MODIFY `id_offer` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `product`
--
ALTER TABLE `product`
  MODIFY `idproduct` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sales`
--
ALTER TABLE `sales`
  MODIFY `idsales` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `saves`
--
ALTER TABLE `saves`
  MODIFY `idsaves` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
