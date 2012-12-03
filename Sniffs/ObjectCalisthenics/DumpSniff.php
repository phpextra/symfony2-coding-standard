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
 * Symfony2_Sniffs_ObjectCalisthenics_DumpSniff.
 *
 * Debug/dump AST
 *
 * @category PHP
 * @package  PHP_CodeSniffer-Symfony2-ObjectCalisthenics
 * @author   Anthon Pang <apang@softwaredevelopment.ca>
 * @license  http://spdx.org/licenses/MIT MIT License
 * @link     https://github.com/instaclick/Symfony2-coding-standard
 */
class Symfony2_Sniffs_ObjectCalisthenics_DumpSniff implements PHP_CodeSniffer_Sniff
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
        return;

        $parser = new PHPParser_Parser(new PHPParser_Lexer);

        $visitor = new Symfony2_Sniffs_ObjectCalisthenics_UseAccessorsSniff_NodeVisitor;
        $visitor->setPHPCodeSnifferFile($phpcsFile);

        $traverser = new PHPParser_NodeTraverser;
        $traverser->addVisitor($visitor);

        try {
            $code = file_get_contents($phpcsFile->getFilename());
            $tree = $parser->parse($code);
//$tree[0]->setAttribute('visited', true);
            var_dump($tree);
        } catch (PHPParser_Error $e) {
        }
        die;
    }
}
// 3 - wrap primitive types and string, if it has behavior
// 4 - only one -> per line, if not getter or fluent
// 5 - don't abbreviate
// 7 - limit the number of instance variables in a class to 5
// 8 - use first class collections
