<div class="container">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3><i class="fa fa-file-text"></i> Pengeluaran</h3>
            </div>

        </div>

        <div class="clearfix">

        </div>
        <hr>
        <h3 style="text-align:center;">
            <?php $no = 1;
            foreach ($saldoku as $data) : ?>
                <b>Total Pengeluaran :</b> Rp. <?= number_format($data->total, 0, ',', '.'); ?>
            <?php endforeach ?>
        </h3>
        <br>
        <!-- <div style="text-align:center;" class="row">
            <form action="<?= base_url('laporan/pengeluaran/laporan_pengeluaran_pdf'); ?>" method="POST" class="form-inline">
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

        </div> -->
        <div style="text-align: center;" class="row">
            <form action="<?= base_url('laporan/pengeluaran/laporan_pengeluaran'); ?>" method="POST" class="form-inline">
                <div class="form-group mb-2">
                    <label for="exampleFormControlSelect1">Bulan</label>
                    <select name="bulan" class="form-control" id="exampleFormControlSelect1">
                        <option value="01">Januari</option>
                        <option value="02">Februari</option>
                        <option value="03">Maret</option>
                        <option value="04">April</option>
                        <option value="05">Mei</option>
                        <option value="06">Juni</option>
                        <option value="07">Juli</option>
                        <option value="08">Agustus</option>
                        <option value="09">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                    </select>

                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <label for="exampleFormControlSelect1">Tahun</label>
                    <select name="tahun" class="form-control" id="exampleFormControlSelect1">
                        <option>2020</option>
                        <option>2021</option>
                        <option>2022</option>
                    </select>
                </div>
                <button type="submit" class="au-btn btn-danger m-b-20"><i class="far fa-file-pdf"></i> Show</button>
            </form>

        </div>
        <br>
        <div class="table-responsive m-b-40">
            <table class="table table-borderless table-data3" id="datatable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Quantity</th>
                        <th>Tanggal</th>
                        <th>Total Harga</th>
                        <th>Foto</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($pengeluaran as $kat) : ?>

                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $kat->name; ?></td>
                            <td><?= $kat->quantity; ?></td>
                            <td><?= $kat->updated_at; ?></td>
                            <td>Rp. <?= number_format($kat->price, 0, ',', '.'); ?></td>
                            <td>
                                <img class="img-thumbnail" width="50" src="<?= base_url('./uploads/produk/' . $kat->file); ?>" alt="">
                            </td>
                        </tr>

                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
        <!-- END DATA TABLE-->


    </div>
</div>