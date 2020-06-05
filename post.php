<?php include 'includes/header.php'; ?>
<?php
    $db = new Database();

    $id = $_GET['id'];

    $query = "select * from `posts` where id=" . $id;
    $post = $db->select($query)->fetch_assoc();

    $query = "select * from `categories`";
    $categories = $db->select($query);
?>
<h2 class="blog-post-title"><?php echo $post['title'];?></h2>
<p class="blog-post-meta"><?php echo formatDate($post['date']);?> by <a href="#"><?php echo $post['author'];?></a></p>
<p> <?php echo $post['body']?> </p>
<?php include 'includes/footer.php'; ?>


