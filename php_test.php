<?php
    // Initialize connection variables.
    $host = "psql-hope.postgres.database.azure.com";
    $database = "hope";
    $user = "usr@psql-hope";
    $password = "pwd";

    // Initialize connection object.
    $connection = pg_connect("host=$host dbname=$database user=$user password=$password")
        or die("Failed to create connection to database: ". pg_last_error(). "<br/>");
    print "Successfully created connection to database.<br/>";

    // Drop previous table of same name if one exists.
    $query = "DROP TABLE IF EXISTS inventory;";
    pg_query($connection, $query)
        or die("Encountered an error when executing given sql statement: ". pg_last_error(). "<br/>");
    print "Finished dropping table (if existed).<br/>";

    // Create table.
    $query = "CREATE TABLE inventory (id serial PRIMARY KEY, name VARCHAR(50), quantity INTEGER);";
    pg_query($connection, $query)
        or die("Encountered an error when executing given sql statement: ". pg_last_error(). "<br/>");
    print "Finished creating table.<br/>";

    // Insert some data into table.
    $name = '\'banana\'';
    $quantity = 150;
    $query = "INSERT INTO inventory (name, quantity) VALUES ($1, $2);";
    pg_query($connection, $query)
        or die("Encountered an error when executing given sql statement: ". pg_last_error(). "<br/>");

    // Closing connection
    pg_close($connection);
