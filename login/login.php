<?php
    // Connection
    session_start();
    if (isset($_POST["submit"])) {
        
        $user = $_POST["user"];
        $password = $_POST["pass"];
       
        $connect = mysqli_connect("localhost","root","","score");
        $result = mysqli_query($connect,"SELECT * FROM students");
        
        while ($row = mysqli_fetch_array($result)) {
            if ($row["user"] ==  $user && $row["pass"] == $password) {

                $_SESSION["user"] = $user;
                $_SESSION["password"] = $password;
                
                $update_score = mysqli_query($connect,"UPDATE students SET status = 'in' WHERE user = $user");
                $_SESSION["status"] = "in";
                header('Location: http://localhost/students/std_home.php');
            }else if($user == "manager_skr_cprt" && $password == "manager113cprt") {
                $_SESSION["mn_status"] = "in";
                header('Location: http://localhost/manager/home_mn.php');
                
            }
      
            
        }
       
    }


    

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Mitr:wght@200;300;400;500;600;700&family=Oswald:wght@200..700&family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Oswald:wght@200..700&family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าสู่ระบบ เเต้มสหกรณ์โรงเรียนสกลราช</title>
    <Link rel="stylesheet" href="login_css.css?v=<?php echo time(); ?>">
</head>
<body>
    <div class = "super_main">

        <div class = "main_div_1">
            <div class = "login_box">
                <div class = "login_text">เข้าสู่ระบบ</div>
            </div>
    
           <form action="login.php" method="post">
    
                <div class="box_user">
                    <input class="user" name="user" id = "user" placeholder = "รหัสนักเรียน"type="text">
                </div>
                <br><br>
                <div class="box_user">
                    <input class="pass" name="pass" id = "pass" placeholder = "รหัสบัตรประชาชน"type="password">
                    <i id = "lock"class='bx bx-lock'></i>
                </div>
    
                <div class="box_btn">
                    <button class = "btn_login" name = "submit" type = "submit"> 
                        <p class = "text_btn" >
                            LOGIN
                        </p>
                    </button>
                </div>
    
           </form>

          
    
        </div>

        <div class = "main_div_2">
            <br><br><br><br><br><br><br><br>
            <div class = "hi_text">SKR</div>
            <div class = "hi_text">SAKOLRAJ</div>
            
        </div>
    </div>

    <script>

        

        var lock_icon = document.getElementById("lock");
        var pass = document.getElementById("pass");
        pass.type = "password";

        lock_icon.addEventListener("click", function () {
            if (lock_icon.className == "bx bx-lock") {
                lock_icon.className= "bx bx-lock-open";
                pass.type = "text";
                lock.style.color = "#1b219f";
                
            }else if(lock_icon.className == "bx bx-lock-open"){
                lock_icon.className = "bx bx-lock";
                pass.type = "password";
                lock.style.color = "black";
               
            }
            
        });
       
    </script>

    
</body>
</html>