
<?php
    //session_start();
    //error_reporting(0);

        if(!isset($_SESSION['username']))
        {
            header("location:../login.php");
        }

        $name=$_SESSION['username'];   
?>

<header class="header">

            <a href=""> Student Dashboard</a>
            <div class="username fs-3">
                
                <h1><img src="../image/user2.png" height="30px" width="30px">    <?php    echo "{$name}";  ?></h1>
            <div class="logout">
                <a href="../logout.php" class="btn btn-primary fs-3">Logout </a> 
            </div>
            </div>

        </header>




        <aside>

            <ul>


                <li>
                    <a href="student_profile.php"> My Profile </a>
                </li>

                <li>
                    <a href="student_view_course.php"> My Courses </a>
                </li>
                
            </ul>

        </aside>