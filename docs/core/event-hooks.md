# Core > Event Hooks

## What Are Hooks?

Hooks are a callback implementation in Agile Toolkit. If you're not familiar with callbacks, here's the basic idea:

1. A class can define hook points in its code, using `$this->hook('hook_id');` 

1. Other classes can inject code into the hook using `addHook()`

1. When `hook('hook_id')` is run in the original class, it executes all the code that has been injected into it.

Essentially, hooks are a way to inject functionality into an object without having to change or extend the class.

## What Are Hooks Used For?

Hooks are a highly flexible tool, and their use is limited only by your imagination.Here are a couple of examples from the core code:

    // TODO: there seems to be a naming format inconsistency with these two hooks. Can we fix this in the source, with aliases perhaps?

- Hook `post-render-output` in ApiFrontend could be used for logging request execution times
- Hook `beforeSave` in Model could be used to add audit data to a record.

Like any powerful pattern hooks have their dangers: overuse can lead to hard-to-read spaghetti code. Clear naming and commenting will pay dividends when debugging or maintaining your app.

## How To Fire A Hook

At the point in your class where you want the hook to fire simply write:

    $this->hook('myHookId');

## How To Inject Code Into A Hook

Let's say your class uses a Model, and you want to run code when the Model `beforeSave` hook is fired. You have two options:

    // Inject a closure

    $model->addHook('beforeSave', function($o){ 

            echo 'My closure ran!'; 

            });

    // Inject the name of a method:
    // this hook executes $this->myMethod($obj);

    $model->addHook('beforeSave', array($this, 'myMethod')); 


## Application Hooks

These enable you to run code at specific points in the execution flow:

- TODO: List of available hooks, please!









    $obj = $this->add('MyClass');
    $obj->addHook('foo',function($o){ return 1; });
    $obj->addHook('foo',function($o){ return 2; });
    $res = $obj->hook('foo'); // array(1, 2);

This example demonstrates how multiple hooks are called and how they return 
values. You can use method breakHook to override return value.

    $obj = $this->add('MyClass');
    $obj->addHook('foo',function($o){ return 1; });
    $obj->addHook('foo',function($o){ $o->breakHook('bar'); });
    $res = $obj->hook('foo'); // 'bar';

You should have noticed that all the hook receive reference to $obj as a ﬁrst argument. You can specify more arguments either through hook() or addHook()

    $obj->addHook('foo',function($o,$a,$b,$c){ 
             return array($a,$b,$c); 
             }, array(3));
    $res = $obj->hook('foo',array(1,2)); // array(array(1,2,3));

When calling addHook() the fourth argument is a priority. Default priority is 5, 
but by setting it lower you can have your hook called faster.

     $obj = $this->add('MyClass');
     $obj->addHook('foo',function($o){ return 1; });
     $obj->addHook('foo',function($o){ return 2; },3);
     $res = $obj->hook('foo'); // array(2, 1);

Note: in this example, the "3" was passed as 3rd argument not fourth. 
addHook automatically recognize non-array value as a priority if array with arguments is omitted. Argument omission is often used in Agile Toolkit methods.

When you are building object and you wish to make it extensible, adding a few 
hooks is always a good thing to do. You can also check the presence of any hooks 
and turn off default functionality:

    function accountBlocked(){
    if(!$this->hook('accountBlocked'))
    $this->email('Your account have been blocked');
    }

Without any hooks, hook() will return empty array.
Finally you can call removeHook to remove all hooks form a spot.

    $obj = $this->add('MyClass');
    $obj->addHook('foo',function($o){ return 1; });
    $obj->removeHook('foo');
    $res = $obj->hook('foo'); // array();
    Note: If your object implements handlers for a few hooks and sets them inside 
    init(), then after cloning such an object, it will not have the handler}

>>>>>>>>>>>>>>>>>>>>>>>>>>

USING HOOKS

Hooks are used in many applications and frameworks. The special approach of Agile Toolkit is that hooks are defined "per-object". As an example, form will bind loadData() and submit() on API's hooks. This allows Form objects to execute code between initialization and rendering.

Hooks are typically used by controllers, add-ons. More hooks can be gradually added through hook() to standard classes. Here is example of a hook:

$obj->hook('myhook');
Calling this will actually execute all the code which was assigned here by addHook()

    Using different callable types
    There are several ways to specify a callable to an addHook():

        $obj->addHook('myhook',function($o){ echo 'closure'; });

        $obj->addHook('myhook',array($this, 'method')); // executes $this->method($obj);

        $obj->addHook('myhook',array($this)); // shortcut for $this->myhook($obj);
        Arguments to hooks
        It's possible to pass arguments to a hooked functions:

        $obj->addHook('myhook',function($o,$subj){ echo $subj; });

        $obj->hook('myhook',array('hello world'));
        Priority
        By default all the hooks are added with priority=5. If you specify a lesser number to addHook() your hook will be executed before other hooks. Specifying value greater than 5 will leave your function to be executed after.

        Hooks with same priority will be executed in the same order they have been added. To reverse this order use negative priority.

        $this->addHook('myhook',function($o){ echo 'world'; },-1);
        $this->addHook('myhook',function($o){ echo 'hello'; },-1);

        $this->hook('myhook');
        Returning values from hooks
        Because there might be multiple handlers on a single hook, returning values will be stored in array:

        $this->addHook('myhook',function($o){ return 'foo'; });
        $this->addHook('myhook',function($o){ return 'bar'; });

        var_dump ($this->hook('myhook')); // will show array('foo','bar');
        If hooks are not defined, empty array will be returned. It's a quite popular construct, which uses a fall-back code in case hooks were not defined:

        if(!$this->hook('myhook')){
          // default handler
        }
Breaking hook
In some cases you would want to stop any other hooks from being called. To do so, call $this->breakHook($return_value);. This method will raise exception which hook() will the intercept and retrieve return value

If hook is intercepted then return of hook() method is set to the first argument of breakHook();
