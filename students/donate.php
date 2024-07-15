<?php

    session_start();

    

    $user = $_SESSION["user"];
    $password = $_SESSION["password"];

    $connect = mysqli_connect("localhost","root","","score");
    $students_databse = mysqli_query($connect,"SELECT * FROM students");
    $donate_databse = mysqli_query($connect,"SELECT * FROM donate");

    while ($row = mysqli_fetch_array($students_databse)) {
        if ($row["user"] == $user && $row["pass"] == $password ){
            $score = $row["score"];
            // unset($_SESSION["user"]);
            // unset($_SESSION["password"]);
        }
    }

    if(isset($_POST["libra-submit"])) {
       $donate_lib = 5;
       if ($score >= 5) {
        $pop = true;
        $mes = "การสร้างหอสมุดในพื้นที่ยากไร้";

        while ($row = mysqli_fetch_array($donate_databse)) {
            if ($row["donate_name"] == "lib" ){
                $doante_int = $row["doante"];
                // unset($_SESSION["user"]);
                // unset($_SESSION["password"]);
            }
        }


        mysqli_query($connect,"UPDATE students SET score = $score-5 WHERE user = $user");
        $score = $score-5;
        mysqli_query($connect,"UPDATE donate SET doante = $doante_int+5 WHERE donate_name = 'lib' " );

       }elseif ($score < 5) {
            $pop = false;
       }
    }


    if(isset($_POST["cow-submit"])) {
        $donate_lib = 5;
        if ($score >= 5) {
        $pop = true;
        $mes = "ไถ่ชีวิตโคกระเบือ";
            
         while ($row = mysqli_fetch_array($donate_databse)) {
             if ($row["donate_name"] == "cow" ){
                 $doante_int = $row["doante"];
                 // unset($_SESSION["user"]);
                 // unset($_SESSION["password"]);
             }
         }
 
 
         mysqli_query($connect,"UPDATE students SET score = $score-5 WHERE user = $user");
         $score = $score-5;
         mysqli_query($connect,"UPDATE donate SET doante = $doante_int+5 WHERE donate_name = 'cow' " );
 
        }elseif ($score < 5) {
            $pop = false;
        }
     }


?>
<!DOCTYPE html>
<html lang="en">
<head>

    <!-- ICON LINK -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!---->

    <!-- thai font --><link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- thai font2 kanit -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bai+Jamjuree:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>บริจาคเเต้มสหกรณ์</title>
    <Link rel = "stylesheet" href = "style/std_h_style.css?v=<?php echo time(); ?>">
    <Link rel = "stylesheet" href = "style/donate.css?v=<?php echo time(); ?>">

</head>
<body>

    <?php
        include("nav/top_bar.php");
    ?>

    
    <form action="donate.php" method = "post">

        <div class="donate-content">

            <div class="libraly-donate">
                <img src="http://localhost/img_folder/book_icon.png">
                <p>บริจาคเพื่อนำไปสร้างห้องสมุดในพื้นที่ยากไร้</p>
                
                <button name = "libra-submit" class = "libra-btn"><span>บริจาค 5 เเต้ม</span></button>
                <h5 id  ="lib" class = "h"></h5>
            </div>
    
            <div class="cow-donate">
                
                <img src="http://localhost/img_folder/cow_icon.png" >
                <p>บริจาคเพื่อไถ่ชีวิตโคกระบือ</p>
                <button name = "cow-submit" class = "cow-btn"><span>บริจาค 5 เเต้ม</span></button>
                <h5 id  ="cow" class = "h"></h5>

            </div>

        </div>
    </form>

    <div class = "popup" id  ="popup">
        <div class = "check-con" id = "check">
            <i class='bx bx-check' id = "icon"></i>
        </div>

        <span id = "txt">บริจาคเพื่อนำไป <?php echo $mes;?> สำเร็จ</span>
    </div>
        

    <script>

var pop = "<?php echo $pop;?>";
        var popup = document.getElementById("popup"); 
        var check = document.getElementById("check");
        var icon = document.getElementById("icon"); 
        var txt= document.getElementById("txt"); 

        if (pop == true) {
            popup.style = "display: flex;";
            setTimeout(function() {
                popup.classList.add("pop-down");
                    setTimeout(function() {
                        popup.classList.remove("pop-down");
                        popup.style = "display: none;";
                    
                }, 500);
            }, 2000);
            
        }else if (pop == false) {
            popup.style = "display: flex;";
            check.style = "background-color: red;";
            icon.className = "bx bx-x";
            txt.innerHTML = "เเต้มของ คุณ ไม่เพียงพอ!!";
            setTimeout(function() {
                popup.classList.add("pop-down");
                    setTimeout(function() {
                        popup.classList.remove("pop-down");
                        popup.style = "display: none;";
                    
                }, 500);
            }, 2000);

        }

    </script>
    
</body>
</html>