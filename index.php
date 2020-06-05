<?php include_once 'includes/header.php' ?>
<?php
    $db = new Database();

    $query = "Select * from `posts` ORDER BY `date` DESC ";
    $posts = $db->select($query);

    $query = "select * from `categories` ORDER BY `categories`.`id` ASC ";
    $categories = $db->select($query);
?>
<?php if ($posts) : ?>
    <?php while($row  = $posts->fetch_assoc()) : ?>
    <div class="blog-post">
        <h2 class="blog-post-title"><?php echo $row['title'];?></h2>
        <p class="blog-post-meta"><?php echo formatDate($row['date']);?> by <a href="#"><?php echo $row['author'];?></a></p>
        <p> <?php echo shortenText($row['body'],500);?> </p>
        <a class="readMore" href="post.php?id=<?php echo urlencode($row['id']);?>">Read More</a>
    </div><!-- /.blog-post -->
<?php endwhile;?>
<?php else : ?>
    <p>There is no posts yet!</p>
<?php endif; ?>
<?php include_once 'includes/footer.php' ?>

