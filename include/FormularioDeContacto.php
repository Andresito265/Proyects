<!DOCTYPE html>
<html>
<head>
	<title>Formulario de Contacto</title>
    <link rel="stylesheet" href="../CSS/EstilosFormularioContacto.css">
</head>
<body>
    <header>
        <h1><img src="../IMG/fondo1.png"></i></h1>
        <nav>
            <a href="../Principal.html"><img src="../IMG/Home.png"></a>
            <a href="../Paginas/sobre_nosotros.html"><img src="../IMG/Informacion.png"></a>
            <a href="../Paginas/productos.html"><img src="../IMG/Zapato.png"></a>
            <a href="../Paginas/FormularioDatosUsuario.html"><img src="../IMG/Cuenta.png"></a>
            <a href="../Paginas/base_datos.html"><img src="../IMG/Base_datos.png"></a>
        </nav>
    </header>
	<h1>Formulario de Contacto</h1>
	<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$nombre = $_POST["nombre"];
		$email = $_POST["email"];
		$telefono = $_POST["telefono"];
		$mensaje = $_POST["mensaje"];

		// Aquí puedes procesar los datos del formulario, como enviar un correo electrónico o almacenarlos en una base de datos.

		echo "<p>Gracias por contactarnos, $nombre. Te responderemos lo antes posible.</p>";
	} else {
	?>
	<form method="POST">
		<label for="nombre">Nombre:</label>
		<input type="text" id="nombre" name="nombre" required><br>

		<label for="email">Email:</label>
		<input type="email" id="email" name="email" required><br>

		<label for="telefono">Teléfono:</label>
		<input type="tel" id="telefono" name="telefono"><br>

		<label for="mensaje">Mensaje:</label><br>
		<textarea id="mensaje" name="mensaje" required></textarea><br>

		<input type="submit" value="Enviar">
	</form>
	<?php } 
    ?>
	<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="../js/script.js"></script>
    <footer class="pie-pagina">
        <div class="grupo-1">
            <div class="box">
                <figure>
                    <a href="#">
                        <img src="../IMG/fondo1.png">
                    </a>
                </figure>
            </div>
            <div class="box">
                <h2>Sobre Nosotros</h2>
                <p>Nos puedes encontrar en: Cl. 18 #9-87 Tunja, Boyacá.</p>
            </div>
            <div>
                <h2>CONTACTANOS</h2>
                <div class="red-social">
                    <a href="../Paginas/FormularioDeContacto.php"><img src="../IMG/Contacto.png"></a>
                </div>
            </div>
        </div>
        <div class="grupo-2">
            <small>&copy; 2023 <b>Juan Sarmiento / Andres Samaca / Andres Vargas </b> PD-PHP / Incap</small>
        </div>
    </footer>
</body>
</html>
