# Architecture & Design > Model, View, Controller'

## The Agile Toolkit Approach To MVC

Agile Toolkit takes a highly opinionated approach to MVC, building it into the object structure of the framework. Every line of code you write (excluding Exceptions) is descended from an `AbstractModel` class, an `AbstractView` class, or an `AbstractController` class. So everything in your application is either a Model, a View or a Controller. 

Each of these components has a well-defined role, so in Agile Toolkit it's usually clear what should go where. This helps when working with teams or sharing code with the community.

But it's important to note that the division of labor between these components is different from the typical MVC framework. 

## What is a Model in Agile Toolkit?

In Agile Toolkit, a Model encapsulates the data associated with an entity and the business logic that's specific to that entity. Models also handle data persistence.

Models can be composed from other Models. For example, you can create a Model for a type of `price` or `date` and reuse it in other Models.

If you're using a relational database, you can build your Models with [Agile ORM](/TODO), an [object-relational mapper](http://en.wikipedia.org/wiki/Object-relational_mapping) offering and innovative blend of simplicity, flexibilty and performance. And [support for NoSQL](/TODO) is available too.

Agile ORM Models can be easily extended to deal with a range of use-cases without breaking or cluttering your existing code. For example a `user` Model could be extended into an `active_user` Model and a `superuser` Model, each performing modified or additional actions on different sets of fields. 

The combination of Model composition, Model extension, and the ability to embed reusable business logic into Models (as explained below) helps ensure that your Models will remain lean, agile and reliable.

## What is a View in Agile Toolkit?

In many MVC frameworks the View is defined as the complete response. 

By contrast, in Agile Toolkit a View is any component that generates output in HTML, XML, JSON or other response format. So for an HTML request a View can be: 

* **A low-level component** such as a button, a dropdown menu or a  search box 
* **A composite component** composed from low-level components, such as a complex grid or a complete form. 
* **A total response**, such as a data entry system composed from many composite forms and grids arranged on tabs.

Agile Toolkit Views offer some pretty neat features to make this process as simple, fast and reliable as possible:

* Views are independent of each other and can be plugged together freely
* Complex trees of Views are rendered automatically
* View components are easy to extend and customize
* Views can manipulate jQuery and jQuery UI programically through PHP
* The built-in View components automate issues such as AJAX event handling, XSS avoidance and user error messages
* Views are styled with a Bootstrap-like CSS framework that's easy to skin or adapt.

Agile Toolkit offers a special type of View called a Page, designed as the end-point of an HTTP request. Requests are routed to Page objects, which marshal the Models, Views and Controllers required to generate the response, run the rendering and serve the output.

The Toolkit ships with a powerful collection of customizable View components, and it's easy to add your own.

## What is a Controller in Agile Toolkit?

In Agile Toolkit **Controllers do not coordinate the response to HTTP requests** &ndash; this would normally be handled by Pages. Instead, Controllers encapsulate reusable services or business logic that can be embedded into multiple Models or Views. These can be:

* **Business logic**, such as shipping cost calculators or staff bonus calculators
* **Wrappers** for external APIs such as email broadcasting, social networks or payment gateways
* **Service Classes** for coordinating complex activities between multiple Models
* **Utility Classes**, such as loggers or libraries for string, date and array manipulation.

Controller can be thought of as similar to the Traits feature introduced in PHP 5.4, where bundles of methods can be embedded within multiple classes.

## Do you find yourself sceptical of this approach?

MVC is a loosely defined pattern, and many developers have become comfortable with their own interpretation. Sometimes newcomers to the Toolkit get stuck trying to square this approach with their own theoretical views on MVC. We urge you not to overthink the issue until you've had some hands-on experience of the practical advantages of this approach. It evolved over a decade of corporate consulting and has proved effective for both the development and the maintenance of challenging Agile projects. 
