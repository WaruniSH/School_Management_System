<?php
    // Include the db_config.php file
    include '../config.php';    
    session_start();

    
    if($_GET['username'])
    {
        $username=$_GET['username'];
        
        $sql="DELETE 
            FROM enrolled_course
            WHERE username = '$username'";
        $sql1="DELETE 
            FROM user
            WHERE username = '$username'; ";

        $result=mysqli_query($data,$sql);
        $result1=mysqli_query($data,$sql1);

        if($result&&$result1)
        {
            $_SESSION['message']='Successfully Deleted';
            header("location:view_student.php");
        }
    }

?>