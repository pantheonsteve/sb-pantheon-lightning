<?php

/*
 * This file is part of Twig.
 *
 * (c) Fabien Potencier
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Twig\Node;

use Twig\Compiler;

/**
 * Represents a nested "with" scope.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class WithNode extends Node
{
    public function __construct(Node $body, Node $variables = null, $only = false, $lineno, $tag = null)
    {
        $nodes = ['body' => $body];
        if (null !== $variables) {
            $nodes['variables'] = $variables;
        }

        parent::__construct($nodes, ['only' => (bool) $only], $lineno, $tag);
    }

    public function compile(Compiler $compiler)
    {
        $compiler->addDebugInfo($this);

        if ($this->hasNode('variables')) {
<<<<<<< HEAD
            $node = $this->getNode('variables');
            $varsName = $compiler->getVarName();
            $compiler
                ->write(sprintf('$%s = ', $varsName))
                ->subcompile($node)
                ->raw(";\n")
                ->write(sprintf("if (!twig_test_iterable(\$%s)) {\n", $varsName))
                ->indent()
                ->write("throw new RuntimeError('Variables passed to the \"with\" tag must be a hash.', ")
                ->repr($node->getTemplateLine())
                ->raw(", \$this->getSourceContext());\n")
                ->outdent()
                ->write("}\n")
                ->write(sprintf("\$%s = twig_to_array(\$%s);\n", $varsName, $varsName))
=======
            $varsName = $compiler->getVarName();
            $compiler
                ->write(sprintf('$%s = ', $varsName))
                ->subcompile($this->getNode('variables'))
                ->raw(";\n")
                ->write(sprintf("if (\$%s instanceof \\Traversable) {\n", $varsName))
                ->indent()
                ->write(sprintf("\$%s = iterator_to_array(\$%s);\n", $varsName, $varsName))
                ->outdent()
                ->write("}\n")
                ->write(sprintf("if (!is_array(\$%s)) {\n", $varsName))
                ->indent()
                ->write("throw new RuntimeError('Variables passed to the \"with\" tag must be a hash.');\n")
                ->outdent()
                ->write("}\n")
>>>>>>> pantheon-drops-8/master
            ;

            if ($this->getAttribute('only')) {
                $compiler->write("\$context = ['_parent' => \$context];\n");
            } else {
                $compiler->write("\$context['_parent'] = \$context;\n");
            }

<<<<<<< HEAD
            $compiler->write(sprintf("\$context = \$this->env->mergeGlobals(array_merge(\$context, \$%s));\n", $varsName));
=======
            $compiler->write(sprintf("\$context = array_merge(\$context, \$%s);\n", $varsName));
>>>>>>> pantheon-drops-8/master
        } else {
            $compiler->write("\$context['_parent'] = \$context;\n");
        }

        $compiler
            ->subcompile($this->getNode('body'))
            ->write("\$context = \$context['_parent'];\n")
        ;
    }
}

class_alias('Twig\Node\WithNode', 'Twig_Node_With');
