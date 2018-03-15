<?php

  function  single_edit($tbl,$col,$id){

      $result = getSingle($tbl,$col,$id);
      $getResult = mysqli_fetch_array($result);
      //echo mysqli_num_fields($result);

      for( $i=0; $i<mysqli_num_fields($result); $i++ ){
          $datatype = mysqli_fetch_field_direct($result, $i);
          
          // -> means you reach into the datatype and grab the name etc.
          $fieldname = $datatype -> name;
          echo $fieldname."<br>";
          $fieldtype = $datatype -> type;
          echo $fieldtype."<br>";

      }




  }














 ?>
