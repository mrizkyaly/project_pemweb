<?php  
	// Notifikasi error
	echo validation_errors('<div class="alert alert-warning">','</div>');

	// Form Open
	echo form_open_multipart(base_url('shop/beli/' .$produk->id_produk),' class="form_horizontal"');
?>
<!-- Transaksi -->
    <div class="transaksi">
        <div class="container-fluid py-1 px-5">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mt-5">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                </ol>
            </nav>
            <div class="row">
                <div class="col-lg-5">
                    <div class="container py-4 produk-selected">
                        <div class="card py-2 w-100">
                            <div class="card-body p-0">
                                <h4 class="card-title">Selected Product</h4>
                                <hr>
                                <div class="card py-0">
                                    <div class=" card-body">
                                        <div class="row p-0">
                                            <div class="col-md-4 text-center p-1">
                                                <img src="<?php echo base_url('assets/upload/image/thumbs/'.$produk->gambar) ?>" class="img-fluid" alt="...">
                                            </div>
                                            <div class="col-md-8 px-2 py-4">
                                                <h6><?php echo $produk->nama_produk ?></h6>
                                                <hr>
                                                <div class="d-flex justify-content-between">
                                                    <p><?php echo $produk->size ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="container py-4 shipping">
                        <div class="card w-100">
                            <article class="card-body p-5">
                                <h4 class="card-title">Shipping Address</h4>
                                <hr>
                                <form class="form py-2">
                                    <div class="form-group">
                                        <input name="" class="form-control shadow-none" placeholder="<?php echo $this->session->userdata('nama_pelanggan'); ?>"
                                            type="text" readonly>
                                    </div>
                                    <div class="form-group">
                                        <input name="" class="form-control shadow-none" placeholder="<?php echo $this->session->userdata('alamat'); ?>"
                                            type="text" readonly>
                                    </div>
                                    <div class="form-group">
                                        <input name="" class="form-control shadow-none" placeholder="<?php echo $this->session->userdata('nomor'); ?>"
                                            type="text" readonly>
                                    </div>
                                    <div class="form-group">
                                        <input name="bayar" class="form-control shadow-none" placeholder="Bayar"
                                            type="text">
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <button type="submit" class="btn btn-beli p-2"> Buy Now </button>
                                        <button type="submit" class="btn btn-backshop p-2 shadow-none"> Back to
                                            Shop ? </button>
                                    </div>
                                </form>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end transaksi -->
<?php echo form_close(); ?>