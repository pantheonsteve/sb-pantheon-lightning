<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/zf2 for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Zend\Feed\Writer\Extension\ITunes\Renderer;

use DOMDocument;
use DOMElement;
use Zend\Feed\Writer\Extension;

/**
*/
class Entry extends Extension\AbstractRenderer
{
    /**
     * Set to TRUE if a rendering method actually renders something. This
     * is used to prevent premature appending of a XML namespace declaration
     * until an element which requires it is actually appended.
     *
     * @var bool
     */
    protected $called = false;

    /**
     * Render entry
     *
     * @return void
     */
    public function render()
    {
        $this->_setAuthors($this->dom, $this->base);
        $this->_setBlock($this->dom, $this->base);
        $this->_setDuration($this->dom, $this->base);
<<<<<<< HEAD
        $this->_setImage($this->dom, $this->base);
        $this->_setExplicit($this->dom, $this->base);
        $this->_setKeywords($this->dom, $this->base);
        $this->_setTitle($this->dom, $this->base);
        $this->_setSubtitle($this->dom, $this->base);
        $this->_setSummary($this->dom, $this->base);
        $this->_setEpisode($this->dom, $this->base);
        $this->_setEpisodeType($this->dom, $this->base);
        $this->_setClosedCaptioned($this->dom, $this->base);
        $this->_setSeason($this->dom, $this->base);
=======
        $this->_setExplicit($this->dom, $this->base);
        $this->_setKeywords($this->dom, $this->base);
        $this->_setSubtitle($this->dom, $this->base);
        $this->_setSummary($this->dom, $this->base);
>>>>>>> pantheon-drops-8/master
        if ($this->called) {
            $this->_appendNamespaces();
        }
    }

