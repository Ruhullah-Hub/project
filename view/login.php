<?php
ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL);
if(isset($_POST['userid'])){
session_start();
include "../conf/config.php";
	$userid = $_POST['userid'];
	$password = $_POST['pwd'];
	
	$sql = $conn->query("SELECT * FROM pengguna WHERE idpengguna='$userid' AND password='$password'");
	$num = $sql->num_rows;
	
	if($num > 0){
		$r = $sql->fetch_assoc();
		
		$_SESSION['nama'] = $r['namapengguna'];
		$_SESSION['admin'] = $r['idpengguna'];
		
		header('location:../index.php');
	}else{ ?>
		<script>	
			alert("Maaf, Akun anda tidak ditemukan / Tidak Diaktifkan. Silahkan Hubungi Admin");
			document.location="../index.php?page=login&error=1";
		</script>
	<?php }
}
?>

	<div class="col-md-8 articles" id="site-content">
      <article class="posts">
      <h3 class="title-post">LogIn Admin</h3>
      <div class="meta-post"></div>
      <div class="content" style="text-align:justify">
        <p>
          Silahkan masukkan Username dan Password Anda :
        </p>
        <form action="view/login.php" method="post">
		  <div class="form-group">
		    <label for="email">Username</label>
		    <input type="text" class="form-control" name="userid">
		  </div>
		  <div class="form-group">
		    <label for="pwd">Password</label>
		    <input type="password" class="form-control" name="pwd">
		  </div>
		  <div class="checkbox">
		    <label><input type="checkbox"> Remember me</label>
		  </div>
		  <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-off"></span> Masuk</button>
		  <button type="reset" class="btn btn-warning"><span class="glyphicon glyphicon-trash"></span> Batal</button>
		  <button type="reset" class="btn"><span class="glyphicon"></span> Lupa Password</button>
		</form> 
      </div>
      </article>
    </div>



