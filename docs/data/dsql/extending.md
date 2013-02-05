# DSQL > Extending The DSQL Class

## Overview

In this section you will learn how to extend DSQL with sytax for new commands and support for new databases.

## The DSQL Class Structure

To customise the SQL generated for each database, DSQL uses database-specific classes that extend the base class `DB_dsql`:

	// In /atk4/lib/DB/dsql/mysql.php
	class DB_dsql_mysql extends DB_dsql {} 

When connecting to a database, DSQL sets the property `$db->type` based on the supplied connection configuration. With MySQL, for example, the type will be `mysql`. It also sets the `$db->dsql_class` property which determines which class is used.

## Getting DSQL To Use Your Extended Class

To specify your own extended class you can set `'class'=>'myclass'` in the DSN connection configuration array, or manually set the value of `$db->dsql_class` after connection.

Here is a sample extension for MySQL which adds a $q->showTables() command:

	class DB_dsql_mysqlextra extends DB_dsql_mysql {
    	function showTables(){
        	$this->template='show tables';
    	}
	}

In `config.php`, specify your new class:

	$config['dsn']=array(
    	'mysql:host=localhost;dbname=project',
    	'root',
    	'root',
    	'class'='DB_dsql_mysqlextra'
	);

Then in a Model:

	$q=$this->api->db->dsql();

	foreach($q->showTables() as $row){
    	$table=array_pop($row);
    	// ...
	}

## Overriding Existing Methods

If you want to customise `DB_dsql` methods for a specific RDBMS, you can simply override the method in your class. Here's an example from the `postgres` driver:

	class DB_dsql_pgsq extends DB_dsql {

    	// Postgres does not like backticks
    	public $bt='';

    	// Use the extended Postgres syntax for fetching an id on insert
    	function insert(){
        	parent::insert();
        	$this->template.=" returning id";
        	return $this;
    	}
	}

## Adding A sum() Function

Whenever you need to calculate sum of a column, you must create expression. How about creating a function for doing this easier?

    function sum($expr,$alias){
        return $this->field($this->expr('sum('.$expr.')'),$alias);
    }
