<?php
	include 'db.php';
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
header {
        background-image: linear-gradient(to bottom right, #8FBC8F, #2E8B57);
        color: white;
        padding: 20px;
        text-align: center;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .btn {
	padding:8px 15px;
	background-color:  #8FBC8F;
	color: #fff;
	border:none;
	cursor: pointer;
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
    
    <!-- content -->
    <div class="section">
    <div class="container">
        <h3>Registrasi Akun</h3>
        <div class="box">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="nama">Nama User:</label>
                    <input type="text" name="nama" id="nama" placeholder="Nama User" class="input-control" required>
                </div>
                <div class="form-group">
                    <label for="user">Username:</label>
                    <input type="text" name="user" id="user" placeholder="Username" class="input-control" required>
                </div>
                <div class="form-group">
                    <label for="pass">Password:</label>
                    <input type="password" name="pass" id="pass" placeholder="Password" class="input-control" required>
                </div>
                <div class="form-group">
                    <label for="tlp">Nomor Telpon:</label>
                    <input type="text" name="tlp" id="tlp" placeholder="Nomor Telpon" class="input-control" required>
                </div>
                <div class="form-group">
                    <label for="email">E-mail:</label>
                    <input type="email" name="email" id="email" placeholder="E-mail" class="input-control" required>
                </div>
                <div class="form-group">
                    <label for="almt">Alamat:</label>
                    <input type="text" name="almt" id="almt" placeholder="Alamat" class="input-control" required>
                </div>
                <input type="submit" name="submit" value="Submit" class="btn">
            </form>
               <?php
                   if(isset($_POST['submit'])){
					   
					   $nama = ucwords($_POST['nama']);
					   $username = $_POST['user'];
					   $password = $_POST['pass'];
					   $telpon = $_POST['tlp'];
					   $mail = $_POST['email'];
					   $alamat = ucwords($_POST['almt']);
					   
					   $insert = mysqli_query($conn, "INSERT INTO tb_admin VALUES (
					                        null,
											'".$nama."',
											'".$username."',
											'".$password."',
											'".$telpon."',
											'".$mail."',
											'".$alamat."')
											
											");
						if($insert){
							echo '<script>alert("Registrasi berhasil")</script>';
							echo '<script>window.location="login.php"</script>';
						}else{
						    echo 'gagal '.mysqli_error($conn);
						}
						
					   }
			   ?>
            </div>
            
            </div>
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