# Overview > Why Use Agile Toolkit?

## What Challenges Is Agile Toolkit Designed To Solve?

Agile Toolkit is a new kind of PHP framework focused on easing the development of rich-client AJAX applications. 

### The challenge of developing rich AJAX applications

The increasing importance of desktop-like AJAX interfaces is a game-changer for PHP application developers:

* Rich interfaces require complex HTML5 and CSS3
* We need non-trivial JavaScript in the client to enforce business rules, handle events and bind data structures to the interface
* We need to move data between the database, our PHP server-side objects and our JavaScript in the client
* For security, we need to double-check client-side business rules on the server
* And we have to tie all this together with AJAX calls in both directions.

![The Web Technology Challenge](/dia-web-technologies.png)

### The limitations of mainstream solutions

The PHP community offers an exceptional choice of well-engineered MVC frameworks, but even the best can only offer a partial solution to the many challenges of developing rich client data-centric applications.

With some frameworks you create your AJAX data management system though code generation, and this can offer a rapid solution for straightforward requirements. But your application design is constrained by the features built into the generator, and you can end up adapting more complex projects to the framework rather than the framework to the project.

The other main option is a multi-framework development stack. Typically this involves a PHP MVC framework on the server-side, a JavaScript user interface framework such as JQuery UI on the client-side, and perhaps a CSS framework such as Bootstrap to ease the styling headache. But now you're working with two or three complex and overlapping frameworks in different languages, and you're still having to figure out your own way to tie them together with AJAX. It's a challenge to keep things [DRY](http://en.wikipedia.org/wiki/Don't_repeat_yourself) and avoid duplicating effort on the client and the server. The learning curve is steep. And the resulting code can be hard to test and tricky to change as requirements evolve. 

### The need for a fresh approach

Neither of these solutions met the needs of our busy web development house. So we set out to build a more integrated, flexible and reliable approach to developing rich web applications.

## What Benefits Does Agile Toolkit Deliver?

With so many excellent PHP frameworks, any new project has to justify its existence by delivering dictinctive and compelling benefits.

### Bringing the ease of desktop development to the web

Our inspiration has been desktop GUI frameworks such as Cocoa, QT and .Net. Compared to mainstream PHP frameworks, these offer a notably easier route to building rich data-driven applications:

* They abstract away most of the complexity of full-featured GUIs without sacrificing flexibility, freeing the developer to focus on business functionality rather than low-level nuts and bolts
* You do your work in a single language and access the framework functionality through a single API
* You create a rich user experience by plugging together and configuring well-tested GUI components
* You develop new GUI components by combining sub-components
* You can plug in additional functionality through a thriving ecosystem of open source and commercial addons
* The GUI is nicely styled by default and is easy to re-skin
* And on the business side, your data structures bind seamlessly to your interface widgets.

Agile Toolkit offers all of these benefits to developers building data-centric AJAX applications in PHP. 

### So how is Agile Toolkit different?

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

### Example: a full-featured CRUD application in just TODO lines of code

To whet your appetite, here are some examples with [CRUD](http://en.wikipedia.org/wiki/Create,_read,_update_and_delete) implementation in Agile Toolkit. This example is designed to show you the Agility of the UI.

Lets start with a simple and basic built-in CRUD component.

```
$crud=$this->add('CRUD');
$crud->setModel('Book');
```

You might not be impressed as CRUDs are a standard features in many frameworks. However this is as far as they go. For Agile Toolkit, CRUD is just another component. First, let's enhance UI a little. CRUD is composite view relying on Grid, Form and Button views. We can interact with those views directly:

```
$crud=$this->add('CRUD');
$crud->setModel('Book');

if ($crud->grid) {
    if ($crud->grid->addButton('Populate Data')->isClicked()) {
        $crud->grid->model->populateData();
        $crud->grid->js()->reload()->execute();
    }
}
```

Now we have a button which uses a pice of AJAX to re-populate the CRUD data with default set. The actual implementation of populateData is the part of business logic and resides in the Model.

The Model we supply can be changed quite a lot: 


```
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

```

CRUD now is displaying data from 2 tables.

Now you might say that database joins are not welcome as a part of a component and we agree. Let's create a new model:

```
class Model_BookWithAuthor extends Model_Book
{
    function init()
    {
        parent::init();
        $author=$this->leftJoin('author');
        $author->addField('author_name','name')->editable(false);
    }
}
```

Furthermore, you might want to have CRUD with "Populate Data" button as a standard component, so let's also move it into a new class:

```
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
```

Now back to our main code. It looks simple again.

```
$crud=$this->add('MyCRUD');
$crud->setModel('BookWithAuthor');
```

This example just demonstrated you some of the fine points of Agile Toolkit:

* You can enhance any existing component and even interact with components it's built of
* The built-in ORM supports joins amongst other things transparently with no extra SQL queries
* Code can be easily refactored and contained in a dedicated classes both for models and views
* Abstraction at it's finest. Once you develop and test your own components separately, construct UI of any complexity out of them.


## Can I Use Agile Toolkit With My Existing Code?

We recognise that many developers will be coming to Agile Toolkit with a significant investment in other MVC frameworks, or in content management frameworks such as WordPress, Drupal and Joomla. 

If you want to add sophisticated data handling to your legacy code, Agile Toolkit is designed to play well with other frameworks. You'll find the details [here](/TODO).

So you can use your Agile Toolkit skills to build new projects at warp speed, or to add impressive AJAX features to your existing applications.
