 <?php   
include "conf/config.php";
$id = $_GET['id'];
$sql = $conn->query("SELECT a.id_kasus,a.nilai, b.id_penyakit,c.nm_penyakit FROM tb_detail_proses a RIGHT JOIN kasus b ON a.id_kasus = b.id_kasus RIGHT JOIN penyakit c ON b.id_penyakit = c.id_penyakit WHERE a.id_proses = '$id' ORDER BY nilai DESC LIMIT 3");

?>

<div class="col-md-8 articles" id="site-content">
  <article class="posts">
  <h3 class="title-post">Hasil Diagnosa : <?php echo $_GET['id'];?></h3>
  <div class="meta-post"></div>
  <div class="content" style="text-align:justify">
    <p>
      Dari gejala-gejala yang anda sebutkan, Didapatkan 3 kemungkinan dan persentase sebagai berikut :
    </p>
    <table id="tabel" class="table table-bordered table-striped with-check dataTable no-footer" role="grid" aria-describedby="tabel_info">
          <thead>
            <tr>
              <th style="width: 1%;">No</th>
              <th>Kemungkinan Penyakit</th>
              <th style="width: 5%;">Nilai</th>
              <th style="width: 5%;">Persentase</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no=0;
            while ($r=$sql->fetch_assoc()) { 
            	$no++; 
            	?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $r['nm_penyakit'];?></td>
              <td><?php echo $r['nilai'];?></td>
              <td class="text-center"><?php echo number_format($r['nilai']*100);?>%</td>
            </tr>
          <?php } ?>
          
          </tbody>
        </table>
    <?php 
    $sql2 = $conn->query("SELECT a.id_kasus,a.nilai, b.id_proses,b.id_solusi, c.nm_penyakit, d.nm_solusi FROM tb_detail_proses a JOIN tb_proses b ON a.id_proses = b.id_proses JOIN penyakit c ON b.id_penyakit = c.id_penyakit JOIN solusi d ON b.id_solusi = d.id_solusi WHERE b.id_proses = '$id' ORDER BY a.nilai DESC LIMIT 1 ");
    $hasil = $sql2->fetch_assoc();
    ?>
    <p>Dari 3 kemungkinan diatas, didapatlah 1 hasil tertinggi dengan kemungkinan pada <b>Nomor 1 atau Nomor 2</b> Jika hasilnya sama. Dengan Persentase keakuratan <font color="red"><b><?php echo number_format($hasil['nilai'],2)*100;?>%</b></font>, yaitu :</p>
    <table id="tabel" class="table table-bordered table-striped with-check dataTable no-footer" role="grid" aria-describedby="tabel_info">
    	<thead>
	    	<tr>
	    		<th style="width:25%">NAMA PENYAKIT</th>
	    		<th><?php echo strtoupper($hasil['nm_penyakit']);?></th>
	    	</tr>
	    	<tr>
	    		<th>SOLUSI YANG DIBERIKAN</th>
	    		<th><?php echo strtoupper($hasil['nm_solusi']);?></th>
	    	</tr>
    	</thead>
    	<tbody>
    		<tr>
    			<td colspan="2">
            <a type="button" href='preview/cetak.php?id=<?php echo $id;?>' target='_blank' class="btn btn-success btn-sm"><span class="glyphicon glyphicon-print"></span> Cetak Hasil</a>
            <button type="button" onclick="location.href='index.php?page=sortir';" class="btn btn-primary btn-sm pull-right"><span class="glyphicon glyphicon-search"></span> Masih belum yakin dan ingin Konsultasi Kembali ?</button> </td>
    		</tr>
    	</tbody>
    </table>
  </div>
  </article>
</div>

