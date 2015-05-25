<!doctype html>
<meta charset="utf-8">
<title><?php echo gethostname(); ?></title>
<h1><?php echo gethostname(); ?></h1>
<ul>
  <?php

  $ignore = array( 'html' );

  $dirs = glob( dirname( __FILE__ ) . "/*", GLOB_ONLYDIR );

  foreach( $dirs as $dir ){
    $dir = basename( $dir );
    if( !in_array( $dir, $ignore ) ){
      echo "<li><a href=\"$dir\">$dir</a>";
    }
  }
  
  ?>
</ul>