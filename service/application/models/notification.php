<?php

class notification extends CI_Model
{
    public function send_mail($data)
    {
        $to = $data['emails'];
        $sub = $data['subject'];
        $msg = $data['message'];
        /*important lines for html mails*/
        $header = "MIME-Version:1.0"."\r\n";
        $header = $header."Content-type:text/html;charset=utf-8"."\r\n";
        /*important lines for html mails*/
        $header = $header."From:"."babyvaccine.com"." <"."babyvaccine.com@info.com".">"."\r\n";
        $header = $header.'Cc: '."babyvaccine.com".'' . "\r\n";
        $header = $header.'Bcc: '."babyvaccine.com".'' . "\r\n";
        mail($to,$sub,$msg,$header);
    }
}

?>