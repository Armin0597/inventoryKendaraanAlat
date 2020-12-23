    <!--modal-->
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formModal">
    <i class="fa fa-plus-circle"></i> Jenis Kendaraan
    </button>
    <div class="modal fade" id="formModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Tambah Data</h4>
        </div>
      <div class="modal-body">
        <form action="<?= base_url('jenis_alt/simpan')?>" method="post" id="form">
            <div class="form-group">
                <label for="nama">Jenis Kendaraan</label>
                <input type="text" class="form-control" id="nama" name="nama" value="">
                <div class="form-group">
                <label>Gambar</label>
                <input type="file" name="userfile" > 
            </div>
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
<!--/modal-->
<!-- ModalEdit -->
<!-- Modal Edit -->
<?php $no=0; foreach($jenis_alat as $row): $no++; ?>
<div class="row">
  <div id="modal-edit<?=$row->id_jenis_alt;?>" class="modal fade">
    <div class="modal-dialog">
    <?= form_open_multipart('jenis_alt/edit');?>
      <form action="<" method="post">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Data</h4>
        </div>
        <div class="modal-body">
          <input type="hidden" readonly value="<?=$row->id_jenis_alt;?>" name="id_jenis_alt" class="form-control" >
          <div class="form-group">
            <label>Jenis Alat</label>
            <input type="text" name="nama" autocomplete="off" value="<?=$row->nama;?>" required placeholder="Masukkan jenis kendaraan" class="form-control">
          </div>   
          <div class="form-group">
                <label>Gambar</label>
                <input type="file" name="userfile" > 
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
<!-- ModalEdit -->
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash');?>"></div>
  <?php if ($this->session->flashdata('flash') ) : ?>
  <?php endif; ?>
  <!--table-->
<div class="container">
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
          <h3 class="box-title">Data Jenis Alat</h3>
        </div>
      <!-- /.box-header -->
    <div class="box-body">
    <table id="example1" class="table table-bordered table-striped">
    <thead>
    <tr>
        <th scope="col" width="100" style="text-align:center">No.</th>
        <th scope="col" style="text-align:center">Jenis</th>
        <th scope="col" style="text-align:center">Gambar</th>
        <th style="text-align:center;" >Aksi</th>
    </tr>
</thead>
    <tbody>
        <?php
            $no = 1;
            foreach ($jenis_alat as $row){
        ?>
    <tr>
        <td style="text-align:center;"><?= $no;?></td>
        <td style="text-align:center;"><?= $row->nama?></td>
        <td style="text-align:center;"><img src="<?= base_url("gambar_product/".$row->gambar)?>" width="50px" height="50px"></td>
        <td style="text-align:center;">
        <a data-toggle="modal" data-target="#modal-edit<?=$row->id_jenis_alt;?>" data-popup="tooltip" data-placement="top" class="btn btn-success btn-sm tooltip-demo btn-xs" title="Edit"><i class="fa fa-pencil"></i></a>
        <a href="<?= base_url(); ?>jenis_alt/hapus/<?= $row->id_jenis_alt; ?>" class="btn btn-danger btn-sm float-right tombol-hapus btn-xs" title="Hapus"><i class="fa fa-trash"></i></a>
    </td>
    </tr>
        <?php $no++;}?>

    </tbody>
          </table>
      </div>
 <!-- /.box-body -->
    </div>
 <!-- /.box -->
  </div>
<!-- /.col -->
 </div>
<!-- /.row -->
</section>
</div>
 <!--/table-->
<!--/table-->
    