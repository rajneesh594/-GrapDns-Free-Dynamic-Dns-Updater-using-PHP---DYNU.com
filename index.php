#!/usr/bin/php -q
<?php
   {   
    include(__DIR__.'/functions/func.php');
       $ip = get_ip();
       echo "$ip";
       echo "<br>";
       $mes=check($ip);  
       echo "$mes";    
      echo "X";
}
?>
