<?php 
if($_GET) {
	if(isset($_GET['error_message'])) {
		$error_message = $_GET['error_message'];
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registro</title>
</head>
<body>
	<h1>Registro de Usuarios</h1>

<?php if(isset($error_message)) { ?>
	<div><strong><?php echo $error_message; ?></strong></div>
<?php } ?>
	<form action="php/process_registration.php" method="post">
		<div>
			<label>Nombre</label>
			<input type="text" name="name" required="required">
		</div>
        <div>
			<label>Rol</label>
			<select name="type" required="required">
				<option value="">Seleccione...</option>
				<option value="Administrador">Administrador</option>
				<option value="Cliente">Cliente</option>
			</select>
        </div>
        <div>
			<label>Nombre de Usuario</label>
			<input type="text" name="username" required="required">
		</div>
		<div>
         <label>Contraseña</label>
			<input type="password" name="password" required="required">
		</div>
		<div>
			<button>Registrarme!</button>
		</div>
        <div>
            <label>Ya tengo Usuario, </label>
            <a href="index.php">Iniciar sesion</a>
        </div>
	</form>
</body>
</html>