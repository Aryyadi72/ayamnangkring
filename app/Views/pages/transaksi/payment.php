<?= $this->extend('layout/main-layout'); ?>

<?= $this->section('content');?>

<!-- [ Main Content ] start -->
<div class="pc-container">
    <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <!-- <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
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
        <!-- [ breadcrumb ] end -->

<!-- [ Main Content ] start -->
<div class="row">
    <!-- [ sample-page ] start -->
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>PEMBAYARAN</h5>
                <!-- <div class="ml-auto">
                    <a href="<?= base_url('/produk-gallery-view') ?>" class="btn btn-primary rounded-pill btn-sm" data-toggle="modal" data-target="#myModal">
                        <i class="ti ti-plus"></i> Tambah
                    </a>
                </div> -->
            </div>
        </div>
    </div>
    <!-- [ sample-page ] end -->
</div>
<!-- [ Main Content ] end -->


<!-- [ Main Content ] start -->
<div class="row">
    <!-- [ sample-page ] start -->
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="mb-3">
                      <?php if (!empty($transdetail)) : ?>
    <label for="exampleInputEmail1" class="form-label"><strong>Nama Pelanggan :</strong></label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $transdetail[0]['customers'] ?>" readonly>
    </div>
    <div class="ml-auto">
        <p class="mb-1"><strong>ID Pesanan :</strong> <?= $transdetail[0]['transaction_id'] ?></p>
        <p class="mb-0"><strong>Tanggal :</strong> <?= $transdetail[0]['created_at'] ?></p>
<?php endif; ?>

                </div>
            </div>
        </div>
    </div>
    <!-- [ sample-page ] end -->
</div>
<!-- [ Main Content ] end -->



        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ sample-page ] start -->
            <div class="col-sm-12">
                <div class="card">
                   <div class="card-header">
    <h5>Daftar Pesanan</h5>

</div>

<!-- <form method="get" action="">
    <div class="input-group col-8 ml-3 mt-4">
        <label for="FilterData" class="mr-2 mt-1"><b>Start Date : </b></label>
        <input type="date" name="start_date" class="form-control form-control-sm mr-2" value="" placeholder="Start Date">
        <label for="FilterData" class="mr-2 mt-1"><b>End Date : </b></label>
        <input type="date" name="end_date" class="form-control form-control-sm mr-2" value="" placeholder="End Date">
        <button type="submit" class="btn btn-sm btn-primary rounded-pill mr-2">Filter</button>
        <a href="" class="btn btn-sm btn-danger rounded-pill">Reset</a>
    </div>
</form> -->
<!-- 
<div class="input-group col-4 ml-3 mt-4">
    <button type="button" class="btn btn-sm btn-danger rounded-pill mr-2">
        <i class="fas fa-file-pdf"></i> Export PDF
    </button>
    <button type="button" class="btn btn-sm rounded-pill btn-success">
        <i class="fas fa-file-excel"></i> Export Excel
    </button>
</div> -->
<div class="card-body">
  <table id="transaksi" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Produk</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Total Harga</th>
            <th>Aksi</th>
        </tr>
    </thead>
   <tbody>
    <?php $no = 1; foreach ($transdetail as $detail) : ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $detail['name'] ?></td>
            <td><?= $detail['quantity'] ?></td>
            <td><?= $detail['price'] ?></td>
            <td><?= $detail['quantity'] * $detail['price'] ?></td>
            <td>
                <a href="#" class="btn rounded-pill btn-danger btn-sm" data-toggle="modal" data-target="#myModal"><i class="ti ti-trash"></i></a>
            </td>
        </tr>
    <?php endforeach; ?>
</tbody>


</table>


                    </div>
                </div>
            </div>
            <!-- [ sample-page ] end -->
        </div>
        <!-- [ Main Content ] end -->

<!-- [ Main Content ] start -->
<div class="row">
    <!-- [ sample-page ] start -->
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header text-center">
                <h4>Layanan</h4>
            </div>
            <div class="card-body d-flex justify-content-center">
                <div class="d-flex flex-row">
                    <button type="button" class="btn btn-secondary btn-lg mr-4 mb-3 opacity payment-btn" id="cateringBtn">
                        <i class="ti ti-box mr-2"></i> Catering
                    </button>
                    <button type="button" class="btn btn-secondary btn-lg mr-4 mb-3 opacity payment-btn" id="dineinBtn">
                        <i class="ti ti-glass mr-2"></i> Dine In
                    </button>
                    <button type="button" class="btn btn-secondary btn-lg mr-4 mb-3 opacity payment-btn" id="takeawayBtn">
                        <i class="ti ti-car mr-2"></i> Take Away
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- [ sample-page ] end -->
</div>
<!-- [ Main Content ] end -->



