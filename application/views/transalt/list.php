<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formModal">
    <i class="fa fa-plus-circle"></i> Transaksi
    </button>
<!--Modal tambah-->
<div class="modal fade" id="formModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Tambah Transaksi</h4>
        </div>
      <div class="modal-body">
        <form action="<?= base_url('trans_alt/simpan')?>" method="post" id="form">
            <div class="form-group">
                <div class="row">
                <div class="col-sm-4">
                <label for="nama">Merk</label>
                <select name="merk" class="form-control" autofocus>
                <option value="0" disabled="">-- PILIH ALAT --</option>
                <?php
                  foreach ($alat->result() as $row){
                    echo "<option value=".$row->id_alat.">".$row->merk."</option>";
                  }
                ?>
                </select>
                </div>
                <div class="col-sm-4">
                <label for="nama">Nama Peminjam</label>
                <input type="text" class="form-control" id="nama_peminjam" name="nama_peminjam" value="">
                </div>
                <div class="col-sm-4">
                <label for="nama">No.Telepon</label>
                <input type="text" class="form-control" id="no_telp" name="no_telp" value="">
                </div>
                <div class="col-sm-6">
                <label for="nama">Tanggal Pinjam</label>
                <input type="date" class="form-control" id="tgl_pinjam" name="tgl_pinjam" value="">
                </div>
                <div class="col-sm-6">
                <label for="nama">Tanggal kembali</label>
                <input type="date" class="form-control" id="tgl_kembali" name="tgl_kembali" value="">
                </div>
                
                
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
<!--/Modal tambah-->
<!-- Modal Edit -->
<?php $no=0; foreach($transaksi_alt as $row): $no++; ?>
  <div id="modal-edit<?=$row->id_trans_alt;?>" class="modal fade">
    <div class="modal-dialog">
    <form action="<?= base_url('trans_alt/edit')?>" method="post" id="form">
        <div class="modal-content">
            <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Transaksi</h4>
        </div>
    <div class="modal-body">
        <input type="hidden" readonly value="<?=$row->id_trans_alt;?>" name="id_trans_alt" class="form-control" >
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-7">
                        <label for="merk">Merk</label>
                        <select name="merk" class="form-control">
                        <option value="0" disabled="">-- PILIH KENDARAAN --</option>
                        <?php
                            foreach ($alat->result() as $row){
                                echo "<option value=".$row->id_alat.">".$row->merk."</option>";
                            }
                        ?>
                        </select>
                    </div>
                    <div class="col-sm-5">
                        <label for="tgl_pinjam">Tanggal Pinjam</label>
                        <input type="date" class="form-control" id="tgl_pinjamEdt" name="tgl_pinjam" value="">
                        <label for="nama">Tanggal kembali</label>
                        <input type="date" class="form-control" id="tgl_kembaliEdt" name="tgl_kembali" value="">
                    </div>
                    <div class="col-sm-7">
                        <label for="nama_peminjam">Nama Peminjam</label>
                        <input type="text" class="form-control" id="nama_peminjam" name="nama_peminjam">
                    </div>
                    <div class="col-sm-5">
                        <label for="no_telp">No.Telepon</label>
                        <input type="text" class="form-control" id="no_telp" name="no_telp">
                    </div>
                </div>
            </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Edit</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>
<!-- ModalEdit -->
<!--table-->
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash');?>"></div>
  <?php if ($this->session->flashdata('flash') ) : ?>
  <?php endif; ?>
<div class="container-wrapper">
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
          <h3 class="box-title">Transaksi Alat</h3>
        </div>
      <!-- /.box-header -->
    <div class="box-body">
    <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
    <div class="row">
      <div class="col-sm-6">
      </div>
    </div>
      <div class="row">
        <div class="col-sm-12">
          <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
          <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th  width="60" style="text-align:center">No.</th>
          <th  style="text-align:center">Merk</th>
          <th  style="text-align:center">Peminjam</th>
          <th  style="text-align:center">No.telp</th>
          <th  style="text-align:center">Tanggal Pinjam</th>
          <th  style="text-align:center">Tanggal Kembali</th>
          <th  style="text-align:center">Transaksi status</th>
          <th  style="text-align:center">Opsi</th>
        </tr>
      </thead>
        <tbody>
        <?php
              $no = 1;
                foreach ($transaksi_alt as $row){
              ?>
            <tr>
              <td style="text-align:center;"><?= $no;?></td>
              <td style="text-align:center;"><?= $row->merk?></td>
              <td style="text-align:center;"><?= $row->nama_peminjam?></td>
              <td style="text-align:center;"><?= $row->no_telp?></td>
              <td style="text-align:center;"><?= $row->tgl_pinjam?></td>
              <td style="text-align:center;"><?= $row->tgl_kembali?></td>
              <td style="text-align:center;"><?= $row->transaksi_status?></td>
              <td style="text-align:center;">
              <a data-toggle="modal" data-target="#modal-edit<?=$row->id_trans_alt;?>" data-popup="tooltip" data-placement="top" class="btn btn-success btn-sm tooltip-demo btn-xs" title="Edit"><i class="fa fa-pencil"></i></a>
              <a href="<?= base_url(); ?>trans_alt/selesai/<?= $row->id_trans_alt; ?>" class="btn btn-primary btn-sm tooltip-demo btn-xs" title="Edit"><i class=""></i>Pengembalian</a>
              </td>
              </tr>
            <?php $no++;}?>
        </tbody>
    </table>
        </div>
    </div>
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
<script>
      var input = document.getElementById("tgl_pinjam"),
      		input2 = document.getElementById("tgl_kembali"),
          input3 = document.getElementById("tgl_pinjamEdt"),
          input4 = document.getElementById("tgl_kembaliEdt");
      var today = new Date();
      var day = today.getDate();
      // Set month to string to add leading 0
      var mon = new String(today.getMonth()+1); //January is 0!
      var yr = today.getFullYear();
      
        if(mon.length < 2) { mon = "0" + mon; }
      
        var date = new String( yr + '-' + mon + '-' + day );
      
      input.disabled = false; 
      input.setAttribute('min', date);
      input2.setAttribute('min', date);
      input3.setAttribute('min', date);
      input4.setAttribute('min', date);
</script>