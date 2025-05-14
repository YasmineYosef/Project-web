<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="CSS/bootstrap.css">
</head>
<body >
 
<br><br>
<h3 class=" fw-light mt-4 fs-1"style=" margin-left: 60px;" >List Of Student Register:</h3>
<a href="main.php" class="btn btn-primary active fw-light mt-2 fs-5"style=" margin-left: 60px;" >Add Student</a>
<table class="table table-bordered  table-striped table-hover mt-3 table "style=" width: 94%; height: 150px; margin: auto; ">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Address</th>
        <th>Phone Number</th>
        <th>Date Of Birth</th>
        <th>Gender</th>
        <th>Email</th>
        <th>National Number</th>
        <th>Major</th>
        <th>Actions</th>
</tr>
<?php  
$connection = new PDO("mysql:host=127.0.0.1; dbname=database", "root","");
$sql = $connection->prepare("select * from student");
$sql->execute();
foreach($sql as $stu){
    echo "
    <tr>
    <th> $stu[0]</th>
    <th> $stu[1]</th>
    <th> $stu[2]</th>
   <th> $stu[3]</th>
   <th> $stu[4]</th>
   <th> $stu[5]</th>
   <th> $stu[6]</th>
  <th> $stu[7]</th>
  <th> $stu[8]</th>
    <th> 
       <a href='edit.php?d=$stu[0]' class='btn btn-warning'>Edit</a>                     
       <a href='?d=$stu[0]' class='btn btn-danger' >Delete</a>
    </th>
 </tr>    
    ";
}
?>
<?php 
if(isset($_GET['d'])){
$id=$_GET['d'];
$connection = new PDO("mysql:host=127.0.0.1; dbname=database", "root","");
$sql = $connection->prepare("delete from student where Id=$id");
$sql->execute(); 
header("location:main2.php?delete=1");
}
?>
<?php
if (isset($_GET['delete'])) {
    echo "
    <script>
        window.onload = function() {
            alert('Are You Sure You Want To Delete This Data?');
            if(window.history.replaceState){
                const url = new URL(window.location);
                url.searchParams.delete('delete');
                window.history.replaceState({}, document.title, url.pathname + url.search);
            }
        }
    </script>
    ";
}
?>
<script src="JS/bootstrap.js"></script>
</body>
</html>