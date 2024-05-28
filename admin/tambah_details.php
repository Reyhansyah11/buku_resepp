<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Resep</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="proses_tambah_resep.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nama_makanan">Nama Makanan:</label>
                        <input type="text" name="nama_makanan" id="nama_makanan" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi:</label>
                        <textarea name="deskripsi" id="deskripsi" class="form-control" rows="4" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto:</label>
                        <input type="file" name="foto" id="foto" class="form-control-file" required>
                    </div>
                    <div class="form-group">
                        <label for="durasi">Durasi (dalam menit):</label>
                        <input type="number" name="durasi" id="durasi" class="form-control" placeholder="Durasi" required>
                    </div>
                    <div class="form-group">
                        <label for="category">Kategori:</label>
                        <select name="category" id="category" class="form-control" required>
                            <?php
                            include "../db/koneksi.php";
                            $query = "SELECT * FROM category";
                            $result = mysqli_query($conn, $query);
                            if ($result) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value='{$row['id_category']}'>{$row['tipe']}</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="difficulty">Tingkat Kesulitan:</label>
                        <select name="difficulty" id="difficulty" class="form-control" required>
                            <?php
                            $query_difficulty = "SELECT * FROM difficulty";
                            $result_difficulty = mysqli_query($conn, $query_difficulty);
                            if ($result_difficulty) {
                                while ($row_difficulty = mysqli_fetch_assoc($result_difficulty)) {
                                    echo "<option value='{$row_difficulty['id_difficulty']}'>{$row_difficulty['level']}</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="resep">Resep:</label>
                        <textarea name="resep" id="resep" class="form-control" rows="6" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Resep</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<script>
    document.querySelector('form').addEventListener('submit', function(event) {
        var namaMakanan = document.querySelector('input[name="nama_makanan"]').value;
        if (namaMakanan.trim() === '') {
            alert('Nama makanan tidak boleh kosong');
            event.preventDefault();
        }
    });
</script>


    