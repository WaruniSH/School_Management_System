<?php
    // Include the db_config.php file
    include '../config.php';    
    session_start();

        if(!isset($_SESSION['username']))
        {
            header("location:../login.php");
        }

        elseif($_SESSION['usertype']=='student')
        {
            header("location:../login.php");
        }
        
         if(isset($_POST['add_course']))
        {
            $c_name=$_POST['courseName'];
            $c_duration=$_POST['courseDuration'];
            $c_description=$_POST['courseDescription'];
            $c_status=$_POST['courseStatus'];
            $file=$_FILES['courseImage']['name'];

            $dst="./courseImage/".$file;

            $dst_db="courseImage/".$file;

           move_uploaded_file($_FILES['courseImage']['tmp_name'],$dst);

            $sql="INSERT INTO course (courseName,courseDuration,courseDescription,courseStatus,courseImage) VALUES('$c_name','$c_duration','$c_description','$c_status','$dst_db')";

            $result=mysqli_query($data,$sql);

            if($result)
            {
                header('location:admin_view_course.php');
            }
          
        }
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <?php

        include 'admin_css.php';

    ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">    
    <style type="text/css">

        .ct1 {
            margin-left: 28%;
            margin-top: 8%;
            border-color: gray;
            border-width: 4px;
            width: 70%
        }

    </style>
    <script>
            function validateForm()
            {
                var x=document.forms["courseForm"]["courseName"].value;
                if (x==null || x=="")
                    {
                        alert("Course's Name must be filled out");
                        return false;
                    }

                 var x=document.forms["courseForm"]["courseDuration"].value;
                if (x==null || x=="")
                    {
                        alert("Course Duration must be filled out");
                        return false;
                    }

                 var x=document.forms["courseForm"]["courseDescription"].value;
                if (x==null || x=="")
                    {
                        alert("Course Description must be filled out");
                        return false;
                    }

                var x=document.forms["courseForm"]["courseStatus"].value;
                if (x==null || x=="")
                    {
                        alert("Course Status  must be filled out");
                        return false;
                    }

                var x=document.forms["courseForm"]["courseImage"].value;
                if (x==null || x=="")
                    {
                        alert("image must be selected");
                        return false;
                    }

                
            }
            </script>



</head>
<body>
       
    <?php

        include 'admin_sidebar.php';

    ?>
    <div class="my-5 me-5"  style="margin-left: 18%">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-chevron p-3 bg-body-primary rounded-3" style="background-color: #d1dae3;" >
        <li class="breadcrumb-item fs-3">
            <a class="link-body-emphasis" href="adminhome.php">
            <i class="bi bi-speedometer2 " height="200" width="200">   </i> Dashboard 
            </a>
        </li>
        <li class="breadcrumb-item active fs-3" aria-current="page">
           Add Course
        </li>
        </ol>
    </nav>
    </div>
            
        <div class="container my-5 ">
        <div class="ct1 shadow-lg py-5 px-5">
            <div class="py-3 text-center">
                <h1><b>Add Course</b></h1>
            </div>
            <div class=" mt-5 mb-5 px-5">
                <form name="courseForm" action="#" method="POST" class="needs-validation" novalidate="" onsubmit="return validateForm()" enctype="multipart/form-data">
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label for="courseName" class="form-label fs-3">Course Name</label>
                            <input type="text" class="form-control" id="courseName" name="courseName" placeholder="Course Name" value="" required="">
                            <div class="invalid-feedback">
                                Valid Course Name is required.
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <label for="courseDuration" class="form-label fs-3">Course Duration</label>
                            <input type="text" class="form-control" id="courseDuration" name="courseDuration" placeholder="Course Duration" value="" required="">
                            <div class="invalid-feedback">
                                Valid Course Duration required.
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <label for="floatingTextarea2" class="form-label fs-3">Course Description</label>
                            <textarea class="form-control" placeholder="Leave a comment here" name="courseDescription" id="floatingTextarea2" style="height: 100px"></textarea>                           
                        <div class="invalid-feedback">
                                Valid Course Description required.
                            </div>
                        </div>
                        
                        <div class="col-sm-6">
                            <label for="courseStatus" class="form-label fs-3">Course Status</label>
                            <input type="text" class="form-control" id="courseStatus" name="courseStatus" placeholder="Course Status" value="" required="">
                            <div class="invalid-feedback">
                                Valid Course Status required.
                            </div>
                        </div>
                        <div class="col-sm-6" >
                            <label for="formFile" class="form-label fs-3">Course Image</label>
                            <input class="form-control" name="courseImage" type="file" id="formFile">
                            <div class="invalid-feedback">
                                Valid Image file required.
                            </div>
                        </div>
                        <div class="mt-5 ms-3">
                            <input type="Submit" name="add_course" value="Add Course" class="btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
        integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS"
        crossorigin="anonymous"></script>

</body>
</html>