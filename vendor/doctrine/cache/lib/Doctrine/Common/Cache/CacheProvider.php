<?php
<<<<<<< HEAD

namespace Doctrine\Common\Cache;

use function array_combine;
use function array_key_exists;
use function array_map;
use function sprintf;

/**
 * Base class for cache provider implementations.
 *
 */
abstract class CacheProvider implements Cache, FlushableCache, ClearableCache, MultiOperationCache
{
    public const DOCTRINE_NAMESPACE_CACHEKEY = 'DoctrineNamespaceCacheKey[%s]';
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
 * Base class for cache provider implementations.
 *
 * @since  2.2
 * @author Benjamin Eberlei <kontakt@beberlei.de>
 * @author Guilherme Blanco <guilhermeblanco@hotmail.com>
 * @author Jonathan Wage <jonwage@gmail.com>
 * @author Roman Borschel <roman@code-factory.org>
 * @author Fabio B. Silva <fabio.bat.silva@gmail.com>
 */
abstract class CacheProvider implements Cache, FlushableCache, ClearableCache, MultiGetCache, MultiPutCache
{
    const DOCTRINE_NAMESPACE_CACHEKEY = 'DoctrineNamespaceCacheKey[%s]';
>>>>>>> pantheon-drops-8/master

    /**
     * The namespace to prefix all cache ids with.
     *
     * @var string
     */
    private $namespace = '';

    /**
     * The namespace version.
     *
<<<<<<< HEAD
     * @var int|null
=======
     * @var integer|null
>>>>>>> pantheon-drops-8/master
     */
    private $namespaceVersion;

    /**
     * Sets the namespace to prefix all cache ids with.
     *
     * @param string $namespace
     *
     * @return void
     */
    public function setNamespace($namespace)
    {
        $this->namespace        = (string) $namespace;
        $this->namespaceVersion = null;
    }

    /**
     * Retrieves the namespace that prefixes all cache ids.
     *
     * @return string
     */
    public function getNamespace()
    {
        return $this->namespace;
    }

    /**
     * {@inheritdoc}
     */
    public function fetch($id)
    {
        return $this->doFetch($this->getNamespacedId($id));
    }

    /**
     * {@inheritdoc}
     */
    public function fetchMultiple(array $keys)
    {
        if (empty($keys)) {
<<<<<<< HEAD
            return [];
        }

        // note: the array_combine() is in place to keep an association between our $keys and the $namespacedKeys
        $namespacedKeys = array_combine($keys, array_map([$this, 'getNamespacedId'], $keys));
        $items          = $this->doFetchMultiple($namespacedKeys);
        $foundItems     = [];
=======
            return array();
        }
        
        // note: the array_combine() is in place to keep an association between our $keys and the $namespacedKeys
        $namespacedKeys = array_combine($keys, array_map(array($this, 'getNamespacedId'), $keys));
        $items          = $this->doFetchMultiple($namespacedKeys);
        $foundItems     = array();
>>>>>>> pantheon-drops-8/master

        // no internal array function supports this sort of mapping: needs to be iterative
        // this filters and combines keys in one pass
        foreach ($namespacedKeys as $requestedKey => $namespacedKey) {
<<<<<<< HEAD
            if (! isset($items[$namespacedKey]) && ! array_key_exists($namespacedKey, $items)) {
                continue;
            }

            $foundItems[$requestedKey] = $items[$namespacedKey];
=======
            if (isset($items[$namespacedKey]) || array_key_exists($namespacedKey, $items)) {
                $foundItems[$requestedKey] = $items[$namespacedKey];
            }
>>>>>>> pantheon-drops-8/master
        }

        return $foundItems;
    }

    /**
     * {@inheritdoc}
     */
    public function saveMultiple(array $keysAndValues, $lifetime = 0)
    {
<<<<<<< HEAD
        $namespacedKeysAndValues = [];
=======
        $namespacedKeysAndValues = array();
>>>>>>> pantheon-drops-8/master
        foreach ($keysAndValues as $key => $value) {
            $namespacedKeysAndValues[$this->getNamespacedId($key)] = $value;
        }

        return $this->doSaveMultiple($namespacedKeysAndValues, $lifetime);
    }

    /**
     * {@inheritdoc}
     */
    public function contains($id)
    {
        return $this->doContains($this->getNamespacedId($id));
    }

