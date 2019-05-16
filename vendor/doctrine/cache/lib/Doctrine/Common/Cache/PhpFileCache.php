<?php
<<<<<<< HEAD

namespace Doctrine\Common\Cache;

use function is_object;
use function method_exists;
use function restore_error_handler;
use function serialize;
use function set_error_handler;
use function sprintf;
use function time;
use function var_export;

/**
 * Php file cache driver.
 */
class PhpFileCache extends FileCache
{
    public const EXTENSION = '.doctrinecache.php';

    /**
     * @var callable
     *
     * This is cached in a local static variable to avoid instantiating a closure each time we need an empty handler
     */
    private static $emptyErrorHandler;
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

namespace Doctrine\Common\Cache;

/**
 * Php file cache driver.
 *
 * @since  2.3
 * @author Fabio B. Silva <fabio.bat.silva@gmail.com>
 */
class PhpFileCache extends FileCache
{
    const EXTENSION = '.doctrinecache.php';
>>>>>>> pantheon-drops-8/master

    /**
     * {@inheritdoc}
     */
    public function __construct($directory, $extension = self::EXTENSION, $umask = 0002)
    {
        parent::__construct($directory, $extension, $umask);
<<<<<<< HEAD

        self::$emptyErrorHandler = function () {
        };
=======
>>>>>>> pantheon-drops-8/master
    }

    /**
     * {@inheritdoc}
     */
    protected function doFetch($id)
    {
        $value = $this->includeFileForId($id);

<<<<<<< HEAD
        if ($value === null) {
=======
        if (! $value) {
>>>>>>> pantheon-drops-8/master
            return false;
        }

        if ($value['lifetime'] !== 0 && $value['lifetime'] < time()) {
            return false;
        }

        return $value['data'];
    }

    /**
     * {@inheritdoc}
     */
    protected function doContains($id)
    {
        $value = $this->includeFileForId($id);

<<<<<<< HEAD
        if ($value === null) {
=======
        if (! $value) {
>>>>>>> pantheon-drops-8/master
            return false;
        }

        return $value['lifetime'] === 0 || $value['lifetime'] > time();
    }

    /**
     * {@inheritdoc}
     */
    protected function doSave($id, $data, $lifeTime = 0)
    {
        if ($lifeTime > 0) {
            $lifeTime = time() + $lifeTime;
        }

<<<<<<< HEAD
        $filename = $this->getFilename($id);

        $value = [
            'lifetime'  => $lifeTime,
            'data'      => $data,
        ];

        if (is_object($data) && method_exists($data, '__set_state')) {
            $value = var_export($value, true);
            $code  = sprintf('<?php return %s;', $value);
        } else {
            $value = var_export(serialize($value), true);
            $code  = sprintf('<?php return unserialize(%s);', $value);
        }
=======
        if (is_object($data) && ! method_exists($data, '__set_state')) {
            throw new \InvalidArgumentException(
                "Invalid argument given, PhpFileCache only allows objects that implement __set_state() " .
                "and fully support var_export(). You can use the FilesystemCache to save arbitrary object " .
                "graphs using serialize()/deserialize()."
            );
        }

        $filename  = $this->getFilename($id);

        $value = array(
            'lifetime'  => $lifeTime,
            'data'      => $data
        );

        $value  = var_export($value, true);
        $code   = sprintf('<?php return %s;', $value);
>>>>>>> pantheon-drops-8/master

        return $this->writeFile($filename, $code);
    }

    /**
<<<<<<< HEAD
     * @return array|null
     */
    private function includeFileForId(string $id) : ?array
=======
     * @param string $id
     *
     * @return array|false
     */
    private function includeFileForId($id)
>>>>>>> pantheon-drops-8/master
    {
        $fileName = $this->getFilename($id);

        // note: error suppression is still faster than `file_exists`, `is_file` and `is_readable`
<<<<<<< HEAD
        set_error_handler(self::$emptyErrorHandler);

        $value = include $fileName;

        restore_error_handler();

        if (! isset($value['lifetime'])) {
            return null;
=======
        $value = @include $fileName;

        if (! isset($value['lifetime'])) {
            return false;
>>>>>>> pantheon-drops-8/master
        }

        return $value;
    }
}
