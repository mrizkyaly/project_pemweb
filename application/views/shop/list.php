<!-- Our Product -->
    <section class="my-produk mb-5">
        <div class="container-fluid py-5 px-4">
            <h2 class="judul pb-3">All Product</h2>
            <div class="mx-auto heading-line"></div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mt-5">
                    <li class="breadcrumb-item"><a href="<?php echo base_url() ?>home">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo base_url() ?>shop">Shop</a></li>
                    <li class="breadcrumb-item active" aria-current="page">All Product</li>
                </ol>
            </nav>
            <div class="sort d-flex justify-content-end px-2 py-2">
                <div class="dropdown-sort mx-1">
                    <a class="btn dropdown-toggle dropdown-toggle-split shadow-none btn-sort" href="#" role="button"
                        id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Category
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="#">Footwear</a>
                        <a class="dropdown-item" href="#">Apparels</a>
                        <a class="dropdown-item" href="#">Accessoris</a>
                    </div>
                </div>
                <div class="dropdown-sort mx-1">
                    <a class="btn dropdown-toggle dropdown-toggle-split shadow-none btn-sort" href="#" role="button"
                        id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Popularity
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="#">Lowest Price</a>
                        <a class="dropdown-item" href="#">Highest Price</a>
                    </div>
                </div>
            </div>
            <div class="row py-3 px-2">
                <?php $no=1; foreach ($produk as $produk) { ?>
                    <div class="col-md-3 py-1">
                        <div class="card produk">
                            <img src="<?php echo base_url('assets/upload/image/thumbs/'.$produk->gambar) ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $produk->nama_produk ?></h5>
                                <p class="card-text">Rp.<?php echo number_format($produk->harga,'0',',','.') ?>,-</p>
                                <a href="<?php echo base_url('shop/beli/'.$produk->id_produk) ?>" class="btn btn-primary btn-produk">View More</a>
                            </div>
                        </div>
                    </div>
                <?php $no++; } ?>  
            </div>
        </div>
        <nav aria-label="Page navigation">
            <ul class="pagination d-flex justify-content-center">
                <li class="page-item">
                    <a class="page-link arah" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link arah" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                    </a>
                </li>
            </ul>
        </nav>
    </section>
    <!-- End Our Product -->