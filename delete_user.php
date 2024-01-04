<?php
include 'dbcon.php';

$id =  $_GET['id'];

$query = "DELETE FROM users WHERE id = :id";

$stmt = $conn->prepare($query);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$results = $stmt->execute();

if ($results) {
       header("location: index.php?msg=Record deleted  successfully");
}else{
       echo "Failed";
}


?>