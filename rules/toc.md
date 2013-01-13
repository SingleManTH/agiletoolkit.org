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
      * Registrations
      * Use in open-source 
      * Use in private projects
      * Use in school
      * Internal use
      * Single-site use
      * Corporate use

    
  * /tutorial Tutorials  // Will be separate section

* Framework Documentation
  * /core Core Structure
    * Directory structure
      * Default structure
      * PathFinder
      * Separating "web" folder
      * Add-on structure
      * Asset management
    * Planning Application Structure
      * Structural choices
      * Development stages
      * Agile Development
      * Best practices
    * The Object Structure
      * Object structure overview
      * AbstractObject
      * AbstractView
      * AbstractModel
      * AbstractController
      
      
  * api/ Application Apis
    * Api overview
    * Best Practices
      * Multiple Interfaces
      * Security
    * ApiCLI
      * cron
      * Command-Line use
      * Queues
    * ApiWeb
      * 3rd Party Framework Integration
    * ApiFrontend
    * ApiInstaller
      * Agile Toolkit Installer
    * ApiJSON
    * Other APIs
    * Running multiple Apis
    * Extending Apis

  * config/ Configuration
    * Working with Config Files
    * Default settings
    * Adding your own settings
    * Locale settings
    * Add-on configuration

  * routing/ Routing
    * Static pages
    * Dynamic pages
    * URL generation
    * Customizing

  * pathfinder/ Class loading
   * PathFinder
   * Addons classes
   * Namespaces
   * Advanced loading
   * Integrating 3rd party PHP libraries

  * ass/ ?? :D Assets (Images, CSS)
    * CSS
    * Javascript
    * Images & media
    * Advanced asset management
    * Uploaded files // link to filestore
    * Loading assets from other domain      

  * hook/ Hooks
    * How to use hooks
    * Hook examples
    * Hooks internal use
    * Priorities
    * Registering methods
    * List of all hooks

  * auth/ Authentication & Authorization
    * Terminology
    * The BasicAuth class
    * OAuth open authentication
    * Login form
    * Permissions

  * error/ Error Handling
    * Error handling overview
    * Framework errors
    * Application errors
    * 404 handling

  * test/ Unit Testing
    * Built-in unit testing
    * Using 3rd party tools
    * Functional testing
    * Selenium
    * Behat

  * performance/ Performance and Scaling
    * Concepts and Strategy
    * Performance in Agile Development
    * Profiling and Benchmarking
    * Automated Speed tests
    * Output caching
    * Input caching
    * Clustering
    * Cloud services
    * Amazon AWS


  * dsql/ DSQL query builder
    // TODO: see book.pdf for topics!
    * Overview of DSQL
      * Goals
      * When to use
      * Features
    * Direct Use
      * DSQL Modes
      * Properties of DSQL Object
      * Cloning and Duplicating
      * Overloaded Arguments
      * Query Methods
    * Defining Query
      * Table
      * Fields
      * Conditions (where)
      * Joining
      * Grouping
      * Ordering
      * Options
      * Set
    * Subqueries
    * Expressions
    * Customizing
      * setCustom
      * call and fx
    * Advanced
      * Pre-exec
      * Debugging
      * RDBMS-specific methods
    * Extending
    * Practical Examples
      * Book and Author
      * User and Contact

  * orm/ Relational Models
    * Overview of Relational Models
      * Design Goals
      * Performance
      * Comparison with other ORM
      * Features
    * Concepts
      * The data-set
      * Loaded record
      * Field meta-information
      * Validation
      * Cache
      * Hooks
      * Actions
      * Use with Views
      * Actual Fields
      * Aliases
    * Defining Models
      * Field 
      * Expressions
      * Relations
      * Joins
      * DSQL Access
    * Conditions
      * Basic Use
      * Use with Expressions
      * Use with Subselects
      * Use with other Models
    * Order
    * Limit
    * Direct use
      * Loading and Saving
      * Iterating
      * Traversing
    * Query Building
      * Count and Sum
      * Grouping
      * Options
    * Examples
      * Timestamps
      * Cached fields
    * Object-Oriented Benefits
      * Extending
      * Overriding
    * Best Practices
      * Defining Methods
      * Extending with Controllers
      * Overriding default methods
    * Behaviour Hooks
      * Loading and Saving
      * Query Building
      * Validation
    * Extensions
      * Database builders - Create schema from Model
      * Model builders - create models from Schema
      * Dynamic models - keep db in sync with model
      * Visual migration tools
    * Database migration
      
  * nosql/ NoSQL Models
    * Overview of NoSQL
      * Features
      * Goals
      * When not to use
    * Defining
    * Controllers
      * Array
      * Session
      * JSON API (curl)
      * Models Memcache
      * MongoDB
      * Redis
    * Creating your own NoSQL Model
    * Using NoSQL Controller as cache
    * Multiple Caches
    * Adding support for new database type 
    * Database-independent traversal

  * sqlite/ SQLite Template Engine 
    * ee    
        
        
  * page/ Pages
    * Overview of Pages
      * Features
      * Goals
    * Design principles
    * Design workflow
    * Sub-pages
    * Custom page patterts


  * somewhere else
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
    * Customizing selectors and triggers
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
