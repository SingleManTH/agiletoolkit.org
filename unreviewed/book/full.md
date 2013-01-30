# Introduction to Agile Toolkit
The Agile Toolkit is a software development platform for creating Web Software using PHP 
language. Unlike many other PHP frameworks today, Agile Toolkit focuses on depth, 
simplification and sophistication. The goals of Agile Toolkit is make web development
more efficient without introducing overheads typically associated with frameworks.

Agile Toolkit is based on some philosophical concepts for easier learning. By Learning 
the way of Agile Toolkit, you will discover a new approach to build web applications in 
general. Many concepts might be new or might seem unusual, but you fill find the dynamic 
synergy behind them and the rest of the toolkit.

In this chapter I will explain what motivated me to create Agile Toolkit and why other
frameworks failed to provide a good-enough solution. I will also look at the number of
challenges developers face daily and how Agile Toolkit solves them.

yet another framework. There are fundamental differences which I will attempt to
communicate to you in this chapter.

low-level implementation is abstracted and used to build a higher level of the toolkit. 
You will be able to see Agile Toolkit in three dimensions.

*Based on version 4.2.3 of Agile Toolkit*# The history of “broken” PHP

Not many remember what web 1.0 applications were like. In early ‘90ties most of web sites on the Internet were static and not interactive. As demand increased Common Gateway Interface (CGI) and soon Perl were becoming incredibly popular.


* Static classes and constants. Those are not portable and not fully object-oriented. Use of singletons is also discouraged.


Agile Toolkit draws it’s inspiration from a several non-PHP sources.
While many PHP has similarities to the JavaScript and Java libraries, the closest resembling framework for Agile Toolkit is jQuery. Advanced use of objects, short and concise syntax, heavy method overloading, philosophy, intuitive approach and even similar syntax brings both libraries close together.

```
// jQuery Code
```

## Desktop Toolkits
Agile Toolkit has a very strong User Interface framework. It based on the principles used by desktop object-oriented toolkits:


```

Agile Toolkit also allows it's developers to easily breach gap between the browser and the server by automatically using AJAX for call-backs.



Model-View-Presenter is a derivative of the MVC software pattern. The MVP is mostly used for building User Interfaces.


Page is the type of object which receives control form the Application  in response to the requested URL and is responsible for a single page of your web application.
    $page->add('Form')->setModel('User');

## Window Systems	

<div style="clear: both"></div>

```

I often hear from developers how good they are with Object Oriented design and then they design all their classes without extending anything. Similarly - many frameworks claim to be object-oriented, yet they fail to grasp the core concepts of Object-Oriented design:

As the frameworks make it to their 2.0, many of them loose most of their adopters who simply don't want to learn completely new framework. This will not happen with Agile Toolkit and here is why:

We understand that PHP is the way it is and we continue and Agile Toolkit does not attempt to artificially introduce a layer to wrap everything into a meaningless layer of objects.


No doubt that many of you would look at the simple functionality of Agile Toolkit and will assume it's a basic framework. In reality Agile Toolkit uses a lot of sophisticated logic to make it tick in the best possible way.


Agile Toolkit framework is not there only for a show. It is there to solve a real-life challenges a typical web developer is facing.
SQL databases controlled through a language constructed by string concatenation often is a source of many security issues.

```

It might seem that the above code contain several vulnerabilities - JavaScript injection and SQL injection. However it's perfectly safe in Agile Toolkit. While it is advisable to validate the input data in Agile Toolkit, the way how developer interacts with HTML, JavaScript or SQL contains a proper escaping and pretty much eliminates any possible vulnerabilities without developer even being aware of them.
Toolkit. Model can select either all records from a SQL table or a sub-set limited by certain conditions. It can also interact with multiple tables simultaneously through joins or expressions.

then all the further interaction with the model will only affect records which are not flagged as deleted:
```

## Scalability by Design	
```

This syntax is common in many Active-Record implementation. Traversing from the “user” model to the relevant “address” model executes one more query and the whole code generates N+1 queries and is highly ineffective.
```

The new approach will perform only a single query. There are many other ways to achieve the above in the single query with Agile Toolkit.

