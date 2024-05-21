<!-- <div class="container"> -->
<div class="navbar">
    <div class="nav-left">
        <p class="e">e<span class="sakip">SAKIP</span></p>
        <!-- <h3 style="margin:10px; color:white">|</h3> -->
        <div class="lambang-pemprov-container">
            <img src="<?= base_url('/assets/img/home/logolobar.jpeg') ?>" alt="" class="lambang-pemprov">
            <span>
                <h5>Pemerintah Kabupaten Lombok Barat</h5>
            </span>
        </div>
    </div>
    <div class="nav-right">
        <ul>
            <li class="home"><a href="#home">Beranda</a></li>
            <li class="about"><a href="#about">Tentang</a></li>
            <li class="regulation"><a href="#regulation">Regulasi</a></li>
            <li class="contact"><a href="#contact">Kontak Kami</a></li>
            <!-- <button type="button" class="btn-login">Login</button> -->
            <li class="btn-login">
                <a href="<?= base_url('Autentikasi') ?>">Login</a>
            </li>
        </ul>
    </div>
</div>

<div class="content">
    <!-- Home -->
    <div class="landing home" id="home">

        <img src="<?= base_url('/assets/img/home/kantor bupati lobar.jpg'); ?>" alt="" class="bg-img">
        <div class="headline-about">
            <h5 class="hidden">Selamat Datang di</h5>
            <h1 class="sakip-highlight hidden"><span> Sistem Akuntabilitas Kinerja Instansi Pemerintah Kabupaten Lombok Barat</span></h1>
            <h1 class="sakip-highlight hidden"><span> Realisasi RKT</span></h1>
        </div>
    </div>

    <!-- About -->
    <div class="landing about" id="about">
        <h1 class="hidden">Tentang <span class="e">e</span>SAKIP</h1>
        <div class="filler hidden">
            <div class="persegi-panjang biru">
            </div>
            <div class="persegi-panjang putih"></div>
        </div>

        <img src="<?= base_url('/assets/img/home/garuda.svg'); ?>" alt="" class="img-garuda hidden" height="300" width="300">

        <!-- <div class="glass-bg desc hidden"> -->
        <p class="sakip-desc">
            E - SAKIP adalah aplikasi Sistem Akuntabilitas Kinerja Instansi Pemerintah yang bertujuan untuk memudahkan proses pemantauan dan pengendalian kinerja dalam rangka meningkatkan akuntabilitas dan kinerja unit kerja. APLIKASI ini menampilkan proses perencanaan kinerja, penganggaran kinerja, keterkaitan kegiatan/sub kegiatan dalam pencapaian target kinerja, dan monitoring serta evaluasi pencapaian kinerja dan keuangan.
        </p>
        <!-- </div> -->
    </div>
    <div class="strip-login">
        <div class="bungkus-strip-login hidden">
            <h2 class="hidden">Silahkan Login Terlebih Dahulu Untuk Dapat Masuk ke Sistem.</h2>
            <a href="<?php echo base_url('autentikasi') ?>" class="strip btn-login hidden">Login</a>
        </div>

        
    </div>

    <!-- Regulation -->
    <div class="landing regulation" id="regulation">
        <h1 class="hidden">Peraturan Terkait <span class="e">e</span>SAKIP</h1>
        <!-- <img src="<?= base_url('/assets/img/home/illustrations-regulation-page.svg') ?>" alt="" height="400" width="400" class="hidden"> -->
        <div class="glass-bg regulation hidden">
            <!-- Nanti akan berupa link yang akan mendownload dokumen tentang aturan-aturan -->
            <p>1. Peraturan Presiden Nomor 29 Tahun 2014 tentang Sistem Akuntabilitas Kinerja Instansi Pemerintah</p>
            <p>2. Peraturan Menteri Pendayagunaan Aparatur Negara dan Reformasi Birokrasi Republik Indonesia Nomor 53 Tahun 2014 tentang Petunjuk Teknis Perjanjian Kinerja, Pelaporan Kinerja, dan Tata Cara Reviu atas Laporan Kinerja Instansi Pemerintah</p>
            <p>3. Peraturan Menteri Pendayagunaan Aparatur Negara dan Reformasi Birokrasi Republik Indonesia Nomor 88 Tahun 2021 tentang Evaluasi Akuntabilitas Kinerja Instansi Pemerintah</p>
            <p>4. Keputusan Gubernur Sulawesi Utara Nomor 36a Tahun 2022 tentang Pedoman Pelaksanaan Sistem Akuntabilitas Kinerja Instansi Pemerintah di Lingkungan Provinsi Sulawesi Utara</p>
            <p>5. Keputusan Gubernur Sulawesi Utara Nomor 104 Tahun 2022 tentang Pembentukan Tim Evaluasi Akuntabilitas Kinerja Instansi Pemerintah Di Lingkungan Pemerintah Provinsi Sulawesi Utara</p>
        </div>
    </div>

    <div class="strip-login">
        <div class="bungkus-strip-login hidden">
            <h2 class="hidden">Silahkan Login Terlebih Dahulu Untuk Dapat Masuk ke Sistem.</h2>
            <a href="<?php echo base_url('autentikasi') ?>" class="strip btn-login hidden">Login</a>
        </div>
    </div>

    <div class="main-content-perencanaan-kinerja">
        <table class="table-perencanaan">
            <thead>
                <tr>
                    <th>Nomor</th>
                    <th>Pengirim</th>
                    <th>Jenis Dokumen</th>
                    <th>Nama dokumen</th>
                    <th>Waktu Pengiriman</th>
                    <th>Download</th>

                </tr>
            </thead>
            <tbody>
                <?php
                $nomor =  $this->uri->segment(3) ? $this->uri->segment(3) + 1  : 1;

                foreach ($data as $baris) :
                ?>
                    <tr>
                        <td><?= $nomor ?></td>
                        <td><?= $baris['opd'] ?></td>
                        <td><?= $baris['jenis_dok'] ?></td>
                        <td><?= $baris['nama_dok'] ?></td>
                        <td><?= $baris['date'] ?></td>
                        <td><a class="fa-solid fa-download" href="<?= base_url(); ?>download/download/<?= $baris['id'] ?>"></a></td>
                        <!-- <td><i class="<?= $baris['pk_perubahan'] ?>"></i></td> -->
                    </tr>
                <?php
                    $nomor++;
                endforeach;
                ?>
            </tbody>
        </table>

        <div class="footer-for-pagination">
            <div class="button-pagination">
                <?php echo $pagination ?>
            </div>
        </div>
    </div>

    <!-- Kontak -->
    <div class="landing contact" id="contact">
        <h1 class="hidden">Kontak Kami</h1>
        <div class="filler hidden">
            <div class="persegi-panjang biru">
            </div>
            <div class="persegi-panjang putih"></div>
        </div>
        <div class="list-kontak hidden">
            <div class="kontak">
                <div class="icon-wrapper-kontak">
                    <i class="fa-solid fa-mobile-screen" style="font-size: 25px;"></i>
                </div>
                <h5>Admin: 085205538693 (Randi) | 081261352722(Ali)</h5>
            </div>
            <div class="kontak">
                <div class="icon-wrapper-kontak">
                    <i class="fa-solid fa-envelope" style="font-size: 25px;"></i>
                </div>
                <h5>biroorganisasi.sulutprov@gmail.com</h5>
            </div>
            <div class="kontak">
                <div class="icon-wrapper-kontak">
                    <i class="fa-solid fa-location-dot" style="font-size:25px"></i>
                    <!-- <i class="bi bi-geo-alt-fill" style="height: 25px; width: 25px;"></i> -->
                </div>
                <h5>
                    Jl. 17 Agustus No.69, Teling Atas, Kec. Wanea, Kota Manado, Sulawesi Utara</h5>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <div class="footer-content">
            <h3>Anda bisa temukan kami juga di</h3>
            <div class="list-medsos hidden">
                <div class="medsos">
                    <div class="icon-wrapper-medsos">
                        <i class="fa-brands fa-facebook" style="font-size: 25px;"></i>
                    </div>
                    <p>Biroorganisasi Setdaprovsulut</p>
                </div>
                <div class="medsos">
                    <div class="icon-wrapper-medsos">
                        <i class="fa-brands fa-instagram" style="font-size: 25px;"></i>
                    </div>
                    <p>Biroorganisasi</p>
                </div>
                <div class="medsos">
                    <div class="icon-wrapper-medsos">
                        <i class="fa-brands fa-twitter" style="font-size: 25px;"></i>
                    </div>
                    <p>@Biro_Organisasi</p>
                </div>
            </div>
            <h5 class="hidden">e-SAKIP Biro Organisasi Pemerintah Provinsi Sulawesi Utara 2022</h5>
        </div>
    </div>
</div>
<!-- </div> -->