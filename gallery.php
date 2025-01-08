<div class="container">
    <!-- Button trigger modal -->
<button type="button" class="btn btn-secondary mb-2" data-bs-toggle="modal" data-bs-target="#modalTambah">
    <i class="bi bi-plus-lg"></i> Tambah Gallery
</button>
    <div class="row">
        <div class="table-responsive" id="gallery_data">
            <table class="table table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th class="w-15">Tanggal</th>
                        <th class="w-25">Gambar</th>
                        <th class="w-25">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM Gallery ORDER BY tanggal DESC";
                    $hasil = $conn->query($sql);

                    $no = 1;
                    while ($row = $hasil->fetch_assoc()) {
                    ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td>
                               <!-- <strong><?= $row["judul"] ?></strong> -->
                                <br>pada : <?= $row["tanggal"] ?>
                                <br>oleh : <?= $row["username"] ?>
                            </td>
                            
                            <td>
                                <?php
                                if ($row["gambar"] != '') {
                                    if (file_exists('' . $row["gambar"] . '')) {
                                ?>
                                        <img src="<?= htmlspecialchars($row['gambar'], ENT_QUOTES, 'UTF-8') ?>" width="100" alt="Gambar Gallery">
                                <?php
                                    }
                                }
                                ?>
                            </td>
                            <td>
                                <a href="#" title="edit" class="badge rounded-pill text-bg-success" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $row["id"] ?>"><i class="bi bi-pencil"></i></a>
                                <a href="#" title="delete" class="badge rounded-pill text-bg-danger" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $row["id"] ?>"><i class="bi bi-x-circle"></i></a>

                                <!-- Awal Modal Edit -->
                        <div class="modal fade" id="modalEdit<?= $row["id"] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Gallery</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form method="post" action="" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="formGroupExampleInput" class="form-label">Judul</label>
                                                <input type="hidden" name="id" value="<?= $row["id"] ?>">
                                                <input type="text" class="form-control" name="judul" placeholder="Tuliskan Judul Artikel" value="<?= $row["judul"] ?>" required>
                                            </div>
                                           <!-- <div class="mb-3">
                                                <label for="floatingTextarea2">Isi</label>
                                                <textarea class="form-control" placeholder="Tuliskan Isi Artikel" name="isi" required><?= $row["isi"] ?></textarea>
                                            </div> -->
                                            <div class="mb-3">
                                                <label for="formGroupExampleInput2" class="form-label">Ganti Gambar</label>
                                                <input type="file" class="form-control" name="gambar">
                                            </div>
                                            <div class="mb-3">
                                                <label for="formGroupExampleInput3" class="form-label">Gambar Lama</label>
                                                <?php
                                                if ($row["gambar"] != '') {
                                                    if (file_exists('' . $row["gambar"] . '')) {
                                                ?>
                                                        <img src="<?= htmlspecialchars($row['gambar'], ENT_QUOTES, 'UTF-8') ?>"  width="100" alt="Gambar Gallery">
                                                <?php
                                                    }
                                                }
                                                ?>
                                                <input type="hidden" name="gambar_lama" value="<?= $row["gambar"] ?>">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <input type="submit" value="simpan" name="simpan" class="btn btn-primary">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Akhir Modal Edit -->

                        <!-- Awal Modal Hapus -->
                        <div class="modal fade" id="modalHapus<?= $row["id"] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi Hapus Gambar</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form method="post" action="" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="formGroupExampleInput" class="form-label">Yakin akan menghapus Gambar<strong><?= $row["judul"] ?></strong>"?</label>
                                                <input type="hidden" name="id" value="<?= $row["id"] ?>">
                                                <input type="hidden" name="gambar" value="<?= $row["gambar"] ?>">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">batal</button>
                                            <input type="submit" value="hapus" name="hapus" class="btn btn-primary">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Akhir Modal Hapus -->
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

                            <!-- Awal Modal Tambah-->
                    <div class="modal fade" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"  aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Gallery</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
                                </div>
                                <form method="post" action="" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <!--<div class="mb-3">
                                            <label for="formGroupExampleInput" class="form-label">Nomor</label>
                                            <input type="text" class="form-control" name="id" placeholder="Tuliskan Nomor" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="floatingTextarea2">Tanggal</label>
                                            <textarea class="form-control" placeholder="Masukkan Tanggal" name="tanggal" required></textarea>
                                        </div> 
                                        <div class="mb-3">
                                            <label for="formGroupExampleInput2" class="form-label">Gambar</label>
                                            <input type="file" class="form-control" name="gambar">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <input type="submit" value="simpan" name="simpan" class="btn btn-primary">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Akhir Modal Tambah-->
    </div>
</div>

<!-- JQuery AJAX-->
<script>
$(document).ready(function(){
    load_data();
    function load_data(hlm){
        $.ajax({
            url : "gallery_data.php",
            method : "POST",
            data : {
					            hlm: hlm
				           },
            success : function(data){
                    $('#gallery_data').html(data);
            }
        })
    } 
    $(document).on('click', '.halaman', function(){
    var hlm = $(this).attr("id");
    load_data(hlm);
    });
});
</script>

<?php
include "upload.php";

//jika tombol simpan diklik
if (isset($_POST['simpan'])) {
    
    $id = $_POST['id'];
    $tanggal = date("Y-m-d H:i:s");
    $username = $_SESSION['username'];
    $gambar = '';
    $nama_gambar = $_FILES['gambar']['name'];

    //upload gambar
    if ($nama_gambar != '') {
        $cek_upload = upload_foto($_FILES["gambar"]);

        if ($cek_upload['status']) {
            $gambar = $cek_upload['message'];
        } else {
            echo "<script>
                alert('" . $cek_upload['message'] . "');
                document.location='admin.php?page=gallery';
            </script>";
            die;
        }
    }

    if (isset($_POST['id'])) {
        //update data
        $id = $_POST['id'];

        if ($nama_gambar == '') {
            //jika tidak ganti gambar
            $gambar = $_POST['gambar_lama'];
        } else {
            //jika ganti gambar, hapus gambar lama
            unlink("" . $_POST['gambar_lama']);
        }

        $stmt = $conn->prepare("UPDATE gallery 
                                SET 
                                gambar = ?,
                                tanggal = ?,
                                username = ?
                                WHERE id = ?");

        $stmt->bind_param("ssss", $gambar, $tanggal, $username, $id);
        $simpan = $stmt->execute();
    } else {
		    //insert data
        $stmt = $conn->prepare("INSERT INTO gallery (gambar,tanggal,username, id)
                                VALUES (?,?,?,?)");

        $stmt->bind_param("ssss", $gambar, $tanggal, $username, $id);
        $simpan = $stmt->execute();
    }

    if ($simpan) {
        echo "<script>
            alert('Simpan data sukses');
            document.location='admin.php?page=gallery';
        </script>";
    } else {
        echo "<script>
            alert('Simpan data gagal');
            document.location='admin.php?page=gallery';
        </script>";
    }

    $stmt->close();
    $conn->close();
}

//jika tombol hapus diklik
if (isset($_POST['hapus'])) {
    $id = $_POST['id'];
    $gambar = $_POST['gambar'];

    if ($gambar != '') {
        //hapus file gambar
        unlink("" . $gambar);
    }

    $stmt = $conn->prepare("DELETE FROM gallery WHERE id =?");

    $stmt->bind_param("i", $id);
    $hapus = $stmt->execute();

    if ($hapus) {
        echo "<script>
            alert('Hapus data sukses');
            document.location='admin.php?page=gallery';
        </script>";
    } else {
        echo "<script>
            alert('Hapus data gagal');
            document.location='admin.php?page=gallery';
        </script>";
    }

    $stmt->close();
    $conn->close();

}
?>