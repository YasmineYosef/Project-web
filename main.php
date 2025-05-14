<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
  <link rel="stylesheet" href="CSS/bootstrap.css">
</head>
<body style="background-color:ivory">
   <div  class=" d-grid gap-2 d-md-flex justify-content-md-start ">
<a href="main2.php"class="btn btn-outline-secondary btn-lg fs-5 mt-3" style=" margin-left: 15px;" name="show" >Show Registered Students</a>
</div>   
<div class="container text-center">
<h3 class="display-5 mt-4"style="color: rgb(176, 46, 67)" >Student Registration Form</h3>
<p class="fw-light mt-4 fs-5">Fill out the form carefully for registration</p>
<hr class="mt-4">
</div>
<div class="container text-rigth mt-4">
<form class="row g-4 " method="post">
  <div class="col-md-12">
  <label for="inputPassword4" class="form-label fs-5">Student Name</label>
  <div class="row g-3">
  <div class="col">
    <input type="text" class="form-control" placeholder=" Enter Your Name" aria-label=" name" name="name"style="background-color:ivory ">
</div>
</div>
  </div>
  <div >
<label for="inputPassword4" class="form-label fs-5">Gender</label>  
</div>
<div class="d-flex  align-items-center gap-3">
  <div class="form-check ">
  <input class="form-check-input fs-5" type="radio" name="radioDefault" id="radioDefault1" value="Male">
  <label class="form-check-label fs-5" for="radioDefault1">
Male
  </label>
</div>
<div class="form-check" >
  <input class="form-check-input fs-5" type="radio" name="radioDefault" id="radioDefault2" value="Female">
  <label class="form-check-label fs-5" for="radioDefault2" >
Female
  </label>
</div>
</div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label fs-5">Email</label>
    <input type="email" class="form-control" id="inputEmail4"placeholder=" Enter Your Email"name="email"style="background-color:ivory">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label fs-5">Phone Number</label>
    <input type="tel" class="form-control" id="inputPassword4"placeholder=" Enter Your Phone Number"name="phone"style="background-color:ivory">
  </div> 
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label fs-5">Date Of Birth</label>
    <input type="date" class="form-control" id="inputPassword4"placeholder=" Enter Your Date Of Birth" name="brithday"style="background-color:ivory">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label fs-5">National Number</label>
    <input type="number" class="form-control" id="inputPassword4"placeholder=" Enter Your National Number" name="nationalnumber"style="background-color:ivory">
  </div>
  <div class="col-md-12">
    <label for="inputPassword4" class="form-label fs-5">Major</label>
    <input type="text" class="form-control" id="inputPassword4"placeholder=" Enter Your Major"name="major"style="background-color:ivory">
  </div>
  <div class="col-12">
    <label for="inputAddress" class="form-label fs-5">Address</label>
    <input type="text" class="form-control" id="inputAddress" placeholder=" Enter Your Address"name="address"style="background-color:ivory">
</div>
  <br>
  <div  class="container text-center  gap-2 col-6 mx-auto mt-4">
<button type="submit" class="btn btn-success  btn-lg d-grid gap-2 col-4 mx-auto  fs-4" name="save" >Save</button>
</div>
</div>
<br><br>
  </form>
<?php
$conn=new mysqli("localhost","root","","database");
if(isset($_POST['save'])){
    $name=$_POST['name'];
    $gender=$_POST['radioDefault'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $birthday=$_POST['brithday'];
    $national=$_POST['nationalnumber'];
    $major=$_POST['major'];
    $address=$_POST['address'];
    $sqlcomm=$conn ->prepare("INSERT into student (name, address, phone, birthday, gender, email, nationalnumber, major)
     VALUES('$name','$address','$phone','$birthday','$gender','$email','$national','$major')");
    $sqlcomm->execute();
header("location:main.php?success=1");
    exit();
}
?>
<?php
if (isset($_GET['success'])) {
    echo "
    <script>
        window.onload = function() {
            alert('Saved Successfully');
            if(window.history.replaceState){
                const url = new URL(window.location);
                url.searchParams.delete('success');
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