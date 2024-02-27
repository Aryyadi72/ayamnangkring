<?= $this->extend('layout/main-layout'); ?>

<?= $this->section('content');?>

<!-- [ Main Content ] start -->
<div class="pc-container">
    <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <!-- <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-10">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Sample Page</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="../navigation/index.html">Home</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0)">Dashboard</a></li>
                            <li class="breadcrumb-item" aria-current="page">Sample Page</li>
                        </ul>
                    </div>
                </div>
            </div>
            </div> -->
<!-- [ Main Content ] start -->
<div class="row">
    <!-- [ sample-page ] start -->
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>TRANSAKSI</h5>
                <div class="ml-auto">
                    <a href="<?= base_url('/produk-gallery-view') ?>" class="btn btn-secondary rounded-pill" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shopping-cart-plus" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M4 19a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                            <path d="M12.5 17h-6.5v-14h-2" />
                            <path d="M6 5l14 1l-.86 6.017m-2.64 .983h-10.5" />
                            <path d="M16 19h6" />
                            <path d="M19 16v6" />
                        </svg> Keranjang
                    </a>
                    </div>
            </div>
           
        </div>
    </div>
    <!-- [ sample-page ] end -->
</div>
<!-- [ Main Content ] end -->
<!-- [ Main Content ] start -->
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <div>
            <strong>Kategori Produk</strong>
            <div class="d-flex justify-content-start mt-1">
                <button type="button" class="btn btn-sm btn-outline-secondary rounded-pill mr-3" onclick="filterCategory('makanan')">Makanan</button>
                <button type="button" class="btn btn-sm btn-outline-secondary rounded-pill mr-3" onclick="filterCategory('minuman')">Minuman</button>
                <button type="button" class="btn btn-sm btn-outline-secondary rounded-pill btn-outline-purple mr-3" onclick="filterCategory('layanan')">Layanan</button>
                <button type="button" class="btn btn-sm btn-outline-secondary rounded-pill" onclick="showAllCategories()">Show All</button>
            </div>
        </div>
    </div>
</div>
<!-- [ Main Content ] end -->

<!-- [ Main Content ] start -->
<div class="row pl-3 pr-3 pb-3">
   <div class="card bg-gray-100">
    <div class="row row-cols-1 row-cols-md-3 mt-3">
        <?php foreach ($produk as $product) : ?>
    <div class="col <?= strtolower($product['category']) ?>-category">
        <div class="card">
            <img src="<?= base_url('assets/images/food/ayam.jpg') ?>" class="card-img-top" alt="...">
            <div class="card-body d-flex flex-column">
                <h5 class="card-title"><?= $product['name'] ?></h5>
                
<?php
$badgeClass = '';
$category = $product['category'] ?? 'N/A';

switch ($category) {
    case 'Makanan':
        $badgeClass = 'badge-success';
        break;
    case 'Minuman':
        $badgeClass = 'badge-primary';
        break;
    case 'Layanan':
        $badgeClass = 'badge-danger';
        break;
    default:
        $badgeClass = 'badge-secondary';
}
?>
<div class="badge-container">
    <span class="badge <?= $badgeClass ?> rounded-pill">
        <?= $category ?>
    </span>
</div>

                <h4 class="card-text">Rp. <?= $product['price'] ?></h4>
                <!-- You can customize the above lines based on your product data structure -->
                <form action="/transaksi-keranjang" method="post">
                    <input type="hidden" name="transaction_id" value="<?= $transaction['id'] ?>">
                    <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                    <input type="hidden" name="quantity" value="1">
                    <input type="hidden" name="price" value="<?= $product['price'] ?>">
                    <button type="submit" class="btn rounded-pill btn-primary ml-auto">
                        <i class="fa-solid fa-plus"></i> Tambah
                    </button>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>
    </div>
</div>
</div>
<!-- [ Main Content ] end -->


