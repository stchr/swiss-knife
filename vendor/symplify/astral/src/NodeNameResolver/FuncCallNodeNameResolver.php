<?php

declare (strict_types=1);
namespace EasyCI20220316\Symplify\Astral\NodeNameResolver;

use EasyCI20220316\PhpParser\Node;
use EasyCI20220316\PhpParser\Node\Expr;
use EasyCI20220316\PhpParser\Node\Expr\FuncCall;
use EasyCI20220316\Symplify\Astral\Contract\NodeNameResolverInterface;
final class FuncCallNodeNameResolver implements \EasyCI20220316\Symplify\Astral\Contract\NodeNameResolverInterface
{
    public function match(\EasyCI20220316\PhpParser\Node $node) : bool
    {
        return $node instanceof \EasyCI20220316\PhpParser\Node\Expr\FuncCall;
    }
    /**
     * @param FuncCall $node
     */
    public function resolve(\EasyCI20220316\PhpParser\Node $node) : ?string
    {
        if ($node->name instanceof \EasyCI20220316\PhpParser\Node\Expr) {
            return null;
        }
        return (string) $node->name;
    }
}
