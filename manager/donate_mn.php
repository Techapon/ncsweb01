<?php

    session_start();


    $connect = mysqli_connect("localhost","root","","score");
    $students_databse = mysqli_query($connect,"SELECT * FROM students");
    $donate_databse = mysqli_query($connect,"SELECT * FROM donate");

    
    if(isset($_POST["user"])) {
        $std_id = $_POST["user"];

        while ($row = mysqli_fetch_array($students_databse)) {
            if ($row["user"] == $std_id ){
                $score = $row["score"];
                // unset($_SESSION["user"]);
                // unset($_SESSION["password"]);
                if(isset($_POST["libra-submit"])) {
                   $donate_lib = 5;
                   if ($score >= 5) {
                    $pop = true;
            
                    while ($row = mysqli_fetch_array($donate_databse)) {
                        if ($row["donate_name"] == "lib" ){
                            $doante_int = $row["doante"];
                            // unset($_SESSION["user"]);
                            // unset($_SESSION["password"]);
                            
                            
                        }
                    }
                   
                    mysqli_query($connect,"UPDATE students SET score = $score -5 WHERE user = $std_id");
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
             
                     while ($row = mysqli_fetch_array($donate_databse)) {
                         if ($row["donate_name"] == "lib" ){
                             $doante_int = $row["doante"];
                             // unset($_SESSION["user"]);
                             // unset($_SESSION["password"]);
                         }
                     }
             
                     
                     mysqli_query($connect,"UPDATE students SET score = $score-5 WHERE user = $std_id");
                     $score = $score-5;
                     mysqli_query($connect,"UPDATE donate SET doante = $doante_int+5 WHERE donate_name = 'cow' " );
                     
                     
                    }elseif ($score < 5) {
                        $pop = false;
                    }
                 }
                 break;
                 
                

            }
            $pop = "cant_find";
       
        }
       


    
    }
   



?>

<!DOCTYPE html>
<html lang="en">
<head>

<!-- icon -->
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<!-- end -->

<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- thai font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- thai font2 -->
   
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bai+Jamjuree:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

    <!-- THai font3 -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bai+Jamjuree:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&family=Noto+Sans+Thai:wght@100..900&display=swap" rel="stylesheet">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบบริจาคเเต้มสหกรณ์ของนักเรียน โรงเรียนสกลราชวิทยานุกูล</title>

    <Link rel="stylesheet" href="style/mn_topbar.css?v=<?php echo time(); ?>">

    <Link rel="stylesheet" href="style/donate.css?v=<?php echo time(); ?>">
</head>
<body>
    <?php include("nav/top_bar_mn.php")?>
    <div class="main-con">
        <?php include("nav/side_bar_mn.php")?>

        <div class="big-con">
            <h1 class = "main_txt">ระบบบริจาคเเต้มสหกรณ์นักเรียน</h1>
            <form action="donate_mn.php" method="post">

                <div class="child-div">

                    <div class = "std_id">
                        <!-- <span>รหัสนักเรียน</span> -->
                        <input type="text" name="user" placeholder="รหัสนักเรียน">
                    </div>
    

                    <div class="donate-con">

                        <div class="lib-div">
        
                            <img src="http://localhost/img_folder/book_icon.png" >
                            <span >บริจาคเพื่อนำไปสร้างห้องสมุดในพื้นที่ยากไร้</span>
                            <button name = "libra-submit" class = "libra-btn"><span>บริจาค 5 เเต้ม</span></button>
                        </div>
        
                        <div class="cow-div" >
                            <img src="http://localhost/img_folder/cow_icon.png" >
                            <span >บริจาคเพื่อไถ่ชีวิตโคกระบือ</span>
                            <button name = "cow-submit" class = "cow-btn"><span>บริจาค 5 เเต้ม</span></button>
                        </div>
                        
                    </div>
                </div>
            </form>
        </div>


        <div class="pop-up" id = "popup">
            <div class="check-con" id = "check">
                <i class='bx bx-check' id = "icon"></i>
            </div>

            <span id = "txt">บริจาคโดย <?php echo $std_id;?> สำเร็จ</span>
        </div>
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
                popup.classList.add("down");
                    setTimeout(function() {
                        popup.classList.remove("down");
                        popup.style = "display: none;";
                    
                }, 500);
            }, 2500);
            
        }else if (pop == false) {
            popup.style = "display: flex;";
            check.style = "background-color: red;";
            icon.className = "bx bx-x";
            txt.innerHTML = "เเต้มของ <?php echo $std_id;?> ไม่เพียงพอ";
            setTimeout(function() {
                popup.classList.add("down");
                    setTimeout(function() {
                        popup.classList.remove("down");
                        popup.style = "display: none;";
                    
                }, 500);
            }, 2500);

        }else if (pop == "cant_find") {
            popup.style = "display: flex;";
            check.style = "background-color: red;";
            icon.className = "bx bx-x";
            txt.innerHTML = "ไม่พอนักเรียน<?php echo $std_id;?>ในฐานข้อมูล";
            setTimeout(function() {
                popup.classList.add("down");
                    setTimeout(function() {
                        popup.classList.remove("down");
                        popup.style = "display: none;";
                    
                }, 500);
            }, 2500);

        }

        // 

    </script>
</body>
</html>