<?php
   define('DB_SERVER', 'us-cdbr-east-06.cleardb.net');
   define('DB_USERNAME', 'bc5674b7f014a2');
   define('DB_PASSWORD', '066b8068');
   define('DB_DATABASE', 'heroku_befc5ccfc798174');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   if (!$db)
{die ('Error querying database. ');}
?>

<?php
/*
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_DATABASE', 'fypdb_test');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   if (!$db)
{die ('Error querying database. ');}
*/
?>
