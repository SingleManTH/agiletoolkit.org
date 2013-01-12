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

* Installing ATK4
  * /install - Starting New Project
    * Requirements
    * Using Installer
    * Setting up Admin UI
    * Securing your install
    * Upgrades
  * /integrate - Integrating Existing Project
    * Using Composer
    * Manual Installation
    * Integrating with CodeIgniter
    * Integrating with Yii
    * Integrating with Symfony
    * Integrating with Joomla
    * Integrating with Wordpress
    * Advanced Configurations       
    * Troubleshooting
* Introduction


  * /intro Introduction to Agile Toolkit
    * Purpose and Goals // explains why we need another framework
    * Is Agile Toolkit for you?
      * Knowledge
      * Learning time
      * Mindset
      * Adoption
      * Training
      * License    
    * Key benefits of ATK4
      * Web User Interface
      * jQuery / AJAX Integration
      * Clear Architecture for Reusability    
      * Elegant & powerful ORM
      * Security by design
      * Collaboration by design 
      * Testability by design
      * Backward compatibility by design
      * Commercial extensions
    * Design principles
      * Simplicity: the Pragmatic Principle
      * Lean code: the 80/20 Principle
      * Plugability: the Independence Principle
      * Extensibility: the Object Principle

      

      
  * /learn Learning Agile Toolkit
    * Differences from conventional frameworks
      * PHP server-side frameworks
      * JavaScript Toolkits
      * Other Integrated Toolkits
    * The object structure
      * Application Class
      * Adding objects
      * Chaining commands
      * Routing requests
      * Assembling pages
      * Managing views
      * Handling data
      * Using Controllers
      * Adding services
    * Coding Convention
      * Keeping your code clean
      * How to refactor
      * Documenting your code
    * Request Flow Chart
    * ATK4 Cheat Sheets
    * License

    
  * /tutorial Tutorials  // Will be separate section

  * Core Framework
    * Directory structure
      * Default structure
      * PathFinder
      * Separating "web" folder
      * Add-on structure
      * Asset management
    * Planning your Application
      * Structural choices
      * Development stages
      * Agile Development
      * Best practices
    * The object structure
      * Object structure overview
      * AbstractObject
      * AbstractView
      * AbstractModel
      * AbstractController
    * Application Apis
      * Api overview
      * ApiCLI
      * ApiWeb
      * ApiFrontend
      * // ApiInstaller
      * // Other APIs
      * Running multiple Apis
      * Extending Apis
    * Configuration
      * Working with Config Files
      * Default settings
      * Adding your own settings
      * Locale settings
      * Add-on configuration
    * Routing
      * Static pages
      * Dynamic pages
      * URL generation
      * Customizing
    * Class loading
     * Core classes
     * Addons classes
     * Namespaces
     * Advanced loading
     * Integrating 3rd party PHP libraries
    * Asset management
      * CSS
      * Javascript
      * Images & media
      * Advanced asset management
      * Uploaded files // link to filestore
      * Loading assets from other domain      
    * Hooks
      * How to use hooks
      * Hook examples
      * Hooks internal use
      * Priorities
      * Registering methods
      * List of all hooks
    * Authentication & Authorization
      * Terminology
      * The BasicAuth class
      * OAuth open authentication

      * Login form
      * Permissions

    * Error Handling
      * Error handling overview

       // underlying errors

      * Framework errors

      * Application errors
      * 404 handling
    * Unit Testing
      * Built-in unit testing
      * Using 3rd party tools
      * Functional testing
      * Selenium
      * Behat

    * Performance

      * // performance concepts and strategy

      
      * Designing for performance

      * Profiling and Benchmarking

      * Automated Speed tests

      * Output caching

      * Input caching
      * Clutering

      * Cloud services

      * Amazon AWS
      * // we don't endorse Stored procedures
    * DSQL query builder
      * Overview of DSQL

        * Goals

        * // when NOT TO USE

      
        * Features
      * Basic usage
      * Fetching data
      * Filtering data with conditions

      * Specifying fields
      * Joining multiple tables

      * Expressions
      * Sub-queries
      * Extending DSQL

      * // cross RDBMS compatibility
    * Relational Models
      * Overview of Relational
      * Models Goals

      * // when not to use
      
      * Features

      * Defining Models
      * Basic usage
      * Interaction with the DSQL query builder
       // reliance really.
      * Conditions and Master Fields
      * Defining expressions
      * Relationships between Models
      * Joins within Models
      * Modifying default actions
      * Model best practices
      * Database migration

      * // Extensions

        * Database builders - Create schema from Model

        * Model builders - create models from Schema

        * Dynamic models - keep db in sync with model

        * Visual migration tools

        
    * NoSQL Models
      * Overview of NoSQL

        * // Features

        * // Goals

      * // array
      * // session
      * // JSON API (curl)
      * Models Memcache
      * MongoDB
      * Redis
      * Creating your own NoSQL Model

      * // Adding support for new database type 
      * // multi-database traversing
      
    * Pages & Views
      * Overview of Pages & Views

        * Understanding Pages

        * Understanding Views
      * The SMLite template system

      * Design principles
      * Design workflow
      * The shared template
      * Creating templates
      * Using templates
    * The CSS framework
      * Overview of the CSS framework

      * Customizing the default skin

      * Creating new View templates
    * Pages
      * Initializing pages
      * Sub-pages

    * Views
      * Initializing views

      * Binding data
      * Updating views

      * Developing new views
    * Forms
      * Creating forms
      * Handling submissions

      * Validating inputs

      * Displaying error messages
    * The JavaScript API
      * Overview of JavaScript and AJAX

      * Using the bundled widgets

      * Creating your own widgets
      * Using 3rd party plugins
    * PHP->JavaScript chains 
      * // Call them Event binding?
      * JavaScript chains overview
      * Binding chains
      * Enclosing chains
      * Using multiple chains
      * Calling your own JavaScript
      * Customising selectors and triggers
  * Controllers

    * // Move up, generalize, then break-down by topic
    * Overview of Controllers
    * Built-in Controllers
    * Creating your own Controllers

  * Official addons
    
    * // add-ons would be separate, but we need add-on development guide
    * Campaign Monitor CMS
    * CRUD  // no longer add-on, move to view
    * Documentation Engine // irrelevant

    * Filestore
    * Google Maps
    * SQL Schema Generator  // explained elsewhere
  * Cookbook  // shouldn't be section in DOC, whole new category on site!
    * A useful cookbook entry

    * Another useful cookbook entry

    * A final useful cookbook entry

    * See more Cookbook recipes ->

 * // Localization 
 * // Unit Testing
 * // Deployment
 * 
