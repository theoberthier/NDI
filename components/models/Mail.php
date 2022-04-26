<?php

class Mail {
    static function getContent() {
        ob_start();
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <link rel="preconnect" href="https://fonts.gstatic.com">
            <link href="https://fonts.googleapis.com/css2?family=Potta+One&family=Yusei+Magic&display=swap" rel="stylesheet">
        </head>
        <style>
            html,body {height:100%;}
            body {
                background:#043442;
                margin:0;padding:0;
                font-family:'Yusei Magic', sans-serif;
            }
            .main-container {
                background:#004256;
                color:white;
                min-height:100%;
            }
            a:link, a:visited {text-decoration:none;}

            .bottom {
                position:absolute;
                bottom:10px;
                text-align:center;
                left:50%;
                transform:translate(-50%, 0);
            }
        </style>
        <body>
            <div class="main-container" style="max-width:600px;margin-left:auto;margin-right:auto;">
                <div class="title" style="width:100%;text-align:center;"><?= APP_NAME ?></div>
                <div class="main">
                    %body%

                    <a href="%link%"><div class="btn" style="margin-top:50px;">%button%</div></a><br/>
                    <div class="bottom">Copyright © <?= date('Y') ?> - <?= APP_NAME ?></div>
                </div>
            </div>
        </body>
        </html>
        <?php
        $content = ob_get_clean();
        return $content;
    }

    static function send($expeditor, $receiver, $subject, $message, $link, $bcontent = "Commencer", $attachments = []) {
        $mail = new PHPMailer\PHPMailer\PHPMailer();

        $html = self::getContent();
        $html = str_replace("%body%", $message, $html);
        if(!$link) {
            $html = str_replace('<a href="%link%"><div class="btn" style="margin-top:50px;">%button%</div></a>', "", $html);
        }
        else {
            $html = str_replace("%link%", $link, $html);
            $html = str_replace("%button%", $bcontent, $html);
        }
        
        try {
            $email = "no-reply@snsm.com";
            //Server settings
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'snsm.emailing@gmail.com';                     // SMTP username
            $mail->Password   = '%tcbUMvm9(+\'Dm=y';                               // SMTP password
            $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
            $mail->CharSet = 'UTF-8';
            $mail->Encoding = '7bit';
            //Recipients
            $mail->setFrom($email, APP_NAME);
            $mail->addAddress($receiver);     // Add a recipient
            //$mail->addAddress('ellen@example.com');               // Name is optional
            if($receiver) $mail->addReplyTo($email);
            //$mail->addBCC('');

            // Attachments
            if(count($attachments) > 0) {
                foreach($attachments as $key => $attachment) {
                    $mail->addStringAttachment($attachment, $key, 'base64', 'application/pdf');
                }
            }
            //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    
            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $subject . " - " . APP_NAME;
            $mail->Body    = $html;
            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}