```

In fact, many other complex controls and admins are in fact views which you can extend, redefine and interact with their elements directly. As you will develop your projects, you will also create re-usable components on a daily basis.
Nowadays frameworks consist of independent components, which can be easily used outside of the framework. The same applies to Agile Toolkit, however the components are not as independent as elsewhere.
# The Core Framework

AbstractObject is a core class used in Agile Toolkit. This class is used by all the other classes in Agile Toolkit (except Exception classes) and offers number of core functionalities you can rely on. Further in this chapter I will include a code examples, where `$this` always refers to the object of Agile Toolkit.

## Descendants of AbstractObject

![image](images/abstract.png)

There are 3 direct descendants of AbstractObject which are:

## add() method	


```

All objects can access the top-most Application object through "api" property. 
```

Unique names are important because that's how objects can identify themselves. This is often used in AJAX requests, HTML ID properties and selective rendering of HTML.
```

You will find that init() method can be redefined in ANY objects in Agile Toolkit. The fundamental principle of writing your own init() method is: **Avoid heavy-lifting. Do that in render() method instead, if possible.**







```

```

Many objects redefine setModel() to perform additional binding of the model. When calling setModel() on a View, you can specify second argument, which is list of actual fields.
```
------------ | ------------- | ------------
memorize | name, value  | Store value in session under name
recall | name, default | If value for name was stored previously return it, otherwise return default
forget| name | Remove previously memorized value from session
learn | name, value1, value2, value3 | Memorize first non-null argument.

## Exceptions
Agile Toolkit takes full advantage of exceptions. You can read more about exceptions in ...

My default objects through exception of a class "BaseException". You may use your own class:

```

Third argument to exception() can specify a default exception code which can further be accessed through "code" property.


```

```
```

You should have noticed that all the hook receive reference to $obj as a first argument. You can specify more arguments either through hook() or addHook()







```

You can also remove dynamically added methods with removeMethod();

# Creating your first Command-Line application
You can create software for a variety of different targets with Agile Toolkit including command-line software or software which does not produce HTML.
```

The creation of the API class does almost nothing and is a very lightweight operation. Once you have created your $api class you can perform various things with it. For example, we can attempt to read a configuration parameter
```

This will open the config.php file in the same folder, and look for the following line:


```

I will revisit work with database in Chapter 3 - Data Model.# Template Engine

Web software commonly relies on template engines to separate HTML from the rest of the logic code. Agile Toolkit also contains a template engine which is used extensively. The engine is designed to be simple and quick. It resembles a DOM tree interaction, but is faster and simpler. Here is a template example:



* The tags <?, ?> are commonly recognized by template parsers are unlikely to be a valid part of HTML document.





```

Let's create a simple view object which would load this template:
```

The 4th argument specifies which template so use and because we want our view to load template from a file, we are using array('shared');
```

Adding this will have no effect on the output, however you will have a separate view rendering the header recursively. Next I'll create a class object for the header and will use this class instead of "View".
```

Let me clue you in on the arguments to the add(). The 3rd argument specifies the spot within the $view where the text will appear every time header would call output().  
```

The 4th argument for add() method describes how the template should be initialized. Before we have used array('shared') to load template from a file. Specifying string value will point to a region within a parent template, which will be cloned for a child view to use. In our case the default template for the MyHeader object would contain: `<div class="header">....</div>`

When building a command-line utility using Agile Toolkit, you are unlikely to use the ApiFrontend - which is an application class for a fully-featured web software. The ApiCLI and ApiWeb are parents of ApiFrontend but they are much more minimalistic:

```

In this pattern you will be able to process multiple jobs even if some of them fail and will not run into situation when failed job is retried continuously.





![Data Image](images/data-model.png)

In Agile Toolkit Views can interact with the Data Layer through Models. Model is a class implementing Active Record and ORM as well as holding meta-data for the objects. You must understand that there are two types of models - Relational and Non-Relational (or NoSQL) and that Model_Table (relational) extends the other. To most of the User Interface both classes are compatible, however both model implementation use a very different way to interact with data.


DSQL is a object aiding in building a query. One object represents one query and collect information about fields, conditions and expressions. A DSQL object may contain other DSQL objects which is used for expressions and sub-selects.

building.


Typical database manipulation systems (ORMs) would strictly bind your object definitions to match your database structure. Some would even look into the database for you and create model. Agile Toolkit allows you to have as many model classes as you need and each can also join as many tables as necessary.

class Model_User extends Model_Table {
```

