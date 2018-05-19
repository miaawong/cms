

<form action="" method="post">
  <div class="form-group">
    <label for="cat_title"> Update Category </label>
<?php // getting the update form and button
if(isset($_GET['edit'])){
$cat_id = $_GET['edit'];

$query = "SELECT * FROM category WHERE cat_id = $cat_id ";
$update_categories = mysqli_query($connection, $query);

while($row = mysqli_fetch_assoc($update_categories)){
$cat_id= $row['cat_id'];
$cat_title = $row['cat_title'];
?>
<input value="<?php if(isset($cat_title)){echo $cat_title;} ?>" type="text" class="form-control" name="cat_title">
<?php } } ?>
<?php //update query
if(isset($_POST['update'])){
$update_cat_title = $_POST['cat_title'];
$query = "UPDATE category SET cat_title = '{$update_cat_title}' WHERE cat_id = {$cat_id} ";
$update_query = mysqli_query($connection, $query);
if(!update_query){
die ("query failed" . mysqli_error($connection));
}

}

?>



  </div>
  <div class="form-group">
    <input class="btn btn-primary" type="submit" name="update" value="Update">
  </div>
</form>
