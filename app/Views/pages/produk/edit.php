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
                        <form action="<?= site_url('/produk/update/' . $data['product']['id']) ?>" method="POST">
                            <!-- <?= form_open_multipart('/produk/update/' . $data['product']['id']) ?> -->
                            <div class="mb-3">
                                <label for="productName" class="form-label">Nama Produk</label>
                                <input type="text" class="form-control" id="productName" name="name"
                                    aria-describedby="emailHelp" value="<?= $data['product']['name'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="productQty" class="form-label">Harga Produk</label>
                                <input type="number" class="form-control" id="productQty" name="price"
                                    value="<?= $data['product']['price'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="productQty" class="form-label">Kategori Produk</label>
                                <select class="form-select" aria-label="Default select example" name="category">
                                    <option selected disabled>Pilih Kategori</option>
                                    <option value="Menu Hemat" <?= ($data['product']['category'] == 'Menu Hemat') ? 'selected' : ''; ?>>Menu Hemat</option>
                                    <option value="Menu Spesial" <?= ($data['product']['category'] == 'Menu Spesial') ? 'selected' : ''; ?>>Menu Spesial</option>
                                    <option value="Menu Mantap" <?= ($data['product']['category'] == 'Menu Mantap') ? 'selected' : ''; ?>>Menu Mantap</option>
                                    <option value="Menu Istimewa" <?= ($data['product']['category'] == 'Menu Istimewa') ? 'selected' : ''; ?>>Menu Istimewa</option>
                                    <option value="Menu Tambah" <?= ($data['product']['category'] == 'Menu Tambah') ? 'selected' : ''; ?>>Menu Tambah</option>
                                    <option value="Minuman" <?= ($data['product']['category'] == 'Minuman') ? 'selected' : ''; ?>>Minuman</option>
                                    <option value="Aneka Jus" <?= ($data['product']['category'] == 'Aneka Jus') ? 'selected' : ''; ?>>Aneka Jus</option>
                                    <option value="Yang Segar" <?= ($data['product']['category'] == 'Yang Segar') ? 'selected' : ''; ?>>Yang Segar</option>
                                    <option value="Durian Si Mantap" <?= ($data['product']['category'] == 'Durian Si Mantap') ? 'selected' : ''; ?>>Durian Si Mantap</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="productImage" class="form-label">Foto Produk</label>
                                <input class="form-control" type="file" id="productImage" name="image" accept="image/*">
                            </div>

                            <a href="<?= base_url('/produk/produk-table') ?>" class="btn btn-dark">Kembali</a>
                            <button type="submit" class="btn btn-secondary">Submit</button>
                        </form>
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