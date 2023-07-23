<?php
    // Include the db_config.php file
    include 'config.php';    

    
         $sql="SELECT * FROM course";

         $result=mysqli_query($data,$sql);


    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- <title>Student Management System</title>-->
    <link rel="stylesheet" type="text/css" href="./css/style.css">

    <!-- Latest compiled and minified CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>

    <body>
        <?php
        include 'header.php';
    ?>

    <div class="container mb-4">
            <center>
                    <h1 class="adm ">Admission Form </h1>
            </center>

                <div align="center" class="admission_form">

                    <form action="data_check.php" method="POST">
                        <div class="adm_int">
                            <label class="label_text">Name </label>
                            <input class="input_deg" type="text" name="name">
                        </div>

                        <div class="adm_int">
                            <label class="label_text">Email </label>
                            <input class="input_deg" type="text" name="email">
                        </div>

                        <div class="adm_int">
                            <label class="label_text">Phone </label>
                            <input class="input_deg" type="text" name="phone">
                        </div>
                         <div class="adm_int">
                            <label for="myselect" class="label_tex2">Course Name</label>
                            <select id = "myselect" class="input_deg2" name="myselect">
                                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                    <option value="<?php echo $row['courseName']; ?>" ><?php echo $row['courseName']; ?></option>
                                <?php } ?>
                            </select> 
                        </div>

                        <div class="adm_int">
                            <label class="label_text">Message </label>
                            <textarea class="input_txt" name="message"></textarea>
                        </div>
                        <div class="adm_int">
                            <input  class="btn btn-primary mb-5" id="submit" type="submit" value="apply" name="apply">
                        </div>
                    </form>
                </div>
    </div>
       
    <?php
        include 'footer.php';
    ?>
    </body>
</html>