<?php
    // Include the db_config.php file
    include 'config.php';    
    //error_reporting(0);
    session_start();

        if(!isset($_SESSION['username']))
        {
            header("location:login.php?Notauser");
        }

        elseif($_SESSION['usertype']=='admin')
        {
            header("location:login.php?Notastudent");
        }

		if($_GET['username'])
        {
            $username=$_GET['username'];    
        }
        
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Payment</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">   
    <link rel="stylesheet" href = "../css/confirm-model.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">          
    <script type="text/javascript" src="./payment.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href = "../css/payment.css">

</head>
<body>

    <header class="header">
            <a href="#" class="stu">Student Dashboard</a>
            <div class="logout">
                <a href="logout.php" class="btn btn-primary stu">Logout </a>
            </div>
   </header>
        <form class="form_deg" enctype="multipart/form-data" onsubmit="event.preventDefault(); if (this.checkValidity()) { $('#myModal').modal('show'); }"">
        <div class="container-fluid px-1 px-md-2 px-lg-4 py-5 mx-auto">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-9 col-sm-11">
                <div class="card border-0">
                    <div class="row justify-content-center">
                        <h3 class="mb-4">Card Checkout</h3>
                    </div>
                    <div class="row">
                        <div class="col-sm-7 border-line pb-3">
                            <div class="form-group">
                                <p class="text-muted text-sm mb-0">Name on the card</p>
                                <input type="text" name="name" placeholder="Name" size="15" required>
                            </div>
                            <div class="form-group">
                                <p class="text-muted text-sm mb-0">Card Number</p>
                                <div class="row px-3">
                                    <input type="text" name="card-num" placeholder="0000 0000 0000 0000" size="16" id="cr_no" minlength="19" maxlength="19" required>
                                    <p class="mb-0 ml-3">/</p>
                                    <img class="image"  src="../image/visa.jpg">
                                </div>
                            </div>
                            <div class="form-group">
                                <p class="text-muted text-sm mb-0">Expiry date</p>
                                <input type="text" name="exp" placeholder="MM/YY" size="6" id="exp" minlength="5" maxlength="5" required>
                            </div>
                            <div class="form-group">
                                <p class="text-muted text-sm mb-0">CVV/CVC</p>
                                <input type="password" name="cvv" placeholder="000" size="1" minlength="3" maxlength="3" required>
                            </div>
                            <div class="form-group mb-0">
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input id="chk1" type="checkbox" name="chk" class="custom-control-input" checked> 
                                    <label for="chk1" class="custom-control-label text-muted text-sm">save my card for future payment</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-5 text-sm-center justify-content-center pt-4 pb-4">
                            <small class="text-sm text-muted">Student Name</small>
                            <h5 class="mb-5" ><?php echo"$username"?></h5>
                            <small class="text-sm text-muted"></small>
                            <div class="row px-3 justify-content-sm-center">
                                <h2 class=""><span class="text-md font-weight-bold mr-2">$</span><span class="text-danger">9.99</span></h2>
                            </div>
                            <button type="submit" class="btn btn-red text-center mt-4"  >PAY</button> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    </div>

            <!-- Modal HTML -->
            <form class="form_deg" action="payment_check.php" method="POST" enctype="multipart/form-data">
            <div id="myModal" class="modal fade">
                <div class="modal-dialog modal-confirm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="icon-box">
                                <i class="material-icons">&#xE876;</i>
                            </div>				
                            <h4 class="modal-title w-100">Awesome!</h4>	
                        </div>
                        <div class="modal-body">
                            <p class="text-center">Your payment has been confirmed.</p>
                        </div>
                        <div class="modal-footer">
                            <input type="text" class="form-control" id="floatingInput"  name="username" value="<?php echo"$username"?>"placeholder="name@example.com" hidden>
                            <input  class="btn btn-success btn-block" id="submit" type="submit" value="OK" name="pay">
                        </div> 
                    </div>
                </div>
            </div> 
            </form>
    <script type='text/javascript' src="./payment.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
</script>

   <?php
        include 'footer2.php';
    ?>

</body>
</html>