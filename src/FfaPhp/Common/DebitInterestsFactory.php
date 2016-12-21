<?php

namespace FfaPhp\Common;

class DebitInterestsFactory {

  function __construct(string $accountType, string $date_month, \MfBfDriver\Marketflow\DebitInterests $mfwr=null, \MfBfDriver\Bankflow\DebitInterests $bfwr=null) {

  }

  public function shortcut() {
    return new DebitInterests('account type','2015-12','Lebanon',[]);
  }
}
