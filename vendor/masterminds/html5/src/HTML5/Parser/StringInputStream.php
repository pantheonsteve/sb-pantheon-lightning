<?php
/**
 * Loads a string to be parsed.
 */
<<<<<<< HEAD

=======
>>>>>>> pantheon-drops-8/master
namespace Masterminds\HTML5\Parser;

/*
 *
* Based on code from html5lib:

Copyright 2009 Geoffrey Sneddon <http://gsnedders.com/>

Permission is hereby granted, free of charge, to any person obtaining a
copy of this software and associated documentation files (the
    "Software"), to deal in the Software without restriction, including
without limitation the rights to use, copy, modify, merge, publish,
distribute, sublicense, and/or sell copies of the Software, and to
permit persons to whom the Software is furnished to do so, subject to
the following conditions:

The above copyright notice and this permission notice shall be included
in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS
OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.
IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY
CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT,
TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE
SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

*/

// Some conventions:
// - /* */ indicates verbatim text from the HTML 5 specification
//   MPB: Not sure which version of the spec. Moving from HTML5lib to
//   HTML5-PHP, I have been using this version:
//   http://www.w3.org/TR/2012/CR-html5-20121217/Overview.html#contents
//
// - // indicates regular comments

<<<<<<< HEAD
/**
 * @deprecated since 2.4, to remove in 3.0. Use a string in the scanner instead.
 */
class StringInputStream implements InputStream
{
=======
class StringInputStream implements InputStream
{

>>>>>>> pantheon-drops-8/master
    /**
     * The string data we're parsing.
     */
    private $data;

    /**
<<<<<<< HEAD
     * The current integer byte position we are in $data.
=======
     * The current integer byte position we are in $data
>>>>>>> pantheon-drops-8/master
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

    /**
     * Create a new InputStream wrapper.
     *
<<<<<<< HEAD
     * @param string $data     Data to parse.
     * @param string $encoding The encoding to use for the data.
     * @param string $debug    A fprintf format to use to echo the data on stdout.
=======
     * @param $data Data
     *            to parse
>>>>>>> pantheon-drops-8/master
     */
    public function __construct($data, $encoding = 'UTF-8', $debug = '')
    {
        $data = UTF8Utils::convertToUTF8($data, $encoding);
<<<<<<< HEAD
        if ($debug) {
            fprintf(STDOUT, $debug, $data, strlen($data));
        }

        // There is good reason to question whether it makes sense to
        // do this here, since most of these checks are done during
        // parsing, and since this check doesn't actually *do* anything.
        $this->errors = UTF8Utils::checkForIllegalCodepoints($data);
=======
        if ($debug)
            fprintf(STDOUT, $debug, $data, strlen($data));

            // There is good reason to question whether it makes sense to
            // do this here, since most of these checks are done during
            // parsing, and since this check doesn't actually *do* anything.
        $this->errors = UTF8Utils::checkForIllegalCodepoints($data);
        // if (!empty($e)) {
        // throw new ParseError("UTF-8 encoding issues: " . implode(', ', $e));
        // }
>>>>>>> pantheon-drops-8/master

        $data = $this->replaceLinefeeds($data);

        $this->data = $data;
        $this->char = 0;
        $this->EOF = strlen($data);
    }

<<<<<<< HEAD
    public function __toString()
    {
        return $this->data;
    }

=======
>>>>>>> pantheon-drops-8/master
    /**
     * Replace linefeed characters according to the spec.
     */
    protected function replaceLinefeeds($data)
    {
        /*
<<<<<<< HEAD
         * U+000D CARRIAGE RETURN (CR) characters and U+000A LINE FEED (LF) characters are treated specially.
         * Any CR characters that are followed by LF characters must be removed, and any CR characters not
         * followed by LF characters must be converted to LF characters. Thus, newlines in HTML DOMs are
         * represented by LF characters, and there are never any CR characters in the input to the tokenization
         * stage.
=======
         * U+000D CARRIAGE RETURN (CR) characters and U+000A LINE FEED (LF) characters are treated specially. Any CR characters that are followed by LF characters must be removed, and any CR characters not followed by LF characters must be converted to LF characters. Thus, newlines in HTML DOMs are represented by LF characters, and there are never any CR characters in the input to the tokenization stage.
>>>>>>> pantheon-drops-8/master
         */
        $crlfTable = array(
            "\0" => "\xEF\xBF\xBD",
            "\r\n" => "\n",
<<<<<<< HEAD
            "\r" => "\n",
=======
            "\r" => "\n"
>>>>>>> pantheon-drops-8/master
        );

        return strtr($data, $crlfTable);
    }

