<?php
include 'config.php';
$admin = new Admin();  

$aid = $_GET['application_id'];
$stmt = $admin->ret("SELECT * FROM `buspasses` INNER JOIN `routes` ON `buspasses`.`valid_from` = `routes`.`r_id`  INNER JOIN `user` ON `buspasses`.`user_id`=`user`.`user_id`  WHERE `pass_id`='$aid'"); 
$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>
==
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bus Pass</title>
  <style>
    .bus-pass {
      width: 500px;
      height: 300px;
      background: linear-gradient(to right, #ffffff, #e6f0ff, #b3d1ff);
      border: 2px solid #ccc;
      border-radius: 10px;
      padding: 20px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      position: relative;
      overflow: hidden;
    }

    .bus-pass::before {
      content: '';
      background: url('https://upload.wikimedia.org/wikipedia/commons/thumb/f/fd/Red_Rose_icon.svg/1200px-Red_Ros') no-repeat center;
      background-size: 50px 50px;
      position: absolute;
      top: 20px;
      left: 20px;
      width: 50px;
      height: 50px;
    }

    .bus-pass .wave {
      position: absolute;
      top: 0;
      right: 0;
      width: 300px;
      height: 300px;
      background: url('https://i.imgur.com/') no-repeat center;
      background-size: contain;
      opacity: 0.8;
    }

    .bus-pass h2 {
      margin-left: 80px;
      margin-top: 10px;
    }

    .bus-pass .logo {
      position: absolute;
      top: 20px;
      right: 20px;
      height: 50px;
    }

    .info {
      margin-top: 50px;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .photo {
      width: 100px;
      height: 120px;
      background: #000;
      margin-right: 20px;
    }

    .details {
      flex: 1;
    }

    .details p {
      margin: 5px 0;
      font-size: 16px;
    }

    .expiry {
      font-size: 24px;
      font-weight: bold;
    }

    .itso {
      position: absolute;
      bottom: 20px;
      right: 20px;
      background: #002b7f;
      color: #fff;
      padding: 5px 10px;
      border-radius: 50%;
      font-weight: bold;
    }

    .photo-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      border-radius: 5px;
    }

    .download-btn {
      margin-left: 400px;
      margin-top: 20px;
    }
  </style>

  <!-- Fonts and Stylesheets -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600&family=Roboto&display=swap" rel="stylesheet"> 
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
</head>
<body>

<?php include 'header.php' ?>

<div class="container-fluid bg-breadcrumb">
  <div class="container text-center py-5" style="max-width: 900px;">
    <h3 class="text-white display-3 mb-4">Bus Pass</h3>
    <ol class="breadcrumb justify-content-center mb-0">
      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
      <li class="breadcrumb-item active text-white">Bus Pass</li>
    </ol>    
  </div>
</div><br/><br/>

<!-- Download Button -->
<div class="download-btn">
  <button id="downloadImage" class="btn btn-primary me-2">Download as Image</button>
  <!-- <button id="downloadPDF" class="btn btn-danger">Download as PDF</button>
</div> -->

<!-- Bus Pass -->
<div class="bus-pass" style="margin-left: 0px; margin-top: 20px;" id="passElement">
  <div class="wave"></div>
  <h2>Bus Pass</h2>
  <div class="info">
    <div class="photo">
      <img class="photo-img" src="controller/<?php echo $row['profile']; ?>" alt="User Photo" />
    </div>
    <div class="details">
      <p class="expiry">location: <strong><?php echo $row['from'] ?> - <?php echo $row['to'] ?></strong></p>
      <p><strong><?php echo $row['username']; ?></strong></p>
      <p>633597 0214 1234 1234</p>
      <p>Concessionary travel funded by<br>HM Government with your local authority</p>
    </div>
  </div>
  <div class="itso">ITSO</div>
</div>

<br/><br/>
<div style="margin-left:-450px; margin-top: 20px;">
 
<?php include 'footer.php' ?>

</div>

<!-- JavaScript Libraries -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/waypoints/waypoints.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>
<script src="lib/lightbox/js/lightbox.min.js"></script>

<!-- html2canvas and html2pdf -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

<!-- Download Functionality -->
<script>
  // Download as Image
  document.getElementById("downloadImage").addEventListener("click", function () {
    html2canvas(document.getElementById("passElement")).then(canvas => {
      let link = document.createElement('a');
      link.download = 'bus-pass.png';
      link.href = canvas.toDataURL();
      link.click();
    });
  });

  // Download as PDF
  document.getElementById("downloadPDF").addEventListener("click", function () {
    const element = document.getElementById("passElement");
    html2pdf()
      .from(element)
      .set({
        margin: 5,
        filename: 'bus-pass.pdf',
        image: { type: 'jpeg', quality: 0.98 },
        html2canvas: { scale: 2 },
        jsPDF: { unit: 'mm', format: 'a4', orientation: 'landscape' }
      })
      .save();
  });
</script>

</body>
</html>
