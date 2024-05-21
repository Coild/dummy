<div class="sidebar-container">
    <div class="sidebar" id="sidebar">
        <div class="header">
            <a href="" class="logo-esakip" id="logo-esakip">
                <img src="<?= base_url('/assets/img/sidebar/eSakip.svg') ?>" alt="" width="100px">
            </a>
            <!-- <img src="<?= base_url('/assets/img/sidebar/List.svg') ?>" alt="" width="35px"> -->
            <div class="list-bar" id="list-bar">
                <i class="fa-solid fa-bars"></i>
            </div>
        </div>
        <div class="sidebar-content">
            <div class="menu dashboard" id="menu">
                <i class="fa-solid fa-gauge-high"></i>
                <a href="<?= base_url('user/') ?>">
                    <p>Dashboard</p>
                </a>
                <span class="tooltip">Dashboard</span>
            </div>
            <div class="menu komponen-sakip">
                <i class="fa-regular fa-file"></i>
                <!-- <a href="<?= base_url('user/dokumen') ?>"> -->
                <p>Dokumen SAKIP</p>
                <!-- </a> -->
                <i class="fa-solid fa-chevron-down panah-sakip"></i>
                <span class="tooltip">Dokumen SAKIP
                </span>
            </div>
            <ul class="dropdown bagian-komponen-sakip">
                <li class="komponen nonactive">
                    <a href="<?= base_url('user/perencanaan_kinerja') ?>">
                        Perencanaan Kinerja
                    </a>
                </li>
                <li class="komponen nonactive">
                    <a href="<?= base_url('user/pengukuran_kinerja') ?>">
                        Pengukuran Kinerja
                    </a>
                </li>
                <li class="komponen nonactive">
                    <a href="<?= base_url('user/pelaporan_kinerja') ?>">
                        Pelaporan Kinerja
                    </a>
                </li>
                <li class="komponen nonactive">
                    <a href="<?= base_url('user/evaluasi_kinerja') ?>">
                        Evaluasi Kinerja
                    </a>
                </li>
            </ul>
            <div class="menu informasi">
                <!-- <img src="<?= base_url('/assets/img/sidebar/Information.svg') ?>" alt="" height="25"> -->
                <i class="fa-regular fa-message"></i>
                <a href="<?= base_url('user/informasi') ?>">
                    <p>Informasi</p>
                </a>
                <span class="tooltip">Informasi</span>
            </div>

            <div class="menu faq">
                <i class="fa-solid fa-question"></i>
                <a href="<?= base_url('user/faq') ?>">
                    <p>FAQ</p>
                </a>
                <span class="tooltip">FAQ</span>
            </div>
        </div>
        <div class="profile">
            <img src="<?= base_url('/assets/img/sidebar/user_esakip.png') ?> " alt="" height="50" width="50">
            <div class="data-profile">
                <h4><?php echo $this->session->userdata('name'); ?></h4>
                <p><?php echo $this->session->userdata('access'); ?></p>
            </div>
            <!-- action untuk logout -->
            <a href="<?php echo site_url('autentikasi/logout'); ?>" class="logout">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
            <span class="tooltip for-profile">Profile/Keluar</span>
        </div>
    </div>
</div>

<script src="<?= base_url('/assets/js/sidebar.js') ?>"></script>