<!-- [ Main Content ] start -->
<div class="row">
    <!-- [ sample-page ] start -->
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header text-center">
                <h4>Metode Pembayaran</h4>
            </div>
            <div class="card-body d-flex justify-content-center">
                <div class="d-flex flex-row">
                    <button type="button" class="btn btn-success btn-lg mr-4 mb-3 opacity payment-btn" id="cashBtn">
                        <i class="ti ti-report-money mr-2"></i> Cash
                    </button>
                    <button type="button" class="btn btn-primary btn-lg mr-4 mb-3 opacity payment-btn" id="nonTunaiBtn">
                        <i class="ti ti-credit-card mr-2"></i> Non Tunai
                    </button>
                    <button type="button" class="btn btn-danger btn-lg mr-4 mb-3 opacity payment-btn" id="dpBookingBtn">
                        <i class="ti ti-zoom-money mr-2"></i> DP/Booking
                    </button>
                    <button type="button" class="btn btn-warning btn-lg mr-4 mb-3 opacity payment-btn" id="amalSalehBtn">
                        <i class="ti ti-heart mr-2"></i> Amal Saleh
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- [ sample-page ] end -->
</div>
<!-- [ Main Content ] end -->

<!-- [ Main Content ] start -->
<div class="row">
    <!-- [ sample-page ] start -->
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4>Uang Tunai :</h4>
                <div class="ml-auto d-flex align-items-center">
                    <div class="d-flex">
                        <span>Rp.</span>
                        <input type="text" class="form-control" id="uangTunai" aria-describedby="emailHelp" oninput="updateChange()">
                    </div>
                </div>
            </div>
            <!-- Other card content here -->

            
            
            <div class="card-body">
                <?php
    $totalSum = 0; // Initialize the total sum variable
    foreach ($transdetail as $detail) :
        $subtotal = $detail['quantity'] * $detail['price'];
        $totalSum += $subtotal; // Accumulate the subtotal to the total sum
    endforeach;
    ?>
   

    <p>Sub Total <span class="ml-5 pl-5"> <span class="ml-4 pl-3"></span>:</span> <span id="subtotal"><?= $totalSum ?></span></p>
    
    <div class="form-group row mb-0">
        <label for="diskon" class="col-sm-2 col-form-label">Diskon:</label>
        <div class="col-sm-1">
            <input type="text" class="form-control" id="diskon" name="diskon" oninput="updateTotal()">
        </div>
    </div>
     <p id="changeLabel">Kembalian:</p>
    <h3 id="changeAmount">Rp. 0</h3>
    <span id="discountPercentage"></span> 
    <br>
    <h3>Total: <span id="totalAfterDiscount"><?= $totalSum ?></span></h3>

    <div class="input-group col-4 mb-3">
        <button type="button" class="btn btn-sm btn-dark rounded-pill mr-2">
            <i class="ti ti-arrow-back"></i> Kembali
        </button>
       <button type="button" class="btn btn-sm rounded-pill btn-success" id="btn-checkout">
    <i class="ti ti-shopping-cart"></i> Checkout
</button>

    </div>
    <hr>
</div>
</div>
</div>




<script>$('#transaksi').DataTable();</script>

<!-- <script>
    $(document).ready(function () {
        // Define a variable to store the selected payment method
        var selectedPaymentMethod = '';

        // Attach click event handlers to each button
        $('#cashBtn, #nonTunaiBtn, #dpBookingBtn, #amalSalehBtn').click(function () {
            // Remove 'btn-selected' class from all buttons
            $('.payment-btn').removeClass('btn-selected');

            // Add 'btn-selected' class to the clicked button
            $(this).addClass('btn-selected');

            // Set selected payment method
            selectedPaymentMethod = $(this).text().trim();

            // Call the function to send the selected payment method to the server
            sendPaymentMethod(selectedPaymentMethod);
        });

        // Function to send the selected payment method to your server
        function sendPaymentMethod(paymentMethod) {
            // Perform an AJAX request to your server with the selected payment method
            $.ajax({
                type: 'POST',
                url: '/your-server-endpoint', // Replace with your actual server endpoint
                data: { payment_method: paymentMethod },
                success: function (response) {
                    console.log('Payment method sent successfully');
                    // Handle any success actions here
                },
                error: function (error) {
                    console.error('Error sending payment method:', error);
                    // Handle any error actions here
                }
            });
        }
    });
</script> -->

<script>
var totalAfterDiscount = <?= json_encode($totalSum) ?>;

