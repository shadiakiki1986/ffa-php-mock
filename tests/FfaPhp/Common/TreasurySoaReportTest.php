<?php

namespace FfaPhp\Common;

class TreasurySoaReportTest extends \PHPUnit_Framework_TestCase {

  public function test() {
    $report=new TreasurySoaReport([], 1, "base");
    $this->assertNotNull($report->toConsole());
    $this->assertNotNull($report->attachment());
    $this->assertNotNull($report->subject());
    $this->assertNotNull($report->toHtml());
  }

}
