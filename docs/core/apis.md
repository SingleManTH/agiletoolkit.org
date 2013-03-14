# Core > API Classes

## Overview

A neat feature of Agile Toolkit is the ability to use an application class tailored precisely to the job in hand.

The main APIs are:

* [ApiCLI](/TODO): a minimal frontend for command line requests
* [ApiWeb](/TODO): a minimal frontend for web applications, mainly used for integrating with other frameworks
* [ApiFrontend](/TODO): a comprehensive API for web applications, extending ApiWeb with routing, an integrated CSS styling system, and Page classes

There are other more specialized APIs for installers and REST requests.

If there are features you regularly add to your API classes, simply extend one of these Core APIs and you have a reusable custom `$app` class.

## The Purpose Of The API Classes

UNDERSTANDING API CLASSES

Agile Toolkit does not use any static elements or global variables. The only global variable you use in the "index.php" class is "$api". All additional classes are added into your API, or into other objects inside the API.

This leads to several interesting points:

- You can have more than one API running at the same time;
- APIs are independent, and will never share same ID, Cookie name or session name;
- You can create one API from inside another one, but the latter won't be able to access the former.

Controllers versus Singletons

Agile Toolkit does not use singletons. Singletons do not provide any performance or persistence benefits in PHP5.2 or higher. Instead, Agile Toolkit has the concept of "Controllers". A controller can be added into an object, but a controller of a certain type can only be added to a certain object once. This is a "soft" restriction: you can still add second controller of same type to the same object at your own risk, if you specify a different name for it.

For example: you can add a "Logger" controller into the API, which enhances the way errors are displayed. Adding another Logger into the API again will do nothing, and will simply return a reference to your existing Logger.

Because it's possible to have multiple APIs at the same time, this opens up new strategies for testing. For instance, a 'testing' API can initialize your 'real' API. Before executing a test, the 'test' API can destroy() some of the controllers in the 'real' API, and replace them with new ones. This implements a dependency-injection based testing framework, which is really close to the real-life environment of your application.

Realms

When the API class is initialized it expects only one argument: the "realm". A Realm must be unique to an application or even to an installation. The realm becomes the "name" of your $api, and it will also be used in all unique IDs (cookies, DOM id's, session variables).

Through combining the concept of multiple APIs with proper realms, you can implement some unique features - such as a "Login As User" feature, by actually using the frontend API and calling the "login" method of its auth object.

## What Features Are Offered?

### ApiCLI

`ApiCLI` offers the bare minimum features to run command-line requests:

- Configuration
- Database connectivity
- Lazy class loading
- Link building
- Error handling & logging.

Here's Agile Toolkit's version of 'Hello World':

    // In index.php

    include 'atk4/loader.php';
    $api = new ApiCLI();
    echo "Hello World\n";

### ApiWeb

`ApiWeb` adds the miminum features you need to interract with other PHP web frameworks:

- Templates and rendering (for HTML, XML, textfiles etc)
- Pages and routing (for handling HTTP requests)
- Sessions 
- Event hooks
- HTTP headers & output.

### ApiFrontend

Finally, `ApiFrontend` adds sophisticated [layouts](/TODO) to your Views.


EXECUTION OF THE API CLASS

An API in Agile Toolkit splits the whole execution of the application into 2 parts. In the first part, the API initializes the objects, coupling them with proper models. The second part is the execution: the API will cause objects to query the database, iterate through results, produce and render output.

Agile Toolkit objects never output anything directly. Instead, they insert their output into their parent's template. The API sends the combined output to the user's browser through "echo".

Initialization
Depending on which API you use, it will initialize several sub-components which call Controllers. When you extend an API class, you should re-define the init() function and add initialization in there - things like connecting to the database, adding controllers, etc.

ApiFrontend will automatically initialize Logger() which makes error logging more bearable.

Layouts
A Layout is a region in the shared template (shared.html), which is parsed by the API class. If the region is defined, then a corresponding layout function is called.

The first and most significant layout element is "Content". Content will determine which page is requested and proceed with all the logic of page initialization. However if "Content" is not present in the API template, the page will not be initialized.

You can add additional layout elements. For example, calling addLayout('Menu') inside api->init() will instruct API to call layout_Menu() method if tag <?Menu?> is found when parsing the template.

This approach can be used to initialize various things such as sidebars, toolbars and widgets, if they exist inside the API template. You can manipulate different templates from inside the defaultTemplate() function of your API.

Initializing Auth and checking Auth
While you can also execute auth->check() inside init(), we recommend performing auth-check inside an initLayout() function:

    function init(){
            parent::init();
            $this->add('BasicAuth')->allow('john','secret');
        }
    function initLayout(){
            $this->auth->check();
            parent::initLayout();
    
            // Replace "login" link region with logout/user info
            if($this->auth->isLoggedIn()){
                        $this->add('View',null,'UserMenu','view/usermenu/loggedin')
                            ->set($this->auth->get()));
                    }
        }
Did you notice that the call to auth->check() is done before calling parent::initLayout()? That's because we do not want any pages to be initialized before authentication is done.

Form Submission
Form submission is normally handled after all other views are initialized. When form is submitted, the rendering phase is skipped also. Submission occurs only if a form with a proper ID has been found.

Rendering
Agile Toolkit provides support for partial rendering of views based on 3 criteria: cut_page - outputs only page's content, cut_object - outputs content of a certain object and cut_region - outputs content of a certain region. This is explained in more depth later

Interrupting initialization phase
It is possible to interrupt execution of the init() phase. This might be necessary if you wish to avoid any more objects being added to some view. To terminate execution of init:

// from inside View

// if product is not selected:

if(!$product){
    $this->add('ProductSelector');
    throw $this->exception('Stop showing page until product is selected','StopInit');
        // throws Exception_StopInit
}
This approach should be used only if calling "return" is not sufficient - that is: from either a view which has been placed inside page, or if your page extends another, common abstract page.}

## Structuring A Multi-API Application

STRUCTURING A MULTI-API APPLICATION

There are several cases when it makes sense to create multiple API classes. Below are a few typical scenarios. As some API functionality might be needed by all APIs, it's incorporated into a System Controller.

Multiple Interfaces

Most web software use multiple web interfaces. User Frontend and Admin are separate Web interfaces, both of which take advantage of the page concept. Then there are command-line utilities which are designed for a single purpose, such as doing a cron-job, or for command-line manipulations.

Multi-lingual or satellite sites

Sometimes you will want your software to run in multiple regions mostly unchanged, however you need to have the flexibility to add regional or site-specific changes. In this case you will want to create an intermediate API (parent), which is then extended for each regional site.

Site1 and Site2 API classes can change theme, skin or add additional templates/translations for localization.

Specific Applications
If your Agile Toolkit-based software requires installation, you may want to create a simple interface which can help the user set up the software. You might want to create a new API for an installer in general, then extend it to customize it with your installation steps. This way you can share the generic installer class with the community, or with other projects while retaining the flexibility of customization.
