<h1 class="h3 mb-4 text-gray-800">Laporan penjualan</h1>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Penjualan</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Total</th>
                        <th>Status Pembayaran</th>
                        <th>Bukti</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Total</th>
                        <th>Status Pembayaran</th>
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
                            <td>
                                <div class="btn-group" role="group">
                                    <?php if ($data->payment_status == "0") { ?>
                                        <a style="color: white;" class="badge badge-danger">
                                            Belum bayar
                                        </a>
                                    <?php } elseif ($data->payment_status == "1") { ?>
                                        <a style="color: white;" class="badge badge-warning">
                                            Sudah bayar
                                        </a>
                                    <?php } elseif ($data->payment_status == "2") { ?>
                                        <a style="color: white;" class="badge badge-success">
                                            Sudah Konfirmasi
                                        </a>
                                    <?php } ?>
                                </div>
                            </td>
                            <td><img height="40" src="<?php echo base_url('./uploads/bukti/' . $data->file); ?>"></td>
                        </tr>
                    <?php endforeach ?>

                </tbody>
            </table>
        </div>
        <div class="row m-t-30">
            <div class="col-sm-12">
                <p><b>Total penjualan :</b> <?= number_format($get_total_penjualan, 0, ',', '.'); ?></p>
            </div>
        </div>
    </div>
</div>