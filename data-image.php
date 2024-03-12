<?php
    session_start();
	include 'db.php';
	if($_SESSION['status_login'] != true){
		echo '<script>window.location="login.php"</script>';
    }
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
/* Mengatur gaya form */
.container {
    width: 80%;
    margin: 0 auto;
}

.table {
    width: 100%;
    border-collapse: collapse;
}

.table th, .table td {
    padding: 10px;
    text-align: left;
}

.table th {
    background-color: #f2f2f2;
}

.table td {
    border-bottom: 1px solid #ddd;
}

.box {
    margin-bottom: 20px;
}
.container {
	width: 80%;
	margin: 0 auto;
    text-align: center;
}


/* Gaya form input */
input[type="text"], input[type="password"], select {
    width: 100%;
    padding: 8px;
    margin: 5px 0;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

/* Tombol Aksi */
.actions {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.actions a {
    padding: 8px 16px;
    background-color: #28a745;
    color: #fff;
    text-decoration: none;
    border-radius: 4px;
}

.actions a:hover {
    background-color: #218838;
}

/* Pesan status */
.success {
    color: #28a745;
    font-weight: bold;
}

.error {
    color: #dc3545;
    font-weight: bold;
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
            <h3>Data Galeri Foto</h3>
            <div class="box">
                <p><a href="tambah-image.php">Tambah Data</a></p>
                <table border="1" cellspacing="0" class="table">
                    <thead>
                        <tr>
                           <th width="60px">No</th>
                           <th>Kategori</th>
                           <th>Nama User</th>
                           <th>Nama Foto</th>
                           <th>Deskripsi</th>
                           <th>Gambar</th>
                           <th>Status</th>
                           <th width="150px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
						    $no = 1;
							$user = $_SESSION['a_global']->admin_id;
                            $foto = mysqli_query($conn, "SELECT * FROM tb_image WHERE admin_id = '$user' ");
							if(mysqli_num_rows($foto) >0 ){
							while($row = mysqli_fetch_array($foto)){
						?>
                        <tr>
                           <td><?php echo $no++ ?></td>
                           <td><?php echo $row['category_name'] ?></td>
                           <td><?php echo $row['admin_name'] ?></td>
                           <td><?php echo $row['image_name'] ?></td>
                           <td><?php echo $row['image_description']?></td>
                           <td><a href="foto/<?php echo $row['image']?>" target="_blank"><img src="foto/<?php echo $row['image']?>" width="50px"></a></td>
                           <td><?php echo ($row['image_status'] == 0)? 'Tidak Aktif':'Aktif'; ?></td>
                           <td>
                              <a href="edit-image.php?id=<?php echo $row['image_id'] ?>">Edit</a> || 
                              <a href="proses-hapus.php?idp=<?php echo $row['image_id'] ?>" onclick="return confirm('Yakin Ingin Hapus ?')">Hapus</a>
                           </td>
                        </tr>
                        <?php }}else{ ?>
                             <tr>
                                <td colspan="8">Tidak ada data</td>
                             </tr>
                        <?php } ?>
                    </tbody>
                </table>
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