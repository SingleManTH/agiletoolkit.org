# Overview > A Fresh Approach To MVC

## The Agile Toolkit Approach To MVC

Agile Toolkit has refactored the MVC pattern to better meet the realities of rich application development. It takes a highly opinionated approach to MVC, building it into the object structure of the framework. Every class you write (excluding Exceptions) is descended from an `AbstractModel` class, an `AbstractView` class, or an `AbstractController` class. So everything in your application is either a Model, a View or a Controller. 

And in contrast to many frameworks, Models, Views and Controllers are all proper classes with powerful built-in functionality designed to be extended, overriden or encapsulated.

Each of these components has a well-defined role, so in Agile Toolkit it's usually pretty clear what should go where. This architectural consistency helps when working with teams or sharing code with the community.

But it's important to note that the division of labor between Models, Views and Controllers is different from the typical MVC framework. 

## What Is a Model In Agile Toolkit?

In Agile Toolkit, a Model encapsulates: 

* The data structure of an entity
* The business logic that's specific to that entity
* Persistent external storage
* Record-level access.

You'll build your relational Models with [Agile ORM](/TODO), an [object-relational mapper](http://en.wikipedia.org/wiki/Object-relational_mapping) offering an innovative blend of simplicity, flexibility and power. We also offer basic [support for NoSQL](/TODO) compatible with wide array of non-relational databases.

Models implement our [Composability](/TODO) design principle. For example: `Model_Book` may contain a field `author_id` which references `Model_Author` and Form will automatically use a drop-down (or auto-complete) allowing you to select a relevant entry from the related Model. 

Through Addons you can add support for much more advanced fields such as `Image`, where a user's image is uploaded, cropped, thumbnailed, stored and associated with your Model entirely behind the scenes, following best principles of [Abstraction](/TODO)

And crucially, models also implement our [Extensibility](/TODO) principle. Because you can reconfigure all aspects of your queries Agile ORM Models can be easily extended to deal with evolving use-cases without refactoring your existing code.

For example, a `user` Model could be extended into a `superuser` Model, an `active_user` Model, and an `admin_user` Model, or whatever your application requires. Any behavior common with the parent can be reused or overridden, and new actions can be added to work with any subset of the relevant fields. A powerful feature of extended Models is the ability to add filters to ensure that only entities with the correct charateristics can be modified by the extended object, eliminating a whole class of bugs. 

Furthermore you can use hooks to supply actions which Model performs at certain times, such as `afterLoad` or `beforeSave`.

In Agile Toolkit, best practice for adding new functionality generally involves extending existing code rather than refactoring the original object. The parent Model and its tests remain intact and classes using the parent continue to work  correctly. The new functionality is encapsulated in the extended Model and can be tested separately. There's a clean separation of concerns highly suitable for Agile development and clearly implementing our [Testability](/TODO) principle.

The combination of Model Composability, Model Extendability and the ability to inject reusable business logic into Models with Controllers (as explained below) helps ensure that your Toolkit Models will remain lean, agile and reliable.

## What Is A Page In Agile Toolkit?

Agile Toolkit offers a special type of View called a Page which organises the response to a particular URL. In desktop frameworks an Agile Toolkit Page would often be called a 'Presenter'.

Requests are routed to Page classes, which organize the Views required to render the response.

## What Is A View In Agile Toolkit?

In Agile Toolkit, you can think of a View as a UI widget or component. A View can appear anywhere: inside another View, on a particular page or on multiple pages. 

### View Composability

Views implement our [Composability](/TODO) design principle: you would typically plug together simple Views to compose complex widgets, and lay out multiple widgets to make a page. 

For example:

- A button is a simple View which enhances itself with jQueryUI button widget
- `Form` is a great example of a composite View, built from field Views, fieldset Views and button Views.

You can add Views freely to Pages or to other Views and they will never conflict visually or logically.

A typical page in Agile Toolkit would be composed from 5-20 Views. Despite the number, each View contains its own template and the rendering overhead is minimal.

### View Abstraction

Views also implement our [Abstraction](/TODO) design principle: you lay out your interface, define widget behavior, bind data and handle events exclusively on the server using PHP. All the tiresome AJAX plumbing is handled for you under the hood, and everything simply works. For example:

