<?php
<<<<<<< HEAD

namespace Doctrine\Common\Collections;

use Doctrine\Common\Collections\Expr\CompositeExpression;
use Doctrine\Common\Collections\Expr\Expression;
use function array_map;
use function strtoupper;

/**
 * Criteria for filtering Selectable collections.
 */
class Criteria
{
    public const ASC = 'ASC';

    public const DESC = 'DESC';

    /** @var ExpressionBuilder|null */
    private static $expressionBuilder;

    /** @var Expression|null */
    private $expression;

    /** @var string[] */
    private $orderings = [];

    /** @var int|null */
    private $firstResult;

    /** @var int|null */
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

namespace Doctrine\Common\Collections;

use Doctrine\Common\Collections\Expr\Expression;
use Doctrine\Common\Collections\Expr\CompositeExpression;

/**
 * Criteria for filtering Selectable collections.
 *
 * @author Benjamin Eberlei <kontakt@beberlei.de>
 * @since 2.3
 */
class Criteria
{
    /**
     * @var string
     */
    const ASC  = 'ASC';

    /**
     * @var string
     */
    const DESC = 'DESC';

    /**
     * @var \Doctrine\Common\Collections\ExpressionBuilder|null
     */
    private static $expressionBuilder;

    /**
     * @var \Doctrine\Common\Collections\Expr\Expression|null
     */
    private $expression;

    /**
     * @var string[]
     */
    private $orderings = array();

    /**
     * @var int|null
     */
    private $firstResult;

    /**
     * @var int|null
     */
>>>>>>> pantheon-drops-8/master
    private $maxResults;

    /**
     * Creates an instance of the class.
     *
     * @return Criteria
     */
    public static function create()
    {
        return new static();
    }

    /**
     * Returns the expression builder.
     *
<<<<<<< HEAD
     * @return ExpressionBuilder
=======
     * @return \Doctrine\Common\Collections\ExpressionBuilder
>>>>>>> pantheon-drops-8/master
     */
    public static function expr()
    {
        if (self::$expressionBuilder === null) {
            self::$expressionBuilder = new ExpressionBuilder();
        }

        return self::$expressionBuilder;
    }

    /**
     * Construct a new Criteria.
     *
<<<<<<< HEAD
=======
     * @param Expression    $expression
>>>>>>> pantheon-drops-8/master
     * @param string[]|null $orderings
     * @param int|null      $firstResult
     * @param int|null      $maxResults
     */
<<<<<<< HEAD
    public function __construct(?Expression $expression = null, ?array $orderings = null, $firstResult = null, $maxResults = null)
=======
    public function __construct(Expression $expression = null, array $orderings = null, $firstResult = null, $maxResults = null)
>>>>>>> pantheon-drops-8/master
    {
        $this->expression = $expression;

        $this->setFirstResult($firstResult);
        $this->setMaxResults($maxResults);

<<<<<<< HEAD
        if ($orderings === null) {
            return;
        }

        $this->orderBy($orderings);
=======
        if (null !== $orderings) {
            $this->orderBy($orderings);
        }
>>>>>>> pantheon-drops-8/master
    }

    /**
     * Sets the where expression to evaluate when this Criteria is searched for.
     *
<<<<<<< HEAD
=======
     * @param Expression $expression
     *
>>>>>>> pantheon-drops-8/master
     * @return Criteria
     */
    public function where(Expression $expression)
    {
        $this->expression = $expression;

        return $this;
    }

    /**
     * Appends the where expression to evaluate when this Criteria is searched for
     * using an AND with previous expression.
     *
<<<<<<< HEAD
=======
     * @param Expression $expression
     *
>>>>>>> pantheon-drops-8/master
     * @return Criteria
     */
    public function andWhere(Expression $expression)
    {
        if ($this->expression === null) {
            return $this->where($expression);
        }

<<<<<<< HEAD
        $this->expression = new CompositeExpression(
            CompositeExpression::TYPE_AND,
            [$this->expression, $expression]
        );
=======
        $this->expression = new CompositeExpression(CompositeExpression::TYPE_AND, array(
            $this->expression, $expression
        ));
>>>>>>> pantheon-drops-8/master

        return $this;
    }

    /**
     * Appends the where expression to evaluate when this Criteria is searched for
     * using an OR with previous expression.
     *
<<<<<<< HEAD
=======
     * @param Expression $expression
     *
>>>>>>> pantheon-drops-8/master
     * @return Criteria
     */
    public function orWhere(Expression $expression)
    {
        if ($this->expression === null) {
            return $this->where($expression);
        }

<<<<<<< HEAD
        $this->expression = new CompositeExpression(
            CompositeExpression::TYPE_OR,
            [$this->expression, $expression]
        );
=======
        $this->expression = new CompositeExpression(CompositeExpression::TYPE_OR, array(
            $this->expression, $expression
        ));
>>>>>>> pantheon-drops-8/master

        return $this;
    }

    /**
     * Gets the expression attached to this Criteria.
     *
     * @return Expression|null
     */
    public function getWhereExpression()
    {
        return $this->expression;
    }

    /**
     * Gets the current orderings of this Criteria.
     *
     * @return string[]
     */
    public function getOrderings()
    {
        return $this->orderings;
    }

    /**
     * Sets the ordering of the result of this Criteria.
     *
     * Keys are field and values are the order, being either ASC or DESC.
     *
     * @see Criteria::ASC
     * @see Criteria::DESC
     *
     * @param string[] $orderings
     *
     * @return Criteria
     */
    public function orderBy(array $orderings)
    {
        $this->orderings = array_map(
<<<<<<< HEAD
            static function (string $ordering) : string {
=======
            function ($ordering) {
>>>>>>> pantheon-drops-8/master
                return strtoupper($ordering) === Criteria::ASC ? Criteria::ASC : Criteria::DESC;
            },
            $orderings
        );

        return $this;
    }

    /**
     * Gets the current first result option of this Criteria.
     *
     * @return int|null
     */
    public function getFirstResult()
    {
        return $this->firstResult;
    }

    /**
     * Set the number of first result that this Criteria should return.
     *
     * @param int|null $firstResult The value to set.
     *
     * @return Criteria
     */
    public function setFirstResult($firstResult)
    {
<<<<<<< HEAD
        $this->firstResult = $firstResult === null ? null : (int) $firstResult;
=======
        $this->firstResult = null === $firstResult ? null : (int) $firstResult;
>>>>>>> pantheon-drops-8/master

        return $this;
    }

    /**
     * Gets maxResults.
     *
     * @return int|null
     */
    public function getMaxResults()
    {
        return $this->maxResults;
    }

    /**
     * Sets maxResults.
     *
     * @param int|null $maxResults The value to set.
     *
     * @return Criteria
     */
    public function setMaxResults($maxResults)
    {
<<<<<<< HEAD
        $this->maxResults = $maxResults === null ? null : (int) $maxResults;
=======
        $this->maxResults = null === $maxResults ? null : (int) $maxResults;
>>>>>>> pantheon-drops-8/master

        return $this;
    }
}
