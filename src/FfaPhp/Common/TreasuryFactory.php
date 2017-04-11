<?php

namespace FfaPhp\Common;
use \MfBfDriver\Bankflow\Treasury;

class TreasuryFactory {

  function __construct(Treasury $bf=null) {
  }

  public function soa(int $limit, int $year, string $format) {
    return new TreasurySoaReport([], $year, "base");
  }

  public function cmt(\DateTime $d1,\DateTime $d2,string $format) {
    return new TreasuryCmtReport();
  }
}