<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="staticBackdropLabel">Daftar Pesanan</h2>
                <button class="btn btn-close p-1 ms-auto" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mt-1 mb-1">
                    <label class="modal-title" id="staticBackdropLabel">ID Pesanan : <?= $transaction['id'] ?></label>
                    <br>
                    <label class="modal-title" id="staticBackdropLabel">Tanggal : <?= date('Y-m-d H:i:s')?></label>
                </div>

                <table id="transaksi" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <td>Menu</td>
            <td>Qty</td>
            <td>Harga</td>
            <td>Aksi</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($transactionDetails as $detail) : ?>
            <tr>
                <td><?= $detail['name'] ?></td>
                <?php
                // Assuming you have a unique identifier (e.g., product_id) in your TransactionDetailsModel
                $productId = $detail['product_id'];

                // Fetch the product price from $produk based on the product ID
                $product = null;
                foreach ($produk as $p) {
                    if ($p['id'] == $productId) {
                        $product = $p;
                        break;
                    }
                }

                if ($product) {
                    // Display the product price multiplied by the quantity
                    $totalPrice = $product['price'] * $detail['quantity'];
                    ?>
                    <td>
                        <div class="input-group">
                            <button class="btn rounded-pill btn-primary btn-sm" onclick="decrement(<?= $detail['id'] ?>, <?= $product['price'] ?>)"><i class="fas fa-chevron-left"></i></button>
                            <p id="jumlah<?= $detail['id'] ?>" class="text-center ml-2 mr-2"><?= $detail['quantity'] ?>x</p>
                            <button class="btn rounded-pill btn-primary btn-sm" onclick="increment(<?= $detail['id'] ?>, <?= $product['price'] ?>)"><i class="fas fa-chevron-right"></i></button>
                        </div>
                    </td>
                    <td id="harga<?= $detail['id'] ?>"><?= $totalPrice ?></td>
                <?php } else { ?>
                    <td colspan="2">Product not found</td>
                <?php } ?>
                <td>
                    <a href="<?= base_url('/transaksi-hapus-item/' . $detail['id']) ?>" class="btn rounded-pill btn-danger btn-sm"><i class="ti ti-trash"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

              

                <div class="card">
                    <div class="card-body bg-cyan-100 bg-opacity-200">
                        <h5 class="card-title">Total Harga</h5>
                        <h2 class="card-text">Rp <span id="totalHarga">0.00</span></h2>
                    </div>
                </div>
              <div class="modal-footer">
    <button type="button" class="btn btn-dark rounded-pill" data-dismiss="modal">Keluar</button>
    <a href="<?= site_url('/payment-detail/'.$transaction['id'])?>" class="btn btn-success rounded-pill">Simpan</a>
</div>

    </div>
    </div>
    </div>
</div>


<!-- <script>
function updateTotalPrice() {
    var total = 0;
    <?php foreach ($transactionDetails as $detail) : ?>
        var price = parseFloat(document.getElementById('harga<?= $detail['id'] ?>').innerText);
        total += price;
        document.getElementById('inputTotalPrice<?= $detail['id'] ?>').value = total; // Update the input field for total_price
    <?php endforeach; ?>
    document.getElementById('totalHarga').innerText = total;
    return total; // Return total for use in other functions
}

// Call the updateTotalPrice function initially
updateTotalPrice();

function increment(id, price) {
    var quantityElement = document.getElementById('jumlah' + id);
    var hargaElement = document.getElementById('harga' + id);
    var totalHargaElement = document.getElementById('totalHarga');
    var inputQuantityElement = document.getElementById('inputQuantity' + id);
    var inputPriceElement = document.getElementById('inputPrice' + id);
    var inputTotalPriceElement = document.getElementById('inputTotalPrice' + id);
    var currentQuantity = parseInt(quantityElement.innerText);
    var currentHarga = parseFloat(hargaElement.innerText);

    if (!isNaN(currentHarga) && !isNaN(price)) {
        quantityElement.innerText = (currentQuantity + 1) + 'x';
        hargaElement.innerText = (currentHarga + price);
        totalHargaElement.innerText = updateTotalPrice(); // Update totalHarga
        inputQuantityElement.value = currentQuantity + 1;
        inputPriceElement.value = (currentHarga + price);
        inputTotalPriceElement.value = updateTotalPrice(); // Update the input field for total_price
        // sendUpdateToServer(id, currentQuantity + 1, currentHarga + price);
    } else {
        console.error('Invalid quantity or price value');
    }
}

