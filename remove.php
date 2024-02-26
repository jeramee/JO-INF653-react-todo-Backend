<?php
include('database.php');

// Check if 'id' parameter is set in the URL
if (isset($_GET['id'])) {
    $itemId = $_GET['id'];

    // Remove the item from the database
    $stmt = $conn->prepare("DELETE FROM todoitems WHERE ItemNum = :id");
    $stmt->bindParam(':id', $itemId);
    $stmt->execute();

    // Redirect back to index.php after removing the item
    header("Location: index.php");
    exit();
} else {
    // Redirect to index.php if 'id' parameter is not set
    header("Location: index.php");
    exit();
}
?>
