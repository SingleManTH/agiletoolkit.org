Agile Toolkit Documentation: Table of Contents
====

Below structure contains the following levels:

 * 1st level - will appear as separators and headers
 * 2nd level - will link to a dedicated page in documentation
 * 3nd and 4th level - navigation within a single documentation page (anchors)

Key Points
----
 * Please keep it to U.S. / International English
 * Use Agile Toolkit instead of ATK4

The Structure
----

* Installing ATK4  * /install - Installing ATK4    * Requirements    * lamp - Installing LAMP    * Getting the source code    * Configuring your webserver    * Securing your install
        // advanced install + integration
    
    // Installing from zip, git, composer
        * Troubleshooting  * Upgrading ATK4* Introduction/// Purpose of Agile Toolkit, target audience, applications      * Key benefits of ATK4    * Clear architecture        // built-in UI
    // reusability
    // 3rd party commercial extensions        * Simplified AJAX development     * Elegant & powerful ORM    * Reusability by design    * Security by design    * Collaboration by design     * Testability by design    * Backward compatibility by design  * Design principles    * Simplicity: the Pragmatic Principle
    * Lean code: the 80/20 Principle
    * Plugability: the Independence Principle
    * Extensibility: the Object Principle  * Overview of ATK4
    * Differences from conventional frameworks    * The object structure    * Creating applications    * Adding objects    * Chaining commands    * Routing requests    * Assembling pages    * Managing views    * Handling data    * Adding business logic    * Adding services  * How to learn ATK4    * What skills will you need?    * Getting the most from our learning resources    * Getting the most from our community Coding standards    * // Coding style      * Naming classes Naming properties Naming methods Code layout      * Class documentation Glossary    * Request Flow Chart
    * ATK4 Cheat Sheets
    * License
  * Tutorials    * Hello World
    * Blog (begier)
    * // Address book    * Jobeet (intermediate)
    * // Writing your tutorial
    * More Tutorials  * Applications    * Directory structure
      * atk4/      * atk-addons/ 
      * doc/
      * lib/
      * page/
      * templates/
      * vendor/
      * // PathFinder    * Developing an application
      * Structural choices      * Development stages      * Best practices
    * The object structure      * Object structure overview
      * AbstractObject
      * AbstractView
      * AbstractModel
      * AbstractController    * Application Apis      * Api overview      * ApiCLI      * ApiWeb      * ApiFrontend
      * // ApiInstaller
      * // Other APIs      * Running multiple Apis      * Extending Apis    * Configuration      * Setting configuration values      * Reading configuration values
      // unify ^^ those
            * Database connections      * System configuration options    * Routing      * Static pages      * Dynamic pages      * URL generation
    * Class loading     * Core classes
     * Addon classes
     * Application classes
     * Advanced loading    * Asset management
      * CSS      * Javascript      * Images & media
      // static pages
            * Advanced asset management
      // add-ons with assets
          * Hooks      * How to use hooks      * Hook examples
       // list of hooks rather
    * Authentication & Authorisation      * Terminology      * The BasicAuth class      * OAuth open authentication
      * Login form      * Permissions
    * Error Handling      * Error handling overview

       // underlying errors
      * Framework errors
      * Application errors      * 404 handling    * Unit Testing      * Built-in unit testing      * Using 3rd party tools      * Functional testing      * Selenium      * Behat
    * Performance
      * // performance concepts and strategy
            * Designing for performance
      * Profiling and Benchmarking
      * Automated Speed tests
      * Output caching      * Input caching      * Clutering
      * Cloud services
      * Amazon AWS      * // we don't endorse Stored procedures    * DSQL query builder      * Overview of DSQL
        * Goals
        * // when NOT TO USE
              * Features      * Basic usage      * Fetching data      * Filtering data with conditions
      * Specifying fields      * Joining multiple tables
      * Expressions      * Sub-queries      * Extending DSQL
      * // cross RDBMS compatibility    * Relational Models      * Overview of Relational      * Models Goals

      * // when not to use            * Features
      * Defining Models      * Basic usage      * Interaction with the DSQL query builder
       // reliance really.      * Conditions and Master Fields      * Defining expressions      * Relationships between Models      * Joins within Models      * Modifying default actions      * Model best practices      * Database migration
      * // Extensions
        * Database builders - Create schema from Model
        * Model builders - create models from Schema
        * Dynamic models - keep db in sync with model
        * Visual migration tools
            * NoSQL Models      * Overview of NoSQL
        * // Features
        * // Goals

      * // array
      * // session
      * // JSON API (curl)      * Models Memcache      * MongoDB      * Redis      * Creating your own NoSQL Model
      * // Adding support for new database type 
      * // multi-database traversing          * Pages & Views      * Overview of Pages & Views
        * Understanding Pages
        * Understanding Views      * The SMLite template system
      * Design principles
      * Design workflow
      * The shared template
      * Creating templates
      * Using templates    * The CSS framework      * Overview of the CSS framework
      * Customizing the default skin
      * Creating new View templates    * Pages      * Initializing pages      * Sub-pages
    * Views      * Initializing views
      * Binding data      * Updating views
      * Developing new views    * Forms      * Creating forms      * Handling submissions
      * Validating inputs
      * Displaying error messages    * The JavaScript API      * Overview of JavaScript and AJAX
      * Using the bundled widgets
      * Creating your own widgets      * Using 3rd party plugins    * PHP->JavaScript chains 
      * // Call them Event binding?      * JavaScript chains overview      * Binding chains      * Enclosing chains      * Using multiple chains      * Calling your own JavaScript      * Customising selectors and triggers  * Controllers
    * // Move up, generalize, then break-down by topic    * Overview of Controllers    * Built-in Controllers    * Creating your own Controllers  * Official addons    
    * // add-ons would be separate, but we need add-on development guide    * Campaign Monitor CMS    * CRUD  // no longer add-on, move to view    * Documentation Engine // irrelevant
    * Filestore    * Google Maps    * SQL Schema Generator  // explained elsewhere  * Cookbook  // shouldn't be section in DOC, whole new category on site!    * A useful cookbook entry
    * Another useful cookbook entry
    * A final useful cookbook entry
    * See more Cookbook recipes ->

 * // Localization 
 * // Unit Testing
 * // Deployment
 * 