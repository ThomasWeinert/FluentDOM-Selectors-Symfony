<?php

namespace FluentDOM\Symfony\CssSelector {

  use FluentDOM\Xpath\Transformer as TransformerInterface;
  use Symfony\Component\CssSelector\CssSelector as CssSelector;

  class Transformer implements \FluentDOM\Xpath\Transformer {

    public function toXpath($selector, $contextMode = self::CONTEXT_CHILDREN, $isHtml = FALSE) {
      if ($isHtml) {
        CssSelector::enableHtmlExtension();
      } else {
        CssSelector::disableHtmlExtension();
      }
      $result = CssSelector::toXpath($selector);
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