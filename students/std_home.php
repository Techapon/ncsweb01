<?php


    
    session_start(); 


    if ($_SESSION["status"] == "out") {
        header('Location: http://localhost/login/login.php');
    }
    

    $user = $_SESSION["user"];
    $password = $_SESSION["password"];

    

    
    $connect = mysqli_connect("localhost","root","","score");
    $students_databse = mysqli_query($connect,"SELECT * FROM students");

    while ($row = mysqli_fetch_array($students_databse)) {
        if ($row["user"] == $user && $row["pass"] == $password ){
            $score = $row["score"];
            // unset($_SESSION["user"]);
            // unset($_SESSION["password"]);
        }
    }

    



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- icon  -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- FONT 1 thai-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- FONTS ENG -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <Link rel = "stylesheet" href = "style/std_h_style.css?v=<?php echo time(); ?>">
</head>
<body>

    <?php include("nav/top_bar.php");?>

    <h1 class = "sp-1">WELLCOME</h1>
    <h1 class = "sp-1"> !!!</h1>
   
</body>
</html>