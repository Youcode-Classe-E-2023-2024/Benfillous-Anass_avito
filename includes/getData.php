<?php
function getData()
{
    include_once "config.php";

    $query = "SELECT * FROM announces";
    $result = $conn->query($query);
    $output = array();

    if (!$result) {
        die("Error: " . mysqli_error($connect));
    }

    if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $output[] = $row;
        }
    }

    return $output;
}
?>