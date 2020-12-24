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
        <h3 style="text-align: center;">
            <?php $no = 1;
            foreach ($saldoku as $data) : ?>
                <p><b>Total Pemasukan :</b> Rp. <?= number_format($data->total, 0, ',', '.'); ?></p>
            <?php endforeach ?>

        </h3>
        <br>
        <!-- <div style="text-align: center;" class="row">
            <form action="<?= base_url('laporan/pemasukan/laporan_pemasukan'); ?>" method="POST" class="form-inline">
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
            <form action="<?= base_url('laporan/pemasukan/laporan_pemasukan'); ?>" method="POST" class="form-inline">
                <div class="form-group mb-2">
                    <label for="exampleFormControlSelect1">Bulan</label>
                    <select name="bulan" class="form-control" id="exampleFormControlSelect1">
                        <option value="<?= $awal; ?>">
                            <?php if ($awal == "01") { ?>
                                Januari
                            <?php } elseif ($awal == "02") { ?>
                                Februari
                            <?php } elseif ($awal == "03") { ?>
                                Maret
                            <?php } elseif ($awal == "04") { ?>
                                April
                            <?php } elseif ($awal == "05") { ?>
                                Mei
                            <?php } elseif ($awal == "06") { ?>
                                Juni
                            <?php } elseif ($awal == "07") { ?>
                                Juli
                            <?php } elseif ($awal == "08") { ?>
                                Agustus
                            <?php } elseif ($awal == "09") { ?>
                                September
                            <?php } elseif ($awal == "10") { ?>
                                Oktober
                            <?php } elseif ($awal == "11") { ?>
                                November
                            <?php } elseif ($awal == "12") { ?>
                                Desember
                            <?php } ?>
                        </option>
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
                        <option value="<?= $akhir; ?>"><?= $akhir; ?></option>
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
                        <th>Tanggal</th>
                        <th>Total Harga</th>
                        <th>Bukti</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($laporanpemasukan as $kat) : ?>

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


    </div>
</div>