<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Set margin dan padding 0 untuk seluruh halaman */
        @page {
            margin-top: 0px;
            margin-bottom: 0px;
            margin-left: 2px;
            margin-right: 2px;
        }

        body {
            margin-top: 0px;
            margin-bottom: 0px;
            margin-left: 2px;
            margin-right: 2px;
        }

        /* Atur style untuk judul */
        .title {
            text-align: center;
        }

        /* Atur style untuk kolom harga produk di area cetak */
        @media print {
            th.price-column {
                text-align: right;
                width: 65px;
            }
        }

        /* Atur style untuk kolom harga produk di area cetak */
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th.price-column {
            text-align: right;
            width: 65px;
        }
    </style>
</head>

<body>
    <p>
        <?= $start_periode ?>
    </p>
    <p>
        <?= $summaryHarian['summaryHarian']['inputer'] ?>
    </p>
    <table>
        <tbody>
            <?php foreach ($PengadaanMasuk['pengadaanmasuk'] as $pm): ?>
                <tr>
                    <td>
                        <?= $pm['nama'] ?>
                    </td>
                    <td style="text-align:right;">
                        <?= number_format($pm['harga'], 0, ',', '.') ?>
                    </td>
                </tr>
            <?php endforeach ?>

            <?php foreach ($Pemeliharaan['pemeliharaan'] as $pemeliharaan): ?>
                <tr>
                    <td>
                        <?= $pemeliharaan['nama'] ?>
                    </td>
                    <td style="text-align:right;">
                        <?= number_format($pemeliharaan['harga'], 0, ',', '.') ?>
                    </td>
                </tr>
            <?php endforeach ?>

            <?php foreach ($Upgrade['upgrade'] as $up): ?>
                <tr>
                    <td>
                        <?= $up['nama'] ?>
                    </td>
                    <td style="text-align:right;">
                        <?= number_format($up['harga'], 0, ',', '.') ?>
                    </td>
                </tr>
            <?php endforeach ?>

            <?php foreach ($BahanPenunjang['bahanPenunjang'] as $bp): ?>
                <tr>
                    <td>
                        <?= $bp['nama'] ?>
                    </td>
                    <td style="text-align:right;">
                        <?= number_format($bp['harga'], 0, ',', '.') ?>
                    </td>
                </tr>
            <?php endforeach ?>

            <?php foreach ($AlatProduksi['alatProduksi'] as $ap): ?>
                <tr>
                    <td>
                        <?= $ap['nama'] ?>
                    </td>
                    <td style="text-align:right;">
                        <?= number_format($ap['harga'], 0, ',', '.') ?>
                    </td>
                </tr>
            <?php endforeach ?>
            <tr>
                <td>Total</td>
                <td style="text-align:right;">
                    <?= number_format($total, 0, ',', '.') ?>
                </td>
            </tr>
        </tbody>
    </table>
    <br>
    <table>
        <tbody>
            <tr>
                <td>Modal Awal</td>
                <td style="text-align:right;">
                    <?= number_format($summaryHarian['summaryHarian']['modal_awal'], 0, ',', '.') ?>
                </td>
            </tr>
            <tr>
                <td>Modal Akhir</td>
                <td style="text-align:right;">
                    <?= number_format($summaryHarian['summaryHarian']['modal_akhir'], 0, ',', '.') ?>
                </td>
            </tr>
            <tr>
                <td>Cash</td>
                <td style="text-align:right;">
                    <?= number_format($summaryHarian['summaryHarian']['cash'], 0, ',', '.') ?>
                </td>
            </tr>
            <tr>
                <td>Tunai</td>
                <td style="text-align:right;">
                    <?= number_format($summaryHarian['summaryHarian']['tunai'], 0, ',', '.') ?>
                </td>
            </tr>
            <tr>
                <td>TF</td>
                <td style="text-align:right;">
                    <?= number_format($summaryHarian['summaryHarian']['tf'], 0, ',', '.') ?>
                </td>
            </tr>
            <tr>
                <td>NS</td>
                <td style="text-align:right;">
                    <?= number_format($summaryHarian['summaryHarian']['ns'], 0, ',', '.') ?>
                </td>
            </tr>
            <?php
            $modalA = $summaryHarian['summaryHarian']['modal_akhir'] + $summaryHarian['summaryHarian']['tf'] + $summaryHarian['summaryHarian']['ns'] + $total;
            $modalB = $summaryHarian['summaryHarian']['modal_awal'] + $summaryHarian['summaryHarian']['cash'] - $modalA;
            ?>
        </tbody>
    </table>
    <br>
    <table>
        <tbody>
            <tr>
                <td>Modal Akhir</td>
                <td style="text-align:right;">
                    <?= number_format($summaryHarian['summaryHarian']['modal_akhir'], 0, ',', '.') ?>
                </td>
            </tr>
            <tr>
                <td>TF</td>
                <td style="text-align:right;">
                    <?= number_format($summaryHarian['summaryHarian']['tf'], 0, ',', '.') ?>
                </td>
            </tr>
            <tr>
                <td>NS</td>
                <td style="text-align:right;">
                    <?= number_format($summaryHarian['summaryHarian']['ns'], 0, ',', '.') ?>
                </td>
            </tr>
            <tr>
                <td>Total Pengadaan</td>
                <td style="text-align:right;">
                    <?= number_format($total, 0, ',', '.') ?>
                </td>
            </tr>
            <tr>
                <td>Total</td>
                <td style="text-align:right;">
                    <?= number_format($modalA, 0, ',', '.') ?>
                </td>
            </tr>
        </tbody>
    </table>
    <br>
    <table>
        <tbody>
            <tr>
                <td>Modal Awal</td>
                <td style="text-align:right;">
                    <?= number_format($summaryHarian['summaryHarian']['modal_awal'], 0, ',', '.') ?>
                </td>
            </tr>
            <tr>
            <tr>
                <td>Cash</td>
                <td style="text-align:right;">
                    <?= number_format($summaryHarian['summaryHarian']['cash'], 0, ',', '.') ?>
                </td>
            </tr>
            </tr>
            <tr>
                <td>Total</td>
                <td style="text-align:right;">
                    <?= number_format($modalA, 0, ',', '.') ?>
                </td>
            </tr>
            <tr>
                <td>Total</td>
                <td style="text-align:right;">
                    <?= number_format($modalB, 0, ',', '.') ?>
                </td>
            </tr>
        </tbody>
    </table>
</body>

<script>
    window.onload = function () {
        window.print();
    };
</script>

</html>