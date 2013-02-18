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

>>>>>>>>>>>>>>>>>>>
For example you can create a form, plug in layers of interactive, event-aware subcomponents, write your event handling code in PHP and the whole thing will automatically render and run. It all just works.
## What Are The Key Features Of Agile Toolkit?

We can sum up the key features under three headings:

* A fresh approach to Views
* A fresh approach to Models
* And a fresh approach to Addons (our term for plugins).

### A fresh approach to Views

As with a GUI development framework, in Agile Toolkit you build your UI by plugging together and configuring widgets such as buttons, fields, tabs, forms and grids. You lay out your interface, define widget behaviour, bind data and handle events exclusively on the server using PHP. All the AXAX plumbing is handled for you under the hood, and everything simply works. View components are objects, and can be extended and customized at will.

There's also a default styling system so your interface looks good from the get-go, but again, you can customize to your heart's content.

Even if you're a JavaScript guru there are payoffs for managing your client with PHP. Agile Toolkit is smart enough to handle the interractions between your interface objects with minimal developer input:

    // Show a flyout message when file upload completes

    $upload = $this->add('FileUploadComponent');
    $flyout = $this->add('FlyoutComponent');
    $upload->js('completed', $flyout->showJS());

### A fresh approach to Models

In Agile Toolkit, Models are fully integrated with View components, so data binding becomes as easy as this:

    $grid->setModel('Product');

Now the Toolkit will handle all the AJAX loading for you behind the scenes. 

But we went further. The Agile ORM is exceptionally flexible, and your queries can be  be extended and customised. With Agile Toolkit, you can build your agile application incrementally, adding new functionality by extending and customising existing objects without breaking your old code or your working tests. 

### A fresh approach to Addons

With the mainstream PHP frameworks the recent emphasis has been decoupling functionality into standalone [PSR-compliant](https://github.com/php-fig/fig-standards/tree/master/accepted) libraries.  

By contrast, Agile Toolkit Addons are highly coupled to the Toolkit. You lose a certain degree of code portability, but you gain a great deal of built-in functionality. So your UI Addons, for example, get immediate access to all the built-in styling and JavaScript smarts of the Toolkit Core. 

