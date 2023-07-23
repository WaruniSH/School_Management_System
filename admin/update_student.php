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


    
        $id=$_GET['student_id'];

        $sql="SELECT * FROM user WHERE id='$id' ";

        $result=mysqli_query($data,$sql);

        $info=$result->fetch_assoc();

        if(isset($_POST['update']))
        {
            $name=$_POST['name'];
            $email=$_POST['email'];
            $phone=$_POST['phone'];
            $password=$_POST['password'];
            $oldName =$_POST['oldName'];

            $query1="UPDATE user SET username='$name',email='$email',phone='$phone',password='$password' WHERE id='$id' ";
            $query2="UPDATE enrolled_course SET username='$name' WHERE username='$oldName'";

            $result1=mysqli_query($data,$query1);
            $result2=mysqli_query($data,$query2);
            
            if($result2&&$result1)
            {
                $_SESSION['message']='Successfully Updated';
                header("location:view_student.php");
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
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">    <style type="text/css">
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
                var x=document.forms["studentForm"]["username"].value;
                if (x==null || x=="")
                    {
                        alert("username must be filled out");
                        return false;
                    }

                var x=document.forms["studentForm"]["email"].value;
                
                var atpos=x.indexOf("@");
                var dotpos=x.lastIndexOf(".");

                if (x==null || x=="")
                    {
                        alert("email must be filled out");
                        return false;
                    }else if(atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length){
                        alert("Not a valid e-mail address");
                        return false;
                    }

                var x=document.forms["studentForm"]["phone"].value;
                if (x==null || x=="")
                    {
                        alert("phone must be filled out");
                        return false;
                    }else if(isNaN(x)){
                        alert("Enter Numeric value only");
                        return false;
                    }

                var x=document.forms["studentForm"]["password"].value;
                if (x==null || x=="")
                    {
                        alert("password must be filled out");
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
        <li class="breadcrumb-item fs-3">
            <a class="link-body-emphasis" href="view_student.php">
            View Student
            </a>
        </li>
        <li class="breadcrumb-item active fs-3" aria-current="page">
           Update Students
        </li>
        </ol>
    </nav>
    </div>
    <div class="container my-5 " >
        <div class="ct1 shadow-lg py-5 px-5">
            <div class="py-3 text-center">
                <h2>Update Students</h2>
            </div>
            <div class=" mt-5 mb-5 px-5">
                <form  name="studentForm" action="#" method="POST" class="needs-validation" novalidate="" onsubmit="return validateForm()">
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="name" placeholder="Username" value="<?php echo "{$info['username']}";?>" required="">
                            <div class="invalid-feedback">
                                Valid Username name is required.
                            </div>
                        </div>
                        <input type="text" name="oldName" value="<?php echo "{$info['username']}";?>" hidden>
                        <div class="col-sm-6 mb-4">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com" value="<?php echo "{$info['email']}";?>" required="">
                            <div class="invalid-feedback">
                                Please enter a valid email address for shipping updates.
                            </div>
                        </div>
                        <div class="col-sm-6 mb-4">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="phone" class="form-control" id="phone" name="phone" placeholder="Phone" value="<?php echo "{$info['phone']}";?>" required="">
                            <div class="invalid-feedback">
                                Valid Phone Number is required.
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="password" class="form-label">Password</label>
                            <input type="text" class="form-control" id="password" name="password" placeholder="Password" value="<?php echo "{$info['password']}";?>" required="">
                            <div class="invalid-feedback">
                                Valid Password name is required.
                            </div>
                        </div>
                        <div class="mt-4 ms-3">
                            <input type="Submit" class="btn btn-primary " name="update" value="Update Student">
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