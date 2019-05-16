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

use ArrayAccess;
use Closure;
use Countable;
use IteratorAggregate;

/**
 * The missing (SPL) Collection/Array/OrderedMap interface.
 *
 * A Collection resembles the nature of a regular PHP array. That is,
 * it is essentially an <b>ordered map</b> that can also be used
 * like a list.
 *
 * A Collection has an internal iterator just like a PHP array. In addition,
 * a Collection can be iterated with external iterators, which is preferable.
 * To use an external iterator simply use the foreach language construct to
 * iterate over the collection (which calls {@link getIterator()} internally) or
 * explicitly retrieve an iterator though {@link getIterator()} which can then be
 * used to iterate over the collection.
 * You can not rely on the internal iterator of the collection being at a certain
 * position unless you explicitly positioned it before. Prefer iteration with
 * external iterators.
 *
<<<<<<< HEAD
 * @psalm-template TKey of array-key
 * @psalm-template T
 * @template-extends IteratorAggregate<TKey, T>
 * @template-extends ArrayAccess<TKey|null, T>
=======
 * @since  2.0
 * @author Guilherme Blanco <guilhermeblanco@hotmail.com>
 * @author Jonathan Wage <jonwage@gmail.com>
 * @author Roman Borschel <roman@code-factory.org>
>>>>>>> pantheon-drops-8/master
 */
interface Collection extends Countable, IteratorAggregate, ArrayAccess
{
    /**
     * Adds an element at the end of the collection.
     *
     * @param mixed $element The element to add.
     *
<<<<<<< HEAD
     * @return true Always TRUE.
     *
     * @psalm-param T $element
=======
     * @return boolean Always TRUE.
>>>>>>> pantheon-drops-8/master
     */
    public function add($element);

    /**
     * Clears the collection, removing all elements.
     *
     * @return void
     */
    public function clear();

    /**
     * Checks whether an element is contained in the collection.
     * This is an O(n) operation, where n is the size of the collection.
     *
     * @param mixed $element The element to search for.
     *
<<<<<<< HEAD
     * @return bool TRUE if the collection contains the element, FALSE otherwise.
     *
     * @psalm-param T $element
=======
     * @return boolean TRUE if the collection contains the element, FALSE otherwise.
>>>>>>> pantheon-drops-8/master
     */
    public function contains($element);

    /**
     * Checks whether the collection is empty (contains no elements).
     *
<<<<<<< HEAD
     * @return bool TRUE if the collection is empty, FALSE otherwise.
=======
     * @return boolean TRUE if the collection is empty, FALSE otherwise.
>>>>>>> pantheon-drops-8/master
     */
    public function isEmpty();

    /**
     * Removes the element at the specified index from the collection.
     *
<<<<<<< HEAD
     * @param string|int $key The key/index of the element to remove.
     *
     * @return mixed The removed element or NULL, if the collection did not contain the element.
     *
     * @psalm-param TKey $key
     * @psalm-return T|null
=======
     * @param string|integer $key The kex/index of the element to remove.
     *
     * @return mixed The removed element or NULL, if the collection did not contain the element.
>>>>>>> pantheon-drops-8/master
     */
    public function remove($key);

    /**
     * Removes the specified element from the collection, if it is found.
     *
     * @param mixed $element The element to remove.
     *
<<<<<<< HEAD
     * @return bool TRUE if this collection contained the specified element, FALSE otherwise.
     *
     * @psalm-param T $element
=======
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
>>>>>>> pantheon-drops-8/master
     */
    public function removeElement($element);

    /**
     * Checks whether the collection contains an element with the specified key/index.
     *
<<<<<<< HEAD
     * @param string|int $key The key/index to check for.
     *
     * @return bool TRUE if the collection contains an element with the specified key/index,
     *              FALSE otherwise.
     *
     * @psalm-param TKey $key
=======
     * @param string|integer $key The key/index to check for.
     *
     * @return boolean TRUE if the collection contains an element with the specified key/index,
     *                 FALSE otherwise.
>>>>>>> pantheon-drops-8/master
     */
    public function containsKey($key);

    /**
     * Gets the element at the specified key/index.
     *
<<<<<<< HEAD
     * @param string|int $key The key/index of the element to retrieve.
     *
     * @return mixed
     *
     * @psalm-param TKey $key
     * @psalm-return T|null
=======
     * @param string|integer $key The key/index of the element to retrieve.
     *
     * @return mixed
>>>>>>> pantheon-drops-8/master
     */
    public function get($key);

    /**
     * Gets all keys/indices of the collection.
     *
<<<<<<< HEAD
     * @return int[]|string[] The keys/indices of the collection, in the order of the corresponding
     *               elements in the collection.
     *
     * @psalm-return TKey[]
=======
     * @return array The keys/indices of the collection, in the order of the corresponding
     *               elements in the collection.
>>>>>>> pantheon-drops-8/master
     */
    public function getKeys();

    /**
     * Gets all values of the collection.
     *
     * @return array The values of all elements in the collection, in the order they
     *               appear in the collection.
<<<<<<< HEAD
     *
     * @psalm-return T[]
=======
>>>>>>> pantheon-drops-8/master
     */
    public function getValues();

    /**
     * Sets an element in the collection at the specified key/index.
     *
<<<<<<< HEAD
     * @param string|int $key   The key/index of the element to set.
     * @param mixed      $value The element to set.
     *
     * @return void
     *
     * @psalm-param TKey $key
     * @psalm-param T $value
=======
     * @param string|integer $key   The key/index of the element to set.
     * @param mixed          $value The element to set.
     *
     * @return void
>>>>>>> pantheon-drops-8/master
     */
    public function set($key, $value);

