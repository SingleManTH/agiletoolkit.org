# Core > Event Hooks

## What Are Hooks?

    // TODO: I find callbacks hard to get my head around, and judging 
    // by the forums for other frameworks, I'm not the only one.
    // Can we give a very clear explanation here about what they
    // do that other patterns can't do? As they have a rep in some
    // quarters for leading to spaghetti code, should we be
    // giving guidelines for good practice?

Hooks are a callback implementation in Agile Toolkit. If you're not familiar with callbacks, here's the basic idea:

1. A class can define hook spots in its code, using `$this->hook('hookId');` 

1. Objects using the class can inject hook code using `addHook()`

1. When `$this->hook('hookId')` is called, it executes all the code injected into the hook spot

1. The `hook()` method can return values from the hooks for its object to use.

Hook functionality is provided by `AbstractObject` and is available to every object in your application.

## What Are Hooks Used For?

When you are building a class, adding hooks can help to make it extensible. With hooks, objects using a class can inject functionality without having to extend the class.  Hooks are particularly helpful when it's important to run code at a particular stage of execution, such as immediately before a database record is saved.

Here are some examples from the Core code:

    // TODO: in the Core there seems to be confusion about the naming
    // of hook spots. We get underscores and camel case, and some are prefixed in 
    // JavaScript event style: onSave, and some are simply 'saved'
    // We should give clear guidelines, I suggest, then tidy up the core to match?

- Hook `post-render-output` in `ApiFrontend` could be used for logging request execution times

    // TODO: is this example realistic?

- Hook `loadData` in `Form` could be used to present a user message
- Hook `beforeSave` in `Model` could be used to add audit data to a record.

Hooks are often used to enable Controllers and Addons to interact with their parent objects.

## Setting A Hook Spot

At the point in your class where you want a hook to fire, call the `hook()` method:

    $this->hook('onCompletion');

We call this a 'hook spot' becuase it's the spot where objects using your class can hang their hook code.

## Adding Hook Code To A Spot

You add hook code to a spot with the `addHook()` method:

    addHook($hook_spot, $callable, $arguments = array(), $priority = 5)

Let's say your class uses a Model, and you want to run code when the Model's `beforeSave` hook is fired. You have two options:

    // TODO: explain the $o object reference - where does it come from??
    // Is there a typo in the docs? Should this be $model here?

    // 1. Inject a closure

    $model->addHook('beforeSave', function($o){ 

            echo 'My closure ran!'; 

            });

    // 2. Inject the name of a callable method.
    // This hook executes $this->myMethod($obj);

    $model->addHook('beforeSave', array($this, 'myMethod')); 

   // TODO: worth giving advice on when to use one or the other option??

### Adding multiple hooks

You can add more than one hook to the same hook spot:

    // In the parent

    $obj = $this->add('MyClass');

    $obj->addHook('foo', function($o){ return 1; });
    $obj->addHook('foo', function($o){ return 2; });

    // In the object

    $res = $this->hook('foo'); // Returns array(1, 2);
    
Note that because there might be multiple handlers on a single hook spot, `hook()` returns values in an array.

### Using arguments in hooks

You can add additional parameters to your `addHook` closure or method:

    $obj->addHook('seduce', function($o, $name, $msg){ 

            return printf('Hi %s, %s!', $name, $msg);
        });

Your hook spot can pass arguments from it's own scope into hook functions as an array. The first value will be passed as the first additional parameter, the second as the second etc.

    // Returns: 'Hi John, I love you!'

    $name = 'John';
    $msg = 'I love you';
    $this->hook('seduce', array($name, $msg));

You can also pass in arguments from the scope of the parent object. These are added to the end of any arguments passed by `hook()`.

    // Returns: 'Hi John, I love you truly, madly, deeply!'

    $sincerity_level = 'truly, madly, deeply';

    $obj->addHook('seduce', function($o, $name, $msg, $sincerity_level){ 

            return printf('Hi %s, %s %s!', $name, $msg, $sincerity_level);

        }, array($sincerity_level));

## Prioritising Hooks

When calling `addHook()`, the fourth argument is the hook's priority in the execution chain for that hook spot. The default priority is 5. Hooks priorities are executed in ascending order, so set it lower to ensure that your hook is called earlier, higher for later.

     $obj = $this->add('MyClass');

     $obj->addHook('foo',function($o){ return 1; });
     $obj->addHook('foo',function($o){ return 2; },3);
     $res = $obj->hook('foo'); // array(2, 1);

Note that in this example, the '3' was passed as the 3rd argument, not the 4th. 
`addHook()` automatically recognizes a non-array value as a priority if the array with arguments is omitted. Agile Toolkit often uses this kind of overloading to simplify the syntax.
     
Hooks with the same priority will be executed in the same order they have been added. To reverse this order use negative priority:

    // Returns array('hello', 'world');

    $obj->addHook('myhook',function($o){ echo 'world'; }, -1);
    $obj->addHook('myhook',function($o){ echo 'hello'; }, -1);

## Breaking The Chain Of Execution

Sometimes your hook code will want to stop the execution of any additional hooks registered with the same hook spot.

When called from inside a hook callable, `breakHook()` will break the chain of execution, and the `hook()` method will return the value passed:

    $obj = $this->add('MyClass');

    $obj->addHook('foo',function($o){ return 1; });
    $obj->addHook('foo',function($o){ 

            $o->breakHook('override value'); 
        });

    $res = $obj->hook('foo'); // returns array('override value');

## Testing For Hooks

    // TODO: but what if the hooks added simply don't return a value?

If no code has been added to a hook point, an empty array is returned. 

Here's a useful construct which uses fallback code if no hooks are defined:

    if(!$this->hook('myHook')){

        // Default handler
    }

## Removing All Hooks From A Spot

To remove all hooks from a spot:

    $obj = $this->add('MyClass');

    $obj->addHook('foo', function($o){ return 1; });
    $obj->addHook('foo', function($o){ return 2; });

    $obj->removeHook('foo');
    $res = $obj->hook('foo'); // array();

## Hooks And Cloning

    // TODO: is this only when they are set in init()?

If you clone an object that adds hooks inside `init()`, the new object will not have the hooks.

## The Most Commonly Used Core Hooks

Here is a reference list of some of the most useful hooks in the Core libraries.

### Application Hooks

These enable you to run code at specific points in the execution flow:

    TODO: List of available hooks, please!

### Model Hooks

    TODO: List of available hooks, please!

### Form Hooks

    TODO: List of available hooks, please!
