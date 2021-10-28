<?php

namespace App\Model\Form;

require_once __DIR__ . '../../../core/PhpMailer.php';

use PhpMailer;

class FormAjax extends PhpMailer
{
    public function __construct()
    {
        require_once __DIR__ . '../../../configuration/email.php';
        require_once __DIR__ . '/../../core/Token.php';

        $this->objToken = new \App\Core\Token();

        $this->Port = $emailPort;
        $this->Host = $emailHost;
        $this->From = $emailFrom;
        $this->FromName = $emailFromName;
        $this->Username = $emailUsername;
        $this->Password = $emailPassword;
        $this->CharSet = $emailCharSet;
        $this->SMTPSecure = $emailSMTPSecure;
        $this->SMTPAuth = $emailSMTPAuth;
        $this->IsSMTP();
        $this->IsHTML(true);
    }

    public function build()
    {
        $this->objToken->validate();
        return $this->sendForm();
    }

    private function sendForm()
    {
        require __DIR__ . '../../../configuration/email.php';

        $data = filter_input(INPUT_POST, 'data', FILTER_DEFAULT);
        $json = json_decode($data);
        $this->addReplyTo($json[1]);

        $this->Subject = $emailTitle;
        $this->AddAddress($emailReceiver);
        $this->Body = $this->buildHTML($json);
        $this->SendEmail();

        return 'ok';
    }

    private function buildHTML($json)
    {
        ob_start();
        $email = $json[0];
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
