<?php
session_start();
include_once('../model/user.php');
include_once('../lib/Util.php');
include_once('../lib/LoggedUser.php');
if(isset($_GET['action'])){
	
	switch($_GET['action']){
		case 'logout':
            LoggedUser::LogOutUser();
            header("Location: ../");
			break;
	}
}
else if(isset($_POST['action'])){
	switch($_POST['action']){
		
		case 'login':
		
            $email = Util::FilterString($_POST['email']);
            $password = Util::FilterString($_POST['password']);
            $passhash = sha1($password);
            if(User::isUserExist($email) == true){
                if(User::passwordCheck($email,$passhash) == true){
                    $id = User::getUserId($email);
                    LoggedUser::LogInUser($id,$email);
                    header("Location: ../")       ;
                }//sifreyi yanlıs girerse kısmı eksik

            }

            echo mysql_error();
			break;
		
		case 'register':
            $username = Util::FilterString($_POST['username']);
            $password = Util::FilterString($_POST['password']);
            $password_retry = Util::FilterString($_POST['password_retry']);
            $email = Util::FilterString($_POST['email']);
            $passhash = sha1($password);
            if($password != $password_retry)
                die("Sifreler birbiri ile uyumlu olmali");
            User::register($username,$email,$passhash);
            header("Location: ../?alert=" . urlencode("Başarı ile kayıt oldunuz giriş yapabilirsiniz."));
            exit(0);
			break;
		
		case 'validate_email':
			break;

        case 'email_registration':
            $email = $_POST['email'];
//            print_r($email);
            $emailString = $email[0] . '@';
            switch($email[1]){
                case 'ug':
                case 'ie':
                case 'ctp':
                case 'bim':
                case 'bups':
                case 'bcc':
                case 'cs':
                case 'ee':
                case 'fen':
                case 'uname':
                case 'alumni':
                     $emailString .= $email[1];
                    break;
                case '-':
                    break;
                default:
                    header("Location: ../?p=email_register&msg=wrong-domain");
                    exit(0);
            }
            $emailString .= '.bilkent.edu.tr';
            $passcode = Util::GeneratePasscode();

            $sql = "INSERT INTO email_queue (email,passcode) VALUES ('$emailString','$passcode')";
            DatabaseConnector::query($sql);
            if(mysql_errno() == 1062)
                echo "this e-mail address is already registered";
            $To = "<$emailString>";
            $Subject = "Email Onayi";
            $Message = "Biltrader+ 'a hoşgeldiniz!<br /><br />
            Bu e-mail biltrader+'a üye olabilmeniz için gönderilmiştir. <br /><br />
            Aşağıdaki linke tıklayıp kayıt işleminizi tamamlayabilirsiniz.<br /><br />
            <a href=\"http://www.biltrader.net/?p=form&f=register&email=".urlencode($emailString)."&Validation=$passcode\">Onay Linki</a><br /><br />
            Teşekkürler.<br/><br/>
            www.biltrader.net";
            $Message = str_replace("\n.", "\n..", $Message);
            $headers = 	'From: Biltrader <no-reply@biltrader.net>' . "\n" .
                'Reply-To: iletisim@biltrader.net' . "\n" .
                "MIME-Version: 1.0\n".
                "Content-type: text/html; charset=utf-8\n".
                "Content-Transfer-Encoding: 8bit\n".
                'X-Mailer: PHP/' . phpversion();
            if(!mail($To,$Subject,$Message,$headers))die('Hata: Mail gonderilemedi.');
            echo error_get_last();
            echo "<br>E-mail is sent successfully"    ;
            break;
			
	}
}