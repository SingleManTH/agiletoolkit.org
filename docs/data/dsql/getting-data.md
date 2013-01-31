# DSQL > Getting Query Data

## Getting Your Data With A Single Call

These methods execute your query and return some or all of your data: 

	$data = $q->getAll();     // Returns all data as array of hashes, or array() if the query produced no results.
	$data = $q->get();        // Alias for getAll();
	$data = $q->getRow();     // Returns only first row of data, or 'null' if query produced no results.
	$data = $q->getOne();     // Returns the first field specified of the first row of data, or 'null' if query produced no results or result was null.

Calling getRow() multiple times will continue to give you first row of data.

## Getting Your Data Sequentially

These methods execute the query once, then enable you to loop through the result set. They return null if no more results are returned from the database.

## Using The fetch() method

This enables you to loop through results fetching one row at a time: 

	while($row = $q->fetch()){
  		$my_value = $row['my_fieldname'];
	}

## Using The Query Object Iterator

The DSQL object implements the Iterator interface, which means you can use it inside a foreach() block. The results are identical to the fetch() method, but the syntax is nicer.

	foreach($query as $row){
  		$my_value = $row['my_fieldname'];
	}

## Use With Lister, CompleteLister & Grid

Starting from Agile Toolkit 4.2, the Lister class and all derived classes (CompleteLister, Grid) accept classes that implement the Iterator interface through their setSource() method:

	// Set up the query
	$q=$this->api->db->dsql();
	$q->table('user')->field('name')->field('surname');
	
	// Set up the grid
	$grid = $this->add('Grid');
	$grid->addColumn('text','name');
	$grid->addColumn('text','surname');

	// Bind the data source to the grid
	$grid->setSource($q);