<?php
ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL);
include "conf/config.php";
$sql = $conn->query("SELECT a.id_proses, b.nm_penyakit, c.nm_solusi FROM tb_proses a LEFT JOIN penyakit b ON a.id_penyakit = b.id_penyakit LEFT JOIN solusi c ON a.id_solusi = c.id_solusi ORDER BY a.id_proses DESC");
?>	
		<div class="col-md-8 articles" id="site-content">
			<article class="posts">
			<h3 class="title-post">Daftar Riwayat Konsultasi</h3>
			<div class="meta-post"></div>
			<div class="content" style="text-align:justify">
				<table id="tabel" class="table table-bordered table-striped with-check dataTable no-footer" role="grid" aria-describedby="tabel_info">
              <thead>
                <tr>
                  <th style="width: 5%;">No</th>
                  <th style="width: 10%;">No Konsultasi</th>
                  <th>Hasil Konsultasi</th>
                  <th>Cetak</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no=0;
                while ($r=$sql->fetch_assoc()) { $no++; ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $r['id_proses'];?></td>
                  <td>Penyakit :<?php echo $r['nm_penyakit'];?><br />
                  	  Solusi : <?php echo $r['nm_solusi'];?></td>
                  <td class="text-center"><a href="preview/cetak.php?id=<?php echo $r['id_proses'];?>" target="_blank"><span class="glyphicon glyphicon-print"></span></a></td>
                </tr>
              <?php } ?>
              
              </tbody>
            </table>
			</div>
			</article>
		</div>



    