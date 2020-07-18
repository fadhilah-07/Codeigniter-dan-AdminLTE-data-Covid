<section class="content-header">
      <h1>
        Data COVID-19
        <small>JEPARA</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <div class="box-title"></div>
              <form method="POST" action="<?php echo base_url('Covid/saveimport') ?>" enctype="multipart/form-data">
              <input type="file" name="file">
              <button type="submit" name="button" class="btn btn-warning">Import Excel</button>
              </form>
                <table class="table"  id="tabelcovid">
                  <div class="pull-right">
                    <button class="btn btn-success" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i>Tambah Data</button>
                  </div>
                  <div class="navbar-right">
                      <form class="" action="<?php echo base_url('Covid/export1') ?>" method="post">
                        <button type="submit" name="button" class="btn btn-primary"><i class="fa fa-export">Export Excel</i></button>
                      </form>
                      <div class="navbar-right">
                      <form class="" action="<?php echo base_url('Covid/pdf') ?>" method="post">
                        <button type="submit" name="button" class="btn btn-warning"><i class="fa fa-export"></i><i class="fa fa-file">Export PDF</i></button>
                      </form>
                  </div>
                  </div>
                <table class="table table-striped" id="mytable">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Kecamatan</th>
                    <th>PP</th>
                    <th>OPD</th>
                    <th>PDP</th>
                    <th>Positif</th>
                    <th>Tanggal Pengambilan</th>
                    <th>Action</th>
                  </tr>
                  <?php 
                  $no = 1;
                  foreach ($tb_covid as $c): ?>
                    <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $c ->kecamatan ?></td>
                      <td><?php echo $c ->pp?></td>
                      <td><?php echo $c ->odp?></td>
                      <td><?php echo $c ->pdp?></td>
                      <td><?php echo $c ->positif?></td>
                      <td><?php echo $c ->tanggal_pengambilan?></td>
                      <td onclick="javascript: return confirm('Anda Yakin ingin hapus?')"><?php echo anchor('Covid/hapus/'.$c->id, '<div class="btn btn-danger btn-sm">Hapus</i></div>') ?></td>
                      <td><?php echo anchor('Covid/edit_datacovid/'.$c->id,'<div class="btn btn-primary btn-sm">Edit</i></div>') ?></td>
                    </tr>
                  <?php endforeach; ?>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Form Input data Covid Jepara</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post"action="<?php echo base_url().'Covid/tambah_data'; ?>">
          <div class="form-group">
            <label>Kecamatan</label>
            <input type="text" name="kecamatan" placeholder="Tahunan" class="form-control">
          </div>
            <div class="form-group">
                <label>PP</label>
                <input type="textarea" name="pp" placeholder="100" class="form-control">
            </div>
            <div class="form-group">
                <label>ODP</label>
                <input type="textarea" name="odp" placeholder="100" class="form-control">
            </div>
            <div class='form-group'>
                <label>PDP</label>
                <input type="textarea" name="pdp" placeholder="100" class="form-control">
            </div>

            <div class="form-group">
                <label>Positif</label>
                <input type="text" name="positif" placeholder="100" class="form-control">
            </div>
             <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
               <button type="submit" class="btn btn-success">Tambah</button>
           </form>
       </div>
   </div>
</div>