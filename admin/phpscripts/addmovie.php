<?php

  function addMovie($cover, $title, $year, $run, $story, $trailer, $release, $genre) {

    include('connect.php');
      //if something happens when you are uploading b.c you have the img it can fuck everything up. so you upload img first THEN the text
      if($cover['type'] == "image/jpg" || $cover['type'] == "image/jpeg"){ //before files is moved, make sure its an acceptable filetype. NOT images/ its looking for type not a folder. only allows jpeg. if you want png, have to do another with png

      $targetpath = "../images/{$cover['name']}"; //path to where the img goes. outside of php scripts

      if(move_uploaded_file($cover['tmp_name'], $targetpath)){ //moves file out of temp directory into img folder. needs where to look and where to go
        //echo "file transfer complete";
        $th_copy = "../images/TH_{$cover['name']}";//thumbnail of the copy. keeps the same name and adds th in front. the th could be at the big or end but having at the end will make it img.jpg_th. Not good
        if(!copy($targetpath, $th_copy)){//grabs original and duplicate looks for error, will be for resizing later. has to be inside here so you know its in the folder
            $message = "Oops, that didn't work";
            return $message;
      }
      //add to db. after the copy has happened
      $addString = "INSERT INTO tbl_movies VALUES (NULL, '{$cover['name']}', '{$title}', '{$year}', '{$run}', '{$story}', '{$trailer}', '{$release}')";
      //echo $addString;

      $addQuery = mysqli_query($link, $addString);

      if($addQuery){
        $qstring = "SELECT * FROM tbl_movies ORDER BY movies_id DESC LIMIT 1";
        $lastmovie= mysqli_query($link,$qstring);
        $row = mysqli_fetch_array($lastmovie);
        $lastID= $row['movies_id'];

      //  echo $lastID;
      $linkString = "INSERT INTO tbl_mov_genre VALUES (NULL, {$lastID}, {$genre})";
      $linkQuery = mysqli_query($link, $linkString);
      redirect_to("admin_index.php");


      }
    }



    }  mysqli_close($link);

    //resizing img look at gdimage, lots of prebuild methods. do the $th_copy again and feed it the where to go
    //$size =  getimagesize($targetpath);   //resizing. check for landscape or portrait, looking for if width>height etc. Looks at orig
  // echo $size[1];//need whats in [] because it shows up array 3-gives both width and height as a string 0 or 1 gives one or the other. 2 is type
}
?>
