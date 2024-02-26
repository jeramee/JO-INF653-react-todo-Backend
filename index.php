<?php
include('database.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Handle form submission and insert new ToDo item into the database
    // ...

    // Redirect back to index.php after adding a new item
    header("Location: index.php");
    exit();
}

// Retrieve ToDo List items from the database
$stmt = $conn->prepare("SELECT * FROM todoitems");
$stmt->execute();
$items = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo List</title>
</head>
<body>
    <h1>ToDo List</h1>

    <?php
    if (count($items) > 0) {
        foreach ($items as $item) {
            echo "<div>";
            echo "<span>{$item['Title']}</span>";
            echo "<span>{$item['Description']}</span>";
            echo "<a href='remove.php?id={$item['ItemNum']}'>Remove</a>";
            echo "</div>";
        }
    } else {
        echo "<p>No to-do list items exist yet.</p>";
    }
    ?>

    <form action="index.php" method="post">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required maxlength="20">
        
        <label for="description">Description:</label>
        <input type="text" id="description" name="description" required maxlength="50">

        <button type="submit">Add</button>
    </form>
</body>
</html>
