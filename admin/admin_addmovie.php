<?php
//init_set('display_errors', 1);//mac
//error_reporting(E_All); //mac

require_once('phpscripts/config.php');

$tbl = "tbl_genre";
//spits back an object then fetch it as an array
$genQuery = getAll($tbl);

if (isset($_POST['submit'])) {
  $title = $_POST['title'];
  $image = $_FILES['image'];
  $year= $_POST['year'];
  $runtime = $_POST['runtime'];
  $storyline = $_POST['storyline'];
  $trailer = $_POST['trailer'];
  $release = $_POST['release'];
  $genre = $_POST['genList'];
  $uploadMovie = addMovie($title, $image,$year,$runtime,$storyline,$trailer,$release,$genre);
  $message= $uploadMovie;

// echo $image['name'];
// echo $image['type'];
// echo $image['size']; //in bites
// echo $image['tmp_name'];
}

 ?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>CMS Portal Login</title>
  </head>
  <body>
    <h1>Welcome Company Name</h1>
    <?php
      if(!empty($message)){
        echo $message;
      }

     ?>
    <!-- enctype allows the form to accept files -->
      <form action="admin_addmovie.php" method="post" enctype="multipart/form-data">
        <label>Movie Title: </label>
        <input type="text" name="title" value=""><br><br>

        <label>Movie Cover Image:</label>
        <input type="file" name="image" value=""><br><br>

        <label> Movie Year:</label>
        <input type="text" name="year" value=""><br><br>

        <label>Movie Runtime:</label>
        <input type="text" name="runtime" value=""><br><br>

        <label>Movie Storyline:</label>
        <input type="text" name="storyline" value=""><br><br>

        <label>Movie Trailer:</label>
        <input type="text" name="trailer" value=""><br><br>

        <label>Movie Release:</label>
        <input type="text" name="release" value=""><br><br>

<select name="genList">
  <option value=""> Please select a genre</option>
  <?php while ($row = mysqli_fetch_array($genQuery)) {
    echo "<option value=\"{$row['genre_id']}\"> {$row['genre_name']}</option>";
  }

  ?>
</select><br><br>

        <input type="submit" name="submit" value="Add movie">




      </form>
  </body>
</html>
