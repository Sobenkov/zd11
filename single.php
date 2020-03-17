<?php 
// подключаем шапку
   session_start();
   require_once("header.php");
   require_once ("db.php");
 ?>
	<!-- ===============================main=============================== -->
<div class="container">
  
  <div class="single__product">
  <!-- подключаемся к бд, чтобы на странице выводились данные по id -->
    <?php 

       if( isset($_GET['id']) ) {
          $query = "SELECT * FROM products WHERE id=" . $_GET['id']; //запрос к бд
          $request = mysqli_query($connect, $query); //возвращаем значение в переменную
          $product = mysqli_fetch_array($request);
          if (empty(product)){
            header("Location:404.php");
          }
       }
      
     ?>

    <div class="single__left"> <!-- блок с изображением товара -->
          <img src="<?php  echo $product['img'] ?>" alt=""> <!-- выводим ссылку на изображение из бд -->
    </div>

    <div class="single__right"> <!-- описание товара -->
      <h2><?php echo $product['title']; ?></h2>
      <p><?php echo $product['text']; ?></p>
      <p><?php echo $product['text_full']; ?></p>
      <div class="product__price">Цена: <?php  echo $product['price'] ?> Руб.</div> <!-- цену -->
      <a href="LK.php?product_id=<?php echo $product['id']?>"><button class="btn">В корзину</button></a>
    </div>
  </div>

  <div class="single__comments">

    <form name="comment" action="comment.php" method="post"> <!-- взаимодействие с comment.php -->
    
      <p>
        <label><b>Что вы думаете о данном товаре?</b></label>
        <input type="text" name="name" placeholder="Введите свой никнейм">
        <textarea name="text_comment" cols="30" rows="50"></textarea>
      </p>
      <p>
        <input type="hidden" name="page_id" value="<?php echo $product['id']; ?>" /> <!-- в value указывает id данной страницы, то есть везде комменты будут разные -->
        <input class="comment_btn" type="submit" value="Отправить" />
      </p>
    </form>

    <?php
      $page_id = $product['id'];// Уникальный идентификатор страницы (статьи или поста)
      $mysqli = new mysqli("localhost", "root", "", "zd11");// Подключается к базе данных
      $result_set = $mysqli->query("SELECT * FROM `comments` WHERE `page_id`='$page_id'"); //Вытаскиваем все комментарии для данной страницы
      while ($row = $result_set->fetch_assoc()) {
        echo "<div class='comment'><b>".$row["name"]."</b>: ".$row["text_comment"]."</div>"; //выводим комменты в отдельный див
      }
    ?>
   
  </div> <!-- //комментарии -->
</div>
	<!-- ===============================/main============================== -->
<?php 
// подключаем подвал
	require_once("footer.php");
 ?>