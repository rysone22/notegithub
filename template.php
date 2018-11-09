<?php
require "database.php";
$property = getProperty(<%ID>);
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $property['title'];?></title>
</head>
<body>
<a href = "index.php">メニューに戻る</a>
<form action="edit.php" method="POST">
   <button type="submit" name="id" value="<?php echo $property['id'];?>">編集する</button>
</form>

<h1><?php echo $property['title'];?></h1>
<h2>タグ：<?php echo $property['tag']?></h2>
<pre><?php echo $property['article'];?></pre>

</body>
</html>
