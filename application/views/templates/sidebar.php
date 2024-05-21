<div class="sidebar-container">
    <div class="sidebar" id="sidebar">
        <div class="header">
            <a href="<?php echo base_url('admin_sakip_sulut/index') ?>" class="logo-esakip" id="logo-esakip">
                <img src="<?= base_url('/assets/img/sidebar/eSakip.svg') ?>" alt="" width="100px">
            </a>
            <!-- <img src="<?= base_url('/assets/img/sidebar/List.svg') ?>" alt="" width="35px"> -->
            <div class="list-bar" id="list-bar">
                <i class="fa-solid fa-bars"></i>
            </div>
        </div>
        <div class="sidebar-content">
            <a href="<?php echo base_url('admin_sakip_sulut/index') ?>" class="menu dashboard">
                <i class="fa-solid fa-gauge-high"></i>
                <p>Dashboard</p>
                <span class="tooltip">Dashboard</span>
            </a>

            <div class="menu komponen-sakip">
                <i class="fa-regular fa-file"></i>
                <p>Komponen SAKIP</p>
                <i class="fa-solid fa-chevron-down panah-sakip "></i>
                <span class="tooltip">Dokumen SAKIP
                    <!-- <ul class="dropdown bagian-komponen-sakip">
                    <li class="komponen nonactive">Perencanaan Kinerja</li>
                    <li class="komponen nonactive">Pengukuran Kinerja</li>
                    <li class="komponen nonactive">Pelaporan Kinerja</li>
                    <li class="komponen nonactive">Evaluasi Kinerja</li>
                </ul> -->
                </span>
            </div>
            <ul class="dropdown bagian-komponen-sakip ">
                <li class="komponen nonactive">
                    <a href="<?php echo base_url('admin_sakip_sulut/perencanaan_kinerja') ?>">
                        Perencanaan Kinerja
                    </a>
                </li>
                <li class="komponen nonactive">
                    <a href="<?php echo base_url('admin_sakip_sulut/pengukuran_kinerja') ?>">
                        Pengukuran Kinerja
                    </a>
                </li>
                <li class="komponen nonactive">
                    <a href="<?php echo base_url('admin_sakip_sulut/pelaporan_kinerja') ?>">
                        Pelaporan Kinerja
                    </a>
                </li>

                <li class="komponen nonactive">
                    <a href="<?php echo base_url('admin_sakip_sulut/evaluasi_kinerja') ?>">
                        Evaluasi Kinerja
                    </a>
                </li>
            </ul>

            <a href="<?php echo base_url('admin_sakip_sulut/informasi') ?>" class="menu informasi">
                <!-- <img src="<?= base_url('/assets/img/sidebar/Information.svg') ?>" alt="" height="25"> -->
                <i class="fa-regular fa-message"></i>
                <p>Informasi</p>
                <span class="tooltip">Informasi</span>
            </a>
            <!-- USER TIDAK ADA PENGATURAN -->
            <!-- PAKE DROP DOWN (
            1. PROFIL PENGGUNA
            2. UBAH EMAIL/PASSSWORD
            3. USER OPD
            )-->
            <div class="menu list-pengaturan">
                <!-- <img src="<?= base_url('/assets/img/sidebar/Pengaturan.svg') ?>" alt="" width="30"> -->
                <i class="fa-solid fa-gear"></i>
                <p>Pengaturan</p>
                <i class="fa-solid fa-chevron-down panah-pengaturan "></i>
                <span class="tooltip">Pengaturan</span>
            </div>
            <ul class="dropdown bagian-pengaturan">
                <li class="pengaturan nonactive">
                    <a href="<?php echo base_url('admin_sakip_sulut/profil_pengguna') ?>">
                        Profil Pengguna
                    </a>
                </li>
                <!-- <li class="pengaturan nonactive">Ubah Email</li> -->
                <li class="pengaturan nonactive">
                    <a href="<?= base_url('admin_sakip_sulut/user_opd') ?>">
                        User OPD
                    </a>
                </li>
            </ul>

            <div class="menu faq">
                <i class="fa-solid fa-question"></i>
                <a href="<?= base_url('admin_sakip_sulut/faq') ?>">
                    <p>FAQ</p>
                </a>
                <span class="tooltip">FAQ</span>
            </div>
        </div>
        <div class="profile">
            <a href="<?= base_url('admin_sakip_sulut/profile') ?>"> <img src="<?= base_url('/assets/img/sidebar/user_esakip.png') ?> " alt="" height="50" width="50"></a>
            <div class="data-profile">
                <a href="<?= base_url('admin_sakip_sulut/profile') ?>">
                    <h4><?php echo $this->session->userdata('name'); ?></h4>
                </a>
                <a href="<?= base_url('admin_sakip_sulut/profile') ?>">
                    <p><?php echo $this->session->userdata('access'); ?></p>
                </a>
            </div>
            <a href="<?php echo site_url('autentikasi/logout'); ?>" class="logout">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
            <span class="tooltip for-profile">Profile/Keluar</span>
        </div>
    </div>
</div>
<script src="<?= base_url('/assets/js/sidebar.js') ?>"></script>