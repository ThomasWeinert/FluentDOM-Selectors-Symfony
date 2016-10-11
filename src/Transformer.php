<?php

namespace FluentDOM\Symfony\CssSelector {

  use Symfony\Component\CssSelector\CssSelectorConverter;

  class Transformer implements \FluentDOM\Xpath\Transformer {

    public function toXpath($selector, $contextMode = self::CONTEXT_CHILDREN, $isHtml = FALSE) {
      $converter = new CssSelectorConverter($isHtml);
      $result = $converter->toXPath($selector);
      switch ($contextMode) {
      case self::CONTEXT_DOCUMENT :
        $result = '//'.$result;
        break;
      case self::CONTEXT_CHILDREN :
        $result = './'.$result;
        break;
      }
      return $result;
    }
  }
}