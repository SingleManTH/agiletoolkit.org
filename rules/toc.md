((Agile Toolkit Documentation: Table of Contents
========

Discussion
----
#### Remaining Issues

There are a couple of issues I feel we have to nail before we can get down to drafting. 

The first is the file structure of the docs, becuase this would be tedious to change at a later stage.

And the second is how we introduce people to the framework. Becuase Agile Toolkit is unique, we need to show people what it can do for them, and get them oriented so they can follow the more detailed docs. This is quite challenging, so I've been giving it more thought.

#### The Structure

In your last draft you suggested flattening the structure onto a few large pages, but I don't feel that this will work in practice. 

Let's remind ourselves what we're trying to do. It's important that we offer users overview at each level, becuase this is a vital aid to learning. With the initial design, we offered an overview of the first & second level headings in the dropdown TOC, and of the third level headings in the TOC at the head of each topic page. This gives a nice overview at each level:

Main TOC:

* HEAD ONE
	+ Head Two
	+ Another Head Two

Document Toc:

* Head One >> HEAD TWO (Page headline as breadcrumb)
	+ Head Three
	+ Another Head Three
	
I feel that we lose this with the "big page" approach. If we only offer the level 2 headings at the top of each page, people won't get an overview and won't be able to quickly navigate to content. But a 2 level TOC would be very large and intimidating: for example the Introduction page you've drafted would have over 30 items in the page TOC. These pages would sometimes be equivalent to 2 or 3 book chapters. I think that this is simply too much to offer at one time and risks overloading users. We need to organise stuff in more digestable chunks. It would look like this:

Main TOC:

* HEAD ONE
	+ Head Two
	+ Another Head Two (link to an in-page anchor)

Document Toc:

* HEAD ONE
	+ Head Two
		- Head Three
		- More Head Three
	+ Another Head Two
		- Head Three
		- More Head Three

I understand your concern about the existing URLs. So sure, in the short-term we don't want to lose the incoming links & SEO rankings. But I'd argue that we shouldn't distort the long-term docs structure for that - there should be other options using rewrites etc.

#### The Introduction
	
I think this is the hardest section to design - I don't think we've got it right yet, and I don't think the other frameworks handle this well either. So we'll have to work it out for ourselves. We've been going round in circles a bit. So let's try and tease it out from first principles, from the point of view of someone coming fresh to the framework. 

Traditionally docs start with the Install, but is that the first thing on people's minds? What's the point of installing before you understand why you might want to use the framework and whether it will fit your needs? Plus, the Install is the most boring part of the docs, and not a great intro.

So what questions do people have, and what's the best order to answer them? Here's my sense of the overall evaluation & learning process:

1) What are the unique benefits offered by this framework? Is it worth checking out?
2) Is it right for my project?
3) How easy will it be to learn and adopt? Will the benefits outweigh the costs?
4) Show me how to install the thing.
5) Give me an overview of how it works and what the code looks like, so I know how things fit together when I dive into the details.
5) Give me some practical, hands-on tutorials to get me going.
6) Give me some best practices for the overall design and development process with this framework (This is surely very important, but is pretty much ignored in other framework docs.)
7) Explain the features to me in detail.

Does this make sense to you? I think a process like this would be much more user-friendly than the way it's usually done.

We've been a bit guilty of mixing some of these objectives together. But with writing as with coding things tend to work better when you do one thing at a time. I like this order, as each section provides a foundation for the next. I've tried to draft it below.

#### Next Steps

I feel that this draft is beginning to shape up. Unless you have some major concerns or ideas, I'd suggest that we experimentally draft a couple of sections and see how it looks.

I suggest we tackle each section as follows:

1. I'll draw together everything I can find in the docs, Official Guide, blog, lists etc and get it into Markdown format
1. I'll ask you for rough notes on anything that's missing
1. I'll do an alpha draft
1. You'll make comments
1. I'll do a beta draft
1. We'll ask experienced community members for comments?
1. I'll do the final draft
1. You'll sign-off and publish

Structure
-----

The docs are structured in 4 levels:

* 1st level - Headers in the TOC
* 2nd level - TOC links to a dedicated page in documentation
* 3nd level - Heads within the dedicated page (anchors)
* 4th level - Subheads within the dedicated page.

TOC Style Rules
----

* Indicate a link inside the docs with an arrow ->
* Indicate a link outside the docs with a double arrow ->>

The TOC
----
))

