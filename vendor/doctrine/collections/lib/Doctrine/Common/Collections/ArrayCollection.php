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

use ArrayIterator;
use Closure;
use Doctrine\Common\Collections\Expr\ClosureExpressionVisitor;
<<<<<<< HEAD
use const ARRAY_FILTER_USE_BOTH;
use function array_filter;
use function array_key_exists;
use function array_keys;
use function array_map;
use function array_reverse;
use function array_search;
use function array_slice;
use function array_values;
use function count;
use function current;
use function end;
use function in_array;
use function key;
use function next;
use function reset;
use function spl_object_hash;
use function uasort;
=======
>>>>>>> pantheon-drops-8/master

/**
 * An ArrayCollection is a Collection implementation that wraps a regular PHP array.
 *
<<<<<<< HEAD
 * Warning: Using (un-)serialize() on a collection is not a supported use-case
 * and may break when we change the internals in the future. If you need to
 * serialize a collection use {@link toArray()} and reconstruct the collection
 * manually.
 *
 * @psalm-template TKey of array-key
 * @psalm-template T
 * @template-implements Collection<TKey,T>
 * @template-implements Selectable<TKey,T>
=======
 * @since  2.0
 * @author Guilherme Blanco <guilhermeblanco@hotmail.com>
 * @author Jonathan Wage <jonwage@gmail.com>
 * @author Roman Borschel <roman@code-factory.org>
>>>>>>> pantheon-drops-8/master
 */
class ArrayCollection implements Collection, Selectable
{
    /**
     * An array containing the entries of this collection.
     *
<<<<<<< HEAD
     * @psalm-var array<TKey,T>
=======
>>>>>>> pantheon-drops-8/master
     * @var array
     */
    private $elements;

    /**
     * Initializes a new ArrayCollection.
     *
     * @param array $elements
<<<<<<< HEAD
     *
     * @psalm-param array<TKey,T> $elements
     */
    public function __construct(array $elements = [])
=======
     */
    public function __construct(array $elements = array())
>>>>>>> pantheon-drops-8/master
    {
        $this->elements = $elements;
    }

    /**
     * {@inheritDoc}
     */
    public function toArray()
    {
        return $this->elements;
    }

    /**
     * {@inheritDoc}
     */
    public function first()
    {
        return reset($this->elements);
    }

    /**
<<<<<<< HEAD
     * Creates a new instance from the specified elements.
     *
     * This method is provided for derived classes to specify how a new
     * instance should be created when constructor semantics have changed.
     *
     * @param array $elements Elements.
     *
     * @return static
     *
     * @psalm-param array<TKey,T> $elements
     * @psalm-return ArrayCollection<TKey,T>
     */
    protected function createFrom(array $elements)
    {
        return new static($elements);
    }

    /**
=======
>>>>>>> pantheon-drops-8/master
     * {@inheritDoc}
     */
    public function last()
    {
        return end($this->elements);
    }

    /**
     * {@inheritDoc}
     */
    public function key()
    {
        return key($this->elements);
    }

    /**
     * {@inheritDoc}
     */
    public function next()
    {
        return next($this->elements);
    }

    /**
     * {@inheritDoc}
     */
    public function current()
    {
        return current($this->elements);
    }

