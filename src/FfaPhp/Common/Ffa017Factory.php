<?php

namespace FfaPhp\Common;
use MfBfDriver\Common\MarketflowClient;
use MfBfDriver\Common\BankflowClient;
use \shadiakiki1986\ArrayUtils\Converters;

class Ffa017Factory {

  function __construct(\FfaPhp\Cash\Cash $cash = null) {
  }


  // acs: array("FFA017")
  public function generate(\DateTime $dd, array $acs) {
    return new Ffa017Report([], $dd, "base", []);
  }
}
