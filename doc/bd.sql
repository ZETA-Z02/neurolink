CREATE TABLE `usuarios` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `dni` int(11) NOT NULL,
  `telefono` int(11) DEFAULT NULL,
  `ciudad` varchar(100) DEFAULT NULL,
  `genero` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `fechaNac` date NOT NULL,
  `nivel` tinyint(4) NOT NULL DEFAULT 1,
  `puntaje` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`idusuario`)
);
CREATE TABLE `login` (
  `idlogin` int(11) NOT NULL AUTO_INCREMENT,
  `idusuario` int(11) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nivel` tinyint(4) NOT NULL DEFAULT 1,
  `estado` tinyint(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`idlogin`),
  KEY `idusuario` (`idusuario`),
  FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`idusuario`)
);