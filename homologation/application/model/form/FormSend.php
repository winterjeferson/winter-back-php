<?php

namespace Application\Model\Form;

require_once __DIR__ . '../../../core/PhpMailer.php';

use PhpMailer;

class FormSend extends PhpMailer
{
    public function __construct()
    {
        $this->Port = 587;
        $this->Host = 'smtp.site.com';
        $this->From = 'email@site.com';
        $this->FromName = "Site";
        $this->Username = 'email@site.com';
        $this->Password = '*********';
        $this->CharSet = 'UTF-8';
        $this->SMTPSecure = 'tls';
        $this->SMTPAuth = true;
        $this->IsSMTP();
        $this->IsHTML(true);
    }

    public function  build()
    {
        return $this->sendForm();
    }

    private function sendForm()
    {
        $data = filter_input(INPUT_POST, 'data', FILTER_DEFAULT);
        $json = json_decode($data);
        $this->addReplyTo($json[0]);
        // $t = filter_input(INPUT_POST, 't', FILTER_DEFAULT);

        $this->Subject = 'SITE';
        $this->AddAddress('receiver@site.com');
        $this->Body = $this->buildHTML($json);
        $this->SendEmail();

        return 'ok';
    }

    private function buildHTML($json)
    {
        ob_start();
        $name = $json[0];
        $message = $json[1];
        $template = require_once __DIR__ . '/../../view/email/default/form.php';
        $content = ob_get_clean();

        return $content;
    }

    private function SendEmail()
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