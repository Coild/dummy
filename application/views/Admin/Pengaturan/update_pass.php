<div class="user-opd-container">
    <div class="main-content-edit-data">
        <div class="pilih-user-opd">
            <span>
                <label for="daftar-user">Pilih User
                    <i class="fa-solid fa-chevron-down"></i>
                </label>
            </span>
            <ul name="" id="" class="daftar-user">
                <?php foreach ($users as $u) : ?>
                    <li class="pilih-user">
                        <?php if ($u->user_akses == '2') { ?>
                            <a href="<?php echo base_url() . "admin_sakip_sulut/pass_update/" . $u->user_id; ?>"><?php echo $u->user_name; ?></a>
                        <?php } ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <?php foreach ($userID as $user) : ?>
            <form action="<?= base_url('admin_sakip_sulut/pass'); ?>" class="form-update-data" method="POST">

                <center>
                    <br>
                    <p>Update Password <span style="color: #82C3EC;"><b><?php echo $user->user_name; ?></b></span></p>
                    <br>
                </center>

                <input type="hidden" id="user_id" name="user_id" value="<?php echo $user->user_id; ?>">

                <label for="email-modal">Ganti Password</label>
                <input name="user_password" type="text" id="user_password" placeholder="Masukan Password Baru" required>


                <button type="submit" class="btn-edit-user" style="margin-top: 30px;">Edit</button>
            </form>
        <?php endforeach; ?>
    </div>
</div>