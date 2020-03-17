<?php 
require_once "db.php";//подключаем бд

	function get_product_by_id($id){ //функция для взаимодействия с таблицей products, берет инфу из гетов при клике на "в корзину"
	global $connect; //глобальное обращение к конекту, в котором зафиксировано подключение к бд

	$query = "SELECT * FROM products WHERE id=" . $id; //при клике закидывается id
	$request = mysqli_query($connect, $query); 
	$product = mysqli_fetch_assoc($request); //mysqli_fetch_assoc — Извлекает результирующий ряд в виде ассоциативного массива, в данном случае из нашей бд и передает значение в $product
	 if (empty(product)){
            header("Location:404.php");
          }

	return $product; //возвращаем новое значение
	}
?>