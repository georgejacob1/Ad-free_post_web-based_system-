<?php
include('../db_con.php');
include 'userprofile-session.php';
$logid = $_SESSION['login_id'];
$p_id=$_POST['invoice'];
require("pdf/fpdf.php");
if (!isset($_SESSION['email'])) {
    header('location:login.php');
}
$user = "SELECT * FROM `tbl_users` WHERE login_id=$logid";
$resul = mysqli_query($conn, $user);
$ro = mysqli_fetch_array($resul);
// $login_id = $ro['login_id'];
//customer and invoice details
// $prdt_id = $_POST['prdtid'];
$x = (rand(10000, 100000));
$sql2 = "SELECT * FROM `tbl_address` WHERE login_id=$logid";
$res2 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_array($res2);

$sql = "SELECT * FROM tbl_product INNER JOIN tbl_payment ON tbl_product.paymet_id=tbl_payment.pay_id WHERE tbl_payment.login_id=$logid and tbl_product.product_id=$p_id";
$res = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($res);
$date = $row['date'];
$fname = $ro['user_fname'];
$lname = $ro['user_lname'];
$hname = $row2['house'];
$street = $row2['street'];
$city = $row2['city'];
$state = $row2['state'];
$pin = $row2['pincode'];
$trans_id = $row['trans_id'];
$transcation_date = $row['transcation_date'];
$amount = $row['amount'];
// $quantity = $row['quantity'];
$p_name = $row['p_name'];
$info = [
    "customer" => "$fname $lname",
    "address" => "$hname",
    "city" => "$city",
    "state" => "$state",
    "Pincode" => "$pin",
    "invoice_no" => "# $x",
    "invoice_date" => "$date",
    "transcation_date" => "$transcation_date",
    "tranc_id" => "$trans_id",
    "total_amt" => "$amount.00",
    //"words"=>"Rupees Five Thousand Two Hundred Only",
];


//invoice Products
$products_info = [
    [
        "name" => "$p_name",
        "price" => "$amount.00",
        //"qty" => $quantity,
        "tranc_id" => "$trans_id"
    ],
    // [
    //   "name"=>"Mouse",
    //   "price"=>"400.00",
    //   "qty"=>3,
    //   "total"=>"1200.00"
    // ],
    // [
    //   "name"=>"UPS",
    //   "price"=>"3000.00",
    //   "qty"=>1,
    //   "total"=>"3000.00"
    // ],
];

class PDF extends fpdf
{
    function Header()
    {

        //Display Company Info
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(50, 10, "EASY BUY", 0, 1);
        //$this->Cell(50, 10, "EASY BUY", 0, 1);
        $this->SetFont('Arial', '', 14);
        $this->Cell(50, 7, "India,", 0, 1);
        $this->Cell(50, 7, "Kerala 690502.", 0, 1);
        $this->Cell(50, 7, "PH : 8778731770", 0, 1);

        //Display INVOICE text
        $this->SetY(15);
        $this->SetX(-40);
        $this->SetFont('Arial', 'B', 18);
        $this->Cell(50, 10, "INVOICE", 0, 1);

        //Display Horizontal line
        $this->Line(0, 48, 210, 48);
    }

    function body($info, $products_info)
    {

        //Billing Details
        $this->SetY(55);
        $this->SetX(10);
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(50, 10, "Bill To: ", 0, 1);
        $this->SetFont('Arial', '', 12);
        $this->Cell(50, 7, $info["customer"], 0, 1);
        $this->Cell(50, 7, $info["address"], 0, 1);
        $this->Cell(50, 7, $info["city"], 0, 1);
        $this->Cell(50, 7, $info["Pincode"], 0, 1);

        //Display Invoice no
        $this->SetY(55);
        $this->SetX(-80);
        $this->Cell(50, 7, "Invoice No : " . $info["invoice_no"]);

        //Display Invoice date
        $this->SetY(63);
        $this->SetX(-80);
        $this->Cell(50, 2, "Invoice Date : " . $info["invoice_date"]);

        $this->SetY(68);
        $this->SetX(-80);
        $this->Cell(50, 2, "Tranc Date : " . $info["transcation_date"]);

        //Display Table headings
        $this->SetY(95);
        $this->SetX(10);
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(85, 9, "PRODUCT", 1, 0);
        $this->Cell(70, 9, "Transcation ID", 1, 0, "C");
        //$this->Cell(30, 9, "PRICE", 1, 0, "C");
        $this->Cell(40, 9, "PRICE", 1, 1, "C");
        $this->SetFont('Arial', '', 9);

        //Display table product rows
        foreach ($products_info as $row) {
            $this->Cell(85, 9, $row["name"], "LR", 0);
            $this->Cell(70, 9, $row["tranc_id"], "R", 0, "R");
            //$this->Cell(30, 9, $row["qty"], "R", 0, "C");
            $this->Cell(40, 9, $row["price"], "R", 1, "R");
        }
        //Display table empty rows
        for ($i = 0; $i < 12 - count($products_info); $i++) {
            $this->Cell(85, 9, "", "LR", 0);
            $this->Cell(70, 9, "", "R", 0, "R");
            //$this->Cell(30, 9, "", "R", 0, "C");
            $this->Cell(40, 9, "", "R", 1, "R");
        }
        //Display table total row
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(155, 9, "TOTAL", 1, 0, "R");
        $this->Cell(40, 9, $info["total_amt"], 1, 1, "R");

        //Display amount in words
        // $this->SetY(225);
        // $this->SetX(10);
        // $this->SetFont('Arial','B',12);
        // $this->Cell(0,9,"Amount in Words ",0,1);
        // $this->SetFont('Arial','',12);
        //$this->Cell(0,9,$info["words"],0,1);

    }
    function Footer()
    {

        //set footer position
        $this->SetY(-50);
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, "FROM EASY BUY", 0, 1, "R");
        $this->Ln(15);
        $this->SetFont('Arial', '', 12);
        $this->Cell(0, 10, "Authorized Signature", 0, 1, "R");
        $this->SetFont('Arial', '', 10);

        //Display Footer Text
        $this->Cell(0, 4, "THANK YOU", 0, 1, "C");

        $this->Cell(0, 10, "This is a computer generated invoice", 0, 1, "C");
    }
}
//Create A4 Page with Portrait 
$pdf = new PDF("P", "mm", "A4");
$pdf->AddPage();
$pdf->body($info, $products_info);
$pdf->Output();
