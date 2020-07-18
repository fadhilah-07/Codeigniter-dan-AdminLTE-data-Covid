 <!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tabel Covid</title>
  </head>
  <body>
    <div class="content-wrapper">
        <section class="content">
            <?php foreach($Covid as $c) { ?>
                <form action="<?php echo base_url().'Covid/update'; ?>" method="post">
                    <div class="form-group">
                    <label>Id</label>
                    <input type="text" name="id" class="form-control" value="<?php echo $c->id ?>" readonly>
                  </div>
                  <div class="form-group">
                    <label>Kecamatan</label>
                    <input type="text" name="kecamatan" placeholder="Tahunan"  class="form-control" value="<?php echo $c->kecamatan ?>">
                  </div>
                    <div class="form-group">
                        <label>Pelaku Perjalanan (PP)</label>
                        <input type="text" name="pp" placeholder="100" class="form-control" value="<?php echo $c->pp ?>">
                    </div>
                    <div class="form-group">
                        <label>Orang Dalam Pengawasan (ODP)</label>
                        <input type="text" name="odp" placeholder="100" class="form-control" value="<?php echo $c->odp ?>">
                    </div>
                    <div class="form-group">
                        <label>Pasien dalam Pengawasan (PDP)</label>
                        <input type="text" name="pdp" placeholder="100"  class="form-control" value="<?php echo $c->pdp ?>">
                    </div>
                    <div class="form-group">
                        <label>Positif Covid-19</label>
                        <input type="text" name="positif" placeholder="100" class="form-control" value="<?php echo $c->positif ?>">
                    </div>
                    <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
        <?php } ?>
    </section>
</div>
