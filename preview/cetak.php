<?php 
include "../conf/config.php";
$id = $_GET['id'];
$sql2 = $conn->query("SELECT a.id_kasus,a.nilai, b.id_proses,b.tgl_proses,b.id_solusi, c.nm_penyakit, d.nm_solusi FROM tb_detail_proses a JOIN tb_proses b ON a.id_proses = b.id_proses JOIN penyakit c ON b.id_penyakit = c.id_penyakit JOIN solusi d ON b.id_solusi = d.id_solusi WHERE b.id_proses = '$id' ORDER BY a.nilai DESC LIMIT 1 ");
$hasil = $sql2->fetch_assoc();
?>
<html>
<head>
<title>Sistem Pakar Diagnosa Penyakit Ayam Kampung</title>
<style type="text/css">
.font {font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
.container {
	min-width: 310px;
	max-width: 800px;
	height: 400px;
	margin: 0 auto
}
</style>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
</head>
<body>					
<table border="0" align="center" style="width:90%">
  <tr>
    <td height="60"><table style="width:100%" width="200">
      <tr>
        <td align="center"><h3>SISTEM PAKAR DIAGNOSA PENYAKIT AYAM KAMPUNG<br />
        Metode Simple Matching Coefficient Similarity</h3></td>
        </tr>
      <tr>
        <td><hr /></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="16" align="center" valign="middle"><p class="font">&nbsp;</p></td>
  </tr>
  <tr>
    <td height="19">
    <table cellpadding="3" cellspacing="0" style="width:100%" border=1>
    	<thead>
	    	<tr>
	    	  <th align="left" style="width:25%">ID : <?php echo $_GET['id'];?></th>
	    	  <th align="left">TANGGAL KONSULTASI : <?php echo $hasil['tgl_proses'];?> </th>
    	  </tr>
	    	<tr>
	    		<th width="33%" align="left" style="width:25%">NAMA PENYAKIT</th>
	    		<th width="67%" align="left"><?php echo strtoupper($hasil['nm_penyakit']);?></th>
	    	</tr>
	    	<tr>
	    		<th align="left">SOLUSI YANG DIBERIKAN</th>
	    		<th align="left"><?php echo strtoupper($hasil['nm_solusi']);?></th>
	    	</tr>
    	</thead>
    </table>
	</br>
	</br>
	</br>
	</br>
	</br>
	</br>
	</br>
	</br>
	<div align="right" style="margin-right:90px; font-weight:600;">
	Pasir Pengaraian, <?php echo $hasil['tgl_proses'];?> </th>
	</br>
	</br>
	</br>
	</br>
	</br>
	Admin
	</div>
    
    </td>
  </tr>
</table>

</body>
</html>

<script type="text/javascript">
setTimeout(function(){
	window.print();
	window.onfocus=function(){ window.close();}
}, 3000);
</script>
