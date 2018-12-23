<?php namespace Console;
use Symfony\Component\Console\Command\Command as SymfonyCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Console\DrupalProject;

class Command extends SymfonyCommand
{
    
    public function __construct()
    {
        parent::__construct();
    }
    protected function createProject(InputInterface $input, OutputInterface $output)
    {
        // outputs multiple lines to the console (adding "\n" at the end of each line)
        $output -> writeln([
          '**** Create Drupal or Wordpress project with docker by georgetour****',
          '============================================================',
          '',
        ]);

        //Input arguments
        $project = $input -> getArgument('project');
        $projectName = $input -> getArgument('projectName');
        $port = $input -> getArgument('port');

        //Check input arguments and create accordingly the project
        if ($project == 'drupal-project') {

          if (!empty($projectName) && ctype_digit(strval($port))) {
            $drupal = new DrupalProject($projectName, $port);
          } else {
            $output -> writeln("Probably wrong project name or port is not a number");
          }
        }else {
          $output -> writeln("First argument must be drupal-project or wordpress-project. Currently wordpress commands are under construction");
        }
    }
}