<?php 
	$serv = 'localhost';  // Хост, у нас все локально
   $user = 'root';    // Имя созданного вами пользователя
   $password = ''; // Установленный вами пароль пользователю
   $db = 'zd11';   // Имя базы данных
   $connect = mysqli_connect($serv, $user, $password, $db); // Соединяемся с базой
 ?>