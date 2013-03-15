# Core > Working With Objects

## Overview

In this article we cover the fundamental principles for working with objects in Agile Toolkit. The techniques are straightforward but will be unfamiliar to most developers. So a thorough understanding of the material here is essential for achieving comfort and fluency with the framework.

We assume that you're familiar with the Agile Toolkit [Runtime Object Tree](/TODO).

## Direct Adding Of Objects

Typically in PHP you create an object directly with the `new` statement:

    $bar = new foo;
    $bar->doFoo();

In Agile Toolkit, objects are **never** created this free-floating way. The `AbstractObject` provides all objects with an `add()` method which: 

1. Registers the new object with its parent
1. Returns an instance of the new object.

```$new_object = $owner->add('MyClass');```

This is primarily to assist with our goal of Composability, so objects know how to combine themselves into components. For example, you might `add()` a button to a View object to show on a page, or add a field to a Model object to be used in a query. 

## Indirect Adding Of Objects 

Objects may deﬁne new methods for adding certain types of object &ndash; this [syntactic sugar](http://en.wikipedia.org/wiki/Syntactic_sugar) helps keep code clean and expressive. For example: 

- `Form` has a method called `addField()`
- `Grid` has a method `addButton()`;

In addition to calling `add()`, these methods often take arguments which save you from chaining calls:

    $form->addButton('Click Me');
    $form->add('Button')->setLabel('Click Me');

## Adding Existing Objects

If an object is already created, you can use it as the ﬁrst argument of an `add()` call. This will re-assign the object's `owner` property. Please use this functionality with caution. 

    // TODO: Please explain what using with caution means in practical terms

    $form = $page->add('Form');
    $field = $form->addField('line','foo');

    $frame = $form->add('View_Frame');
    $frame->add($field); // Moves field inside frame

## Adding Models with setModel()

Model and Controller objects are created with their own specialized methods.

Any object can call the `setModel()` method. This will initialize the Model and assign it to the object's `model` property. 

Although it's easier to simply access the `model` property, you can also use the `getModel()` method. 

    $grid = $page->add('Grid'); 
    $form = $page->add('Form'); 

    $grid->setModel('User');        // Uses class Model_User 
    $form->setModel($grid->model);  // Uses the same object 
    
This syntax allows classes to redeﬁne `setModel()` so they can, for example, bind the Model to a UI component. When calling `setModel()` on a View you can specify a second argument, which is list of the Model ﬁelds to be used.

## Adding Controllers with setController()

You can use `setController('Foo')` as a shortcut for `add('Controller_Foo')``. 

The argument can be a Controller name or an existing Controller object.

## Chaining Object Methods

Because a call to add() will always return a new object you can chain calls to its methods:

    $page->add('Button')->setLabel('Click Me');

In the true spirit of jQuery, most object methods will return a reference to themselves ($this) so you can continue to chain:

     $this->add('FormAndSave')->setModel($model)->loadData($this->api->auth->get('id'));

## Accessing Added Objects

`AbstractObject` provides several handy methods for accessing objects you have added into a parent object:

    $view = $page->add('View','myview');

    $page->hasElement('myview');    // Returns $view or false
    $page->getElement('myview');    // Returns $view or exception
    $view->destroy();               // Removes object from parent and memory

## Objects With Global Scope

The `add()` pattern also enables every object to use API methods and any Controllers added into the API, without having to resort to static methods or complex Inversion of Control containers. Here's a simple Agile Toolkit app:

    include 'atk4/loader.php';

    // Create the API object
    $api = new ApiFrontend(); 

    // Every object can access the API through the $api property

    $my_object = $api->add('MyClass');
    $my_object->api === $api; 
    $my_object->api->getDestinationURL('login'));

    // Every object can use any class added to the API

    $api->add('MyClass2');
    $foo = $my_object->api->MyClass2->doFoo();

## Initializing Objects 

In Agile Toolkit, we don't initialise objects with PHP's `__construct()` method. Instead, when you add an object Agile Toolkit will automatically execute an `init()` method in the new object. 

This allows us to initialise the object after its `owner`, `api` and `name` properties are set. Once again, this helps with our Composability design goal. 

As an example, here's part of the `init()` method for the password Strength Checker indicator: 

    class StrengthChecker extends View {

         function init(){
              
              parent::init();

               if(!$this->owner instance_of Form_Field_Password)
                {
                    throw $this->exception('Must be added into Password field');
                }
                    
               // ....
        }
    }

With Agile Toolkit we recommend that the `init()` method should perform the absolute minimum initialization and the rest of the work should be done by other methods such as `setModel()` or `render()`.

We do this to preserve the flexiblity of our objects, and for efficiency. In some situations, for example, View objects may be initialized but not rendered. So to optimize performance it's best to do anything resource intensive in `render()`.

For additional runtime flexibility you can inject properties into a new object by passing an associative array as the second argument to `add()`. These properties will override any existing property values and are set in the object before `init()` is run.

    // Swap out the default Grid in a CRUD component

    $page->add('CRUD',array('grid_class'=>'MyGrid')) ->setModel('User'); 
    
## Cloning Objects & newInstance()

    // TODO: if we leave it as vague as this, people will be scared
    // to clone in case some problem emerges at runtime!

    // Can we be more explicit about when it's safe and not safe
    // to clone, and what goes wrong if it doesn't work?

    // Is newInstance guaranteed reliable? Why don't we just tell
    // people to use it all the time and not use clone, 
    // just as we say use add() instead of new.

It's generally safe to clone Models and Controllers in Agile Toolkit, though this is not guaranteed. 

There is an alternative way, `newInstance()`, which adds a new object of the same class added into the same parent.  

If you experience problems with clone, try `newInstance()``.  

## Destroying Objects

If you have added an object and later need to remove it, call `$object->destroy()`. For example if your Model needs to remove a field from the Model it extends:

    class Model_Admin extends Model_User {
        function init(){
            parent::init();

            $this->getElement('email')->destroy();
        }
    }

## Object Naming

One benefit of initializing objects with `add()` is so we can assign them a unique name, either automatically or manually. The name is then used for applications such as AJAX requests, HTML ID properties and selective rendering of HTML.
    
    // Automatic naming
    $my_object = $api->add('myClass');

    // The name property is unique to the application
    // and is based on the realm and class name
    $name = $my_object->name;

    // The short_name property is unique to the object
    $short_name = $my_object->short_name;

    // Manual naming (not normally required)

    $my_object = $owner->add('myClass', 'foo');
    echo $my_object->name;          // realm_name_of_owner_foo
    echo $my_object->short_name;    // foo

## Element Tracking 

This is a more technical note for developers building low-level components &ndash; in normal use element tracking is handled for you.

When adding an object, the owner object may add a reference to the new object in its `elements` property. This process is called 'element tracking'. 

When you are adding one View into another, this reference enables the application to perform recursive rendering without the developer having to render child objects explicitly.

However the default behavior for non-View objects is not to store an object reference: we call these 'detatched objects'. Instead, the `elements` property would contain `'short_name'=>true;`. This enables the PHP garbage collecter to destroy objects that are no longer required, saving memory.

There are, however, some exceptions where non-View tracking is necessary, such as Model Fields which need to be associated with the Model object.  

When developing new types of component, set an object's `auto_track_element` property to `false` whenever there is no need for element tracking.

You can destroy detatched objects safely with `removeElement('name')`.

## Object Properties

As we have seen, `AbstractObject` provides a number of useful properties to every object in your app. Here's a complete reference:

<table>
    <thead>
        <tr>
            <th>Property</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>short_name</td>
            <td>Object name unique to its parent's 'element' array.</td>
        </tr>
        <tr>
            <td>name</td>
            <td>Object name unique to the entire application.</td>
        </tr>
        <tr>
            <td>elements</td>
            <td>Array containing references to child objects for element tracking. Where tracking are not required, objects may be 'detached' and their `elements` value will be `true`. This helps conserve memory.</td>
        </tr>
        <tr>
            <td>owner</td>
            <td>Points to the object which created this object through the call to `add()`</td>
        </tr>
        <tr>
            <td>api</td>
            <td>Always points to the application object, the topmost object in the system</td>
        </tr>
        <tr>
            <td>model</td>
            <td>Points to Model objects set with `setModel()`</td>
        </tr>
        <tr> 
            <td>controller</td>
            <td>Points to Controller objects set with `setController()`</td>
        </tr>
        <tr>
            <td>auto_track_element</td>
            <td>Regulates whether adding this object will automatically add a reference to the owner's `elements` array. If set to `false`, the object will be 'detached'</td>
        </tr>
    </tbody>
</table>
