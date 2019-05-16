<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/zf2 for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Zend\Feed\Writer\Extension\ITunes;

<<<<<<< HEAD
use Zend\Feed\Uri;
use Zend\Feed\Writer;
=======
use Zend\Feed\Writer;
use Zend\Feed\Writer\Extension;
>>>>>>> pantheon-drops-8/master
use Zend\Stdlib\StringUtils;
use Zend\Stdlib\StringWrapper\StringWrapperInterface;

/**
*/
class Entry
{
    /**
     * Array of Feed data for rendering by Extension's renderers
     *
     * @var array
     */
    protected $data = [];

    /**
     * Encoding of all text values
     *
     * @var string
     */
    protected $encoding = 'UTF-8';

    /**
     * The used string wrapper supporting encoding
     *
     * @var StringWrapperInterface
     */
    protected $stringWrapper;

    public function __construct()
    {
        $this->stringWrapper = StringUtils::getWrapper($this->encoding);
    }

    /**
     * Set feed encoding
     *
     * @param  string $enc
     * @return Entry
     */
    public function setEncoding($enc)
    {
        $this->stringWrapper = StringUtils::getWrapper($enc);
        $this->encoding      = $enc;
        return $this;
    }

    /**
     * Get feed encoding
     *
     * @return string
     */
    public function getEncoding()
    {
        return $this->encoding;
    }