    /**
     * Returns the current line that the tokenizer is at.
     */
    public function currentLine()
    {
<<<<<<< HEAD
        if (empty($this->EOF) || 0 === $this->char) {
=======
        if (empty($this->EOF) || $this->char == 0) {
>>>>>>> pantheon-drops-8/master
            return 1;
        }
        // Add one to $this->char because we want the number for the next
        // byte to be processed.
        return substr_count($this->data, "\n", 0, min($this->char, $this->EOF)) + 1;
    }

    /**
<<<<<<< HEAD
     * @deprecated
     */
    public function getCurrentLine()
    {
        return $this->currentLine();
=======
     *
     * @deprecated
     *
     */
    public function getCurrentLine()
    {
        return currentLine();
>>>>>>> pantheon-drops-8/master
    }

    /**
     * Returns the current column of the current line that the tokenizer is at.
<<<<<<< HEAD
=======
     *
>>>>>>> pantheon-drops-8/master
     * Newlines are column 0. The first char after a newline is column 1.
     *
     * @return int The column number.
     */
    public function columnOffset()
    {
        // Short circuit for the first char.
<<<<<<< HEAD
        if (0 === $this->char) {
=======
        if ($this->char == 0) {
>>>>>>> pantheon-drops-8/master
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
<<<<<<< HEAD
        if (false !== $lastLine) {
=======
        if ($lastLine !== false) {
>>>>>>> pantheon-drops-8/master
            $findLengthOf = substr($this->data, $lastLine + 1, $this->char - 1 - $lastLine);
        } else {
            // After a newline.
            $findLengthOf = substr($this->data, 0, $this->char);
        }

        return UTF8Utils::countChars($findLengthOf);
    }

    /**
<<<<<<< HEAD
     * @deprecated
=======
     *
     * @deprecated
     *
>>>>>>> pantheon-drops-8/master
     */
    public function getColumnOffset()
    {
        return $this->columnOffset();
    }

    /**
     * Get the current character.
     *
     * @return string The current character.
     */
    public function current()
    {
        return $this->data[$this->char];
    }

    /**
     * Advance the pointer.
     * This is part of the Iterator interface.
     */
    public function next()
    {
<<<<<<< HEAD
        ++$this->char;
=======
        $this->char ++;
>>>>>>> pantheon-drops-8/master
    }

    /**
     * Rewind to the start of the string.
     */
    public function rewind()
    {
        $this->char = 0;
    }

    /**
     * Is the current pointer location valid.
     *
<<<<<<< HEAD
     * @return bool Whether the current pointer location is valid.
     */
    public function valid()
    {
        return $this->char < $this->EOF;
=======
     * @return bool Is the current pointer location valid.
     */
    public function valid()
    {
        if ($this->char < $this->EOF) {
            return true;
        }

        return false;
>>>>>>> pantheon-drops-8/master
    }

    /**
     * Get all characters until EOF.
     *
     * This reads to the end of the file, and sets the read marker at the
     * end of the file.
     *
<<<<<<< HEAD
     * Note this performs bounds checking.
     *
     * @return string Returns the remaining text. If called when the InputStream is
     *                already exhausted, it returns an empty string.
=======
     * @note This performs bounds checking
     *
     * @return string Returns the remaining text. If called when the InputStream is
     *         already exhausted, it returns an empty string.
>>>>>>> pantheon-drops-8/master
     */
    public function remainingChars()
    {
        if ($this->char < $this->EOF) {
            $data = substr($this->data, $this->char);
            $this->char = $this->EOF;

            return $data;
        }

        return ''; // false;
    }

    /**
     * Read to a particular match (or until $max bytes are consumed).
     *
     * This operates on byte sequences, not characters.
     *
     * Matches as far as possible until we reach a certain set of bytes
     * and returns the matched substring.
     *
<<<<<<< HEAD
     * @param string $bytes Bytes to match.
     * @param int    $max   Maximum number of bytes to scan.
     *
     * @return mixed Index or false if no match is found. You should use strong
     *               equality when checking the result, since index could be 0.
=======
     * @param string $bytes
     *            Bytes to match.
     * @param int $max
     *            Maximum number of bytes to scan.
     * @return mixed Index or false if no match is found. You should use strong
     *         equality when checking the result, since index could be 0.
>>>>>>> pantheon-drops-8/master
     */
    public function charsUntil($bytes, $max = null)
    {
        if ($this->char >= $this->EOF) {
            return false;
        }

<<<<<<< HEAD
        if (0 === $max || $max) {
=======
        if ($max === 0 || $max) {
>>>>>>> pantheon-drops-8/master
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
<<<<<<< HEAD
     * @param string $bytes A mask of bytes to match. If ANY byte in this mask matches the
     *                      current char, the pointer advances and the char is part of the
     *                      substring.
     * @param int    $max   The max number of chars to read.
     *
     * @return string
=======
     * @param string $bytes
     *            A mask of bytes to match. If ANY byte in this mask matches the
     *            current char, the pointer advances and the char is part of the
     *            substring.
     * @param int $max
     *            The max number of chars to read.
>>>>>>> pantheon-drops-8/master
     */
    public function charsWhile($bytes, $max = null)
    {
        if ($this->char >= $this->EOF) {
            return false;
        }

<<<<<<< HEAD
        if (0 === $max || $max) {
=======
        if ($max === 0 || $max) {
>>>>>>> pantheon-drops-8/master
            $len = strspn($this->data, $bytes, $this->char, $max);
        } else {
            $len = strspn($this->data, $bytes, $this->char);
        }
        $string = (string) substr($this->data, $this->char, $len);
        $this->char += $len;

        return $string;
    }

    /**
     * Unconsume characters.
     *
<<<<<<< HEAD
     * @param int $howMany The number of characters to unconsume.
=======
     * @param int $howMany
     *            The number of characters to unconsume.
>>>>>>> pantheon-drops-8/master
     */
    public function unconsume($howMany = 1)
    {
        if (($this->char - $howMany) >= 0) {
<<<<<<< HEAD
            $this->char -= $howMany;
=======
            $this->char = $this->char - $howMany;
>>>>>>> pantheon-drops-8/master
        }
    }

    /**
     * Look ahead without moving cursor.
     */
    public function peek()
    {
        if (($this->char + 1) <= $this->EOF) {
            return $this->data[$this->char + 1];
        }

        return false;
    }

    public function key()
    {
        return $this->char;
    }
}
