<?php 
include('../common/utils.php');

if($_POST) {
	if (isset($_POST['product']) && isset($_POST['price'])&& 
        !empty($_POST['product']) && !empty($_POST['price'])) {
		$product = $_POST['product'];
		$price = $_POST['price'];
		$user = $_SESSION['user']['id'];

		$sql_insert = "INSERT INTO product
		(product, price)
		VALUES ('$product','$price')";

		echo $sql_insert;
		$conn->query($sql_insert);

		if ($conn->error) {
			echo 'Ocurrió un error ' . $conn->error;
		} else {
			redirect('../administrador.php');
		}
	} else {
		redirect('../new_product.php?error_message=Ingrese todos los datos!');
	}
} else {
	redirect('../nuevo_producto.php');
}