My resulting model will still rely on the user table as a primary, and the user_id is used when loading the model, however model will automatically load display_name from user_preferences table, which will appear as a regular field in the model. As a developer working on a back-end you must understand, that model as you define it can be usable by virtually any UI element in Agile Toolkit without any additional tweaks or logic to handle the dependencies. You can purposely define multiple model classes for different use-cases.


-----|--
`$user->join('preferences.user_id')` | user then preferences | preferences then user | both tables
`$user->join('address','address_id')` | address then user | user then address | both tables
`$user->leftJoin('preferences.user_id')` | user only | user only | both tables
`$user->leftJoin('address','address_id')` | user only | user only | both tables

leftJoin actually defines cascading preferences, but if you looking to use different type of joins inside select query, you can specify 3rd argument to the method. You can probably notice the similarity with `$dsql->join()`. 



To understand DSQL you should realize that it works in a very similar way to how other objects in Agile Toolkit working. This consists of two parts:


```

In this example, we define our own field renderer and then reference in the expression. The resulting query should output a current time to you.
```

The example above will produce query:

```

Those are all available escaping mechanisms:


```

It's important that you don't use any escaping mechanisms on the arguments just yet. They may refer to expression which can still be modified from outside. The arguments are packed into an internal property "args". Next, let's review the rendering part of the arguments. This time I'll be using different escaping mechanisms in different situations.
```


Table would need to be back-ticked and we don't really need to worry about expressions. For the "set" rendering things are bit more complex. We allow multiple calls to set() and then we need to produce the equation for each field and join result by commas. The first argument, the field, needs to be back-ticked. Second argument may be an object, but if it's now, it most probably would contain an un-safe parameter, so we use escape() to convert it into parametric value.


## DSQL Modes	
```

To render the templates, all the respective renderers exist (such as render_options, render_field, render_from, etc). Data is typically stored in property "args" until execution. Below is the list of functions you can call on the dsql() object to affect the queries:

Any DSQL object can be safely cloned. It will NOT however clone any arguments. 
newInstance().
When a single table is used, you can use method getField($field) to generate expression with appropriate table prefix and back-ticked field. Please do not confuse this with getElement() or model->getField();


    second argument specified table
    multiple fields in one go
    can specify as array
    use aliases for fields
    combine explicit table and field alias
    alias expression
    multiple expressions
    subquery

    argument 1 here is unsafe, will use parametric variable
    can use any operation. Second argument must be safe
    same as above, but only limited number of operators are supported: <,>,<=,>=,<>,!=,in,not in,like,is and spaces
    expression overrides unsafe variable, will not use param
    can be used with safe variables
    use this with un-safe variables
    subquery
    state in ('...','...')
    expression

When you look at the query like this, you should see that area in brackets is actually an expression. A method orExpr() can help you produce this expression:
    same, shortcut
    where \`income\`>\`expense\`
    better one. Use this.

```

Resulting query:
```

## Using having()	

    join author on author.id=book.author_id
    same, but sets alias to `a`
    join chapter on chapter.book_id=book.id
    same but sets alias to `c`
    two joins
    join author on author.id=book.written_by
    join info on info.issn=book.issn and info.is_active=1
    inner join. By default "left" join is used

    reverse order
    same as above, reverse oredr
    order by age, sex (multiple fields)

    produces 123
    produces \`user\`
    produces foo bar
    produces :a1 param
    select name from ..
    will delete all arguments





$q=$this->api->db->dsql();

```

## WHY YOU SHOULDN'T BUILD YOUR QUERIES WITH DSQL

Within DSQL you might find the comfort and control over SQL queries, but you must try to avoid using DSQL directly. Relational Models are higher level objects which give you much simpler syntax with very minimal performance hit.

    string concatination
    select table schema
    return random value 0..1
    returns expression for sum(..)
    returns expression for count(..). Argument is '*' if unspecified.
    will not change template. Use with your own expression.
    returns array of hashes containing data
    returns scalar value, first row first column
    return first row only, but as non-associative array

    return first row as a hash
    returns one row as hash. Calling this or previous two methods multiple times will return further data rows or null if no more data is there.
