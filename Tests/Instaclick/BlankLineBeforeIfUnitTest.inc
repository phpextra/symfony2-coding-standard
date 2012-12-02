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

