<?php
ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL);
include "conf/config.php";
$sql = $conn->query("SELECT * FROM penyakit ORDER BY id_penyakit ASC");
?>
<div class="col-md-8 articles" id="site-content">
      <article class="posts">
      <h3 class="title-post">Daftar Jenis Penyakit</h3>
      <div class="meta-post"></div>
      <div class="content" style="text-align:justify">
        <p>
          Anda setidaknya mesti tahu cara mencegah, gejala, dan upaya untuk mengobatinya. Nah berikut ini 14 jenis penyakit ayam yang kemungkinan dapat terjadi.
        </p>
        <form action="view/coba.php" method="post">
        <table id="tabel" class="table table-bordered table-striped with-check dataTable no-footer" role="grid" aria-describedby="tabel_info">
              <thead>
                <tr>
                  <th style="width: 5%;">No</th>
                  <th style="width: 10%;">Kode</th>
                  <th>Nama Jenis Penyakit</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no=0;
                while ($r=$sql->fetch_assoc()) { $no++; ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $r['id_penyakit'];?></td>
                  <td><?php echo $r['nm_penyakit'];?></td>
                </tr>
              <?php } ?>
              
              </tbody>
            </table>
          </form>
      </div>
      </article>
    </div>

