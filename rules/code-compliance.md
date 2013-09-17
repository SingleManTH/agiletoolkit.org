Author: Romans
Tags: guidelines, code, compliance, PSR, PSR2, PEAR, PHPCS

Agile Toolkit Code Compliance
====
*Describes the main mind-set for any code existing in Agile Toolkit main code-base*


How guidelines are chosen
----
Recently PHP community have collaborated and came up with a set of development guidelines, which are most popular in PHP community. Frameworks now decide to follow those guidelines. The standards are abbreviated:

 * PSR-0
 * PSR-1
 * PSR-2

Agile Toolkit have also decided to follow above standards for it's main code-base (github.com/atk4/atk4)

### Exceptions
* Agile Toolkit does not reside in namespace. Namespaces are used by Agile Toolkit add-ons, but the core code and code written by a user sits in the core namespace.
* Agile Toolkit does not provide PHPDOC comments for methods which are overridden. Object-oriented inheritance is used much more extensively in Agile Toolkit, therefore if the method contains "parent::" call, then the PHPDOC header is considered optional.
* File comments are simply a disclaimers. In Agile Toolkit one file contains one class, therefore repeating same comment twice is just a waste of space.

Apart from these PSR-2 is followed throughout the code.

How guidelines are followed
----
Agile Toolkit contains a fair amount of code. PHP files are gradually converted to conform with the standards, but it is a slow transition.


Additional Requirements
----
Each source file must contain valid links to the documentation on Agile Toolkit website. This information essentially links together the documentation with the classes. For example if `AbstractView` links to `agiletoolkit.org/doc/view`, then documentation page would also contain class method reference for AbstractView at the bottom of the page. This must be ensured automatically through scripts.

File Compliance
----
[Agile Toolkit Wiki](http://atk4.pbworks.com/w/page/5412864/FrontPage) contains a present status of the file compliance and will be updated as more and more files are compliant with the assumed standard.