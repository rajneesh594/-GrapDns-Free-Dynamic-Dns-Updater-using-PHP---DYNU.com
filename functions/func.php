<?php
     
   {
       function get_ip()//for getting ip
      {
        $ip = $_REQUEST['REMOTE_ADDR']; // the IP address to query
        $query = @unserialize(file_get_contents('http://ip-api.com/php'.$ip));
        if($query && $query['status'] == 'success')
        {
          $get_ip=$query['query'];
          return ($get_ip);
        }else 
        {
           return ("error");
        }   
           
       }
       
       function check($ip)
       {
          include(__DIR__.'/connection.php');
           
            $sql = "select * from ip WHERE ips='$ip' AND id=(select max(id) from ip);";
            $result = mysqli_query($connection, $sql);
            $ip2=$ip;
            if (mysqli_num_rows($result) > 0) 
                {
                while($row = mysqli_fetch_assoc($result)) 
                {
                    $mess= "Not updated, Reason = same ip";
                    return($mess);
                    
                }
            }
                else 
                {
                insertto($ip);  
                
                }
            mysqli_close($connection);
            
       }
       function insertto($ip)
       {
            include(__DIR__.'/connection.php');
            $sql = "INSERT INTO ip (ips) VALUES ('$ip')";
            if (mysqli_query($connection, $sql)) 
                {
                    echo "New Ip succesfully Updated";
                    
                    $curl = curl_init();
                    curl_setopt_array($curl, array(
                        CURLOPT_RETURNTRANSFER => 1,
                        CURLOPT_URL => 'https://api.dynu.com/nic/update?hostname=[Your Host Name eg google.com]&myip=$ip&password=[your DYNU password in MD5 format]',
                        CURLOPT_USERAGENT => 'ip'
                    ));
                     $resp = curl_exec($curl);
                     curl_close($curl);
                } 
             else 
                {
                    echo "<br>Error: " . $sql  . mysqli_error($connection);
                }
             
              mysqli_close($connection);  
        }
       
   }
?>
