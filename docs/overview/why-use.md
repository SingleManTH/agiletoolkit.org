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

We call our solution a Toolkit rather than a framework because the focus is on rapid development with reusable interface and business components. And we call it Agile because the components are designed to adapt easily and reliably as agile requirements evolve.

### So how is Agile Toolkit different?

Compared to conventional PHP MVC frameworks, you'll be working with:

* **A fresh approach to Views**: building a rich user experience by snapping together flexible, event-aware View components using only PHP ([see more...](/TODO)) 
* **A fresh approach to Models**: building your business logic in Models that plug directly into your View components and adapt robustly as requirements evolve ([see more...](/TODO)) 
* **A fresh approach to Addons**: plugging in additional functionality from an ecosystem of Addons that take full advantage of the AJAX, event handling and styling features of the Toolkit Core ([see more...](/TODO)).

### The payoff

So what is the payoff for you, the developer? Quite simply, AJAX applications that are:

* Easier to build
* Easier to test, and
* Easier to change.

### Example: a full-featured CRUD application in just TODO lines of code

To whet your appetite, here's a complete [CRUD](http://en.wikipedia.org/wiki/Create,_read,_update_and_delete) system for a `user` table, with searching, browsing, sorting, paging, creating, updating, deleting, validation and localized user error messages. With some popular frameworks this would require dozens, even hundreds of lines of code. Not with Agile Toolkit:

<?-- Would it be better to show them a relational example with master-detail? Even more impressive? ?>

    TODO
    // Let's set up a data Model
    // Now we'll add some validation rules
    // We plug our Model into the Agile Toolkit CRUD Addon
    // And configure some additional UI functionality

That's all there is to it. Every aspect of the functionality and look-and-feel can be customized with ease &ndash; you can even swap in a different grid component. And this is what you get in just TODO lines of code &ndash; a full-featured, attractive data entry system that's ready to go:

    TODO
    // Screenshot? Screencast? Live demo?

Repeat this level of ease for every form in your application and you can begin to appreciate the productivity gains developers are achieving with Agile Toolkit.

## Can I Use Agile Toolkit With My Existing Code?

We recognise that many developers will be coming to Agile Toolkit with a significant investment in other MVC frameworks, or in content management frameworks such as WordPress, Drupal and Joomla. 

If you want to add sophisticated data handling to your legacy code, Agile Toolkit is designed to play well with other frameworks. You'll find the details [here](/TODO).

So you can use your Toolkit skills to build new projects at warp speed, and to add impressive AJAX data admin features to your legacy applications.
