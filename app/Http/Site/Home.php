<?php namespace App\Http\Site;

use App\Http\BaseController;
use TitaPHP\Foundation\Application;

class Home extends BaseController
{

    public function getString( \TitaPHP\Foundation\Logger $log )
    {
		die(get_class($log));
		$logger = $this->app->get('Logger');
		$logger->log("login censas 1111", \TitaPHP\Foundation\Logger::ERROR);
		$logger->log("login censas 2222", \TitaPHP\Foundation\Logger::ERROR);
		return "egwewg";
    }

	public function getJson()
    {
        return ['a' => 'aef', 'b' => 'rger', 'c' => 'erherh'];
	}

    public function getXML()
    {
        $response = $this->app->get('Response');
		$response->headers->set("content-type", "text/xml");
		$response->setContent("<cenas></cenas>");
		return $response;
    }

	public function sendEmail()
	{
		$this->container->get('Mail.send', ['nunochaves@sapo.pt', 'teste', 'teste']);

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