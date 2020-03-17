<?php 
//подключаем шапку
	require_once("header.php");
 ?>

	<div class="container">

		<div class="about">
			<h1>KUPIP.RU</h1>
			<p>Весенний марафон скидок! До 90% + до -40% дополнительно на все товары в акции по промокоду VESNA40 (Россия), VESNA40KZ (Казахстан), VESNA40BY (Белоруссия). Количество товара ограничено. Срок действия акции с 07:00 16 марта 2020 года до 07:00 23 марта 2020 года по МСК.</p>
		</div>

		<div class="product" id="product"> <!-- блок-каталог -->
			<!-- вывод товаров из бд -->
			<?php
			  	$serv = 'localhost';  // Хост, у нас все локально
			   $user = 'root';    // Имя созданного вами пользователя
			   $password = ''; // Установленный вами пароль пользователю
			   $db = 'zd11';   // Имя базы данных
			   $connect = mysqli_connect($serv, $user, $password, $db); // Соединяемся с базой
			   mysqli_query($connect, "SET NAMES utf8");

			   $query = "SELECT * FROM products"; //берем все поля из бд
			   $request = mysqli_query($connect, $query); //возвращаем значеняи в переменную
			  	$item = [];//объявляем пустой массив, позже вставим туда данные из бд через while

			  	while ($response = mysqli_fetch_array($request)) { //извлекает результирующий ряд в виде ассоциативного массива
			  		$item[] = $response;
			  	}

			?>

			
				<? foreach ($item as $product__item): ?> <!-- foreach перебирает массив по принципу ключ-значение -->
				<div class="product__item"> <!-- квадрат, далее блок повторяется -->
					<img src="<?php  echo $product__item['img'] ?>" alt="товар"> <!-- выводим ссылку на изображение из бд -->
					<div class="product__title"><h3><?php  echo $product__item['title'] ?></h3></div> <!-- выводим название товара -->
					<div class="product__text"><?php  echo $product__item['text'] ?></div> <!-- выводим описание товара -->
					<div class="product__price"><?php  echo $product__item['price'] ?> ₽ </div> <!-- цену -->
					<a href="single.php?id=<?php echo $product__item['id']?>"><button class="btn">Подробнее</button></a> <!-- адрес с прописанным php позволяет конектиться к странице с сингл, но инфомация будет выводиться по айди товара -->
					<a href="LK.php?product_id=<?php echo $product__item['id']?>"><button class="btn">В корзину</button></a> <!-- общий принцип как сверху, но связывает уже страницу ЛК и задает значение product_id -->
				</div>
				<?php endforeach; ?>
				</div>
			
	</div>
 <?php 
		
// подключаем подвал
	require_once("footer.php");
 ?>