<?php
  /* Принимаем данные из формы */
  $page_id = $_POST["page_id"]; //уникальный идентификатор страницы
  $name = $_POST['name']; //имя пользователя, берется из куки
  $text_comment = $_POST["text_comment"]; //текст комментария
  $name = htmlspecialchars($name);// Преобразуем спецсимволы в HTML-сущности
  $text_comment = htmlspecialchars($text_comment);// Преобразуем спецсимволы в HTML-сущности
  $mysqli = new mysqli("localhost", "root", "", "zd11");// Подключается к базе данных
  $mysqli->query("INSERT INTO `comments` (`name`, `page_id`, `text_comment`) VALUES ('$name', '$page_id', '$text_comment')");// Добавляем комментарий в таблицу
  header("Location: ".$_SERVER["HTTP_REFERER"]);// Делаем реридект обратно
?>

