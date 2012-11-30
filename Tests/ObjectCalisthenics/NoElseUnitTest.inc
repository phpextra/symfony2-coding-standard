<?php
/**
 * No Else Sniff
 */
class NoElseSniffTest
{
    /**
     * No else
     */
    public function validIf()
    {
        if (true) {
        }
    }

    /**
     * else
     */
    public function invalidElse()
    {
        if (true) {
        } else {
        }
    }

    /**
     * elseif and else if
     */
    public function invalidElseIf()
    {
        if (true) {
        } elseif (false) {
        } else if (null) {
        }
    }
}
