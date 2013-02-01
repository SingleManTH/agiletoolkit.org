# DSQL > Running Queries

## Overview

When your run your query, DSQL parses your query parameters into the following templates:

'select'=>"select [options] [field] [from] [table] [join] [where] [group] [having] [order] [limit]"

'insert'=>"insert [options\_insert] into [table\_noalias] ([set\_fields]) values ([set\_values])"

'update'=>"update [table\_noalias] set [set] [where]"

'replace'=>"replace [options\_replace] into [table\_noalias] ([set\_fields]) value ([set\_value])"

'delete'=>"delete from  [table\_noalias] [where]"

'truncate'=>'truncate table [table\_noalias]'

We'll cover each of these queries in turn.

## The select() Method

### Getting Your Data In A Single Call

Use one of these useful aliases:

	// Returns all rows as an array of hashes, or array() if no results.
	$data = $q->getAll();     
	
	// Alias for getAll();
	$data = $q->get();        
	
	// Returns a hash of the first row of data, or 'null' if no results.
	$data = $q->getRow();     

	// Returns the value of the first field set for the first row of data, or 'null' if no results or the result was 'null'.
	$data = $q->getOne();     

Calling getRow() multiple times will continue to return the first row of data.

### Getting Your Data Sequentially

These methods execute the query once, then enable you to loop through the result set. They return null if no more results are returned from the database.

The fetch() method enables you to loop through results fetching one row at a time: 

	while($row = $q->fetch()){
  		$my_value = $row['my_fieldname'];
	}

The DSQL object implements the Iterator interface, which means you can use it inside a foreach() block. The results are identical to the fetch() method, but the syntax is nicer.

	foreach($query as $row){
  		$my_value = $row['my_fieldname'];
	}

## The insert() Method

## The update() Method

## The replace() Method

## The delete() Method

	$this->dsql()->table('posts')->where('id <', 123)->delete();

## The truncate() Method

Used to empty a table of data:

	$this->dsql()->table('users')->truncate();