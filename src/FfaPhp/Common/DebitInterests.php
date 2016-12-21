<?php

namespace FfaPhp\Common;

class DebitInterests extends Report {

  function __construct(string $accountType, string $date_month, string $base, array $interest) {
    $this->interest = $interest;
  }

  public function toHtml() {
    return "<p>Html body of debit interests</p>";
  }

  public function subject() {
    return "Debit interests notice subject";
  }

  public function attachment() {
    return [];
  }

}

