<div class="container-wrapper">
<ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="<?php if($this->uri->segment(1)=='Dashboard') echo 'active';?>">
          <a href="<?php echo site_url('Dashboard')?>">
            <i class="fa fa-home"></i><span>Dashboard</span>
          </a>
        </li>
        <li class="<?php if($this->uri->segment(1)=='Kendaraan') echo 'active';?>">
          <a href="<?php echo site_url('Kendaraan')?>">
            <i class="fa fa-truck"></i> <span>Data Kendaraan</span>
          </a>
        </li>
        <li class="<?php if($this->uri->segment(1)=='Jenis_ken') echo 'active';?>">
          <a href="<?php echo site_url('Jenis_ken')?>">
            <i class="fa fa-car"></i> <span>Jenis Kendaraan</span>
          </a>
        </li>
        <li class="<?php if($this->uri->segment(1)=='Alat') echo 'active';?>">
          <a href="<?php echo site_url('Alat')?>">
            <i class="fa fa-gavel"></i> <span>Data Alat</span>
          </a>
        </li>
        <li class="<?php if($this->uri->segment(1)=='Jenis_alt') echo 'active';?>">
          <a href="<?php echo site_url('Jenis_alt')?>">
            <i class="fa fa-wrench"></i> <span>Jenis Alat</span>
          </a>
        </li>
        <li class="<?php if($this->uri->segment(1)=='Trans_ken') echo 'active';?>">
          <a href="<?php echo site_url('Trans_ken')?>">
            <i class="fa fa-wrench"></i> <span>Transaksi Kendaraan</span>
          </a>
        </li>
        <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
        <li class="header">LABELS</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
 </ul>
 </div>
