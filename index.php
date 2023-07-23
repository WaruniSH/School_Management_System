
<?php
    // Include the db_config.php file
    include 'config.php';    
    error_reporting(0);
    session_start();
    session_destroy();

    if($_SESSION['message'])
    {
        $message=$_SESSION['message'];

        echo "<script type='text/javascript'>
        alert('$message');
        </script>";

    }

         $sql="SELECT * from teacher";
         $result=mysqli_query($data,$sql);
         $sql1="SELECT * from course";
         $result1=mysqli_query($data,$sql1);
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Management System</title>
    <link rel="stylesheet" type="text/css" href="./css/style.css">    
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

</head>
<body>
    <?php
        include 'header.php';
    ?>

    <div class="section1">
        <label class="img_text"> We Teach Students With Care </label>
        <img class="main_img" src="./image/scool_management.png">
    </div>

    <div class="container">
       
        <div class="row">
           
            <div class="col-md-4">

                <img class="welcome_img" src="./image/school2.jpg">
            </div>

            <div class="col-md-8">

                <h1 class="custom-font"> Welcome to W-school</h1>

                <p class="fs-5"> Are you looking for a comprehensive solution to manage your academic life? Look no further than W-School! With a wide range of courses to choose ,  facilities and resources, W-School offers a learning experience that is second to none. Our student management system provides you with a user-friendly interface that allows you to easily manage your courses and payments. Whether you are a student looking to enroll in courses or a professional seeking to enhance your skills, W-School has something for everyone.We have experieced teachers to success your academic activities. Our system is designed to provide you with the support you need to achieve your goals, no matter where you are in your academic or professional journey. So why wait? Join the W-School today and experience the benefits of our student management system for yourself. With our comprehensive courses and cutting-edge facilities, you'll be well on your way to achieving your academic and professional goals.</p>

            </div>


        </div>


    </div>
    <br><br>


    <center>
        <h1 id="teachers">Our Teachers </h1>
    </center>


    <div class="container" >

        <div class="row">
            <?php

                while($info=$result->fetch_assoc())
                {
                    $timg_path = $info['image'];
                    $newtimg_path = substr($timg_path, 3);

             ?>

            <div class="col-md-4 mb-5">
               
                 <img  class="teacher" src="<?php  echo "$newtimg_path" ?>"> 

                <h3 class="my-3"> <?php  echo "{$info['name']}" ?> </h3>
                <h5> <?php  echo "{$info['description']}" ?> </h5>              
            </div>
            <?php
                }

            ?>

        </div>

    </div>
<br><br>

    <center>
        <h1 id="courses">Our Courses </h1>
    </center>


    <div class="container" >

        <div class="row">
            <?php

                while($info=$result1->fetch_assoc())
                {
                    $cimg_path = $info['courseImage'];
                    $newcimg_path = substr($cimg_path, 3); 
             ?>

            <div class="col-md-4 mb-5">
                 <img  class="course" src="<?php  echo "$newcimg_path" ?>"> 

                

                <h3 class="my-3"> <?php  echo "{$info['courseName']}" ?> </h3>
                <h5> <?php  echo "{$info['courseDescription']}" ?> </h5>
                
            </div>

            <?php
                }

            ?>

        </div>

    </div>

        <div class="container">
        
        </div>
    <?php
        include 'footer.php';
    ?>

</body>
</html>