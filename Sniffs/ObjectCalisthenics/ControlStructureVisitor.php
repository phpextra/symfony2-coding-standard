<?php
/**
 * Parse tree visitor for control structures
 *
 * @author Anthon Pang <apang@softwaredevelopment.ca>
 */
class Symfony2_Sniffs_ObjectCalisthenics_ControlStructureVisitor extends PHPParser_NodeVisitorAbstract
{
    /**
     * @var PHP_CodeSniffer_File
     */
    private $phpcsFile;

    /**
     * @var array
     */
    private $functionList;

    /**
     * Set PHP CodeSniffer File
     *
     * @param PHP_CodeSniffer_File $phpcsFile
     */
    public function setPHPCodeSnifferFile(PHP_CodeSniffer_File $phpcsFile)
    {
        $this->phpcsFile = $phpcsFile;
    }

    /**
     * Search token stream for the corresponding node
     *
     * @param PHPParser_Node $node Current node
     *
     * @return integer
     */
    private function getStackPointer($node)
    {
        foreach ($this->phpcsFile->getTokens() as $stackPtr => $token) {
            if ($node->getLine() > $token['line']) {
                continue;
            }

            return $stackPtr;
        }
    }

    /**
     * Report coding standard violation if nested control structure detected
     *
     * @param Symfony2_Sniffs_ObjectCalisthenics_ControlStructureStack $stack Control structure stack
     * @param PHPParser_Node                                           $node  Current node
     */
    private function checkNesting($stack, $node)
    {
        if ( ! $stack->isNested()) {
            return;
        }

        $this->phpcsFile->addError(
            'Only one level of indentation per method/function',
            $this->getStackPointer($node)
        );
    }

    /**
     * {@inheritdoc}
     */
    public function beforeTraverse(array $nodes)
    {
        $this->functionList = array(new Symfony2_Sniffs_ObjectCalisthenics_ControlStructureStack);
    }

    /**
     * {@inheritdoc}
     */
    public function enterNode(PHPParser_Node $node)
    {
        switch ($node->getType()) {
            case 'Stmt_ClassMethod':
            case 'Expr_Closure':
            case 'Stmt_Function':
                array_push($this->functionList, new Symfony2_Sniffs_ObjectCalisthenics_ControlStructureStack);
                break;

            case 'Stmt_If':
            case 'Stmt_Do':
            case 'Stmt_While':
            case 'Stmt_For':
            case 'Stmt_Foreach':
                $stack = end($this->functionList);
                $stack->push($node->getType());

                $this->checkNesting($stack, $node);
                break;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function leaveNode(PHPParser_Node $node)
    {
        switch ($node->getType()) {
            case 'Stmt_ClassMethod':
            case 'Expr_Closure':
            case 'Stmt_Function':
                array_pop($this->functionList);
                break;

            case 'Stmt_If':
            case 'Stmt_Do':
            case 'Stmt_While':
            case 'Stmt_For':
            case 'Stmt_Foreach':
                $stack = end($this->functionList);
                $stack->pop();
                break;
        }
    }
}
