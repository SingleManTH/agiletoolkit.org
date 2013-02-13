# Architecture & Design > A New Approach To MVC

## The Agile Toolkit Approach To MVC

Agile Toolkit takes a highly opinionated approach to MVC, building it into the object structure of the framework. Every line of code you write (excluding Exceptions) is descended from an `AbstractModel` class, an `AbstractView` class, or an `AbstractController` class. So everything in your application is either a Model, a View or a Controller. 

Each of these components has a well-defined role, so in Agile Toolkit it's usually pretty clear what should go where. This architectural consistency helps when working with teams or sharing code with the community.

But it's important to note that the division of labor between Models, Views and Controllers is different from the typical MVC framework. 

## What is a Model in Agile Toolkit?

In Agile Toolkit, a Model encapsulates: 

* The data associated with an entity
* The business logic that's specific to that entity
* The persistence of the entity in a database or file.

Models can be composed from other Models. For example, you can create a Model for a type of `price` or `date` and reuse it in other Models.

You'll build your relational Models with [Agile ORM](/TODO), an [object-relational mapper](http://en.wikipedia.org/wiki/Object-relational_mapping) offering an innovative blend of simplicity, flexibilty and performance. And [support for NoSQL](/TODO) is available too.

Agile ORM Models can be easily extended to deal with evolving use-cases without breaking or cluttering your existing code. so as we have seen a `user` Model could be extended into a `superuser` Model and you could also add an `active_user` Model, and `admin_user` Model or whatever you application requires. Each extended Model can modify or add actions on any subset of the relevant fields.

The combination of Model Composability, Model Extendability, and the ability to embed reusable business logic into Models with Controllers (as explained below) helps ensure that your Agile Toolkit Models will remain lean, agile and reliable.

## What is a View in Agile Toolkit?

In many MVC frameworks the View is defined as the complete response. 

By contrast, in Agile Toolkit a View is any component that uses the Agile Toolkit template engine  to generate output in HTML, XML, JSON or other response format. So for an HTML request a View can be: 

* **A low-level component** such as a button, a dropdown menu or a  search box 
* **A composite component** composed from low-level components, such as a complex grid or a complete form 
* **A total response**, such as an AJAX data entry system composed from many composite forms and grids arranged on tabs.

Agile Toolkit Views offer some pretty neat features to make this process as simple, fast and reliable as possible:

* Views are independent of each other and can be plugged together freely
* Complex trees of Views are rendered automatically
* View components like data grids are generic: plug in a Model and they will adapt to its data
* Views can can be manipulated with JQuery programically through PHP
* You handle client-side events by writing server-side PHP
* The built-in View components automate all the tiresome housekeeping issues such as the loading indicator, Json encoding, load-on-demand, dependencies, XSS avoidance and displaying user error messages
* View components are easy to extend and customize, and it's easy to wrap additional 3rd party JQuery widgets
* Views are styled with an integrated Bootstrap-like CSS framework that's easy to skin or adapt.

Agile Toolkit offers a special type of View called a Page, designed as the end-point of an HTTP request. Requests are routed to Page objects, which marshal the Models, Views and Controllers required to generate the response, run the rendering and serve the output.

The Toolkit ships with a powerful collection of customizable View components, and it's easy to add your own.

## What is a Controller in Agile Toolkit?

In Agile Toolkit **Controllers do not coordinate the response to HTTP requests** &ndash; this would normally be handled by Pages. Instead, Controllers encapsulate reusable services or business logic that can be embedded into multiple Models or Views. These can be:

* **Business logic**, such as shipping cost calculators
* **Wrappers** for external APIs such as email broadcasting, social networks or payment gateways
* **Service Classes** for coordinating complex activities between multiple Models
* **Utility Classes**, such as loggers or libraries for encryption and date manipulation
* **Complex configuration**, such as a class to add standard audit fields to Models.

Controllers can be thought of as similar to the Traits feature introduced in PHP 5.4, where bundles of methods can be embedded within multiple classes.

And Agile Toolkit's [Runtime Object Tree](/TODO) ensures that it's easy to ensure that Controller functionality is accessible wherever it's needed without any need for static methods.

## Do you find yourself sceptical of this approach?

MVC is a loosely defined pattern, and many developers have become comfortable with their own interpretation. Sometimes newcomers to the Toolkit get stuck trying to square our approach with their own theoretical views on MVC. We urge you not to overthink the issue until you've had some hands-on experience of the practical advantages the approach in action. It evolved over a decade of corporate consulting and has proven it's effectiveness with challenging Agile projects. 
