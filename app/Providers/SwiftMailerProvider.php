<?php namespace App\Providers;

use \TitaPHP\Foundation\Application;
use League\Event\AbstractListener;
use League\Event\AbstractEvent;
use League\Event\EventInterface;

class SwiftMailerProvider extends AbstractListener
{
    public function handle(EventInterface $event)
    {
		$app = Application::getInstance();
        $config = $app->getConfig('mail.'. $app->getConfig('app.mode'));

        //set a mail transport - singleton
        $app->container->singleton("Mail.Transport", function () use ($config) {
            $transport = \Swift_SmtpTransport::newInstance($config['server'], $config['port']);
            $transport->setUsername($config['username']);
            $transport->setPasssword($config['password']);

            //return the transport
            return $transport;
        });


        // setup a message, not singleton
        $app->container->set(
            "Mail.Message",
            function(
                $to, $subject, $body, $attachments = array(), $replyTo = "", $from = "", $fromName = ""
            ) use ($config) {

                $from = !empty($from) ? $from : $config['from'];
                $fromName = !empty($fromName) ? $fromName : $config['fromName'];
                $replyTo = !empty($replyTo) ? $replyTo : $config['replyTo'];

                // Create the message
                $message = \Swift_Message::newInstance();
                $message->setTo($to);
                $message->setSubject($subject);
                $message->setBody($body);
                $message->setFrom($from, $fromName);
                $message->addReplyTo($replyTo);

                // return the Message Object
                return $message;
            }
        );

        // setup a mailer - no singleton
        $app->container->set('Mailer', function() use(&$app) {
            $transport = $app->container->get('Mail.Transport');
            $mailer = \Swift_Mailer::newInstance($transport);

            return $mailer;
        });

        // tell container every time a \Providers\MailerInterface is needed, he should return
        // class \Providers\Mailer (example only, Mailer class should go outside this file)
        $app->container->alias('Providers\\MailerInterface', '\\Providers\\SwiftMailer');

    }
}

//example only
interface MailerInterface
{
    public function send(array $params);
}

class SwiftMailer implements MailerInterface
{
    protected $app;

    public function __construct()
    {
        $this->app = \Classes\App::getInstance();
    }

    public function send(array $params)
    {
        $messageObject = $this->app->container->get('Mail.Message', $params);
        $mailer = $this->app->container->get('Mailer');

        return $mailer->send($messageObject);
    }
}
