<div class="container">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3><i class="fa fa-file-text"></i> Pemasukan</h3>
            </div>

        </div>

        <div class="clearfix">

        </div>
        <hr>
        <div class="row">
            <form action="<?= base_url('laporan/pemasukan/laporan_pemasukan_pdf'); ?>" method="POST" class="form-inline">
                <div class="form-group mb-2">
                    <label for="dari">Dari </label>
                    <input type="datetime-local" class="form-control ml-2" id="dari" name="keyword1">
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <label for="sampai">Sampai </label>
                    <input type="datetime-local" class="form-control ml-2" id="sampai" name="keyword2">
                </div>
                <button type="submit" class="au-btn btn-danger m-b-20"><i class="far fa-file-pdf"></i> cetak</button>
            </form>

        </div>
        <div class="table-responsive m-b-40">
            <table class="table table-borderless table-data3" id="datatable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Total Harga</th>
                        <th>Bukti</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($pemasukan as $kat) : ?>

                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $kat->updated_at; ?></td>
                            <td>Rp. <?= number_format($kat->total_price, 0, ',', '.'); ?></td>
                            <td>
                                <img class="img-thumbnail" width="50" src="<?= base_url('./uploads/bukti/' . $kat->file); ?>" alt="">
                            </td>
                        </tr>

                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
        <!-- END DATA TABLE-->

        <div class="row m-t-30">
            <div class="col-sm-12">
                <?php $no = 1;
                foreach ($saldoku as $data) : ?>
                    <p><b>Total Pemasukan :</b> Rp. <?= number_format($data->total, 0, ',', '.'); ?></p>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</div>