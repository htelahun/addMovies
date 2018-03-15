<?php

require_once('phpscripts/config.php');

$tbl = "tbl_genre";
$genQuery = getAll($tbl); //returns an object
//  echo $genQuery;



if(isset($_POST['submit'])){
$cover = $_FILES['cover']; //may have issues, it doesnt go in _POST
$title = $_POST['title'];
$year = $_POST['year'];
$run = $_POST['run'];
$story = $_POST['story'];
$trailer = $_POST['trailer'];
$release = $_POST['release'];
$genre = $_POST['genList'];
$result = addMovie($cover, $title, $year, $run, $story, $trailer, $release, $genre);
$message = $result;
}
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Add Movie</title>
  </head>
  <body>
    <h1>Welcome Company Name</h1>
    <?php if(!empty($message)){echo $message;} ?>
      <form action="admin_addmovie.php" method="post" enctype="multipart/form-data"><!--default to text only in form. wont work for img or video. multipart expects something other than text there. Allows for upload of files. takes care of going to the server for us-->
        <label>Cover image:</label>
        <input type="file" name="cover"><!--its an image. gives you the option to browse locally-->
          <br>
        <label>Movie Title: </label>
        <input type="text" name="title"  value="">
            <br>
          <label>Movie Year: </label>
          <input type="text" name="year" value="">
              <br>
          <label>Movie Runtime: </label>
          <input type="text" name="run" value="">
                <br>
          <label>Movie Storyline </label>
          <input type="text" name="story"  value="">
                  <br>
          <label>Movie Trailer </label><!--left as text only cuz we dont have video-->
          <input type="text" name="trailer" value="">
                    <br>
         <label>Movie Release Date </label>
        <input type="text" name="release"  value="">
                      <br>
        <select  name="genList">
            <option>Select a movie genre</option>
            <?php
              while($row = mysqli_fetch_array($genQuery)){
                echo "<option value=\"{$row['genre_id']}\">{$row['genre_name']}</option>";
              }

            ?>
        </select><br><br>
        <input type="submit" name="submit" value="Add Movie">
      </form>

  </body>
</html>
