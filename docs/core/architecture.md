# Understanding The Architecture > Overview

## Introduction

Agile Toolkit's interpretation of the Model-View-Controller ([MVC](http://en.wikipedia.org/wiki/Model%E2%80%93view%E2%80%93controller)) pattern is quite different from most other PHP frameworks. 

In this article we explain the high-level design priorities and concepts as a foundation for understanding the more detailed workings of the framework.

## What Problem Is Agile Toolkit Designed To Solve?

Agile Toolkit was developed in response to the increasingly complexity of web interfaces, particularly with data-intensive web applications. These days developers can find themselves juggling with HTML5, CSS3, jQuery, jQuery UI, AJAX, PHP, SQL and all the interactions between them. It's tough to write agile and testable applications. 

The aim of Agile Toolkit is to greatly reduce this complexity by wrapping SQL, AJAX, jQuery, jQuery UI, CSS3 and HTML5 behind a clean, object-oriented PHP API. Inspired by Object Oriented GUI Frameworks such as NeXTSTEP and Cocoa, the Toolkit enables you to craft reliable, flexible, reusable data and GUI components quickly and easily in PHP, snapping them together to create powerful custom applications.

To give you a taste of the benefits of this approach, here is a complete [CRUD](http://en.wikipedia.org/wiki/Create,_read,_update_and_delete) system for managing a user table. If offers: an attractive, themable gui; a search feature; column sorting; paging; validated entry forms; user error messages; [XSS](http://en.wikipedia.org/wiki/Cross_site_scripting) protection; SQL injection protection; error logging and more:

    TODO

<!-- 
    $crud=$p->add('CRUD');
    $crud->setModel('Employee',
                array('name','days_worked','salary'));
if($crud->grid)
        $crud->grid->addPaginator(5);
-->

## Design Principles

Before we discuss the specific architecture, here are some important princples you'll see applied throught the framework.

### The Simplicity Principle

As the name implies, Agile Toolkit was developed as a working tool, not as an exercise in academic purity. We always try to use the simplest possible approach &ndash; for example:

* Configuration files are plain old PHP hashes, so if you want complex conditional configurations just pop in some code.
* Namespacing isn't used within the core code. It's never caused any practical problems and we avoid tedium like this:

```
    namespace Acme\TaskBundle\Controller;

    use Symfony\Bundle\FrameworkBundle\Controller\Controller;
    use Acme\TaskBundle\Entity\Task;
    use Symfony\Component\HttpFoundation\Request;
```

```

* We use good old $\_GET and $\_POST rather than some kind of complex request object.

You'll find this kind of pragmatic thinking throughout the code base. It helps to keep the code tight and the learning curve low.

### The Leaness Principle

We've been careful not to bloat the core with functionality that's rarely useful. Instead we've built a robust approach to pluggable Addons which can easily access the full power of the core objects. There are many official Addons, and a growing marketplace for free and commercial Addons too.

### The Composability Principle

As you'll see, we've gone to great lengths to ensure that data components and UI components can snap together without problems with name-clashes or data corruption. This makes it easy to compose complex components out of simple and reliable building-blocks.

### The Extensibility Principle

We've used innovative techniques to ensure that your Model and View objects can be extended and modified with ease. This means that your components become more agile, adaptable and useful.


## The Agile Toolkit Approach To MVC

Agile Toolkit takes a highly opinionated approach to MVC, building it into the object structure of the framework. Every line of code you write (excluding Exceptions) is descended from an `AbstractModel` class, an `AbstractView` class, or an `AbstractController` class. So everything in your application is either a Model, a View or a Controller. 

Each of these components has a well-defined role, so in Agile Toolkit it's normally clear what should go where. This helps when working with teams or sharing code with the community.

But it's important to note that the division of labor between these components is different from the typical web framework. 

### What is a Model in Agile Toolkit?

In Agile Toolkit, a Model encapsulates the data associated with an Entity and the business logic that is specific to that entity. 

Models can be composed from other Models. For example, you can create a Model for an entity such as `price` or `date` and reuse it in other Models.

If you're using an RDBMS, you can build your Models with [Agile ORM](/TODO), an [Object-Relational Mapper](http://en.wikipedia.org/wiki/Object-relational_mapping) offering and innovative blend of simplicity, flexibilty and performance. And [support for NoSQL](/TODO) is available too.

Agile ORM Models can be easily extended to deal with a range of use-cases without breaking or cluttering your existing code. For example a `user` Model could be extended into an `active_user` Model and a `superuser` model, each performing different actions on a different set of fields. 

The combination of Model composition, Model extension, and the ability to embed reusable business logic into Models (as explained below) helps ensure that your Models will remain lean, agile and reliable.

### What is a View in Agile Toolkit?

In many MVC frameworks the View is defined as the complete response. 

By contrast, in Agile Toolkit a View is any component that generates output in HTML, XML, JSON or other response format. So for an HTML request a View can be: 

* **A low-level component** such as a button, a dropdown menu or a  search box 
* **A composite component** composed from low-level components, such as a complex grid or a complete form. 
* **A total response**, such as a data entry system composed from many composite forms and grids arranged on tabs.

Agile Toolkit Views offer some pretty neat features to make this process as simple, fast and reliable as possible:

* Views are independent of each other and can be plugged together without any problems with name clashes or data corruption
* Complex trees of Views are rendered automatically
* View components are easy to extend and customise
* Views can manipulate jQuery and jQuery UI programically through PHP
* The built-in View components automate issues such as AJAX event handling, XSS avoidance and user error messages
* Views are styled with a Bootstrap-like CSS framework that's easy to skin or adapt.

Agile Toolkit offers a special type of View called a Page, designed as the end-point of an HTTP request. Requests are routed to Page objects, which marshal the Models, Views and Controllers required to generate the response, run the rendering and serve the output.

The Toolkit ships with a powerful collection of customizable View components, and it's easy to add your own.

### What is a Controller in Agile Toolkit?

In Agile Toolkit, **Controllers do not coordinate the response to HTTP requests** &ndash; this would normally be handled by Pages. Instead, Controllers encapsulate reusable services or business logic that can be embedded into multiple Models or Views. These can be:

* **Business logic**, such as shipping calculators or discount calculators
* **Wrappers** for external APIs such as email broadcasting, social networks or payment gateways
* **Service Classes** for coordinating complex activities between multiple Models
* **Utility Classes**, such as loggers or libraries for string, date and array manipulation.


Controller can be thought of as similar to the Traits feature introduced in PHP 5.4, where bundles of methods can be embedded within multiple classes.

### Do you find yourself sceptical of this approach?

MVC is a loosely defined pattern, and many developers have become comfortable with their own interpretation. Sometimes newcomers to the Toolkit get stuck trying to square this approach with their own theoretical views on MVC. We urge you not to overthink the issue till you've had some hands-on experience of the practical advantages when working with complex interfaces. The approach evolved over a decade of corporate consulting and has proved effective for both the development and the maintenance of challenging Agile projects. 

## How The MVC Components Collaborate

### The application object

### The runtime object tree

## HTTP Request Walkthough
