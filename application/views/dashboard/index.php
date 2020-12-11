<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Dashboard</h3>
    </div>
  </div>

  <div class="clearfix"></div>

  <div class="row">
    <div class="col-md-12">
      <div class="">
        <div class="x_content">
          <div class="row">
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats">
                <div class="icon"><i class="fa fa-file-text"></i>
                </div>
                <div class="count"><?= $total_article ?></div>
                <h3>Artikel</h3>
                <p>Jumlah Artikel</p>
              </div>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats">
                <div class="icon"><i class="fa fa-cube"></i>
                </div>
                <div class="count"><?= $total_product ?></div>

                <h3>Produk</h3>
                <p>Jumlah Produk Aktif</p>
              </div>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats">
                <div class="icon"><i class="fa fa-cube"></i>
                </div>
                <div class="count"><?= $get_total_penjualan ?></div>

                <h3>Penjualan</h3>
                <p>Jumlah penjualan</p>
              </div>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats">
                <div class="icon"><i class="fa fa-cube"></i>
                </div>
                <div class="count"><?php foreach ($get_Total_Pemasukan as $data) : ?>
                    Rp. <?= number_format($data->total, 0, ',', '.'); ?>
                  <?php endforeach ?></div>

                <h3>Pemasukan</h3>
                <p>Jumlah pemasukan</p>
              </div>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats">
                <div class="icon"><i class="fa fa-cube"></i>
                </div>
                <div class="count"><?php foreach ($get_Total_Pengeluaran as $data) : ?>
                    Rp. <?= number_format($data->total, 0, ',', '.'); ?>
                  <?php endforeach ?></div>

                <h3>Pengeluaran</h3>
                <p>Jumlah pengeluaran</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>