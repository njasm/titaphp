<?php namespace App\ServiceProviders;

use TitaPHP\Foundation\Application;
use TitaPHP\Foundation\ServiceProviderInterface;

class SwiftMailer implements ServiceProviderInterface
{

	public function register(Application $app)
    {
        $app->set("Mail.send", function(
			$to, $subject, $body, $attachments = array(), $replyTo = "", $from = "", $fromName = ""
		) use ($app) {

            $config = $app->getConfig('mail.'. $app->getConfig('app.settings.mode'));

            $from = !empty($from) ? $from : $config['from'];
            $fromName = !empty($fromName) ? $fromName : $config['fromName'];
            $replyTo = !empty($replyTo) ? $replyTo : $config['replyTo'];

            // Create the SMTP configuration
            $transport = \Swift_SmtpTransport::newInstance($config['server'], $config['port']);
            $transport->setUsername($config['username']);
            $transport->setPassword($config['password']);

            // Create the message
            $message = \Swift_Message::newInstance();
            $message->setTo($to);
            $message->setSubject($subject);
            $message->setBody($body);
            $message->setFrom($from, $fromName);
            $message->addReplyTo($replyTo);

            // Send the email
            $mailer = \Swift_Mailer::newInstance($transport);
            $mailer->send($message);
        });
    }

}