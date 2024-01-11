<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="custom.css">
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <section>
        <div class="container-fluid">
            <div class="container main-div">
                <div class="row">
                    <div class="col-12">
                        <form method="Post">
                            <h1>Payment Form</h1>
                            <div class="mb-3">
                                <label for="Company Name" class="form-label">Company Name*</label>
                                <input type="text" required placeholder="Company Name" class="form-control" id="companiname" name="companiname">
                            </div>
                            <div class="mb-3">
                                <label for="mobile" class="form-label">Mobile Number *</label>
                                <input type="number" required placeholder="Mobile Number" class="form-control" id="mobile" name="mobile">
                            </div>
                            <div class="mb-3">
                              <label for="email" class="form-label">Email *</label>
                              <input type="email"placeholder="Email" required class="form-control" id="email" name="email">
                            </div>
                            <div class="mb-3">
                                <label for="amount" class="form-label">Amount * <span>Debit Credit 3% Extra Charge</span></label>
                                <input type="number" required placeholder="Amount" class="form-control" id="amount" name="amount">
                            </div>
                            <div class="mb-3">
                                <label for="invoice" class="form-label">Invoice Number *</label>
                                <input type="text" required placeholder="Invoice Number" class="form-control" id="invoice" name="invoice">
                            </div>
                            <div class="mb-3">
                                <label for="Ref" class="form-label">Ref. No</label>
                                <input type="text" placeholder="Ref. No" class="form-control" id="refrence" name="refrence">
                            </div>
                            <button type="submit" name="upi" class="btn btn-primary mr-20">PAY BY UPI</button>
                            <button type="submit" name="debit" class="btn second-btn btn-primary">DEBIT CREDIT CARD</button>
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <?php
$servername="localhost";
$username="root";
$password="";
$dbname="khambatdb";
 $conn= new mysqli($servername,$username,$password,$dbname);
 if($conn->connect_error){ 
    die("connection fail:".$conn->connect_error);
 }

$companinameErr = $mobileErr = $emailErr = $amountErr = $invoiceErr = "";
$companiname = $mobile = $email = $amount = $invoice = "";
if($_SERVER['REQUEST_METHOD']=="POST"){
    // compani name validation
    if (empty($_POST['companiname'])) {
       $companinameErr = "Companiname is required";
    }else {
        $companiname=$_POST['companiname'];
    }
    
    // mobile number validation
    if(empty($_POST['mobile'])){
        $mobileErr = "Mobile number is required";
    }else {
        $mobile=$_POST['mobile'];
    }
    if (strlen($mobile)!==10) {
        $mobileErr = "mobile no. must contain 10 digits only";
    }
    if(!preg_match("/^[0-9]*$/",$mobile)){
        $mobileErr = "Only number are allowed";
    }

    // email validation
    if (empty($_POST['email'])) {
        $emailErr = "Email is required";
    } else{
        $email=$_POST['email'];
    } 

    // amount validation
    if(empty($_POST['amount'])){
        $amountErr = "Amount is required";
    }else {
        $amount=$_POST['amount'];
    }

    // invoice validation
    if(empty($_POST['invoice'])){
        $invoiceErr = "Invoice is required";
    }else {
        $invoice=$_POST['invoice'];
    }

    }

if(empty($companinameErr)&& empty($mobileErr)&& empty($emailErr)&& empty($amountErr)&& empty($invoiceErr)){

    // $text = $amount*7/100;

    if (!empty($_POST['companiname'])) {
        //     $hash=md5($_POST['pass']);
        $sql= "INSERT INTO uploaddata(companiname,mobile,email,amount,invoice,refrence)VALUES('".$_POST['companiname']."','".$_POST['mobile']."','".$_POST['email']."','".$_POST['amount']."','".$_POST['invoice']."','".$_POST['refrence']."')";
            if($conn->query($sql)==true){
            echo "inserted secessfully";
            } else{
            echo "error".$sql. $conn->connect_error;
            }
        }

    if (isset($_POST['upi'])) {
        header('location:./upi-pay.php');
    }

    if (isset($_POST['debit'])) {
        header('location:./debit.html');
    }
   
}
?>

</body>
</html>