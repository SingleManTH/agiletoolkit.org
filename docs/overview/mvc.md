# Overview > A Fresh Approach To MVC

## The Agile Toolkit Approach To MVC and Presenters

Agile Toolkit has refactored the MVC pattern to better meet the realities of rich application development. It takes a highly opinionated approach to MVC, building it into the object structure of the framework. Every line of code you write (excluding Exceptions) is descended from an `AbstractModel` class, an `AbstractView` class, or an `AbstractController` class. So everything in your application is either a Model, a View or a Controller. 

Each of these components has a well-defined role, so in Agile Toolkit it's usually pretty clear what should go where. This architectural consistency helps when working with teams or sharing code with the community.

But it's important to note that the division of labor between Models, Views and Controllers is different from the typical MVC framework. 

## How Models Views and Controllers are connected

![MVC and Presenter implementation in Agile Toolkit](tmp-mvc-presenter.png)

Strictly speaking, Views in Agile Toolkit are often "Presenters" (especially when View is using composition), while Model and Controller can be optional. As a UI developer, your primary task is to add a proper view inside another view and associate it with proper model. Agile Toolkit may add one or few controllers along the way as a "grease" to help View work with your Model better.

We define the top-most object, an Application also as a View. This view would contain a Page View which then may contain CRUD View which contain Form View which contain Fields and Buttons Views.

In this typical tree some of the complex views would be associated with Model (CRUD and Form) and other views may contain controllers (DB and Logger in Application).


## What Is a Model In Agile Toolkit?

In Agile Toolkit, a Model encapsulates: 

* The data structure of an entity
* The business logic that's specific to that entity
* Definition of persistent external storage
* Record-level access

You'll build your relational Models with [Agile ORM](/TODO), an [object-relational mapper](http://en.wikipedia.org/wiki/Object-relational_mapping) offering an innovative blend of simplicity, flexibility and power or using a basic [support for NoSQL](/TODO) compatible with wide array of non-relational databases.


Models implement our [Composability](/TODO) design principle: Models consist of Fields which can be associated with other Models. For example `Model_Book` may contain a field `author_id` which references `Model_Author` and Form will automatically use a drop-down (or auto-complete) allowing you to select a relevant entry from related model. Through add-ons you can add support for much more advanced fields such as `Image` which is uploaded, cropped thumbnailed and stored in unique folder then associated with your model entirely behind the scenes following best principle of [Abstraction](/TODO)

And crucially, models also implement our [Extensibility](/TODO) principle. Because you can reconfigure all aspects of your queries Agile ORM Models can be easily extended to deal with evolving use-cases without refactoring your existing code.

For example, a `user` Model could be extended into a `superuser` Model, an `active_user` Model, and an `admin_user` Model, or whatever your application requires. Any behavior common with the parent can be reused or overridden, and new actions can be added to work with any subset of the relevant fields. A powerful feature of extended Models is the ability to add filters to ensure that only entities with the correct charateristics can be modified by the extended object, eliminating a whole class of bugs. 

In Agile Toolkit, best practice for adding new functionality generally involves extending existing code rather than refactoring the original object. The parent Model and its tests remain intact and classes using the parent continue to work  correctly. The new functionality is encapsulated in the extended Model and can be tested separately. There's a clean separation of concerns.

The combination of Model Composability, Model Extendability and the ability to inject reusable business logic into Models with Controllers (as explained below) helps ensure that your Toolkit Models will remain lean, agile and reliable.

## What Is A View In Agile Toolkit?

In many MVC frameworks the View is defined as the complete response. 

In Agile Toolkit a View is any component that uses the Agile Toolkit template engine  to generate output in HTML, XML, JSON or other response format. 

The reason for this difference is our focus on [Composability](/TODO) &ndash; building complex Views from simpler View components. 

So for an HTML request a View can be: 

* **A low-level component** such as a button, a dropdown menu or a search box 
* **A composite component** such as a form or multi-featured grid composed from low-level View components and simpler composite components.

