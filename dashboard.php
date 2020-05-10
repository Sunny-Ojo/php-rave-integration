<?php
session_start();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Successful</title>
    <link rel="stylesheet" href="assets/css/app.css">
    <link href="assets/vendor1/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

</head>

<body>
    <?php include 'nav.php'; ?>
    <div class="jumbotron text-center mt-4">
        <i class="fa fa-check-circle display-3 text-success"></i>
        <h1>Thank you!!!</h1>
        <h4> Your payment was successful.</h4>
        <hr>
        <br>
        <h4 class="text-danger">Billing Details</h4>
        <p>Total Amount paid: &#8358;<b><?php echo $_SESSION["total_amount_payable"]; ?></b></p>
        <p>Transaction reference Id: <b><?php echo $_SESSION["ref_id"]; ?></b></p>
        <p class="text-info">Please store your transaction reference <b>id</b> in a safe place, it will be required for
            registration.</p>
        <a href="registration.php" class="btn btn-warning">Fill forms now</a>
    </div>
    <?php include 'footer.php' ?>

</body>
<script src="assets/js/app.js"></script>

</html>