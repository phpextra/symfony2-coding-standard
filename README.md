Symfony2 PHP CodeSniffer Coding Standard + Object Calisthenics
==============================================================

A code standard to check against the [Symfony coding standards](http://symfony.com/doc/current/contributing/code/standards.html)
and [object calisthenics](http://www.slideshare.net/rdohms/bettercode-phpbenelux212alternate) (adapted for PHP).

Installation
------------

1. Install phpcs and this coding standard via composer.json:

        "require": {
            "instaclick/php-code-sniffer": "dev-master",
            "instaclick/symfony2-coding-standard": "dev-master"
        }

Contributing
------------

If you do contribute code to these sniffs, please make sure it conforms to the PEAR
coding standard and that the Symfony2-coding-standard unit tests still pass.

To check the coding standard, run from the Symfony2-coding-standard source root:

    $ phpcs --ignore=*/tests/* --standard=PEAR . -n

The unit-tests are run from within the PHP_CodeSniffer directory:

    $ phpunit --filter Symfony2_* tests/AllTests.php
