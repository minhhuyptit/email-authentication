<?php 
include PATH_LIBS . "PHPMailer/PHPMailer.php";
include PATH_LIBS . "PHPMailer/Exception.php";
include PATH_LIBS . "PHPMailer/OAuth.php";
include PATH_LIBS . "PHPMailer/POP3.php";
include PATH_LIBS . "PHPMailer/SMTP.php";
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Mail {
    public static function sendMail($email, $name, $link){
        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {
            //Server settings
            $mail->SMTPDebug =  0;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'akai24h@gmail.com';                 // SMTP username
            $mail->Password = 'Akaishuichi123456';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('zendvn2training@gmail.com', 'Email Confirm');
        
            $mail->addAddress($email, $name);     // Add a recipient

            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Confirm Login';
            $mail->Body    = 'Link login: <a href="'. $link.'">click me!!</a>';

            $mail->send();
           
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
    }
}