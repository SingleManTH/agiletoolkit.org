# Overview > Why Use Agile Toolkit?

## What Challenges Is Agile Toolkit Designed To Solve?

Agile Toolkit is a new kind of PHP framework focused on easing the development of rich-client AJAX applications. 

### The challenge of developing rich AJAX applications

The increasing importance of desktop-like AJAX interfaces is a game-changer for PHP application developers:

* Rich interfaces require complex HTML5 and CSS3
* We need non-trivial JavaScript in the client to enforce business rules, handle events and bind data structures to the interface
* We need to move data between the database, our PHP server-side objects and our JavaScript in the client
* For security, we need to double-check client-side business rules on the server
* And we have to tie all this together with AJAX calls and responses.

![The Web Technology Challenge](/dia-web-technologies.png)

### The limitations of mainstream solutions

The PHP community offers a wide choice of well-engineered MVC frameworks, but even the best can only offer a partial solution to the many challenges of developing rich client data-centric applications.

With some frameworks you create your AJAX data management system though code generation, and this can offer a rapid solution for straightforward requirements. But your application design is constrained by the features built into the generator, and you can end up adapting more complex projects to the framework rather than the framework to the project.

The other main option is a multi-framework development stack. Typically this involves a PHP MVC framework on the server-side, a JavaScript user interface framework such as JQuery UI on the client-side, and perhaps a CSS framework such as Bootstrap to ease the styling headache. But now you're working with two or three complex and overlapping frameworks in different languages, and you're still having to figure out your own way to tie them together with AJAX. It's a challenge to keep things [DRY](http://en.wikipedia.org/wiki/Don't_repeat_yourself) and avoid duplicating effort on the client and the server. The learning curve is steep. And the resulting code can be hard to test and tricky to change as requirements evolve. 

### The need for a fresh approach

Neither of these solutions met the needs of our busy web development house. So we set out to build a more integrated, flexible and reliable approach to developing rich web applications.

Though our experience of over 100 commercial projects, Agile Toolkit has evolved into a mature, production-ready development tool.

## What Unique Benefits Does Agile Toolkit Deliver?

With so many excellent PHP frameworks, any new project has to justify its existence by delivering distinctive and compelling benefits.

### Bringing the ease of desktop development to the web

We believe that conventional PHP frameworks offer very little help with building reusable user interface components, so Agile Toolkit borrows core principles found in desktop GUI frameworks such as Cocoa, QT and .Net. This means that:

* The framework provides a consistent, professional look and feel for your application, based on standard UI components such as buttons, menus, forms and fields
* The look and feel is easy to skin or customise
* Actual implementation of a UI component (HTML template, JavaScript widgets, events and CSS) is abstracted and knowledge of the underlying nuts and bolts is not necessary to build your application
* In general everything is done in PHP, including configuration, Models and advanced data queries, and View layout, logic and event binding
* Components are modular and independent &ndash; for example placing multiple CRUD components on the same page or embedding them inside your custom component is simple and intuitive
* UI logic is cleanly separated from business logic by design
* And your data structures bind seamlessly to your interface widgets.

Agile Toolkit brings the convenience and power of desktop frameworks to PHP developers building data-centric AJAX applications.

### How is Agile Toolkit different?

We call our solution a Toolkit rather than a framework because the focus is on rapid development with reusable interface and business components. And we call it Agile because the components are designed to adapt easily and reliably as agile requirements evolve.

Compared to conventional PHP MVC frameworks, you'll be working with:

* **A fresh approach to Views**: building a rich user experience by snapping together flexible, event-aware View components using only PHP on the server ([see more...](/TODO)) 
* **A fresh approach to Models**: building your business logic in Models that bind directly to your View components and adapt robustly as requirements evolve ([see more...](/TODO)) 
* **A fresh approach to Addons**: plugging in additional functionality from an ecosystem of Addons that take full advantage of the AJAX, event handling and styling features of the Toolkit Core ([see more...](/TODO)).

