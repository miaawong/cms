<!--below is to see if we are getting data from the form   -->
<?php

function insert_categories(){
  //connections needs to be global
  global $connection;
  //getting the post superglobal
  if(isset($_POST['submit'])){
  // assigning cat_title to a variable
  $cat_title = $_POST['cat_title'];
  //cat_title(or the submission box) should not be empty
  if($cat_title == "" || empty($cat_title)){
    echo "this field should not be empty";
  } else {
    //else if the form is not empty then we want ot insert into the database of cat_title
    $query = "INSERT INTO category(cat_title)";
    $query .= "VALUE('{$cat_title}') ";
    //sending query here (takes two parameters (connection and query))
    $create_category_query = mysqli_query($connection, $query);
    //checking incase the query failed
    if(!$create_category_query){
    die('QUERY FAILED' . mysqli_error());
    }
  }
}
}

 //find all categories query
function find_all_categories(){
  global $connection;
  $query = "SELECT * FROM category";
  $select_categories = mysqli_query($connection, $query);

  while($row = mysqli_fetch_assoc($select_categories)){
  $cat_id= $row['cat_id'];
  $cat_title = $row['cat_title'];

  echo "<tr>";
  echo "<td>{$cat_id}</td>";
  echo "<td>{$cat_title}</td>";
  //delete category based on id
  echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
  //edit category
  echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
  echo "<tr>";
}
}

//delete query (categories)
function delete_categories(){
  global $connection;
  if(isset($_GET['delete'])){
    $del_cat_id = $_GET['delete'];
    $query = "DELETE FROM category WHERE cat_id = {$del_cat_id} ";
    $delete_query = mysqli_query($connection, $query);
    // below is just gonna refresh the page for you, otherwise you would have to click twice
    header("Location: categories.php");
}
}
function confirm($result){
  global $connection;
  if(!$result){
  die("query failed" . mysqli_error($connection));
}
}
?>
