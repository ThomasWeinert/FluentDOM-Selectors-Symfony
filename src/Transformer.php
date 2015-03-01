<?php

namespace FluentDOM\Symfony\CssSelector {

  use FluentDOM\Xpath\Transformer as TransformerInterface;
  use Symfony\Component\CssSelector\CssSelector as CssSelector;

  class Transformer implements TransformerInterface {

    public function toXPath($selector, $contextMode = self::CONTEXT_CHILDREN, $isHtml = FALSE) {
      if ($isHtml) {
        CssSelector::enableHtmlExtension();
      } else {
        CssSelector::disableHtmlExtension();
      }
      $result = CssSelector::toXpath($selector);
      switch ($contextMode) {
      case self::CONTEXT_DOCUMENT :
        return '//'.$result;
      case self::CONTEXT_SELF :
        return $result;
      case self::CONTEXT_CHILDREN :
      default :
        return './/'.$result;
      }
    }
  }
}