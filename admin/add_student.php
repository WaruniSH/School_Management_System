<?php
    require '../vendor/autoload.php';
    use Mailgun\Mailgun;
    // Include the db_config.php file
    include '../config.php';    
    session_start();

    $key = API_KEY;
    $sandbox = SANDBOX;
	$admin_mail = ADMIN_MAIL;

        if(!isset($_SESSION['username']))
        {
            header("location:../login.php");
        }

        elseif($_SESSION['usertype']=='student')
        {
            header("location:../login.php");
        }

            $sql="SELECT * FROM course";

         $result=mysqli_query($data,$sql);
        if(isset($_POST['add_student']))
        {
            $username=$_POST['name'];
            $user_email=$_POST['email'];
            $user_phone=$_POST['phone'];
            $user_password=$_POST['password'];
            $user_courseID=$_POST['course'];
            $usertype="student";
            $message = "Please Check the below user Login credentials\nUsername : ".$username."\nPassword : ".$user_password;

            $check="SELECT * FROM user WHERE username='$username'";

            $check_user=mysqli_query($data,$check);

            $row_count=mysqli_num_rows($check_user);

            if($row_count==1)
            {
                 echo " <script type= 'text/javascript'> 
                    alert('Username Already Exists. Try Another One');
                    </script>";
                
            }
            else
            {
                $sql= "INSERT INTO user(username,email,phone,usertype,password) VALUES('$username', '$user_email', '$user_phone', '$usertype', '$user_password')";
                $sql1 = "INSERT INTO enrolled_course(courseID,username,payment) VALUES('$user_courseID','$username','Unpaid')";
                $result=mysqli_query($data,$sql);
                $result2=mysqli_query($data,$sql1);
                 if($result&&$result2)
                 {
                    //Send the Username and Passwords to the Registered User
                    $mg = Mailgun::create($key);

                    $mg->messages()->send($sandbox, [
                    'from'    => 'W-SchoolAdmin@gmail.com',//can use any kind of mail here cause its send using sandbox to verified email
                    'to'      => $user_email,
                    'subject' => 'Welcome to the W-School - Registration Successfull',
                    'text'    => $message
                    ]);

                    echo " <script type= 'text/javascript'> 
                        alert('User Added Successfully Sent the Login Credentials');
                    </script>";
                    header('location:view_student.php');
                
                }
                 else
                 {
                     echo "Upload Failed";
                }

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
        <li class="breadcrumb-item active fs-3" aria-current="page">
            Add Student
        </li>
        </ol>
    </nav>
    </div>
    <div class="container my-5 " >
        <div class="ct1 shadow-lg py-5 px-5">
            <div class="py-3 text-center">
                <h2>Add Students</h2>
            </div>
            <div class=" mt-5 mb-5 px-5">
                <form  name="studentForm" action="#" method="POST" class="needs-validation" novalidate="" onsubmit="return validateForm()">
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="name" placeholder="Username" value="" required="">
                            <div class="invalid-feedback">
                                Valid Username name is required.
                            </div>
                        </div>
                        <div class="col-sm-6 mb-4">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com" required="">
                            <div class="invalid-feedback">
                                Please enter a valid email address for shipping updates.
                            </div>
                        </div>
                        <div class="col-sm-6 mb-4">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="phone" class="form-control" id="phone" name="phone" placeholder="Phone" value="" required="">
                            <div class="invalid-feedback">
                                Valid Phone Number is required.
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="password" class="form-label">Password</label>
                            <input type="text" class="form-control" id="password" name="password" placeholder="Password" value="" required="">
                            <div class="invalid-feedback">
                                Valid Password name is required.
                            </div>
                        </div>
                        <div class="col-sm-6 mb-4">
                            <label for="myselect" class="form-label">Course Name</label>
                            <select class="form-select fs-4" id="myselect" name="course" required="">
                                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                    <option value="<?php echo $row['courseID']; ?>" required=""><?php echo $row['courseName']; ?></option>

                                <?php } ?>
                            </select>
                            <div class="invalid-feedback">
                                Please provide a valid course.
                            </div>
                        </div>
                        <div class="mt-4 ms-3">
                            <input type="Submit" class="btn btn-primary " name="add_student" value="Add Student">
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