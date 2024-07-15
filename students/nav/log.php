

<?php
    session_start();

    $user = $_SESSION["user"];
    $password = $_SESSION["password"];
    

    $connect = mysqli_connect("localhost","root","","score");
    $result = mysqli_query($connect,"SELECT * FROM students");
    
    while ($row = mysqli_fetch_array($result)) {
        if ($row["user"] ==  $user && $row["pass"] == $password) {
            $_SESSION["status"] = "out";
            $update_score = mysqli_query($connect,"UPDATE students SET status = 'out' WHERE user = $user");
            header('Location: http://localhost/login/login.php');
        }
    }

?>