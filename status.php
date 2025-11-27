<?php include 'config.php';
$admin = new Admin();
if(!isset($_SESSION['uid'])) {
    echo "<script>alert('Please login first');window.location.href='login.php'</script>";
}
$uid = $_SESSION['uid'];
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
    </head>

    <body>

        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

       <?php include 'header.php' ?>
        <!-- Navbar & Hero End -->

        <!-- Header Start -->
        <div class="container-fluid bg-breadcrumb">
            <div class="container text-center py-5" style="max-width: 900px;">
                <h3 class="text-white display-3 mb-4">Bus <span class="text-warning">Pass</span> Booking<span class="text-warning"> Status</span></h1>
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="application.php">Booking</a></li>
                </ol>    
            </div>
        </div>
        <!-- Header End -->

        

        <!-- Tour Booking Start -->
        <div class="container-fluid py-5">
    <div class="container">
        <h2 class="text-center mb-4">Booking Details</h2>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Age</th>
                    <th>Category</th>
                    <th>Duration</th>
                    <th>From Place</th>
                    <th>To Place</th>
                    <th>Amount</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
               $stmt = $admin->ret("
               SELECT * 
               FROM `buspasses` 
               INNER JOIN `amount` ON `buspasses`.`a_id` = `amount`.`a_id` 
               INNER JOIN `pass_type` ON `amount`.`type_id` = `pass_type`.`type_id` 
               INNER JOIN `pass_category` ON `amount`.`cat_id` = `pass_category`.`cat_id` 
               INNER JOIN `routes` ON `buspasses`.`valid_from` = `routes`.`r_id` 
               WHERE `buspasses`.`user_id` = '$uid'
             ");
             
                $i = 1;
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                    $duration = strtolower($row['type_name']);
$startDate = new DateTime($row['pass_date']);
$today = new DateTime();
$expiryDate = clone $startDate;

switch ($duration) {
    case 'monthly':
        $expiryDate->modify('+1 month');
        break;
    case 'quarterly':
        $expiryDate->modify('+3 months');
        break;
    case 'halfyearly':
        $expiryDate->modify('+6 months');
        break;
    case 'annual':
        $expiryDate->modify('+1 year');
        break;
    default:
        $expiryDate = null;
}
$isExpired = $expiryDate && $today > $expiryDate;
                    
                   
                ?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['aemail']; ?></td>
                        <td><?php echo $row['aphone']; ?></td>
                        <td><?php echo $row['age']; ?></td>
                        <td><?php echo $row['cat_name']; ?></td>
                    
                        <td><?php echo $row['type_name']; ?></td>
                        <td><?php echo $row['from']; ?></td>
                        <td><?php echo $row['to']; ?></td>
                        <td> <?php echo $row['f_price'] ; ?> </td>
                       
                        <td>
    <?php 
    if ($row['pass_status'] == 'paid') { ?>
        <a href="#"><span class="badge bg-success">Payment Confirmation</span></a>

    <?php } elseif ($row['pass_status'] == 'conformed') { ?>
        <a href="#"><span class="badge bg-success">Payment Confirmed</span></a>
        <a href="download.php?application_id=<?php echo $row['pass_id']; ?>" class="btn btn-primary btn-sm ms-2">Download</a>

        <?php if ($isExpired) { ?>
            <a href="controller/records.php?pass_id=<?php echo $row['pass_id']; ?>" class="btn btn-warning btn-sm ms-2">Renew</a>
        <?php } ?>

    <?php } elseif ($row['pass_status'] == 'accept') { ?>
        <a href="payment.php?pass=<?php echo $row['pass_id']; ?>"><span class="badge bg-success">Payment</span></a>

    <?php } elseif ($row['pass_status'] == 'reject') { ?>
        <a href="#"><span class="badge bg-danger">Rejected</span></a>

    <?php } else { ?>
        <a href="#"><span class="badge bg-warning">Pending</span></a>
    <?php } ?>
</td>


                    
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
        <!-- Tour Booking End -->
        
        <!-- Subscribe Start -->
      
        <!-- Subscribe End -->

      
        <!-- Footer End -->
        
  <?php include 'footer.php' ?>
        <!-- JavaScript Libraries -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="lib/lightbox/js/lightbox.min.js"></script>
        

        <!-- Template Javascript -->
        <script src="js/main.js"></script>
    </body>

</html>