<div class="ubah-pass-container">
    <div class="main-content-ubah-pass-container">
        <div class="form-ubah-pass-container">
            <form action="" class="form-ubah-pass" method="POST">
                <label for="input-password-lama">Password Lama</label>
                <input type="text" id="input-password-lama" class="input-password-lama" placeholder="">
                <label for="input-password-baru">Password Baru</label>
                <input type="text" id="input-password-baru" class="input-password-baru" placeholder="">
                <label for="input-konfirmasi-password">Konfirmasi password baru</label>
                <input type="text" id="input-konfirmasi-password" class="input-konfirmasi-password" placeholder="">
                <button class="btn-ubah-pass-simpan" type="submit">Simpan</button>
            </form>
        </div>
    </div>
</div>

<style>
    .ubah-pass-container {
        width: 100%;
        background: lightgreen;
        display: flex;
        justify-content: center;
    }

    .form-ubah-pass {
        display: flex;
        flex-direction: column;
        justify-content: space-around;
        height: 270px;
        width: 100%;
    }

    .form-ubah-pass label {
        font-size: 16px;
    }

    .form-ubah-pass input {
        height: 30px;
        border: none;
        outline: none;
        background: #E1E8E6;
        border-radius: 5px;
        padding-left: 15px;
        width: 100%;
    }

    .form-ubah-pass button {
        width: 50%;
        align-self: center;
        margin-top: 15px;
        border-radius: 5px;
        background: #1C6758;
        color: white;
        border: none;
        cursor: pointer;
        height: 30px;
    }
</style>