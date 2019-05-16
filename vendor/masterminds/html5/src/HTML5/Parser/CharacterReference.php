<?php
<<<<<<< HEAD

=======
>>>>>>> pantheon-drops-8/master
namespace Masterminds\HTML5\Parser;

use Masterminds\HTML5\Entities;

/**
 * Manage entity references.
 *
<<<<<<< HEAD
 * This is a simple resolver for HTML5 character reference entitites. See Entities for the list of supported entities.
 */
class CharacterReference
{
=======
 * This is a simple resolver for HTML5 character reference entitites.
 * See \Masterminds\HTML5\Entities for the list of supported entities.
 */
class CharacterReference
{

>>>>>>> pantheon-drops-8/master
    protected static $numeric_mask = array(
        0x0,
        0x2FFFF,
        0,
<<<<<<< HEAD
        0xFFFF,
    );

    /**
     * Given a name (e.g. 'amp'), lookup the UTF-8 character ('&').
     *
     * @param string $name The name to look up.
     *
=======
        0xFFFF
    );

    /**
     * Given a name (e.g.
     * 'amp'), lookup the UTF-8 character ('&')
     *
     * @param string $name
     *            The name to look up.
>>>>>>> pantheon-drops-8/master
     * @return string The character sequence. In UTF-8 this may be more than one byte.
     */
    public static function lookupName($name)
    {
        // Do we really want to return NULL here? or FFFD
        return isset(Entities::$byName[$name]) ? Entities::$byName[$name] : null;
    }

    /**
<<<<<<< HEAD
     * Given a decimal number, return the UTF-8 character.
     *
     * @param $int
     *
     * @return false|string|string[]|null
=======
     * Given a Unicode codepoint, return the UTF-8 character.
     *
     * (NOT USED ANYWHERE)
     */
    /*
     * public static function lookupCode($codePoint) { return 'POINT'; }
     */

    /**
     * Given a decimal number, return the UTF-8 character.
>>>>>>> pantheon-drops-8/master
     */
    public static function lookupDecimal($int)
    {
        $entity = '&#' . $int . ';';
<<<<<<< HEAD

=======
>>>>>>> pantheon-drops-8/master
        // UNTESTED: This may fail on some planes. Couldn't find full documentation
        // on the value of the mask array.
        return mb_decode_numericentity($entity, static::$numeric_mask, 'utf-8');
    }

    /**
     * Given a hexidecimal number, return the UTF-8 character.
<<<<<<< HEAD
     *
     * @param $hexdec
     *
     * @return false|string|string[]|null
=======
>>>>>>> pantheon-drops-8/master
     */
    public static function lookupHex($hexdec)
    {
        return static::lookupDecimal(hexdec($hexdec));
    }
}