Views are independent of each other and can be plugged together freely. When the response is fully configured, complex trees of Views are rendered automatically for output.

Views also implement our [Abstraction](/TODO) design principle:
You lay out your interface, define widget behaviour, bind data and handle events exclusively on the server using PHP. All the tiresome AXAX plumbing is handled for you under the hood, and everything simply works. 

Even if you're a JavaScript guru there are payoffs for managing your client with PHP. Agile Toolkit is smart enough to handle the interractions between your interface objects with minimal developer input:

    // Show a flyout message when file upload completes

    $upload = $this->add('FileUploadComponent');
    $flyout = $this->add('FlyoutComponent');
    $upload->js('completed', $flyout->showJS());

Views also implement our [Extensibility](/TODO) principle: any aspect of any View component can be reconfigured with ease in a reusable extended class.

Naturally, you can bind a Model to a data-aware View component with a single line of code, and the View will adapt to its data.

    $grid->setModel('Product');

Now the Toolkit will handle all the AJAX loading for you behind the scenes. 

Finally, Views are automatically styled with an integrated Bootstrap-like CSS framework that's quick to skin or adapt.

The Toolkit ships with a powerful collection of customizable View components, and it's easy to add your own.

## What Is A Page In Agile Toolkit?

Agile Toolkit offers a special type of View called a Page, designed as the end-point of an HTTP request. Requests are routed to Page objects, which marshal the Models, Views and Controllers required to generate the response, run the rendering and serve the output.

So viewed strictly, the architecture of Agile Toolkit is Model, Page, View, Controller.

## What Is A Controller In Agile Toolkit?

In Agile Toolkit **Controllers do not coordinate the response to HTTP requests** &ndash; this would normally be handled by Pages. Instead, Controllers encapsulate reusable services or business logic that can be embedded into multiple Models or Views. These can be:

* **Business logic**, such as shipping cost calculators
* **Wrappers** for external APIs such as email broadcasting, social networks or payment gateways
* **Service classes** for coordinating complex interactions between multiple Models
* **Utility classes**, such as loggers or libraries for encryption and date manipulation
* **Object configurators**, such as a class to add standard audit fields to Models.

Controllers can be thought of as similar to the Traits feature introduced in PHP 5.4, where bundles of methods can be embedded within multiple classes.

And with Agile Toolkit's [Runtime Object Tree](/TODO) it's easy to ensure that Controller functionality is accessible wherever it's needed without any need for static methods.

## A Fresh Approach To Addons

A critical aspect of an MVC architecture is the ability to plug in additional View and Model components.

Here too Agile Toolkit takes a fresh approach aimed, as always, at improving Composability and Extensibility.

With mainstream PHP frameworks the recent emphasis has been decoupling functionality into standalone [PSR-compliant](https://github.com/php-fig/fig-standards/tree/master/accepted) libraries.  

By contrast, Agile Toolkit Addon Models and Views are highly coupled to the Toolkit. So your View Addons, for example, can automatically access all the built-in Composability, AJAX and styling features of the Toolkit Core. 

There's a growing ecosystem of Agile Toolkit Addons. Official Addons are distributed in the `/atk4-addons` directory. They cover functionality such as internationalization and a range of useful user interface widgets.

And we've recently launched an [Addon marketplace](/TODO) for community and commercial Addons. It's early days, but we plan to expand this rapidly and invite you to contribute.

<!-- Will this be launched in time? -->

## Do you find yourself sceptical of this approach?

MVC is a loosely defined pattern, and many developers have become comfortable with their own interpretation. Sometimes newcomers to the Toolkit get stuck trying to square our approach with their own theoretical views on MVC. We urge you not to overthink the issue until you've had some hands-on experience of the practical advantages this approach in action. It evolved over a decade of corporate consulting and has proven its effectiveness with challenging Agile projects. 
