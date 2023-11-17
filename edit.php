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
            max-width: 300Px;
            margin-top: 20px;

        }
    </style>
</head>

<body>

    <?php
    include("./includes/config.php");
    $id = $_GET["id"];

    // Using a prepared statement to prevent SQL injection
    $query = "SELECT * FROM announces WHERE id = $id";

    $result = $conn->query($query);

    // Check for errors in query and connection
    if (!$result) {
        die('Error in query: ' . $conn->error);
    }

    // Check if any rows were returned
    if ($result->num_rows > 0) {
        // Fetch the data as an associative array
        $row = $result->fetch_assoc();
        // Print the result
    } else {
        echo "No records found";
    }


    ?>
    <form action="../includes/formEdit.php" method="post" enctype="multipart/form-data">
        <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($row["img"]) . '" alt="Uploaded Image">'; ?>
        <label for="title">Title</label>
        <input type="text" name="title" id="title" value="<?php echo $row["title"] ?>" required>
        <label for="title">Price</label>
        <input type="number" name="price" id="price" value="<?php echo $row["price"] ?>" required>
        <label for="title">Description</label>
        <input type="text" name="description" id="description" value="<?php echo $row["descri"] ?>" required>
        <label for="title">Phone</label>
        <input type="number" name="phone" id="phone" value="<?php echo $row["phone"] ?>" required>
        <input type="hidden" value="<?php echo $id; ?> " name="id">
        <button name="submit">Add your Anounce</button>
    </form>
</body>

</html>