<?php
/**
 * @file
 * The rules for generating output in the serializer.
 *
 * These output rules are likely to generate output similar to the document that
 * was parsed. It is not intended to output exactly the document that was parsed.
 */
<<<<<<< HEAD

=======
>>>>>>> pantheon-drops-8/master
namespace Masterminds\HTML5\Serializer;

use Masterminds\HTML5\Elements;

/**
 * Generate the output html5 based on element rules.
 */
<<<<<<< HEAD
class OutputRules implements RulesInterface
{
    /**
     * Defined in http://www.w3.org/TR/html51/infrastructure.html#html-namespace-0.
=======
class OutputRules implements \Masterminds\HTML5\Serializer\RulesInterface
{
    /**
     * Defined in http://www.w3.org/TR/html51/infrastructure.html#html-namespace-0
>>>>>>> pantheon-drops-8/master
     */
    const NAMESPACE_HTML = 'http://www.w3.org/1999/xhtml';

    const NAMESPACE_MATHML = 'http://www.w3.org/1998/Math/MathML';

    const NAMESPACE_SVG = 'http://www.w3.org/2000/svg';

    const NAMESPACE_XLINK = 'http://www.w3.org/1999/xlink';

    const NAMESPACE_XML = 'http://www.w3.org/XML/1998/namespace';

    const NAMESPACE_XMLNS = 'http://www.w3.org/2000/xmlns/';

    /**
<<<<<<< HEAD
     * Holds the HTML5 element names that causes a namespace switch.
=======
     * Holds the HTML5 element names that causes a namespace switch
>>>>>>> pantheon-drops-8/master
     *
     * @var array
     */
    protected $implicitNamespaces = array(
        self::NAMESPACE_HTML,
        self::NAMESPACE_SVG,
        self::NAMESPACE_MATHML,
        self::NAMESPACE_XML,
        self::NAMESPACE_XMLNS,
    );

    const IM_IN_HTML = 1;

    const IM_IN_SVG = 2;

    const IM_IN_MATHML = 3;

    /**
<<<<<<< HEAD
     * Used as cache to detect if is available ENT_HTML5.
     *
     * @var bool
=======
     * Used as cache to detect if is available ENT_HTML5
     * @var boolean
>>>>>>> pantheon-drops-8/master
     */
    private $hasHTML5 = false;

    protected $traverser;

    protected $encode = false;

    protected $out;

    protected $outputMode;

    private $xpath;

    protected $nonBooleanAttributes = array(
        /*
        array(
            'nodeNamespace'=>'http://www.w3.org/1999/xhtml',
            'attrNamespace'=>'http://www.w3.org/1999/xhtml',

            'nodeName'=>'img', 'nodeName'=>array('img', 'a'),
            'attrName'=>'alt', 'attrName'=>array('title', 'alt'),
        ),
        */
        array(
            'nodeNamespace' => 'http://www.w3.org/1999/xhtml',
            'attrName' => array('href',
                'hreflang',
                'http-equiv',
                'icon',
                'id',
                'keytype',
                'kind',
                'label',
                'lang',
                'language',
                'list',
                'maxlength',
                'media',
                'method',
                'name',
                'placeholder',
                'rel',
                'rows',
                'rowspan',
                'sandbox',
                'spellcheck',
                'scope',
                'seamless',
                'shape',
                'size',
                'sizes',
                'span',
                'src',
                'srcdoc',
                'srclang',
                'srcset',
                'start',
                'step',
                'style',
                'summary',
                'tabindex',
                'target',
                'title',
                'type',
                'value',
                'width',
                'border',
                'charset',
                'cite',
                'class',
                'code',
                'codebase',
                'color',
                'cols',
                'colspan',
                'content',
                'coords',
                'data',
                'datetime',
                'default',
                'dir',
                'dirname',
                'enctype',
                'for',
                'form',
                'formaction',
                'headers',
                'height',
                'accept',
                'accept-charset',
                'accesskey',
                'action',
                'align',
                'alt',
                'bgcolor',
            ),
        ),
        array(
            'nodeNamespace' => 'http://www.w3.org/1999/xhtml',
            'xpath' => 'starts-with(local-name(), \'data-\')',
        ),
    );

    const DOCTYPE = '<!DOCTYPE html>';

