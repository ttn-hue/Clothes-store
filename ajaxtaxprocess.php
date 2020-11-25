<?php
    session_start();
    include('includes/db_connection.php');

    //uncomment when neccesary
    //$province = $_POST['province'];
    //$subtotal = $_POST['subtotal'];
    //$shoppingcart = $_POST['shoppingcart'];

    echo " imprime esto<br>";
    //echo "$subtotal<br>";
    //echo " $shoppingcart<br>";

    //delete when necessary
     $province = "MB";
     $subtotal = "89.00";

    $tax = calculateTax($subtotal, $province);

    $formatted = number_format((float)$tax, 2, '.', '');

    $total = $subtotal + $formatted;

    $taxTD = number_format((float)$tax, 2, '.', '');
    $totalTD = number_format((float)$total, 2, '.', '');

    //delete when necessary
    // echo "subtotal $$subtotal <br>";
    echo "$$taxTD";
    // echo "total $$totalTD <br>";

    function calculateTax($subtotal, $province)
     {
        switch($province) {
            case "NL":
                $tax = 0.04;
                break;
            case "PE":
                $tax = 0.05;
                break;
            case "NS":
                $tax = 0.06;
                break;
            case "NB":
                $tax = 0.06;
                break;
            case "QC":
                $tax = 0.08;
                break;
            case "ON":
                $tax = 0.09;
                break;
            case "MB":
                $tax = 0.10;
                break;
            case "SK":
                $tax = 0.11;
                break;
            case "AB":
                $tax = 0.12;
                 break;
            case "BC":
                $tax = 0.13;
            break;
            case "YT":
                $tax = 0.14;
            break;
            case "NT":
                $tax = 0.15;
            break;
            case "NU":
                $tax = 0.16;
            break;
            default:
            $tax = 0;
            break;
        }
        return $tax * $subtotal;
     }

     return $tax
?>