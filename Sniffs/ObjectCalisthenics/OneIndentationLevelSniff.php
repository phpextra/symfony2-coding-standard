<?php

/**
 * This file is part of Applied Object Calisthenics for Symfony 2
 *
 * PHP version 5
 *
 * @category PHP
 * @package  PHP_CodeSniffer-Symfony2-ObjectCalisthenics
 * @license  http://spdx.org/licenses/MIT MIT License
 * @version  GIT: master
 * @link     https://github.com/instaclick/Symfony2-coding-standard
 */

/**
 * Symfony2_Sniffs_ObjectCalisthenics_OneIndentationLevelSniff.
 *
 * Only one indentation level per method.
 *
 * @category PHP
 * @package  PHP_CodeSniffer-Symfony2-ObjectCalisthenics
 * @author   Anthon Pang <apang@softwaredevelopment.ca>
 * @license  http://spdx.org/licenses/MIT MIT License
 * @link     https://github.com/instaclick/Symfony2-coding-standard
 */
class Symfony2_Sniffs_ObjectCalisthenics_OneIndentationLevelSniff implements PHP_CodeSniffer_Sniff
{
    /**
     * A list of tokenizers this sniff supports.
     *
     * @var array
     */
    public $supportedTokenizers = array(
        'PHP',
    );

    /**
     * Returns an array of tokens this test wants to listen for.
     *
     * @return array
     */
    public function register()
    {
        return array(T_OPEN_TAG);
    }

    /**
     * Processes this test, when one of its tokens is encountered.
     *
     * @param PHP_CodeSniffer_File $phpcsFile All the tokens found in the document.
     * @param int                  $stackPtr  The position of the current token in
     *                                        the stack passed in $tokens.
     */
    public function process(PHP_CodeSniffer_File $phpcsFile, $stackPtr)
    {
        // We are only interested if this is the first open tag.
        if ($stackPtr !== 0 &&
            $phpcsFile->findPrevious(T_OPEN_TAG, ($stackPtr - 1)) !== false
        ) {
                return;
        }

        $parser = new PHPParser_Parser(new PHPParser_Lexer);

        $visitor = new Symfony2_Sniffs_ObjectCalisthenics_ControlStructureVisitor;
        $visitor->setPHPCodeSnifferFile($phpcsFile);

        $traverser = new PHPParser_NodeTraverser;
        $traverser->addVisitor($visitor);

        try {
            $code = file_get_contents($phpcsFile->getFilename());
            $tree = $parser->parse($code);
            $tree = $traverser->traverse($tree);
        } catch (PHPParser_Error $e) {
        }
    }
}
