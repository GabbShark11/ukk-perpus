<h1 class="mt-4">Ulasan Buku</h1>
<div class="card">
    <div class="card-body">
    <div class="row">
        <div class="col-md-12">
            <form method="post">
            <?php
            $id = $_GET['id'];
                if(isset($_POST['submit'])) {
                    $id_buku = $_POST['id_buku'];
                    $id_user = $_SESSION['user']['id_user'];
                    $ulasan = $_POST['ulasan'];
                    $rating = $_POST['rating'];
                    $query = mysqli_query($koneksi, "INSERT INTO ulasan(id_buku,id_user,ulasan,rating) values('$id_buku','$id_user','$ulasan','$rating')");

                    if($query){
                        echo '<script>alert("Data Berhasil Ditambah."); </script>';
                    }else{
                        echo '<script>alert("Data Gagal Ditamabah."); </script>';
                    }
                }
                $query = mysqli_query($koneksi, "SELECT*FROM ulasan WHERE id_ulasan=$id");
                $data = mysqli_fetch_array($query);
            ?>
                <div class="row mb-3">
                    <div class="col-md-2 fs-5" style="font: 1em sans-serif;">Buku</div>
                    <div class="col-md-8">
                        <select name="id_buku" class="form-control">
                            <?php
                                $buk = mysqli_query($koneksi, "SELECT*FROM  buku");
                                while($buku = mysqli_fetch_array($buk)) {
                                    ?>
                                    <option <?php if($data['id_buku'] == $buku['id_buku']) echo 'selected'; ?> value=" 
                                    <?php 
                                        echo $buku['id_buku']; ?>"> <?php echo $buku['judul']; ?> 
                                    </option>
                                    <?php
                                }
                            ?>
                        </select>
                    </div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-md-2" style="font: 1em sans-serif;">Ulasan</div>
                    <div class="col-md-8">
                        <textarea name="ulasan" rows="5" class="form-control"> <?php echo $data['ulasan'];[] ?> </textarea>            
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-2" style="font: 1em sans-serif;">Rating</div>
                    <div class="col-md-8">
                        <select name="rating" class="form-control">
                            <?php
                                for($i = 1; $i<=10; $i++){
                                    ?>
                                    <option <?php if($data['rating'] == $i) echo 'selected'; ?>> <?php echo $i; ?></option>
                                    <?php
                                }
                            ?>
                            
                        </select>           
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                    <a href="?page=ulasan">
                        <button type="submit" class="btn btn-warning" name="submit" value="submit">Simpan</button>
                    </a>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                        <a href="?page=ulasan" class="btn btn-danger">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div> 
    </div>
</div>