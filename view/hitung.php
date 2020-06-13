<?php
include "../conf/config.php";
$nilai = "";

if(isset($_POST)){
	$id = $_POST['id'];
	//Cari kasus yang sudah ada di database
	$sqlkasus = $conn->query("SELECT id_kasus FROM kasus");
	while($r=$sqlkasus->fetch_assoc()){
		$kasus = $r['id_kasus'];
		$m11 = 0;
		$m00 = 0;
		$m10 = 0;
		$m01 = 0;
		//Lakukan pengulangan sebanyak jumlah gejala yang ada di tabel inisialisasi. 
		for($i = 1; $i<=41; $i++) {
			$sql = $conn->query("SELECT ".$kasus." FROM inisialisasi WHERE id_gejala = 'G0$i'");
			$ndb= $sql->fetch_assoc();
			$param = $ndb[$kasus];
		
			if( empty($_POST["G0$i"]) ) { //Jika hasil ceklis gejala $i(nomor urut) tidak ada. maka beri nilai 0
			 	$nilai = 0;
			 	if($nilai == 0 && $param == 0){ //Jika nilai ceklis 0 dan nilai dari inisialisasi adalah 0
					$m00++; //maka nilai M00 akan ditambah 1
				}elseif($nilai == 0 && $param == 1){
					$m01++;
				}
			}else{ //Jika hasil ceklis gejala $i(nomor urut) ada. maka beri nilai 1
				$nilai = 1;
				if($nilai == 1 && $param == 1){
					$m11++;
				}elseif($nilai == 1 && $param == 0){
					$m10++;
				}
			}

		}

		$rumus = ($m11 + $m00) / ($m10 + $m01 + $m11 + $m00); //Rumus Simple Matching
		$hasil = $rumus;

		//Simpan ke tabel detail proses.
		$sql = $conn->query("INSERT INTO tb_detail_proses (id_proses,id_kasus,nilai) VALUES ('$id','$kasus','$hasil')");

	}

	//Mencari nilai tertinggi dari tabel detail_proses
	$tertinggi = $conn->query("SELECT id_kasus,nilai FROM tb_detail_proses WHERE id_proses = '$id' ORDER BY nilai DESC LIMIT 1");
	$d = $tertinggi->fetch_assoc();
	$tertinggi = $d['id_kasus'];

	//Mencari Solusi untuk kasus yang didapat dari nilai tertinggi
	$solusi = $conn->query("SELECT * FROM kasus WHERE id_kasus = '$tertinggi'");
	$ada = $solusi->fetch_assoc();
	$penyakit = $ada['id_penyakit'];
	$solusinya = $ada['id_solusi'];

	//Simpan ke tabel proses. selanjutnya untuk ditampilkan 
	$sqlsimpan = $conn->query("INSERT INTO tb_proses (id_proses,id_penyakit,id_solusi,idpengguna) VALUES ('$id','$penyakit','$solusinya','1')");

	if($sqlsimpan){
		header('location:../index.php?page=hasil&id='.$id); //Arahkan halaman menuju halaman hasil
	}

}
?>