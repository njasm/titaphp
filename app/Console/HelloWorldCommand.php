<?php namespace App\Console;

use \TitaPHP\Console\Command;

use \Symfony\Component\Console\Input\InputArgument;
use \Symfony\Component\Console\Input\InputOption;

class HelloWorldCommand extends Command
{
    public function setUp()
    {
        $this->setName('HelloWorld')
            ->setDescription('Example Command')
            ->addArgument('name', InputArgument::REQUIRED, 'Who do you want to greet?')
            ->addOption('yell', null, InputOption::VALUE_NONE, 'If set, the task will yell in uppercase letters');
    }

    public function fire()
    {
        $message = "Hello " . $this->input->getArgument('name');
        $yell = $this->input->getOption('yell');

        if ($yell) {
            $message = strtoupper($message);
        }

        $this->output->writeln('<fg=yellow>' . $message . '</fg=yellow>');
    }
}