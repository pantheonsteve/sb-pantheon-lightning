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
 * Undefined Method Exception.
 *
 * @author Grégoire Pineau <lyrixx@lyrixx.info>
 */
class UndefinedMethodException extends FatalErrorException
{
<<<<<<< HEAD
    public function __construct(string $message, \ErrorException $previous)
=======
    public function __construct($message, \ErrorException $previous)
>>>>>>> pantheon-drops-8/master
    {
        parent::__construct(
            $message,
            $previous->getCode(),
            $previous->getSeverity(),
            $previous->getFile(),
            $previous->getLine(),
            null,
            true,
            null,
            $previous->getPrevious()
        );
        $this->setTrace($previous->getTrace());
    }
}
