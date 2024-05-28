<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Resep</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="proses_edit_resep.php" method="post" enctype="multipart/form-data">
                    <?php
                    include "../db/koneksi.php";

                    // Assume $id is passed via GET request
                    $id = $_GET['id'];
                    $query = "SELECT * FROM details WHERE id_details = ?";
                    $stmt = mysqli_prepare($conn, $query);
                    mysqli_stmt_bind_param($stmt, 'i', $id);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    $recipe = mysqli_fetch_assoc($result);

                    if ($recipe) {
                    ?>
                        <input type="hidden" name="id" value="<?php echo $recipe['id_details']; ?>">

                        <div class="form-group">
                            <label for="nama_makanan">Nama Makanan:</label>
                            <input type="text" name="nama_makanan" id="nama_makanan" class="form-control" value="<?php echo $recipe['nama_makanan']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi:</label>
                            <textarea name="deskripsi" id="deskripsi" class="form-control" rows="4" required><?php echo $recipe['deskripsi']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="foto">Foto:</label>
                            <input type="file" name="foto" id="foto" class="form-control-file">
                            <?php if (!empty($recipe['foto'])) { ?>
                                <img src="../uploads/<?php echo $recipe['foto']; ?>" alt="Current Image" class="img-thumbnail mt-2" width="200">
                            <?php } ?>
                        </div>
                        <div class="form-group">
                            <label for="durasi">Durasi (dalam menit):</label>
                            <input type="number" name="durasi" id="durasi" class="form-control" value="<?php echo $recipe['durasi']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="category">Kategori:</label>
                            <select name="category" id="category" class="form-control" required>
                                <?php
                                $query_category = "SELECT * FROM category";
                                $result_category = mysqli_query($conn, $query_category);
                                while ($row = mysqli_fetch_assoc($result_category)) {
                                    $selected = $row['id_category'] == $recipe['id_category'] ? 'selected' : '';
                                    echo "<option value='{$row['id_category']}' $selected>{$row['tipe']}</option>";
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
                                while ($row_difficulty = mysqli_fetch_assoc($result_difficulty)) {
                                    $selected = $row_difficulty['id_difficulty'] == $recipe['id_difficulty'] ? 'selected' : '';
                                    echo "<option value='{$row_difficulty['id_difficulty']}' $selected>{$row_difficulty['level']}</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="resep">Resep:</label>
                            <textarea name="resep" id="resep" class="form-control" rows="6" required><?php echo $recipe['resep']; ?></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Edit Resep</button>
                    <?php
                    } else {
                        echo "<div class='alert alert-danger'>Resep tidak ditemukan.</div>";
                    }
                    ?>
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
