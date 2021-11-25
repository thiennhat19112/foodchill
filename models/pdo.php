<?php
function pdo_get_connection() {
   $dburl = "mysql:host=localhost;dbname=foodchill;charset=utf8";
   $username = 'root';
   $password = '';
   $conn = new PDO($dburl, $username, $password);
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   return $conn;
}

function pdo_execute($sql) {
   $sql_args = array_slice(func_get_args(), 1);
   try {
      $conn = pdo_get_connection();
      $stmt = $conn->prepare($sql);
      $stmt->execute($sql_args);
   } catch (PDOException $e) {
      throw $e;
   } finally {
      unset($conn);
   }
}

function pdo_query($sql) {
   $sql_args = array_slice(func_get_args(), 1);
   try {
      $conn = pdo_get_connection();
      $stmt = $conn->prepare($sql);
      $stmt->execute($sql_args);
      $rows = $stmt->fetchAll();
      return $rows;
   } catch (PDOException $e) {
      throw $e;
   } finally {
      unset($conn);
   }
}

function pdo_query_one($sql) {
   $sql_args = array_slice(func_get_args(), 1);
   try {
      $conn = pdo_get_connection();
      $stmt = $conn->prepare($sql);
      $stmt->execute($sql_args);
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      return $row;
   } catch (PDOException $e) {
      throw $e;
   } finally {
      unset($conn);
   }
}

function pdo_query_value($sql) {
   $sql_args = array_slice(func_get_args(), 1);
   try {
      $conn = pdo_get_connection();
      $stmt = $conn->prepare($sql);
      $stmt->execute($sql_args);
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      return array_values($row)[0];
   } catch (PDOException $e) {
      throw $e;
   } finally {
      unset($conn);
   }
}

function shortDate($time){
   //Time settings   
      date_default_timezone_set('Asia/Ho_Chi_Minh');
   return date_format(date_create($time), 'd \t\h\á\n\g m, Y');
}