function decrement(id, price) {
    var quantityElement = document.getElementById('jumlah' + id);
    var hargaElement = document.getElementById('harga' + id);
    var totalHargaElement = document.getElementById('totalHarga');
    var inputQuantityElement = document.getElementById('inputQuantity' + id);
    var inputPriceElement = document.getElementById('inputPrice' + id);
    var inputTotalPriceElement = document.getElementById('inputTotalPrice' + id);
    var currentQuantity = parseInt(quantityElement.innerText);
    var currentHarga = parseFloat(hargaElement.innerText);

    if (currentQuantity > 1 && !isNaN(currentHarga) && !isNaN(price)) {
        quantityElement.innerText = (currentQuantity - 1) + 'x';
        hargaElement.innerText = (currentHarga - price);
        totalHargaElement.innerText = updateTotalPrice(); // Update totalHarga
        inputQuantityElement.value = currentQuantity - 1;
        inputPriceElement.value = (currentHarga - price);
        inputTotalPriceElement.value = updateTotalPrice(); // Update the input field for total_price
        // sendUpdateToServer(id, currentQuantity - 1, currentHarga - price);
    } else {
        console.error('Invalid quantity or price value');
    }
}

  function submitForm(detailId) {
        // Get the form data
        var formData = new FormData(document.getElementById('form' + detailId));

        // Send the form data via Fetch API
        fetch('/transaksi-simpan', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            // Handle the response data
            console.log(data);
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }


function sendUpdateToServer(id, currentQuantity, currentHarga, totalHarga) {
    $.ajax({
        type: 'POST',
        url: '<?= site_url('/transaksi-simpan') ?>',
        contentType: 'application/json',
        data: JSON.stringify({
            id: id,
            quantity: currentQuantity,
            harga: currentHarga,
            totalHarga: totalHarga
        }),
        success: function (response) {
           alert('Data berhasil dikirim ke server:', response);
        },
        error: function () {
            alert('Gagal mengirim data ke server.');
        }
    });
}


</script> -->

<script>
function updateTotalPrice() {
    var total = 0;
    <?php foreach ($transactionDetails as $detail) : ?>
        var price = parseFloat(document.getElementById('harga<?= $detail['id'] ?>').innerText);
        total += price;
    <?php endforeach; ?>
    document.getElementById('totalHarga').innerText = total;
}

// Call the updateTotalPrice function initially
updateTotalPrice();

function increment(id, price) {
    var quantityElement = document.getElementById('jumlah' + id);
    var hargaElement = document.getElementById('harga' + id);
    var currentQuantity = parseInt(quantityElement.innerText);
    var currentHarga = parseFloat(hargaElement.innerText);

    if (!isNaN(currentHarga) && !isNaN(price)) {
        quantityElement.innerText = currentQuantity + 1 + 'x';
        hargaElement.innerText = (currentHarga + price);
        updateTotalPrice();
        sendUpdateToServer(id, currentQuantity + 1, price);
    } else {
        console.error('Invalid quantity or price value');
    }
}

function decrement(id, price) {
    var quantityElement = document.getElementById('jumlah' + id);
    var hargaElement = document.getElementById('harga' + id);
    var currentQuantity = parseInt(quantityElement.innerText);
    var currentHarga = parseFloat(hargaElement.innerText);

    if (currentQuantity > 1 && !isNaN(currentHarga) && !isNaN(price)) {
        quantityElement.innerText = currentQuantity - 1 + 'x';
        hargaElement.innerText = (currentHarga - price);
        updateTotalPrice();
        sendUpdateToServer(id, currentQuantity - 1, price);
    } else {
        console.error('Invalid quantity or price value');
    }
}

function sendUpdateToServer(id, quantity, price) {
    // Use AJAX to send data to the server
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '/transaksi-simpan', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Handle the response if needed
            console.log(xhr.responseText);
        }
    };
    
    var data = 'id=' + id + '&quantity=' + quantity + '&price=' + price;
    xhr.send(data);
}
</script>

<script>
    function filterCategory(category) {
        // Hide all product cards
        document.querySelectorAll('.col').forEach(card => {
            card.style.display = 'none';
        });

        // Show product cards with the selected category
        document.querySelectorAll(`.${category}-category`).forEach(card => {
            card.style.display = 'block';
        });
    }

    function showAllCategories() {
        // Show all product cards
        document.querySelectorAll('.col').forEach(card => {
            card.style.display = 'block';
        });
    }
</script>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<?= $this->endSection(); ?>