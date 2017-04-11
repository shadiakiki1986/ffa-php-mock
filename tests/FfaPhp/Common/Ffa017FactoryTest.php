<?php

namespace FfaPhp\Common;

class Ffa017FactoryUnitTest extends \PHPUnit_Framework_TestCase {

  public function testSoa() {
    $factory=new Ffa017Factory();
    $dd = \DateTime::createFromFormat('!Y-m-d','2015-01-02');
    $report = $factory->generate($dd,[]);
    $this->assertNotNull($report);
  }

}

