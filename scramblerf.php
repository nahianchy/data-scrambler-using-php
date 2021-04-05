<?php
function displayKey($key){
    printf(" value= '%s' ",$key);
}
function scrambleData($orginalData,$key){
    $originalKey = 'abcdefghijklmnpqrstuvwxyz1234567890';
    $data='';
    $lenght=strlen($orginalData);
    for($i=0;$i<$lenght;$i++){
        $currentChar=$orginalData[$i];
        $position=strpos($originalKey,$currentChar);

        if($position!==false){
            $data.=$key[$position];
        }else{

            $data.=$currentChar; 
        }
    }
    return $data; 
}
function decodeData($orginalData,$key){
    $originalKey = 'abcdefghijklmnpqrstuvwxyz1234567890';
    $data='';
    $lenght=strlen($orginalData);
    for($i=0;$i<$lenght;$i++){
        $currentChar=$orginalData[$i];
        $position=strpos($key,$currentChar);

        if($position!==false){
            $data.=$originalKey[$position];
        }else{

            $data.=$currentChar; 
        }
    }
    return $data;
   
}






    

