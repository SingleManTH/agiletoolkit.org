Update: CRUD v2.0
====

I'm pleased to announce that I have refactored CRUD implementation in Agile Toolkit and it is now much more flexible and takes advantage of the new VirtualPage class.

Changes
----
* Takes advantage of VirtualPage, therefore much cleaner implantation for frame
* Reduced responsiveness by 50% when editing elements. Opens popup instantaneously, without AJAX request
* Renames "Add" button into "Add User", "Add Purchase Order" or accordingly to the model
* More simplified ways to override edit dialog
* Ability to extend by adding more actions

Using CRUD
----
The typical use of CRUD remains the same. It's also quite backwards compatible, so you wouldn't need to worry about it.

```
$this->add('CRUD')->setModel('User');
```

However the extensibility now allows for few additional tricks to be done. The new method $crud->isEditing() can help you determine if the form is in editing mode or not.

Before: `if($crud->form)`
Now: `if($crud->isEditing())`

However you can also distinguish edit and add modes:

````
if($crud->isEditing('add')){
    $crud->form->add('Text')->set('New thing, eh?');
}
````

### Adding something after edit form form

```
$cr = $this->add('CRUD');
$cr->setModel('User');
if($cr->isEditing()){
    $page = $cr->virtual_page->getPage()
    $page->add('HelloWorld');
}
```

Virtual page creates a much cleaner approach to the pop-up building, so some of the actions which were not working correctly do work now.

```
$cr = $this->add('CRUD');
$cr->setModel('User');
if($cr->isEditing()){
    $page = $cr->virtual_page->getPage()
    $li = $page->add('LoremIpsum');
    $cr->form->getElement('name')->js(
        'change',
        $li->js()->reload()
    );
}
```

### Extending CRUD

The arrangement of methods inside a CRUD is much more reasonable now. You can extend and override methods:

* configureAdd
* configureEdit
* configureDel
* configureGrid

As well as adding more actions to setModel when building more actions for your custom CRUD.

```
class MyCRUD extends CRUD {
    function configureEdit() {
        $this->form->add('H1')->set('Welcome to editing mode!');
        return parent::configureEdit();
    }
} 
```
Note: Be aware of the return from those functions.

### Tweaking form's submission

Now you can also extend the JavaScript executed on form's success.

```
    function formSubmitSuccess(){
        $js=parent::formSubmitSuccess();
        return $this->js(null,$js)->univ()->alert('yet');
    }
```

### Entity Name

Grid now looks at the name of the class and puts that on the "Add" button and the frame. If you think you would like to change the name of the model, you can set `$entity_name` property of the grid. To restore old behavior, you should set this property's value to `false`.