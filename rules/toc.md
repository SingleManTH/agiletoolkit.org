Agile Toolkit Documentation: Table of Contents
========

Structure
-----

The docs are structured in 4 levels:

* 1st level - Headers in the TOC
* 2nd level - TOC links to a dedicated page in documentation
* 3nd level - Heads within the dedicated page (anchors)
* 4th level - Subheads within the dedicated page.

Style rules
----

* Use US English
* Use "Agile Toolkit" not "ATK4"
* Use Initial Caps: **This Is A Heading Example**
* Use "&", not "and"
* Indent code blocks 4 spaces
* Indicate a link of the docs with an arrow ->


* Use "method" for a function within a class (See PHP docs).

Markdown has no syntax for comments that should be stripped out. We use markup that will make it easy to remove comments with a script:

* General comments: ((My comment))
* URLs: [/foo].

The TOC
----


### Installing Agile Toolkit

[/install]
+ Requirements								
+ Installing With Composer 					
+ Installing Manually 						
+ Starting A New Project 					
    - Using The Agile Toolkit Installer
    - Setting Up The Admin UI
+ Integrating With Existing Projects 				[/install/integration]
    - Overview
    - Integrating With CodeIgniter
    - Integrating With Yii
    - Integrating With Symfony
    - Integrating With Joomla
    - Integrating With Wordpress
