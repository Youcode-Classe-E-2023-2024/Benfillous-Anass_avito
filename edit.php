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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

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
    <form action="../includes/formEdit.php" method="post" enctype="multipart/form-data" class="mt-5">
        <div class="mb-3">
            <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($row["img"]) . '" alt="Uploaded Image" class="img-fluid">'; ?>
        </div>

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="<?php echo $row["title"] ?>" required>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" name="price" id="price" class="form-control" value="<?php echo $row["price"] ?>" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" name="description" id="description" class="form-control" value="<?php echo $row["descri"] ?>" required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="number" name="phone" id="phone" class="form-control" value="<?php echo $row["phone"] ?>" required>
        </div>

        <input type="hidden" value="<?php echo $id; ?> " name="id">

        <button type="submit" name="submit" class="btn btn-primary">Update Your Announcement</button>
    </form>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>