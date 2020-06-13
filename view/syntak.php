	for($i = 1; $i<=41; $i++) {
			$sql = $conn->query("SELECT $kasus FROM inisialisasi WHERE id_gejala = 'G0$i'");
			$ndb = $sql->fetch_assoc();
			$param = $ndb[$kasus];

			if( empty($_POST["G0$i"]) ) {
			 	$nilai = 0;
			 	if($nilai == 0 && $param == 0){
					$m00++;
				}elseif($nilai == 0 && $param == 1){
					$m01++;
				}
			}else{ 
				$nilai = 1;
				if($nilai == 1 && $param == 1){
					$m11++;
				}elseif($nilai == 1 && $param == 0){
					$m10++;
				}
			}

		}