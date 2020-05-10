<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Failed</title>
    <link rel="stylesheet" href="assets/css/app.css">
    <link href="assets/vendor1/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

</head>

<body>
    <?php include 'nav.php'; ?>

    <div class="jumbotron  text-center mt-4">
        <i class=" fa fa-exclamation-triangle   display-3 text-danger"></i>
        <h1>Sorry,</h1>
        <h4> Your payment was not successful.</h4>
        <hr>
        <br>
        <h4 class="text-danger">Nothing was Billed from your account</h4>
        <p><b>Your transaction was not succesful</b></p>
        <a href="index.php" class="btn btn-warning">Try Again</a>
    </div>
    <?php include 'footer.php'; ?>

</body>
<script src="assets/js/app.js"></script>

</html>