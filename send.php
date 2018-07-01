<?php

require ($_SERVER['DOCUMENT_ROOT'].'/wp-load.php');
require ($_SERVER['DOCUMENT_ROOT'].'/wp-includes/class-phpmailer.php');

$sait_name       = get_option('blogname');
$sait_url        = get_option('home');
$adminEmail      = get_option('admin_email');
$adminEmail      = 'kacevnik@yandex.ru';
$mailServerLogin = get_option('mailserver_login');
$mailServerPass  = get_option('mailserver_pass');
$mailServerPort  = get_option('mailserver_port');
$mailServerUrl   = get_option('mailserver_url');
$name_product    = '';


// ==== Принудительный захват массива переменных ==========================
// ==== раскомментировать, если письма отправляются без значений полей ====
$text          = '<h3>Новый заказ</h3>';
$name_product  = $_POST['products'];       if($name_product){
    $name_product = trim($name_product, '|');
    $name_product = str_replace('\"', "", $name_product);
    $arr_product = explode('|', $name_product);
    $text.= '<table style="width: 100%; border-collapse: collapse;">';
    $text.= '<tr><td style="border: 1px solid #ccc; padding: 5px;"><strong>Товар</strong></td><td style="border: 1px solid #ccc; padding: 5px;"><strong>Количество</strong></td><td style="border: 1px solid #ccc; padding: 5px;"><strong>Стоимость</strong></td></tr>';
    foreach($arr_product as $arr_product_item){
    $text.= '<tr>';
        $item = explode('++', $arr_product_item);
        $text.= '<td style="border: 1px solid #ccc; padding: 5px;">'. $item[0] . '</td>';
        $text.= '<td style="border: 1px solid #ccc; padding: 5px;">'. $item[1] . '</td>';
        $text.= '<td style="border: 1px solid #ccc; padding: 5px;">'. $item[2] . '</td>';
        $text.= '<tr>';
    }
    $text.= '</table><br><br>';
}

$phone         = $_POST['phone'];          if($phone){$text          = $text.'<strong>Телефон покупателя: </strong>'.$phone.'<br>';}
$name          = $_POST['name'];           if($name){$text           = $text.'<strong>Имя покупателя: </strong>'.$name.'<br>';}
$adress        = $_POST['adress'];         if($adress){$text         = $text.'<strong>Адрес доставки: </strong>'.$adress.'<br>';}
$oplata        = $_POST['oplata'];         if($oplata){$text         = $text.'<strong>Оплата: </strong>'.$oplata.'<br>';}
$comments      = $_POST['comments'];       if($comments){$text       = $text.'<strong>Комментарий к заказу: </strong><p><i>'.$comments.'</i></p><br>';}

$form          = $_POST['form'];

$text = $text.'<br><br>Сообщение с сайта <a href="' . $sait_url . '">' . $sait_name . '</a>';
$text = $text.'<br>Отвечать на это сообщение не надо.';

$mail = new PHPMailer;
$mail->CharSet = 'UTF-8';
//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = $mailServerUrl;                         // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = $mailServerLogin;                   // SMTP username
$mail->Password = $mailServerPass;                    // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = $mailServerPort;                        // TCP port to connect to

$mail->setFrom($mailServerLogin, $sait_name);
$mail->addAddress($adminEmail, $adminEmail);          // Add a recipient            

$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = $form;
$mail->Body    = $text;


if(!$mail->send()) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    //echo 'Message has been sent';
}