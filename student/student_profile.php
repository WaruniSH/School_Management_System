<?php
    // Include the db_config.php file
    include '../config.php';    
    session_start();

        if(!isset($_SESSION['username']))
        {
            header("location:../login.php");
        }

        elseif($_SESSION['usertype']=='admin')
        {
            header("location:../login.php");
        }



        $name=$_SESSION['username'];

        $sql="SELECT * FROM user WHERE username='$name' ";

        $result=mysqli_query($data,$sql);

        $info=mysqli_fetch_assoc($result);


        if(isset($_POST['update_profile']))
        {
            $s_email=$_POST['email'];
            $s_phone=$_POST['phone'];
            $s_password=$_POST['password'];

            $sql2="UPDATE user SET email='$s_email', phone='$s_phone', password='$s_password' WHERE username='$name' ";
        
            $result2=mysqli_query($data,$sql2);

            if($result2)
            {
                $_SESSION['message']='Successfully Updated';
                header('location:student_profile.php');
               
            }
        }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">    

        <?php
            include 'student_css.php';
     ?>
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style type="text/css">
        .ct1 {
            margin-left: 28%;
            margin-top: 4%;
            border-color: gray;
            border-width: 4px;
            width: 70%
        }

    </style>

        <script>
            function validateForm()
            {

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
            include 'student_sidebar.php';
        ?>
    <div class="my-5 me-5"  style="margin-left: 18%">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-chevron p-3 bg-body-primary rounded-3" style="background-color: #d1dae3;" >
        <li class="breadcrumb-item fs-3">
            <a class="link-body-emphasis" href="adminhome.php">
            <i class="bi bi-speedometer2 " height="200" width="200"></i> Student
            </a>
        </li>
        <li class="breadcrumb-item active fs-3" aria-current="page">
            Update Profile
        </li>
        </ol>
    </nav>
    </div>
    <div class="container my-5 " >
        <div class="ct1 shadow-lg py-5 px-5">
            <div class="py-3 text-center">
                <h1 class="form-label fs-1">Update Profile</h1>
                <br>
                <img src="../image/user.png" width="150" height="150" style="margin-bottom:20px">
                <br>
            </div>
            <div class=" mt-5 mb-5 px-5">
                <form  name="studentForm" action="#" method="POST" class="needs-validation" novalidate="" onsubmit="return validateForm()">
                    <div class="row g-3">
                        <div class="col-sm-6 mb-4">
                            <label for="email" class="form-label fs-2">Email</label>
                            <input type="email" class="form-control fs-2" id="email" name="email" placeholder="you@example.com" value="<?php echo "{$info['email']}"  ?>" required="">
                            <div class="invalid-feedback">
                                Please enter a valid email address for shipping updates.
                            </div>
                        </div>
                        <div class="col-sm-6 mb-4">
                            <label for="phone" class="form-label fs-2  ">Phone</label>
                            <input type="phone" class="form-control fs-2" id="phone" name="phone" placeholder="Phone" value="<?php echo "{$info['phone']}"  ?>" required="">
                            <div class="invalid-feedback">
                                Valid Phone Number is required.
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="password" class="form-label fs-2">Password</label>
                            <input type="text" class="form-control fs-2" id="password" name="password" placeholder="Password" value="<?php echo "{$info['password']}"  ?>" required="">
                            <div class="invalid-feedback">
                                Valid Password name is required.
                            </div>
                        </div>
                        <div class="mt-4 ">
                            <input type="Submit" class="btn btn-primary fs-2" name="update_profile" value="Update Profile">
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