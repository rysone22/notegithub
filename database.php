<?php

define('DB_DATABASE', 'note_db');
define('DB_USERNAME', 'dbuser');
define('DB_PASSWORD', '8gr54u');
define('PDO_DSN', 'mysql:dbhost=localhost;dbname=' . DB_DATABASE);

// データベースへ追加
function insertNewFile($id, $title, $tag, $article, $datetime){

   try {
      $db = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $db->exec("insert into files (id, title, tag, article, datetime) values ($id, '$title', '$tag', '$article', '$datetime')");

   } catch (PDOException $e) {
      echo $e->getMessage();
      exit;
   }
}

// レコードを更新
function updateFile($id, $title, $tag, $article){

   try {
      $db = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $stmt = $db->prepare("update files set title = :title, tag = :tag, article = :article where id = $id");
      $stmt->execute([
         ':title' => $title,
         ':tag' => $tag,
         ':article' =>$article
      ]);

   } catch (PDOException $e) {
      echo $e->getMessage();
      exit;
   }
}

// レコードを削除
function deleteFile($id){

   try {
      $db = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $stmt = $db->exec("delete from files where id = $id");

   } catch (PDOException $e) {
      echo $e->getMessage();
      exit;
   }
}

// idに紐付けてレコードを取得
function getProperty($id){

   try {
      $db = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $stmt = $db->query("select * from files where id = $id");

      foreach ($stmt as $row) {
         $property = $row;
      }

      return $property;

   } catch (PDOException $e) {
      echo $e->getMessage();
      exit;
   }
}

// 目次ページにて作成ずみファイルを並べる
// $new_orderがtrueなら新しい順番
function soatFiles($new_order){

   try {
      $db = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $sql = "select * from files order by datetime desc";

      if (!$new_order) {
         $sql = "select * from files order by datetime";
      }

      $stmt = $db->query($sql);
      $files = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $files;

   } catch (PDOException $e) {
      echo $e->getMessage();
      exit;
   }
}