    /**
     * Append namespaces to entry root
     *
     * @return void
     */
<<<<<<< HEAD
    // @codingStandardsIgnoreStart
    protected function _appendNamespaces()
    {
        // @codingStandardsIgnoreEnd
        $this->getRootElement()->setAttribute(
            'xmlns:itunes',
            'http://www.itunes.com/dtds/podcast-1.0.dtd'
        );
=======
    protected function _appendNamespaces()
    {
        $this->getRootElement()->setAttribute('xmlns:itunes',
            'http://www.itunes.com/dtds/podcast-1.0.dtd');
>>>>>>> pantheon-drops-8/master
    }

    /**
     * Set entry authors
     *
     * @param  DOMDocument $dom
     * @param  DOMElement $root
     * @return void
     */
<<<<<<< HEAD
    // @codingStandardsIgnoreStart
    protected function _setAuthors(DOMDocument $dom, DOMElement $root)
    {
        // @codingStandardsIgnoreEnd
        $authors = $this->getDataContainer()->getItunesAuthors();
        if (! $authors || empty($authors)) {
=======
    protected function _setAuthors(DOMDocument $dom, DOMElement $root)
    {
        $authors = $this->getDataContainer()->getItunesAuthors();
        if (!$authors || empty($authors)) {
>>>>>>> pantheon-drops-8/master
            return;
        }
        foreach ($authors as $author) {
            $el = $dom->createElement('itunes:author');
            $text = $dom->createTextNode($author);
            $el->appendChild($text);
            $root->appendChild($el);
            $this->called = true;
        }
    }

    /**
     * Set itunes block
     *
     * @param  DOMDocument $dom
     * @param  DOMElement $root
     * @return void
     */
<<<<<<< HEAD
    // @codingStandardsIgnoreStart
    protected function _setBlock(DOMDocument $dom, DOMElement $root)
    {
        // @codingStandardsIgnoreEnd
=======
    protected function _setBlock(DOMDocument $dom, DOMElement $root)
    {
>>>>>>> pantheon-drops-8/master
        $block = $this->getDataContainer()->getItunesBlock();
        if ($block === null) {
            return;
        }
        $el = $dom->createElement('itunes:block');
        $text = $dom->createTextNode($block);
        $el->appendChild($text);
        $root->appendChild($el);
        $this->called = true;
    }

    /**
     * Set entry duration
     *
     * @param  DOMDocument $dom
     * @param  DOMElement $root
     * @return void
     */
<<<<<<< HEAD
    // @codingStandardsIgnoreStart
    protected function _setDuration(DOMDocument $dom, DOMElement $root)
    {
        // @codingStandardsIgnoreEnd
        $duration = $this->getDataContainer()->getItunesDuration();
        if (! $duration) {
=======
    protected function _setDuration(DOMDocument $dom, DOMElement $root)
    {
        $duration = $this->getDataContainer()->getItunesDuration();
        if (!$duration) {
>>>>>>> pantheon-drops-8/master
            return;
        }
        $el = $dom->createElement('itunes:duration');
        $text = $dom->createTextNode($duration);
        $el->appendChild($text);
        $root->appendChild($el);
        $this->called = true;
    }

    /**
<<<<<<< HEAD
     * Set feed image (icon)
     *
     * @param  DOMDocument $dom
     * @param  DOMElement $root
     * @return void
     */
    // @codingStandardsIgnoreStart
    protected function _setImage(DOMDocument $dom, DOMElement $root)
    {
        // @codingStandardsIgnoreEnd
        $image = $this->getDataContainer()->getItunesImage();
        if (! $image) {
            return;
        }
        $el = $dom->createElement('itunes:image');
        $el->setAttribute('href', $image);
        $root->appendChild($el);
        $this->called = true;
    }

    /**
=======
>>>>>>> pantheon-drops-8/master
     * Set explicit flag
     *
     * @param  DOMDocument $dom
     * @param  DOMElement $root
     * @return void
     */
<<<<<<< HEAD
    // @codingStandardsIgnoreStart
    protected function _setExplicit(DOMDocument $dom, DOMElement $root)
    {
        // @codingStandardsIgnoreEnd
=======
    protected function _setExplicit(DOMDocument $dom, DOMElement $root)
    {
>>>>>>> pantheon-drops-8/master
        $explicit = $this->getDataContainer()->getItunesExplicit();
        if ($explicit === null) {
            return;
        }
        $el = $dom->createElement('itunes:explicit');
        $text = $dom->createTextNode($explicit);
        $el->appendChild($text);
        $root->appendChild($el);
        $this->called = true;
    }

    /**
     * Set entry keywords
     *
     * @param  DOMDocument $dom
     * @param  DOMElement $root
     * @return void
     */
<<<<<<< HEAD
    // @codingStandardsIgnoreStart
    protected function _setKeywords(DOMDocument $dom, DOMElement $root)
    {
        // @codingStandardsIgnoreEnd
        $keywords = $this->getDataContainer()->getItunesKeywords();
        if (! $keywords || empty($keywords)) {
=======
    protected function _setKeywords(DOMDocument $dom, DOMElement $root)
    {
        $keywords = $this->getDataContainer()->getItunesKeywords();
        if (!$keywords || empty($keywords)) {
>>>>>>> pantheon-drops-8/master
            return;
        }
        $el = $dom->createElement('itunes:keywords');
        $text = $dom->createTextNode(implode(',', $keywords));
        $el->appendChild($text);
        $root->appendChild($el);
        $this->called = true;
    }

    /**
<<<<<<< HEAD
     * Set entry title
     *
     * @param  DOMDocument $dom
     * @param  DOMElement $root
     * @return void
     */
    // @codingStandardsIgnoreStart
    protected function _setTitle(DOMDocument $dom, DOMElement $root)
    {
        // @codingStandardsIgnoreEnd
        $title = $this->getDataContainer()->getItunesTitle();
        if (! $title) {
            return;
        }
        $el = $dom->createElement('itunes:title');
        $text = $dom->createTextNode($title);
        $el->appendChild($text);
        $root->appendChild($el);
        $this->called = true;
    }

    /**
=======
>>>>>>> pantheon-drops-8/master
     * Set entry subtitle
     *
     * @param  DOMDocument $dom
     * @param  DOMElement $root
     * @return void
     */
<<<<<<< HEAD
    // @codingStandardsIgnoreStart
    protected function _setSubtitle(DOMDocument $dom, DOMElement $root)
    {
        // @codingStandardsIgnoreEnd
        $subtitle = $this->getDataContainer()->getItunesSubtitle();
        if (! $subtitle) {
=======
    protected function _setSubtitle(DOMDocument $dom, DOMElement $root)
    {
        $subtitle = $this->getDataContainer()->getItunesSubtitle();
        if (!$subtitle) {
>>>>>>> pantheon-drops-8/master
            return;
        }
        $el = $dom->createElement('itunes:subtitle');
        $text = $dom->createTextNode($subtitle);
        $el->appendChild($text);
        $root->appendChild($el);
        $this->called = true;
    }

    /**
     * Set entry summary
     *
     * @param  DOMDocument $dom
     * @param  DOMElement $root
     * @return void
     */
<<<<<<< HEAD
    // @codingStandardsIgnoreStart
    protected function _setSummary(DOMDocument $dom, DOMElement $root)
    {
        // @codingStandardsIgnoreEnd
        $summary = $this->getDataContainer()->getItunesSummary();
        if (! $summary) {
=======
    protected function _setSummary(DOMDocument $dom, DOMElement $root)
    {
        $summary = $this->getDataContainer()->getItunesSummary();
        if (!$summary) {
>>>>>>> pantheon-drops-8/master
            return;
        }
        $el = $dom->createElement('itunes:summary');
        $text = $dom->createTextNode($summary);
        $el->appendChild($text);
        $root->appendChild($el);
        $this->called = true;
    }
<<<<<<< HEAD

    /**
     * Set entry episode number
     *
     * @param  DOMDocument $dom
     * @param  DOMElement $root
     * @return void
     */
    // @codingStandardsIgnoreStart
    protected function _setEpisode(DOMDocument $dom, DOMElement $root)
    {
        // @codingStandardsIgnoreEnd
        $episode = $this->getDataContainer()->getItunesEpisode();
        if (! $episode) {
            return;
        }
        $el = $dom->createElement('itunes:episode');
        $text = $dom->createTextNode($episode);
        $el->appendChild($text);
        $root->appendChild($el);
        $this->called = true;
    }

    /**
     * Set entry episode type
     *
     * @param  DOMDocument $dom
     * @param  DOMElement $root
     * @return void
     */
    // @codingStandardsIgnoreStart
    protected function _setEpisodeType(DOMDocument $dom, DOMElement $root)
    {
        // @codingStandardsIgnoreEnd
        $type = $this->getDataContainer()->getItunesEpisodeType();
        if (! $type) {
            return;
        }
        $el = $dom->createElement('itunes:episodeType');
        $text = $dom->createTextNode($type);
        $el->appendChild($text);
        $root->appendChild($el);
        $this->called = true;
    }

    /**
     * Set closed captioning status for episode
     *
     * @param  DOMDocument $dom
     * @param  DOMElement $root
     * @return void
     */
    // @codingStandardsIgnoreStart
    protected function _setClosedCaptioned(DOMDocument $dom, DOMElement $root)
    {
        // @codingStandardsIgnoreEnd
        $status = $this->getDataContainer()->getItunesIsClosedCaptioned();
        if (! $status) {
            return;
        }
        $el = $dom->createElement('itunes:isClosedCaptioned');
        $text = $dom->createTextNode('Yes');
        $el->appendChild($text);
        $root->appendChild($el);
        $this->called = true;
    }

    /**
     * Set entry season number
     *
     * @param  DOMDocument $dom
     * @param  DOMElement $root
     * @return void
     */
    // @codingStandardsIgnoreStart
    protected function _setSeason(DOMDocument $dom, DOMElement $root)
    {
        // @codingStandardsIgnoreEnd
        $season = $this->getDataContainer()->getItunesSeason();
        if (! $season) {
            return;
        }
        $el = $dom->createElement('itunes:season');
        $text = $dom->createTextNode($season);
        $el->appendChild($text);
        $root->appendChild($el);
        $this->called = true;
    }
=======
>>>>>>> pantheon-drops-8/master
}
