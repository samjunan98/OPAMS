<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

include("config.php");
if (isset($_POST['agentEmail']) & !empty($_POST['agentEmail'])) {
    $agentEmail = mysqli_real_escape_string($db, $_POST['agentEmail']);
    $sql = "SELECT * FROM agent WHERE agentEmail = '$agentEmail'";
    $res = mysqli_query($db, $sql);
    $count = mysqli_num_rows($res);
    if ($count == 1) {
        $password = rand(999, 99999);
        $password_hash = md5($password);
        $r = mysqli_fetch_assoc($res);
        $mail = new PHPMailer;
        $mail->isSMTP();                      // Set mailer to use SMTP 
        $mail->Host = 'smtp.gmail.com';       // Specify main and backup SMTP servers 
        $mail->SMTPAuth = true;               // Enable SMTP authentication 
        $mail->Username = 'sampetshop2022@gmail.com';   // SMTP username 
        $mail->Password = 'Sampetshop2022@';   // SMTP password 
        $mail->SMTPSecure = 'ssl';            // Enable TLS encryption, `ssl` also accepted 
        $mail->Port = 587;                    // TCP port to connect to 
        // Sender info 
        $mail->setFrom('sampetshop2022@gmail.com', 'Sam Petshop Management');
        $mail->addReplyTo('sampetshop2022@gmail.com', 'Sam Petshop Management');
        // Add a recipient 
        $mail->addAddress($r['agentEmail']);

        //$mail->addCC('cc@example.com'); 
        //$mail->addBCC('bcc@example.com'); 

        // Set email format to HTML 
        $mail->isHTML(true);
        // Mail subject 
        $mail->Subject = "Your Recovered Password";
        // Mail body content 
        $bodyContent = "<b>Your New Password:" .  $password_hash . '</b>';
        $mail->Body    = $bodyContent;

        // Send email 
        if (!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            $secure_pass = password_hash($password_hash, PASSWORD_BCRYPT);
            mysqli_query($db, "UPDATE agent SET agentPw='$secure_pass' WHERE agentEmail = '$agentEmail'")or die('Error querying database. ' .  mysqli_error($db));
            echo '<script type="text/javascript">';
            echo 'alert("Your Password has been sent to your email id");';
            echo 'window.location.href = "agent_login.php";';
            echo '</script>';
        }
    } else {
        echo '<script type="text/javascript">';
        echo 'alert("Email is not registered as user");';
        echo 'window.location.href = "agent_forgetpw.php";';
        echo '</script>';
    }
} else {
    echo "error" . mysqli_error($db);
}
?>