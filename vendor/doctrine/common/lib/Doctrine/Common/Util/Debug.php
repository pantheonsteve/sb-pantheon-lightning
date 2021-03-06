<?php
<<<<<<< HEAD
=======
/*
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 * LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the MIT license. For more information, see
 * <http://www.doctrine-project.org>.
 */

>>>>>>> pantheon-drops-8/master
namespace Doctrine\Common\Util;

use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Persistence\Proxy;

/**
 * Static class containing most used debug methods.
 *
 * @link   www.doctrine-project.org
 * @since  2.0
 * @author Guilherme Blanco <guilhermeblanco@hotmail.com>
 * @author Jonathan Wage <jonwage@gmail.com>
 * @author Roman Borschel <roman@code-factory.org>
 * @author Giorgio Sironi <piccoloprincipeazzurro@gmail.com>
<<<<<<< HEAD
 *
 * @deprecated The Debug class is deprecated, please use symfony/var-dumper instead.
=======
>>>>>>> pantheon-drops-8/master
 */
final class Debug
{
    /**
     * Private constructor (prevents instantiation).
     */
    private function __construct()
    {
    }

    /**
     * Prints a dump of the public, protected and private properties of $var.
     *
<<<<<<< HEAD
     * @link https://xdebug.org/
=======
     * @link http://xdebug.org/
>>>>>>> pantheon-drops-8/master
     *
     * @param mixed   $var       The variable to dump.
     * @param integer $maxDepth  The maximum nesting level for object properties.
     * @param boolean $stripTags Whether output should strip HTML tags.
     * @param boolean $echo      Send the dumped value to the output buffer
     *
     * @return string
     */
    public static function dump($var, $maxDepth = 2, $stripTags = true, $echo = true)
    {
        $html = ini_get('html_errors');

        if ($html !== true) {
            ini_set('html_errors', true);
        }

        if (extension_loaded('xdebug')) {
            ini_set('xdebug.var_display_max_depth', $maxDepth);
        }

<<<<<<< HEAD
        $var = self::export($var, $maxDepth);
=======
        $var = self::export($var, $maxDepth++);
>>>>>>> pantheon-drops-8/master

        ob_start();
        var_dump($var);

        $dump = ob_get_contents();

        ob_end_clean();

        $dumpText = ($stripTags ? strip_tags(html_entity_decode($dump)) : $dump);

        ini_set('html_errors', $html);
<<<<<<< HEAD

        if ($echo) {
            echo $dumpText;
        }

=======
        
        if ($echo) {
            echo $dumpText;
        }
        
>>>>>>> pantheon-drops-8/master
        return $dumpText;
    }

    /**
     * @param mixed $var
     * @param int   $maxDepth
     *
     * @return mixed
     */
    public static function export($var, $maxDepth)
    {
        $return = null;
<<<<<<< HEAD
        $isObj  = is_object($var);
=======
        $isObj = is_object($var);
>>>>>>> pantheon-drops-8/master

        if ($var instanceof Collection) {
            $var = $var->toArray();
        }

<<<<<<< HEAD
        if ( ! $maxDepth) {
            return is_object($var) ? get_class($var)
                : (is_array($var) ? 'Array(' . count($var) . ')' : $var);
        }

        if (is_array($var)) {
            $return = [];

            foreach ($var as $k => $v) {
                $return[$k] = self::export($v, $maxDepth - 1);
            }

            return $return;
        }

        if ( ! $isObj) {
            return $var;
        }

        $return = new \stdclass();
        if ($var instanceof \DateTimeInterface) {
            $return->__CLASS__ = get_class($var);
            $return->date      = $var->format('c');
            $return->timezone  = $var->getTimezone()->getName();

            return $return;
        }

        $return->__CLASS__ = ClassUtils::getClass($var);

        if ($var instanceof Proxy) {
            $return->__IS_PROXY__          = true;
            $return->__PROXY_INITIALIZED__ = $var->__isInitialized();
        }

        if ($var instanceof \ArrayObject || $var instanceof \ArrayIterator) {
            $return->__STORAGE__ = self::export($var->getArrayCopy(), $maxDepth - 1);
        }

        return self::fillReturnWithClassAttributes($var, $return, $maxDepth);
    }

    /**
     * Fill the $return variable with class attributes
     * Based on obj2array function from {@see https://secure.php.net/manual/en/function.get-object-vars.php#47075}
     *
     * @param object   $var
     * @param \stdClass $return
     * @param int      $maxDepth
     *
     * @return mixed
     */
    private static function fillReturnWithClassAttributes($var, \stdClass $return, $maxDepth)
    {
        $clone = (array) $var;

        foreach (array_keys($clone) as $key) {
            $aux  = explode("\0", $key);
            $name = end($aux);
            if ($aux[0] === '') {
                $name .= ':' . ($aux[1] === '*' ? 'protected' : $aux[1] . ':private');
            }
            $return->$name = self::export($clone[$key], $maxDepth - 1);
            ;
=======
        if ($maxDepth) {
            if (is_array($var)) {
                $return = [];

                foreach ($var as $k => $v) {
                    $return[$k] = self::export($v, $maxDepth - 1);
                }
            } else if ($isObj) {
                $return = new \stdclass();
                if ($var instanceof \DateTime) {
                    $return->__CLASS__ = "DateTime";
                    $return->date = $var->format('c');
                    $return->timezone = $var->getTimeZone()->getName();
                } else {
                    $reflClass = ClassUtils::newReflectionObject($var);
                    $return->__CLASS__ = ClassUtils::getClass($var);

                    if ($var instanceof Proxy) {
                        $return->__IS_PROXY__ = true;
                        $return->__PROXY_INITIALIZED__ = $var->__isInitialized();
                    }

                    if ($var instanceof \ArrayObject || $var instanceof \ArrayIterator) {
                        $return->__STORAGE__ = self::export($var->getArrayCopy(), $maxDepth - 1);
                    }

                    foreach ($reflClass->getProperties() as $reflProperty) {
                        $name  = $reflProperty->getName();

                        $reflProperty->setAccessible(true);
                        $return->$name = self::export($reflProperty->getValue($var), $maxDepth - 1);
                    }
                }
            } else {
                $return = $var;
            }
        } else {
            $return = is_object($var) ? get_class($var)
                : (is_array($var) ? 'Array(' . count($var) . ')' : $var);
>>>>>>> pantheon-drops-8/master
        }

        return $return;
    }

    /**
     * Returns a string representation of an object.
     *
     * @param object $obj
     *
     * @return string
     */
    public static function toString($obj)
    {
        return method_exists($obj, '__toString') ? (string) $obj : get_class($obj) . '@' . spl_object_hash($obj);
    }
}
