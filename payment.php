<!-- filepath: c:\newxampp\htdocs\Govindas\bus-pass\payment.php -->

<?php include 'config.php';
$admin = new Admin();
if(!isset($_SESSION['uid'])) {
    echo "<script>alert('Please login first');window.location.href='login.php'</script>";
}
$uid = $_SESSION['uid'];
$p = $_GET['pass'];
$pass = $admin->ret("SELECT * FROM `buspasses`  WHERE `pass_id`='$p'");
$row = $pass->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Travela - Tourism Website Template</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600&family=Roboto&display=swap" rel="stylesheet"> 

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">


        <!-- Customized Bootstrap Stylesheet -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">

        <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        header, footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 15px 0;
        }
        header h1, footer p {
            margin: 0;
        }
        main {
            padding: 20px;
        }
        .payment-option {
            margin-bottom: 20px;
            justify-content: center;
        }
        #scanner-section {
            display: none;
            margin-top: 20px;
        }
        .scanner-image {
            width: 200px;
            height: auto;
            margin-bottom: 10px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #45a049;
        }
        header, footer {
        background-color: #333;
        color: white;
        text-align: center;
        padding: 15px 0;
    }
    #scanner-section {
    display: none;
    margin-top: 20px;
}
.scanner-image {
    max-width: 200px;
    height: auto;
}

    </style>
    <script>
        function toggleScannerSection() {
    const paymentMethod = document.querySelector('input[name="payment_method"]:checked').value;
    const scannerSection = document.getElementById('scanner-section');
    if (paymentMethod === 'scanner') {
        scannerSection.style.display = 'block';
    } else {
        scannerSection.style.display = 'none';
    }
}

    </script>


    </head>

    <body>

        <!-- Spinner Start -->
       
        <!-- Spinner End -->

       <?php include 'header.php' ?>
        <!-- Navbar & Hero End -->

        <!-- Header Start -->
        <div class="container-fluid bg-breadcrumb">
            <div class="container text-center py-5" style="max-width: 900px;">
                <h3 class="text-white display-3 mb-4">Travel Packages</h1>
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active text-white">Packages</li>
                </ol>    
            </div>
        </div>

        <main class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-sm-10">
            <div class="card shadow-lg border-0">
                <div class="card-body">
                    <h3 class="text-center mb-4">Payment Method</h3>
                    <p class="text-center mb-4 fs-5">Amount to Pay: <strong>₹<?php echo $row['f_price']; ?></strong></p>

                    <form action="controller/records.php" method="POST">

                    <input type="hidden" value="<?php echo $p; ?>" name="appid" />
                    <input type="hidden" value="<?php echo $uid; ?>" name="uid" />
                    <input type="hidden" value="<?php echo $row['f_price']; ?>" name="amt" />

                        <div class="mb-4 text-center">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="payment_method" id="cash" value="cash" onclick="toggleScannerSection()" checked>
                                <label class="form-check-label" for="cash">Cash</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="payment_method" id="scanner" value="scanner" onclick="toggleScannerSection()">
                                <label class="form-check-label" for="scanner">Scanner</label>
                            </div>
                        </div>

                        <div id="scanner-section" class="text-center">
                            <img src="scanner.png" alt="Scanner" class="scanner-image img-fluid mb-3">
                            <div class="mb-3">
                                <label for="transaction_id" class="form-label">Transaction ID:</label>
                                <input type="text" id="transaction_id" name="transaction_id" class="form-control" placeholder="Enter Transaction ID">
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-success px-4" name="payment">Submit Payment</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>


    <?php include 'footer.php' ?>
  
</body>
</html>