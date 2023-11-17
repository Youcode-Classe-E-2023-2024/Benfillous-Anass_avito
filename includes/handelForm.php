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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>
    <?php
    if (isset($_GET["error"]) == true) {

    ?>
        <div class="alert alert-danger" role="alert">
            The data You've Entered is Incorrect
        </div>

    <?php
    }
    ?>
    <form action="./handelForm.php" method="post" enctype="multipart/form-data" class="mt-5">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" accept="image/jpeg" name="image" id="image" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" name="price" id="price" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" name="description" id="description" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="number" name="phone" id="phone" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Add Your Announcement</button>
    </form>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>

<?php
include("./config.php");

if (isset($_POST["description"])) {
    $title = $_POST["title"];
    $price = $_POST["price"];
    $description = $_POST["description"];
    $phone = $_POST["phone"];

    include("./checker.php");
    foreach ($_POST as $key => $value) {
        if (htmlChecker($value)) {
            header("location: ./handelForm.php?error=true");
            exit;
        }
    }

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
    header("location:../index.php?added=true");
}
?>