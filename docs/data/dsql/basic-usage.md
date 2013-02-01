# DSQL > Basic Usage

## Workflow

Let's walk through a basic query before we get down to details. To use DSQL:

1. First, connect to the database
1. Then create your DSQL object and configure your query
1. Execute the query
1. And if you run into problems, echo out the SQL for debugging.

## Connecting To The Database

You connect to your default database with the API helper function dbConnect(), which will automatically read the database settings from your configuration file and initialize a connection. You will normally be doing this in the init() method of your application API:

	function init(){
        parent::init();
        $this->dbConnect();
	}

Once created, the connection object is accessible through the $api->db property.

To add additional connections, set a PDO-style [Data Source Name (DSN)](http://php.net/manual/en/ref.pdo-mysql.connection.php) connection string as a custom value in your config file. Then you connect by using the DB object's connect() method: 

	$config['my_dsn'] = "mysql://user:password@localhost/testdb";
	$mydb=$this->add('DB')->connect('my_dsn');

If you call connect() without an argument, it will look for a DSN string in $config['dsn'].

Database connections in Agile Toolkit are lazy — they will not be physically created unless you execute a query.

## Creating The Query Object

DSQL query objects are created by calling the dsql() function of the default DB object or any additional DB objects. This function returns an empty query object which you use to build your query.

	// Use the default connection
	$query = $this->api->db->dsql();

	// Use additional connections
	$query = $mydb->dsql();

You can also call $model->dsql() which will return a DSQL query object initialized with your existing Model settings, which can then be customized.

When you create a DSQL object using an existing connection it will optimise the SQL syntax for the database being used. If you create a DSQL object before connecting to the database it will generate generic SQL. So you will normally want to set up a connection before creating a query object.

## Configuring A Query

DSQL offers a comprehensive range of methods for configuring your query. You can call those methods several times and in any order &ndash; you can even adapt and reuse a query after it has been executed. The methods can be chained:

	$query = $this->api->db->dsql();
	$query->table('user')
  			->where('type','admin')
  			->field('id');
  
	// Refine the configuration & execute the query
	$data = $query->order('created_time')
  			->field('name,surname')
  			->getAll();

	// Produces: 
	//   $data=array(
	//      array('id'=>1, 'name'=>'John', 'surname'=>'Smith'),
	//      array('id'=>2, 'name'=>'Joe', 'surname'=>'Bloggs')
	//    ); 

When you build the query by calling methods, your arguments could be:

1. Field Names, such as \`id\`
2. Unsafe variables, such as $_GET['id']
3. Expressions such as "now()".

	$q=$this->api->db->dsql()->table('user'); 
	$q->where('id',$_GET['id']);
	$q->where('expired','<',$q->expr('now()'));
	$data = $q->field('count(*)')->getOne();

For MySQL the example above will produce the query:

    select count(*) from `id`=123 and `expired`<now();

We'll cover these methods [here](/docs/dsql/defining-queries), though most of the names are self-explanatory.

Calling $query->table('my_table') is the only requirement before you execute your query.

## Executing The Query

DSQL offers [a number of methods](/todo) for executing your query and filtering the result set. For example:

	$data = $q->getAll(); 
	$data = $q->getRow();

## Debugging The Query

DSQL has a method debug() which will echo your query as it's executed:

	$q=$this->api->db->dsql();
	$q->table('user');
	$q->field('name');
	$q->debug();
	$data = $q->getAll();    // Will output debugging information