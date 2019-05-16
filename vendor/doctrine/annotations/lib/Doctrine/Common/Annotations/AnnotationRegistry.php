<?php
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

namespace Doctrine\Common\Annotations;

<<<<<<< HEAD
=======
/**
 * AnnotationRegistry.
 */
>>>>>>> pantheon-drops-8/master
final class AnnotationRegistry
{
    /**
     * A map of namespaces to use for autoloading purposes based on a PSR-0 convention.
     *
     * Contains the namespace as key and an array of directories as value. If the value is NULL
     * the include path is used for checking for the corresponding file.
     *
     * This autoloading mechanism does not utilize the PHP autoloading but implements autoloading on its own.
     *
<<<<<<< HEAD
     * @var string[][]|string[]|null[]
     */
    static private $autoloadNamespaces = [];
=======
     * @var array
     */
    static private $autoloadNamespaces = array();
>>>>>>> pantheon-drops-8/master

    /**
     * A map of autoloader callables.
     *
<<<<<<< HEAD
     * @var callable[]
     */
    static private $loaders = [];

    /**
     * An array of classes which cannot be found
     *
     * @var null[] indexed by class name
     */
    static private $failedToAutoload = [];

    public static function reset() : void
    {
        self::$autoloadNamespaces = [];
        self::$loaders            = [];
        self::$failedToAutoload   = [];
=======
     * @var array
     */
    static private $loaders = array();

    /**
     * @return void
     */
    static public function reset()
    {
        self::$autoloadNamespaces = array();
        self::$loaders = array();
>>>>>>> pantheon-drops-8/master
    }

    /**
     * Registers file.
     *
<<<<<<< HEAD
     * @deprecated this method is deprecated and will be removed in doctrine/annotations 2.0
     *             autoloading should be deferred to the globally registered autoloader by then. For now,
     *             use @example AnnotationRegistry::registerLoader('class_exists')
     */
    public static function registerFile(string $file) : void
=======
     * @param string $file
     *
     * @return void
     */
    static public function registerFile($file)
>>>>>>> pantheon-drops-8/master
    {
        require_once $file;
    }

    /**
     * Adds a namespace with one or many directories to look for files or null for the include path.
     *
     * Loading of this namespaces will be done with a PSR-0 namespace loading algorithm.
     *
     * @param string            $namespace
     * @param string|array|null $dirs
     *
<<<<<<< HEAD
     * @deprecated this method is deprecated and will be removed in doctrine/annotations 2.0
     *             autoloading should be deferred to the globally registered autoloader by then. For now,
     *             use @example AnnotationRegistry::registerLoader('class_exists')
     */
    public static function registerAutoloadNamespace(string $namespace, $dirs = null) : void
=======
     * @return void
     */
    static public function registerAutoloadNamespace($namespace, $dirs = null)
>>>>>>> pantheon-drops-8/master
    {
        self::$autoloadNamespaces[$namespace] = $dirs;
    }

    /**
     * Registers multiple namespaces.
     *
     * Loading of this namespaces will be done with a PSR-0 namespace loading algorithm.
     *
<<<<<<< HEAD
     * @param string[][]|string[]|null[] $namespaces indexed by namespace name
     *
     * @deprecated this method is deprecated and will be removed in doctrine/annotations 2.0
     *             autoloading should be deferred to the globally registered autoloader by then. For now,
     *             use @example AnnotationRegistry::registerLoader('class_exists')
     */
    public static function registerAutoloadNamespaces(array $namespaces) : void
    {
        self::$autoloadNamespaces = \array_merge(self::$autoloadNamespaces, $namespaces);
=======
     * @param array $namespaces
     *
     * @return void
     */
    static public function registerAutoloadNamespaces(array $namespaces)
    {
        self::$autoloadNamespaces = array_merge(self::$autoloadNamespaces, $namespaces);
>>>>>>> pantheon-drops-8/master
    }

    /**
     * Registers an autoloading callable for annotations, much like spl_autoload_register().
     *
     * NOTE: These class loaders HAVE to be silent when a class was not found!
     * IMPORTANT: Loaders have to return true if they loaded a class that could contain the searched annotation class.
     *
<<<<<<< HEAD
     * @deprecated this method is deprecated and will be removed in doctrine/annotations 2.0
     *             autoloading should be deferred to the globally registered autoloader by then. For now,
     *             use @example AnnotationRegistry::registerLoader('class_exists')
     */
    public static function registerLoader(callable $callable) : void
    {
        // Reset our static cache now that we have a new loader to work with
        self::$failedToAutoload   = [];
        self::$loaders[]          = $callable;
    }

    /**
     * Registers an autoloading callable for annotations, if it is not already registered
     *
     * @deprecated this method is deprecated and will be removed in doctrine/annotations 2.0
     */
    public static function registerUniqueLoader(callable $callable) : void
    {
        if ( ! in_array($callable, self::$loaders, true) ) {
            self::registerLoader($callable);
        }
=======
     * @param callable $callable
     *
     * @return void
     *
     * @throws \InvalidArgumentException
     */
    static public function registerLoader($callable)
    {
        if (!is_callable($callable)) {
            throw new \InvalidArgumentException("A callable is expected in AnnotationRegistry::registerLoader().");
        }
        self::$loaders[] = $callable;
>>>>>>> pantheon-drops-8/master
    }

    /**
     * Autoloads an annotation class silently.
<<<<<<< HEAD
     */
    public static function loadAnnotationClass(string $class) : bool
    {
        if (\class_exists($class, false)) {
            return true;
        }

        if (\array_key_exists($class, self::$failedToAutoload)) {
            return false;
        }

        foreach (self::$autoloadNamespaces AS $namespace => $dirs) {
            if (\strpos($class, $namespace) === 0) {
                $file = \str_replace('\\', \DIRECTORY_SEPARATOR, $class) . '.php';

=======
     *
     * @param string $class
     *
     * @return boolean
     */
    static public function loadAnnotationClass($class)
    {
        foreach (self::$autoloadNamespaces AS $namespace => $dirs) {
            if (strpos($class, $namespace) === 0) {
                $file = str_replace("\\", DIRECTORY_SEPARATOR, $class) . ".php";
>>>>>>> pantheon-drops-8/master
                if ($dirs === null) {
                    if ($path = stream_resolve_include_path($file)) {
                        require $path;
                        return true;
                    }
                } else {
<<<<<<< HEAD
                    foreach((array) $dirs AS $dir) {
                        if (is_file($dir . \DIRECTORY_SEPARATOR . $file)) {
                            require $dir . \DIRECTORY_SEPARATOR . $file;
=======
                    foreach((array)$dirs AS $dir) {
                        if (is_file($dir . DIRECTORY_SEPARATOR . $file)) {
                            require $dir . DIRECTORY_SEPARATOR . $file;
>>>>>>> pantheon-drops-8/master
                            return true;
                        }
                    }
                }
            }
        }

        foreach (self::$loaders AS $loader) {
<<<<<<< HEAD
            if ($loader($class) === true) {
                return true;
            }
        }

        self::$failedToAutoload[$class] = null;

=======
            if (call_user_func($loader, $class) === true) {
                return true;
            }
        }
>>>>>>> pantheon-drops-8/master
        return false;
    }
}