```

## Using preexec	



* Book ( title, author_id, is_published )

```
```

```
$users = $db->dsql()->table('user')
```

```
$q = $db->dsql()->table('user');
```

```
$min_age = $db->dsql()->table('user')
```

```
$q=$db->dsql()->table('users');

In our software data is arranged into logical tables or collections. It's sensible to associate data with a set of relevant actions. PHP objects is are an ideal container for both the data and the set of methods which can be applied on the data.
| ------------ | ------------- | ------------ |
SQL + Database/Schema | Table Name | set of "where" conditions joined by AND clause
Memcache | Key Prefix | Sub-prefix
MongoDB|Collection Name | Conditions
Redis + Object Type | Object name | Prefix


## Relational Model
A significant segment of the database implementations are so called RDBMS - Relational Database Management Systems. Notable for their flexibility in data querying they utilize a standardized query language - SQL. Agile Toolkit takes advantage of the powerful features of RDBMS (joining, sub-selects, expressions) and has a significantly enhanced model class to work directly with the database through DSQL.

## addCache - Caches	
```

As you see in the example, model User's model combines definition of the fields with the methods to perform business operations with the model. When you design model methods, it's important that you follow these guidelines:
```
Once source is set, you can use a number of additional operations:
```

Model objects in Agile Toolkit are not tied in with any particular record. They can load any (but one) record from the data-set and save it. A single object can also iterate through the data-set by loading each individual record.
foreach($m as $row){
```

When iterating, the $row becomes automatically associated with the "data" property, however if you are willing to change the content of the model, you should use the $m instead:
```

Model's method loaded() will return true if model have been loaded with any data from the source and false otherwise.
```


## Deleting model data	

Relational Model base class (Model_Table) extends standard models and enhances them with various features. If you are already familiar with other ORM (Object Relational Mapper), you might wonder why it was necessary for Agile Toolkit to have it's own Model implementation.



ORM (Object Relational Mappers) are software API layers which are designed to abstract data manipulation backend and create a simpler interface. If you have used ORMs you would know the downsides:


```

The code seems simple enough, but unfortunately it generates large amount of queries: line #1 loads author and creates a query. line #2 traverses into books and also executes a query. It may also fetch all the books into memory (and it will include book abstracts, which is a large field, even though we might need only limited number of records. #4 traversing into "image" table would create one request per record creating a total of 1 simple query, 1 query with large result set and N more queries (for each result). If you know SQL, then you can write same thing in a single query:
    select name, url from book join image on image.id=book.image_id join author on author.id=author_id limit 20

Agile Toolkit ORM is much more efficient with the queries while retaining a simple object-oriented syntax. And I must add, that you do not need to define joins inside your "book" model for it to work (as you might not need them there all the time).
$author = $this->add('Model_Author');
```

The above code will produce the exact same query with two joins, even through the initial definition of books wouldn't have those joins defined.

```

Now the Book will use model for the "Image" to retrieve the expression for URL no matter how complex it is. Naturally, if URL is just a table field it would also work fine.

> While typical ORM associates Models with Tables, Agile Toolkit associates Models with Queries
## Actual Fields	




Model uses objects to describe each of it's field. Therefore when you create a model with 10 fields, it would populate at least 12 objects: Model's object. One object for each field. DSQL object for a model in general. Field object play a very direct role in creating queries for the model such as select, update and insert queries.


```

There are several classes which extend “Field”, such as:

Anything what was said in the AbstractObject section still applies to the field, for example - you can remove fields from model: $field->destroy();

It's highly advisable that if you use field of a model $model, you should use the query from $model->dsql(); 
    will specify the primary type of the field. Default value is text, but could also be: int, date, money, boolean. Views will attempt to properly display recognized fields, for example, date will be converted to a regional format on Grid and will use date-picker inside a form.
    specifies the exact field / column class to use for this field. When Form displays fields it relies to objects extended from Form_Field. By specifying value here, you can define how to display the value. `$model->addField('pass')->display('password');` If you specify the array, you can define the particular value for each view: `display(array('form'=>'password', 'grid'=>'text'));` You may also specify fields from add-ons in the format of 'addon/field_name'.
    can be set to "true" if you want field to be able and store HTML. By default forms will strip HTML from the input for security. If you wish to display HTML in-line, you might need to use setHTML() method of the template engine. 
    setting this to true will present the field as a mandatory on forms.
    specified value will be set to the field by default.
    
