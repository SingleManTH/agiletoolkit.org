# DSQL > Overview


## Site: No generation of PHP code

Generated code is bad for many reasons and is against one of the core principles of Agile Toolkit. See also next point.

## Site: No knowledge of your database

DSQL help you to cerate queries. It does not attempt to look into your database, will not create field caches, hold information about field types or joins. That's job of a "Model" in Agile Toolkit.

## Site: No attempts to change database structure

Several ORMs will try to create, alter, modify or upgrade your database for you. There are several reasons why DSQL does not do that.

Security — your application must not be capable of changing your database structure. That's job of your installer.

Migration flexibility — Agile Toolkit has a method for upgrading database schema by executing SQL scripts directly. This makes it more flexible to not only change schema, but also to alter / fix data.

Features — Several RDBMS have very powerful capabilities. DSQL will not attempt to restrict you from using them.

## Site: Compact & Fast

All of DSQL is implemented in under 1000 lines of PHP code making it very lightweight and fast.

## Template example:

	 'select'=>"select [options] [field] [from] [table] [join] [where] [group] [having] [order] [limit]",
## What features are excluded by design from DSQL

DSQL have no knowledge of your database, tables or table fields. All of the fields must be explicitly specified. DSQL will never change the database structure. DSQL will not have any complex logic apart from query 
building.
