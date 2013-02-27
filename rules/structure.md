Author: Romans
Tags: guidelines, code, compliance, PSR, PSR2, PEAR, PHPCS

Agiletoolkit.org Structure
====
*Main categories and further structure*


Use Patterns
----
Based on our current website and feedback we have received for the last 2 years, we can do a lot to improve the site structure.

There are two main uses for the website:

* First look at Agile Toolkit
* Learning Agile Toolkit
* Checking references or getting help

### Desired Improvements

* Overcomplexity - present website introduces too many concepts at once. Coming on with a simpler ideas but easier to understand and gradually unrolling additional functionality will not turn down users
* Overview - current materials for toolkit are way too scattered. We need them organized in a simple to understand pattern
* Progressions - users want to be able to progress in learning. There should be a clear path how to progress in each area of Agile Toolkit from the basic concepts to the advanced use.
* Visual appeal - diagrams, pictures, samples and drawings much be used much more extensively. We decided to use yEd for diagrams.
* Text clarity - previously we prioritized precision and in-depth use, but now we will focus on clarity and simplicity. Advanced stuff should be moved away from main help articles.
* Primary and Secondary navigation - the site will have a simple navigation on top and secondary navigation on the bottom of the page.
    * Top menu to contain pages where USERS want to go
    * Bottom menu to contain pages where WE want users to go
* All of the main page categories in the top menu is to have layout specifically designed for the purpose. List with video tutorials should be visually optimized in a different way to "recent changes" page. Documentation and articles must provide reading without distraction.
* Access to all documentation topics must be a click away from the index page (as in code igniter)
* Black background is to be abandoned, it's too depressing and difficult to maintain. The page style should be closer to the actual Agile Toolkit theme.

Main Menu
----
We agree to have the following in the main menu:

* Index page 
    * introduction video or slides
    * download link
    * agile toolkit official feed (cookbook, news, articles, blog)
    * community feed (forums, etc)
    * RSS (previously blog) to point to official feed
* Documentation
    * Table of Contents with about 30-40 topics
    * Each topic to contain (on one page):
        * Brief introduction, screenshot
        * Short code sample
        * Off-screen table of contents (one you can hide)
        * Documentation (h2 / h3 / ..) going one by one through features in code-igniter style
        * Class and method reference at the bottom in Yii style
        * Anchors / Link-chain
        * Ability to add comment anywhere on a page through JavaScript add-on (Similar to commenting code on Github)
        * Ability to see icon where comments are and ability to expand them. See also comments in "iWork Pages" or in "Google Docs".
    * Cookbook (articles)
    * Videos
* Support
    * Forums (Community feed)
    * Articles (all articles with flexible filter)
    * Training
    * Developers
* Market
    * Add-ons
    * Themes
    * Projects
* My Account
    * My Installs
    * My Licenses
    * My Addons
    * My Articles

User badge can be visible across the site, should contain:

 * username
 * icon if user is certified
 * icon if user is licensed developer
 * community score (as stack overflow)

Bottom Menu
----

* About
    * Authors
    * Contributors
    * History
    * Roadmap
    * IRC
* OpenSource
    * Github
    * Codepad
    * Projects
    * 3rd Party
* Commercial
    * Certified Services
    * Why migrate?
    * Licenses and Pricing
* Showroom
    * Sites using Agile Toolkit
    * Weekly Google Hangout
    * Feedback
    * Case Study
    
URL Structure
----
Here are sample URLs

* doc/form
* doc/smlite
* doc/dsql
* blog/why-i-choose-agile-toolkit
* tutorial/jobeet/day-1
* video
* add-on/romaninsh/grid-order
* forum/general/2837-how-can-i-create-crud
* theme/mayack/dark-night
* consultants/agiletech
* user/darkside666
* account/licenses
* search/tag/form
* search/tag/form?q=password+verification 

if first part of the URL is 2-letter, it is considered a language code, e.g.

* pl/doc/form
* ru/ -- russian version of index page
* ru/forum -- would filter for russian posts
* en/* -- would always redirect to root
 
Forum Structure
----
* Getting started
* General discussion
* Add-on help
* Off-topic (not included in feed)
    
Database Structure
----
* User (email, key, community score, opt: company_id)
* Company (billing_user_id)
* License (user_id, type, license_id, site_id)
* Site (fingerprint, visibility, url, version)
* Content (is_approved, url, markdown, author_id, title, up_votes, language, translation_of_id)
    * Article
    * Forum post (in_reply_to)
    * Add-on
    * Consultancy (certified, licensed)
* Up-vote (user_id, content_id, key, hits)


File Structure
----
`agiletoolkit.org` would have a file structure identical to the URL. In other words, to edit con tent which appears on foo/bar/baz URL, you would need to edit public/en/foo/bar/baz* file.

The way how this file is presented can be controlled by a page located inside page/foo/bar/baz.php or page/foo/bar.php or even page/foo.php.

The layout of the page would be defined in template/default/foo/bar/baz.html or template/default/foo/bar.html, depending on settings inside a PHP file.

Locale-based changes might also be seen under template/en/foo/bar.html

All of the page content may be cached for improved performance.

User Project
----
* Composer
* Installer
    * Feature check
    * API Selection (Full, Single-page, Facebook, etc)
    * Dependencies, more add-on installation
    * Database migration
    * Hook for add-ons
* Add-ons
    * Documentation viewer (View docs off-line)
    * Sample viewer (Download, install and run samples from agiletoolkit.org locally. Also you can upload your samples)
    * UI Builder (Paid module by Janis)
* Develop tools
    * Better logger - link to documentation from backtrace lines
    * Object browser
    * Profiler
    * Add-on installer
    * Database migrator
    

Add-on
----
Each add-on must contain:

* Namespace, at least vendor/addonname or vendor/pack/addonname
* Documentation
* Example
* Repository
* License
* Version
* Composer-file
* DB install and migration scripts