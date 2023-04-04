<?php
$insert=false;
if(isset($_POST['name']))
{
$server="localhost";
$username="root";
$password="";
$con=mysqli_connect($server,$username,$password);
if(!$con)
{
    die("connection to this database failed due to" .
    mysqli_connect_error());
}
 // echo "Success connecting to the db";
 $name=$_POST['name'];
 $gender=$_POST['gender'];
 $age=$_POST['age'];
 $email=$_POST['email'];
 $phone=$_POST['phone'];
 $desc=$_POST['desc'];
 $sql="INSERT INTO `trip`.`trip` ( `name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age',
  '$gender', '$email', '$phone', '$desc', current_timestamp());";
  //echo $sql;
  if($con ->query($sql) == true)
{
  //  echo "Sucessfully inserted";
  $insert =true;

}
else{
    echo "ERROR: $sql <br> $con->error";

}
$con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Alkatra:wght@500;600&family=Noto+Sans:wght@700;900&family=Oswald&family=Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="design.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Alkatra:wght@500;600&family=Noto+Sans:wght@700;900&family=Oswald&family=Roboto:wght@500&family=Sriracha&display=swap" rel="stylesheet">
</head>
<body class="body"> 
    <div class="container">
       <h1>Welcome to Holkar Science College US Trip Form</h1>
        <p>Enter your details and submit this form to conform your participation in the trip</p>
        <?php
        if($insert == true)
        {
        echo "<p class='submit'> Thanks for submitting your form. We are happy to see you joining US trip</p>";        }
        ?>
        <form action="trap.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your Age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
            <textarea name="desc"  id="decs" cols="30"  rows="6" placeholder="Enter any other information here"></textarea>
            <button class="btn">Submit</button>
        </form>
    </div>
    <script src="trip.js"></script>
</body>
</html>
