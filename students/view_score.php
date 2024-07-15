<?php

    session_start();


    $user = $_SESSION["user"];
    $password = $_SESSION["password"];

    $connect = mysqli_connect("localhost","root","","score");
    $students_databse = mysqli_query($connect,"SELECT * FROM students");

    $scr_list = array();
    while ($row = mysqli_fetch_array($students_databse)) {
        $scr_list[] = $row["score"];
        if ($row["user"] == $user && $row["pass"] == $password ){
            $score = $row["score"];
            // unset($_SESSION["user"]);
            // unset($_SESSION["password"]);
        }
    }

    $most = max($scr_list);
    $avr = array_sum($scr_list) / count($scr_list);
    $scr = $score;

    $mes_most = "height:100%;";
    $mes_avr = "height:". ($avr / $most) *100 ."%;";
    $mes_scr = "height:". ($scr / $most) *100 ."%;";

  
   
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
    <!-- FONT 2 thai -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bai+Jamjuree:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เเต้มสหกรณ์ของนักเรียนโรงเรียนสกลราชวิทยานุกูล</title>
    <Link rel = "stylesheet" href = "style/std_h_style.css?v=<?php echo time(); ?>">
    <Link rel = "stylesheet" href = "style/view.css?v=<?php echo time(); ?>">
</head>
<body class = "lc_body">
    <?php include("nav/top_bar.php");?>
    
    <div class="big-div">
        
        <div class = "pr-1">
            <div class="div-1">
                <div class="score-shw">
                    <h4>
                        <?php echo $score;?>
                    </h4>
                </div>
    
    
                <div class = "other-shw">
    
                    <h1>เเต้มสหกรณ์ปัจจุปัน</h1>
                    
                    <span class = "user"> รหัสนักเรียน : <?php echo $user?></span>
    
                    <div class = "pass-shw">
                        <p class = "user" id = "pass"> รหัสผ่าน : ••••••••••••</p>
                        <i id = "eye" class='bx bxs-hide'></i>
                    </div>
                </div>

            </div>


            <div class="cal">
                <button id = "btn-1" class="btn-1">
                        คำนวณเงินปันผล
                </button>
                    
                <div class="result" >
                    <p id = "shw-rsl" class = "shw-rsl">
                            
                    </p>
                </div>
                
            </div>
        
        </div>

        <div class="div-2">

            <div class = "text-con">
                <h1>
                    กราฟเเสดงข้อมูลเเต้มสหกรณ์
                </h1>

            </div>
            
            <div class = "graph">

                <div class = "bgph-1">
                    <h1 id = "left">200</h1>
                    <div class="avr" id = "avr"></div>
                </div>
    
                <div class="bgph-2">
                    <h1 id = "cen">400</h1>
                    <div class= "most-score" id = "most"></div>
                </div>
    
                <div class="bgph-3">
                    <h1 id="right">150</h1>
                    <div class="your_score" id = "your"></div>
                </div>
            </div>

            <div class="advide">
                <div class="one">
                    <div class="green"></div>
                    <h1>ค่าเฉลี่ย</h1>
                </div>

                <div class="two">
                    <div class="red"></div>
                    <h1>มากที่สุด</h1>
                 </div>

                <div class="three">
                    <div class="blue"></div>
                    <h1>เเต้มของคุณ</h1>
                </div>
            </div>
            
        </div>

    </div>
</body>
</html>


<script>

    var score = "<?php echo $score;?>";
    var text = document.getElementById("shw-rsl");
    var btn = document.getElementById("btn-1");

    
    btn.addEventListener("click", function () {
        var cal = score*0.14
        text.innerHTML = cal.toFixed(2) + "  บาท";

    });
    
    var eye = document.getElementById("eye");
    var pass = document.getElementById("pass");
    var see  = false;

    var pass_word = "<?php echo $password; ?>"
    eye.addEventListener("click", function () {
        if (see == true) {
            eye.className = "bx bxs-hide";
            pass.innerHTML = "รหัสผ่าน : ••••••••••••";
            
            see = false;
        }else if(see == false) {
            pass.innerHTML = "รหัสผ่าน : "+ pass_word ;
            eye.className = "bx bxs-show";
            see = true;
        }

    });

    var red =  document.getElementById("most");
    var green =  document.getElementById("avr");
    var blue = document.getElementById("your");

    var left =  document.getElementById("left");
    var cen =  document.getElementById("cen");
    var right = document.getElementById("right");

    var cl_red = "<?php echo $mes_most?>";
    var cl_green = "<?php echo $mes_avr;?>";
    var cl_blue= "<?php echo $mes_scr;?>";
    
    red.style = cl_red;
    green.style  = cl_green;
    blue.style = cl_blue;

   
    left.innerHTML = "<?php echo $avr; ?>";
    cen.innerHTML = "<?php echo $most; ?>";
    right.innerHTML = "<?php echo $scr; ?>";


</script>