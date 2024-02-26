<?php include("header.php") ?>
<section>
    <h2>Add ToDo Item</h2>
    <form action="index.php" method="POST">
        <input type="hidden" name="action" value="insert">

        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required maxlength="20">

        <label for="description">Description:</label>
        <input type="text" id="description" name="description" required maxlength="50">

        <button type="submit">Add Item</button>
    </form>
</section>
<?php include("footer.php") ?>
