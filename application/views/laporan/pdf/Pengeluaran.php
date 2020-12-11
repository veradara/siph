<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 5px;
        }

        th {
            text-align: left;
        }
    </style>
</head><body>
    <h1 style="text-align: center;"><?= $logo; ?> SISTEM INFORMASI PEMESANAN HANTARAN</h1>
    <h4 style="background-color: #00AE87; color: white; padding: 1px; width: 370px; border: 1px solid #00AE87; margin-left: 330px; text-align: center;">LAPORAN DATA PENGELUARAN PEMBELIAN</h4>
    <p style="text-align: center;"><span>Antara Tanggal </span></span>: <?= $awal; ?> - <?= $akhir; ?></p>
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Tanggal</th>
                <th>Total Harga</th>
                <th>Foto</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($laporanpengeluaran as $data) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $data->name; ?></td>
                    <td><?= $data->updated_at; ?></td>
                    <td>Rp. <?= number_format($data->price, 0, ',', '.'); ?></td>
                    <td><img class="img-thumbnail" height="50" width="50" src="<?= $gambar ?>/<?= $data->file ?>" alt=""></td>
                </tr>
            <?php endforeach ?>
            <tr>
                <td colspan="3"><b>Total Pengeluaran :</b></td>
                <td><?php $no = 1;
                    foreach ($saldoku as $data) : ?>
                        <p><b></b> Rp. <?= number_format($data->total, 0, ',', '.'); ?></p>
                    <?php endforeach ?></td>
                <td></td>
            </tr>
        </tbody>
    </table>
</body></html>