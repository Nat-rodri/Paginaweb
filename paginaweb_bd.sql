-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-08-2024 a las 00:44:40
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `paginaweb_bd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `IDCateg` int(11) NOT NULL,
  `Categoria` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`IDCateg`, `Categoria`) VALUES
(1, 'Postre'),
(2, 'Bebida'),
(3, 'Vegetariana'),
(4, 'Pasta'),
(5, 'Entrante'),
(6, 'Plato Principal'),
(7, 'Galletita'),
(8, 'Tarta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `IDComentario` int(11) NOT NULL,
  `IDRecetas` int(11) DEFAULT NULL,
  `IDUsuarios` int(11) DEFAULT NULL,
  `comentario` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`IDComentario`, `IDRecetas`, `IDUsuarios`, `comentario`, `fecha`) VALUES
(1, 4, 2, 'Me encantan los fideos!!\r\n', '2024-08-21 22:01:22'),
(2, 3, 2, 'Cómo hacen para que se vea tan rico? Yo intenté hacerlas, pero de vista eran para tirarlas a la basura jaja', '2024-08-21 22:29:03'),
(3, 2, 4, 'Gracias!! Justo lo que buscaba', '2024-08-21 22:32:14'),
(4, 4, 4, 'Fideos y tucos??? Quién no sabe cocinar eso?\r\n', '2024-08-21 22:36:42'),
(5, 1, 1, '¿Aún hay gente que le gusta la tarta de choclo?\r\n', '2024-08-21 22:38:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recetas`
--

