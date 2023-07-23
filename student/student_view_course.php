
<?php
    // Include the db_config.php file
    include '../config.php';    
    session_start();
    //error_reporting(0);

        if(!isset($_SESSION['username']))
        {
            header("location:../login.php");
        }



            
        $name=$_SESSION['username'];   
         $sql="SELECT * FROM course INNER JOIN enrolled_course ON course.courseID=enrolled_course.courseID WHERE enrolled_course.username='$name'; ";

         $result=mysqli_query($data,$sql);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="../css/page_body2.css">
    <?php
            include 'student_css.php';
     ?>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"> 
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
            Enrolled Courses
        </li>
        </ol>
    </nav>
    </div>


        <div class="mycontainer">
                <h1 class="mt-5">Enrolled Course Data</h1>
                <br><br>
                <div class="table100 ver1 m-b-110">
                        <div class="table100-head">
                            <table>
                                <thead>
                                    <tr class="row100 head">
                                        <th class="cell100 column1"style="font-size:18px">Course Name</th>
                                        <th class="cell100 column2"style="font-size:18px">Course Duration</th>
                                        <th class="cell100 column3"style="font-size:18px">Course Description</th>
                                        <th class="cell100 column2"style="font-size:18px">Course Status</th>
                                        <th class="cell100 column2"style="font-size:18px">Course Image</th>
                                        <th class="cell100 column2"style="font-size:18px">Payment Status</th>
                                        <th class="cell100 column2"style="font-size:18px"></th>
                                    </tr>                                  
                            <?php
                                while($info=$result-> fetch_assoc())
                                {
                            ?>
                                </thead>
                            </table>
                        </div>
                        <div class="table100-body js-pscroll ps ps--active-y">
                            <table>
                                <tbody>
                                    <tr class="row100 body" >
                                        <td class="cell100 column1" style="font-size:18px"><?php    echo "{$info['courseName']}";  ?></td>
                                        <td class="cell100 column2"style="font-size:18px"><?php    echo "{$info['courseDuration']}";  ?></td>
                                        <td class="cell100 column3"style="font-size:18px"><?php    echo "{$info['courseDescription']}";  ?></td>
                                        <td class="cell100 column2"style="font-size:18px"><?php    echo "{$info['courseStatus']}";  ?></td>
                                        <td class="cell100 column2"style="font-size:18px"><img height="100px" width="100px" src="<?php    echo "{$info['courseImage']}";  ?>"></td>
                                        <td class="cell100 column2"style="font-size:18px"><?php    echo "{$info['payment']}";  ?></td>
                                        <td class="cell100 column2"style="font-size:18px"><?php      if($info["payment"] == "Unpaid") {
                                                                                    // Display the button
                                                                                    echo "<a onClick=\"javascript:return confirm('Are You Sure to process the payment'); \" href='../payment/payment.php?username={$name}' class='btn btn-danger fs-4'>Pay Now</a>";
                                                                                }?></td>
                                    </tr>
                                </tbody>
                                        <?php
                                            }
                                        ?>
                            </table>
                        </div>
                </div>      
        </div>
    
</body>
</html>