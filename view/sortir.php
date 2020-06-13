<?php
ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL);
include "conf/config.php";
$sql = $conn->query("SELECT * FROM gejala ORDER BY id_gejala ASC");
?>
<div class="col-md-8 articles" id="site-content">
      <article class="posts">
      <h3 class="title-post">Nomor Konsultasi Anda : <?php echo date('Ymdhis');?></h3>
      <div class="meta-post"></div>
      <div class="content" style="text-align:justify">
        <p>
          Kami akan mencoba menilai jenis penyakit apa yang di derita oleh ayam. Sebelum mendapatkan hasilnya, anda di perkenankan mengisi formulir dibawah ini. Silahkan lakukan Checklis pada gejala-gejala yang dialami oleh ayam.
        </p>
        <form action="view/hitung.php" method="post">
        <input type="hidden" name="id" id="id" value="<?php echo date('Ymdhis');?>">
        <table id="tabel" class="table table-bordered table-striped with-check dataTable no-footer" role="grid" aria-describedby="tabel_info">
              <thead>
                <tr>
                  <th colspan="2" class="text-center">SILAHKAN CHECKLIST PADA GEJALA - GEJALA BERIKUT INI SESUAI DENGAN KONDISI AYAM YANG SEDANG SAKIT</th>
                 
                </tr>
              </thead>
              <tbody>
                <?php
                $no=0;
                while ($r=$sql->fetch_assoc()) { $no++; ?>
                <tr>
                  <td> <?php echo $r['nm_gejala'];?> </td>
				  <td style="width:2%"><input type="checkbox" name="<?php echo $r['id_gejala'];?>" class="chk" value="1"></td>
                  <!--
                  <td><?php echo $r['id_gejala'];?></td>
                  -->
                  
                 
                </tr>
              <?php } ?>
              <tr><td colspan="4"><button type="submit" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-search"></span> Lanjutkan Proses dan Lihat Hasil</button> <button type="reset" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span> Reset</button></td></tr>
              </tbody>
            </table>
          </form>
      </div>
      </article>
    </div>

