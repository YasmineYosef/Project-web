  <link rel="stylesheet" href="CSS/bootstrap.css">
  <?php
$id = isset($_GET['d']) ? $_GET['d'] : 0;
$connection = new PDO("mysql:host=127.0.0.1; dbname=database", "root","");
if(isset($_POST['edit'])){
    $i = $_POST['id'];
    $n = $_POST['name'];
    $addre = $_POST['address'];
    $pho = $_POST['phone'];
    $bri = $_POST['brithday'];
    $gen = isset($_POST['radioDefault']) ? $_POST['radioDefault'] : '';
    $ema = $_POST['email'];
    $noti = $_POST['nationalnumber'];
    $maj = $_POST['major'];

    $sqlup = $connection->prepare("UPDATE student 
        SET Name = ?, Address = ?, Phone = ?, birthday = ?, Gender = ?, Email = ?, nationalnumber = ?, major = ?
        WHERE Id = ?");
    $sqlup->execute([$n, $addre, $pho, $bri, $gen, $ema, $noti, $maj, $i]);
    header("location:main2.php");
    exit();
}

$sql = $connection->prepare("SELECT * FROM student WHERE Id = ?");
$sql->execute([$id]);
$stu = $sql->fetch(PDO::FETCH_ASSOC);

if($stu){
    $name = $stu['name'];
    $addres = $stu['address'];
    $phone = $stu['phone'];
    $brithday = $stu['birthday'];
    $gender = $stu['gender'];
    $email = $stu['email'];
    $nationalnumber = $stu['nationalnumber'];
    $major = $stu['major'];
} else {
    echo "<div class='alert alert-danger'>Student not found!</div>";
    exit();
}
?>

<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Edit Student</title>
</head>
<body style='background-color:ivory'>
    <div class="container" style="max-width: 600px; margin-top: 50px;">
        <h3 class="mb-4">Edit Student</h3>
        <form method='post'>
            <input type='hidden' name='id' value='<?php echo $id; ?>'>
            <div class="mb-3">
                <label class="form-label">Name <span class='a3'>*</span></label>
                <input type='text' name='name' class="form-control" value='<?php echo htmlspecialchars($name); ?>' required style="background-color:ivory">
            </div>
            <div class="mb-3">
                <label class="form-label">Address</label>
                <input type='text' name='address' class="form-control" value='<?php echo htmlspecialchars($addres); ?>'style="background-color:ivory">
            </div>
            <div class="mb-3">
                <label class="form-label">Phone</label>
                <input type='text' name='phone' class="form-control" value='<?php echo htmlspecialchars($phone); ?>'style="background-color:ivory">
            </div>
            <div class="mb-3">
                <label class="form-label">Email <span class='a3'>*</span></label>
                <input type='email' name='email' class="form-control" value='<?php echo htmlspecialchars($email); ?>' required style="background-color:ivory">
            </div>
            <div class="mb-3">
                <label class="form-label">Birthday</label>
                <input type='date' name='brithday' class="form-control" value='<?php echo htmlspecialchars($brithday); ?>'style="background-color:ivory">
            </div>
            <div class="mb-3">
                <label class="form-label">Gender <span class='a3'>*</span></label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="radioDefault" id="male" value="Male" <?php if(trim($gender)=='Male') echo 'checked'; ?> >
                    <label class="form-check-label" for="male">Male</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="radioDefault" id="female" value="Female" <?php if(trim($gender)=='Female') echo 'checked'; ?> >
                    <label class="form-check-label" for="female">Female</label>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">National Number</label>
                <input type='text' name='nationalnumber' class="form-control" value='<?php echo htmlspecialchars($nationalnumber); ?>'style="background-color:ivory">
            </div>
            <div class="mb-3">
                <label class="form-label">Major</label>
                <input type='text' name='major' class="form-control" value='<?php echo htmlspecialchars($major); ?>'style="background-color:ivory">
            </div>
            <br>
           <div style="text-align:center;">
    <button type='submit' name='edit' class="btn btn-success fs-5" style='color:#fff;'>Edit</button>
    <a href="main2.php" class="btn btn-secondary fs-5">Cancel</a>
</div>
<br><br>
        </form>
    </div>
    <script src="JS/bootstrap.js"></script>
</body>
</html>