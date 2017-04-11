<?php

namespace FfaPhp\Common;

class TreasurySoaReport extends Report {

  // soa - either array of data, or string of filename (case of format=email)
  function __construct($soa, int $year, string $base) {
  }

  public function toConsole() {
    return("Treasury SOA".PHP_EOL);
  }

  public function attachment() {
    return [];
  }

  public function subject() {
    return "SOA";
  }

  public function toHtml() {
    return "Attached";
  }
}
