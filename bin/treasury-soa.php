<?php

require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/../src/argsProcessor.php';
require_once __DIR__.'/../src/contactTracker.php';

###################

if(array_key_exists("help",$_GET)) {
  echo("Usage: php ".basename(__FILE__)." base=Lebanon year=2015 format=console limit=10\n");
  echo("       php ".basename(__FILE__)." base=Lebanon year=2015 emailTo='s.akiki@ffaprivatebank.com'\n");
  exit;
}

$year=(int)date('Y',strtotime('last year'));
$base="Dubai";
$format="console";
$emailTo="";
$limit=false;

if(array_key_exists("base",$_GET)) $base=$_GET["base"];
if(array_key_exists("year",$_GET)) $year=$_GET["year"];
if(array_key_exists("format",$_GET)) $format=$_GET["format"];
if(array_key_exists("emailTo",$_GET)) { $emailTo=$_GET["emailTo"]; $format="email"; }
if(array_key_exists("limit",$_GET)) $limit=$_GET["limit"];

########## Checks

if(!in_array($format,array("console","email"))) throw new Exception("Invalid format: $format");
if($format=="email" && !$emailTo) throw new Exception("Please specify emailTo with format=email");
if($year > (int) date("Y")) throw new Exception(sprintf("Year requested (%s) is > current year (%s)",$year,date("Y")));
if($year < 1999) throw new Exception("No transactions available before year 1999");
if($limit) {
  if(!is_numeric($limit)) throw new Exception("Only numeric limit accepted");
  if($limit>=100 || $limit<=0) throw new Exception("limit should be in (0,100) range if set");
}
if($format=="console" && !$limit) throw new Exception("For console output, limit is required");
if($format!="console" && $base=="Lebanon") throw new Exception("For non-console output, base=lebanon is not supported due to large size of data");

$emailTo = explode(';',$emailTo);
################
$bfDb=new \MfBfDriver\Common\BankflowClient($base);
$bfWr=new \MfBfDriver\Bankflow\Treasury($bfDb);
$factory = new \FfaPhp\Common\TreasuryFactory($bfWr);
$report = $factory->soa($limit,$year,$format);

###############
switch($format) {
  case "console":
    $report->toConsole();
    break;
  case "email":
    $emailer = new \FfaPhp\Common\Emailer($report, $emailTo);
    $emailer->send();
    break;
  default:
    throw new Exception("Invalid format");
}

