<?php
function validFunctionIfOne()
{
    if (true) {
    }
}

function validFunctionIfTwo()
{

    if (true) {
    }
}

function validFunctionIfThree()
{
    echo "";

    if (true) {
    }
}

function validFunctionIfFour()
{
    /* comment */
    if (true) {
    }
}

function validFunctionIfFive()
{
    // single line comment
    if (true) {
    }
}

function validFunctionIfSix()
{
    /**
     * multi-line doc block
     */
    if (true) {
    }
}

function invalidFunctionIfOne()
{
    echo "";
    if (true) {
    }
}

switch ($condition) {
    case 'foo':
        if (true) {
        }

    default:
        if (true) {
        }
}

