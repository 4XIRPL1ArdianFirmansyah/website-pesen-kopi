<?php 
$conn = mysqli_connect('localhost', 'root', '', 'db_coffe_shop');

function query($query) {
  global $conn;
  return mysqli_query($conn, $query);
}

function insert($query) {
  global $conn;
  mysqli_query($conn, $query);
}

function delete($table, $id) {
  global $conn;
  $query = "DELETE FROM $table WHERE id = $id";
  return query($query);
}