    public function __construct($output, $options = array())
    {
        if (isset($options['encode_entities'])) {
            $this->encode = $options['encode_entities'];
        }

        $this->outputMode = static::IM_IN_HTML;
        $this->out = $output;

        // If HHVM, see https://github.com/facebook/hhvm/issues/2727
        $this->hasHTML5 = defined('ENT_HTML5') && !defined('HHVM_VERSION');
    }
<<<<<<< HEAD

=======
>>>>>>> pantheon-drops-8/master
    public function addRule(array $rule)
    {
        $this->nonBooleanAttributes[] = $rule;
    }

<<<<<<< HEAD
    public function setTraverser(Traverser $traverser)
=======
    public function setTraverser(\Masterminds\HTML5\Serializer\Traverser $traverser)
>>>>>>> pantheon-drops-8/master
    {
        $this->traverser = $traverser;

        return $this;
    }

    public function document($dom)
    {
        $this->doctype();
        if ($dom->documentElement) {
            foreach ($dom->childNodes as $node) {
                $this->traverser->node($node);
            }
            $this->nl();
        }
    }

    protected function doctype()
    {
        $this->wr(static::DOCTYPE);
        $this->nl();
    }

    public function element($ele)
    {
        $name = $ele->tagName;

        // Per spec:
        // If the element has a declared namespace in the HTML, MathML or
        // SVG namespaces, we use the lname instead of the tagName.
        if ($this->traverser->isLocalElement($ele)) {
            $name = $ele->localName;
        }

        // If we are in SVG or MathML there is special handling.
        // Using if/elseif instead of switch because it's faster in PHP.
<<<<<<< HEAD
        if ('svg' == $name) {
            $this->outputMode = static::IM_IN_SVG;
            $name = Elements::normalizeSvgElement($name);
        } elseif ('math' == $name) {
=======
        if ($name == 'svg') {
            $this->outputMode = static::IM_IN_SVG;
            $name = Elements::normalizeSvgElement($name);
        } elseif ($name == 'math') {
>>>>>>> pantheon-drops-8/master
            $this->outputMode = static::IM_IN_MATHML;
        }

        $this->openTag($ele);
        if (Elements::isA($name, Elements::TEXT_RAW)) {
            foreach ($ele->childNodes as $child) {
                if ($child instanceof \DOMCharacterData) {
                    $this->wr($child->data);
                } elseif ($child instanceof \DOMElement) {
                    $this->element($child);
                }
            }
        } else {
            // Handle children.
            if ($ele->hasChildNodes()) {
                $this->traverser->children($ele->childNodes);
            }

            // Close out the SVG or MathML special handling.
<<<<<<< HEAD
            if ('svg' == $name || 'math' == $name) {
=======
            if ($name == 'svg' || $name == 'math') {
>>>>>>> pantheon-drops-8/master
                $this->outputMode = static::IM_IN_HTML;
            }
        }

        // If not unary, add a closing tag.
<<<<<<< HEAD
        if (!Elements::isA($name, Elements::VOID_TAG)) {
=======
        if (! Elements::isA($name, Elements::VOID_TAG)) {
>>>>>>> pantheon-drops-8/master
            $this->closeTag($ele);
        }
    }

    /**
     * Write a text node.
     *
<<<<<<< HEAD
     * @param \DOMText $ele The text node to write.
=======
     * @param \DOMText $ele
     *            The text node to write.
>>>>>>> pantheon-drops-8/master
     */
    public function text($ele)
    {
        if (isset($ele->parentNode) && isset($ele->parentNode->tagName) && Elements::isA($ele->parentNode->localName, Elements::TEXT_RAW)) {
            $this->wr($ele->data);
<<<<<<< HEAD

=======
>>>>>>> pantheon-drops-8/master
            return;
        }

        // FIXME: This probably needs some flags set.
        $this->wr($this->enc($ele->data));
    }

    public function cdata($ele)
    {
        // This encodes CDATA.
        $this->wr($ele->ownerDocument->saveXML($ele));
    }

    public function comment($ele)
    {
        // These produce identical output.
        // $this->wr('<!--')->wr($ele->data)->wr('-->');
        $this->wr($ele->ownerDocument->saveXML($ele));
    }

    public function processorInstruction($ele)
    {
        $this->wr('<?')
            ->wr($ele->target)
            ->wr(' ')
            ->wr($ele->data)
            ->wr('?>');
    }
<<<<<<< HEAD

    /**
     * Write the namespace attributes.
     *
     * @param \DOMNode $ele The element being written.
     */
    protected function namespaceAttrs($ele)
    {
        if (!$this->xpath || $this->xpath->document !== $ele->ownerDocument) {
            $this->xpath = new \DOMXPath($ele->ownerDocument);
        }

        foreach ($this->xpath->query('namespace::*[not(.=../../namespace::*)]', $ele) as $nsNode) {
=======
    /**
     * Write the namespace attributes
     *
     *
     * @param \DOMNode $ele
     *            The element being written.
     */
    protected function namespaceAttrs($ele)
    {
        if (!$this->xpath || $this->xpath->document !== $ele->ownerDocument){
            $this->xpath = new \DOMXPath($ele->ownerDocument);
        }

        foreach( $this->xpath->query('namespace::*[not(.=../../namespace::*)]', $ele ) as $nsNode ) {
>>>>>>> pantheon-drops-8/master
            if (!in_array($nsNode->nodeValue, $this->implicitNamespaces)) {
                $this->wr(' ')->wr($nsNode->nodeName)->wr('="')->wr($nsNode->nodeValue)->wr('"');
            }
        }
    }

    /**
     * Write the opening tag.
     *
     * Tags for HTML, MathML, and SVG are in the local name. Otherwise, use the
     * qualified name (8.3).
     *
<<<<<<< HEAD
     * @param \DOMNode $ele The element being written.
=======
     * @param \DOMNode $ele
     *            The element being written.
>>>>>>> pantheon-drops-8/master
     */
    protected function openTag($ele)
    {
        $this->wr('<')->wr($this->traverser->isLocalElement($ele) ? $ele->localName : $ele->tagName);

<<<<<<< HEAD
        $this->attrs($ele);
        $this->namespaceAttrs($ele);

=======

        $this->attrs($ele);
        $this->namespaceAttrs($ele);


>>>>>>> pantheon-drops-8/master
        if ($this->outputMode == static::IM_IN_HTML) {
            $this->wr('>');
        }         // If we are not in html mode we are in SVG, MathML, or XML embedded content.
        else {
            if ($ele->hasChildNodes()) {
                $this->wr('>');
            }             // If there are no children this is self closing.
            else {
                $this->wr(' />');
            }
        }
    }

    protected function attrs($ele)
    {
        // FIXME: Needs support for xml, xmlns, xlink, and namespaced elements.
<<<<<<< HEAD
        if (!$ele->hasAttributes()) {
=======
        if (! $ele->hasAttributes()) {
>>>>>>> pantheon-drops-8/master
            return $this;
        }

        // TODO: Currently, this always writes name="value", and does not do
        // value-less attributes.
        $map = $ele->attributes;
        $len = $map->length;
<<<<<<< HEAD
        for ($i = 0; $i < $len; ++$i) {
=======
        for ($i = 0; $i < $len; ++ $i) {
>>>>>>> pantheon-drops-8/master
            $node = $map->item($i);
            $val = $this->enc($node->value, true);

            // XXX: The spec says that we need to ensure that anything in
            // the XML, XMLNS, or XLink NS's should use the canonical
            // prefix. It seems that DOM does this for us already, but there
            // may be exceptions.
            $name = $node->nodeName;

            // Special handling for attributes in SVG and MathML.
            // Using if/elseif instead of switch because it's faster in PHP.
            if ($this->outputMode == static::IM_IN_SVG) {
                $name = Elements::normalizeSvgAttribute($name);
            } elseif ($this->outputMode == static::IM_IN_MATHML) {
                $name = Elements::normalizeMathMlAttribute($name);
            }

            $this->wr(' ')->wr($name);

<<<<<<< HEAD
            if ((isset($val) && '' !== $val) || $this->nonBooleanAttribute($node)) {
=======
            if ((isset($val) && $val !== '') || $this->nonBooleanAttribute($node)) {
>>>>>>> pantheon-drops-8/master
                $this->wr('="')->wr($val)->wr('"');
            }
        }
    }

<<<<<<< HEAD
    protected function nonBooleanAttribute(\DOMAttr $attr)
    {
        $ele = $attr->ownerElement;
        foreach ($this->nonBooleanAttributes as $rule) {
            if (isset($rule['nodeNamespace']) && $rule['nodeNamespace'] !== $ele->namespaceURI) {
                continue;
            }
            if (isset($rule['attNamespace']) && $rule['attNamespace'] !== $attr->namespaceURI) {
                continue;
            }
            if (isset($rule['nodeName']) && !is_array($rule['nodeName']) && $rule['nodeName'] !== $ele->localName) {
                continue;
            }
            if (isset($rule['nodeName']) && is_array($rule['nodeName']) && !in_array($ele->localName, $rule['nodeName'], true)) {
                continue;
            }
            if (isset($rule['attrName']) && !is_array($rule['attrName']) && $rule['attrName'] !== $attr->localName) {
                continue;
            }
            if (isset($rule['attrName']) && is_array($rule['attrName']) && !in_array($attr->localName, $rule['attrName'], true)) {
                continue;
            }
            if (isset($rule['xpath'])) {
                $xp = $this->getXPath($attr);
                if (isset($rule['prefixes'])) {
                    foreach ($rule['prefixes'] as $nsPrefix => $ns) {
                        $xp->registerNamespace($nsPrefix, $ns);
                    }
                }
                if (!$xp->evaluate($rule['xpath'], $attr)) {
=======

    protected function nonBooleanAttribute(\DOMAttr $attr)
    {
        $ele = $attr->ownerElement;
        foreach($this->nonBooleanAttributes as $rule){

            if(isset($rule['nodeNamespace']) && $rule['nodeNamespace']!==$ele->namespaceURI){
                continue;
            }
            if(isset($rule['attNamespace']) && $rule['attNamespace']!==$attr->namespaceURI){
                continue;
            }
            if(isset($rule['nodeName']) && !is_array($rule['nodeName']) && $rule['nodeName']!==$ele->localName){
                continue;
            }
            if(isset($rule['nodeName']) && is_array($rule['nodeName']) && !in_array($ele->localName, $rule['nodeName'], true)){
                continue;
            }
            if(isset($rule['attrName']) && !is_array($rule['attrName']) && $rule['attrName']!==$attr->localName){
                continue;
            }
            if(isset($rule['attrName']) && is_array($rule['attrName']) && !in_array($attr->localName, $rule['attrName'], true)){
                continue;
            }
            if(isset($rule['xpath'])){

                $xp = $this->getXPath($attr);
                if(isset($rule['prefixes'])){
                    foreach($rule['prefixes'] as $nsPrefix => $ns){
                        $xp->registerNamespace($nsPrefix, $ns);
                    }
                }
                if(!$xp->evaluate($rule['xpath'], $attr)){
>>>>>>> pantheon-drops-8/master
                    continue;
                }
            }

            return true;
        }

        return false;
    }

<<<<<<< HEAD
    private function getXPath(\DOMNode $node)
    {
        if (!$this->xpath) {
            $this->xpath = new \DOMXPath($node->ownerDocument);
        }

=======
    private function getXPath(\DOMNode $node){
        if(!$this->xpath){
            $this->xpath = new \DOMXPath($node->ownerDocument);
        }
>>>>>>> pantheon-drops-8/master
        return $this->xpath;
    }

    /**
     * Write the closing tag.
     *
     * Tags for HTML, MathML, and SVG are in the local name. Otherwise, use the
     * qualified name (8.3).
     *
<<<<<<< HEAD
     * @param \DOMNode $ele The element being written.
=======
     * @param \DOMNode $ele
     *            The element being written.
>>>>>>> pantheon-drops-8/master
     */
    protected function closeTag($ele)
    {
        if ($this->outputMode == static::IM_IN_HTML || $ele->hasChildNodes()) {
            $this->wr('</')->wr($this->traverser->isLocalElement($ele) ? $ele->localName : $ele->tagName)->wr('>');
        }
    }

    /**
     * Write to the output.
     *
<<<<<<< HEAD
     * @param string $text The string to put into the output
     *
     * @return $this
=======
     * @param string $text
     *            The string to put into the output.
     *
     * @return \Masterminds\HTML5\Serializer\Traverser $this so it can be used in chaining.
>>>>>>> pantheon-drops-8/master
     */
    protected function wr($text)
    {
        fwrite($this->out, $text);
<<<<<<< HEAD

=======
>>>>>>> pantheon-drops-8/master
        return $this;
    }

    /**
     * Write a new line character.
     *
<<<<<<< HEAD
     * @return $this
=======
     * @return \Masterminds\HTML5\Serializer\Traverser $this so it can be used in chaining.
>>>>>>> pantheon-drops-8/master
     */
    protected function nl()
    {
        fwrite($this->out, PHP_EOL);
<<<<<<< HEAD

=======
>>>>>>> pantheon-drops-8/master
        return $this;
    }

    /**
     * Encode text.
     *
     * When encode is set to false, the default value, the text passed in is
     * escaped per section 8.3 of the html5 spec. For details on how text is
     * escaped see the escape() method.
     *
     * When encoding is set to true the text is converted to named character
     * references where appropriate. Section 8.1.4 Character references of the
     * html5 spec refers to using named character references. This is useful for
     * characters that can't otherwise legally be used in the text.
     *
     * The named character references are listed in section 8.5.
     *
     * @see http://www.w3.org/TR/2013/CR-html5-20130806/syntax.html#named-character-references True encoding will turn all named character references into their entities.
     *      This includes such characters as +.# and many other common ones. By default
     *      encoding here will just escape &'<>".
     *
     *      Note, PHP 5.4+ has better html5 encoding.
     *
     * @todo Use the Entities class in php 5.3 to have html5 entities.
     *
<<<<<<< HEAD
     * @param string $text      Text to encode.
     * @param bool   $attribute True if we are encoding an attrubute, false otherwise.
=======
     * @param string $text
     *            text to encode.
     * @param boolean $attribute
     *            True if we are encoding an attrubute, false otherwise
>>>>>>> pantheon-drops-8/master
     *
     * @return string The encoded text.
     */
    protected function enc($text, $attribute = false)
    {
<<<<<<< HEAD
        // Escape the text rather than convert to named character references.
        if (!$this->encode) {
=======

        // Escape the text rather than convert to named character references.
        if (! $this->encode) {
>>>>>>> pantheon-drops-8/master
            return $this->escape($text, $attribute);
        }

        // If we are in PHP 5.4+ we can use the native html5 entity functionality to
        // convert the named character references.

        if ($this->hasHTML5) {
            return htmlentities($text, ENT_HTML5 | ENT_SUBSTITUTE | ENT_QUOTES, 'UTF-8', false);
        }         // If a version earlier than 5.4 html5 entities are not entirely handled.
        // This manually handles them.
        else {
<<<<<<< HEAD
            return strtr($text, HTML5Entities::$map);
=======
            return strtr($text, \Masterminds\HTML5\Serializer\HTML5Entities::$map);
>>>>>>> pantheon-drops-8/master
        }
    }

    /**
     * Escape test.
     *
     * According to the html5 spec section 8.3 Serializing HTML fragments, text
     * within tags that are not style, script, xmp, iframe, noembed, and noframes
     * need to be properly escaped.
     *
     * The & should be converted to &amp;, no breaking space unicode characters
     * converted to &nbsp;, when in attribute mode the " should be converted to
     * &quot;, and when not in attribute mode the < and > should be converted to
     * &lt; and &gt;.
     *
     * @see http://www.w3.org/TR/2013/CR-html5-20130806/syntax.html#escapingString
     *
<<<<<<< HEAD
     * @param string $text      Text to escape.
     * @param bool   $attribute True if we are escaping an attrubute, false otherwise.
     */
    protected function escape($text, $attribute = false)
    {
=======
     * @param string $text
     *            text to escape.
     * @param boolean $attribute
     *            True if we are escaping an attrubute, false otherwise
     */
    protected function escape($text, $attribute = false)
    {

>>>>>>> pantheon-drops-8/master
        // Not using htmlspecialchars because, while it does escaping, it doesn't
        // match the requirements of section 8.5. For example, it doesn't handle
        // non-breaking spaces.
        if ($attribute) {
            $replace = array(
                '"' => '&quot;',
                '&' => '&amp;',
<<<<<<< HEAD
                "\xc2\xa0" => '&nbsp;',
=======
                "\xc2\xa0" => '&nbsp;'
>>>>>>> pantheon-drops-8/master
            );
        } else {
            $replace = array(
                '<' => '&lt;',
                '>' => '&gt;',
                '&' => '&amp;',
<<<<<<< HEAD
                "\xc2\xa0" => '&nbsp;',
=======
                "\xc2\xa0" => '&nbsp;'
>>>>>>> pantheon-drops-8/master
            );
        }

        return strtr($text, $replace);
    }
}