* What Are The Benefits Of Agile Toolkit?
	((I'm proposing we focus on 3 main benefits, and give the others lower weighting. This way the main message won't get lost in the noise.))
	+ Why Learn A New Framework?
		- Agility Is Hard
		- Rich Web Applications Are Hard
		- Reusability Is Hard
		- The Need For New Thinking
	+ A Better Way To Build Agile Applications
	+ A Better Way To Build Rich Web Applications
	+ A Better Way To Develop Reusable Code
	+ Other Key Benefits Of Agile Toolkit
		- Elegant & Powerful ORM
		- Security By Design
      	- Collaboration By Design 
      	- Testability By Design
      	- Backward Compatibility By Design
      	- Free & Commercial Addons

* What Does The Code Look Like?
    + Hello World
    + Example Gallery ->>
    + Open-Source Projects ->> 
      	
* Is Agile Toolkit Right For You?
    + What Types of Project Will Benefit?
		- Fast Evolving Requirements
		- Rich Data-Management Interfaces
		- Complex Data Interractions
		- Adaptable Application Platforms
	+ What Developer Skills Are Required?
		- Technical Skills
		- Developer Mindset
    + How Can I Learn Agile Toolkit?
		- User-friendly Documentation
		- Hands-on Tutorials
		- Practical Cookbook
		- Developer API
			* Reading The Code
		- Helpful Community
		- What Commercial Training is Available?
    + What Are The Other Issues With Adoption?
		((Please draw up some notes))
	+ Is The Licence Suitable?
		- Open Source Projects
		- Schools & Universities
		- Internal Commercial Use
		- Closed Source Web Apps
		- Large Web Apps
		- OEM Distribution
	+ What Is The Future Of Agile Toolkit?
		((Please draw up some notes))

* Installing Agile Toolkit								
    + Requirements										
	+ Installing With Composer 							
    + Installing Manually 								
	+ Starting A New Project 							
        - Using The Agile Toolkit Installer
        - Setting Up The Admin UI
    + Integrating With Existing Projects 				
    	- Overview
		- Integrating With CodeIgniter
    	- Integrating With Yii
    	- Integrating With Symfony
    	- Integrating With Joomla
    	- Integrating With Wordpress
    + Securing Your Installation 						
	+ Upgrading Your Installation 						
	+ Advanced Configuration 							
    + Troubleshooting 									

* Tutorials
	+ Hello World ->>
	+ DVD Rental (Beginner) ->>
	+ School Enrollment App (Intermediate) ->>
	+ See More Tutorials ->>
	+ How to Contribute Tutorials

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
	((Please draw up some notes))

* Understanding Agile Toolkit

	+ Overview

	+ Design Principles
		- Lessons From Desktop GUI Frameworks
    	- Simplicity: The Pragmatic Principle
		- Clarity: The Opinionated Structure Principle
      	- Lean Code: The 80/20 Principle
			* Tight Core
			* Rich Ecosystem
      	- Plugability: The Independence Principle
      	- Extensibility: The Object Principle
	
	+ Architecture
		((This will be a high-level overview to get people oriented. We'll go into the detail later))
		- The Object Tree
			* Goals
			* Implementation
		- The Application Object
		- The Page Object
		- The View Object
		- The Model Object
		- The Controller Object
		- How The Objects Collaborate
		- Walking Through An HTTP Request
		
	+ Differences From Conventional Frameworks
    	- Agile Toolkit vs PHP Server-Side Frameworks
     	- Agile Toolkit vs JavaScript Toolkits
     	- Agile Tookit vs Other Integrated Toolkits
			* Extensible Objects vs Code Generation
    	
    + Request Flow Chart
    + Agile Toolkit Cheat Sheet
	
	((I've broken up the very long section on Core code))

* Framework Structure
    + The Directory Structure
    	- Core Directories
      	- Addon Directories
      	- Application Directories
    + The Object Structure
      ((This is where we go into detail about features))
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

	+ Adding Objects

	+ Routing Requests
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
      	- Basic Usage
      	- Defining Queries
		- Running Queries
		- Advanced Usage
      	- Extending Queries
	+ Relational Models
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

* Official Addons
  
  	((RM: add-ons would be separate, but we need add-on development guide))
	((GC: Why woudn't we document the official addons here? What alternative are you suggesting?))
	+ Filestore
  	+ Google Maps
	+ Etc...
 	+ How To Create Your Own Addons
 		
* Cookbook  // shouldn't be section in DOC, whole new category on site!
 	+ A useful example of a Cookbook entry ->>
	+ Another useful cookbook entry ->>
	+ A final useful cookbook entry -->>
	+ See more Cookbook recipes ->>

 * ((Localization))