<?php
include('../db_con.php');
include 'userprofile-session.php';
//$logid = $_SESSION['login_id'];
require("pdf/fpdf.php");
if (!isset($_SESSION['email'])) {
    header('location:login.php');
}
$view = "SELECT a.*, b.*,c.* ,d.*from tbl_product a INNER JOIN tbl_login b INNER JOIN tbl_users c INNER JOIN tbl_payment d ON a.login_id=b.login_id and c.login_id=b.login_id and a.login_id=d.login_id Where a.delete_status='1' AND a.paymet_id!='0' And a.paymet_id=d.pay_id;";
$query_run = mysqli_query($conn, $view);
$i = 1;
while ($prod = mysqli_fetch_array($query_run)) {
    $i;
    $produt = $prod['p_name'];
    $prod['user_fname'] . " " . $prod['user_lname'];
    $email = $prod['email'];
    $trans_id = $prod['trans_id'];
    $amount = $prod['amount'];
    $transcation_date = $prod['transcation_date'];
    date_default_timezone_set('Asia/Kolkata');
    $date = date('Y/d/m');
    $x = (rand(10000, 100000));
    $info = [

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
            "Sno" => "$i",
            "productname" => "$produt",
            "email" => "$email",
            "price" => "$amount.00",
            "tranc_id" => "$trans_id",
            "tranc_date" => "$transcation_date"

        ],
    ];
}


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
        //$this->Cell(50, 10, "Bill To: ", 0, 1);
        $this->SetFont('Arial', '', 12);
        // $this->Cell(50, 7, $info["customer"], 0, 1);
        // $this->Cell(50, 7, $info["address"], 0, 1);
        // $this->Cell(50, 7, $info["city"], 0, 1);
        // $this->Cell(50, 7, $info["Pincode"], 0, 1);

        //Display Invoice no
        $this->SetY(55);
        $this->SetX(-60);
        $this->Cell(50, 7, "Invoice No : " . $info["invoice_no"]);

        //Display Invoice date
        $this->SetY(63);
        $this->SetX(-60);
        $this->Cell(50, 2, "Invoice Date : " . $info["invoice_date"]);

        $this->SetY(68);
        $this->SetX(-80);
        //$this->Cell(50, 2, "Tranc Date : " . $info["transcation_date"]);

        //Display Table headings
        $this->SetY(95);
        $this->SetX(10);
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(15, 9, "SNo.", 1, 0);
        $this->Cell(50, 9, "PRODUCT", 1, 0, "C");
        $this->Cell(35, 9, "EMAIL", 1, 0, "C");
        $this->Cell(40, 9, "TRANSCATION ID", 1, 0, "C");
        $this->Cell(40, 9, "PAID ON", 1, 0, "C");
        $this->Cell(15, 9, "PRICE", 1, 1, "C");
        $this->SetFont('Arial', '', 9);

        //Display table product rows
        foreach ($products_info as $row) {
            $this->Cell(15, 9, $row["Sno"], "LR", 0);
            $this->Cell(50, 9, $row["productname"], "R", 0, 0);
            $this->Cell(35, 9, $row["email"], "R", 0, "C");
            $this->Cell(40, 9, $row["tranc_id"], "R", 0, "C");
            $this->Cell(40, 9, $row["tranc_date"], "R", 0, "C");
            $this->Cell(15, 9, $row["price"], "R", 1, "R");
        }

        //Display table empty rows
        for ($i = 0; $i < 12 - count($products_info); $i++) {
            $this->Cell(15, 9, "", "LR", 0);
            $this->Cell(50, 9, "", "R", 0, "R");
            $this->Cell(35, 9, "", "R", 0, "C");
            $this->Cell(40, 9, "", "R", 0, "C");
            $this->Cell(40, 9, "", "R", 0, "C");
            $this->Cell(15, 9, "", "R", 1, "R");
        }

        //Display table total row
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(140, 9, "TOTAL", 1, 0, "R");
        $this->Cell(55, 9, $info["total_amt"], 1, 1, "R");

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
