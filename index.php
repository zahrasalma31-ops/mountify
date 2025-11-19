<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Online | Home</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
	<?php require 'navbar.php'; ?>

    <!-- banner -->
    <div class="container-fluid banner d-flex align-items-center">
        <div class="container text-center text-white">
            <h1>Toko Online Fashion</h1>
            <h3>Mau Cari Apa ?</h3>
            <div class="col-md-8 offset-md-2">
                <form method="get" action="produk.php">
                    <div class="input-group input-group-lg my-4">
                        <input 
                            type="text" 
                            class="form-control" 
                            placeholder="Nama Barang"
                            aria-label="Recipient's username" 
                            aria-describedby="basic-addon2" 
                            name="keyword"
                        >
                        <button type="submit" class="btn warna2 text-white">
                            Telusuri
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- highlighted kategori -->
    <div class="container-fluid py-5">
        <div class="container text-center">
            <h3>Kategori Terlaris</h3>

            <div class="row mt-5">
                <div class="col-md-4 mb-3">
                    <div class="highlighted-kategori kategori-sepatu d-flex justify-content-center align-items-center">
                        <h4 class="text-white">
                            <a class="no-decoration" href="produk.php?kategori=Sepatu Hiking">Sepatu Hiking</a>
                        </h4>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="highlighted-kategori kategori-carrier d-flex justify-content-center align-items-center">
                        <h4 class="text-white">
                            <a class="no-decoration" href="produk.php?kategori=Carrier">Carrier</a>
                        </h4>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="highlighted-kategori kategori-tenda d-flex justify-content-center align-items-center">
                        <h4 class="text-white">
                            <a class="no-decoration" href="produk.php?kategori=Tenda">Tenda</a>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- tentang kami -->
    <div class="container-fluid warna3 py-5">
        <div class="container text-center">
            <h3>Tentang Kami</h3>
            <p class="fs-5 mt-3">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cumque incidunt necessitatibus
                placeat ea deleniti obcaecati nisi eum cupiditate itaque, officiis animi quis rem labore
                quasi, eveniet eius inventore vero! Rem nam, labore voluptate aperiam explicabo tenetur
                earum ducimus, asperiores eveniet suscipit cupiditate sunt ex? Ut omnis, deleniti
                laboriosam beatae inventore provident quidem animi doloribus eius soluta quas dolorum
                pariatur blanditiis nisi corrupti aspernatur amet dolores harum magnam. Maxime, in
                voluptates? Exercitationem dolore suscipit necessitatibus aspernatur possimus aperiam
                amet iure sunt.
            </p>
        </div>
    </div>

    <!-- produk -->
    <div class="container-fluid py-5">
        <div class="container text-center">
            <h3>Produk</h3>

            <div class="row mt-5">
                <div class="col-sm-6 col-md-4 mb-3">
                    <div class="card">
                        <img src="image/aaaa.jpg" class="card-img-top" alt="produk">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text text-truncate">
                                Some quick example text to build on the card title and make up the bulk of the card's content.
                            </p>
                            <p class="card-text text-harga">Rp 20000</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 mb-3">
                    <div class="card">
                        <img src="image/aaaa.jpg" class="card-img-top" alt="produk">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">
                                Some quick example text to build on the card title and make up the bulk of the card's content.
                            </p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 mb-3">
                    <div class="card">
                        <img src="image/aaaa.jpg" class="card-img-top" alt="produk">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">
                                Some quick example text to build on the card title and make up the bulk of the card's content.
                            </p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 mb-3">
                    <div class="card">
                        <img src="image/aaaa.jpg" class="card-img-top" alt="produk">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">
                                Some quick example text to build on the card title and make up the bulk of the card's content.
                            </p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 mb-3">
                    <div class="card">
                        <img src="image/aaaa.jpg" class="card-img-top" alt="produk">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">
                                Some quick example text to build on the card title and make up the bulk of the card's content.
                            </p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 mb-3">
                    <div class="card">
                        <img src="image/aaaa.jpg" class="card-img-top" alt="produk">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">
                                Some quick example text to build on the card title and make up the bulk of the card's content.
                            </p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>
</body>
</html>
