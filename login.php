<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Login | Web Galeri Foto</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<style>
        /* Add custom styles here */
        #bg-login {
            background-image: linear-gradient(to bottom right, #8FBC8F, grey);
            /* Change background color */
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .box-login {
			background-image: linear-gradient(to bottom right, #8FBC8F, grey);
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
            max-width: 400px;
            width: 100%;
        }

        .input-control {
            margin-bottom: 10px;
        }
        .btn {
	padding:8px 15px;
	background-image: linear-gradient(to bottom right, #8FBC8F, grey);
	color: #fff;
	border:none;
	cursor: pointer;
}

    </style>
</head>

<body id="bg-login">
     <div class="box-login">
         <h2>Login</h2>
         <form action="" method="POST">
             <input type="text" name="user" placeholder="Username" class="input-control">
             <input type="password" name="pass" placeholder="Password" class="input-control">
             <input type="submit" name="submit" value="Login" class="btn">
         </form>
         <?php
		     if(isset($_POST['submit'])){
				 session_start();
				 include 'db.php';

				 $user = mysqli_real_escape_string($conn, $_POST['user']);
				 $pass = mysqli_real_escape_string($conn, $_POST['pass']);
				 
				 $cek = mysqli_query($conn, "SELECT * FROM tb_admin WHERE username = '".$user."'AND password = '".$pass."'");
				 if(mysqli_num_rows($cek) > 0){
					 $d = mysqli_fetch_object($cek);
					 $_SESSION['status_login'] = true;
					 $_SESSION['a_global'] = $d;
					 $_SESSION['id'] = $d->admin_id;
					 echo '<script>window.location="dashboard.php"</script>';
				 }else{
					 echo '<script>alert("Username atau password anda salah")</script>';
				 }
			 }
	     ?><br />
         <p>Belum punya akun? daftar <a style="color:#00C;" href="registrasi.php">DISINI</a></p>
         <p>atau klik <a style="color:#00C;" href="index.php">Kembali</a></p>
      </div>
      
</body>
</html>