### The payoff

So what is the payoff for you, the developer? Quite simply, AJAX applications that are:

* Easier to build
* Easier to test, and
* Easier to change.

### Example: a full-featured CRUD UI in two lines of code

To demonstrate the agility of the Agile Toolkit approach, here's how you'd build a fully AJAXed [CRUD](http://en.wikipedia.org/wiki/Create,_read,_update_and_delete) application.  Let's start with the vanilla built-in CRUD component:

    $crud=$this->add('CRUD');
    $grid->setModel('Employee');

That's it &ndash; our page is now displaying an attractive and functional CRUD interface.

In Agile Toolkit CRUD is just another component, with many powerful and flexible features built-in:

    $crud->addPaginator(5);
    $grid->addQuickSearch(array('name'));

And components are easy to extend and customize. CRUD is a composite View relying on Grid, Form and Button Views and we can interact with those subcomponents directly:

    $crud=$this->add('CRUD');
    $crud->setModel('Book');

    if ($crud->grid) {
        if ($crud->grid->addButton('Populate Data')->isClicked()) {
            $crud->grid->model->populateData();
            $crud->grid->js()->reload()->execute();
        }
    }

Now we have a button which uses some AJAX to repopulate the CRUD form with a default data set. As you can see, there's no need to get your hands dirty with the AJAX internals. The actual implementation of `populateData()` is part of the business logic and resides in `Model_Book`.

Now let's add a relational join:

    $book=$this->add('Model_Book');
    $author=$book->leftJoin('author');
    $author->addField('author_name','name')->editable(false);

    $crud=$this->add('CRUD');
    $crud->setModel($book);

    if ($crud->grid) {
        if ($crud->grid->addButton('Populate Data')->isClicked()) {
            $crud->grid->model->populateData();
            $crud->grid->js()->reload()->execute();
        }
    }

Our CRUD component is displaying data from 2 tables. But in Agile Toolkit it would be better style to encapsulate our join in a new Model:

    class Model_BookWithAuthor extends Model_Book
    {
        function init()
        {
            parent::init();
            $author=$this->leftJoin('author');
            $author->addField('author_name','name')->editable(false);
        }
    }

Models in Agile Toolkit are powerful and flexible with many unique features &ndash; this is merely a first glimpse of how they work.

Finally, you might want to have CRUD with the 'Populate Data' button as a standard component, so let's move it into another new class:

    class MyCRUD extends CRUD
    {
        function render()
        {
            if ($this->grid && $this->grid->model->hasMethod('populateData'))) {
                if ($this->grid->addButton('Populate Data')->isClicked()) {
                    $this->grid->model->populateData();
                    $this->grid->js()->reload()->execute();
                }
            }
            parent::render();
        }
    }

So now we can use our two new components with just two lines of code:

    $crud=$this->add('MyCRUD');
    $crud->setModel('BookWithAuthor');

This example gives you a quick taste some of the most powerful features of Agile Toolkit:

* You can easily enhance existing components and even interact with the subcomponents they're built from
* Code in Models and Views can be quickly refactored to encapsulate new functionality without disrupting existing code and tests
* You can develop and test custom components separately, then combine them into a UI of any complexity.


## Can I Use Agile Toolkit With My Existing Code?

We recognise that many developers will be coming to Agile Toolkit with a significant investment in other MVC frameworks, or in content management frameworks such as WordPress, Drupal and Joomla. 

If you want to add sophisticated data handling to your legacy code, Agile Toolkit is designed to play well with other frameworks. For example you might use the Agile Toolkit UI features for just a couple of pages inside your CodeIgniter project, or you can use the unique features of the Agile Toolkit ORM to build the REST interface for your JavaScript frontend. Most commonly, developers decide to rewrite their backend/admin system using Agile Toolkit as a first step towards integration. You'll find more details [here](/TODO).
