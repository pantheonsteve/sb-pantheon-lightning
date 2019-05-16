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

namespace Doctrine\Common\Cache;

use Redis;
<<<<<<< HEAD
use function array_combine;
use function defined;
use function extension_loaded;
use function is_bool;
=======
>>>>>>> pantheon-drops-8/master

/**
 * Redis cache provider.
 *
 * @link   www.doctrine-project.org
<<<<<<< HEAD
 */
class RedisCache extends CacheProvider
{
    /** @var Redis|null */
=======
 * @since  2.2
 * @author Osman Ungur <osmanungur@gmail.com>
 */
class RedisCache extends CacheProvider
{
    /**
     * @var Redis|null
     */
>>>>>>> pantheon-drops-8/master
    private $redis;

    /**
     * Sets the redis instance to use.
     *
<<<<<<< HEAD
=======
     * @param Redis $redis
     *
>>>>>>> pantheon-drops-8/master
     * @return void
     */
    public function setRedis(Redis $redis)
    {
        $redis->setOption(Redis::OPT_SERIALIZER, $this->getSerializerValue());
        $this->redis = $redis;
    }

    /**
     * Gets the redis instance used by the cache.
     *
     * @return Redis|null
     */
    public function getRedis()
    {
        return $this->redis;
    }

    /**
     * {@inheritdoc}
     */
    protected function doFetch($id)
    {
        return $this->redis->get($id);
    }

    /**
     * {@inheritdoc}
     */
    protected function doFetchMultiple(array $keys)
    {
        $fetchedItems = array_combine($keys, $this->redis->mget($keys));

        // Redis mget returns false for keys that do not exist. So we need to filter those out unless it's the real data.
<<<<<<< HEAD
        $foundItems = [];

        foreach ($fetchedItems as $key => $value) {
            if ($value === false && ! $this->redis->exists($key)) {
                continue;
            }

            $foundItems[$key] = $value;
=======
        $foundItems   = array();

        foreach ($fetchedItems as $key => $value) {
            if (false !== $value || $this->redis->exists($key)) {
                $foundItems[$key] = $value;
            }
>>>>>>> pantheon-drops-8/master
        }

        return $foundItems;
    }

    /**
     * {@inheritdoc}
     */
    protected function doSaveMultiple(array $keysAndValues, $lifetime = 0)
    {
        if ($lifetime) {
            $success = true;

            // Keys have lifetime, use SETEX for each of them
            foreach ($keysAndValues as $key => $value) {
<<<<<<< HEAD
                if ($this->redis->setex($key, $lifetime, $value)) {
                    continue;
                }

                $success = false;
=======
                if (!$this->redis->setex($key, $lifetime, $value)) {
                    $success = false;
                }
>>>>>>> pantheon-drops-8/master
            }

            return $success;
        }

        // No lifetime, use MSET
        return (bool) $this->redis->mset($keysAndValues);
    }

    /**
     * {@inheritdoc}
     */
    protected function doContains($id)
    {
<<<<<<< HEAD
        $exists = $this->redis->exists($id);

        if (is_bool($exists)) {
            return $exists;
        }

        return $exists > 0;
=======
        return $this->redis->exists($id);
>>>>>>> pantheon-drops-8/master
    }

    /**
     * {@inheritdoc}
     */
    protected function doSave($id, $data, $lifeTime = 0)
    {
        if ($lifeTime > 0) {
            return $this->redis->setex($id, $lifeTime, $data);
        }

        return $this->redis->set($id, $data);
    }

    /**
     * {@inheritdoc}
     */
    protected function doDelete($id)
    {
        return $this->redis->delete($id) >= 0;
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    protected function doDeleteMultiple(array $keys)
    {
        return $this->redis->delete($keys) >= 0;
    }

    /**
     * {@inheritdoc}
     */
=======
>>>>>>> pantheon-drops-8/master
    protected function doFlush()
    {
        return $this->redis->flushDB();
    }

    /**
     * {@inheritdoc}
     */
    protected function doGetStats()
    {
        $info = $this->redis->info();
<<<<<<< HEAD
        return [
=======
        return array(
>>>>>>> pantheon-drops-8/master
            Cache::STATS_HITS   => $info['keyspace_hits'],
            Cache::STATS_MISSES => $info['keyspace_misses'],
            Cache::STATS_UPTIME => $info['uptime_in_seconds'],
            Cache::STATS_MEMORY_USAGE      => $info['used_memory'],
<<<<<<< HEAD
            Cache::STATS_MEMORY_AVAILABLE  => false,
        ];
=======
            Cache::STATS_MEMORY_AVAILABLE  => false
        );
>>>>>>> pantheon-drops-8/master
    }

    /**
     * Returns the serializer constant to use. If Redis is compiled with
     * igbinary support, that is used. Otherwise the default PHP serializer is
     * used.
     *
<<<<<<< HEAD
     * @return int One of the Redis::SERIALIZER_* constants
     */
    protected function getSerializerValue()
    {
=======
     * @return integer One of the Redis::SERIALIZER_* constants
     */
    protected function getSerializerValue()
    {
        if (defined('HHVM_VERSION')) {
            return Redis::SERIALIZER_PHP;
        }

>>>>>>> pantheon-drops-8/master
        if (defined('Redis::SERIALIZER_IGBINARY') && extension_loaded('igbinary')) {
            return Redis::SERIALIZER_IGBINARY;
        }

        return Redis::SERIALIZER_PHP;
    }
}
