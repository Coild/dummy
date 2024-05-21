<div class="profile-container">
    <div class="main-content-profile">
        <div class="profile-content">
            <div class="img-container">
                <img src="<?= base_url('/assets/img/sidebar/user_esakip.png') ?>" alt="" height="150" width="150">
            </div>
            <div class="data-profile-container">
                <?php foreach ($users as $u) : ?>
                    <div class="data-profile-left">
                        <div class="n-data-profile">
                            <h5>Username:</h5>
                            <p><?php echo $u->user_name; ?></p>
                        </div>
                        <div class="n-data-profile">
                            <h5>Gelar Depan:</h5>
                            <p><?php echo $u->gelar_depan; ?></p>
                        </div>
                        <div class="n-data-profile">
                            <h5>Gelar Belakang: </h5>
                            <p><?php echo $u->gelar_belakang; ?></p>
                        </div>
                        <div class="n-data-profile">
                            <h5>Unit Kerja: </h5>
                            <p><?php echo $u->golongan; ?></p>
                        </div>
                        <div class="n-data-profile">
                            <h5>Nama Penanggung Jawab:</h5>
                            <p><?php echo $u->jabatan; ?></p>
                        </div>
                        <div class="n-data-profile">
                            <h5>No Telepon Kantor:</h5>
                            <p><?php echo $u->no_tlp_kantor; ?></p>
                        </div>
                    </div>
                    <div class="data-profile-right">
                        <div class="n-data-profile">
                            <h5>Eselon:</h5>
                            <p><?php echo $u->eselon; ?></p>
                        </div>
                        <div class="n-data-profile">
                            <h5>Tingkat Golongan:</h5>
                            <p><?php echo $u->golongan; ?></p>
                        </div>
                        <div class="n-data-profile">
                            <h5>NIP:</h5>
                            <p><?php echo $u->NIP; ?></p>
                        </div>
                        <div class="n-data-profile">
                            <h5>Jabatan:</h5>
                            <p><?php echo $u->jabatan; ?></p>
                        </div>
                        <div class="n-data-profile">
                            <h5>No. HP:</h5>
                            <p><?php echo $u->no_hp; ?></p>
                        </div>

                        <div class="n-data-profile">
                            <h5>Di Update:</h5>
                            <p><?php echo $u->date_update; ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>


<style>
    .main-content-profile {
        width: 100%;
        height: 100vh;
        display: flex;
        justify-content: center;
    }

    .profile-content {
        margin-top: 40px;
        width: 40%;
        height: 70%;
        background: white;
        border-radius: 15px;
    }

    .img-container {
        display: flex;
        justify-content: center;
    }

    .profile-content .img-container img {
        border-radius: 0px;
    }

    .data-profile-container {
        width: 100%;
        display: flex;
        gap: 2rem;
        justify-content: center;
        margin-top: 30px;
        background: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 7px 18px 19px -8px rgba(0, 0, 0, 0.43);
        -webkit-box-shadow: 7px 18px 19px -8px rgba(0, 0, 0, 0.43);
        -moz-box-shadow: 7px 18px 19px -8px rgba(0, 0, 0, 0.43);
    }

    .data-profile-left,
    .data-profile-right {
        width: 40%;
        display: flex;
        flex-direction: column;
    }



    .data-profile-container .n-data-profile {
        /* display: flex; */
        border-bottom: 2px solid black;
        margin-bottom: 10px;
        width: 100%;
        /* justify-content: space-between; */
        gap: 2rem;
    }


    .data-profile-container h5 {
        color: black;
        /* background: rgba(163, 200, 205, 1); */

    }
</style>