<?php
<<<<<<< HEAD

namespace Masterminds\HTML5\Parser;

use Masterminds\HTML5\Exception;

/**
 * The scanner scans over a given data input to react appropriately to characters.
 */
class Scanner
{
    const CHARS_HEX = 'abcdefABCDEF01234567890';
    const CHARS_ALNUM = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ01234567890';
    const CHARS_ALPHA = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    /**
     * The string data we're parsing.
     */
    private $data;

    /**
     * The current integer byte position we are in $data.
     */
    private $char;

    /**
     * Length of $data; when $char === $data, we are at the end-of-file.
     */
    private $EOF;

    /**
     * Parse errors.
     */
    public $errors = array();
=======
namespace Masterminds\HTML5\Parser;

/**
 * The scanner.
 *
 * This scans over an input stream.
 */
class Scanner
{

    const CHARS_HEX = 'abcdefABCDEF01234567890';

    const CHARS_ALNUM = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ01234567890';

    const CHARS_ALPHA = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    protected $is;

    // Flipping this to true will give minisculely more debugging info.
    public $debug = false;
>>>>>>> pantheon-drops-8/master

    /**
     * Create a new Scanner.
     *
<<<<<<< HEAD
     * @param string $data     Data to parse.
     * @param string $encoding The encoding to use for the data.
     *
     * @throws Exception If the given data cannot be encoded to UTF-8.
     */
    public function __construct($data, $encoding = 'UTF-8')
    {
        if ($data instanceof InputStream) {
            @trigger_error('InputStream objects are deprecated since version 2.4 and will be removed in 3.0. Use strings instead.', E_USER_DEPRECATED);
            $data = (string) $data;
        }

        $data = UTF8Utils::convertToUTF8($data, $encoding);

        // There is good reason to question whether it makes sense to
        // do this here, since most of these checks are done during
        // parsing, and since this check doesn't actually *do* anything.
        $this->errors = UTF8Utils::checkForIllegalCodepoints($data);

        $data = $this->replaceLinefeeds($data);

        $this->data = $data;
        $this->char = 0;
        $this->EOF = strlen($data);
    }

