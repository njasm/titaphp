<?php namespace Controller\Site;

class Home extends \Controller\BaseController
{

    public function getString()
    {
		$this->Logger->log("login censas", \Classes\Logger::ERROR);
		return "teste";
    }

	public function getJson()
    {
        return ['a' => 'aef', 'b' => 'rger', 'c' => 'erherh'];
	}

    public function getXML()
    {
        $response = $this->app->Response;
		$response->headers->set("content-type", "text/xml");
		$response->setContent("<cenas></cenas>");
		return $response;
    }

	public function sendEmail(\Providers\MailerInterface $mailer)
	{
		$mailer->send(['nunochaves@sapo.pt', 'teste', 'teste']);

		return "";
	}


	private function examples()
	{
		// log
		$this->Logger->log("loggins censas", \Classes\Logger::ERROR);

		// filesystem list dirs
		$contents = $this->FileSystem->listContents();
		echo '<pre>'; print_r($contents);

		// db query
		$users = $this->Database->table('users')->get();
		foreach ($users as $user) {
			echo "user: ".$user['email']."<br/>";
		}

		// send mail
		$this->container->get('Mail.send', ['nunochaves@sapo.pt', 'teste', 'teste']);

		// render a view
		return $this->View->render('500', ['title' => 'Error', 'message' => 'mensagem de erro']);

		// redirect
//		$this->redirect('getJson');

		echo \Classes\I18n::integer(13466.46).'<br/>';
		echo \Classes\I18n::decimal(13466.46).'<br/>';
		echo \Classes\I18n::currency(13466.46, 2).'<br/>';
		echo \Classes\I18n::datetime('2015-01-12 15:05:05', 'LONG', 'SHORT').'<br/>';
	}

}