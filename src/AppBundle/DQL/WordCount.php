<?php
namespace AppBundle\DQL;
use Doctrine\ORM\Query\AST\Functions\FunctionNode;
use Doctrine\ORM\Query\Lexer;

/**
 * @author Metod <metod@simpel.si>
 * @see https://github.com/beberlei/DoctrineExtensions/blob/master/src/Query/Mysql/CharLength.php
 */
class WordCount extends FunctionNode
{
    private $expr1;
    public function getSql(\Doctrine\ORM\Query\SqlWalker $sqlWalker)
    {
        return '(LENGTH('. $sqlWalker->walkArithmeticPrimary($this->expr1) .')-LENGTH(REPLACE('. $sqlWalker->walkArithmeticPrimary($this->expr1) .', " ", "")))+1';
    }

    public function parse(\Doctrine\ORM\Query\Parser $parser)
    {
        $parser->match(Lexer::T_IDENTIFIER);
        $parser->match(Lexer::T_OPEN_PARENTHESIS);
        $this->expr1 = $parser->ArithmeticExpression();
        $parser->match(Lexer::T_CLOSE_PARENTHESIS);
    }
}
