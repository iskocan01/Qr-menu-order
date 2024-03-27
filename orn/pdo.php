<?php

    $hostname = "bellanay.mysql.dbaas.com.br";
    $dbname = "bellanay";
    $username = "bellanay";
    $pw = "Bellanay55#";

try {
    $pdo = new PDO ("mysql:host=$hostname;dbname=$dbname","$username","$pw");


  } catch (PDOException $e) {
    echo "hhata mesajımız  " . $e->getMessage() . "\n";
    exit;
  }
      $query = $pdo->query("select * FROM tbl_food",PDO::FETCH_OBJ)->fetchAll();

      
      echo "<pre>";
        print_r($query);
      echo "</pre>";
      



    /*  $query->execute();
 
      for($i=0; $row = $query->fetch(); $i++){
        echo $i." - ".$row['id']."<br/>";
      }
 */
     // unset($pdo); 
     // unset($query);
?>