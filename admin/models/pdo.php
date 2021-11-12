<?php
   function pdo_get_connection(){
      $serverName = "localhost";
      $databaseName = "foodchill";
      $username = "root";
      $password = "";
      $options = array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8");

      try {
         $conn = new PDO("mysql:host=$serverName; dbname=$databaseName", $username, $password, $options);
   
         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         return $conn;
         echo "Connection successfully";
      } catch (PDOException $e) {
         echo "Connection failed: " . $e->getMessage();
      }
   }
   
   //Add Del Update
   function pdo_execute($sql){
      $sql_args = array_slice(func_get_args(), 1);
      $conn = pdo_get_connection();
      $stmt = $conn->prepare($sql);
      $stmt->execute($sql_args);
      //return $stmt;
   }
   //See all
   function pdo_query($sql){
      $sql_args = array_slice(func_get_args(), 1);
      $conn = pdo_get_connection();
      $stmt = $conn->prepare($sql);
      $stmt->execute($sql_args);
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $result;
   }
   //See one
   function pdo_query_one($sql){
      $sql_args = array_slice(func_get_args(), 1);
      $conn = pdo_get_connection();
      $stmt = $conn->prepare($sql);
      $stmt->execute($sql_args);
      $result = $stmt->fetch(PDO::FETCH_ASSOC);
      return $result;
   }
?>