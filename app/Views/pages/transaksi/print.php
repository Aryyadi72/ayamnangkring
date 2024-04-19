<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <script>
    window.print();
    </script>
    <style>
      @media print {
    body {
        font-family: 'Inconsolata', monospace;
        margin: 0;
        padding: 0;
        font-size: 12px;
        letter-spacing: 0.1px;
    }

    .receipt {
        max-width: 400px;
        margin: 0; /* Tambahkan ini */
    }

    h2 {
        text-align: center;
        font-size: 11px;
        margin: 0; /* Tambahkan ini */
    }

hr {
    border: 0.05px dashed #000; /* Sesuaikan nilai border dengan keinginan Anda */
    margin: 5px 0;
}


     p {
        display: flex;
        justify-content: space-between;
        margin: 5px 0;
        letter-spacing: 0.5px; /* Sesuaikan nilai ini */
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 5px; /* Sesuaikan nilai ini */
        margin-bottom: 5px; /* Sesuaikan nilai ini */
    }

    th, td {
        text-align: left;
        padding: 3px;
    }

 .flex-container {
        display: flex;
        justify-content: space-between;
        margin-top: 2px;
    }

    .flex-container div {
        text-align: left;
    }

    .flex-container div:last-child {
        text-align: right;
    }

    .footer {
        text-align: center;
        font-size: 10px;
        margin-top: 10px;
    }
}

body {
font-family: 'Inconsolata', monospace;
    margin: 0;
    padding: 0;
    font-size: 12px;
    letter-spacing: 0.1px;
}

.receipt {
    max-width: 400px;
    margin: 0;
}

h2 {
    text-align: center;
    font-size: 12px;
    margin: 0;
}

hr {
    border: 0.05px dashed #000; /* Sesuaikan nilai border dengan keinginan Anda */
    margin: 5px 0;
}


 p {
        display: flex;
        justify-content: space-between;
        margin: 5px 0;
        letter-spacing: 0.1px; /* Sesuaikan nilai ini */
    }

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 5px;
    margin-bottom: 5px;
}

th, td {
    text-align: left;
    padding: 3px;
}

 .flex-container {
        display: flex;
        justify-content: space-between;
        margin-top: 10px;
    }

    .flex-container div {
        text-align: left;
    }

    .flex-container div:last-child {
        text-align: right;
    }

    .footer {
        text-align: center;
        font-size: 10px;
        margin-top: 10px;
    }


    </style>
</head>
<body>
    <div class="receipt">
         <center>
            <img src="<?= base_url('assets/images/logo_nangkring2.png') ?>" width="25px" class="card-img-top" alt="...">
        </center>
    <h2>Ayam Nangkring</h2>
    <hr>
    <div class="flex-container">
        <div>
            <p>No</p>
            <p>Customer</p>
            <p>Jenis</p>
            <p>Waktu</p>
        </div>
        <div>
            <p>:<?= $transaction['id'] ?? '' ?>/<?= date('Ymd/Hi') ?></p>
            <p>:<?= $transaction['customers'] ?? '' ?></p>
            <p>:<?= $transaction['service'] ?? '' ?></p>
            <p>:<?= date('d M y H:i') ?></p>
        </div>
    </div>
    <hr>
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Qty</th>
                <th>Harga</th>
            </tr>
        </thead>
        <tbody>
            <!-- Data Produk -->
            <?php foreach ($transdetail as $detail): ?>
                <tr>
                    <td><?= $detail['name'] ?></td>
                    <td><?= $detail['quantity'] ?></td>
                    <td><?= number_format($detail['total_price'], 0, ',', '.') ?></td>
                </tr>
            <?php endforeach; ?>
            <!-- Akhir Data Produk -->
        </tbody>
    </table>
    <hr>
    <!-- Gunakan class .flex-container untuk membuat dua kolom -->
    <div class="flex-container">
        <div>
            <p>Total Bayar</p>
            <p>Diskon</p>
            <p>Tunai</p>
            <p>Kembalian</p>
        </div>
        <div>
            <p><?= number_format($transaction['total_price'] - ($transaction['total_price'] * ($transaction['discount'] ?? 0) / 100), 0, ',', '.') ?></p>
            <p><?= $transaction['discount'] ?? '' ?>%</p>
            <p><?= number_format($transaction['receive'], 0, ',', '.') ?></p>
            <p><?= number_format($transaction['change'], 0, ',', '.') ?></p>
        </div>
    </div>
    <hr>
    <br>

    <center>
        <img src="<?= base_url('assets/images/mc.code.png') ?>" width="50px" class="card-img-top" alt="...">
        <br>
        <br>
        Terima Kasih
    </center>
</div>

</body>
</html>
