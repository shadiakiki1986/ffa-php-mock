<?php

namespace FfaPhp\Common;

use \shadiakiki1986\ArrayUtils\Converters;

class Ffa017Report extends Report {

  function __construct(array $cbs3, \DateTime $dd, string $base, array $ledgers) {
  }

  public function toHtmlExtended() {
    return("Ffa017 html extended");
  }

  public function toConsole() {
    return("FFA017 console output");
  }

  public function attachment() {
    return [];
  }

  public function subject() {
    return "FFA017 aggregated by currencies";
  }

  public function toHtml() {
    return "Attached xlsx of FFA017 report";
  }
}
