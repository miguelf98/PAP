<pre>
<?php
$contents = file_get_contents(  "orderProdutos.txt",FILE_USE_INCLUDE_PATH);
$array_list = (explode("\r\n",$contents));


    foreach($array_list as $id => $value){
        if($array_list[$id] == $_GET['id']){
            unset($array_list[$id]);
            break;
        }
    }

    print_r($array_list);


    $f2=fopen("orderProdutos.txt","w");
    foreach ($array_list as $id => $value) {
        if($array_list[$id] != ""){
            fwrite($f2,$array_list[$id]);
            fwrite($f2,"\r\n");
        }

    }
    fclose($f2);


?></pre>