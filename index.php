<?php
include_once('model/database.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Extract form data
    $title = $_POST['title'];
    $description = $_POST['description'];

    // Validate and sanitize input as needed
    // ...

    // Insert into the database
    try {
        $stmt = $GLOBALS['conn']->prepare("INSERT INTO todoitems (Title, Description) VALUES (:title, :description)");
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->execute();

        // Redirect back to index.php after adding a new item
        header("Location: index.php");
        exit();
    } catch (PDOException $e) {
        echo "Error inserting data: " . $e->getMessage();
        exit();
    }
}

// Retrieve ToDo List items from the database
try {
    $stmt = $GLOBALS['conn']->prepare("SELECT * FROM todoitems");
    $stmt->execute();
    $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit();
}
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
            echo "<br><br> <!-- Add two line breaks for more space -->";
            echo "<span>{$item['Description']}</span><br><br>";
            echo "<a href='remove.php?id={$item['ItemNum']}'>Remove</a>";
            echo "</div>";
        }
    } else {
        echo "<p>No to-do list items exist yet.</p>";
    }
    ?>

    <form action="index.php" method="post">
        <br><br> <!-- Add two line breaks for more space -->
        <label for="title">Title:</label>
        <br> <!-- Add a line break for space -->
        <input type="text" id="title" name="title" required maxlength="20">
        
        <br><br> <!-- Add two line breaks for more space -->

        <label for="description">Description:</label>
        <br> <!-- Add a line break for space -->
        <input type="text" id="description" name="description" required maxlength="50">

        <br><br> <!-- Add two line breaks for more space -->

        <button type="submit">Add</button>
    </form>
</body>
</html>
