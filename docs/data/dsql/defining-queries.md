# DSQL > Defining Queries

## Overview

In this section we cover the methods available in DSQL for defining your query, and in the next section we cover the methods for running it. 

We assume a basic knowledge of SQL.

## Expressions & Subqueries

Expressions & Subqueries are used in multiple query definition methods, so we deal with them first.

### Expressions

The $q->expr() method is used to access the full range of functions within your RDBMS. Simply pass in the expression as a string:

	$q = $this->dsql()->table('bonuses');
    $q->field($q->expr('sum(bonus)'));

You can use named parameters in expressions to ensure the safe use of untrusted data:

	$q->where('age', $q->expr('between :left and :right')->param(array('left'=>$l, 'right'=>$r)));

### Subqueries

You can use $q->dsql() as a quick way to produce sub-queries. Calling this method will create a new DSQL object, which you can use in a similar way to expressions. Or an existing query object can used, if available.

  	// Outputs: 'select name from author where book_id in (select id from book where is_rented=:a)'    array('a'=>'Y')
	$q->table('author')
 		->field('name')
 		->where('book_id', $q->dsql()->table('book')->where('is_rented', 'Y'));

## Tables

Use the table() method to set one or more tables for your query:

	table('user') 								// Sets the main table
	table('user','u') 							// Aliases the table with 'u'

	table('user')->table('salary') 				// Sets multiple tables (for joins, etc)
	table('user', 'u')->table('salary', 's') 	// Sets multiple aliased tables
	
	table(array('user', 'salary')) 				// Alternative syntax for setting multiple tables
	table(array('u'=>'user','s'=>'salary')); 	// Set aliases for multiple tables

## Fields

Use the field() method to add physical ﬁelds to the query, or ﬁelds expressed with a formula (expressions). You can also set field aliases for use in query conditions.

