<div class="autentikasi-container">


    <div class="form-autentikasi-container">
        <h1>Login</h1>
        <p>Silahkan bapak/ibu perangkat daerah untuk memasukkan data agar dapat masuk ke sistem.</p>
        <br>
        <?php echo $this->session->flashdata('msg'); ?>
        <form action="<?= base_url('Autentikasi/autentikasi'); ?>" method="POST" class="form-autentikasi">
            <label for="input-username">Email</label>
            <input id="email" name="email" type="email" placeholder="Isi email anda..." required>

            <label for="input-password">Password</label>
            <div class="password-wrapper">
                <input id="password" name="pass" type="password" placeholder="Isi password anda..." required>
                <i class="fa-solid fa-eye" onclick="myFunction()"></i>
            </div>
            <button type="submit" class="btn-login autentikasi">Login</button>

        </form>
    </div>
    <!-- <div class="headline-container">
        <h1 class="e">e<span class="sakip">SAKIP</span></h1>
        <h3>Sistem Akuntabilitas Kinerja
            Instansi Pemerintahan</h3>
        <p>Biro Organisasi Pemerintah Provinsi Sulawesi Utara</p>

    </div> -->

</div>