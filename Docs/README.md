Symfony2 Coding Standard
========================

Structure
---------

 * Add a single space after each comma delimiter;
 * Add a single space around operators (==, &&, ...);
 * Add a comma after each array item in a multi-line array, even after the last one;
 * Add a blank line before return statements, unless the return is alone inside a statement-group (like an if statement);
 * Use braces to indicate control structure body regardless of the number of statements it contains;
 * Define one class per file - this does not apply to private helper classes that are not intended to be instantiated from the outside and thus are not concerned by the PSR-0 standard;
 * Declare class properties before methods;
 * Declare public methods first, then protected ones and finally private ones.
 * Use parentheses when instantiating classes regardless of the number of arguments the constructor has.

Naming Conventions
------------------

 * Use camelCase, not underscores, for variable, function and method names, arguments;
 * Use underscores for option names and parameter names;
 * Use namespaces for all classes;
 * Prefix abstract classes with Abstract. Please note some early Symfony2 classes do not follow this convention and have not been renamed for backward compatibility reasons. However all new abstract classes must follow this naming convention;
 * Suffix interfaces with Interface;
 * Suffix traits with Trait;
 * Suffix exceptions with Exception;
 * Use alphanumeric characters and underscores for file names;
 * Don't forget to look at the more verbose Conventions document for more subjective naming considerations.

Documentation
-------------

 * Add PHPDoc blocks for all classes, methods, and functions;
 * Omit the @return tag if the method does not return anything;
 * The @package and @subpackage annotations are not used.

References
----------

 * [Symfony2 Coding Standard](http://symfony.com/doc/master/contributing/code/standards.html)
 * [PSR2](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md)
