<?php

namespace FluentDOM\Symfony\CssSelector {

  use Symfony\Component\CssSelector\CssSelectorConverter;

  class Transformer implements \FluentDOM\Xpath\Transformer {

    public function toXpath(string $selector, int $contextMode = self::CONTEXT_CHILDREN, bool $isHtml = FALSE) {
      $converter = new CssSelectorConverter($isHtml);
      $result = $converter->toXPath($selector);
      switch ($contextMode) {
      case self::CONTEXT_DOCUMENT :
        return '//'.$result;
      case self::CONTEXT_SELF :
        if (0 === strpos($result, 'descendant-or-self::')) {
          return substr($result, 14);
        }
        return $result;
      case self::CONTEXT_CHILDREN :
      default:
        return './'.$result;
      }
    }
  }
}