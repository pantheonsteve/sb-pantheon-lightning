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

namespace Doctrine\Common\Collections;

use Closure;

/**
 * Lazy collection that is backed by a concrete collection
 *
<<<<<<< HEAD
 * @psalm-template TKey of array-key
 * @psalm-template T
 * @template-implements Collection<TKey,T>
=======
 * @author Michaël Gallego <mic.gallego@gmail.com>
 * @since  1.2
>>>>>>> pantheon-drops-8/master
 */
abstract class AbstractLazyCollection implements Collection
{
    /**
     * The backed collection to use
     *
<<<<<<< HEAD
     * @psalm-var Collection<TKey,T>
=======
>>>>>>> pantheon-drops-8/master
     * @var Collection
     */
    protected $collection;

<<<<<<< HEAD
    /** @var bool */
=======
    /**
     * @var boolean
     */
>>>>>>> pantheon-drops-8/master
    protected $initialized = false;

    /**
     * {@inheritDoc}
     */
    public function count()
    {
        $this->initialize();
<<<<<<< HEAD

=======
>>>>>>> pantheon-drops-8/master
        return $this->collection->count();
    }

    /**
     * {@inheritDoc}
     */
    public function add($element)
    {
        $this->initialize();
<<<<<<< HEAD

=======
>>>>>>> pantheon-drops-8/master
        return $this->collection->add($element);
    }

    /**
     * {@inheritDoc}
     */
    public function clear()
    {
        $this->initialize();
        $this->collection->clear();
    }

    /**
     * {@inheritDoc}
     */
    public function contains($element)
    {
        $this->initialize();
<<<<<<< HEAD

=======
>>>>>>> pantheon-drops-8/master
        return $this->collection->contains($element);
    }

    /**
     * {@inheritDoc}
     */
    public function isEmpty()
    {
        $this->initialize();
<<<<<<< HEAD

=======
>>>>>>> pantheon-drops-8/master
        return $this->collection->isEmpty();
    }

    /**
     * {@inheritDoc}
     */
    public function remove($key)
    {
        $this->initialize();
<<<<<<< HEAD

=======
>>>>>>> pantheon-drops-8/master
        return $this->collection->remove($key);
    }

    /**
     * {@inheritDoc}
     */
    public function removeElement($element)
    {
        $this->initialize();
<<<<<<< HEAD

=======
>>>>>>> pantheon-drops-8/master
        return $this->collection->removeElement($element);
    }

    /**
     * {@inheritDoc}
     */
    public function containsKey($key)
    {
        $this->initialize();
<<<<<<< HEAD

=======
>>>>>>> pantheon-drops-8/master
        return $this->collection->containsKey($key);
    }

    /**
     * {@inheritDoc}
     */
    public function get($key)
    {
        $this->initialize();
<<<<<<< HEAD

=======
>>>>>>> pantheon-drops-8/master
        return $this->collection->get($key);
    }

    /**
     * {@inheritDoc}
     */
    public function getKeys()
    {
        $this->initialize();
<<<<<<< HEAD

=======
>>>>>>> pantheon-drops-8/master
        return $this->collection->getKeys();
    }

    /**
     * {@inheritDoc}
     */
    public function getValues()
    {
        $this->initialize();
<<<<<<< HEAD

=======
>>>>>>> pantheon-drops-8/master
        return $this->collection->getValues();
    }

    /**
     * {@inheritDoc}
     */
    public function set($key, $value)
    {
        $this->initialize();
        $this->collection->set($key, $value);
    }

    /**
     * {@inheritDoc}
     */
    public function toArray()
    {
        $this->initialize();
<<<<<<< HEAD

=======
>>>>>>> pantheon-drops-8/master
        return $this->collection->toArray();
    }

    /**
     * {@inheritDoc}
     */
    public function first()
    {
        $this->initialize();
<<<<<<< HEAD

=======
>>>>>>> pantheon-drops-8/master
        return $this->collection->first();
    }

    /**
     * {@inheritDoc}
     */
    public function last()
    {
        $this->initialize();
<<<<<<< HEAD

=======
>>>>>>> pantheon-drops-8/master
        return $this->collection->last();
    }

