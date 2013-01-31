# DSQL > Specifying Fields

## The field() Method

This section covers the options for specifying the fields to be returned by your query. 

DSQL provides the field() method, which supports several calling patterns.

## Basic Usage. field(string)

You can specify one or several fields to be queried simply by listing field names in a string:

	$q->field('name, surname');

When you're joining tables, you can use the second argument can be used to specify the table the field is queried from.

	$q->table('user')
  		->table('address')
  		->where($q->expr('address.user_id=user.id'))
	  	->field('name','user')
  		->field('postcode','address');

	// Produces: select user.name, postcode.address from user,address where address.user_id=user.id

Obviously DSQL ensures that table and field names will be properly quoted according to the syntax of your RDBMS.

## Specifying Field Aliases. field(string,string,string) Or field(array,string)

The third argument to field() will assign a field alias, which is used in the associative array which is used for data fetching.

You can also specify a list of fields in array, then you can use array keys as aliases.

	$q->table('user')
  		->table('address')
  		->where($q->expr('address.user_id=user.id'))
  		->field(array('address_alias'=>'alias','postcode'),'address')
  		->field(array('name','surname'),'user')
  	;

// Produces: select alias.address  as alias, postcode.address, name.user, surname.user .....
Using expressions. field(object, alias)

Expressions can't use tables. Therefore if first argument is an object, second argument is treated as an alias instead. You still can use expressions inside arrays too.

$q->field($q->expr('length(name)'),'name_length');

$q->field(array(
  'name_length'=>$q->expr('length(name)'),
  'surname_length'=>$q->expr('length(surname)')
));
Subqueries
Similarly to expressions, you may use subqueries.

$q
  ->table('author')
  ->field('name')
  ->field(
    $q->dsql()
    ->table('book')
    ->where('author_id',$q->getField('id'))
    ->field($q->expr('sum(pages)')),
    'total_pages'
  );

// Produces: select name,(select sum(pages) from book where author_id=author.id) total_pages from author

