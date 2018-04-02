<?php

namespace FluentDOM\Symfony\CssSelector {

  use PHPUnit\Framework\TestCase;

  require_once __DIR__.'/../vendor/autoload.php';

  class TransformerTest extends TestCase {

    /**
     * @covers \FluentDOM\Symfony\CssSelector\Transformer
     * @dataProvider provideCSSSelectors
     *
     * @param string $expectedXpath
     * @param string $selector
     * @param int $contextMode
     * @param bool $isHtml
     */
    public function testToXpath($expectedXpath, $selector, $contextMode, $isHtml) {
      $transformer = new Transformer();
      $this->assertEquals(
        $expectedXpath,
        $transformer->toXpath($selector, $contextMode, $isHtml)
      );
    }

    public static function provideCSSSelectors() {
      return [
        ['./descendant-or-self::p', 'p', Transformer::CONTEXT_CHILDREN, FALSE],
        ['//descendant-or-self::p', 'p', Transformer::CONTEXT_DOCUMENT, FALSE],
        ['self::p', 'p', Transformer::CONTEXT_SELF, FALSE],
        ['./descendant-or-self::P', 'P', Transformer::CONTEXT_CHILDREN, FALSE],
        ['//descendant-or-self::P', 'P', Transformer::CONTEXT_DOCUMENT, FALSE],
        ['self::P', 'P', Transformer::CONTEXT_SELF, FALSE],
        ['./descendant-or-self::p', 'P', Transformer::CONTEXT_CHILDREN, TRUE],
        ['//descendant-or-self::p', 'P', Transformer::CONTEXT_DOCUMENT, TRUE],
        ['self::p', 'P', Transformer::CONTEXT_SELF, TRUE]
      ];
    }
  }
}