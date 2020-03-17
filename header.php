<?php
	session_start();
	require_once "db.php";

   $query = "SELECT * FROM products"; //берем все поля из бд
   $request = mysqli_query($connect, $query); //возвращаем значеняи в переменную
  	$item = [];//объявляем пустой массив, позже вставим туда данные из бд через while

  	while ($response = mysqli_fetch_array($request)) { //извлекает результирующий ряд в виде ассоциативного массива
  		$item[] = $response;
	}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<link href="Assets/css/style.css" rel="stylesheet"> <!-- подключаем стили -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet"> <!-- подключение шрифтов -->
	<title>KUPIP.RU</title>
</head>
<body>

	<!-- ===============================header============================ -->
	
	<header class="header"> <!-- хедер сайта -->
			<nav class="navigation"> <!-- меню навигации сайта -->
				
				<ul class="navigation__menu">
					<li class="navigation__page"><a href="/Index.php">Главная</a></li>
					<li class="navigation__page"><a href="#">О нас</a></li>
					<li class="navigation__page"><a href="/LK.php"><?php if (isset($_SESSION['product_list'])) { //SESSION - суперглобальная переменная, если просто - позволяет юзать cookie, пробрасывая данные на другие страницы 
	echo "Корзина: " . count($_SESSION['product_list']) ; //выводит данные по корзине, count считает переменные в массиве, а массив пополняется через переменную, возвращает число
	} ?></a></li>
				</ul>

			</nav> <!-- /меню навигации сайта -->
	</header> <!-- /хедер сайта -->
	<!-- ===============================/header============================ -->