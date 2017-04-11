<?php

namespace FfaPhp\Common;

class TreasuryCmtReport extends Report {

  function __construct(array $cr, \DateTime $d1,\DateTime $d2, string $base) {
  }

  public function toConsole() {
    return("Treasury SMT");
  }

  public function attachment() {
    return [];
  }

  public function subject() {
    return "CMT";
  }

  public function toHtml() {
    return "<h2>CMT</h2>Attached";
  }

  public function toHtmlExtended() {
    return "CMT html extended";
  }
}
