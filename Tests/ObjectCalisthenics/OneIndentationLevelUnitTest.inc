<?php
/**
 * One Indentation Level Sniff
 */
class OneIndentationLevelSniffTest
{
    /**
     * One indentation level
     */
    public function validOneIndentationLevel()
    {
        if (true) {
        }

        while (false) {
        }

        foreach (array() as $y) {
        }

        for ($i = 0; $i < 1; $i++) {
        }

        do {
        } while (false);

        switch (true) {
        }

        $x = function () {
            if (true) {
            }
        };
    }

    /**
     * An exception to the rule
     */
    public function validIndentationEdgeCase()
    {
        foreach (array() as $y) {
            if ($y === null) {
                continue;
            }
        }

        for ($i = 0; $i < 1; $i++) {
            if ($y === null) {
                continue;
            }
        }
    }

    /**
     * More than one indentation level
     */
    public function invalidIdentationLevel()
    {
        if (true) {
            if (false) {
            }
        }

        if (true === null) {
            foreach (array() as $y) {
            }
        }

        while (true) {
            do {
            } while (false);
        }

        if (true === null) {
            for ($i = 0; $i < 1; $i++) {
            }
        }

        do {
            while (false) {
            }
        } while (false);
    }
}
