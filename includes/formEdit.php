<?php
include("./config.php");
$updated = true;
if (isset($_POST["submit"])) {
    $title = $_POST["title"];
    $price = $_POST["price"];
    $description = $_POST["description"];
    $phone = $_POST["phone"];
    $id = $_POST["id"];
    // Use prepared statements to prevent SQL injection
    $sql = "UPDATE announces SET title = ?, price = ?, descri = ?, phone = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sissi", $title, $price, $description, $phone, $id);

    if ($stmt->execute()) {
        echo "<script> console.log('Record updated successfully'); </script>";
    } else {
        echo "<script>console.log('Error updating record: ' . $stmt->error)</script>";
    }

    $stmt->close();
    $conn->close();
    header("location:../index.php?updated=true");
}
