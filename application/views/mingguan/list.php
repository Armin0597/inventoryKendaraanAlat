<link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/skins/_all-skins.min.css">
<link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/AdminLTE.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formModal"><i class="fa fa-plus-circle"></i>
    Tambah Data
</button>
<br><br>
<div class="box mt-3">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash');?>"></div>
    <?php if ($this->session->flashdata('flash') ) : ?>
    <?php endif; ?>
        <div class="panel panel-default">
                  
              <div class="panel-heading">
                  <?= form_open("mingguan/cari"); ?>
                  <select name="cariberdasarkan" class="float-right">
                    <option value="">-- Cari Berdasarkan --</option>
                    <option value="minggu_ke">MINGGU-KE</option>
                    <option value="periode">PERIODE</option>
                  </select>
                  <input type="text" name="yangdicari" id="">
                  <button type="submit" class="btn btn-primary btn-xs"><i class= "fa fa-search"></i></button>
                  <?= form_close(); ?>

                  <?php
                    if(isset($jumlah)){
                      if ($cariberdasarkan=="") {
                        echo "Jumlah pencarian <b>'" . $yangdicari ."'</b> : ". $jumlah;
                      }else {
                        echo "Jumlah pencarian <b>'" . $cariberdasarkan . "=" . $yangdicari ."'</b> : ". $jumlah;
                      }
                    }
                    ?>
              </div>
              <div class="panel-body">
                 <div class="table-responsive">                                 
                    <table class="table table-bordered table-striped data">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>MINGGU-KE</th>
                                <th>PERIODE</th>
                                <th style="text-align:center;">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($mingguan as $row){
                            ?>
                            <tr>
                                <td><?= $no;?></td>
                                <td><?= $row->minggu_ke;?></td>
                                <td><?= $row->periode;?></td>
                                <td style="text-align:center;">
                                    <a data-toggle="modal" data-target="#modal-edit<?=$row->id_minggu;?>" data-popup="tooltip" data-placement="top" class="btn btn-success btn-sm tooltip-demo" title="Edit"><i class="fa fa-pencil"></i></a>
                                    <a href="<?= base_url(); ?>mingguan/hapus/<?= $row->id_minggu; ?>" class="btn btn-danger btn-sm float-right tombol-hapus" title="Hapus"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php $no++ ;} ?>
                        </tbody>
                    </table>
                </div>    
            </div>
        </div>
    </div>
<!-- Modal Add -->
<div class="modal fade" id="formModal">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Tambah Data</h4>
        </div>
      <div class="modal-body">
        <form action="<?= base_url('mingguan/simpan')?>" method="post" id="form">
            <div class="form-group">
                <label for="minggu_ke">Minggu-ke</label>
                <input type="text" class="form-control" id="minggu_ke" name="minggu_ke" value="">
            </div>

            <div class="form-group">
                <label for="periode">Periode</label>
                <input type="text" class="form-control" id="periode" name="periode" value="">
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Tambah Data</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Edit -->
<?php $no=0; foreach($mingguan as $row): $no++; ?>
<div class="row">
  <div id="modal-edit<?=$row->id_minggu;?>" class="modal fade">
    <div class="modal-dialog">
      <form action="<?php echo site_url('Mingguan/edit'); ?>" method="post">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Data</h4>
        </div>
        <div class="modal-body">
          <input type="hidden" readonly value="<?=$row->id_minggu;?>" name="id_minggu" class="form-control" >
          <div class="form-group">
            <label>Minggu_ke</label>
            <input type="text" name="minggu_ke" autocomplete="off" value="<?=$row->minggu_ke;?>" required placeholder="Masukkan minggu_ke" class="form-control">
          </div>
          <div class="form-group">
            <label>Periode</label>
            <input type="text" name="periode" autocomplete="off" value="<?=$row->periode;?>" required placeholder="Masukkan periode" class="form-control">
          </div>                  
        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success"><i class="icon-pencil5"></i> Edit</button>
          </div>
        </form>
    </div>
  </div>
</div>
<?php endforeach; ?>
