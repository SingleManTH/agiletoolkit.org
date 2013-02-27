# Framework Structure > Working With Framework Objects

## Overview

In this section we cover the fundamental principles for working with objects in Agile Toolkit. The techniques are straightforward but will be unfamiliar to most developers. So a thorough understanding of the material here is essential for achieving comfort and fluency with the framework.



## Adding Objects

Typically in PHP you create an object directly with the `new` statement:

    $bar = new foo;
    $bar->do_foo();

In Agile Toolkit, objects are **never** created this free-floating way. The AbstractObject provides all classes with an `add()` method which embeds the object into the scope of its owner. 

    $new_object = $owner->add('MyClass');

For example, you might `add()` a button to a View object or a query to a Model object. This is primarily to assist with our goal of Composability, so objects know how to combine themselves into components.

Objects know the owner-object they were added into:

    $new_object->owner === $owner;

## Object Naming

One reason we initialize objects with `add()` rather than `new` is so we can assign them a unique name. The name is then used for tasks like identifying the object in the DOM.



## Initializing Objects
## Cloning Objects
## Addons & Namespaces
