<?php
    // Include the db_config.php file
    include 'config.php';    
    session_start();




    //check connection
    if($data===false)
    {
        die("connection error");
    }

    if(isset($_POST['apply']))
    {
        $data_name=$_POST['name'];
        $data_email=$_POST['email'];
        $data_phone=$_POST['phone'];
        $data_message=$_POST['message'];
        $data_course=$_POST['myselect'];

        $sql="INSERT INTO admission(name,email,phone,message,courseName) VALUES('$data_name','$data_email','$data_phone','$data_message','$data_course')";

        $result=mysqli_query($data,$sql);

        if($result)
        {
            $_SESSION['message']="Your application sent successfully";

            header("location:index.php");
        }
        else
        {
            echo "Apply Failed";
        }
    }



?>