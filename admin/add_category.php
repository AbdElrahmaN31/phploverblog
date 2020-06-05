<?php include "includes/header.php" ?>
<?php
    if (isset($_POST['submit'])){
        $db = new Database();

        $name = $_POST['name'];
        $query = "INSERT INTO `categories` (`name`) VALUES ('$name')";
        $result = $db->insert($query);
    }
?>
<form role="form" method="post" action="add_category.php">
    <div class="form-group">
        <label>Category Name</label>
        <input name="name" type="text" class="form-control" placeholder="Enter Category Name">
    </div>
    <div>
        <input name="submit" type="submit" class="btn btn-primary" value="Submit"/>
        <a href="index.php" class="btn btn-primary">Cancel</a>
    </div>
    <br/>
</form>

<?php include "includes/footer.php" ?>
