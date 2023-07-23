<?php
    session_start();
    // Include the db_config.php file
    include '../config.php';    
   

        if(!isset($_SESSION['username']))
        {
            header("location:../login.php");
        }

        elseif($_SESSION['usertype']=='student')
        {
            header("location:../login.php");
        }
        
        if($_GET['teacher_id'])
        {
            $t_id=$_GET['teacher_id'];
            $sql="SELECT * FROM teacher WHERE id='$t_id' ";
            $result=mysqli_query($data,$sql);
            $info=$result->fetch_assoc();
        }
        if(isset($_POST['update_teacher']))
        {
            $id=$_POST['id'];
            $t_name=$_POST['name'];
            $t_des=$_POST['description'];
            $file=$_FILES['image']['name'];
            $dst="../image/".$file;

            $dst_db="../image/".$file;

            move_uploaded_file($_FILES['image']['tmp_name'],$dst);

            if($file)
                {
                $sql2="UPDATE teacher SET name='$t_name', description='$t_des' , image='$dst_db' WHERE id='$id' ";
                }

            else
            {
                $sql2="UPDATE teacher SET name='$t_name', description='$t_des' WHERE id='$id' ";
            }

            $result2=mysqli_query($data,$sql2);

            if($result2)
            {
                echo "Update Success";
                header('location:admin_view_teacher.php');
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
                var x=document.forms["teacherForm"]["name"].value;
                if (x==null || x=="")
                    {
                        alert("Teacher's Name must be filled out");
                        return false;
                    }
                var x=document.forms["teacherForm"]["description"].value;
                if (x==null || x=="")
                    {
                        alert("description must be filled out");
                        return false;
                    }
            }
            </script>
    </head>
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
            <li class="breadcrumb-item fs-3">
                <a class="link-body-emphasis" href="admin_view_teacher.php">
                View Teacher
                </a>
            </li>
            <li class="breadcrumb-item active fs-3" aria-current="page">
            Update Teacher
            </li>
            </ol>
        </nav>
    </div>
        <div class="container my-5 ">
        <div class="ct1 shadow-lg py-5 px-5">
            <div class="py-3 text-center">
                <h1><b>Update Teacher Data</b></h1>
            </div>
            <div class=" mt-5 mb-5 px-5">
                <form name="teacherForm" action="admin_update_teacher.php" method="POST"  class="needs-validation" novalidate="" onsubmit="return validateForm()" enctype="multipart/form-data">
                    <div class="row g-3">
                        <input type="text" name="id" value="<?php echo "{$info['id']}" ?>" hidden>
                        <div class="col-sm-6">
                            <label for="name" class="form-label fs-3">Teacher's Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="<?php echo "{$info['name']}" ?>" required="">
                            <div class="invalid-feedback">
                                Valid  Name is required.
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="floatingTextarea2" class="form-label fs-3">Description</label>
                            <textarea class="form-control" placeholder="Description" name="description" id="floatingTextarea2" style="height: 100px"><?php echo "{$info['description']}" ?> </textarea>                           
                        </div>
                        <div class="col-sm-6" >
                            <label for="formFile" class="form-label fs-3">Teacher's Old Image</label>
                            <img width="100px" height="100px" src="<?php echo "{$info['image']}" ?>">

                        </div>
                        <div class="col-sm-6" >
                            <label for="formFile" class="form-label fs-3">Teacher's New Image</label>
                            <input class="form-control" name="image" type="file" id="formFile">
                            <div class="invalid-feedback">
                                Valid Image file required.
                            </div>
                        </div>
                        <div class="mt-5 ms-3">
                            <input type="Submit" name="update_teacher" value="Update Teacher" class="btn btn-primary">
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