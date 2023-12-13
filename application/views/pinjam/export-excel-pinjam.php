<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=$title.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<style type="text/css">
    .table-data {
        width: 100%;
        border-collapse: collapse;
    }

    .table-data tr th,
    .table-data tr td {
        border: 1px solid black;
        font-size: 11pt;
        font-family: Verdana;
        padding: 10px;
    }

    .table-data th {
        background-color: grey;
        color: black;
    }

    .centered-cell {
        text-align: center;
        vertical-align: middle;
    }

    .centered-image {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 20px;
    }

    .timestamp {
        text-align: right;
        font-size: 10pt;
        font-family: Verdana;
    }
</style>

<table class="table-data">
    <thead>
        <tr>
            <th colspan="8" class="centered-cell">
                <h3>LAPORAN DATA PEMINJAMAN BUKU</h3>
                <div class="centered-image">
                    <img src="<?= base_url('assets/img/kk.jpeg') ?>" height="200" width="210" alt="">
                </div>
            </th>
        </tr>
        <tr>
            <th>No</th>
            <th>Nama Anggota</th>
            <th>Judul Buku</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>Tanggal Pengembalian</th>
            <th>Total Denda</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        $last_no_pinjam = '';

        foreach ($laporan as $l) {
            if ($l['no_pinjam'] != $last_no_pinjam) { // Cek apakah nomor pinjam berbeda dengan nomor pinjam sebelumnya
                $last_no_pinjam = $l['no_pinjam'];
        ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $l['nama']; ?></td>
            <td><?= $l['judul_buku']; ?></td>
            <td><?= $l['tgl_pinjam']; ?></td>
            <td><?= $l['tgl_kembali']; ?></td>
            <td><?= $l['tgl_pengembalian']; ?></td>
            <td><?= $l['total_denda']; ?></td>
            <td><?= $l['status']; ?></td>
        </tr>
        <?php
        }
    }
    ?>
    </tbody>
</table>

<div class="timestamp">
    Tanggal Waktu Cetak: <?= date('d-m-Y H:i:s'); ?>
</div>
