<?php

namespace FluentDOM\Symfony\CssSelector {

  use FluentDOM\Xpath\Transformer as TransformerInterface;
  use Symfony\Component\CssSelector\CssSelector as CssSelector;

  class Transformer implements TransformerInterface {

    public function toXPath($selector, $isDocumentContext = FALSE, $isHtml = FALSE) {
      if ($isHtml) {
        CssSelector::enableHtmlExtension();
      } else {
        CssSelector::disableHtmlExtension();
      }
      $result = CssSelector::toXpath($selector);
      if ($isDocumentContext) {
        return './'.$result;
      } else {
        return '/'.$result;
      }
    }
  }
}