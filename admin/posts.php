<?php include "includes/admin_header.php";?>

    <div id="wrapper">

      <?php include "includes/admin_nav.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                      <h1 class="page-header">
                          Welcome to Admin
                          <small>Author</small>
                      </h1>
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                          <th>Post Id</th>
                          <th>Author</th>
                          <th>Title</th>
                          <th>Category</th>
                          <th>Status</th>
                          <th>Image</th>
                          <th>Tags</th>
                          <th>Comments</th>
                          <th>Date</th>
                          </tr>
                        </thead>
                        <tbody>
<?php
  $query = "SELECT * FROM posts";
  $select_posts = mysqli_query($connection, $query);

  while($row = mysqli_fetch_assoc($select_posts)){
    $post_id = $row['post_id'];
    $post_author = $row['post_author'];
    $post_title = $row['post_title'];
    $post_category_id = $row['post_category_id'];
    $post_status = $row['post_status'];
    $post_image = $row['post_image'];
    $post_tags = $row['post_tags'];
    $post_comment_count = $row['post_comment_count'];
    $post_date = $row['post_date'];

    //echo a row every time
    echo "<tr>";
    echo "<td>{$post_id}</td>";
    echo "<td>{$post_author}</td>";
    echo "<td>{$post_title}</td>";
    echo "<td>{$post_category_id}</td>";
    echo "<td>{$post_status}</td>";
    echo "<td><img width='100' src='images/$post_image' alt='image'></td>";
    echo "<td>{$post_tags}</td>";
    echo "<td>{$post_comment_count}</td>";
    echo "<td>{$post_date}</td>";
    echo "</tr>";

}

?>
                            <tr>
                            <td>10</td>
                            <td>Mia Wong</td>
                            <td>Bootstrap framework</td>
                            <td>Boostrap</td>
                            <td>Status</td>
                            <td>Image</td>
                            <td>Tags</td>
                            <td>Comments</td>
                            <td>Date</td>
                          </tr>
                        </tbody>
                      </table>

                    </div>
                </div>
            </div>
        </div>
      </div>
  <?php include "includes/admin_footer.php"; ?>
