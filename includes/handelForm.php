<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avito</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 600px;
        }

        img {
            border: 3px solid red;
            max-width: 300Px;
            margin-top: 20px;

        }
    </style>
</head>

<body>
    <form action="./handelForm.php" method="post" enctype="multipart/form-data">
        <label for="title">Title</label>
        <input type="text" name="title" id="title">

        <label for="title">Image</label>
        <input type="file" accept="image/jpeg" name="image" id="image" required>

        <label for="title">Price</label>
        <input type="number" name="price" id="price">
        <label for="title">Description</label>
        <input type="text" name="description" id="description">
        <label for="title">Phone</label>
        <input type="number" name="phone" id="phone">
        <button>Add your Anounce</button>
    </form>


    <script src="./main.js"></script>
</body>

</html>

<?php
include("./config.php");

if (isset($_POST["description"])) {
    $title = $_POST["title"];
    $price = $_POST["price"];
    $description = $_POST["description"];
    $phone = $_POST["phone"];

    if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
        $img = file_get_contents($_FILES['image']['tmp_name']);
    } else {
        echo "Error uploading file.";
    }

    // Use prepared statements to prevent SQL injection
    $sql = "INSERT INTO announces (title, img, price, descri, phone) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssiss", $title, $img, $price, $description, $phone);

    if ($stmt->execute()) {
        echo "<script> console.log('Record inserted successfully'); </script>";
    } else {
        echo "<script>console.log('Error inserting record: ' . $stmt->error)</script>";
    }

    $stmt->close();
    $conn->close();
    header("location:../index.php");
}
?>

