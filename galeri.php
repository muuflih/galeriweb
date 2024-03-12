<?php
    error_reporting(0);
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
.box {
	background-color: #fff;
	border:1px solid #ccc;
	padding:15px;
	box-sizing: border-box;
	margin:10px 0 25px 0;
}
.container {
	width: 80%;
	margin: 0 auto;
    text-align: center;
}
header {
        background-image: linear-gradient(to bottom right, #8FBC8F, #2E8B57);
        color: white;
        padding: 20px;
        text-align: center;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    /* Search Button Styles */
    .search input[type=submit] {
        padding: 12px 20px;
        background-color: #2E8B57;
        color: #fff;
        border: none;
        cursor: pointer;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .search input[type=submit]:hover {
        background-color: #3CB371;
    }
</style>
<body>
    <!-- header -->
    <header>
        <div class="container">
        <h1><a href="index.php">MUUFLIH GALERI</a></h1>
        <ul>
            <li><a href="galeri.php">Galeri</a></li>
           <li><a href="registrasi.php">Registrasi</a></li>
           <li><a href="login.php">Login</a></li>
        </ul>
        </div>
    </header>
    
    <!-- search -->
    <div class="search">
        <div class="container">
            <form action="galeri.php">
                <input type="text" name="search" placeholder="Cari Foto" value="<?php echo $_GET['search'] ?>" />
                <input type="hidden" name="kat" value="<?php echo $_GET['kat'] ?>" />
                <input type="submit" name="cari" value="Cari Foto" />
            </form>
        </div>
    </div>

    <!-- new product -->
    <div class="section">
    <div class="container">
       <h3>Album</h3>
       <div class="box">
          <?php
		      if($_GET['search'] != '' || $_GET['kat'] != ''){
			     $where = "AND image_name LIKE '%".$_GET['search']."%' AND category_id LIKE '%".$_GET['kat']."%' ";
			  }
              $foto = mysqli_query($conn, "SELECT * FROM tb_image WHERE image_status = 1 $where ORDER BY image_id DESC");
			  if(mysqli_num_rows($foto) > 0){
				  while($p = mysqli_fetch_array($foto)){
		  ?>
          <a href="detail-image.php?id=<?php echo $p['image_id']; ?>">
    <div class="col-4">
        <img src="foto/<?php echo $p['image']; ?>" height="150px" />
        <p class="nama"><?php echo substr($p['image_name'], 0, 30); ?></p>
        <p class="harga"><?php echo $p['admin_name']; ?></p>
        <p class="admin">Nama User : <?php echo $p['admin_name']; ?></p>
        <p class="tanggal"><?php echo $p['date_created']; ?></p> <!-- Menambahkan kelas 'tanggal' untuk elemen tanggal -->
    </div>
</a>

          <?php }}else{ ?>
              <p>Foto tidak ada</p>
          <?php } ?>
       </div>
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