function updateChange() {
    // Get the values of Uang Tunai and Total
    var uangTunai = parseFloat(document.getElementById('uangTunai').value) || 0;
    
    // Calculate the change
    var change = uangTunai - totalAfterDiscount;

    // Display the change dynamically
    document.getElementById('changeAmount').innerText = "Rp. " + change.toFixed(2);
}

function updateTotal() {
    // Get the discount percentage from the input
    var discountPercentage = parseFloat(document.getElementById('diskon').value) || 0;

    // Update the discount percentage display
    var discountPercentageElement = document.getElementById('discountPercentage');
    discountPercentageElement.innerText = discountPercentage;

    // Calculate the discounted amount
    var discountedAmount = totalAfterDiscount * (discountPercentage / 100);

    // Update the total after discount display
    document.getElementById('totalAfterDiscount').innerText = totalAfterDiscount - discountedAmount;

    // Hide the discountPercentageElement if the discount is zero
    discountPercentageElement.style.display = discountPercentage ='none';
}
</script>

<!-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> -->

<script>
    $(document).ready(function () {
        // Define an enum for payment methods
        const serviceEnum = {
            Catering: 'Catering',
            DineIn: 'Dine In',
            TakeAway: 'Take Away'
        };
        let service = '';

          // Attach click event handlers to each payment button
        $('#cateringBtn, #dineinBtn, #takeawayBtn').click(function () {
            // Remove 'btn-selected' class from all buttons
            $('.payment-btn').removeClass('btn-selected-1');

            // Add 'btn-selected' class to the clicked button
            $(this).addClass('btn-selected-1');

            // Map the text content to the enum values
            const buttonText = $(this).text().trim();
            switch (buttonText) {
                case 'Catering':
                    service = serviceEnum.Catering;
                    break;
                case 'Dine In':
                    service = serviceEnum.DineIn;
                    break;
                case 'Take Away':
                    service = serviceEnum.TakeAway;
                    break;
                default:
                    // Handle any other cases or errors
                    break;
            }
        });

        const PaymentMethodEnum = {
            Cash: 'Cash',
            NonTunai: 'Non Tunai',
            DPBooking: 'DP/Booking',
            AmalSaleh: 'Amal Saleh'
        };

        // Variable to store the selected payment method
        let payment_method = '';
        // Attach click event handlers to each payment button
        $('#cashBtn, #nonTunaiBtn, #dpBookingBtn, #amalSalehBtn').click(function () {
            // Remove 'btn-selected' class from all buttons
            $('.payment-btn').removeClass('btn-selected');

            // Add 'btn-selected' class to the clicked button
            $(this).addClass('btn-selected');

            // Map the text content to the enum values
            const buttonText = $(this).text().trim();
            switch (buttonText) {
                case 'Cash':
                    payment_method = PaymentMethodEnum.Cash;
                    break;
                case 'Non Tunai':
                    payment_method = PaymentMethodEnum.NonTunai;
                    break;
                case 'DP/Booking':
                    payment_method = PaymentMethodEnum.DPBooking;
                    break;
                case 'Amal Saleh':
                    payment_method = PaymentMethodEnum.AmalSaleh;
                    break;
                default:
                    // Handle any other cases or errors
                    break;
            }
        });

        // Attach click event handler to the checkout button
        $("#btn-checkout").click(function () {
            // Mengumpulkan data yang diperlukan
            var id = <?= $transdetail[0]['transaction_id'] ?>;
            var change = $("#changeAmount").text().replace(/Rp\. (\d+)\.00/, '$1');
            var receive = $("#uangTunai").val();
            var discount = $("#diskon").val();
            var total_price = $("#totalAfterDiscount").text();

            // Kirim data ke server untuk pembaruan di database
            checkout(id, payment_method, service, change, receive, discount, total_price);
        });

        // Function to send the checkout data to the server
        function checkout(id, payment_method, service, change, receive, discount, total_price) {
    $.ajax({
        type: 'POST',
        url: '/checkout', // Replace with your actual server endpoint
        data: {
            id: id,
            payment_method: payment_method,
            service: service,
            change: change,
            receive: receive,
            discount: discount,
            total_price: total_price
        },
        success: function (response) {
            if (response.success) {
                console.log('Checkout berhasil');
                // Use the returned id for the redirect
                window.location.href = "/invoice/" + response.data.id;
            } else {
                console.error('Error during checkout:', response.errors);
                // Handle error actions if needed
            }
        },
        error: function (error) {
            console.error('Error during checkout:', error);
            // Handle error actions if needed
        }
    });
}

    });
</script>




<?= $this->endSection();?>