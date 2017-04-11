<?php

namespace FfaPhp\Common;

class Ffa017ReportTest extends \PHPUnit_Framework_TestCase {

  public function test() {
    $dd=new \DateTime();
    $report=new Ffa017Report([], $dd, "base", []);
    $this->assertNotNull($report->toHtmlExtended());
    $this->assertNotNull($report->toConsole());
    $this->assertNotNull($report->attachment());
    $this->assertNotNull($report->subject());
    $this->assertNotNull($report->toHtml());
  }

}
