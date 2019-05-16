<?php
/**
 * @file
 * The interface definition for Rules to generate output.
 */
<<<<<<< HEAD

namespace Masterminds\HTML5\Serializer;

/**
 * To create a new rule set for writing output the RulesInterface needs to be implemented.
 * The resulting class can be specified in the options with the key of rules.
 *
 * For an example implementation see Serializer\OutputRules.
 */
interface RulesInterface
{
=======
namespace Masterminds\HTML5\Serializer;

/**
 * To create a new rule set for writing output the RulesInterface needs to be
 * implemented.
 * The resulting class can be specified in the options with the
 * key of rules.
 *
 * For an example implementation see \Masterminds\HTML5\Serializer\OutputRules.
 */
interface RulesInterface
{

>>>>>>> pantheon-drops-8/master
    /**
     * The class constructor.
     *
     * Note, before the rules can be used a traverser must be registered.
     *
<<<<<<< HEAD
     * @param mixed $output  The output stream to write output to.
     * @param array $options An array of options.
=======
     * @param mixed $output
     *            The output stream to write output to.
     * @param array $options
     *            An array of options.
>>>>>>> pantheon-drops-8/master
     */
    public function __construct($output, $options = array());

    /**
     * Register the traverser used in but the rules.
     *
     * Note, only one traverser can be used by the rules.
     *
<<<<<<< HEAD
     * @param Traverser $traverser The traverser used in the rules.
     *
     * @return RulesInterface $this for the current object.
     */
    public function setTraverser(Traverser $traverser);
=======
     * @param \Masterminds\HTML5\Serializer\Traverser $traverser
     *            The traverser used in the rules.
     * @return \Masterminds\HTML5\Serializer\RulesInterface $this for the current object.
     */
    public function setTraverser(\Masterminds\HTML5\Serializer\Traverser $traverser);
>>>>>>> pantheon-drops-8/master

    /**
     * Write a document element (\DOMDocument).
     *
     * Instead of returning the result write it to the output stream ($output)
     * that was passed into the constructor.
     *
     * @param \DOMDocument $dom
     */
    public function document($dom);

    /**
     * Write an element.
     *
     * Instead of returning the result write it to the output stream ($output)
     * that was passed into the constructor.
     *
     * @param mixed $ele
     */
    public function element($ele);

    /**
     * Write a text node.
     *
     * Instead of returning the result write it to the output stream ($output)
     * that was passed into the constructor.
     *
     * @param mixed $ele
     */
    public function text($ele);

    /**
     * Write a CDATA node.
     *
     * Instead of returning the result write it to the output stream ($output)
     * that was passed into the constructor.
     *
     * @param mixed $ele
     */
    public function cdata($ele);

    /**
     * Write a comment node.
     *
     * Instead of returning the result write it to the output stream ($output)
     * that was passed into the constructor.
     *
     * @param mixed $ele
     */
    public function comment($ele);

    /**
     * Write a processor instruction.
     *
<<<<<<< HEAD
     * To learn about processor instructions see InstructionProcessor
=======
     * To learn about processor instructions see \Masterminds\HTML5\InstructionProcessor
>>>>>>> pantheon-drops-8/master
     *
     * Instead of returning the result write it to the output stream ($output)
     * that was passed into the constructor.
     *
     * @param mixed $ele
     */
    public function processorInstruction($ele);
}