CREATE TABLE `recetas` (
  `IDRecetas` int(11) NOT NULL,
  `Titulo` varchar(255) NOT NULL,
  `Descripcion` text NOT NULL,
  `Ingredientes` text NOT NULL,
  `Preparacion` text NOT NULL,
  `imagen` varchar(255) DEFAULT 'default.jpg',
  `IDCateg` int(11) NOT NULL,
  `IDUsuarios` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `recetas`
--

INSERT INTO `recetas` (`IDRecetas`, `Titulo`, `Descripcion`, `Ingredientes`, `Preparacion`, `imagen`, `IDCateg`, `IDUsuarios`) VALUES
(1, 'Tarta de choclo fácil: Receta en 5 pasos', 'Esta tarta de choclo es fácil, sencilla y muy rápida. Al tener un poco de crema y sumarle la latita de choclo cremoso no necesita que le agreguemos huevo para ligarla.', '1 lata choclo crema\r\n1 lata de choclo en grano (o dos choclos desgranados, lo que prefieras)\r\n1 cebolla blanca\r\n1 pimiento morrón\r\n100 gr queso cremoso\r\n70 gr de queso crema\r\n1 chorro de crema de leche o nata\r\nSal y pimienta', 'Picar la cebolla y el pimiento pimiento rojo. En una sartén con un chorro de aceite saltear hasta que la cebolla esté transparente.\r\nEscurrir la lata de choclo en granos y la agregamos a la sartén junto con la lata de choclo cremoso. Salpimentar y dejar cocinar entre 3 a 5 minutos más, no mas que eso. Es solo un golpe de calor para que tomen gusto entre todos los ingredientes.\r\nEn un bol mezclar el choclo, el queso crema, la crema de leche y la mitad del queso cremoso en cubitos y revolver hasta integrar.\r\nAgregar el relleno a una tartera con la masa y colocar el resto del queso cremoso en cubos en la parte de arriba. Pueden ponerle tapa si gustan, yo prefiero sin así se gratina el queso, -y se come menos harina y todo eso vieron-.\r\nLlevar al horno a 180º hasta que esté dorada la masa y la superficie.', 'choclo-sin-huevo-3-scaled-1.jpg', 8, NULL),
(2, 'Rigatoni, la pasta ideal para comer con Boloñesa', '¡Buonasera amigos y amigas! La cocina italiana es principalmente conocida por las pastas y la pizza. Dicen por ahí que el rigatoni es un reflejo de esto ya que es una pasta pensada para realzar el plato y la salsa que lo acompañe.', '350 gr de rigatoni\r\n300 gr de carne molida de res\r\n1 cebolla, picada\r\n1 zanahoria, picada\r\n1 tallo de apio, picado\r\n2 dientes de ajo, picados\r\n400 gr de tomate triturado\r\n1/2 taza de vino tinto\r\n2 cucharadas grandes de aceite de oliva\r\nSal y pimienta a gusto\r\nQueso parmesano rallado \r\nHojas de albahaca fresca', 'En una sartén calentar el aceite de oliva a fuego medio. Saltear la cebolla, la zanahoria y el apio picados hasta que estén tiernos. \r\nAñadir el ajo picado y la carne molida de res, cocinar hasta que se dore. Verter el vino tinto y cocinar unos minutos hasta que se evapore el alcohol.\r\nAgregar el tomate triturado a la mezcla y revolver bien. Reducir el fuego a bajo, tapar la sartén y cocinar a fuego lento 30 minutos.\r\nHervir agua en una olla y cocinar los rigatoni con las instrucciones del paquete. Escurrir y reservar. Cuando la salsa boloñesa esté lista, salpimentar a gusto.\r\nServir los rigatoni con la boloñesa, espolvorear queso parmesano rallado por encima y decorar con hojas de albahaca fresca. ', 'pasta-rigatoni-Paulina-Cocina-Recetas-800x450.jpg', 4, NULL),
(3, 'Galletas de Chocolate', 'Estas galletitas de chocolate son uno de los regalos más lindos de la vida, es que te aseguro que siempre tenés en tu alacena más de un ingrediente para hacerlas y te salvan la vida en esos días de antojo dulce incontrolable.', '250 gr. de chocolate\r\n50 gr. Manteca\r\n100 gr. de Azúcar glass\r\n2 huevos\r\n200 gr. de harina de trigo\r\n1 cc levadura en polvo\r\n1 cda. de Vainilla\r\nSal', 'Fundir el chocolate a baño maría o en el microondas. Sumar la manteca junto a la vainilla y mezclar todo.\r\nBatir el azúcar y los huevos hasta duplicar el volumen. Por arriba agregar el chocolate derretido y mezclar nuevamente.\r\nPor último sumar la harina tamizada y la levadura con una pizca de sal. Mezclar lentamente hasta unir por completo.\r\nRefrigerar la masa por un rato hasta lograr una consistencia más dura.\r\nCon la masa fría formar las galletas, aplastarlas un poco y colocarlas en una placa de horno dejando una distancia prudente entre cada una.\r\nPrecalentar el horno a 170 °C y hornear durante 10 min. Ir controlando el color y que no se quemen. Las galletas de chocolate deben quedar crocantes por fuera.\r\nEnfriarlas sobre una rejilla y servir.', 'GalletasChocolate.jpg', 7, NULL),
(4, 'Cómo hacer fideos caseros + ¡Un delicioso tuco para acompañar!', '¿A quién no le gustan los fideos?\r\n¡A mí me encantan!\r\nAquí les voy a dejar escrita la receta de fideos caseros con un tuco que le gana a cualquier salsa roja en el universo.\r\nEstos fideos caseros son un plato especial para reunirte con tus seres queridos.', '\npara calcular por persona:\n\n- 1 huevo\n- 100 gr de harina 0000 (aunque también se puede usar 000)\n- 1 cucharada de aceite de oliva (opcional)\n- Una pizca de sal (opcional)\n\n\nINGREDIENTES DEL TUCO:\n\n- 3 dientes de ajo\n- 2 cebollas medianas\n- 1/2 pimiento morrón\n- 1 trozo de carne (roast beef funciona muy bien!)\n- 1 trocito de zanahoria\n- 1 lata de puré de tomates\n- 1 lata de tomates cubeteados o enteros\n- Caldo de verduras (opcional)\n- Sal\n- Pimienta\n- Condimentos a gusto: pimentón, ají molido, orégano, tomillo, laurel, etc.', '\r\n- Poner la harina y la sal en un bol, integrar y hacer un hueco en el medio. Agregar el huevo y el aceite si eligen agregarle. Batir un poco con una cuchara o tenedor y unir en una masa.\r\n- Una vez que se haya integrado todo muy bien a amasar! Amasar unos 15 o 20 minutos y dejar descansar por media hora.\r\n- En este paso hay que estirar la masa: ya sea con máquina de pastas o con un palo de amasar el proceso es el mismo. Hay que estirar la masa, doblarla y volverla a estirar. Una y otra vez hasta que quede del grosor que estamos buscando. Si es con la máquina hay que ir bajando un número cada vez, si es con el palote hay que amasar con más fuerza!\r\n- Se debe cortar en la forma que se prefiera, se espolvorea con harina y se deja orear unos 30 minutos.\r\n\r\nPREPARACIÓN DEL TUCO:\r\n\r\n- Quitar el excedente de la grasa de la carne y cortar en trozos. Sellar en una olla con un poco de aceite de oliva caliente. Para que la carne quede bien rica deben moverla una sola vez y después no volverla a tocar hasta que esté dorada. Recién ahí hay que darlas vuelta para sellarla del otro lado.\r\n- Picar la cebolla, el pimiento morrón y el ajo en cuadraditos pequeños y saltear en la misma olla que se había usado para la carne con un chorrito más de aceite de oliva.\r\n- Una vez que la cebolla esté transparente agregar el tomate cubeteado, la salsa de tomate y la carne. Condimentar. Cocinar unos minutos y agregarle el pedacito de zanahoria, esto le quitará la acidez al tomate.\r\n- De ser necesario agregarle un poco de caldo. Tapar y dejar cocinando a fuego lento hasta que la carne esté tierna. Hervirlo un buen rato (por ejemplo 1 hora) y quedará mucho mejor. Una vez cocido dejar reposando para que tome mejor gusto.\r\n- Hervir los fideos caseros, servir con el tuco y con todo el queso que quieran ¡y a disfrutar!', 'fideos-caseros.jpg', 4, 2),
(5, 'Huevos Mimosa ligeros (con yogur)', 'En esta receta de huevos mimosa ligeros sustituimos la mayonesa por yogur griego cremoso. Unos huevos rellenos con menos calorías sin perder sabor.\r\n', 'PARA 4 PERSONAS:\r\n8 huevos medianos\r\n180 g de atún en conserva, que son 3 latitas de las pequeñas (puedes usar atún al natural para aligerar la receta)\r\n250 g de yogur griego natural griego sin azúcar\r\nUna cucharadita de mostaza suave a tu gusto\r\nEneldo o cebollino frescos para decorar\r\nSal y pimienta al gusto.', 'Comenzamos poniendo una olla con agua a hervir, añadimos los huevos y los dejamos cocer unos 10 minutos. Aquí tieines todos los trucos y secretos para hacer un huevo duro perfecto.\r\nLos sacamos del agua y los introducimos en agua con hielo para cortar la cocción y enfriarlos más rápido. Una vez fríos, los pelamos y cortamos por la mitad a lo largo quitando la yema. Colocamos 4 yemas en un bol y las otras 4 las reservamos para más adelante.\r\nLas yemas que hemos colocado en el bol las aplastamos con un tenedor y añadimos las 3 latas de atún muy bien escurridas, los 2 yogures, la mostaza y el eneldo o cebollino picados y salpimentamos al gusto. Lo mezclamos hasta obtener una pasta homogénea.\r\nPor último, rellenamos los huevos duros. Decoramos con las 2 yemas reservadas pasadas por un pasapurés y las echamos por encima. De forma opcional también se puede poner un poco de eneldo o cebollino frescos.', 'Huevos-Mimosa.jpg', 5, 4),
(6, 'La Torta Matilda: ¡La Torta de Chocolate que Siempre Quisiste probar!', '¿A quién no le gusta una buena torta chocolatosa y pesada, aunque al día siguiente el hígado proteste? \r\n\r\nBueno, espero que a vos sí, porque hoy vamos a compartir la receta de la famosa Torta Matilda que cumple con esas características y además es parte de una película icónica de los años 90 que quedó en la memoria de grandes y chicos.', '6 huevos\r\n100 gr de azúcar común\r\n80 gr de azúcar negra\r\nPizca de sal\r\n150 gr de harina leudante\r\n60 gr de cacao amargo\r\n1 cucharadita de bicarbonato de sodio\r\n60 gr de manteca fundida\r\n200 gr de chocolate oscuro, picado\r\n200 cm3 de crema para batir', 'Precalentar el horno a 180°C. Engrasar y enharinar un molde para torta. En un bol batir los huevos con los azúcares, agregar una pizca de sal y mezclar bien.\r\nEn otro bol, tamizar la harina leudante, el cacao amargo y el bicarbonato de sodio. Agregarlos gradualmente a la mezcla anterior hasta obtener una masa homogénea.\r\nIncorporar la manteca fundida mezclando bien. Verter la mezcla en el molde preparado y alisar la parte superior.\r\nHornear de 30-35 minutos o hasta que al insertar un palillo en el centro, este salga limpio. Dejar enfriar en el molde unos minutos antes de transferirla a una rejilla.\r\nCalentar la crema en una cacerola hasta que comience a hervir. Retirar del fuego, agregar el chocolate picado, revolver y dejar entibiar para cubrir la torta.', 'torta-matilda.jpg', 1, 4),
(7, 'Leche merengada', 'La leche merengada es un clásico dulce de siempre, y la base de muchos otros postres. Aquí tienes la receta tradicional y también una forma sencilla de preparar una granizada en pocos minutos.\r\n', '+ 1 litro de leche entera\r\n+ la piel de 1 limón pequeño\r\n+ 1 palo de canela\r\n+ 6 cucharadas de azúcar (o algo más, al gusto)\r\n+ 4 claras de huevo\r\n+ canela en polvo para decorar\r\n', '+ Llevamos a ebullición la leche con el azúcar, la piel de limón (sin nada de lo blanco) y el palo de canela. No hace falta que hierva mucho, cuando rompa el hervor y antes de que se forme nata en la superficie la retiramos y la colamos. Hay que dejar que la leche enfríe por completo.\r\n+ Montamos las claras a punto de nieve fuerte y muy despacio, con movimientos envolventes, las vamos mezclando con cuidado para que no se bajen las claras y el resultado sea cremoso y espumoso.  La ponemos en un recipiente y la llevamos al congelador un par de horas.\r\n+ Al cabo de ese tiempo estará medio congelada. Puedes batir con unas varillas y servir en vasos o en copas de balón espolvoreando con canela molida.', 'LECHE-MERENGADA.jpg', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `IDUsuarios` int(11) NOT NULL,
  `Usuario` varchar(50) NOT NULL,
  `Clave` varchar(15) NOT NULL,
  `CorreoElectronico` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`IDUsuarios`, `Usuario`, `Clave`, `CorreoElectronico`) VALUES
(1, 'pepitocomepapa', 'soypepe20', 'elpepe101@gmail.com'),
(2, 'natalir', 'estoesunaprueba', 'natu102306@gmail.com'),
(3, 'belen', 'candelabelen', 'candela@gmail.com'),
(4, 'melissa', 'soy12esa', 'melu773@gmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`IDCateg`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`IDComentario`),
  ADD KEY `IDRecetas` (`IDRecetas`),
  ADD KEY `IDUsuarios` (`IDUsuarios`);

--
-- Indices de la tabla `recetas`
--
ALTER TABLE `recetas`
  ADD PRIMARY KEY (`IDRecetas`),
  ADD KEY `IDCateg` (`IDCateg`),
  ADD KEY `IDUs` (`IDUsuarios`) USING BTREE;

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`IDUsuarios`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `IDCateg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `IDComentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `recetas`
--
ALTER TABLE `recetas`
  MODIFY `IDRecetas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `IDUsuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`IDRecetas`) REFERENCES `recetas` (`IDRecetas`) ON DELETE CASCADE,
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`IDUsuarios`) REFERENCES `usuarios` (`IDUsuarios`) ON DELETE CASCADE;

--
-- Filtros para la tabla `recetas`
--
ALTER TABLE `recetas`
  ADD CONSTRAINT `IDCateg` FOREIGN KEY (`IDCateg`) REFERENCES `categorias` (`IDCateg`),
  ADD CONSTRAINT `fk_categoria` FOREIGN KEY (`IDUsuarios`) REFERENCES `usuarios` (`IDUsuarios`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
