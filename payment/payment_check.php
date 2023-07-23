<?php
    // Include the db_config.php file
    include '../config.php';    
    session_start();
    require '../vendor/autoload.php';
    use Mailgun\Mailgun;

    $key = API_KEY;
    $sandbox = SANDBOX;
    $admin_mail = ADMIN_MAIL;

//check connection
if($data===false)
{
    die("connection error");
}

     if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $username = $_POST["username"];
            $sql1="SELECT email from user WHERE username='$username' ";
            $sql2="UPDATE enrolled_course SET payment='Paid' WHERE username='$username' ";

            $result1=mysqli_query($data,$sql1);
            $result2=mysqli_query($data,$sql2);

            if($result2)
            {
                $info=$result1-> fetch_assoc();

                $email = $info['email'];
                $subject = "Your payment received suceesfully";
		        $message = "We have received your payment $9.99 Sucessfully and the email related to ".$email;
                		
                //For the below one we need the relevant Private API key from the Mailgun account
                $mg = Mailgun::create($key); // For US servers
                
                $mg->messages()->send($sandbox, [
                'from'    => 'Payment@W-school.com',
                'to'      => $admin_mail,
                'subject' => $subject,
                'text'    => $message
                ]);
                
                echo "Paid Success";
                header('location:../student/student_view_course.php');
            }
            


        
    }
    

?>