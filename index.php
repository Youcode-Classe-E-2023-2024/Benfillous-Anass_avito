<!DOCTYPE html>
<html lang="en">

<?php
include_once("./includes/getData.php");
$data = getData();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>avito</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>
        body {
            display: flex;
            flex-direction: column;
            justify-items: center;
            height: auto;
        }

        main {
            height: auto;
            width: 100%;
            margin-top: 100Px;
        }

        .product-image {
            max-width: 300Px;
            margin-top: 20px;

        }

        .empty {
            height: 500Px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 24px;
        }

        /* Define a custom class for the red button */
        .btn-red {
            background-color: red;
            border-color: red;
            color: white;
            /* text color */
        }

        /* Override Bootstrap styles for the red button when it is clicked or hovered */
        .btn-red:hover,
        .btn-red:active,
        .btn-red:focus {
            background-color: darkred;
            border-color: darkred;
            color: white;
            /* text color */
        }
        .add {
            border: none;
        }
        .js-alert {
            display: block;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-dark bg-primary d-flex justify-content-around">
        <a  href="./index.php" class="navbar-brand"><img src="https://www.avito.ma/phoenix-assets/imgs/layout/new-logo.svg" alt=""></a>
        <a href="./includes/handelForm.php"><button class="add btn btn-light">Add Product</button></a>
    </nav>

    <main>
        <?php
        if (isset($_GET["updated"])) {
        ?>
            <div class="alert alert-primary js-alert" role="alert">
                The Announce is Updated Succesfully
            </div>
        <?php } ?>
        <?php
        if (isset($_GET["deleted"])) {
        ?>
            <div class="alert alert-warning js-alert" role="alert">
                The Announce is Deleted Succesfully
            </div>
        <?php } ?>

        <?php
        if (isset($_GET["deletedALL"])) {
        ?>
            <div class="alert alert-warning js-alert" role="alert">
                ALL The Announces are Deleted Succesfully
            </div>
        <?php } ?>

        <?php
        if (isset($_GET["added"])) {
        ?>
            <div class="alert alert-success js-alert" role="alert">
                The Announce is Added Succesfully
            </div>
        <?php } ?>

        <?php
        if (isset($_GET["error"]) == true) {

        ?>
            <div class="alert alert-danger js-alert" role="alert">
                The data You've Entered is Incorrect
            </div>

        <?php
        }
        ?>

        <table class="table table-hover table-dark">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Image</th>
                    <th scope="col">Price</th>
                    <th scope="col">Description</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                    <th scope="col">
                        <?php
                        if (count($data) != 0) {
                        ?>
                            <button type="button" class="btn btn-primary btn-red" data-toggle="modal" data-target="#exampleModal">
                                Delete ALL
                            </button>
                        <?php } ?>
                    </th>
                </tr>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Remove Item</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Are You Sure You Want To Remove ALL
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <form action="./includes/deleteAll.php" method="post">
                                    <button type="submit" class="btn btn-primary btn-red">Yes</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </thead>
            <tbody>
                <?php
                foreach ($data as $announce) {

                ?>
                    <tr>
                        <th scope="row"><?php echo $announce["id"] ?></th>
                        <td><?php echo $announce["title"] ?></td>
                        <td><?php echo '<img class="product-image" src="data:image/jpeg;base64,' . base64_encode($announce["img"]) . '" alt="Uploaded Image">'; ?></td>
                        <td><?php echo $announce["price"] ?></td>
                        <td><?php echo $announce["descri"] ?></td>
                        <td><?php echo $announce["phone"] ?></td>
                        <td><a href="edit.php/?id=<?php echo $announce["id"] ?>">edit</a></td>
                        <td>
                            <button type="button" class="btn btn-primary btn-red" data-toggle="modal" data-target="#remove">
                                Delete
                            </button>
                        </td>
                        <td></td>
                    </tr>
                    <!-- Modal -->
                    <div class="modal fade" id="remove" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Remove Item</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Are You Sure You Want To Remove <?php echo $announce["title"] ?>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <form action="./includes/delete.php/?id=<?php echo $announce["id"] ?>" method="post">
                                        <button type="submit" class="btn btn-primary btn-red">Yes</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>


            </tbody>
        </table>
        <?php
        if (count($data) == 0) {
        ?>
            <div class="empty"> the List is Empty </div>
        <?php
        }
        ?>
    </main>
    <!-- Footer -->
    <footer class="text-center text-lg-start bg-light text-muted">
        <!-- Section: Social media -->
        <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
            <!-- Left -->
            <div class="me-5 d-none d-lg-block">
                <span>Get connected with us on social networks:</span>
            </div>
            <!-- Left -->

            <!-- Right -->
            <div>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-google"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-linkedin"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-github"></i>
                </a>
            </div>
            <!-- Right -->
        </section>
        <!-- Section: Social media -->

        <!-- Section: Links  -->
        <section class="">
            <div class="container text-center text-md-start mt-5">
                <!-- Grid row -->
                <div class="row mt-3">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <!-- Content -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            <i class="fas fa-gem me-3"></i>Avito
                        </h6>
                        <p>
                            Here you can use rows and columns to organize your footer content. Lorem ipsum
                            dolor sit amet, consectetur adipisicing elit.
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Products
                        </h6>
                        <p>
                            <a href="#!" class="text-reset">Angular</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">React</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Vue</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Laravel</a>
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Useful links
                        </h6>
                        <p>
                            <a href="#!" class="text-reset">Pricing</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Settings</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Orders</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Help</a>
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                        <p><i class="fas fa-home me-3"></i> New York, NY 10012, US</p>
                        <p>
                            <i class="fas fa-envelope me-3"></i>
                            info@example.com
                        </p>
                        <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
                        <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
            </div>
        </section>
        <!-- Section: Links  -->

        <!-- Copyright -->
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
            © 2021 Copyright    
            AVITO
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        setTimeout(()=> {
            document.querySelector(".js-alert").style.display = "none";
        }, 3000)
    </script>
</body>

</html>