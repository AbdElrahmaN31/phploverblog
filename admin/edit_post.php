<?php include "includes/header.php" ?>
<?php
    $db = new Database();

    $id = $_GET['id'];

    $query = "select `posts`.* from `posts` where `posts`.id=" . $id;
    $post = $db->select($query)->fetch_assoc();

    $query = "select * from `categories`";
    $categories = $db->select($query);
?>
<?php
    if (isset($_POST['submit'])) {
        $title =    mysqli_real_escape_string($db->link,$_POST['title']);
        $body =     mysqli_real_escape_string($db->link,$_POST['body']);
        $category = mysqli_real_escape_string($db->link,$_POST['category']);
        $author =   mysqli_real_escape_string($db->link,$_POST['author']);
        $tags =     mysqli_real_escape_string($db->link,$_POST['tags']);

        $query = "UPDATE `posts` SET `title` = '$title',
                                     `body`= '$body',
                                     `category` = '$category',
                                     `author` = '$author',
                                     `tags` = '$tags'
                                     WHERE `posts`.`id` = $id";
        $result = $db->update($query);
    }
    if (isset($_POST['delete'])) {

        $query = "DELETE FROM `posts` WHERE `posts`.`id` = '$id'";
        $result = $db->delete($query);
    }
?>
<form role="form" method="post" action="edit_post.php?id=<?php echo $id;?>">
    <div class="form-group">
        <label>Post Title</label>
        <input required name="title" type="text" class="form-control" placeholder="Enter Title"
               value="<?php echo $post['title'] ?>">
    </div>
    <div class="form-group">
        <label>Post Body</label>
        <textarea required name="Body" class="form-control" placeholder="Enter Body">
                 <?php echo $post['body'] ?>
        </textarea>
    </div>
    <div class="form-group">
        <label>Category</label>
        <select name="category" class="form-control">
            <?php while ($row = $categories->fetch_assoc()) : ?>
                <?php if ($row['id'] == $post['category']) {
                    $selected = "selected";
                } else {
                    $selected = "";
                }
                ?>
                <option <?php echo $selected; ?> value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
            <?php endwhile; ?>
        </select>
    </div>
    <div class="form-group">
        <label>Post Author</label>
        <input required name="author" type="text" class="form-control" placeholder="Enter Author Name"
               value="<?php echo $post['author']; ?>">
    </div>
    <div class="form-group">
        <label>Post Tags</label>
        <input required name="tags" type="text" class="form-control" placeholder="Enter Tags" value="<?php echo $post['tags']; ?>">
    </div>
    <div>
        <button name="submit" type="submit" class="btn btn-primary">Submit</button>
        <a href="index.php" class="btn btn-primary">Cancel</a>
        <input name="delete" type="submit" class="btn btn-danger" value="Delete"/>
    </div>
    <br/>
</form>
<?php include "includes/footer.php" ?>
