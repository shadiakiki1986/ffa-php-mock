<?php

require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/../src/argsProcessor.php';
require_once __DIR__.'/../src/contactTracker.php';
use MfBfDriver\Common\BankflowClient;
use \shadiakiki1986\ArrayUtils\Converters;

if(!array_key_exists("d1",$_GET)) $_GET['d1']=date("Y-m-d",strtotime('first day of last month')); # default
if(!array_key_exists("d2",$_GET)) $_GET['d2']=date("Y-m-d",strtotime('last day of last month')); # default
if(!array_key_exists("format",$_GET)) $_GET['format']="html";
if(!array_key_exists("notifyTracker",$_GET)) $_GET['notifyTracker']=false; else $_GET['notifyTracker']=($_GET['notifyTracker']=="true"); # default


$d1=$_GET['d1'];
$d2=$_GET['d2'];
$d1 = \DateTime::createFromFormat('!Y-m-d',$d1);
$d2 = \DateTime::createFromFormat('!Y-m-d',$d2);

$bfDb=new BankflowClient($base,$location);
$bfWr=new \MfBfDriver\Bankflow\Treasury($bfDb);
$factory = new \FfaPhp\Common\TreasuryFactory($bfWr);
$report = $factory->cmt($d1,$d2,$_GET['format']);

// output
switch($_GET['format']) {
  case "console":
    $report->toConsole();
    break;
	case "html":
		$report->toHtmlExtended();
		break;
	case "email":
    $emailTo = ["s.akiki@ffaprivatebank.com", "S.Kmeid@ffaprivatebank.com","t.kaddoura@ffaprivatebank.com"];
    $emailer = new \FfaPhp\Common\Emailer($report, $emailTo);
    $emailer->send();
		break;
	default:
		die("Unsupported format $format");
}

if($_GET['notifyTracker']) {
	contactTracker("cmtReport.php");
}

