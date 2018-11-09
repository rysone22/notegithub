<?php
$id = $_POST{"id"};

require "database.php";
$property = getProperty($id);
?>

<style type="text/css">
textarea{ font-size: 100%; }
</style>

<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <title>編集　＃<?php echo $property['title'];?></title>
</head>
<body>

   <script>
   function checkDelet(){
      var flag = confirm("本当に削除しますか？");
      return flag;
   }
   </script>
   <a href = "index.php">メニューに戻る</a>
   <form action="updatefile.php" method="POST" onsubmit="return checkDelet()">
      <button type="submit" name="delete" value="<?php echo $property['id'];?>">削除する</button>
   </form>
   <form action="updatefile.php" method="POST">
      タイトル：<input type="text" name="title" size="50" value="<?php echo $property['title'];?>"><br>
      タグ：
      <select type = "text" name="tag">
         <option <?php if ($property['tag'] == "なし"){echo "selected";}?>>なし</option>
         <option <?php if ($property['tag'] == "html"){echo "selected";}?>>html</option>
         <option <?php if ($property['tag'] == "css"){echo "selected";}?>>css</option>
         <option <?php if ($property['tag'] == "javaScript"){echo "selected";}?>>javaScript</option>
         <option <?php if ($property['tag'] == "php"){echo "selected";}?>>php</option>
         <option <?php if ($property['tag'] == "mysql"){echo "selected";}?>>mysql</option>
      </select><br>
      <textarea name="article" rows="30" cols="50"><?php echo $property['article'];?></textarea><br>
      <button type="submit" name="id" value="<?php echo $property['id'];?>">更新する</button>
   </form>
</body>
</html>