    /**
     * {@inheritdoc}
     */
    public function save($id, $data, $lifeTime = 0)
    {
        return $this->doSave($this->getNamespacedId($id), $data, $lifeTime);
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function deleteMultiple(array $keys)
    {
        return $this->doDeleteMultiple(array_map([$this, 'getNamespacedId'], $keys));
    }

    /**
     * {@inheritdoc}
     */
=======
>>>>>>> pantheon-drops-8/master
    public function delete($id)
    {
        return $this->doDelete($this->getNamespacedId($id));
    }

    /**
     * {@inheritdoc}
     */
    public function getStats()
    {
        return $this->doGetStats();
    }

    /**
     * {@inheritDoc}
     */
    public function flushAll()
    {
        return $this->doFlush();
    }

    /**
     * {@inheritDoc}
     */
    public function deleteAll()
    {
        $namespaceCacheKey = $this->getNamespaceCacheKey();
        $namespaceVersion  = $this->getNamespaceVersion() + 1;

        if ($this->doSave($namespaceCacheKey, $namespaceVersion)) {
            $this->namespaceVersion = $namespaceVersion;

            return true;
        }

        return false;
    }

    /**
     * Prefixes the passed id with the configured namespace value.
     *
     * @param string $id The id to namespace.
     *
     * @return string The namespaced id.
     */
<<<<<<< HEAD
    private function getNamespacedId(string $id) : string
    {
        $namespaceVersion = $this->getNamespaceVersion();
=======
    private function getNamespacedId($id)
    {
        $namespaceVersion  = $this->getNamespaceVersion();
>>>>>>> pantheon-drops-8/master

        return sprintf('%s[%s][%s]', $this->namespace, $id, $namespaceVersion);
    }

    /**
     * Returns the namespace cache key.
<<<<<<< HEAD
     */
    private function getNamespaceCacheKey() : string
=======
     *
     * @return string
     */
    private function getNamespaceCacheKey()
>>>>>>> pantheon-drops-8/master
    {
        return sprintf(self::DOCTRINE_NAMESPACE_CACHEKEY, $this->namespace);
    }

    /**
     * Returns the namespace version.
<<<<<<< HEAD
     */
    private function getNamespaceVersion() : int
    {
        if ($this->namespaceVersion !== null) {
            return $this->namespaceVersion;
        }

        $namespaceCacheKey      = $this->getNamespaceCacheKey();
        $this->namespaceVersion = (int) $this->doFetch($namespaceCacheKey) ?: 1;
=======
     *
     * @return integer
     */
    private function getNamespaceVersion()
    {
        if (null !== $this->namespaceVersion) {
            return $this->namespaceVersion;
        }

        $namespaceCacheKey = $this->getNamespaceCacheKey();
        $this->namespaceVersion = $this->doFetch($namespaceCacheKey) ?: 1;
>>>>>>> pantheon-drops-8/master

        return $this->namespaceVersion;
    }

    /**
     * Default implementation of doFetchMultiple. Each driver that supports multi-get should owerwrite it.
     *
     * @param array $keys Array of keys to retrieve from cache
     * @return array Array of values retrieved for the given keys.
     */
    protected function doFetchMultiple(array $keys)
    {
<<<<<<< HEAD
        $returnValues = [];

        foreach ($keys as $key) {
            $item = $this->doFetch($key);
            if ($item === false && ! $this->doContains($key)) {
                continue;
            }

            $returnValues[$key] = $item;
=======
        $returnValues = array();

        foreach ($keys as $key) {
            if (false !== ($item = $this->doFetch($key)) || $this->doContains($key)) {
                $returnValues[$key] = $item;
            }
>>>>>>> pantheon-drops-8/master
        }

        return $returnValues;
    }

    /**
     * Fetches an entry from the cache.
     *
     * @param string $id The id of the cache entry to fetch.
     *
     * @return mixed|false The cached data or FALSE, if no cache entry exists for the given id.
     */
    abstract protected function doFetch($id);

    /**
     * Tests if an entry exists in the cache.
     *
     * @param string $id The cache id of the entry to check for.
     *
     * @return bool TRUE if a cache entry exists for the given cache id, FALSE otherwise.
     */
    abstract protected function doContains($id);

    /**
     * Default implementation of doSaveMultiple. Each driver that supports multi-put should override it.
     *
<<<<<<< HEAD
     * @param array $keysAndValues Array of keys and values to save in cache
     * @param int   $lifetime      The lifetime. If != 0, sets a specific lifetime for these
     *                             cache entries (0 => infinite lifeTime).
=======
     * @param array $keysAndValues  Array of keys and values to save in cache
     * @param int   $lifetime       The lifetime. If != 0, sets a specific lifetime for these
     *                              cache entries (0 => infinite lifeTime).
>>>>>>> pantheon-drops-8/master
     *
     * @return bool TRUE if the operation was successful, FALSE if it wasn't.
     */
    protected function doSaveMultiple(array $keysAndValues, $lifetime = 0)
    {
        $success = true;

        foreach ($keysAndValues as $key => $value) {
<<<<<<< HEAD
            if ($this->doSave($key, $value, $lifetime)) {
                continue;
            }

            $success = false;
=======
            if (!$this->doSave($key, $value, $lifetime)) {
                $success = false;
            }
>>>>>>> pantheon-drops-8/master
        }

        return $success;
    }

    /**
     * Puts data into the cache.
     *
     * @param string $id       The cache id.
     * @param string $data     The cache entry/data.
     * @param int    $lifeTime The lifetime. If != 0, sets a specific lifetime for this
     *                           cache entry (0 => infinite lifeTime).
     *
     * @return bool TRUE if the entry was successfully stored in the cache, FALSE otherwise.
     */
    abstract protected function doSave($id, $data, $lifeTime = 0);

    /**
<<<<<<< HEAD
     * Default implementation of doDeleteMultiple. Each driver that supports multi-delete should override it.
     *
     * @param array $keys Array of keys to delete from cache
     *
     * @return bool TRUE if the operation was successful, FALSE if it wasn't
     */
    protected function doDeleteMultiple(array $keys)
    {
        $success = true;

        foreach ($keys as $key) {
            if ($this->doDelete($key)) {
                continue;
            }

            $success = false;
        }

        return $success;
    }

    /**
=======
>>>>>>> pantheon-drops-8/master
     * Deletes a cache entry.
     *
     * @param string $id The cache id.
     *
     * @return bool TRUE if the cache entry was successfully deleted, FALSE otherwise.
     */
    abstract protected function doDelete($id);

    /**
     * Flushes all cache entries.
     *
     * @return bool TRUE if the cache entries were successfully flushed, FALSE otherwise.
     */
    abstract protected function doFlush();

    /**
     * Retrieves cached information from the data store.
     *
<<<<<<< HEAD
=======
     * @since 2.2
     *
>>>>>>> pantheon-drops-8/master
     * @return array|null An associative array with server's statistics if available, NULL otherwise.
     */
    abstract protected function doGetStats();
}
