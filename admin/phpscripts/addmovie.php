<?php


function addMovie($title, $image,$year,$runtime,$storyline,$trailer,$release,$genre){
//  echo "from addmovie.php";
  include('connect.php');
//block uploads so only pngs and jpegs can be uploaded to site
if ($_FILES['image']['type'] == "image/jpeg" || $_FILES['image']['type'] == "image/jpg") {
//echo "jpg or jpeg";
//add mysql real escpe string to $image section
$target = "../images/{$image['name']}";
if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  //echo "file moved";
  //file should now be in the folder you want
  $orig = $target;
  $th_copy = "../images/TH_{$image['name']}";

  if (!copy($orig, $th_copy)) {
    echo "failed copy";
  }

  $size = getimagesize($orig);
  //echo $size[0];//gives width
  //echo $size[1];//gives height

    $movieString = "INSERT INTO tbl_movies VALUES (NULL, '{$image}', '{$title}',  '{$year}', '{$runtime}', '{$storyline}','{$trailer}', '{$release}')";
    echo $movieString;

    $movieQuery = mysqli_query($link, $movieString);
    if($movieQuery){
      redirect_to("admin_index.php?");
    }

    mysqli_close($link);


    }

  }


}
 ?>
