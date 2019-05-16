<?php
<<<<<<< HEAD

namespace Doctrine\Common\Cache;

use Couchbase;
use function explode;
use function time;
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

use \Couchbase;
>>>>>>> pantheon-drops-8/master

/**
 * Couchbase cache provider.
 *
 * @link   www.doctrine-project.org
<<<<<<< HEAD
 * @deprecated Couchbase SDK 1.x is now deprecated. Use \Doctrine\Common\Cache\CouchbaseBucketCache instead.
 * https://developer.couchbase.com/documentation/server/current/sdk/php/compatibility-versions-features.html
 */
class CouchbaseCache extends CacheProvider
{
    /** @var Couchbase|null */
=======
 * @since  2.4
 * @author Michael Nitschinger <michael@nitschinger.at>
 */
class CouchbaseCache extends CacheProvider
{
    /**
     * @var Couchbase|null
     */
>>>>>>> pantheon-drops-8/master
    private $couchbase;

    /**
     * Sets the Couchbase instance to use.
     *
<<<<<<< HEAD
=======
     * @param Couchbase $couchbase
     *
>>>>>>> pantheon-drops-8/master
     * @return void
     */
    public function setCouchbase(Couchbase $couchbase)
    {
        $this->couchbase = $couchbase;
    }

    /**
     * Gets the Couchbase instance used by the cache.
     *
     * @return Couchbase|null
     */
    public function getCouchbase()
    {
        return $this->couchbase;
    }

    /**
     * {@inheritdoc}
     */
    protected function doFetch($id)
    {
        return $this->couchbase->get($id) ?: false;
    }

    /**
     * {@inheritdoc}
     */
    protected function doContains($id)
    {
<<<<<<< HEAD
        return $this->couchbase->get($id) !== null;
=======
        return (null !== $this->couchbase->get($id));
>>>>>>> pantheon-drops-8/master
    }

    /**
     * {@inheritdoc}
     */
    protected function doSave($id, $data, $lifeTime = 0)
    {
        if ($lifeTime > 30 * 24 * 3600) {
            $lifeTime = time() + $lifeTime;
        }
        return $this->couchbase->set($id, $data, (int) $lifeTime);
    }

    /**
     * {@inheritdoc}
     */
    protected function doDelete($id)
    {
        return $this->couchbase->delete($id);
    }

    /**
     * {@inheritdoc}
     */
    protected function doFlush()
    {
        return $this->couchbase->flush();
    }

    /**
     * {@inheritdoc}
     */
    protected function doGetStats()
    {
        $stats   = $this->couchbase->getStats();
        $servers = $this->couchbase->getServers();
<<<<<<< HEAD
        $server  = explode(':', $servers[0]);
        $key     = $server[0] . ':11210';
        $stats   = $stats[$key];
        return [
=======
        $server  = explode(":", $servers[0]);
        $key     = $server[0] . ":" . "11210";
        $stats   = $stats[$key];
        return array(
>>>>>>> pantheon-drops-8/master
            Cache::STATS_HITS   => $stats['get_hits'],
            Cache::STATS_MISSES => $stats['get_misses'],
            Cache::STATS_UPTIME => $stats['uptime'],
            Cache::STATS_MEMORY_USAGE     => $stats['bytes'],
            Cache::STATS_MEMORY_AVAILABLE => $stats['limit_maxbytes'],
<<<<<<< HEAD
        ];
=======
        );
>>>>>>> pantheon-drops-8/master
    }
}