If you don't call ﬁeld() in your query, DSQL will default to '*'.

	ﬁeld('name') 									// Set a single field
	ﬁeld('name', 'user') 							// Set field 'name' in explicit table 'user' (for joins, etc)

	ﬁeld('first_name, last_name'); 					// Set multiple fields
	ﬁeld('name','user')->ﬁeld('line1','address')		// Set multiple fields

	ﬁeld(array('name', 'surname')); 				// Alternative syntax for multiple fields

	ﬁeld(array('n'=>'name','s'=>'surname'));  		// Set aliases for ﬁelds
	ﬁeld(array('n'=>'name'), 'user'); 				// Set aliased field with explicit table

	// Set a field to hold the result of an expression
	ﬁeld($q->expr('year(now)-year(birth)', age'); 			
	
	// Set a field to hold the result of a subquery
	ﬁeld($q->dsql()->table('book')->ﬁeld('count(*)'), 'books'); 

## Conditions ('WHERE' Clauses)

Calling the $query->where() method will filter the data set returned by 'SELECT' queries, and the rows affected by 'UPDATE' and 'DELETE' queries.

### Basic Usage: where(string, primitive)

The first argument is a string which includes a field name. The second argument is a primitive type (string, number) and will be automatically converted into a safe parameter.

	$q->where('id', $num);        			// where id=:a    		'a'=>$num

To use the 'WHERE' clause operators =, <>, !=, >, <, >=, <=, LIKE, IS and IN:

	$q->where('id >', $num);       			// where id>:a    		'a'=>$num
	$q->where('id !=', $num);      			// where id!=:a   		'a'=>num
	$q->where('id like', $str); 			// where id like :a   	'a'=>$str
	$q->where('id in', array($num, $num2)); // where id in(:a,:b)   'a'=>$num, 'b'=>$num2

To use the 'WHERE' clause operator 'BETWEEN':

	// With safe variables
	$q->where('age', $q->expr('between 5 and 18'))

	// With untrusted variables
	$q->where('age', $q->expr('between :left and :right')->param(array('left'=>$l, 'right'=>$r)));

<!-- 
The BETWEEN syntax seems verbose and inconsistent with the IN syntax. Can't we have:

$q->where('id between', array($num, $num2));
 -->

In all other cases, use this syntax for your 'WHERE' operator:

	$q->where($field, '>', $value)

If the second argument is 'null' then the operation 'is NULL' is used automatically:

	$q->where('id', null);       		// where id is NULL
	$q->where('id is', null);    		// where id is NULL
	$q->where('id !=', null);     		// where id is NOT NULL
	$q->where('id is not', null); 		// where id is NOT NULL

To compare fields, use the getField() helper method to format a quoted field name:

	$q->where('income >', $q->getField('expense'));
	$q->where($q->getField('income'), '>', $q->getField('expense'));

### 'IN' clauses:
	
	// Outputs: 'state in (open, closed, resolved)'
	$q->where('state', array('open','closed','resolved'));  
	
### Expressions: expr()

	// Single argument mode
	$q->where($q->expr('a=b'));

	// Using an operator with the first argument
	$q->where('date >', $q->expr('DATE_SUB(CURDATE(), INTERVAL 2 MONTH)');

	// You can use expressions in both arguments
	$q->where($this->expr('length(password)'), $q->expr('between 3 and 10'));

	// An alternative way to specify parameters using concatenation
	$q->where($this->expr('length(password)'),'>',5);

????????

	Please avoid use of param(), because it may result in the clash, sub-query uses same params as a master query.

?????????

### Subqueries

	// Display the names of authors who have more than 5 books
  	// Outputs: select name from author where (select count(*) from book where author_id=author.id)>5

	$q->table('author')
  		->field('name')
  		->where(
    		$q->dsql()
      			->table('book')
      			->where('author_id', $q->getField('id'))
      			->field('count(*)'), '>',5);    


### AND Conditions: where(..)->where()

Calling where() multiple times will require all of the conditions to be met, using the SQL 'AND' operator:

	$q->where('email', null)->where('phone', null);	// where email is NULL and phone is NULL

### OR Conditions: where(array)

Calling where() with a single array argument will use OR to join those conditions.

	$q->where(array(
  		array('id',1),
  		array('id',2)
  	));

	// Generates: where (id=:a or id=:b)  array('a'=>1, 'b'=>2)

You can even specify arrays recursively:

	// Generates: where (len(name)>:a or a=b)  array('a'=>5)
	$q->where(array(
  		array($q->expr('len(name)'),'>',5),
  		array($q->expr('a=b')) 
  	));

	Or you might prefer the alternative syntax for 'OR' conditions:

	$q->where( $q->or()->where('a', 1)->where('b >', 5) );


The second format here will also use a table preﬁx for expense, which is nice 
when you are using multiple joins. You can also use getField for the ﬁrst argument:

	where($q->getField('income'),'>',$q->getField('expense'));

## 'HAVING' clauses

The having() method has the same syntax as the where() method described above.

## Joins

Use the join($table_name [, $field_name] [, $join_type]) method to query data from multiple tables.

### Default Conventions

If you don't specify field names explictly, join() assumes:

* Primary keys are named 'id' (eg, author.id)
* Foreign keys are named 'tablename\_id' (eg, book.author_id)

### Setting Inner Joins

To set a standard 'INNER JOIN':

	// Join 'author' on 'author.id=book.author_id'
	$q->table('book')->join('author');

	// Specify a non-default primary key in 'author'
	// Joins 'author' on 'author.author_id=book.author_id'
	$q->table('book')->join('author.author_id');

	// Specify a non-default foreign key in 'book'
	// Joins 'author' on 'author.id=book.author_code'
	$q->table('book')->join('author', 'book.author_code');

### Setting Other Join Types

Use the third argument in join() to specify a non-default join type. You can use 'left', 'right', 'outer' or any type supported by your RDBMS.

	// Joins with 'left join manager on manager.id=user.manager_id'
	$q->table('user')->join('manager', null, 'left');
	
### Setting A Table Alias

Similarly to field() you can use array('alias'=>'table') as a first argument to the join()

	// Outputs 'join manager m on m.id=user.manager_id'
	$q->table('user')->join(array('m'=>'manager'));

	// Set multiple aliases
	$q->table('user')->join(array('m'=>'manager','a'=>'address'));
	$q->table('book)->join(array('a'=>'author','c'=>'chapter.book_id')); // two joins

If  you need a further ﬂexibility with the join, you can use expressions. You can chain join() expressions using andExpr() and orExpr().

	 // Join info on 'info.issn=book.issn and info.is_active=1'
	join('info',$q->andExpr()->where('info.issn',$q->getField('issn')->where('info.is_active',1))

	 // Join info on 'info.issn=book.issn or info.is_active=1'
	join('info',$q->orExpr()->where('info.issn',$q->getField('issn')->where('info.is_active',1))

<!-- Is this still the correct syntax? -->

## Grouping

Use the group() method to set 'GROUP BY' clauses.

	group('sex') 						// Group by a single field
	group('sex, age');					// Group by multiple fields		
	group(array('sex', 'age'));			// Alternative syntax for multiple fields
	
	// Group by expression
	group($q->expr('year(created)'));

	// Group by field and expression
	group(array('sex', $q->expr('year(created)')));

## Ordering

<!-- Please check examples - I think there were mistakes in the Official Guide but I may be wrong! -->

Use the method order() to order 'SELECT' results by one or more fields or expressions. 

The default direction is ascending, but you can specify 'asc' if desired for legibility. Use 'desc' to set descending ordering.

	order('age') 						// Ascending order by field 'age'
	order('age asc') 					// Set ascending order explicitly
	order('age desc'); 					// Descending order by field 'age'

	order('age, sex'); 					// Ascending order by fields 'age' & 'sex'
	order(array('age', 'sex')); 		// Alternative syntax for multiple fields

	order('age desc, sex');				// Order by 'age' (descending) & 'sex' (ascending)				
	order(array('age desc', 'sex'));	// Alternative syntax 

	order($q->expr('year(birth)'));				// Ascending by expression
	order($q->expr('year(birth)', true));		// Descending by expression

## Limiting

Use the limit() method to limit the result set:

	limit($num_rows)
	limit($num_rows, $offset)

## Options

Many SQL commands offer options such as 'SELECT DISTINCT' or 'INSERT DELAYED'. There are currently two methods for setting options:

	option('distinct'); 				// Set options for 'SELECT' queries
	option_insert('delayed'); 			// Set options for 'INSERT' queries
	option('distinct high_priority'); 	// Set multiple options

## Setting Values

Use the set() method to set values in 'INSERT' and 'UPDATE' queries:
	
	set('id', $_GET['id'])); 			// Unstrusted data
	set('votes', $q->expr('votes+1'));	// Expression

	// Setting multiple values
	set(array('votes' => $q->expr('votes+1'), 'poll'=>$poll ));