# DSQL > Overview

## What Is DSQL?

DSQL ('Dynamic SQL') is a Query Builder for dynamic SQL. A DSQL object represents a single query and collects information about fields, conditions, expressions and joins for rendering into SQL. It then enables you to run the query and iterate through any results.

With DSQL your Models can build queries of open-ended complexity conveniently, flexibly and securely.

## Why Use A Query Builder?

<<<<<<< HEAD
Agile Toolkit executes all of it's queries through DSQL. To a SQL veterans it may seem limiting, but for a extensible framework some benefits of DSQL are very essential:


* ability to pass Query-related information between objects;
* dynamic query object can be modified much easier and safer than SQL strings;
* DSQL may render query differently depending on database vendor;
* you virtually eliminate the danger of SQL injection exploits.

## Features

### Built on a PHP PDO with parametric queries

DSQL takes full advantage of parametric queries implemented by the [PDO database abstraction library](http://php.net/manual/en/book.pdo.php). Should you want to do something very specific with your data-base, you can access PDO-statement objects through `$dsql->stmt`. 

It is easy to [extend DSQL](/docs/relational/extending) if it lacks any specific feature you require. DSQL in Agile Toolkit have been tested with MySQL, SQLite, PostgreSQL and Oracle but should work with other ANSI-SQL compatible databases supported by PDO.
=======
Agile Toolkit executes all of its queries through DSQL. To SQL veterans this may seem limiting, but for an extensible framework DSQL offers essential benefits:
	
* Query-related information can be passed between objects
* DSQL query objects can be modified much more easily and safely than SQL strings
* DSQL can optimise the SQL generated for each supported RDBMS
* You virtually eliminate the danger of SQL injection exploits.

## Features

### Write portable SQL, or access the full power of your RDBMS

DSQL is built on PHP's [PDO database abstraction library](http://php.net/manual/en/book.pdo.php). 

It's been tested with MySQL, SQLite, PostgreSQL and Oracle, but should work with other ANSI-SQL compatible databases supported by PDO.

If you need to write portable code, you have access to PDO's database abstraction features. 
>>>>>>> Merging in Romans comments on DQSL, finishing running-queries

Or if you prefer, DSQL will also give you access to most of the vendor-specific features of your chosen RDBMS. It's easy to [extend DSQL](/docs/data/dsql/extending) if it lacks any specific feature you require. And if you need to do something very specific with your database you can access PDO statement objects directly through `$dsql->stmt`. 
	
### Modify existing queries at any time

<<<<<<< HEAD
DSQL does not join part of your query right away. It stores query template and values separately until it's required to build the query. That gives some advantages over other commonly-used query builders:

 * you can remove parts of query;
 * you can change the query template at any time - change from "select" to "delete";
 * you can customize the query template and build your own queries

Ability to modify existing query is important and is used in classes such as "Relation" or "Expression", which add complex parts of query to your Model. Various Controllers and Add-ons can contribute query alterations without the need to change the base model.
=======
Unlike most query builders DSQL allows you to add or remove any element of your query at any time, including fields, joins, conditions and parametric variables. You can even change the query type &ndash; from SELECT to DELETE for example. After you execute the query you can still reconfigure and reuse the object.

This is important when you need to pass query information between Models or even allow a Controller or Addon to interact with a query. Queries can be copied, adapted and extended. And multiple queries can exist and execute without affecting each other.
>>>>>>> Merging in Romans comments on DQSL, finishing running-queries

### Use a DSQL object as a subquery

Another cool feature is the ability to use existing query objects within a DSQL query while dynamically preserving the existing object's parametric variables. This is typically used for subqueries.

With ability to recursively merge parametric variables without your assistance allows you to never again worry about re-using same sub-query several times and running a risk of encountering conflicts between parameters.

### Virtually eliminate the danger of SQL injection

While all modern ORMS and Query Builders offer a mechanism for safely quoting untrusted input it's often rather tedious to use.

PDO Example:
	
	$sth = $dbh->prepare("select name from user where id = :id"); 	
    $sth->execute(array(':id'=>$id));	
	$name = $sth->fetchColumn();

In DSQL the syntax is simpler, so even a harassed developer is less likely to take shortcuts and write unsafe code.

DSQL Example:

<<<<<<< HEAD
While all modern ORMS and Query Builders offer mechanisms for encoding input they rarely make it easy to use.

PDO Example:

    $sth = $dbh->prepare("select name from user where id = :id");
    $sth -> execute(array(':id'=>$id));
    $name = $sth->fetchColumn();
    
DSQL Example:

    $name = $dsql->table('user')->field('name')->where('id',$id)->getOne();

In DSQL using PROPER syntax is simpler and even lazy developer wouldn't hesitate to write safe code. To make your application most secure, always cast input arguments to a proper format:

    $name = $dsql->table('user')->field('name')->where('id',(int)$_GET['id'])->getOne();
=======
	$name = $dsql->table('user')->field('name')->where('id', $id)->getOne();

Though it's important to remember that you may still be vulnerable to vendor-specific buffer overflow and stored procedure exploits. So it's always prudent to validate untrusted data, and you should cast arguments to the correct type:

	$name = $dsql->table('user')->field('name')->where('id', (int)$_GET['id'])->getOne();
>>>>>>> Merging in Romans comments on DQSL, finishing running-queries

### Enjoy the benefits without performance issues

<<<<<<< HEAD
DSQL is lean and fast. It adds minor overheads when building the query, but it creates no overheads when executing the query and fetching data. There are absolutely NO reason why SHOULDN'T you use DSQL.

=======
DSQL is lean and fast. It adds a minor overhead when building the query, but it creates no overheads when executing the query and fetching data. You will rarely, if ever, encounter a use-case where you need to use raw SQL for performance reasons.
>>>>>>> Merging in Romans comments on DQSL, finishing running-queries

## Code Example

Here's a simple example of DSQL in action:
<<<<<<< HEAD

```
foreach(
    $this->api->db->dsql()
        ->table('user')
        ->where('gender','M')
    as $row
) {
    echo "Name: ".$row['name'];."\n";
}
```
=======

	foreach(
		$this->api->db->dsql()
			->table('user')
			->where('gender','M')
			as $row) {
				echo "Name: ".$row['name'];."\n";
			}
>>>>>>> Merging in Romans comments on DQSL, finishing running-queries

## How It Works

Unlike most Query Builders, the DSQL object stores your query properties and only renders SQL when the query is run, using query templates such as:

  'select'=>"select [options] [field] [from] [table] [join] [where] [group] [having] [order] [limit]"

<<<<<<< HEAD
There are several pre-defined templates and you can always use your own. This is how DSQL achieves it's flexibility.
=======
There are several pre-defined templates and you can always add your own. This is how DSQL achieves its flexibility.
>>>>>>> Merging in Romans comments on DQSL, finishing running-queries

## Uses

Regardless of how tempting DSQL is, as a developer you should not use it for queries. This is low-level layer used by [relational models](/data/relational/overview) and you should use them instead if possible. Here is example of BAD code:

    $name = $dsql->table('user')->field('name')->where('id',(int)$_GET['id'])->getOne();

GOOD Code:

    $name = $this->add('Model_User')->loadBy((int)$_GET['id'])->get('name');

In both cases, the result is one query, so as far as performance is concerned, there are almost no benefit in using DSQL where you can use Model.

<<<<<<< HEAD
=======
In Agile Toolkit, interaction with relational databases is managed through [Relational Models](/data/relational/overview). DSQL is primarily a low-level layer used by the Model class to generate queries using its own convenient and object-oriented query syntax. Models will cover most of your query needs, and whenever possible you should use this Model syntax rather than accessing DSQL directly. 

	// BAD code:

	$name = $dsql->table('user')->field('name')->where('id',(int)$_GET['id'])->getOne();

	// GOOD Code:

	$name = $this->add('Model_User')->loadBy((int)$_GET['id'])->get('name');

In both cases the result is one query, so there is almost no performance benefit to using DSQL.

You would only use DSQL directly when:

* You require SQL features that can't be accessed through the Model query syntax
* You are extending the Model class to add new features.
>>>>>>> Merging in Romans comments on DQSL, finishing running-queries
