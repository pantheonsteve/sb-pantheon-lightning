<?php
<<<<<<< HEAD

namespace Doctrine\Common\Cache;

use const PHP_EOL;
use function fclose;
use function fgets;
use function fopen;
use function is_file;
use function serialize;
use function time;
use function unserialize;

/**
 * Filesystem cache driver.
 */
class FilesystemCache extends FileCache
{
    public const EXTENSION = '.doctrinecache.data';
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
 * Filesystem cache driver.
 *
 * @since  2.3
 * @author Fabio B. Silva <fabio.bat.silva@gmail.com>
 */
class FilesystemCache extends FileCache
{
    const EXTENSION = '.doctrinecache.data';
>>>>>>> pantheon-drops-8/master

    /**
     * {@inheritdoc}
     */
    public function __construct($directory, $extension = self::EXTENSION, $umask = 0002)
    {
        parent::__construct($directory, $extension, $umask);
    }

    /**
     * {@inheritdoc}
     */
    protected function doFetch($id)
    {
        $data     = '';
        $lifetime = -1;
        $filename = $this->getFilename($id);

<<<<<<< HEAD
        if (! is_file($filename)) {
            return false;
        }

        $resource = fopen($filename, 'r');
        $line     = fgets($resource);

        if ($line !== false) {
=======
        if ( ! is_file($filename)) {
            return false;
        }

        $resource = fopen($filename, "r");

        if (false !== ($line = fgets($resource))) {
>>>>>>> pantheon-drops-8/master
            $lifetime = (int) $line;
        }

        if ($lifetime !== 0 && $lifetime < time()) {
            fclose($resource);

            return false;
        }

<<<<<<< HEAD
        while (($line = fgets($resource)) !== false) {
=======
        while (false !== ($line = fgets($resource))) {
>>>>>>> pantheon-drops-8/master
            $data .= $line;
        }

        fclose($resource);

        return unserialize($data);
    }

    /**
     * {@inheritdoc}
     */
    protected function doContains($id)
    {
        $lifetime = -1;
        $filename = $this->getFilename($id);

<<<<<<< HEAD
        if (! is_file($filename)) {
            return false;
        }

        $resource = fopen($filename, 'r');
        $line     = fgets($resource);

        if ($line !== false) {
=======
        if ( ! is_file($filename)) {
            return false;
        }

        $resource = fopen($filename, "r");

        if (false !== ($line = fgets($resource))) {
>>>>>>> pantheon-drops-8/master
            $lifetime = (int) $line;
        }

        fclose($resource);

        return $lifetime === 0 || $lifetime > time();
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
        $data     = serialize($data);
        $filename = $this->getFilename($id);
=======
        $data      = serialize($data);
        $filename  = $this->getFilename($id);
>>>>>>> pantheon-drops-8/master

        return $this->writeFile($filename, $lifeTime . PHP_EOL . $data);
    }
}
