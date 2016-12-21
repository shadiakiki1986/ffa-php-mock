<?php

namespace FfaPhp\Common;

use \MfBfDriver\Common\OdbcManager;

class DebitInterestsUnitTest extends \PHPUnit_Framework_TestCase {

  public function testToHtml() {
    $di=new DebitInterests("All","2015-01","phpunit",[]);
    $html = $di->toHtml();
    $this->assertTrue(!!$html);

    $this->assertNotNull($di->interest);

    $di->publish();
    $this->assertTrue(!!$di->published());
  }

}

