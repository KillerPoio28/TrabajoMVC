
--

-- --------------------------------------------------------

--
-- Table structure for table `Carreras`
--

CREATE TABLE `Carreras` (
  `IdTec` int(3) NOT NULL,
  `NomTec` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Carreras`
--

-- --------------------------------------------------------

--
-- Table structure for table `Proyectos`
--

CREATE TABLE `Proyectos` (
  `IdPro` int(100) NOT NULL,
  `Nompro` varchar(30) CHARACTER SET utf8mb4 NOT NULL,
  `Logo` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `Descripcion` varchar(5000) CHARACTER SET utf8mb4 NOT NULL,
  `IdTec` int(3) DEFAULT NULL,
  `Seme` varchar(10) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Proyectos`
--


CREATE TABLE `Repositorios` (
  `IdRep` int(3) NOT NULL,
  `Id` int(12) DEFAULT NULL,
  `IdPro` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Repositorios`
--



-- --------------------------------------------------------

--
-- Table structure for table `Roles`
--

CREATE TABLE `Roles` (
  `IdRol` int(1) NOT NULL,
  `Atributo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Roles`
--

INSERT INTO `Roles` (`IdRol`, `Atributo`) VALUES
(1, 'Profesor'),
(2, 'Estudiante');

-- --------------------------------------------------------

--
-- Table structure for table `Usuarios`
--

CREATE TABLE `Usuarios` (
  `Id` int(12) NOT NULL,
  `Nombre` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `Apellido` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `Completo` varchar(200) NOT NULL,
  `Email` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `FecNac` date DEFAULT NULL,
  `Password` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `IdRol` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Usuarios`
--



--
-- Indexes for table `Carreras`
--
ALTER TABLE `Carreras`
  ADD PRIMARY KEY (`IdTec`),
  ADD KEY `IdTec` (`IdTec`),
  ADD KEY `IdTec_2` (`IdTec`);

--
-- Indexes for table `Proyectos`
--
ALTER TABLE `Proyectos`
  ADD PRIMARY KEY (`IdPro`),
  ADD KEY `IdPro` (`IdPro`,`IdTec`),
  ADD KEY `IdTec` (`IdTec`);

--
-- Indexes for table `Repositorios`
--
ALTER TABLE `Repositorios`
  ADD PRIMARY KEY (`IdRep`),
  ADD KEY `IdRep` (`IdRep`,`IdPro`),
  ADD KEY `Id` (`Id`),
  ADD KEY `IdPro` (`IdPro`);

--
-- Indexes for table `Roles`
--
ALTER TABLE `Roles`
  ADD PRIMARY KEY (`IdRol`),
  ADD KEY `IdRol` (`IdRol`);

--
-- Indexes for table `Usuarios`
--
ALTER TABLE `Usuarios`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `IdRol` (`IdRol`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Proyectos`
--
ALTER TABLE `Proyectos`
  MODIFY `IdPro` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `Repositorios`
--
ALTER TABLE `Repositorios`
  MODIFY `IdRep` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Proyectos`
--
ALTER TABLE `Proyectos`
  ADD CONSTRAINT `Proyectos_ibfk_1` FOREIGN KEY (`IdTec`) REFERENCES `Carreras` (`IdTec`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Repositorios`
--
ALTER TABLE `Repositorios`
  ADD CONSTRAINT `Repositorios_ibfk_1` FOREIGN KEY (`Id`) REFERENCES `Usuarios` (`Id`),
  ADD CONSTRAINT `Repositorios_ibfk_2` FOREIGN KEY (`IdPro`) REFERENCES `Proyectos` (`IdPro`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Usuarios`
--
ALTER TABLE `Usuarios`
  ADD CONSTRAINT `Usuarios_ibfk_1` FOREIGN KEY (`IdRol`) REFERENCES `Roles` (`IdRol`);
COMMIT;