You must remember, that properties of a model serve the purpose of configuring Views to comply with your configuration. They will not restrict or validate the actual model. For example - you can still create model entry with a empty mandatory field.


This code will display grid with only two fields in exactly the specified order. Not always you would wan to specify a list of fields. If field list is omitted, then model will attempt to determine which fields to display based on number of flags.
     field will be loaded by model always , even if not present in actual fields. Setting system to true will also hide the field, but it can be un-hidden.
    field does not appear in the grid, form etc unless specifically added or requested by actual fields
    overrides hidden but for only particular widgets. E.g. if field is hidden, but editable it will appear on the form, but not in grid. Setting editable(false) will hide field from form even if it’s not hidden.
    the field will appear on the editable form but will be displayed using read-only field.

## Grid-related attributes	
    makes field visible in filter form.
    turns on sorting control on the grid column.	    
## Value lists and foreign keys	
    Specify associative array used to decode the value of the field. Inside a Grid, the key value will be substituted with the string: array('m'=>'Male'); Inside a form, the field will be presented as a drop-down.
    specify array (without keys) if you only only want a drop-down but do not want value substitution: `enum(array('small','medium','large'))`
    if your list value is not mandatory, it will allow user to select an empty value inside a drop-down. This method allows you to specify the value which will be presented to the user on that option: `emptyValue('Select Size')`;

    specify joined table to which field belongs. Instead you can call addField() method on a join object.
    used to change the actual name of the field inside a table. Using second argument to addField() allows you to specify this value.
    
## Specifying additional attributes	





Let's do a quick review. First, we have created and abstracted SQL queries through a query builder. Next we have created and abstracted model fields. Now we need to tie them together through our ORM implementation and this will give us table abstraction. Lets create model for "Book"
class Model_Book extends Model_Table {
```

## Manipulating Model Fields	
$m=$this->add('Model_Book');


class Model_Published_Book extends Model_Book {
```

but not only we can add additional fields, we can also add conditions, which would permanently change model's data-set.
```

```

Models can be loaded by using either ID key or other field:
```

So far no surprises. Any model can also produce a DSQL of itself to be used to build a custom queries:

 

```

What about browsing:
```

We can use this technique again for the Section model, however this time, we will use a method fieldQuery():
 
```

This is cool, but too much typing and manipulating with the models. I am going to show you a small example from the further chapters on how this can be simplified:
```

As you can see in the examples, you can achieve things on a low level with some effort, but the low level gets abstracted more and more to reveal new beautiful syntax.
```

The query above shows number of books written by the same author. But how do you write this code with the ORM? First let's try to build the query for our expression:
```

This might seem confusing, let's clean it up:
```

Let's review what's happening there. First we create a model, but we pass alias property which will affect all the queries generated by that model to use the specific alias. Next we create a new instance of the book but this time we use a different alias. At this point we have 2 models, identical, but with different aliases.


$m=$this->add('Model_Author');
```

This will create a model with only authors who wrote same amount of books as their age is. Someone who is 32 years old and wrote 32 books would match the condition.
$m=$this->add('Model_Author');
```
```


The actual model will be also loaded and can be used much more flexibly than the produced array. Also you must note that Agile Toolkit will never retrieve a full result set unless you specifically ask for it. The iterations will happen as you read data. Here is a slightly different format:
```

Be mindful of the expressions here. Book object is created first, then it's assigned to $book variable. Then the object is iterated and stores results in $junk array. We are not really interested in it, but we work with object directly.



```


Timestamps are equally easy to implement:
```

How about if we pack this functionality into a nice controller?




$this->add('CRUD')->setModel(
```

You might have already noticed one example with refSQL. When you are defining relations you can also specify which fields to use. The next chapter will look into Model() in details.


Agile Toolkit is a PHP UI Framework and it contains an infrastructure for object-based user interface building similar to those you would find in desktop and mobile applications.