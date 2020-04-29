<?php

class WbForm extends PhpMailer
{
    public function __construct()
    {
        $this->Port = 587;
        $this->Host = 'smtp.site.com';
        $this->From = 'email@site.com';
        $this->Username = 'email@site.com';
        $this->Password = '******';
        $this->CharSet = 'UTF-8';
        $this->SMTPSecure = 'tls';
        $this->SMTPAuth = true;
        $this->IsSMTP();
        $this->IsHTML(true);
    }

    function sendForm()
    {
        $data = filter_input(INPUT_POST, 'd', FILTER_DEFAULT);
        $json = json_decode($data);
        // $t = filter_input(INPUT_POST, 't', FILTER_DEFAULT);

        $this->Subject = 'SITE: - ';
        $this->AddAddress('email@site.com');
        $this->Body = $this->buildHTML($json, $data);
        $this->SendEmail();

        return 'ok';
    }

    public function buildHTML($json, $data)
    {
        $string = '';
        $length = count($json);

        for ($i = 0; $i < $length; $i++) {

            $string .= '<p>';
            $string .= '    <b>' . $json[$i][0] . '</b> : ' . $json[$i][1];
            $string .= '</p>';
        }

        return $string;
    }

    public function SendEmail()
    {
        if ($this->Send()) {
            $this->SmtpClose();
            return true;
        } else {
            $this->SmtpClose();
            return false;
        }
    }
}
