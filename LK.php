<?php 
// подключаем шапку
	require_once("header.php");
	require_once ("function.php");
?>

	<!-- ===============================main=============================== -->
	<br><br>
	<div class="container">

<!-- =====================================корзина================================== -->
	<div class="lk__products">
	<h3>Корзина</h3>
	
	<?php
		session_start(); //начинаем сессию cookie

		require_once "db.php"; //подключаем бд
		require_once "function.php"; //подключаем функцию


		if ( isset($_GET['delete_id']) && isset($_SESSION['product_list']) ) { //если есть корзина и есть параметр удалить
			foreach ($_SESSION['product_list'] as $key => $value) {
				if ( $value['id'] == $_GET['delete_id'] ) { //удаляется выводимая информация по id
					unset($_SESSION['product_list'][$key]);
				}		
			}
		}


		if ( isset($_GET['product_id']) && !empty($_GET['product_id']) ) { //если продукт_ид существует и не пустой

			$current_added_product = get_product_by_id($_GET['product_id']); //записываем в переменную вызов функции и передаем туда id 

			// ...
			if ( !empty($current_added_product) ) { //если есть id 

				if ( !isset($_SESSION['product_list'])) {
					$_SESSION['product_list'][] = $current_added_product; //добавляем в массив значение о первом товаре и фиксируем в сессию
				}


				$product_check = false; //проверка, по сути тумблер, чтобы не добавлять один товар пять раз

				if ( isset($_SESSION['product_list']) ) { //если сессия выше существует
					foreach ($_SESSION['product_list'] as $value) { //пробегаемся по элементам
						if ( $value['id'] == $current_added_product['id'] ) { //если значение id уже есть
							$product_check = true; //тумблер меняет значение
						}
					}
				}

				if ( !$product_check ) { //если тумблер тру
					$_SESSION['product_list'][] = $current_added_product; //записываем новое значение в сессию
				}
			}	
		}

		?>

	<?php if ( isset($_SESSION['product_list']) && count($_SESSION['product_list']) !=0 ) : ?> <!-- проверка, если есть сессия со списком, длина не равна нулю - печатаем товары -->
	
		<ul>
			<?php foreach( $_SESSION['product_list'] as $product__item ) : ?>

				<li>
					<?php echo $product__item['title']; ?> | 
					<?php echo $product__item['price']; ?> ₽ | 
					<a href="LK.php?delete_id=<?php echo $product__item['id'];?>">Х</a> <!-- крестик-удалятор -->
				</li>

			<?php endforeach; ?>
		</ul>
	
	<?php else : ?> <!-- иначе - корзина пуста -->

		<p>
			Ваша корзина пуста
		</p>

	<?php endif; ?>
	<div>
		<a href="index.php"><button class="btn__lk">Продолжить покупки</button></a>
	</div>
	<button class="btn__lk">Купить</button>
	</div>
<!-- ======================================модерация комментов======================== -->
			<h3>Модерация</h3>
			
			  <?php
				  if (isset($_GET['del_id'])) { //проверяем, есть ли переменная
				    //удаляем строку из таблицы
				    $sql = mysqli_query($connect, "DELETE FROM `comments` WHERE `id` = {$_GET['del_id']}"); //удаляем элемент по айди, который обозначается ниже
				  }
				?>
				<!-- таблица модерации -->
				<table class ="moder__table" border='2'>
				  <tr>
				    <td><b>ID</b></td>
				    <td><b>Пользователь</b></td>
				    <td><b>Комментарий</b></td>
				    <td><b>Удалить</b></td>
				  </tr>
				  <?php
				    $sql = mysqli_query($connect, "SELECT * FROM `comments`"); //подключаемя к таблице "comments" и берем из нее все
				    while ($mod = mysqli_fetch_array($sql)) {
				      echo '<tr>' .
				           "<td>{$mod['id']}</td>" . //выводим компоненты
				           "<td>{$mod['name']}</td>" .
				           "<td>{$mod['text_comment']}</td>" .
				           "<td><a href='?del_id={$mod['id']}'>Удалить</a></td>" . //при нажатии обозначается айди и стартует действие выше на удаление
				           '</tr>';
				    }
				  ?>
				</table>

</body>
</html>

	</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>


	<!-- ===============================/main============================== -->
<?php 
// подключаем подвал
	require_once("footer.php");
 ?>