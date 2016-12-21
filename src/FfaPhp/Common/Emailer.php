<?php

namespace FfaPhp\Common;

class Emailer {

  function __construct(Report $report, array $to) {
    $this->report = $report;
    $this->to = $to;
  }

  public function send() {
    echo(
      "Sent email with "
      .count($this->report->attachment())
      ." attached file(s) to: ".PHP_EOL
      .implode(", ",$this->to).PHP_EOL
      ." with subject: ".PHP_EOL
      .$this->report->subject().PHP_EOL
      ." and body: ".PHP_EOL
      .str_splice($this->report->toHtml(),0,20)."...".PHP_EOL
      .str_splice($this->report->published(),0,20)."...".PHP_EOL
    );
  }

}

