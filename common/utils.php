<?php 
session_start();


$conn = new mysqli('localhost', 'root', '', 'prueba');

if($conn->connect_error) {
	echo 'Existió un error en la conexión ' . $conn->connect_error;
	exit;
}

function redirect($url) {
	header('Location: ' . $url);
	exit;
}

function getPedidos($conn) {
	$user_id = $_SESSION['user']['id'];
	$sql = "SELECT *
		FROM pedidos
		WHERE user='$user_id'";

		$res = $conn->query($sql);

		if ($conn->error) {
			redirect('../home.php?error_message=Ocurrió un error: ' . $conn->error);
		}

		$pedidos = [];
		if($res->num_rows > 0) {
			while ($row = $res->fetch_assoc()) {
				$pedidos[] = $row;
			}
		}

		return $pedidos;
}

if ($_SERVER['SCRIPT_NAME'] != '../index.php' && $_SERVER['SCRIPT_NAME'] != '../php/process_login.php' && $_SERVER['SCRIPT_NAME'] != '../php/process_registration.php' && !isset($_SESSION['user'])) {
	redirect($_SERVER["HTTP_HOST"] . '../index.php');
} elseif( $_SERVER['SCRIPT_NAME'] == '../index.php' && isset($_SESSION['user']) ) {

	redirect($_SERVER["HTTP_HOST"] . '../home.php');
}

