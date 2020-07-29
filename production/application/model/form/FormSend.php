<?php

namespace Application\Model\Form;

require_once __DIR__ . '../../../core/PhpMailer.php';

use PhpMailer;

class FormSend extends PhpMailer
{
    public function __construct()
    {
        require __DIR__ . '../../../configuration/email.php';

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

    public function  build()
    {
        return $this->sendForm();
    }

    private function sendForm()
    {
        require __DIR__ . '../../../configuration/email.php';

        $data = filter_input(INPUT_POST, 'data', FILTER_DEFAULT);
        $json = json_decode($data);
        $this->addReplyTo($json[1]);
        // $t = filter_input(INPUT_POST, 't', FILTER_DEFAULT);

        $this->Subject = $emailTitle;
        $this->AddAddress($emailReceiver);
        $this->Body = $this->buildHTML($json);
        $this->SendEmail();

        return 'ok';
    }

    private function buildHTML($json)
    {
        ob_start();
        $name = $json[0];
        $email = $json[1];
        $message = $json[2];
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
