
<?php
$arr = [  
    ['ИВАНОВ ИВАН ИВАНОВИЧ', '12:00-16:00', '12:00-16:00', '12:00-16:00', '12:00-16:00', '12:00-16:00', '12:00-16:00', ''],
    ['ИВАНОВ ИВАН ИВАНОВИЧ', '08:00-12:00', '08:00-10:00', '08:00-16:00', '', '', '', ''],
    ['ПЕТРОВ ПЕТР ПЕТРОВИЧ', '12:00-16:00', '', '12:00-16:00', '', '12:00-16:00', '', '']
    ];
    
    
   function timeResolving($t1,$t2){
     if(!isset($t1)||!isset($t2)||empty($t1)||empty($t2))
     return $t1 ?? $t2;
    if($t1>$t2){
      $tmp = $t1;
      $t1 = $t2;
      $t2 = $tmp;
    }
    $endOfT1 = substr($t1,-5);
    $startOfT2 = substr($t2,0, 5);
    $res = ($endOfT1 < $startOfT2)?
       "$t1,$t2":
      substr($t1,0,5)."-".substr($t2,-5);
    return $res;
   }

    function group_by($arr, $key) {
        $result = array();
             foreach($arr as $val) {
            $name = array_shift($val);
             if(array_key_exists($name,$result)) {
              
            $old=$result[$name]; 
            for ($i=0;$i<7;$i++){
                $fixed = timeResolving($old[$i],$val[$i]);
                
                $result[$name][$i]=$fixed;
             }
                }
             else { $result [$name] = $val;}
           
           
        }
        return $result;
        
    }
    
  
    echo "<br/>";
    
    var_dump(group_by($arr, 0)); 
    
    echo "<br/>";

    
   
   

?>