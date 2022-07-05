<?php

if(isset($_POST["Import"])){
    if($_FILES["file"]["size"] > 0)
    { 
        $filename=$_FILES["file"]["tmp_name"];
        $csv = array();
         $i = 0;

         if (($handle = fopen($filename, "r")) !== false) {
            $columns = fgetcsv($handle, 10000000, ",");
            while (($row = fgetcsv($handle, 10000000, ",")) !== false) {
            $csv[$i] = array_combine($columns, $row);
            $i++;
            }
            fclose($handle);
            }

            foreach($csv as $key=>$csvData){
                print_r($csvData);

            }//foreach close
    }//file close

}//isset close1