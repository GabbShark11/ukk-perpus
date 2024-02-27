<h1 class="mt-4">Kategori Buku</h1>
<div class="card">
    <div class="card-body">
    <div class="row">
        <div class="col-md-12">
            <form method="post">

            <?php
                if(isset($_POST['submit'])) {
                    $kategori = $_POST['kategori'];
                    $query = mysqli_query($koneksi, "INSERT INTO kategori(kategori) values('$kategori')");

                    if($query){
                        echo '<script>alert("Data Berhasil Ditambah."); </script>';
                    }else{
                        echo '<script>alert("Data Gagal Ditamabah."); </script>';
                    }
                }
            ?>

                <div class="row mb-3">
                    <div class="col-md-6 fs-5" style="font: 1em sans-serif;">Nama Ketegori</div>
                    <div class="col-md-8 mt-2"><input type="text" class="form-control" name="kategori" id=""></div>
                </div>
                <div class="row">
                    <div class="col-md-6"></div>
                    <div class="col-md-8">
                        <button type="submit" class="btn btn-warning" name="submit" value="submit">Simpan</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                        <a href="?page=kategori" class="btn btn-danger">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div> 
    </div>
</div>