    /**
     * {@inheritDoc}
     */
    public function key()
    {
        $this->initialize();
<<<<<<< HEAD

=======
>>>>>>> pantheon-drops-8/master
        return $this->collection->key();
    }

    /**
     * {@inheritDoc}
     */
    public function current()
    {
        $this->initialize();
<<<<<<< HEAD

=======
>>>>>>> pantheon-drops-8/master
        return $this->collection->current();
    }

    /**
     * {@inheritDoc}
     */
    public function next()
    {
        $this->initialize();
<<<<<<< HEAD

=======
>>>>>>> pantheon-drops-8/master
        return $this->collection->next();
    }

    /**
     * {@inheritDoc}
     */
    public function exists(Closure $p)
    {
        $this->initialize();
<<<<<<< HEAD

=======
>>>>>>> pantheon-drops-8/master
        return $this->collection->exists($p);
    }

    /**
     * {@inheritDoc}
     */
    public function filter(Closure $p)
    {
        $this->initialize();
<<<<<<< HEAD

=======
>>>>>>> pantheon-drops-8/master
        return $this->collection->filter($p);
    }

    /**
     * {@inheritDoc}
     */
    public function forAll(Closure $p)
    {
        $this->initialize();
<<<<<<< HEAD

=======
>>>>>>> pantheon-drops-8/master
        return $this->collection->forAll($p);
    }

    /**
     * {@inheritDoc}
     */
    public function map(Closure $func)
    {
        $this->initialize();
<<<<<<< HEAD

=======
>>>>>>> pantheon-drops-8/master
        return $this->collection->map($func);
    }

    /**
     * {@inheritDoc}
     */
    public function partition(Closure $p)
    {
        $this->initialize();
<<<<<<< HEAD

=======
>>>>>>> pantheon-drops-8/master
        return $this->collection->partition($p);
    }

    /**
     * {@inheritDoc}
     */
    public function indexOf($element)
    {
        $this->initialize();
<<<<<<< HEAD

=======
>>>>>>> pantheon-drops-8/master
        return $this->collection->indexOf($element);
    }

    /**
     * {@inheritDoc}
     */
    public function slice($offset, $length = null)
    {
        $this->initialize();
<<<<<<< HEAD

=======
>>>>>>> pantheon-drops-8/master
        return $this->collection->slice($offset, $length);
    }

    /**
     * {@inheritDoc}
     */
    public function getIterator()
    {
        $this->initialize();
<<<<<<< HEAD

=======
>>>>>>> pantheon-drops-8/master
        return $this->collection->getIterator();
    }

    /**
     * {@inheritDoc}
     */
    public function offsetExists($offset)
    {
        $this->initialize();
<<<<<<< HEAD

=======
>>>>>>> pantheon-drops-8/master
        return $this->collection->offsetExists($offset);
    }

    /**
     * {@inheritDoc}
     */
    public function offsetGet($offset)
    {
        $this->initialize();
<<<<<<< HEAD

=======
>>>>>>> pantheon-drops-8/master
        return $this->collection->offsetGet($offset);
    }

    /**
     * {@inheritDoc}
     */
    public function offsetSet($offset, $value)
    {
        $this->initialize();
        $this->collection->offsetSet($offset, $value);
    }

    /**
     * {@inheritDoc}
     */
    public function offsetUnset($offset)
    {
        $this->initialize();
        $this->collection->offsetUnset($offset);
    }

    /**
     * Is the lazy collection already initialized?
     *
     * @return bool
     */
    public function isInitialized()
    {
        return $this->initialized;
    }

    /**
     * Initialize the collection
     *
     * @return void
     */
    protected function initialize()
    {
<<<<<<< HEAD
        if ($this->initialized) {
            return;
        }

        $this->doInitialize();
        $this->initialized = true;
=======
        if ( ! $this->initialized) {
            $this->doInitialize();
            $this->initialized = true;
        }
>>>>>>> pantheon-drops-8/master
    }

    /**
     * Do the initialization logic
     *
     * @return void
     */
    abstract protected function doInitialize();
}
