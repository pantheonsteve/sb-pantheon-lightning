<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/zf2 for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Zend\Feed\Writer;

use DateTime;
<<<<<<< HEAD
use DateTimeInterface;
=======
>>>>>>> pantheon-drops-8/master
use Zend\Feed\Uri;

/**
*/
class Deleted
{
    /**
     * Internal array containing all data associated with this entry or item.
     *
     * @var array
     */
    protected $data = [];

    /**
     * Holds the value "atom" or "rss" depending on the feed type set when
     * when last exported.
     *
     * @var string
     */
    protected $type = null;

    /**
     * Set the feed character encoding
     *
     * @param  $encoding
     * @throws Exception\InvalidArgumentException
     * @return string|null
     * @return Deleted
     */
    public function setEncoding($encoding)
    {
<<<<<<< HEAD
        if (empty($encoding) || ! is_string($encoding)) {
=======
        if (empty($encoding) || !is_string($encoding)) {
>>>>>>> pantheon-drops-8/master
            throw new Exception\InvalidArgumentException('Invalid parameter: parameter must be a non-empty string');
        }
        $this->data['encoding'] = $encoding;

        return $this;
    }

    /**
     * Get the feed character encoding
     *
     * @return string|null
     */
    public function getEncoding()
    {
<<<<<<< HEAD
        if (! array_key_exists('encoding', $this->data)) {
=======
        if (!array_key_exists('encoding', $this->data)) {
>>>>>>> pantheon-drops-8/master
            return 'UTF-8';
        }
        return $this->data['encoding'];
    }

    /**
     * Unset a specific data point
     *
     * @param string $name
     * @return Deleted
     */
    public function remove($name)
    {
        if (isset($this->data[$name])) {
            unset($this->data[$name]);
        }

        return $this;
    }

    /**
     * Set the current feed type being exported to "rss" or "atom". This allows
     * other objects to gracefully choose whether to execute or not, depending
     * on their appropriateness for the current type, e.g. renderers.
     *
     * @param string $type
     * @return Deleted
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * Retrieve the current or last feed type exported.
     *
     * @return string Value will be "rss" or "atom"
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set reference
     *
     * @param $reference
     * @throws Exception\InvalidArgumentException
     * @return Deleted
     */
    public function setReference($reference)
    {
<<<<<<< HEAD
        if (empty($reference) || ! is_string($reference)) {
=======
        if (empty($reference) || !is_string($reference)) {
>>>>>>> pantheon-drops-8/master
            throw new Exception\InvalidArgumentException('Invalid parameter: reference must be a non-empty string');
        }
        $this->data['reference'] = $reference;

        return $this;
    }

    /**
     * @return string
     */
    public function getReference()
    {
<<<<<<< HEAD
        if (! array_key_exists('reference', $this->data)) {
=======
        if (!array_key_exists('reference', $this->data)) {
>>>>>>> pantheon-drops-8/master
            return;
        }
        return $this->data['reference'];
    }

    /**
     * Set when
     *
<<<<<<< HEAD
     * @param null|int|DateTimeInterface $date
=======
     * @param null|string|DateTime $date
>>>>>>> pantheon-drops-8/master
     * @throws Exception\InvalidArgumentException
     * @return Deleted
     */
    public function setWhen($date = null)
    {
        if ($date === null) {
            $date = new DateTime();
<<<<<<< HEAD
        }
        if (is_int($date)) {
            $date = new DateTime('@' . $date);
        }
        if (! $date instanceof DateTimeInterface) {
=======
        } elseif (is_int($date)) {
            $date = new DateTime('@' . $date);
        } elseif (!$date instanceof DateTime) {
>>>>>>> pantheon-drops-8/master
            throw new Exception\InvalidArgumentException('Invalid DateTime object or UNIX Timestamp'
            . ' passed as parameter');
        }
        $this->data['when'] = $date;

        return $this;
    }

    /**
     * @return DateTime
     */
    public function getWhen()
    {
<<<<<<< HEAD
        if (! array_key_exists('when', $this->data)) {
=======
        if (!array_key_exists('when', $this->data)) {
>>>>>>> pantheon-drops-8/master
            return;
        }
        return $this->data['when'];
    }

    /**
     * Set by
     *
     * @param array $by
     * @throws Exception\InvalidArgumentException
     * @return Deleted
     */
    public function setBy(array $by)
    {
        $author = [];
<<<<<<< HEAD
        if (! array_key_exists('name', $by)
            || empty($by['name'])
            || ! is_string($by['name'])
=======
        if (!array_key_exists('name', $by)
            || empty($by['name'])
            || !is_string($by['name'])
>>>>>>> pantheon-drops-8/master
        ) {
            throw new Exception\InvalidArgumentException('Invalid parameter: author array must include a'
            . ' "name" key with a non-empty string value');
        }
        $author['name'] = $by['name'];
        if (isset($by['email'])) {
<<<<<<< HEAD
            if (empty($by['email']) || ! is_string($by['email'])) {
=======
            if (empty($by['email']) || !is_string($by['email'])) {
>>>>>>> pantheon-drops-8/master
                throw new Exception\InvalidArgumentException('Invalid parameter: "email" array'
                . ' value must be a non-empty string');
            }
            $author['email'] = $by['email'];
        }
        if (isset($by['uri'])) {
            if (empty($by['uri'])
<<<<<<< HEAD
                || ! is_string($by['uri'])
                || ! Uri::factory($by['uri'])->isValid()
=======
                || !is_string($by['uri'])
                || !Uri::factory($by['uri'])->isValid()
>>>>>>> pantheon-drops-8/master
            ) {
                throw new Exception\InvalidArgumentException('Invalid parameter: "uri" array value must'
                 . ' be a non-empty string and valid URI/IRI');
            }
            $author['uri'] = $by['uri'];
        }
        $this->data['by'] = $author;

        return $this;
    }

    /**
     * @return string
     */
    public function getBy()
    {
<<<<<<< HEAD
        if (! array_key_exists('by', $this->data)) {
=======
        if (!array_key_exists('by', $this->data)) {
>>>>>>> pantheon-drops-8/master
            return;
        }
        return $this->data['by'];
    }

    /**
     * @param string $comment
     * @return Deleted
     */
    public function setComment($comment)
    {
        $this->data['comment'] = $comment;
        return $this;
    }

    /**
     * @return string
     */
    public function getComment()
    {
<<<<<<< HEAD
        if (! array_key_exists('comment', $this->data)) {
=======
        if (!array_key_exists('comment', $this->data)) {
>>>>>>> pantheon-drops-8/master
            return;
        }
        return $this->data['comment'];
    }
}
