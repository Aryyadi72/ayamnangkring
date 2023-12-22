<?= $this->extend('layout/main-layout'); ?>

<?= $this->section('content'); ?>

<!-- [ Main Content ] start -->
<div class="pc-container">
    <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
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
        </div>
        <!-- [ breadcrumb ] end -->

        <div class="row">
            <!-- [ sample-page ] start -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>List Produk</h5>
                    </div>
                    <div class="card-body">
                        <?= form_open_multipart('/produk/store') ?>
    <div class="mb-3">
        <label for="productName" class="form-label">Nama Produk</label>
        <input type="text" class="form-control" id="productName" name="name" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="productQty" class="form-label">Jumlah Produk</label>
        <input type="number" class="form-control" id="productQty" name="qty">
    </div>
    <div class="mb-3">
        <label for="productPrice" class="form-label">Harga Produk</label>
        <input type="number" class="form-control" id="productPrice" name="price">
    </div>
    <div class="mb-3">
        <label for="productImage" class="form-label">Foto Produk</label>
        <input class="form-control" type="file" id="productImage" name="image" accept="image/*">
    </div>
    <!-- <div class="mb-3">
        <label for="productImage" class="form-label">Created_at</label>
        <input class="form-control" type="date" id="productImage" name="created_at">
    </div>
    <div class="mb-3">
        <label for="productImage" class="form-label">Updated_at</label>
        <input class="form-control" type="date" id="productImage" name="updated_at">
    </div> -->

    <a href="<?= base_url('/produk/produk-table') ?>" class="btn btn-dark">Kembali</a>
    <button type="submit" class="btn btn-secondary">Submit</button>
</form>

                            </div>
                    </div>
                </div>
            </div>
            <!-- [ sample-page ] end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
    <!-- [ Main Content ] end -->

<?= $this->endSection(); ?>