    /**
     * Gets a native PHP array representation of the collection.
     *
     * @return array
<<<<<<< HEAD
     *
     * @psalm-return array<TKey,T>
=======
>>>>>>> pantheon-drops-8/master
     */
    public function toArray();

    /**
     * Sets the internal iterator to the first element in the collection and returns this element.
     *
     * @return mixed
<<<<<<< HEAD
     *
     * @psalm-return T|false
=======
>>>>>>> pantheon-drops-8/master
     */
    public function first();

    /**
     * Sets the internal iterator to the last element in the collection and returns this element.
     *
     * @return mixed
<<<<<<< HEAD
     *
     * @psalm-return T|false
=======
>>>>>>> pantheon-drops-8/master
     */
    public function last();

    /**
     * Gets the key/index of the element at the current iterator position.
     *
     * @return int|string
<<<<<<< HEAD
     *
     * @psalm-return TKey
=======
>>>>>>> pantheon-drops-8/master
     */
    public function key();

    /**
     * Gets the element of the collection at the current iterator position.
     *
     * @return mixed
<<<<<<< HEAD
     *
     * @psalm-return T|false
=======
>>>>>>> pantheon-drops-8/master
     */
    public function current();

    /**
     * Moves the internal iterator position to the next element and returns this element.
     *
     * @return mixed
<<<<<<< HEAD
     *
     * @psalm-return T|false
=======
>>>>>>> pantheon-drops-8/master
     */
    public function next();

    /**
     * Tests for the existence of an element that satisfies the given predicate.
     *
     * @param Closure $p The predicate.
     *
<<<<<<< HEAD
     * @return bool TRUE if the predicate is TRUE for at least one element, FALSE otherwise.
     *
     * @psalm-param Closure(TKey=, T=):bool $p
=======
     * @return boolean TRUE if the predicate is TRUE for at least one element, FALSE otherwise.
>>>>>>> pantheon-drops-8/master
     */
    public function exists(Closure $p);

    /**
     * Returns all the elements of this collection that satisfy the predicate p.
     * The order of the elements is preserved.
     *
     * @param Closure $p The predicate used for filtering.
     *
     * @return Collection A collection with the results of the filter operation.
<<<<<<< HEAD
     *
     * @psalm-param Closure(T=):bool $p
     * @psalm-return Collection<TKey, T>
=======
>>>>>>> pantheon-drops-8/master
     */
    public function filter(Closure $p);

    /**
     * Tests whether the given predicate p holds for all elements of this collection.
     *
     * @param Closure $p The predicate.
     *
<<<<<<< HEAD
     * @return bool TRUE, if the predicate yields TRUE for all elements, FALSE otherwise.
     *
     * @psalm-param Closure(TKey=, T=):bool $p
=======
     * @return boolean TRUE, if the predicate yields TRUE for all elements, FALSE otherwise.
>>>>>>> pantheon-drops-8/master
     */
    public function forAll(Closure $p);

    /**
     * Applies the given function to each element in the collection and returns
     * a new collection with the elements returned by the function.
     *
<<<<<<< HEAD
     * @return Collection
     *
     * @psalm-template U
     * @psalm-param Closure(T=):U $func
     * @psalm-return Collection<TKey, U>
=======
     * @param Closure $func
     *
     * @return Collection
>>>>>>> pantheon-drops-8/master
     */
    public function map(Closure $func);

    /**
     * Partitions this collection in two collections according to a predicate.
     * Keys are preserved in the resulting collections.
     *
     * @param Closure $p The predicate on which to partition.
     *
<<<<<<< HEAD
     * @return Collection[] An array with two elements. The first element contains the collection
     *                      of elements where the predicate returned TRUE, the second element
     *                      contains the collection of elements where the predicate returned FALSE.
     *
     * @psalm-param Closure(TKey=, T=):bool $p
     * @psalm-return array{0: Collection<TKey, T>, 1: Collection<TKey, T>}
=======
     * @return array An array with two elements. The first element contains the collection
     *               of elements where the predicate returned TRUE, the second element
     *               contains the collection of elements where the predicate returned FALSE.
>>>>>>> pantheon-drops-8/master
     */
    public function partition(Closure $p);

    /**
     * Gets the index/key of a given element. The comparison of two elements is strict,
     * that means not only the value but also the type must match.
     * For objects this means reference equality.
     *
     * @param mixed $element The element to search for.
     *
     * @return int|string|bool The key/index of the element or FALSE if the element was not found.
<<<<<<< HEAD
     *
     * @psalm-param T $element
     * @psalm-return TKey|false
=======
>>>>>>> pantheon-drops-8/master
     */
    public function indexOf($element);

    /**
     * Extracts a slice of $length elements starting at position $offset from the Collection.
     *
     * If $length is null it returns all elements from $offset to the end of the Collection.
     * Keys have to be preserved by this method. Calling this method will only return the
     * selected slice and NOT change the elements contained in the collection slice is called on.
     *
     * @param int      $offset The offset to start from.
     * @param int|null $length The maximum number of elements to return, or null for no limit.
     *
     * @return array
<<<<<<< HEAD
     *
     * @psalm-return array<TKey,T>
=======
>>>>>>> pantheon-drops-8/master
     */
    public function slice($offset, $length = null);
}
