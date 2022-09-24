<?php
  include 'config.php';
  
  error_reporting(0);
 
  session_start();
 
  if (isset($_SESSION['username'])) {
    header("Location: admin.php");
  }
 
  if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
 
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        header("Location: admin.php");
    } else {
        echo "<script>alert('Email atau password Anda salah. Silahkan coba lagi!')</script>";
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sistem Informasi Pemetaan Komoditas Pertanian</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap 5-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> 
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <!-- W3.css-->
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  
  <!-- Font Awesome-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
  
  <!-- Map Box-->
  <link href='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.css' rel='stylesheet' />
  <link href="https://api.mapbox.com/mapbox-gl-js/v2.9.2/mapbox-gl.css" rel="stylesheet">
  <script src='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.js'></script>

  <link href="./style.css" rel="stylesheet">
  
</head>
<body>
    <nav class="navbar w3-dark-gray px-0 py-0">
        <div class="container-fluid px-2">
            <span class="navbar-text text-light">Sistem Informasi Pemetaan Komoditas Pertanian</span>
            <a onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-xlarge " href="#">
                <i class="fas fa-user"></i>
            </a>
        </div>
    </nav>

    <!-- Modal Login-->
    <div id="id01" class="w3-modal">
      <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:400px">
  
        <div class="w3-center"><br>
          <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
          <h1 class="w3-margin-top w3-opacity"><b>Login</b></h1>
        </div>
  
        <form class="w3-container" action="" method="post">
          <div class="w3-section">
            <label><b>Username</b></label>
            <input class="w3-input w3-border w3-margin-bottom" type="email" placeholder="Enter Email" name="email" value="<?php echo $email; ?>" required>
            <label><b>Password</b></label>
            <input class="w3-input w3-border" type="password" placeholder="Enter Password" name="password" value="<?php echo $_POST['password']; ?>" required>
            <button class="w3-button w3-block w3-green w3-section w3-padding" type="submit">Login</button>
          </div>
        </form>
  
        <div class="w3-container w3-border-top w3-padding-5 w3-light-grey">
          <input class="w3-check " type="checkbox" checked="checked"> <i>Remember me</i>
          <span class="w3-right w3-padding w3-hide-small"><a href="#">Forgot password?</a></span>
        </div>
  
      </div>
    </div>

    <div class="container-fluid d-flex  ">
        <div class="container w3-light-gray text-light flex-fill my-3 mx-2">
            <p class="my-0">Longitude: &nbsp;<span id="lng"></span></p>            
            <p class="my-0">Latitude: &nbsp;<span id="lat"></span></p>
            <p class="my-0">Ketinggian: &nbsp;<span id="ele"></span></p>
            <p class="my-0">Suhu :  C</p>
            <p class="my-0">Curah Hujan :  mm</p>
            <p class="my-0">Kelembapan :  %</p>
        </div>
        <div class="container w3-light-gray text-light flex-fill my-3 mx-2">
            <p class="my-0">Komoditas yang Cocok :</p>
        </div>
    </div>

    <div id="map"></div>

    <script src="./script.js"></script>
</body>
</html>