    /**
     * Check if upcomming chars match the given sequence.
     *
     * This will read the stream for the $sequence. If it's
     * found, this will return true. If not, return false.
     * Since this unconsumes any chars it reads, the caller
     * will still need to read the next sequence, even if
     * this returns true.
     *
     * Example: $this->scanner->sequenceMatches('</script>') will
     * see if the input stream is at the start of a
     * '</script>' string.
     *
     * @param string $sequence
     * @param bool   $caseSensitive
     *
     * @return bool
     */
    public function sequenceMatches($sequence, $caseSensitive = true)
    {
        $portion = substr($this->data, $this->char, strlen($sequence));

        return $caseSensitive ? $portion === $sequence : 0 === strcasecmp($portion, $sequence);
=======
     * @param \Masterminds\HTML5\Parser\InputStream $input
     *            An InputStream to be scanned.
     */
    public function __construct($input)
    {
        $this->is = $input;
>>>>>>> pantheon-drops-8/master
    }

    /**
     * Get the current position.
     *
     * @return int The current intiger byte position.
     */
    public function position()
    {
<<<<<<< HEAD
        return $this->char;
=======
        return $this->is->key();
>>>>>>> pantheon-drops-8/master
    }

    /**
     * Take a peek at the next character in the data.
     *
     * @return string The next character.
     */
    public function peek()
    {
<<<<<<< HEAD
        if (($this->char + 1) <= $this->EOF) {
            return $this->data[$this->char + 1];
        }

        return false;
=======
        return $this->is->peek();
>>>>>>> pantheon-drops-8/master
    }

    /**
     * Get the next character.
<<<<<<< HEAD
=======
     *
>>>>>>> pantheon-drops-8/master
     * Note: This advances the pointer.
     *
     * @return string The next character.
     */
    public function next()
    {
<<<<<<< HEAD
        ++$this->char;

        if ($this->char < $this->EOF) {
            return $this->data[$this->char];
=======
        $this->is->next();
        if ($this->is->valid()) {
            if ($this->debug)
                fprintf(STDOUT, "> %s\n", $this->is->current());
            return $this->is->current();
>>>>>>> pantheon-drops-8/master
        }

        return false;
    }

    /**
     * Get the current character.
<<<<<<< HEAD
=======
     *
>>>>>>> pantheon-drops-8/master
     * Note, this does not advance the pointer.
     *
     * @return string The current character.
     */
    public function current()
    {
<<<<<<< HEAD
        if ($this->char < $this->EOF) {
            return $this->data[$this->char];
=======
        if ($this->is->valid()) {
            return $this->is->current();
>>>>>>> pantheon-drops-8/master
        }

        return false;
    }

    /**
     * Silently consume N chars.
<<<<<<< HEAD
     *
     * @param int $count
     */
    public function consume($count = 1)
    {
        $this->char += $count;
=======
     */
    public function consume($count = 1)
    {
        for ($i = 0; $i < $count; ++ $i) {
            $this->next();
        }
>>>>>>> pantheon-drops-8/master
    }

    /**
     * Unconsume some of the data.
     * This moves the data pointer backwards.
     *
<<<<<<< HEAD
     * @param int $howMany The number of characters to move the pointer back.
     */
    public function unconsume($howMany = 1)
    {
        if (($this->char - $howMany) >= 0) {
            $this->char -= $howMany;
        }
=======
     * @param int $howMany
     *            The number of characters to move the pointer back.
     */
    public function unconsume($howMany = 1)
    {
        $this->is->unconsume($howMany);
>>>>>>> pantheon-drops-8/master
    }

    /**
     * Get the next group of that contains hex characters.
<<<<<<< HEAD
=======
     *
>>>>>>> pantheon-drops-8/master
     * Note, along with getting the characters the pointer in the data will be
     * moved as well.
     *
     * @return string The next group that is hex characters.
     */
    public function getHex()
    {
<<<<<<< HEAD
        return $this->doCharsWhile(static::CHARS_HEX);
=======
        return $this->is->charsWhile(static::CHARS_HEX);
>>>>>>> pantheon-drops-8/master
    }

    /**
     * Get the next group of characters that are ASCII Alpha characters.
<<<<<<< HEAD
=======
     *
>>>>>>> pantheon-drops-8/master
     * Note, along with getting the characters the pointer in the data will be
     * moved as well.
     *
     * @return string The next group of ASCII alpha characters.
     */
    public function getAsciiAlpha()
    {
<<<<<<< HEAD
        return $this->doCharsWhile(static::CHARS_ALPHA);
=======
        return $this->is->charsWhile(static::CHARS_ALPHA);
>>>>>>> pantheon-drops-8/master
    }

    /**
     * Get the next group of characters that are ASCII Alpha characters and numbers.
<<<<<<< HEAD
=======
     *
>>>>>>> pantheon-drops-8/master
     * Note, along with getting the characters the pointer in the data will be
     * moved as well.
     *
     * @return string The next group of ASCII alpha characters and numbers.
     */
    public function getAsciiAlphaNum()
    {
<<<<<<< HEAD
        return $this->doCharsWhile(static::CHARS_ALNUM);
=======
        return $this->is->charsWhile(static::CHARS_ALNUM);
>>>>>>> pantheon-drops-8/master
    }

    /**
     * Get the next group of numbers.
<<<<<<< HEAD
=======
     *
>>>>>>> pantheon-drops-8/master
     * Note, along with getting the characters the pointer in the data will be
     * moved as well.
     *
     * @return string The next group of numbers.
     */
    public function getNumeric()
    {
<<<<<<< HEAD
        return $this->doCharsWhile('0123456789');
=======
        return $this->is->charsWhile('0123456789');
>>>>>>> pantheon-drops-8/master
    }

    /**
     * Consume whitespace.
<<<<<<< HEAD
     * Whitespace in HTML5 is: formfeed, tab, newline, space.
     *
     * @return int The length of the matched whitespaces.
     */
    public function whitespace()
    {
        if ($this->char >= $this->EOF) {
            return false;
        }

        $len = strspn($this->data, "\n\t\f ", $this->char);

        $this->char += $len;

        return $len;
=======
     *
     * Whitespace in HTML5 is: formfeed, tab, newline, space.
     */
    public function whitespace()
    {
        return $this->is->charsWhile("\n\t\f ");
>>>>>>> pantheon-drops-8/master
    }

    /**
     * Returns the current line that is being consumed.
     *
     * @return int The current line number.
     */
    public function currentLine()
    {
<<<<<<< HEAD
        if (empty($this->EOF) || 0 === $this->char) {
            return 1;
        }

        // Add one to $this->char because we want the number for the next
        // byte to be processed.
        return substr_count($this->data, "\n", 0, min($this->char, $this->EOF)) + 1;
=======
        return $this->is->currentLine();
>>>>>>> pantheon-drops-8/master
    }

    /**
     * Read chars until something in the mask is encountered.
<<<<<<< HEAD
     *
     * @param string $mask
     *
     * @return mixed
     */
    public function charsUntil($mask)
    {
        return $this->doCharsUntil($mask);
=======
     */
    public function charsUntil($mask)
    {
        return $this->is->charsUntil($mask);
>>>>>>> pantheon-drops-8/master
    }

    /**
     * Read chars as long as the mask matches.
<<<<<<< HEAD
     *
     * @param string $mask
     *
     * @return int
     */
    public function charsWhile($mask)
    {
        return $this->doCharsWhile($mask);
=======
     */
    public function charsWhile($mask)
    {
        return $this->is->charsWhile($mask);
>>>>>>> pantheon-drops-8/master
    }

    /**
     * Returns the current column of the current line that the tokenizer is at.
     *
     * Newlines are column 0. The first char after a newline is column 1.
     *
     * @return int The column number.
     */
    public function columnOffset()
    {
<<<<<<< HEAD
        // Short circuit for the first char.
        if (0 === $this->char) {
            return 0;
        }

        // strrpos is weird, and the offset needs to be negative for what we
        // want (i.e., the last \n before $this->char). This needs to not have
        // one (to make it point to the next character, the one we want the
        // position of) added to it because strrpos's behaviour includes the
        // final offset byte.
        $backwardFrom = $this->char - 1 - strlen($this->data);
        $lastLine = strrpos($this->data, "\n", $backwardFrom);

        // However, for here we want the length up until the next byte to be
        // processed, so add one to the current byte ($this->char).
        if (false !== $lastLine) {
            $findLengthOf = substr($this->data, $lastLine + 1, $this->char - 1 - $lastLine);
        } else {
            // After a newline.
            $findLengthOf = substr($this->data, 0, $this->char);
        }

        return UTF8Utils::countChars($findLengthOf);
=======
        return $this->is->columnOffset();
>>>>>>> pantheon-drops-8/master
    }

    /**
     * Get all characters until EOF.
     *
     * This consumes characters until the EOF.
     *
     * @return int The number of characters remaining.
     */
    public function remainingChars()
    {
<<<<<<< HEAD
        if ($this->char < $this->EOF) {
            $data = substr($this->data, $this->char);
            $this->char = $this->EOF;

            return $data;
        }

        return ''; // false;
    }

    /**
     * Replace linefeed characters according to the spec.
     *
     * @param $data
     *
     * @return string
     */
    private function replaceLinefeeds($data)
    {
        /*
         * U+000D CARRIAGE RETURN (CR) characters and U+000A LINE FEED (LF) characters are treated specially.
         * Any CR characters that are followed by LF characters must be removed, and any CR characters not
         * followed by LF characters must be converted to LF characters. Thus, newlines in HTML DOMs are
         * represented by LF characters, and there are never any CR characters in the input to the tokenization
         * stage.
         */
        $crlfTable = array(
            "\0" => "\xEF\xBF\xBD",
            "\r\n" => "\n",
            "\r" => "\n",
        );

        return strtr($data, $crlfTable);
    }

    /**
     * Read to a particular match (or until $max bytes are consumed).
     *
     * This operates on byte sequences, not characters.
     *
     * Matches as far as possible until we reach a certain set of bytes
     * and returns the matched substring.
     *
     * @param string $bytes Bytes to match.
     * @param int    $max   Maximum number of bytes to scan.
     *
     * @return mixed Index or false if no match is found. You should use strong
     *               equality when checking the result, since index could be 0.
     */
    private function doCharsUntil($bytes, $max = null)
    {
        if ($this->char >= $this->EOF) {
            return false;
        }

        if (0 === $max || $max) {
            $len = strcspn($this->data, $bytes, $this->char, $max);
        } else {
            $len = strcspn($this->data, $bytes, $this->char);
        }

        $string = (string) substr($this->data, $this->char, $len);
        $this->char += $len;

        return $string;
    }

    /**
     * Returns the string so long as $bytes matches.
     *
     * Matches as far as possible with a certain set of bytes
     * and returns the matched substring.
     *
     * @param string $bytes A mask of bytes to match. If ANY byte in this mask matches the
     *                      current char, the pointer advances and the char is part of the
     *                      substring.
     * @param int    $max   The max number of chars to read.
     *
     * @return string
     */
    private function doCharsWhile($bytes, $max = null)
    {
        if ($this->char >= $this->EOF) {
            return false;
        }

        if (0 === $max || $max) {
            $len = strspn($this->data, $bytes, $this->char, $max);
        } else {
            $len = strspn($this->data, $bytes, $this->char);
        }

        $string = (string) substr($this->data, $this->char, $len);
        $this->char += $len;

        return $string;
=======
        return $this->is->remainingChars();
>>>>>>> pantheon-drops-8/master
    }
}
