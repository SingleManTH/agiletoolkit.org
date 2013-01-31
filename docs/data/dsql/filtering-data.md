# DSQL > Filtering Query Data

## Filtering Results With The where() Method

Calling the $query->where() method will narrow the returned data set by applying filter conditions.

In this section we cover the different arguments accepted by where(). 

## Basic Usage: where(string, primitive)

The first argument is a string which includes a field name. The second argument is a primitive type (string, number) and will be automatically converted into a safe parameter.

	$q->where('id', $num);        			// where id=:a    		'a'=>$num
	$q->where('id >', $num);       			// where id>:a    		'a'=>$num
	$q->where('id !=', $num);      			// where id!=:a   		'a'=>num
	$q->where('id like', $str); 			// where id like :a   	'a'=>$str
	$q->where('id in', array($num, $num2)); // where id in(:a,:b)   'a'=>$num, 'b'=>$num2

If the second argument is 'null' then the operation 'is NULL' is used automatically:

	$q->where('id', null);       		// where id is NULL
	$q->where('id is', null);    		// where id is NULL
	$q->where('id !=', null);     		// where id is NOT NULL
	$q->where('id is not', null); 		// where id is NOT NULL

## Using With Expressions: expr()

Use $q->expr() to insert expressions:

	// Single argument mode
	$q->where($q->expr('a=b'));

	// Using an operator with the first argument
	$q->where('date >', $q->expr('DATE_SUB(CURDATE(), INTERVAL 2 MONTH)');

	// Using parameters in expressions. Unlike where('id', 1) this will not use the equality operator
	$q->where('age', $q->expr('between :left and :right')->param(array('left'=>$l, 'right'=>$r)));

	// You can use expressions in both arguments
	$q->where($this->expr('length(password)'), $q->expr('between 3 and 10'));

	// An alternative way to specify parameters using concatenation
	$q->where($this->expr('length(password)'),'>',5);

????????

	Please avoid use of param(), because it may result in the clash, sub-query uses same params as a master query.

?????????

## AND Conditions: where(..)->where()

Calling where() multiple times will require all of the conditions to be met, using the SQL 'AND' operator:

	$q->where('email', null)->where('phone', null);	// where email is NULL and phone is NULL

## OR Conditions: where(array)

Calling where() with a single array argument will use OR to join those conditions.

	$q->where(array(
  		array('id',1),
  		array('id',2)
  	));

	// Generates: where (id=:a or id=:b)  array('a'=>1, 'b'=>2)

You can even specify arrays recursively:

	$q->where(array(
  		array($q->expr('len(name)'),'>',5),
  		array($q->expr('a=b')) 
  	));

	// Generates: where (len(name)>:a or a=b)  array('a'=>5)

Or you might prefer the alternative syntax for 'OR' conditions:

	$q->where( $q->or()->where('a', 1)->where('b >', 5) );

## Subqueries

	You can use $q->dsql() as a quick way to produce sub-queries. Calling this method will create a new DSQL object, which you can use in a similar way to expressions.

	$q->table('author')
 		->field('name')
 		->where('book_id', $q->dsql()->table('book')->where('is_rented', 'Y'));   // by default "id" field is used.
  	// produces: select name from author where book_id in (select id from book where is_rented=:a)    array('a'=>'Y')

<!-- Better to have an example that's not an inefficient query?! -->

  	// Note: This is quite ineffective way for listing all authors who's books are rented

	// Display the names of authors who have more than 5 books
	$q->table('author')
  		->field('name')
  		->where(
    		$q->dsql()
      			->table('book')
      			->where('author_id', $q->getField('id'))
      			->field('count(*)'),
    '>',5);    

  // Outputs:  select name from author where (select count(*) from book where author_id=author.id)>5