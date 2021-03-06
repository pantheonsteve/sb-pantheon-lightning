<?php
<<<<<<< HEAD

=======
>>>>>>> pantheon-drops-8/master
namespace Masterminds\HTML5\Parser;

/**
 * Handles special-case rules for the DOM tree builder.
 *
 * Many tags have special rules that need to be accomodated on an
 * individual basis. This class handles those rules.
 *
 * See section 8.1.2.4 of the spec.
 *
 * @todo - colgroup and col special behaviors
 *       - body and head special behaviors
 */
class TreeBuildingRules
{
<<<<<<< HEAD
=======

>>>>>>> pantheon-drops-8/master
    protected static $tags = array(
        'li' => 1,
        'dd' => 1,
        'dt' => 1,
        'rt' => 1,
        'rp' => 1,
        'tr' => 1,
        'th' => 1,
        'td' => 1,
        'thead' => 1,
        'tfoot' => 1,
        'tbody' => 1,
        'table' => 1,
        'optgroup' => 1,
<<<<<<< HEAD
        'option' => 1,
    );

    /**
=======
        'option' => 1
    );

    /**
     * Build a new rules engine.
     *
     * @param \DOMDocument $doc
     *            The DOM document to use for evaluation and modification.
     */
    public function __construct($doc)
    {
        $this->doc = $doc;
    }

    /**
>>>>>>> pantheon-drops-8/master
     * Returns true if the given tagname has special processing rules.
     */
    public function hasRules($tagname)
    {
        return isset(static::$tags[$tagname]);
    }

    /**
     * Evaluate the rule for the current tag name.
     *
     * This may modify the existing DOM.
     *
     * @return \DOMElement The new Current DOM element.
     */
    public function evaluate($new, $current)
    {
        switch ($new->tagName) {
            case 'li':
                return $this->handleLI($new, $current);
            case 'dt':
            case 'dd':
                return $this->handleDT($new, $current);
            case 'rt':
            case 'rp':
                return $this->handleRT($new, $current);
            case 'optgroup':
                return $this->closeIfCurrentMatches($new, $current, array(
<<<<<<< HEAD
                    'optgroup',
=======
                    'optgroup'
>>>>>>> pantheon-drops-8/master
                ));
            case 'option':
                return $this->closeIfCurrentMatches($new, $current, array(
                    'option',
                ));
            case 'tr':
                return $this->closeIfCurrentMatches($new, $current, array(
<<<<<<< HEAD
                    'tr',
=======
                    'tr'
>>>>>>> pantheon-drops-8/master
                ));
            case 'td':
            case 'th':
                return $this->closeIfCurrentMatches($new, $current, array(
                    'th',
<<<<<<< HEAD
                    'td',
=======
                    'td'
>>>>>>> pantheon-drops-8/master
                ));
            case 'tbody':
            case 'thead':
            case 'tfoot':
            case 'table': // Spec isn't explicit about this, but it's necessary.

                return $this->closeIfCurrentMatches($new, $current, array(
                    'thead',
                    'tfoot',
<<<<<<< HEAD
                    'tbody',
=======
                    'tbody'
>>>>>>> pantheon-drops-8/master
                ));
        }

        return $current;
    }

    protected function handleLI($ele, $current)
    {
        return $this->closeIfCurrentMatches($ele, $current, array(
<<<<<<< HEAD
            'li',
=======
            'li'
>>>>>>> pantheon-drops-8/master
        ));
    }

    protected function handleDT($ele, $current)
    {
        return $this->closeIfCurrentMatches($ele, $current, array(
            'dt',
<<<<<<< HEAD
            'dd',
=======
            'dd'
>>>>>>> pantheon-drops-8/master
        ));
    }

    protected function handleRT($ele, $current)
    {
        return $this->closeIfCurrentMatches($ele, $current, array(
            'rt',
<<<<<<< HEAD
            'rp',
=======
            'rp'
>>>>>>> pantheon-drops-8/master
        ));
    }

    protected function closeIfCurrentMatches($ele, $current, $match)
    {
<<<<<<< HEAD
        if (in_array($current->tagName, $match, true)) {
=======
        $tname = $current->tagName;
        if (in_array($current->tagName, $match)) {
>>>>>>> pantheon-drops-8/master
            $current->parentNode->appendChild($ele);
        } else {
            $current->appendChild($ele);
        }

        return $ele;
    }
}
