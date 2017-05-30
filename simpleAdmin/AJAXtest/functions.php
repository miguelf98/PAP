<?php
function getTicketNo($num){
    return chr(65+($num/100)).($num%100<10?'0':'').($num%100);
}

function clearFatura(){
    file_put_contents("produtos.txt", "");
}

function multi_rename_key(&$array, $old_keys, $new_keys)
{
    if(!is_array($array)){
        ($array=="") ? $array=array() : false;
        return $array;
    }
    foreach($array as &$arr){
        if (is_array($old_keys))
        {
            foreach($new_keys as $k => $new_key)
            {
                (isset($old_keys[$k])) ? true : $old_keys[$k]=NULL;
                $arr[$new_key] = (isset($arr[$old_keys[$k]]) ? $arr[$old_keys[$k]] : null);
                unset($arr[$old_keys[$k]]);
            }
        }else{
            $arr[$new_keys] = (isset($arr[$old_keys]) ? $arr[$old_keys] : null);
            unset($arr[$old_keys]);
        }
    }
    return $array;
}