<?php

namespace FfaPhp\Common;

class TreasuryFactoryUnitTest extends \PHPUnit_Framework_TestCase {

  public function testSoa() {
    $factory=new TreasuryFactory();
    $report = $factory->soa(1,2,"format");
    $this->assertNotNull($report);
  }

}