- **Event binding**: you can bind JavaScript events to Views using simple PHP: `$button->js('click', $form->js()->submit());`
- **AJAX reloading**: any view in the response can be 'reloaded' through AJAX without any extra effort.

Agile Toolkit is smart enough to handle the interactions between your interface objects with minimal developer input:

    // Show a flyout message when file upload completes

    $upload = $this->add('FileUploadComponent');
    $flyout = $this->add('FlyoutComponent');
    $upload->js('completed', $flyout->showJS());

This also applies when you're composing complex widgets. For example, `Paginator` in `Grid` is implemented as a separate View and enables AJAX communication between the browser and Grid as you paginate. You don't need to teach Grid how to communicate with `Paginator` &ndash; Agile Toolkit does it for you.

    $grid->addPaginator(5);

Even if you're a JavaScript guru comfortable working directly with widgets such as jqGrid, Agile Toolkit can still help. You can encapsulate your JavaScript dependencies into a PHP object allowing any user from your team or the Agile Toolkit community to simply `add()` your grid anywhere as a drop-in replacement for the built-in Toolkit grid. 

### Other View features

In addition, the design of Agile Toolkit Views offer the developer:

- **Automatic rendering**: Pages render automatically, and composite Views render their children recursively
- **Extensibility**: Views are objects &ndash; you can create your own reusable widgets or extend existing ones
- **Encapsulation**: Views encapsulate their own templates, which keeps your HTML clean
- **Presentational flexibility**: you can inject custom HTML into a View template without redefining it
- **Layout customization at runtime**: Views can be deleted or moved through simple PHP code
- **Integration**: Views can depend on additional JavaScript or CSS libraries and Agile toolkit will ensure they are loaded on-demand
- **Plugability**: Addons offer fully styled and customizable Views ranging from simple widgets such as an Autocomplete Field up to complex applications such as a Visual Form Designer or a Content Management System.

Naturally, you can bind a Model to a data-aware View component with a single line of code, and the View will adapt to its structure.

    $grid->setModel('Product');

And finally, Views are automatically styled with an integrated Bootstrap-compatible CSS framework based on [JQuery UI themeroller](http://jqueryui.com/themeroller/), which can be used  to theme your Agile Toolkit application.

## What Is A Controller In Agile Toolkit?

In most MVC frameworks, Controllers organize the response to HTTP requests. As we've seen, in Agile Toolkit this is handled by Pages.

Controllers in Agile Toolkit are similar to PHP5.4 Traits: they can be added to Models and Views to extend their functionality.

For example you can add Controllers to the API to provide global functionality:

- `Logger`: extends Application to provide more powerful exception reporting and logging tools
- `DB`: Provides connectivity with database

Or you can use controllers in one or more View and Models:

- `Order`: Allows you to re-arrange elements, for example if you want to change field order in a form
- `ModelAudit`: Enables soft-delete, created datetime and updated datetime inside your Model.

Uses for Controllers include:

* **Pluggable business logic**, such as shipping cost calculators
* **Wrappers** for external APIs such as email broadcasting, social networks or payment gateways
* **Service classes** for coordinating complex interactions between multiple Models
* **Utility classes**, such as libraries for encryption and date manipulation
* **Object configurators**, such as a class to add standard audit fields to Models.

The only limit is the developer's imagination. 

## A Fresh Approach To Addons

A critical aspect of an MVC architecture is the ability to plug in additional View and Model components of any complexity.

Here too Agile Toolkit takes a fresh approach aimed, as always, at improving Composability and Extensibility.

With mainstream PHP frameworks the recent emphasis has been decoupling functionality into standalone [PSR-compliant](https://github.com/php-fig/fig-standards/tree/master/accepted) libraries. 

By contrast, Agile Toolkit Addons are designed to rely on Agile Toolkit base classes. They are likely to offer you new Model and Views classe and are highly coupled to the Toolkit so you get seamless access to all the core features.

For example, you could plug your existing User Model directly into a User Management Addon and seamlessly integrate the supplied Views into your Interface.

There's a growing ecosystem of Agile Toolkit Addons and the your install will offer a native User Interface to browse and install more Addons from either packagist.org or agiletoolkit.org.
