<?php

    $file = json_decode(file_get_contents('./najia.json'));
    // $index = array_search('Nigeria', array_column($file, 'name'));
        //  $countries[$index];
 print_r($file);
//  file_put_contents('./najia.json', json_encode($file[$index]));