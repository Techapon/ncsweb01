    <?php

    session_start();

    $mn_status = $_SESSION["mn_status"];

    if ($mn_status == "out"){
        header('Location: http://localhost/login/login.php');

    }elseif ($mn_status == "in") {
        
    }

    $complete = false;


    if (isset($_POST["submit"])) {
        $std_id = $_POST["student_id"];
        $score = $_POST["score"];
        
        $fined = false;

        $connect = mysqli_connect("localhost","root","","score");
        $stds_dtbase = mysqli_query($connect,"SELECT * FROM students");

        if ($score > 0) {
            while ($row = mysqli_fetch_array($stds_dtbase)) {
                if ($row["user"] == $std_id) {

                    $fined = true;

                    $std_score = $row["score"];
                    
                    $update_score = mysqli_query($connect,"UPDATE students SET score = $std_score + $score WHERE user = $std_id");
                    

                    $complete = true;
                   
                }

                
            }

            if ($fined == false) {
                $text = "ไม่รหัสพบนักเรียน  ในฐานข้อมูล กรุณากรอกข้อมูลใหม่!!";
            }
            
        }else {
            
        }
    }

    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <!-- icon -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
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
    <title>ระบบเพิ่มเเต้มสหกรณ์นักเรียน โรงเรียนสกลราชวิทยานุกูล</title>

    <Link rel="stylesheet" href="style/mng_style.css?v=<?php echo time(); ?>">

    <Link rel="stylesheet" href="style/mn_topbar.css?v=<?php echo time(); ?>">
</head>
<body>


    <?php include("nav/top_bar_mn.php")?>

    <div  class = "parent-con">
        <?php include("nav/side_bar_mn.php")?>

        <div class="parent-2-con">
            <h1 class = "main_txt">ระบบเพิ่มเเต้มสหกรณ์นักเรียน</h1>
        
            <div class = "big_div">
        
                <form action="manager.php" method = "post">
                    <div class = "std_div" id="test"><span>รหัสนักเรียน</span></div>
                    <br>
        
        
        
                    <input class = "std_id" type="text" name = "student_id" placeholder = "กรอกรหัสนักเรียน">
                    <p id = "p_text" ></p>
                    <br>
        
                    <div class = "scr_div"><span>กรอกเเต้มการซื้อสินค้าในสหกรณ์ของนักเรียน</span></div>
                    <br>
        
                    <input class = "score" type="number" name = "score" placeholder = "กรอกเเต้มที่ต้องป้อน">
                    <br>
        
                    <button class = "sub" type="submit"  name = "submit"><p>เพิ่มเเต้ม</p></button>
                </form>
            </div>

            <div class="pop-up" id = "popup">
                <div class="green">
                    <i class='bx bx-check'></i>
                </div>

                <div class="txts">
                    <span class ="main_text">เพิ่มคะเเนนสำเสร็จ</span><br>
                    <span class = "explain">เพิ่มคะเเนนให้นักเรียน <?php echo$std_id;?> สำเร็จ</span>
                    <span class = "explain">ทั้งหมด <?php echo $score; ?> เเต้ม</span>
                </div>
                
                <div class="btn">
                    <button id="pop">ok</button>
                </div>
            </div>

            

        </div>



    </div>




    <script>

    
        // var tage_p = document.getElementById("p_text");
        // tage_p.innerHTML = text;
        // tage_p.style.color = "red";

        var canpop = "<?php echo $complete;?>";
        var popup = document.getElementById("popup");

        var txt = document.getElementById("test"); 

        var ok_click = document.getElementById("pop"); 

        if (canpop == true) {
           popup.style = "display: flex;";
        }
        // popup.style.opacity = "1";

        ok_click.addEventListener("click", function () {
            popup.classList.add("down");
                setTimeout(function() {
                    popup.classList.remove("down");
                    popup.style = "display: none;";
                    
           }, 270);
          
        });



    </script>
</body>
</html>