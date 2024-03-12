<?php
    session_start();
	if($_SESSION['status_login'] != true){
		echo '<script>window.location="login.php"</script>';
    }
    $id =$_SESSION['id'];
?>
<?php
    include 'db.php';
	$kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 2");
	$a = mysqli_fetch_object($kontak);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>WEB Galeri Foto</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<style>
    header {
        background-image: linear-gradient(to bottom right, #8FBC8F, grey);
	color: white;
}
.search input[type=submit] {
	padding:12px 15px;
	background-color: #8FBC8F;
	color: #fff;
	border:none;
	cursor:pointer;
}
.section {
    background-color: #f2f2f2;
    padding: 20px;
}

.container {
    max-width: 800px;
    margin: 0 auto;
}

.box {
    background-image: linear-gradient(to bottom right, #8FBC8F, grey);
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    padding: 20px;
    margin-top: 20px;
}



h3 {
    font-size: 24px;
    margin-bottom: 20px;
}

h4 {
    font-size: 20px;
    margin-top: 0;
}

.container {
	width: 80%;
	margin: 0 auto;
    text-align: center;
}

    /* Animation for Header */
    @keyframes headerAnimation {
        0% {
            transform: translateY(-20px);
            opacity: 0;
        }
        100% {
            transform: translateY(0);
            opacity: 1;
        }
    }

    header {
        animation: headerAnimation 0.5s ease-out;
    }

</style>

<body>
    <!-- header -->
    <header>
        <div class="container">
        <h1><a href="dashboard.php">MUUFLIH GALERI</a></h1>
        <ul>
           <li><a href="dashboard.php">Dashboard</a></li>
           <li><a href="profil.php">Profil</a></li>
           <li><a href="data-image.php">Data Foto</a></li>
           <li><a href="Keluar.php">Keluar</a></li>
        </ul>
        </div>
    </header>
    
    <!-- content -->
    <div class="section">
        <div class="container">
            <h3>Dashboard</h3>
            <div class="box">
               <h4>Selamat Datang <?php echo $_SESSION['a_global']->admin_name ?> di Website Muuflih Galeri</h4>
            </div>
        </div>
    </div>
    
    <<div class="container">
       <h3>Foto Anda</h3>
       <div class="box">
        <div class="kotak">
          <?php
              $foto = mysqli_query($conn, "SELECT * FROM tb_image WHERE image_status = 1 and admin_id =$id ORDER BY image_id DESC LIMIT 8");
			  if(mysqli_num_rows($foto) > 0){
				  while($p = mysqli_fetch_array($foto)){
		  ?>
          <a href="detail-image.php?id=<?php echo $p['image_id'] ?>">
          <div class="col-4">
              <img src="foto/<?php echo $p['image'] ?>" height="150px" />
              <p class="nama"><?php echo substr($p['image_name'], 0, 30)  ?></p>
              <p class="admin">Nama User : <?php echo $p['admin_name'] ?></p>
              <p class="nama"><?php echo $p['date_created']  ?></p>
          </div>
          </a>
          <?php }}else{ ?>
              <p>Foto tidak ada</p>
          <?php } ?>
       </div>
    </div>
    
    
    <!-- footer -->
    <footer>
        <div class="container">
            <small>Copyright &copy; 2024 - Muuflihfauzan08.</small>
        </div>
    </footer>
</body>
</html>