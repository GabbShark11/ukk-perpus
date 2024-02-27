<h1 class="mt-4">Ubah Kategori Buku</h1>
<div class="card">
    <div class="card-body">
    <div class="row">
        <div class="col-md-12">
            <form method="post">

            <?php
                $id = $_GET['id'];
                if(isset($_POST['submit'])) {
                    $kategori = $_POST['kategori'];
                    $query = mysqli_query($koneksi, "UPDATE kategori set kategori = '$kategori' WHERE id_kategori = $id  ");

                    if($query){
                        echo '<script>alert("Data Berhasil Diubah."); </script>';
                    }else{
                        echo '<script>alert("Data Gagal Diubah."); </script>';
                    }
                }
                $query = mysqli_query($koneksi, "SELECT*FROM kategori where id_kategori=$id");
                $data = mysqli_fetch_array($query);
            ?>
                <div class="row mb-3">
                    <div class="col-md-3 fs-5" style="font: 1em sans-serif;">Nama Ketegori</div>
                    <div class="col-md-8"><input type="text" class="form-control" value="<?php echo $data['kategori']?>" name="kategori" id=""></div>
                </div>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-8">
                        <button type="submit" class="btn btn-warning" name="submit" href="?page=kategori" value="submit">Simpan</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                        <a href="?page=kategori" class="btn btn-danger">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div> 
    </div>
</div>