    /**
     * {@inheritDoc}
     */
    public function remove($key)
    {
<<<<<<< HEAD
        if (! isset($this->elements[$key]) && ! array_key_exists($key, $this->elements)) {
=======
        if ( ! isset($this->elements[$key]) && ! array_key_exists($key, $this->elements)) {
>>>>>>> pantheon-drops-8/master
            return null;
        }

        $removed = $this->elements[$key];
        unset($this->elements[$key]);

        return $removed;
    }

    /**
     * {@inheritDoc}
     */
    public function removeElement($element)
    {
        $key = array_search($element, $this->elements, true);

        if ($key === false) {
            return false;
        }

        unset($this->elements[$key]);

        return true;
    }

    /**
     * Required by interface ArrayAccess.
     *
     * {@inheritDoc}
     */
    public function offsetExists($offset)
    {
        return $this->containsKey($offset);
    }

    /**
     * Required by interface ArrayAccess.
     *
     * {@inheritDoc}
     */
    public function offsetGet($offset)
    {
        return $this->get($offset);
    }

    /**
     * Required by interface ArrayAccess.
     *
     * {@inheritDoc}
     */
    public function offsetSet($offset, $value)
    {
<<<<<<< HEAD
        if (! isset($offset)) {
            $this->add($value);

            return;
=======
        if ( ! isset($offset)) {
            return $this->add($value);
>>>>>>> pantheon-drops-8/master
        }

        $this->set($offset, $value);
    }

    /**
     * Required by interface ArrayAccess.
     *
     * {@inheritDoc}
     */
    public function offsetUnset($offset)
    {
<<<<<<< HEAD
        $this->remove($offset);
=======
        return $this->remove($offset);
>>>>>>> pantheon-drops-8/master
    }

    /**
     * {@inheritDoc}
     */
    public function containsKey($key)
    {
        return isset($this->elements[$key]) || array_key_exists($key, $this->elements);
    }

    /**
     * {@inheritDoc}
     */
    public function contains($element)
    {
        return in_array($element, $this->elements, true);
    }

    /**
     * {@inheritDoc}
     */
    public function exists(Closure $p)
    {
        foreach ($this->elements as $key => $element) {
            if ($p($key, $element)) {
                return true;
            }
        }

        return false;
    }

    /**
     * {@inheritDoc}
     */
    public function indexOf($element)
    {
        return array_search($element, $this->elements, true);
    }

    /**
     * {@inheritDoc}
     */
    public function get($key)
    {
<<<<<<< HEAD
        return $this->elements[$key] ?? null;
=======
        return isset($this->elements[$key]) ? $this->elements[$key] : null;
>>>>>>> pantheon-drops-8/master
    }

    /**
     * {@inheritDoc}
     */
    public function getKeys()
    {
        return array_keys($this->elements);
    }

    /**
     * {@inheritDoc}
     */
    public function getValues()
    {
        return array_values($this->elements);
    }

    /**
     * {@inheritDoc}
     */
    public function count()
    {
        return count($this->elements);
    }

    /**
     * {@inheritDoc}
     */
    public function set($key, $value)
    {
        $this->elements[$key] = $value;
    }

    /**
     * {@inheritDoc}
     */
<<<<<<< HEAD
    public function add($element)
    {
        $this->elements[] = $element;
=======
    public function add($value)
    {
        $this->elements[] = $value;
>>>>>>> pantheon-drops-8/master

        return true;
    }

    /**
     * {@inheritDoc}
     */
    public function isEmpty()
    {
        return empty($this->elements);
    }

    /**
     * Required by interface IteratorAggregate.
     *
     * {@inheritDoc}
     */
    public function getIterator()
    {
        return new ArrayIterator($this->elements);
    }

    /**
     * {@inheritDoc}
<<<<<<< HEAD
     *
     * @return static
     */
    public function map(Closure $func)
    {
        return $this->createFrom(array_map($func, $this->elements));
=======
     */
    public function map(Closure $func)
    {
        return new static(array_map($func, $this->elements));
>>>>>>> pantheon-drops-8/master
    }

    /**
     * {@inheritDoc}
<<<<<<< HEAD
     *
     * @return static
     *
     * @psalm-return ArrayCollection<TKey,T>
     */
    public function filter(Closure $p)
    {
        return $this->createFrom(array_filter($this->elements, $p, ARRAY_FILTER_USE_BOTH));
=======
     */
    public function filter(Closure $p)
    {
        return new static(array_filter($this->elements, $p));
>>>>>>> pantheon-drops-8/master
    }

    /**
     * {@inheritDoc}
     */
    public function forAll(Closure $p)
    {
        foreach ($this->elements as $key => $element) {
<<<<<<< HEAD
            if (! $p($key, $element)) {
=======
            if ( ! $p($key, $element)) {
>>>>>>> pantheon-drops-8/master
                return false;
            }
        }

        return true;
    }

    /**
     * {@inheritDoc}
     */
    public function partition(Closure $p)
    {
<<<<<<< HEAD
        $matches = $noMatches = [];
=======
        $matches = $noMatches = array();
>>>>>>> pantheon-drops-8/master

        foreach ($this->elements as $key => $element) {
            if ($p($key, $element)) {
                $matches[$key] = $element;
            } else {
                $noMatches[$key] = $element;
            }
        }

<<<<<<< HEAD
        return [$this->createFrom($matches), $this->createFrom($noMatches)];
=======
        return array(new static($matches), new static($noMatches));
>>>>>>> pantheon-drops-8/master
    }

    /**
     * Returns a string representation of this object.
     *
     * @return string
     */
    public function __toString()
    {
<<<<<<< HEAD
        return self::class . '@' . spl_object_hash($this);
=======
        return __CLASS__ . '@' . spl_object_hash($this);
>>>>>>> pantheon-drops-8/master
    }

    /**
     * {@inheritDoc}
     */
    public function clear()
    {
<<<<<<< HEAD
        $this->elements = [];
=======
        $this->elements = array();
>>>>>>> pantheon-drops-8/master
    }

    /**
     * {@inheritDoc}
     */
    public function slice($offset, $length = null)
    {
        return array_slice($this->elements, $offset, $length, true);
    }

    /**
     * {@inheritDoc}
     */
    public function matching(Criteria $criteria)
    {
        $expr     = $criteria->getWhereExpression();
        $filtered = $this->elements;

        if ($expr) {
            $visitor  = new ClosureExpressionVisitor();
            $filter   = $visitor->dispatch($expr);
            $filtered = array_filter($filtered, $filter);
        }

<<<<<<< HEAD
        $orderings = $criteria->getOrderings();

        if ($orderings) {
            $next = null;
            foreach (array_reverse($orderings) as $field => $ordering) {
                $next = ClosureExpressionVisitor::sortByField($field, $ordering === Criteria::DESC ? -1 : 1, $next);
=======
        if ($orderings = $criteria->getOrderings()) {
            foreach (array_reverse($orderings) as $field => $ordering) {
                $next = ClosureExpressionVisitor::sortByField($field, $ordering == Criteria::DESC ? -1 : 1);
>>>>>>> pantheon-drops-8/master
            }

            uasort($filtered, $next);
        }

        $offset = $criteria->getFirstResult();
        $length = $criteria->getMaxResults();

        if ($offset || $length) {
<<<<<<< HEAD
            $filtered = array_slice($filtered, (int) $offset, $length);
        }

        return $this->createFrom($filtered);
=======
            $filtered = array_slice($filtered, (int)$offset, $length);
        }

        return new static($filtered);
>>>>>>> pantheon-drops-8/master
    }
}
