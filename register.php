<?php
session_start();

if (isset($_POST["checkout-btn"])) {
    if ($_SESSION["cart_counter"] > 0) {

        $province = $_POST["province"];
        $region = $_POST["region"];
        //storing the province and region inside a session
        $_SESSION["province"] = $province;
        $_SESSION["region"] = $region;
        $email = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);
        $amount_to_charge = $_SESSION["total_amount_payable"];
        $curl = curl_init();
        $amount = $amount_to_charge;
        $currency = 'NGN';
        $name = $_POST["name"];
        $customer_email = $email;
        $phone = $_POST["phone_number"];
        $txref = "rave-rccg" . time(); // ensure you generate unique references per transaction.
        $PBFPubKey = "FLWPUBK-8def1b75286d6a5811541add0d8389b3-X"; // get your public key from the dashboard.

        //   please this redirect url should be replaced with the website address, then you specify the path to where the validation will take place
        // in my case,  i am using http://localhost, so replace it with the website url/ravevalidation.php bacause that is where the validation will take place

        $redirect_url = "http://localhost/ravevalidation.php.";
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.ravepay.co/flwv3-pug/getpaidx/api/v2/hosted/pay",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode([
                // 'amount' => $amount,
                 'customer_email' => $customer_email,
                'currency' => $currency,
                'txref' => $txref,
                'PBFPubKey' => $PBFPubKey,
                'redirect_url' => $redirect_url,
                'custom_description' => '68TH ANNUAL CONVENTION Event Payment',
                'customer_firstname' => $name,
                'customer_phone' => $phone,

            ]),
            CURLOPT_HTTPHEADER => [
                "content-type: application/json",
                "cache-control: no-cache",
            ],
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);

        if ($err) {
            // there was an error contacting the rave API
            die('Curl returned error: ' . $err);
        }

        $transaction = json_decode($response);

        if (!$transaction->data && !$transaction->data->link) {
            // there was an error from the API
            print_r('API returned error: ' . $transaction->message);
        }

        // uncomment out this line if you want to redirect the user to the payment page
        //print_r($transaction->data->message);

        // redirect to page so User can pay
        // uncomment this line to allow the user redirect to the payment page
        header('Location: ' . $transaction->data->link);
    } else {
        $_SESSION["error"] = 'Your cart is empty';
        header('Location: index.php');

    }
} else {
    $_SESSION["error"] = 'Access Denied';
    header('Location: index.php');
}