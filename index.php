<!doctype html>
<meta charset="utf-8">
<title><?php echo gethostname(); ?></title>
<h1><?php echo gethostname(); ?></h1>
<ul>
  <?php

  $host = 'localhost';
  $ignore = array( 'html' );
  /* Ports to scan for available services */
  $ports = array(81, 3000, 3001, 3030, 3031, 5000, 8080, 8081, 9000, 9001);

  $dirs = glob( dirname( __FILE__ ) . "/*", GLOB_ONLYDIR );

  /* List all subdirs */
  foreach( $dirs as $dir ){
    $dir = basename( $dir );
    if( !in_array( $dir, $ignore ) ){
      echo "<li><a href=\"$dir\">$dir</a>";
    }
  }

  /* Also check commons ports */
  foreach ($ports as $port)
  {
      $connection = @fsockopen($host, $port);

      if (is_resource($connection))
      {
          echo "<li><a href=\"http://$host:$port\">$host:$port</a>";
          fclose($connection);
      }

  }
  
  ?>
</ul>