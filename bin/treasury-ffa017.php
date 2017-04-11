<?php

require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/../src/argsProcessor.php';
require_once __DIR__.'/../src/contactTracker.php';

if(array_key_exists("help",$_GET)) {
  echo("Usage: php ".basename(__FILE__)." help\n");
  echo("       php ".basename(__FILE__)." format=console\n");
  echo("       php ".basename(__FILE__)." format=quiet\n");
  echo("       php ".basename(__FILE__)." emailTo='s.akiki@ffaprivatebank.com;shadiakiki1986@gmail.com'\n");
  exit;
}

$dd=date("Y-m-d"); # default
# $dd=date("Y-m-d",strtotime('last day of last month'));
$location="Beirut";
$base="Dubai";

$format="console";
if(array_key_exists("format",$_GET)) $format=$_GET["format"];

$emailTo="s.akiki@ffaprivatebank.com";
if(array_key_exists("emailTo",$_GET)) {
  $emailTo=$_GET["emailTo"];
  $format="email";
}

$emailTo = explode(';',$emailTo);

// get cash
$dd = \DateTime::createFromFormat('Y-m-d',$dd);
$options=array('dd'=>$dd,'location'=>$location,'base'=>$base);
$cash = new \FfaPhp\Cash\Cash($options);

$factory = new \FfaPhp\Common\Ffa017Factory($cash);
$report = $factory->generate($dd,['FFA017']);

// output
switch($format) {
  case "html":
    $report->toHtmlExtended();
    break;
  case "console":
    $report->toConsole();
    break;
  case "email":
    $emailer = new \FfaPhp\Common\Emailer($report, $emailTo);
    $emailer->send();
    break;
  case "quiet":
    break;
  default:
    throw new Exception(sprintf("Invalid format: %s",$format));
}

