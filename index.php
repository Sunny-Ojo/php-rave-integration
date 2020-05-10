<?php
session_start();
?>
<HTML>

<HEAD>
    <TITLE>DTCE EVENT REGISTRATION</TITLE>
    <link href="./assets/css/phppot-style.css" type="text/css" rel="stylesheet" />
    <link href="./assets/css/one-page-checkout.css" type="text/css" rel="stylesheet" />
    <script src="./vendor/jquery/jquery.min.js" type="text/javascript"></script>
    <script src="./vendor/jquery/jquery-ui.js"></script>
</HEAD>

<BODY>
    <div class="phppot-container"
        style="background-image: url('/img/img2.jpg');background-repeat:no-repeat;background:position:center">
        <div class="page-heading">DTCE EVENT REGISTRATION </div>

        <form name="one-page-checkout-form" id="one-page-checkout-form" action="register.php" method="post"
            onsubmit="return checkout()">

            <?php if (!empty($_SESSION["error"])) { ?>

            <div class="order-message order-success">
                <?php echo $_SESSION["error"]; ?>.
                <span class="btn-message-close" onclick="this.parentElement.style.display='none';"
                    title="Close">&times;</span>

            </div>
            <?php } ?>


            <div class="section product-gallery">
                <?php require_once './view/product-gallery.php'; ?>
            </div>
            <div class="billing-details">
                <?php require_once './view/billing-details.php'; ?>
            </div>

            <div class="cart-error-message" id="cart-error-message">Cart must not
                be emty to checkout</div>
            <div id="shopping-cart" tabindex="1">
                <div id="tbl-cart">
                    <div id="txt-heading">
                        <div id="cart-heading">Your Shopping Cart</div>
                        <div id="close"></div>
                    </div>
                    <div id="cart-item">
                        <?php require_once './view/shopping-cart.php'; ?>
                    </div>
                </div>
            </div>

            <div class="payment-details">
                <div class="payment-details-heading">Please kindly note your transaction reference id after payment.
                </div>
                <div class="row">
                    <div class="inline-block">
                    </div>
                </div>
            </div>

            <div class="row">
                <div id="inline-block">
                    <input type="submit" class="checkout" name="checkout-btn" id="checkout-btn" value="Pay Now">
                </div>
            </div>
        </form>
    </div>
    <script src="./assets/js/cart.js"></script>

</BODY>

</HTML>