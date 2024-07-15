<?php

    session_start();

    $mn_status = $_SESSION["mn_status"];

    if ($mn_status == "out"){
        header('Location: http://localhost/login/login.php');

    }elseif ($mn_status == "in") {

    }

    


?>
<!DOCTYPE html>
<html lang="en">
<head>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Charm:wght@400;700&family=Charmonman:wght@400;700&family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Pattaya&family=Thasadith:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Charm:wght@400;700&family=Charmonman:wght@400;700&family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Thasadith:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าหลักการจัดการเเต้มสหกรณ์นักเรียน โรงเรียนสกลราชวิทยานุกูล</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">


    <Link rel="stylesheet" href="style/mn_topbar.css?v=<?php echo time(); ?>">
</head>
<body>

    <?php include("nav/top_bar_mn.php")?>
    <div class="main-con">
        <?php include("nav/side_bar_mn.php")?>

        <div class="img">
            <img src="https://scontent.fkkc4-1.fna.fbcdn.net/v/t39.30808-6/450367699_887569473407079_6046071045500918538_n.jpg?_nc_cat=100&ccb=1-7&_nc_sid=127cfc&_nc_ohc=DKQPzhq9yJQQ7kNvgE0nhsO&_nc_ht=scontent.fkkc4-1.fna&oh=00_AYD31_a-Sq5VQyUsvhlM1ZUc9VjJuLjzs_pKkIg2Drb7KQ&oe=6695E8C9" >
            <span>ยินดีย้อนรับเข้าสู่เว็บจัดการเเต้มสหกรณ์นักเรียน</span>
            
        </div>
    </div>
    
    


    

    

</body>
</html>