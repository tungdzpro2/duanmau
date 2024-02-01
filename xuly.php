<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
    require 'model/algorithm.php';
    require 'model/users.php';


    $mail = new PHPMailer(true);
    if(checkMailEx($_POST['mail'])) {
        if(isset($_POST['btn-repw'])) {

            $mailneedSend = $_POST['mail'];
            $idCode = CreateCodeID();
            $codeContent = randomNum(6);
    
            createCodeRsUser($idCode, $codeContent);
            updateIdCodeUser($idCode,$mailneedSend);
            try {
                //Server settings
                $mail->CharSet = 'utf-8';
                // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output // bật tính nắng debug
                $mail->isSMTP();                                            //Send using SMTP //gửi mail qua SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through //Chọn host gửi mail
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication 
                $mail->Username   = 'phuongddph40819@fpt.edu.vn';                     //SMTP username
                $mail->Password   = 'dorzncnrzpsmgemx';                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
                //Recipients
                $mail->setFrom('phuongddph40819@fpt.edu.vn', 'phuongdz');
                $mail->addAddress("$mailneedSend", 'user');     //Add a recipient
                // $mail->addAddress('ellen@example.com');               //Name is optional
                // $mail->addReplyTo('duongducphuong68@gmail.com', 'Information');
                // $mail->addCC('cc@example.com');
                // $mail->addBCC('bcc@example.com');
    
    
               
                // $mail->addAttachment($file['tmp_name'], $file['name']);    //Optional name
                
                //Attachments
                // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                
                
        
                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = "reset password";
                $mail->Body    = "<h3>CODE</h3>
                                 
                                 <p>code reset password:$codeContent</p>
                                ";
                // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        
                $mail->send();
                echo 'Message has been sent';
                header("location: index.php?action=handlereset&mail=$mailneedSend");
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }
    }else {
        echo "khong tim thay email nay!";
    }
?>
