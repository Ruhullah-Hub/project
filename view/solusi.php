<?php
ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL);
if(isset($_POST['nama'])){
  include "../conf/config.php";
  $kode = $_POST['kode'];
  $nama = $_POST['nama'];

  $simpan = $conn->query("UPDATE solusi SET nm_solusi='$nama' WHERE id_solusi='$kode'");
  header('location:../index.php?page=solusi');
}

if(isset($_SESSION['admin'])) {
include "conf/config.php";
$sql = $conn->query("SELECT * FROM solusi ORDER BY id_solusi ASC");

?>
  <div class="col-md-8 articles" id="site-content">
      <article class="posts">
      <h3 class="title-post">Data Master Solusi</h3>
      <div class="meta-post"></div>
      <div class="content" style="text-align:justify">
        <form action="view/coba.php" method="post">
        <table id="tabel" class="table table-bordered table-striped with-check dataTable no-footer" role="grid" aria-describedby="tabel_info">
              <thead>
                <tr>
                  <th style="width: 5%;">No</th>
                  <th style="width: 10%;">Kode</th>
                  <th>Nama Solusi</th>
                  <th style="width: 5%;">Ubah</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no=0;
                while ($r=$sql->fetch_assoc()) { $no++; ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $r['id_solusi'];?></td>
                  <td><?php echo $r['nm_solusi'];?></td>
                  <th class="text-center"><a href="#" class="edit" data-toggle="modal" data-target="#edit"
                    data-kode="<?php echo $r['id_solusi'];?>"
                    data-nama="<?php echo $r['nm_solusi'];?>"
                    ><span class="glyphicon glyphicon-edit"></span></a></th>
                </tr>
              <?php } ?>
              
              </tbody>
            </table>
          </form>
      </div>
      </article>
    </div>

<form action="view/solusi.php" method="post">
<div id="edit" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ubah Data Solusi</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="email">Kode Solusi</label>
          <input type="text" class="form-control" name="kode" id="kode" readonly="true">
        </div>
        <div class="form-group">
          <label for="pwd">Nama Solusi</label>
          <input type="text" class="form-control" name="nama" id="nama" required="true">
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
</form>

<script src="js/custom/solusi.js"></script>

<?php } else {
  ?>
  <script>
    alert("Maaf, Anda tidak dapat melakukan akses pada halaman ini.");
    document.location = "./";
  </script>
  <?php
}
?>