    /**
     * Set a block value of "yes" or "no". You may also set an empty string.
     *
     * @param  string
<<<<<<< HEAD
=======
     * @return Entry
>>>>>>> pantheon-drops-8/master
     * @throws Writer\Exception\InvalidArgumentException
     */
    public function setItunesBlock($value)
    {
<<<<<<< HEAD
        if (! ctype_alpha($value) && strlen($value) > 0) {
=======
        if (!ctype_alpha($value) && strlen($value) > 0) {
>>>>>>> pantheon-drops-8/master
            throw new Writer\Exception\InvalidArgumentException('invalid parameter: "block" may only'
            . ' contain alphabetic characters');
        }

        if ($this->stringWrapper->strlen($value) > 255) {
            throw new Writer\Exception\InvalidArgumentException('invalid parameter: "block" may only'
            . ' contain a maximum of 255 characters');
        }
        $this->data['block'] = $value;
    }

    /**
     * Add authors to itunes entry
     *
     * @param  array $values
     * @return Entry
     */
    public function addItunesAuthors(array $values)
    {
        foreach ($values as $value) {
            $this->addItunesAuthor($value);
        }
        return $this;
    }

    /**
     * Add author to itunes entry
     *
     * @param  string $value
     * @return Entry
     * @throws Writer\Exception\InvalidArgumentException
     */
    public function addItunesAuthor($value)
    {
        if ($this->stringWrapper->strlen($value) > 255) {
            throw new Writer\Exception\InvalidArgumentException('invalid parameter: any "author" may only'
            . ' contain a maximum of 255 characters each');
        }
<<<<<<< HEAD
        if (! isset($this->data['authors'])) {
=======
        if (!isset($this->data['authors'])) {
>>>>>>> pantheon-drops-8/master
            $this->data['authors'] = [];
        }
        $this->data['authors'][] = $value;
        return $this;
    }

    /**
     * Set duration
     *
     * @param  int $value
     * @return Entry
     * @throws Writer\Exception\InvalidArgumentException
     */
    public function setItunesDuration($value)
    {
        $value = (string) $value;
<<<<<<< HEAD
        if (! ctype_digit($value)
            && ! preg_match("/^\d+:[0-5]{1}[0-9]{1}$/", $value)
            && ! preg_match("/^\d+:[0-5]{1}[0-9]{1}:[0-5]{1}[0-9]{1}$/", $value)
=======
        if (!ctype_digit($value)
            && !preg_match("/^\d+:[0-5]{1}[0-9]{1}$/", $value)
            && !preg_match("/^\d+:[0-5]{1}[0-9]{1}:[0-5]{1}[0-9]{1}$/", $value)
>>>>>>> pantheon-drops-8/master
        ) {
            throw new Writer\Exception\InvalidArgumentException('invalid parameter: "duration" may only'
            . ' be of a specified [[HH:]MM:]SS format');
        }
        $this->data['duration'] = $value;
        return $this;
    }

    /**
     * Set "explicit" flag
     *
     * @param  bool $value
     * @return Entry
     * @throws Writer\Exception\InvalidArgumentException
     */
    public function setItunesExplicit($value)
    {
<<<<<<< HEAD
        if (! in_array($value, ['yes', 'no', 'clean'])) {
=======
        if (!in_array($value, ['yes', 'no', 'clean'])) {
>>>>>>> pantheon-drops-8/master
            throw new Writer\Exception\InvalidArgumentException('invalid parameter: "explicit" may only'
            . ' be one of "yes", "no" or "clean"');
        }
        $this->data['explicit'] = $value;
        return $this;
    }

    /**
     * Set keywords
     *
<<<<<<< HEAD
     * @deprecated since 2.10.0; itunes:keywords is no longer part of the
     *     iTunes podcast RSS specification.
=======
>>>>>>> pantheon-drops-8/master
     * @param  array $value
     * @return Entry
     * @throws Writer\Exception\InvalidArgumentException
     */
    public function setItunesKeywords(array $value)
    {
<<<<<<< HEAD
        trigger_error(
            'itunes:keywords has been deprecated in the iTunes podcast RSS specification,'
            . ' and should not be relied on.',
            \E_USER_DEPRECATED
        );

=======
>>>>>>> pantheon-drops-8/master
        if (count($value) > 12) {
            throw new Writer\Exception\InvalidArgumentException('invalid parameter: "keywords" may only'
            . ' contain a maximum of 12 terms');
        }

        $concat = implode(',', $value);
        if ($this->stringWrapper->strlen($concat) > 255) {
            throw new Writer\Exception\InvalidArgumentException('invalid parameter: "keywords" may only'
            . ' have a concatenated length of 255 chars where terms are delimited'
            . ' by a comma');
        }
        $this->data['keywords'] = $value;
        return $this;
    }

    /**
<<<<<<< HEAD
     * Set title
     *
     * @param  string $value
     * @return Entry
     * @throws Writer\Exception\InvalidArgumentException
     */
    public function setItunesTitle($value)
    {
        if ($this->stringWrapper->strlen($value) > 255) {
            throw new Writer\Exception\InvalidArgumentException('invalid parameter: "title" may only'
            . ' contain a maximum of 255 characters');
        }
        $this->data['title'] = $value;
        return $this;
    }

    /**
=======
>>>>>>> pantheon-drops-8/master
     * Set subtitle
     *
     * @param  string $value
     * @return Entry
     * @throws Writer\Exception\InvalidArgumentException
     */
    public function setItunesSubtitle($value)
    {
        if ($this->stringWrapper->strlen($value) > 255) {
            throw new Writer\Exception\InvalidArgumentException('invalid parameter: "subtitle" may only'
            . ' contain a maximum of 255 characters');
        }
        $this->data['subtitle'] = $value;
        return $this;
    }

    /**
     * Set summary
     *
     * @param  string $value
     * @return Entry
     * @throws Writer\Exception\InvalidArgumentException
     */
    public function setItunesSummary($value)
    {
        if ($this->stringWrapper->strlen($value) > 4000) {
            throw new Writer\Exception\InvalidArgumentException('invalid parameter: "summary" may only'
            . ' contain a maximum of 4000 characters');
        }
        $this->data['summary'] = $value;
        return $this;
    }

    /**
<<<<<<< HEAD
     * Set entry image (icon)
     *
     * @param  string $value
     * @return Entry
     * @throws Writer\Exception\InvalidArgumentException
     */
    public function setItunesImage($value)
    {
        if (! is_string($value) || ! Uri::factory($value)->isValid()) {
            throw new Writer\Exception\InvalidArgumentException(
                'invalid parameter: "image" may only  be a valid URI/IRI'
            );
        }

        if (! in_array(substr($value, -3), ['jpg', 'png'])) {
            throw new Writer\Exception\InvalidArgumentException(
                'invalid parameter: "image" may only use file extension "jpg"'
                . ' or "png" which must be the last three characters of the URI'
                . ' (i.e. no query string or fragment)'
            );
        }

        $this->data['image'] = $value;
        return $this;
    }

    /**
     * Set the episode number
     *
     * @param int $number
     * @return self
     * @throws Writer\Exception\InvalidArgumentException
     */
    public function setItunesEpisode($number)
    {
        if (! is_numeric($number) || is_float($number)) {
            throw new Writer\Exception\InvalidArgumentException(sprintf(
                'invalid parameter: "number" may only be an integer; received %s',
                is_object($number) ? get_class($number) : gettype($number)
            ));
        }

        $this->data['episode'] = (int) $number;

        return $this;
    }

    /**
     * Set the episode type
     *
     * @param string $type One of "full", "trailer", or "bonus".
     * @return self
     * @throws Writer\Exception\InvalidArgumentException
     */
    public function setItunesEpisodeType($type)
    {
        $validTypes = ['full', 'trailer', 'bonus'];
        if (! in_array($type, $validTypes, true)) {
            throw new Writer\Exception\InvalidArgumentException(sprintf(
                'invalid parameter: "episodeType" MUST be one of the strings [%s]; received %s',
                implode(', ', $validTypes),
                is_object($type) ? get_class($type) : var_export($type, true)
            ));
        }

        $this->data['episodeType'] = $type;

        return $this;
    }

    /**
     * Set the status of closed captioning
     *
     * @param bool $status
     * @return self
     * @throws Writer\Exception\InvalidArgumentException
     */
    public function setItunesIsClosedCaptioned($status)
    {
        if (! is_bool($status)) {
            throw new Writer\Exception\InvalidArgumentException(sprintf(
                'invalid parameter: "isClosedCaptioned" MUST be a boolean; received %s',
                is_object($status) ? get_class($status) : var_export($status, true)
            ));
        }

        if (! $status) {
            return $this;
        }

        $this->data['isClosedCaptioned'] = true;

        return $this;
    }

    /**
     * Set the season number to which the episode belongs
     *
     * @param int $number
     * @return self
     * @throws Writer\Exception\InvalidArgumentException
     */
    public function setItunesSeason($number)
    {
        if (! is_numeric($number) || is_float($number)) {
            throw new Writer\Exception\InvalidArgumentException(sprintf(
                'invalid parameter: "season" may only be an integer; received %s',
                is_object($number) ? get_class($number) : gettype($number)
            ));
        }

        $this->data['season'] = (int) $number;

        return $this;
    }

    /**
=======
>>>>>>> pantheon-drops-8/master
     * Overloading to itunes specific setters
     *
     * @param  string $method
     * @param  array $params
     * @throws Writer\Exception\BadMethodCallException
     * @return mixed
     */
    public function __call($method, array $params)
    {
        $point = lcfirst(substr($method, 9));
<<<<<<< HEAD
        if (! method_exists($this, 'setItunes' . ucfirst($point))
            && ! method_exists($this, 'addItunes' . ucfirst($point))
=======
        if (!method_exists($this, 'setItunes' . ucfirst($point))
            && !method_exists($this, 'addItunes' . ucfirst($point))
>>>>>>> pantheon-drops-8/master
        ) {
            throw new Writer\Exception\BadMethodCallException(
                'invalid method: ' . $method
            );
        }
<<<<<<< HEAD
        if (! array_key_exists($point, $this->data)
=======
        if (!array_key_exists($point, $this->data)
>>>>>>> pantheon-drops-8/master
            || empty($this->data[$point])
        ) {
            return;
        }
        return $this->data[$point];
    }
}
