<?php include "includes/header.php" ?>
<?php
    $db = new Database();

    $id = $_GET['id'];

    $query = "select * from `categories`where id=". $id;;
    $category = $db->select($query)->fetch_assoc();
?>
<?php
    if (isset($_POST['submit'])) {
        $name =    mysqli_real_escape_string($db->link,$_POST['name']);

        $query = "UPDATE `categories` SET `name` = '$name'
                                     WHERE `categories`.`id` = '$id'";
        $result = $db->update($query);
    }
    if (isset($_POST['delete'])) {

        $query = "DELETE FROM `categories` WHERE `categories`.`id` = '$id'";
        $result = $db->delete($query);
    }
?>
<form role="form" method="post" action="edit_category.php?id=<?php echo $id?>">
    <div class="form-group">
        <label>Category Name</label>
        <input name="name" type="text" class="form-control" placeholder="Enter Category Name" value="<?php echo $category['name'];?>"/>
    </div>
    <div>
        <input name="submit" type="submit" class="btn btn-primary" value="Submit"/>
        <a href="index.php" class="btn btn-primary">Cancel</a>
        <input name="delete" type="submit" class="btn btn-danger" value="Delete"/>

    </div>
    <br/>
</form>
<?php include "includes/footer.php" ?>
