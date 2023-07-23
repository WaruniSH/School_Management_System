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

        $host="localhost";

        $user="root";
    
        $password="";
    
        $db="schoolproject";

         //create connection
         $data=mysqli_connect($host,$user,$password,$db);
    
         $sql="SELECT * FROM teacher";

         $result=mysqli_query($data,$sql);

         if($_GET['teacher_id'])
            {
                $t_id=$_GET['teacher_id'];

                $sql2="DELETE FROM teacher WHERE id='$t_id'  ";

                $result2=mysqli_query($data,$sql2);

                if($result2)
                {
                    $_SESSION['message']='Successfully Deleted';
                    header("location:admin_view_teacher.php");
                }
            }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/fontawesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css"/>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.5/css/perfect-scrollbar.css">
    <link rel="stylesheet" href="../css/page_body2.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">    
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
            View Teacher
        </li>
        </ol>
    </nav>
    </div>
            <div class="mycontainer">
                 <h1 class="mt-5">View All Teacher Data</h1>
                <br><br>
            <div class="limiter">
                <div class="container-table100">
                    <div class="wrap-table100">
                        <div class="table100 ver1 m-b-110">
                            <div class="table100-head">
                                <table>
                                    <thead>
                                    <tr class="row100 head">
                                        <th class="cell100 column2" style="padding-left:20px;">Teacher Name</th>
                                        <th class="cell100 column4">About Teacher</th>
                                        <th class="cell100 column3">Image</th>
                                        <th class="cell100 column2">Delete</th>
                                        <th class="cell100 column2">Update</th>
                                    </tr>                                  
                                </thead>
                            </table>
                        </div>
                        <div class="table100-body js-pscroll ps ps--active-y">
                            <table>
                                <tbody>
                            <?php
                                while($info=$result-> fetch_assoc())
                                {
                            ?>
                                    <tr class="row100 body">
                                        <td class="cell100 column2"  style="padding-left:20px;"><?php    echo "{$info['name']}";  ?></td>
                                        <td class="cell100 column4"><?php    echo "{$info['description']}";  ?></td>
                                        <td class="cell100 column3"><img height="100px" width="100px" src="<?php    echo "{$info['image']}";  ?>"></td>
                                        <td class="cell100 column2"><?php    echo "<a onClick=\"javascript:return confirm('Are You Sure to Delete this'); \" class='btn btn-danger' href='admin_view_teacher.php?teacher_id={$info['id']}'> Delete </a>";  ?></td>
                                        <td class="cell100 column2"><?php    echo "<a class='btn btn-primary' href='admin_update_teacher.php?teacher_id={$info['id']}'> Update </a>";  ?></td>
                                    </tr>
                                        <?php
                                            }
                                        ?>
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      
<script src="https://code.jquery.com/jquery-3.7.0.min.js"
	integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
	integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
	crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
	integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS"
	crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.5/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function () {
			var ps = new PerfectScrollbar(this);

			$(window).on('resize', function () {
				ps.update();
			})
		});


	</script>

	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag() { dataLayer.push(arguments); }
		gtag('js', new Date());

		gtag('config', 'UA-23581568-13');
	</script>

	<script defer
		src="https://static.cloudflareinsights.com/beacon.min.js/v2cb3a2ab87c5498db5ce7e6608cf55231689030342039"
		integrity="sha512-DI3rPuZDcpH/mSGyN22erN5QFnhl760f50/te7FTIYxodEF8jJnSFnfnmG/c+osmIQemvUrnBtxnMpNdzvx1/g=="
		data-cf-beacon='{"rayId":"7e6af38ecbb4a084","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2023.4.0","si":100}'
		crossorigin="anonymous"></script> 
</body>
</html>