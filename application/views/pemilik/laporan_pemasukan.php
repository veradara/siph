<h1 class="h3 mb-4 text-gray-800">Laporan Pemasukan</h1>
<div class="row">
    <form action="<?= base_url('pemilik/pemilik/laporan_pemasukan_pdf'); ?>" method="POST" class="form-inline">
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
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data pemasukan</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Total</th>
                        <th>Bukti</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Total</th>
                        <th>Bukti</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php $no = 1;
                    foreach ($checkouts_selesai as $data) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $data->updated_at ?></td>
                            <td>Rp. <?= number_format($data->total_price, 0, ',', '.'); ?></td>
                            <td><img height="40" src="<?php echo base_url('./uploads/bukti/' . $data->file); ?>"></td>
                        </tr>
                    <?php endforeach ?>

                </tbody>
            </table>
        </div>
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