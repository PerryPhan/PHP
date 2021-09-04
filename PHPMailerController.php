<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

define('GMAIL_USERNAME','xakich13@gmail.com');
define('GMAIL_PASSWORD','xakich1981');

define('GMAIL_SENT','customer1@gmail.com');
define('GMAIL_SENT_NAME','Minh Duc');
define('USERNAME','Minh_duc');
define('GOOGLE_SHEET_LINK','https://docs.google.com/spreadsheets/d/14dAxQdh56LnewlZinn9qTgEjybeTk72kEo601SjNj_4/edit#gid=0');

define('GMAIL_RECEIVED','daiphan308@gmail.com');
define('GMAIL_RECEIVED_NAME','Phan Dai');


class Mailer extends PHPMailer{

    function __constructor( $accept_exceptions ){
        parrent::__constructor($accept_exceptions);
    }
    
    private function config(){
        $this->SMTPDebug = 0 ;                                      //  SMTP::DEBUG_SERVER if want to echo mutiple of lines | 0 for none
        $this->isSMTP();
        $this->Host       = 'smtp.gmail.com';                     
        $this->SMTPAuth   = true;                                   // Enable SMTP authentication
        $this->Username   = GMAIL_USERNAME;                     
        $this->Password   = GMAIL_PASSWORD;                              
        $this->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable implicit TLS encryption
        $this->Port       = 587;                                    
        $this->CharSet    = "UTF-8"; 
        $this->Encoding   = "base64";
    }
    
    private function prepareMailHeader(){
        $this->setFrom( GMAIL_SENT, GMAIL_SENT_NAME);            // Whose mail will sent, and his /her name 
        $this->addAddress( GMAIL_RECEIVED, GMAIL_RECEIVED_NAME);     // Whose mail will be received, and his/her name
    }

    // Require
    private function prepareMailContent(){
        $this->isHTML(true);                                  
        $this->Subject = $this->getSubject();
        $this->Body    = $this->getBody();
    }

    public function sendMail(){
        try {
            $this->config();
            $this->prepareMailHeader();
            $this->prepareMailContent();
            $this->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$this->ErrorInfo}";
        }
    }

    public function getSubject(){
        return '[Google Sheet] Thông báo được gửi từ trang FBREIPLEX';
    }

    public function getBody(){
        return "Khách hàng ".USERNAME." vừa mới nhập yêu cầu, mời bạn xem ngay ở đây : ".
        "<a href=".GOOGLE_SHEET_LINK.">Xem ở đây</a>";
    }
}

$mail = new Mailer(false);
$mail->sendMail();