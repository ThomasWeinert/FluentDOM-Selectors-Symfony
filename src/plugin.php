<?php

namespace FluentDOM\Symfony\CssSelector {

  \FluentDOM::registerXpathTransformer(
    function() {
      return new Transformer();
    }
  );
}