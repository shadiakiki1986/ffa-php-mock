<?php

namespace FfaPhp\Common;

class TreasuryCmtReportTest extends \PHPUnit_Framework_TestCase {

  public function test() {
    $dd = new \DateTime();
    $report=new TreasuryCmtReport([], $dd, $dd, "base");
    $this->assertNotNull($report->toConsole());
    $this->assertNotNull($report->attachment());
    $this->assertNotNull($report->subject());
    $this->assertNotNull($report->toHtml());
  }

}
