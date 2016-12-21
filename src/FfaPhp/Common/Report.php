<?php

namespace FfaPhp\Common;

abstract class Report {
  abstract public function subject();
  abstract public function toHtml();
  abstract public function attachment();

  private $html2;
  public function published() {
    // singleton
    if(!isset($this->html2)) return "";
    return $this->html2;
  }
  public function publish() {
    $this->html2 = "<p>Published at Reports Archive</p>";
  }

  function __construct(array $wpTags, array $wpCategories) {

  }

}
