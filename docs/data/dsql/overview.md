# DSQL > Overview

## Features

DSQL ("Dynamic SQL") is a Query Builder for dynamic SQL. A DSQL object represents a single query and collects information about fields, conditions, expressions and joins for rendering into SQL. It then runs the query and enables you to iterate through any results.

With DSQL your Models can build queries of open-ended complexity conveniently, flexibly and securely.

### Access The Full Power Of Your RDBMS

There are times when you need to use lowest common denominator SQL for portability between databases. DSQL uses the PDO database abstraction library, so you have access to PDO's portability features. 

But for projects where you need the full power of your chosen RDBMS you have access to all advanced data types, transactions, joins, sub-queries, aggregates, functions and other vendor-specific features. Currently DSQL can be used with MySQL, SQLite, PostgreSQL and Oracle. Queries are optimized to match the syntax of your database. If you need any vendor-specific feature that's not already available in the class, it's easy to [extend DSQL](/docs/relational/todo) to add it.

DSQL does not attempt to completely overlap PDO, though it implements all the most useful features. But you can still [access the PDO object]() embedded in DSQL objects if you have advanced requirements.

### Modify Existing Queries At Any Time

Unlike most query builders DSQL allows you to add or remove any aspect of the query at any time, including fields, joins, conditions and parametric variables. Even after you execute the query, you can still modify and re-use the object.

This is important when you need to pass query information between Models or even allow a Controller or Addon to interact with a query. Queries can be cloned, and multiple queries can exist and can even be executed simultaneously without affecting each other.

### Use A DSQL Object As A Sub-query Within Another DSQL Query

Another cool feature is the ability to use existing DSQL objects within a DSQL query while dynamically preserving the existing object's parametric variables. This is typically used for sub-queries.

### Avoid Any Danger Of SQL Injection

While all modern ORMS and Query Builders offer safe parametric queries for untrusted variables they rarely enforce their use, and you may have to resort to raw SQL when you run up against feature limitations. So developer error can still leave you vulnerable to SQL injection exploits.

With DSQL there is never any need to write error-prone raw SQL. You call functions, passing in query variables as arguments which become parametric values inside DSQL. So it's virtually impossible to produce an unsafe query.

Though it's important to remember that you may be vulnerable to vendor-specific buffer overflow and stored procedure exploits, so it's still prudent to validate all untrusted input with care.

### Enjoy The Benefits Without Performance Issues

DSQL is lean and fast, so you can use it freely without any concern about performance issues.

## Code Example

Here's a simple example of DSQL in action:

	$name = $this->api->db->dsql()
  		->table('user')
  		->field('name')
  		->where('id',$_GET['id'])
  		->do_getOne();

## How It Works

Unlike most Query Builders, the DSQL object stores your query properties and only renders SQL when the query is run, using query templates such as:

  'select'=>"select [options] [field] [from] [table] [join] [where] [group] [having] [order] [limit]"

This is how DSQL achieves it's flexibility.

## Uses

In Agile Toolkit, all interaction with relational databases is managed through [Relational Models](/data/relational/overview).

So **DSQL should never be used on it's own**: it's designed for use within Models.

Relational Models already offer a range of flexible built-in queries, so a typical Agile Toolkit developer will rarely need to use DSQL directly. But for expert developers and advanced requirements DSQL provides an awesome way to add power and flexibility to your Agile Toolkit Models.