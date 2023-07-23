<?php

    // Include the db_config.php file
    include '../config.php';    
    session_start();
    error_reporting(0);
        if(!isset($_SESSION['username']))
        {
            header("location:../login.php");
        }

        elseif($_SESSION['usertype']=='student')
        {
            header("location:../login.php");
        }
    
        $sql="SELECT * from teacher";
        $result=mysqli_query($data,$sql);


        $sql1="SELECT * from course";
        $result1=mysqli_query($data,$sql1);

        $sql="SELECT COUNT('id') AS totad FROM admission;";

        $result=mysqli_query($data,$sql);
        $row=$result->fetch_assoc();

        $sql1 = "SELECT COUNT('c.courseID') AS coursetot FROM course c;";
        $result1=mysqli_query($data,$sql1);
        $row1=$result1->fetch_assoc();

        $sql2 = "SELECT COUNT('t.id') AS teatot FROM teacher t;";
        $result2=mysqli_query($data,$sql2);
        $row2=$result2->fetch_assoc();
        
        $sql3 = "SELECT COUNT('id') AS stcount FROM user WHERE usertype='student';";
        $result3=mysqli_query($data,$sql3);
        $row3=$result3->fetch_assoc();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
<!-- Bootstrap CSS CDN -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="../css/dashboard.css">
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
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
                                <i class="bi bi-speedometer2 " height="200" width="200">   </i> Admin Dashboard 
                                </a>
                            </li>
                        </ol>
                    </nav>
                </div>  
                <div class="ct1">
                    <div class="row">
                        <div class="col-md-3 col-xl-3">
                            <div class="card bg-c-blue order-card">
                                <div class="card-block">
                                    <h3 class="m-b-20 pb-2">Total Admissions</h3>
                                    <h2 class="text-right"><i class="fas fa-users f-left"></i><span ><?php echo $row['totad']; ?></span></h2>                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-xl-3">
                            <div class="card bg-c-green order-card">
                                <div class="card-block">
                                    <h3 class="m-b-20 pb-2">Available Courses</h3>
                                    <h2 class="text-right"><i class="bi bi-book f-left"></i><span><?php echo $row1['coursetot']; ?></span></h2>      
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-xl-3">
                            <div class="card bg-c-yellow order-card">
                                <div class="card-block">
                                    <h3 class="m-b-20 pb-2">Teachers</h3>
                                    <h2 class="text-right"><i class="bi bi-people-fill f-left"></i><span><?php echo $row2['teatot']; ?></span></h2>      
                                </div>
                            </div>
                        </div>                   
                        <div class="col-md-3 col-xl-3">
                            <div class="card bg-c-pink order-card">
                                <div class="card-block">
                                    <h3 class="m-b-20 pb-2">Registered Students</h3>
                                    <h2 class="text-right"><i class="bi bi-person-check-fill f-left"></i><span><?php echo $row3['stcount']; ?></span></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
</body>
</html>