+ Securing Your Installation 						[/install/security]
+ Upgrading Your Installation 						[/install/upgrade]
+ Advanced Configuration 							[/install/config]
+ Troubleshooting 									[/install/troubleshoot]
* Why Use Agile Toolkit?								[/why-use]
+ Key Benefits										[/why-use/key-benefits]
    - Goals Of The Framework
    - Clear Architecture ((What I have in mind is different from reusablity - let's give it a try?))
    - Web User Interface ((R - what are you thinking of here? Is this something new?))
    - jQuery / AJAX Integration
    - Elegant & Powerful ORM
    - Reusability By Design
    - Security By Design
    - Collaboration By Design 
    - Testability By Design
    - Backward Compatibility By Design
    - Free & Commercial Addons
+ Design Principles									[/why-use/design]
    - Simplicity: The Pragmatic Principle
    - Lean Code: The 80/20 Principle
    - Plugability: The Independence Principle
    - Extensibility: The Object Principle
+ Is Agile Toolkit Right For You?					[/why-use/decision]
    - What Type of Projects Will Benefit?
    - What Developer Skills Are Required?
    - What Developer Mindset Is Required?
    - How Long Will It Take To Learn?
    - What Are The Other Issues With Adoption?
    - What Training is Available?
    - Is The Licence Suitable?      
* Introduction To Agile Toolkit
+ Differences From Conventional Frameworks
    - Agile Toolkit vs PHP Server-Side Frameworks
    - Agile Toolkit vs JavaScript Toolkits
    - Agile Tookit vs Other Integrated Toolkits
+ A High-Level Overview
    - The Object Structure
    - The Application Class
    - Adding objects
    - Chaining commands
    - Routing requests
    - Assembling pages
    - Managing views
    - Handling data
    - Using Controllers
    - Adding services
+ Request Flow Chart
+ Agile Toolkit Cheat Sheet
+ License
    - Open Source Projects
    - Use In Education 
    - Closed Source Projects
        * Internal Use
        * Single-Site Use
        * Multi-Site Use
        * How To Register
* Tutorials
+ Hello World ->
+ Blog (Beginner) ->
+ Jobeet (Intermediate) -> ((Are we realistically going to finish all 18 steps of Jobeet. Or should we work on a shorter high-quality intermediate tutorial? It won't look good to have an unfinished Jobeet!))
+ See all tutorials ->
* The Agile Toolkit Development Process
+ Structural Choices
+ Agile Development
+ Best Practices
+ Performance & Scaling
    - Concepts & Strategy
    - Performance In Agile Development
    - Profiling & Benchmarking
    - Automated Speed tests
    - Output caching
    - Input caching
    - Clustering
    - Cloud Services
        * Amazon AWS
        ((Others??))
+ Deployment
((Suggestions please!))
* Framework Structure
+ The Directory Structure
    - Core Directories
    - Addon Directories
    - Application Directories
+ The Object Structure
  - Design Goals Of The Object Structure
  - AbstractObject
  - AbstractView
  - AbstractModel
  - AbstractController
+ Application APIs
    - API Overview
        * What Is An Agile Toolkit API?
        * Selecting The Right API
        * Security Considerations
    - ApiCLI
        * Features
        * Command-Line Applications
        * Cron Job Applications
        * Queuing Applications
    - ApiWeb
        * Features
        * Integrating With 3rd Party Frameworks
    - ApiFrontend
        * Features
        * Using With Web Applications
    - ApiInstaller
        * The Agile Toolkit Installer
    - ApiJSON
        * REST APIs
    - Other APIs ((What will be covered here??))
    - Running Multiple APIs
        * Overview
        * Use Cases
    - Extending API Classes
        * Overview
        * Use Cases      
* Framework Services
+ Configuration
    - Working With Config Files
    - Default Settings
    - Adding Your Own Settings
    - Locale Settings
    - Addon Settings
+ Routing
    - Overview
    - Static pages
    - Dynamic pages
    - URL Generation
    - Advanced Routing
+ Class Loading								
    - The PathFinder Class					
    - Loading Addons					
    - Using Namspaces			
    - Using 3rd Party PHP Libraries
        * Manual Integration
        * Integration Using Composer
    - Advanced Loading						
+ Asset Management
    - CSS
    - Javascript
    - Images & Media
    - Advanced Asset Management
        * Uploaded files ((Link to filestore docs)
        * Loading Assets From Other Domains
+ Hooks
    - Overview
    - Adding Hooks
    - Passing Arguments
    - Setting Priorities
    - Breaking Hook Chains
    - Best Practices
        * Benefits And Risks
        * Use Cases
        * Testability
        * Reusability
    - List Of System Hooks
+ Authentication & Authorization
    - Terminology
    - The BasicAuth Class
    - OAuth Open Authentication
    - Login Forms
    - Permissions
+ Error Handling
    - Error Handling Overview
    - Framework Errors
    - Application Errors
    - 404 Handling
    - Best Practices
+ Testing
    - Unit Testing
        * Built-in Unit Testing
        * Using 3rd Party Tools
    - Functional Testing
        * Selenium
        * Behat
* Working With Data ((Very rough - I'll rework during drafting))
+ DSQL Query Builder
    - Overview
        * Goals
        * When To Use
        * Features
    - The DSQL Object
        * Modes
        * Properties
        * Cloning and Duplicating
        * Overloading Arguments
    - Defining Queries
        * Table
        * Fields
        * Conditions (Where Clauses)
        * Joining
        * Grouping
        * Ordering
        * Options ((What goes here?))
        * Sets
    - Using Subqueries
    - Using Expressions
    - Customizing Queries 
        - setCustom
        - all & fx 
    - Advanced Usage
        * Pre-exec
        * Debugging
        * RDBMS-specific Methods
    - Extending Queries
    - Practical Examples
        * Book and Author
        * User and Contact
+ Relational Models					[/orm]
    - Overview
        * Design Goals
        * Comparison With Other ORMs
        * Features
        * Performance     		
    - Concepts
        * Data-set
        * Loaded Record
        * Field Meta-information
    - Validation
    - Caching
    - Hooks
    - Actions
    - Binding Models To Views
    - Actual Fields
    - Aliases
    - Defining Models
        * Fields 
        * Expressions
        * Relations
        * Joins
        * Using DSQL
    - Data Filtering
        * Basic Use
        * Use with Expressions
        * Use with Subselects
        * Use with other Models
        * Order
        * Limit
    - Data Summarizing
        * Count and Sum
        * Grouping
        * Options
    - Using Models
        * Loading and Saving
        * Iterating Result Sets
        * Traversing Result Sets
    - Examples
        * Timestamps
        * Cached Fields
    - Flexible Data Components
        * Extending Models
        * Overriding Models
    - Best Practices
        * Defining Model Methods
        * Extending Models With Controllers
        * Overriding Default Methods
    - Behaviour Hooks
        * Loading & Saving
        * Query Building
        * Validation
    - Extensions
        * Database Builder - Create Schema From Model
        * Model Builder - Created Models From Schema     	
    - Database Migration
        * Keeping The DB In Sync With The Models
        * Visual Migration Tools
    - Using With SQLite 
+ NoSQL Models
    - Overview
        * Goals
        * Features
        * When Not To Use
    - Defining ((What do you have in mind here??))
    - Array Controller
    - Session Controller
    - JSON API & CURL
    - Memcache Controller
    - MongoDB Controller
    - Redis Controller
    - Creating A New NoSQL Controller
    - Using A NoSQL Controller As A Cache
        * Using A Single Cache
        * Using Multiple Caches 
    - Database-independent Result Set Traversal
* Working With Pages & Views       
+ Pages
    - Overview
        * Goals
        * Features
    - Best Practice
    - Design Workflow
    - Reusable Sub-pages
    - Custom Page Patterns ((What goes here??))
+ Templates
    - Overview
        * Goals
        * Features
    - Creating Templates
    -  Using Templates
+ The CSS Framework
    - Overview
        * Goals
        * Features
    - Customizing The Default Skin
    - Creating New View Templates
+ Views
    - Overview
        * Goals
        * Features
    - Initializing Views
    - Binding Data
    - Updating Views
    - Developing New Views
+ Forms
    - Overview
        * Goals
        * Features
    - Creating Forms
    - Handling Submissions
    - Validating Inputs
    - Displaying Error Messages
+ The JavaScript API
    - Overview of JavaScript and AJAX
        * Goals
        * Features
    - Using The Bundled Widgets
        * Overview
        * List
        * Grid
        * CRUD
        * etc...
    - Creating Your Own Widgets
    - Using 3rd Party JQuery Plugins
+ Working With JavaScript Events
    - Overview
        * Goals
        * Features
    - Binding JavaScript Chains
    - Enclosing Chains
    - Using Multiple Chains
    - Calling Your Own JavaScript
    - Customizing Selectors And Triggers

Issues For Discussion
-----

* Controllers
	((Can we set up a Skype chat about controllers? I need to be sure I understand them, and the docs are a bit weak on this. My tentative idea is to explain them in terms of 1) Shared application-wide services such as data connections and validation where we don't want the overhead of initialising multiple objects, 2) Local services where we don't mind if controllers are initialised more than once, 3) Business logic. This might help users coming from other frameworks to map the ATK approach to Controllers to more familiar IoC thinking. Can you point me at some use-cases for business logic controllers. I'm still unclear on what goes in a Model and what would go in a Controller))
  * ((Move up, generalize, then break-down by topic))
  * Overview of Controllers
  * Built-in Controllers
  * Creating your own Controllers

* Official addons
  
  * ((add-ons would be separate, but we need add-on development guide))
((Why woudn't we document the official addons here?))
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

 * ((Localization))

((I would argue for an official addon ASAP. This is partly selfish, as I'd prefer to build our site using community supported code! If we can sort out the routing and asset loading issues, I could get a draft to you in a couple of days of work based on the stuff I did for Laravel. You guys could clean it up and turn it into decent code!)) 

((PRIORITIES: we're going to have around 50 sections, some short, but some quite long and demanding. Quite a big project. What are our priorities? Do we just start at the beginning and work down?))
