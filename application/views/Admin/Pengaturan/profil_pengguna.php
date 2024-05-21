<div class="profil-pengguna-container">
    <div class="penjelasan-singkat">
        <p>Bapak/Ibu dapat mengedit profil untuk admin disini.</p>
    </div>
    <div class="main-content-profil-pengguna-container">
        <form action="<?= base_url('admin_sakip_sulut/ubah_profile_admin'); ?>" method="POST" class="form-profil-pengguna">
            <div class="input-pengaturan-wrapper kiri">
                <?php foreach ($users as $u) : ?>
                    <input type="hidden" name="id" id="id" value="<?php echo $u->id; ?>">

                    <label for="username">Username</label>
                    <input name="user_name" type="text" id="username" value="<?php echo $u->user_name; ?>">

                    <label for="gelar-depan">Gelar Depan</label>
                    <input name="gelar_depan" type="text" id="gelar-depan" value="<?php echo $u->gelar_depan; ?>">

                    <label for="nama-penanggung-jawab">Nama Penanggung Jawab</label>
                    <input name="nama_admin" type="text" id="nama-penanggung-jawab" value="<?php echo $u->nama_admin; ?>">

                    <!-- golongan dropdown -->
                    <label for="golongan">golongan</label>
                    <input name="golongan" type="text" id="golongan" value="<?php echo $u->golongan; ?>">

                    <label for="jabatan">Jabatan</label>
                    <input name="jabatan" type="text" id="jabatan" value="<?php echo $u->jabatan; ?>">

                    <label for="no-hp">No. HP</label>
                    <input name="no_hp" type="text" id="no-hp" value="<?php echo $u->no_hp; ?>">
            </div>

            <div class="input-pengaturan-wrapper kanan">
                <label for="gelar-belakang">Gelar Belakang</label>
                <input name="gelar_belakang" type="text" id="gelar-belakang" value="<?php echo $u->gelar_belakang; ?>">

                <label for="nama-unit-kerja">Nama Unit Kerja</label>
                <input name="unit_kerja" type="text" id="nama-unit-kerja" value="<?php echo $u->unit_kerja; ?>">

                <label for="tingkat-eselon">Tingkat Eselon</label>
                <input name="eselon" type="text" id="tingkat-eselon" value="<?php echo $u->eselon; ?>">

                <label for="nip">NIP</label>
                <input name="NIP" type="text" id="nip" value="<?php echo $u->NIP; ?>">

                <label for="no-telp-kantor">No. Telp Kantor</label>
                <input name="no_tlp_kantor" type="text" id="no-telp-kantor" value="<?php echo $u->no_tlp_kantor; ?>">

                <button type="submit" class="btn-simpan-profil-pengguna" id="btn-simpan-profil-pengguna">Simpan</button>
            </div>
        <?php endforeach; ?>
        </form>

    </div>
</div>