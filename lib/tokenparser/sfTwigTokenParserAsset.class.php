<?php

class sfTwigTokenParserAsset extends Twig_TokenParser
{
  public function parse(Twig_Token $token)
  {
    $lineno = $token->getLine();
    $token = $this->parser->getStream()->expect(Twig_Token::NAME_TYPE);
    $helper = $token->getValue();
    $this->parser->getStream()->expect(Twig_Token::OPERATOR_TYPE, '(');

    list(, $values) = $this->parser->getExpressionParser()->parseMultitargetExpression();

    $this->parser->getStream()->expect(Twig_Token::OPERATOR_TYPE, ')');
    $this->parser->getStream()->expect(Twig_Token::BLOCK_END_TYPE);

    return new sfTwigNodeAsset($helper, $values, $lineno, $this->getTag());
  }

  public function getTag()
  {
    return 'sf';
  }
}

