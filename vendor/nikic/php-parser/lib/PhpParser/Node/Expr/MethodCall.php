<?php

declare (strict_types=1);
namespace EasyCI20220513\PhpParser\Node\Expr;

use EasyCI20220513\PhpParser\Node\Arg;
use EasyCI20220513\PhpParser\Node\Expr;
use EasyCI20220513\PhpParser\Node\Identifier;
use EasyCI20220513\PhpParser\Node\VariadicPlaceholder;
class MethodCall extends \EasyCI20220513\PhpParser\Node\Expr\CallLike
{
    /** @var Expr Variable holding object */
    public $var;
    /** @var Identifier|Expr Method name */
    public $name;
    /** @var array<Arg|VariadicPlaceholder> Arguments */
    public $args;
    /**
     * Constructs a function call node.
     *
     * @param Expr                           $var        Variable holding object
     * @param string|Identifier|Expr         $name       Method name
     * @param array<Arg|VariadicPlaceholder> $args       Arguments
     * @param array                          $attributes Additional attributes
     */
    public function __construct(\EasyCI20220513\PhpParser\Node\Expr $var, $name, array $args = [], array $attributes = [])
    {
        $this->attributes = $attributes;
        $this->var = $var;
        $this->name = \is_string($name) ? new \EasyCI20220513\PhpParser\Node\Identifier($name) : $name;
        $this->args = $args;
    }
    public function getSubNodeNames() : array
    {
        return ['var', 'name', 'args'];
    }
    public function getType() : string
    {
        return 'Expr_MethodCall';
    }
    public function getRawArgs() : array
    {
        return $this->args;
    }
}
