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
            margin-right: 0px;
        }

        body {
            margin-top: 0px;
            margin-bottom: 0px;
            margin-left: 2px;
            margin-right: 0px;
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
    </style>
</head>

<body>
    <div class="title">
        <h2>AYAM NANGKRING <br> KINTAP</h2>
    </div>
    <p style="font-size: 12px;">Dicetak pada:
        <?= Carbon\Carbon::now()->toDateTimeString() ?>
    </p>
    <table>
        <thead>
            <?php
            // Inisialisasi total jumlah quantity
            $totalQuantityAllCategory = 0;
            $totalPriceAllCategory = 0;
            ?>
            <?php foreach ($totalQuantityByCategory as $category => $totalQty): ?>
                <tr>
                    <th style="text-align: left;font-size: 12px;">
                        <?= $category ?>
                    </th>
                    <?php
                    $totalQuantityAllCategory += $totalQty;
                    ?>
                    <th style="font-size: 12px;padding-left: 43px;">
                        <?= $totalQty ?>
                    </th>
                    <?php
                    $totalPriceByCategory = 0;
                    foreach ($produkData as $produk) {
                        if ($produk['category'] === $category) {
                            $product_id = $produk['id'];
                            $totalQtyProduct = isset($totalQuantity[$product_id]) ? $totalQuantity[$product_id] : 0;
                            $totalPriceByCategory += $totalQtyProduct * $produk['price'];
                        }
                    }
                    $totalPriceAllCategory += $totalPriceByCategory;
                    ?>
                    <th class="price-column" style="font-size: 12px;">
                        <?= number_format($totalPriceByCategory, 0, ',', '.') ?>
                    </th>
                </tr>
            <?php endforeach; ?>
        </thead>
    </table>
    <hr>
    <table>
        <thead>
            <tr>
                <th style="text-align: left;font-size: 12px;">Total</th>
                <th style="font-size: 12px;padding-left: 68px;">
                    <?= $totalQuantityAllCategory ?>
                </th>
                <th class="price-column" style="font-size: 12px;">
                    <?= number_format($totalPriceAllCategory, 0, ',', '.') ?>
                </th>
            </tr>
        </thead>
    </table>
    <br>
    <table>
        <thead>
            <?php
            // Inisialisasi total jumlah quantity
            $totalQuantityAll = 0;
            $subTotalPrice = 0;
            $totalPriceAll = 0;
            ?>
            <?php foreach ($produkData as $produk): ?>
                <tr>
                    <th style="text-align: left;font-size: 12px;">
                        <?= $produk['name'] ?>
                    </th>

                    <?php
                    $product_id = $produk['id'];
                    $totalQty = isset($totalQuantity[$product_id]) ? $totalQuantity[$product_id] : 0;
                    $totalQuantityAll += $totalQty;
                    ?>
                    <th style="font-size: 12px;padding-left: 20px;">
                        <?= $totalQty ?>
                    </th>

                    <!-- Tambahkan class "price-column" untuk kolom harga produk -->
                    <?php
                    $subTotalPrice = $totalQty * $produk['price'];
                    $totalPriceAll += $subTotalPrice;
                    ?>
                    <th class="price-column" style="font-size: 12px;">
                        <?= number_format($subTotalPrice, 0, ',', '.') ?>
                    </th>
                </tr>
            <?php endforeach; ?>
        </thead>
    </table>
    <hr>
    <table>
        <thead>
            <tr>
                <th style="text-align: left;font-size: 12px;">Total</th>
                <th style="font-size: 12px;padding-left: 68px;">
                    <?= $totalQuantityAll ?>
                </th>
                <th class="price-column" style="font-size: 12px;">
                    <?= number_format($totalPriceAll, 0, ',', '.') ?>
                </th>
            </tr>
        </thead>
    </table>
</body>
<script>
    window.onload = function () {
        window.print();
    };
</script>

</html>