<?php
    // Include the db_config.php file
    include 'config.php';    

    error_reporting(0);
    session_start();

    //check connection
    if($data===false)
    {
        die("connection error");
    }

    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $name = $_POST['username'];
        $pass = $_POST['password'];

        $sql="select * from user where username= '".$name."' AND  password='".$pass."' ";

        $result=mysqli_query($data,$sql);

        $row=mysqli_fetch_array($result);


        if($row["usertype"]=="student")
        {
            
            $_SESSION['username']=$name;

            $_SESSION['usertype']="student";

            header("location:./student/student_profile.php");
        }

        elseif($row["usertype"]=="admin")
        {
            $_SESSION['username']=$name;

            $_SESSION['usertype']="admin";

            header("location:./admin/adminhome.php");
        }

        else
        {

            $message="Username or Password do not match";

            $_SESSION['loginMessage']=$message;

            header("location:login.php");
        }
    }
    

?>