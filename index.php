<?php
require "database.php";

// POSTが送られた時は新規順フラグを逆転させる
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

   $new_order = (boolean) $_POST["new_order"];
   $new_order = !$new_order;
} else {
   $new_order = true;
}

$files = soatFiles($new_order);
?>

<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title>メモノート</title>
   </head>
   <body>
      <h1>メモノート</h1>
      <p>学習したことをメモしておけるサイトです</p>
      <a href = "new.html">新規作成</a>
      <br><br>
      <form method="post" action="">
         <button type="submit" name="new_order" value="<?php echo (int)$new_order;
         ?>"><?php

         $str = ($new_order) ? "古い順に並べかえる" : "新しい順に並べかえる";
         echo $str;
         ?></button>
      </form>
      <br>
      <?php foreach( $files as $file ):?>
         <a href = "<?php echo $file['id'];?>.php"><?php echo $file['tag'];?>：<?php echo $file['title'];?></a>
         <br>
      <?php endforeach;?>
   </body>
</html>
