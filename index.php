<!doctype html>
<meta charset="utf-8">
<title><?php echo gethostname(); ?></title>
<h1><?php echo gethostname(); ?></h1>
<ul>
  <?php

  $host = 'localhost';
  $ignore = array( 'html' );
  /* Ports to scan for available services */
  /* https://github.com/search?q=%22app.listen%22&type=Code&utf8=%E2%9C%93 */
  $ports = array(80, 81,
                 1337, 1433, 1434, 1521, 1522, 1525, 1529, 1599,
                 3000, 3001, 3030, 3031, 3300, 3333, 3339, 3999,
                 4000, 4001, 4873,
                 5000, 5001, 5050, 5555, 5800, 5900, 5999, 6000,
                 8000, 8001, 8080, 8081, 8088, 8090, 8091, 8099,
                 8100, 8101, 8181, 8880, 8881, 8888, 8890, 8891,
                 9000, 9001, 9900, 9901, 9980, 9981, 9900);

  $dirs = glob( dirname( __FILE__ ) . "/*", GLOB_ONLYDIR );

  /* List all subdirs */
  foreach($dirs as $dir) {
    $dir = basename( $dir );
    if (!in_array( $dir, $ignore )) {
      echo "<li><a href='$dir'>$dir</a>";
    }
  }

  /* Also check commons ports */
  foreach ($ports as $port) {
    $connection = @fsockopen($host, $port);

    if (is_resource($connection)) {
      echo "<li><a href=\"http://$host:$port\">$host:$port</a>";
      fclose($connection);
    }

  }
  
  ?>
</ul>
