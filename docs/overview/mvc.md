# Overview > A Fresh Approach To MVC

## The Agile Toolkit Approach To MVC

Agile Toolkit takes a highly opinionated approach to MVC, building it into the object structure of the framework. Every line of code you write (excluding Exceptions) is descended from an `AbstractModel` class, an `AbstractView` class, or an `AbstractController` class. So everything in your application is either a Model, a View or a Controller. 

Each of these components has a well-defined role, so in Agile Toolkit it's usually pretty clear what should go where. This architectural consistency helps when working with teams or sharing code with the community.

But it's important to note that the division of labor between Models, Views and Controllers is different from the typical MVC framework. 

## What Is A Model In Agile Toolkit?

In Agile Toolkit, a Model encapsulates: 

* The data associated with an entity
* The business logic that's specific to that entity
* The persistence of the entity in a database or file.

You'll build your relational Models with [Agile ORM](/TODO), an [object-relational mapper](http://en.wikipedia.org/wiki/Object-relational_mapping) offering an innovative blend of simplicity, flexibilty and performance. And [support for NoSQL](/TODO) is available too, though currently not at the same level of sophistication.

Models implement our [Composability](/TODO) design principle: complex Models can be composed from simpler Models. For example, you can create a Model for a type of `price` or `date` and reuse it in other Models.

And crucially, models also implement our [Extensibility](/TODO) principle. Because you can reconfigure all aspects of your queries Agile ORM Models can be easily extended to deal with evolving use-cases without refactoring your existing code.

For example, a `user` Model could be extended into a `superuser` Model, an `active_user` Model, and an `admin_user` Model, or whatever your application requires. Any behaviour common with the parent can be maintained or overridden, and new actions can be added to work with any subset of the relevant fields. A powerful feature of extended Models is the ability to add filters to ensure that only entities with the correct charateristics can be modified by the extended object, eliminating a whole class of bugs. 

As we have seen, best practice for adding new functionality in Agile Toolkit generally involves extending existing code rather than refactoring the original object. The parent Model and its tests remain intact and classes using the parent continue to function. The new functionality is encapsulated in the extended Model and can be tested separately. There's a clean separation of concerns.

The combination of Model Composability, Model Extendability, and the ability to inject reusable business logic into Models with Controllers (as explained below) helps ensure that your Toolkit Models will remain lean, agile and reliable.

## What Is A View In Agile Toolkit?

In many MVC frameworks the View is defined as the complete response. 

In Agile Toolkit a View is any component that uses the Agile Toolkit template engine  to generate output in HTML, XML, JSON or other response format. 

The reason for this difference is our focus on [Composability](/TODO) &ndash; building complex Views from simple View component. So for an HTML request a View can be: 

* **A low-level component** such as a button, a dropdown menu or a  search box 
* **A composite component** composed from low-level View components and simpler composite view components, such as a complex grid or a complete form.

Views are independent of each other and can be plugged together freely. When the response is fully configured, complex trees of Views are rendered automatically.

Views also implement our [Abstraction](/TODO) design principle:
You lay out your interface, define widget behaviour, bind data and handle events exclusively on the server using PHP. All the AXAX plumbing is handled for you under the hood, and everything simply works. 

* You can specify layout, define behaviour and handle server-side events through PHP.
* The built-in View components automate all the tiresome housekeeping issues such as the loading indicator, Json encoding, load-on-demand, dependencies, XSS avoidance and displaying user error messages

Even if you're a JavaScript guru there are payoffs for managing your client with PHP. Agile Toolkit is smart enough to handle the interractions between your interface objects with minimal developer input:

    // Show a flyout message when file upload completes

    $upload = $this->add('FileUploadComponent');
    $flyout = $this->add('FlyoutComponent');
    $upload->js('completed', $flyout->showJS());

Finally, Views also implement our [Extensibility](/TODO) principle: any aspect of any View component can be reconfigured with ease in a reusable extended class.

Naturally, you can bind a Model to a data-aware View component with a single line of code, and the View will adapt to its data.

    $grid->setModel('Product');

Now the Toolkit will handle all the AJAX loading for you behind the scenes. 

Views are styled with an integrated Bootstrap-like CSS framework that's easy to skin or adapt.

The Toolkit ships with a powerful collection of customizable View components, and it's easy to add your own.

## What Is A Page In Agile Toolkit?

Agile Toolkit offers a special type of View called a Page, designed as the end-point of an HTTP request. Requests are routed to Page objects, which marshal the Models, Views and Controllers required to generate the response, run the rendering and serve the output.

So viewed strictly, the architecture of Agile Toolkit it Model, Page, View, Controller.

## What Is A Controller In Agile Toolkit?

In Agile Toolkit **Controllers do not coordinate the response to HTTP requests** &ndash; this would normally be handled by Pages. Instead, Controllers encapsulate reusable services or business logic that can be embedded into multiple Models or Views. These can be:

* **Business logic**, such as shipping cost calculators
* **Wrappers** for external APIs such as email broadcasting, social networks or payment gateways
* **Service Classes** for coordinating complex activities between multiple Models
* **Utility Classes**, such as loggers or libraries for encryption and date manipulation
* **Complex configuration**, such as a class to add standard audit fields to Models.

Controllers can be thought of as similar to the Traits feature introduced in PHP 5.4, where bundles of methods can be embedded within multiple classes.

And Agile Toolkit's [Runtime Object Tree](/TODO) ensures that it's easy to ensure that Controller functionality is accessible wherever it's needed without any need for static methods.

## A Fresh Approach To Addons

Agile Toolkit also takes a different approach to building pluggable Views and Models aimed, as always, at improving Composability and Extendability.

With the mainstream PHP frameworks the recent emphasis has been decoupling functionality into standalone [PSR-compliant](https://github.com/php-fig/fig-standards/tree/master/accepted) libraries.  

By contrast, Agile Toolkit Addon Models and Views are highly coupled to the Toolkit. So your View Addons, for example, can automatically access to all the built-in styling and AJAX features of the Toolkit Core. 

There's a growing ecosystem of Agile Toolkit Addons. Official Addons are distributed in the `/atk4-addons` directory. They cover functionality such as internationalization and a range of useful user interface widgets.

And we've recently launched an [Addon marketplace](/TODO) for community and commercial Addons. It's early days, but we plan to expand this rapidly and invite you to contribute.

<!-- Will this be launched in time? -->

## Do you find yourself sceptical of this approach?

MVC is a loosely defined pattern, and many developers have become comfortable with their own interpretation. Sometimes newcomers to the Toolkit get stuck trying to square our approach with their own theoretical views on MVC. We urge you not to overthink the issue until you've had some hands-on experience of the practical advantages the approach in action. It evolved over a decade of corporate consulting and has proven it's effectiveness with challenging Agile projects. 
