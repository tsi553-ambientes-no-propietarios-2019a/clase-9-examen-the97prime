<?php 
include('../common/utils.php');

if($_POST) {
	if (isset($_POST['type']) && isset($_POST['quantity'])&& 
        !empty($_POST['type']) && !empty($_POST['quantity'])) {
		$product = $_POST['type'];
		$quantity = $_POST['quantity'];
		$user = $_SESSION['user']['id'];

		$sql_insert = "INSERT INTO pedidos
		(product, quantity)
		VALUES ('$product','$quantity')";

		echo $sql_insert;
		$conn->query($sql_insert);

		if ($conn->error) {
			echo 'Ocurrió un error ' . $conn->error;
		} else {
			redirect('../cliente.php');
		}
	} else {
		redirect('../new_product.php?error_message=Ingrese todos los datos!');
	}
} else {
	redirect('../nuevo_pedido.php');
}