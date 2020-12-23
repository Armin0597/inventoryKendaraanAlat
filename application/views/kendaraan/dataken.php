<!--modal-->
<!-- Button trigger modal -->
    <div class="row">
    <div class="col-md-10">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formModal">
    <i class="fa fa-plus-circle"></i> Data Kendaraan
    </button>
    </div>
    <div class="col-sm-2">
    <a href="<?= base_url(); ?>kendaraan/cetak" class="btn btn-primary" title="Cetak"><i class="fa fa-print"> Print Data</i></a>
    </button>
    </div>
    </div>
    <div class="modal fade" id="formModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Tambah Data</h4>
        </div>
      <div class="modal-body">
      <?= form_open_multipart('kendaraan/simpan');?>
        <form action="" method="post" id="form">
            <div class="form-group">
                <label for="nama">Merk</label>
                <input type="text" class="form-control" id="merk" name="merk" value="">
                <label for="nama">Plat Nomor</label>
                <input type="text" class="form-control" id="plat_no" name="plat_no" value="">
                <label for="nama">Jenis Kendaraan</label>
                <select name="jenis_ken" class="form-control">
                <option value="0" disabled="">-- PILIH JENIS KENDARAAN --</option>
                <?php
                  foreach ($jenis_ken->result() as $row){
                    echo "<option value=".$row->id_jenis_ken.">".$row->nama."</option>";
                  }
                ?>
                </select>
                <label for="nama">Bulan Pajak</label>
                <input type="date" class="form-control" id="bln_pajak" name="bln_pajak" value="">
                <label for="nama">Tahun Pembuatan</label>
                <input type="text" class="form-control" id="thn_pembuatan" name="thn_pembuatan" value="">
                <label for="nama">lokasi</label>
                <input type="text" class="form-control" id="lokasi" name="lokasi" value="">
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
<?php $no=0; foreach($kendaraan as $row): $no++; ?>
<div class="row">
  <div id="modal-edit<?=$row->id_kendaraan;?>" class="modal fade">
    <div class="modal-dialog">
      <form action="<?php echo site_url('kendaraan/edit'); ?>" method="post">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Data</h4>
        </div>
        <div class="modal-body">
          <input type="hidden" readonly value="<?=$row->id_kendaraan;?>" name="id_kendaraan" class="form-control" >
          <div class="form-group">
                <label for="nama">Merk</label>
                <input type="text" class="form-control" value="<?=$row->merk;?>" id="merk" name="merk" value="">
                <label for="nama">Plat Nomor</label>
                <input type="text" class="form-control" value="<?=$row->plat_no;?>" id="plat_no" name="plat_no" value="">
                <label for="nama">Jenis Kendaraan</label>
                <select name="jenis_ken" class="form-control">
                <option value="0" disabled="">-- PILIH JENIS KENDARAAN --</option>
                <?php
                  foreach ($jenis_ken->result() as $row){
                    echo "<option value=".$row->id_jenis_ken.">".$row->nama."</option>";
                  }
                ?>
                </select>
                <label for="nama">Bulan Pajak</label>
                <input type="date" class="form-control"  id="bln_pajak" name="bln_pajak" value="">
                <label for="nama">Tahun Pembuatan</label>
                <input type="text" class="form-control" id="thn_pembuatan" name="thn_pembuatan" value="">
                <label for="nama">lokasi</label>
                <input type="text" class="form-control" id="lokasi" name="lokasi" value="">
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
          <h3 class="box-title">Data Kendaraan</h3>
        </div>
      <!-- /.box-header -->
    <div class="box-body">
    <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
    <div class="row">
      <div class="col-sm-6">
        <?= form_open('kendaraan/cari');?>
          <select name="cariberdasarkan">
            <option value="">-- CARI BERDASARKAN --</option>
              <option value="merk">Merk</option>
                <option value="thn_pembuatan">Tahun pembuatan</option>
              </select>
            <input type="text" name="yangdicari" id="">
          <button class="btn btn-primary btn-xs"><i class="fa fa-search"></i></button>
        <?= form_close();?>
      </div>
    </div>
      <div class="row">
        <div class="col-sm-12">
          <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
          <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th  width="50" style="text-align:center">No.</th>
          <th  style="text-align:center">Foto</th>
          <th  style="text-align:center">Merk</th>
          <th  style="text-align:center">Plat No.</th>
          <th  style="text-align:center">Jenis</th>
          <th  style="text-align:center">Bulan Pajak</th>
          <th  style="text-align:center">Tahun Pembuatan</th>
          <th  style="text-align:center">Lokasi</th>
          <th  style="text-align:center">Status</th>
          <th  style="text-align:center">Aksi</th>
        </tr>
      </thead>
        <tbody>
          <?php
              $no = 1;
                foreach ($kendaraan as $row){
              ?>
            <tr>
              <td style="text-align:center;"><?= $no;?></td>
              <td style="text-align:center;"><img src="<?= base_url("gambar_product/".$row->gambar)?>" width="50px" height="50px"></td>
              <td style="text-align:center;"><?= $row->merk?></td>
              <td style="text-align:center;"><?= $row->plat_no?></td>
              <td style="text-align:center;"><?= $row->nama?></td>
              <td style="text-align:center;"><?= $row->bln_pajak?></td>
              <td style="text-align:center;"><?= $row->thn_pembuatan?></td>
              <td style="text-align:center;"><?= $row->lokasi?></td>
              <td style="text-align:center;"><?= $row->status_ken?></td>
              <td style="text-align:center;">
              <a data-toggle="modal" data-target="#modal-edit<?=$row->id_kendaraan;?>" data-popup="tooltip" data-placement="top" class="btn btn-success btn-sm tooltip-demo btn-xs" title="Edit"><i class="fa fa-pencil"></i></a>
              <a href="<?= base_url(); ?>kendaraan/hapus/<?= $row->id_kendaraan; ?>" class="btn btn-danger btn-sm float-right tombol-hapus btn-xs" title="Hapus"><i class="fa fa-trash"></i></a>
              </td>
              </tr>
            <?php $no++;}?>
              </tbody>
         </table>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-8">
            </div>
            <div class="col-sm-4">
              <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                <ul class="pagination">
                  <li class="paginate_button previous disabled" id="example1_previous"><a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0">Previous</a>
                </li>
                <li class="paginate_button active">
                  <a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0">1</a>
                </li>
                <li class="paginate_button ">
                  <a href="#" aria-controls="example1" data-dt-idx="2" tabindex="0">2</a>
                </li>
                <li class="paginate_button ">
                  <a href="#" aria-controls="example1" data-dt-idx="3" tabindex="0">3</a>
                </li>
                <li class="paginate_button ">
                  <a href="#" aria-controls="example1" data-dt-idx="4" tabindex="0">4</a>
                </li>
                <li class="paginate_button ">
                  <a href="#" aria-controls="example1" data-dt-idx="5" tabindex="0">5</a>
                </li>
                <li class="paginate_button ">
                  <a href="#" aria-controls="example1" data-dt-idx="6" tabindex="0">6</a>
                </li>
                <li class="paginate_button next" id="example1_next">
                  <a href="#" aria-controls="example1" data-dt-idx="7" tabindex="0">Next</a>
                </li>
              </ul>
            </div>
          </div>
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