<?php
session_start();

$amount_to_charge = $_SESSION["total_amount_payable"];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = 'dtce';

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if (isset($_GET['cancelled']) == 'true') {
        header('Location: failed.php');

    }
    if (isset($_GET['txref'])) {
        $ref = $_GET['txref'];
        $amount = $amount_to_charge; //Correct Amount from Server
        $currency = "NGN"; //Correct Currency from Server

        $query = array(
            "SECKEY" => "FLWSECK-dd94408b299955e21c4873cd6ed1514f-X",
            "txref" => $ref,
        );

        $data_string = json_encode($query);

        $ch = curl_init('https://api.ravepay.co/flwv3-pug/getpaidx/api/v2/verify');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

        $response = curl_exec($ch);

        $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $header = substr($response, 0, $header_size);
        $body = substr($response, $header_size);

        curl_close($ch);

        $resp = json_decode($response, true);

        $paymentStatus = $resp['data']['status'];
        $chargeResponsecode = $resp['data']['chargecode'];
        $chargeAmount = $resp['data']['amount'];
        $chargeCurrency = $resp['data']['currency'];
        $email = $resp['data']['custemail'];
        $name = $resp['data']['custname'];
        $number = $resp['data']['custphone'];
        $region = $_SESSION["region"];
        $province = $_SESSION["province"];

        if (($chargeResponsecode == "00" || $chargeResponsecode == "0") && ($chargeAmount == $amount) && ($chargeCurrency == $currency)) {
            // transaction was successful...
            // please check other things like whether you already gave value for this ref
            // if the email matches the customer who owns the product etc
            //Give Value and return to Success page
            $d = $_SESSION;
            foreach ($d as $data => $val) {
                $p1 = $d['cart_item']['children']['quantity'];
                $p2 = $d['cart_item']['teenagers']['quantity'];
                $p3 = $d['cart_item']['teachers']['quantity'];
            }
            $sql = "INSERT INTO registration (name, email, phone_number, p1, p2, p3, region, province, password)
            VALUES ($name, $email, $number, $p1, $p2, $p3,  $region, $province, $ref)";
            // use exec() because no results are returned
            $conn->exec($sql);
            $_SESSION["ref_id"] = $ref;
            header("Location: dashboard.php");

        } else {
            header('Location: failed.php');
            //Dont Give Value and return to Failure page
        }
    } else {
        $_SESSION["error"] = 'No reference supplied';
        header('Location:index.php');
    }

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}