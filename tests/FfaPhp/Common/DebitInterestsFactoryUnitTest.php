<?php

namespace FfaPhp\Common;

use \MfBfDriver\Common\OdbcManager;

class DebitInterestsFactoryTest extends \PHPUnit_Framework_TestCase {

  public function test() {
    $dif=new DebitInterestsFactory("All","2015-01");
    $report = $dif->shortcut();
    $this->assertInstanceOf(DebitInterests::class,$report);
  }

}
