<?php
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <link rel="stylesheet" href="./style.css" />
    <title>MyBlog</title>
</head>

<body>
    <!-- start nav -->
    <nav class="navbar navbar-expand-lg bg-dark shadow-sm p-2 fixed-top">
        <div class="container">
            <a class="navbar-brand text-white fw-bold fs-4" href="#">
                <span class="text-secondary">My</span>Blog</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="btn btn-light text-primary navbar-toggler-icon rounded"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active text-light fs-5 ms-3" aria-current="page" href="#hero">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-light fs-5 ms-3" aria-current="page" href="#profil">Profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light fs-5 ms-3" href="#article">Article</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light fs-5 ms-3" href="#gallery">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light fs-5 ms-3" href="#jadwal">Schedule</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light fs-5 ms-3" href="#contact">Contact</a>
                    </li>
                    <li class="nav-item dropdown">
                        <?php
                        session_start();

                        // Cek apakah username sudah tersimpan dalam session
                        if (isset($_SESSION['username'])) {
                            $username = $_SESSION['username'];

                            $stmt = $conn->prepare("SELECT * FROM user WHERE username = ?");
                            $stmt->bind_param("s", $username);
                            $stmt->execute();
                            $result = $stmt->get_result();

                            // Periksa apakah query berhasil dan data ditemukan
                            if ($result && $row = $result->fetch_assoc()) {
                                $username = htmlspecialchars($row['username']); 
                                $foto = htmlspecialchars($row['foto']);         

                                // Tampilkan informasi user
                                echo '<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">';
                                echo '<img src="uploads/' . $foto . '" alt="Foto Profil" style="border-radius: 50%; width: 30px; height: 30px; margin-right: 10px;">'; // Foto dengan gap
                                echo '<span style="color: white;">' . $username . '</span>';
                                echo '</a>';
                                echo '<ul class="dropdown-menu" aria-labelledby="navbarDropdown"; border: none;">'; 
                                echo '<li><a class="dropdown-item" href="admin.php">Admin</a></li>';
                                echo '<li><a class="dropdown-item" href="logout.php">Logout</a></li>';
                                echo '</ul>';
                            } else {
                                // Jika data user tidak ditemukan
                                echo "Data user tidak ditemukan.";
                            }

                            $stmt->close(); // Tutup prepared statement
                        } else {
                            // Jika session username tidak ditemukan
                            echo '<a class="nav-link" href="login.php">Login</a>';
                        }
                        ?>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <!-- end nav -->

    <!-- start login/regis -->
    <div class="modal fade" id="login" aria-hidden="true" aria-labelledby="login" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="login">Login</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="login.php" method="POST" enctype="multipart/form-data">
                        <div class="input-group mb-3">
                            <input type="email" name="email" id="email"
                                class="form-control form-control-lg bg-light fs-6" placeholder="Email Address"
                                required />
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" name="password" id="password"
                                class="form-control form-control-lg bg-light fs-6" placeholder="Password" required />
                        </div>
                        <div class="input-group mb-3 d-flex justify-content-between">
                            <div class="form-check">
                                <input type="checkbox" name="formCheck" id="formCheck" class="form-check-input"
                                    required />
                                <label for="formCheck" class="form-check-label text-secondary">Remember Me</label>
                            </div>
                            <div class="forgot">
                                <small><a href="#">Forgot Password?</a></small>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="submit" name="regis" value="Login" class="btn btn-lg btn-dark w-100 fs-6" />
                        </div>
                        <div class="row text-center">
                            <small>Don't have an account?
                                <a href="./register.html">Register</a></small>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- ends login/regis -->

    <!-- start hero -->
    <section id="hero" class="p5 bg-light-subtle">
        <div class="container mb-5">
            <div class="row d-flex flex-sm-row-reverse justify-content-center vh-100 align-items-center mt-5">
                <div class="col-lg-6">
                    <div class="home-image text-sm-end">
                        <img src="./assets/img/profil.png" class="img-fluid mt-lg-auto" width="400" alt="profil" />
                    </div>
                </div>
                <div class="col-lg-6 text-sm-start mt-lg-5">
                    <p class="fw-bold display-4">WELCOME TO MY BLOG</p>
                    <h1 class="pb-5 mb-5">
                        Hi, I'm <span>Auliya</span> <br />
                        Shadrina Nabilah
                    </h1>
                </div>
            </div>
        </div>
    </section>
    <!-- end hero -->

    <!-- start profil -->
    <section id="profil" class="bg-dark">
        <div class="container text-white p-5 mb-5">
            <div class="title text-center pt-3 mb-4">
                <h1 class="fw-bold">Profil</h1>
                <p class="text-secondary">Ini adalah tentang saya</p>
            </div>
            <div class="row d-flex flex-sm-row justify-content-center align-items-center mt-5">
                <div class="col-lg-6">
                    <div class="profil-image text-sm-center">
                        <img src="./assets/img/profil2.jpg" class="img-fluid mt-lg-auto" alt="profil" />
                    </div>
                </div>
                <div class="col-lg-6 text-sm-start mt-lg-5">
                    <div class="card kartuProfil justify-content-center align-items-center text-white">
                        <div class="card-body p-4">
                            <div class="text-sm-center">
                                <h4 class="card-title">AULIYA SHADRINA NABILAH</h4>
                                <h6 class="card-subtitle mb-4 text-white-50">
                                    Mahasiswa Teknik Informatika
                                </h6>
                            </div>
                            <table>
                                <tr>
                                    <td style="width: 120px">NIM</td>
                                    <td>: A11.2023.15205</td>
                                </tr>
                                <tr>
                                    <td style="width: 120px">Program Studi</td>
                                    <td>: Teknik Informatika</td>
                                </tr>
                                <tr>
                                    <td style="width: 120px">Email</td>
                                    <td>: 111202315205@mhs.dinus.ac.id</td>
                                </tr>
                                <tr>
                                    <td style="width: 120px">Telepon</td>
                                    <td>: +62 85326760482</td>
                                </tr>
                                <tr>
                                    <td style="width: 120px">Alamat</td>
                                    <td>: Slawi, Kabupaten Tegal</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end profil -->

    <!-- start article -->
    <section id="article" class="bg-light-subtle">
        <div class="container p-5">
            <div class="title text-center pt-3 mb-4">
                <h1 class="fw-bold">Article</h1>
                <p class="text-secondary">Ini adalah prestasi saya</p>
            </div>
            <div class="row row-cols-1 row-cols-md-2 g-4">
                <!-- row-cols-1 buat responsive itu cardnya 1 ke bawah, row-cols-md-2 md-2 itu artinya tampilan saat desktop 2 card -->
                <?php
            $sql = "SELECT * FROM article ORDER BY tanggal DESC";
            $hasil = $conn->query($sql); 

            while($row = $hasil->fetch_assoc()){
            ?>
                <div class="col">
                    <div class="card h-100">
                        <img src="assets/img/<?= $row["gambar"]?>" class="card-img-top p-3" alt="..." />
                        <div class="card-body">
                            <h5 class="card-title"><?= $row["judul"]?></h5>
                            <p class="card-text">
                                <?= $row["isi"]?>
                            </p>
                        </div>
                        <div class="card-footer">
                            <small class="text-body-secondary">
                                <?= $row["tanggal"]?>
                            </small>
                        </div>
                    </div>
                </div>
                <?php
        }
        ?>
            </div>
        </div>
    </section>
    <!-- end article -->

    <!-- start gallery -->
    <section id="gallery" class="bg-dark">
        <div class="container text-white mt-5 p-5">
            <div class="title text-center pt-3 mb-4">
                <h1 class="fw-bold">Gallery</h1>
                <p class="text-secondary">Cerita di Perkuliahan</p>
            </div>
            <div id="carouselExampleFade" class="carousel slide carousel-fade">
                <div class="carousel-inner">
                    <?php
                $sql = "SELECT * FROM gallery";
                $hasil = $conn->query($sql);
                $active = true;
                while($row = $hasil->fetch_assoc()) {
                    $foto = $row["foto"];
                ?>
                    <div class="carousel-item <?= $active ? 'active' : '' ?>">
                        <img src="assets/img/<?= htmlspecialchars($foto) ?>" class="d-block w-100" />
                    </div>
                    <?php
                    $active = false;
                }
                ?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>
    <!-- end gallery -->

    <!-- start Schedule -->
    <section id="jadwal">
        <div class="container mt-5 p-5">
            <div class="title text-center pt-3 mb-4">
                <h1 class="fw-bold">Schedule</h1>
                <p class="text-secondary">Jadwal di Perkuliahan</p>
            </div>
            <div class="row row-cols-1 row-cols-md-4 g-4 justify-content-center text-sm-center">
                <div class="col">
                    <div class="card h-100 border-dark mb-3" style="max-width: 18rem">
                        <div class="card-header bg-dark text-white">
                            <h5>SENIN</h5>
                        </div>
                        <div class="card-body">
                            <h6 class="card-title">12.30 - 15.00</h6>
                            <p class="card-text">
                                PROBABILITAS DAN STATISTIKA <br />
                                Ruang H.4.8
                            </p>
                            <h6 class="card-title">15.30 - 18.00</h6>
                            <p class="card-text">
                                SISTEM OPERASI <br />
                                Ruang H.4.9
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100 border-dark mb-3" style="max-width: 18rem">
                        <div class="card-header bg-dark text-white">
                            <h5>SELASA</h5>
                        </div>
                        <div class="card-body">
                            <h6 class="card-title">09.30 - 12.00</h6>
                            <p class="card-text">
                                RPL <br />
                                Ruang H.4.8
                            </p>
                            <h6 class="card-title">15.30 - 18.00</h6>
                            <p class="card-text">
                                PENAMBANGAN DATA <br />
                                Ruang H.4.9
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100 border-dark mb-3" style="max-width: 18rem">
                        <div class="card-header bg-dark text-white">
                            <h5>RABU</h5>
                        </div>
                        <div class="card-body">
                            <h6 class="card-title">09.30 - 12.00</h6>
                            <p class="card-text">
                                KRIPTOGRAFI <br />
                                Ruang H.4.8
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100 border-dark mb-3" style="max-width: 18rem">
                        <div class="card-header bg-dark text-white">
                            <h5>KAMIS</h5>
                        </div>
                        <div class="card-body">
                            <h6 class="card-title">09.30 - 12.00</h6>
                            <p class="card-text">
                                LOGIKA INFORMATIKA <br />
                                Ruang H.4.8
                            </p>
                            <h6 class="card-title">14.10 - 15.50</h6>
                            <p class="card-text">
                                BASIS DATA <br />
                                Ruang H.4.9
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100 border-dark mb-3" style="max-width: 18rem">
                        <div class="card-header bg-dark text-white">
                            <h5>JUMAT</h5>
                        </div>
                        <div class="card-body">
                            <h6 class="card-title">10.20 - 12.00</h6>
                            <p class="card-text">
                                PEMROGRAMAN BERBASIS WEB <br />
                                Ruang H.4.8
                            </p>
                            <h6 class="card-title">14.10 - 15.50</h6>
                            <p class="card-text">
                                BASIS DATA <br />
                                Ruang H.4.9
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100 border-dark mb-3" style="max-width: 18rem">
                        <div class="card-header bg-dark text-white">
                            <h5>SABTU</h5>
                        </div>
                        <div class="card-body">
                            <h6 class="card-title">06.00 - 09.00</h6>
                            <p class="card-text">
                                BERSIH-BERSIH KOS <br />
                                KOS
                            </p>
                            <h6 class="card-title">09.30 - 18.00</h6>
                            <p class="card-text">
                                BELAJAR <br />
                                KOS
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100 border-dark mb-3" style="max-width: 18rem">
                        <div class="card-header bg-dark text-white">
                            <h5>MINGGU</h5>
                        </div>
                        <div class="card-body">
                            <h6 class="card-title">06.00 - 09.00</h6>
                            <p class="card-text">
                                BERSIH-BERSIH KOS <br />
                                KOS
                            </p>
                            <h6 class="card-title">09.30 - 18.00</h6>
                            <p class="card-text">
                                BELAJAR <br />
                                KOS
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end Schedule -->

    <!-- start contact -->
    <section id="contact" class="bg-dark">
        <div class="container text-white p-5">
            <div class="">
                <div class="title text-center pt-3 mb-4">
                    <h1 class="fw-bold">Contact</h1>
                    <p class="text-secondary">Hubungi saya</p>
                </div>
                <div class="row d-flex flex-sm-row justify-content-center align-items-center mt-5">
                    <div class="col-lg-6">
                        <div class="bukutamu text-sm-start" id="bukutamu">
                            <form method="post" action="tampil.php" target="_blank">
                                <div class="box">
                                    <div class="input-buktam">
                                        <input type="text" name="nama" id="nama" placeholder="Nama Lengkap" required />
                                    </div>
                                    <div class="input-buktam">
                                        <input type="email" name="email" id="email" placeholder="Email" required />
                                    </div>
                                </div>
                                <div class="pesan">
                                    <textarea name="pesan" id="pesan" cols="30" rows="5" placeholder="Pesan Anda"
                                        required></textarea>
                                </div>
                                <button type="submit" class="btn btn-outline-secondary">
                                    Submit
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6 align-content-center">
                        <div class="text-center p-3">
                            <h4>Follow Me!</h4>
                            <a href="https://www.linkedin.com/in/auliyashadrinanabilah/" target="_blank"><i
                                    class="bi bi-linkedin text-white fs-3 m-2"></i></a>
                            <a href="https://www.instagram.com/auliya.sn_/?hl=id" target="_blank"><i
                                    class="bi bi-instagram text-white fs-3 m-2"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end contact -->

    <!-- start footer -->
    <footer class="container-fluid bg-light text-center bg-dark p-3 justify-content-center">
        <p class="text-white">
            Copyright &#169; 2024, Auliya Shadrina Nabilah, All Rights Reserved
        </p>
    </footer>
    <!-- end footer -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>