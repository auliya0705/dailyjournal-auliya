<?php
//quary untuk mengambil data article
$sql1 = "SELECT * FROM article ORDER BY tanggal DESC";
$hasil1 = $conn->query($sql1);

//menghitung jumlah baris data article
$jumlah_article = $hasil1->num_rows;

//query untuk mengambil data gallery
$sql2 = "SELECT * FROM gallery ORDER BY tanggal DESC";
$hasil2 = $conn->query($sql2);

//menghitung jumlah baris data gallery
$jumlah_gallery = $hasil2->num_rows;

//query untuk mengambil data user
$sql3 = "SELECT * FROM user";
$hasil3 = $conn->query($sql3);

//menghitung jumlah baris data user
$jumlah_user = $hasil3->num_rows;
?>

<div class="row row-cols-1 row-cols-md-4 g-4 justify-content-center pt-4">
    <div class="col">
        <div class="card border border-dark-subtle mb-3 shadow" style="max-width: 18rem;">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div class="p-3">
                        <h5 class="card-title"><i class="bi bi-newspaper"></i> Article</h5>
                    </div>
                    <div class="p-3">
                        <span class="badge rounded-pill text-bg-dark fs-2"><?php echo $jumlah_article; ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card border border-dark-subtle mb-3 shadow" style="max-width: 18rem;">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div class="p-3">
                        <h5 class="card-title"><i class="bi bi-newspaper"></i> Gallery</h5>
                    </div>
                    <div class="p-3">
                        <span class="badge rounded-pill text-bg-dark fs-2"><?php echo $jumlah_gallery; ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card border border-dark-subtle mb-3 shadow" style="max-width: 18rem;">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div class="p-3">
                        <h5 class="card-title"><i class="bi bi-newspaper"></i> User</h5>
                    </div>
                    <div class="p-3">
                        <span class="badge rounded-pill text-bg-dark fs-2"><?php echo $jumlah_user; ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>