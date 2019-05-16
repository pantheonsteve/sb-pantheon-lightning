<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Debug\Exception;

/**
 * Fatal Throwable Error.
 *
 * @author Nicolas Grekas <p@tchwork.com>
 */
class FatalThrowableError extends FatalErrorException
{
<<<<<<< HEAD
    private $originalClassName;

    public function __construct(\Throwable $e)
    {
        $this->originalClassName = \get_class($e);

        if ($e instanceof \ParseError) {
            $severity = E_PARSE;
        } elseif ($e instanceof \TypeError) {
            $severity = E_RECOVERABLE_ERROR;
        } else {
=======
    public function __construct(\Throwable $e)
    {
        if ($e instanceof \ParseError) {
            $message = 'Parse error: '.$e->getMessage();
            $severity = E_PARSE;
        } elseif ($e instanceof \TypeError) {
            $message = 'Type error: '.$e->getMessage();
            $severity = E_RECOVERABLE_ERROR;
        } else {
            $message = $e->getMessage();
>>>>>>> pantheon-drops-8/master
            $severity = E_ERROR;
        }

        \ErrorException::__construct(
<<<<<<< HEAD
            $e->getMessage(),
=======
            $message,
>>>>>>> pantheon-drops-8/master
            $e->getCode(),
            $severity,
            $e->getFile(),
            $e->getLine(),
            $e->getPrevious()
        );

        $this->setTrace($e->getTrace());
    }
<<<<<<< HEAD

    public function getOriginalClassName(): string
    {
        return $this->originalClassName;
    }
=======
>>>>>>> pantheon-drops-8/master
}
