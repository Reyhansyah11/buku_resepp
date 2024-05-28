<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Resep</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        .card {
            border-radius: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }
        
        .card:hover {
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
        }
        
        .card-img-top {
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
            height: 250px;
            object-fit: cover;
        }
        
        .card-body {
            padding: 20px;
        }
        
        .card-title {
            font-size: 1.5rem;
            margin-bottom: 10px;
            color: #333;
            text-decoration: none;
        }
        
        .card-title:hover {
            color: #28a745;
        }
        
        .card-text {
            margin-bottom: 15px;
            color: #666;
        }
        
        .list-group-item {
            border-color: transparent;
            font-size: 0.9rem;
            color: #888;
        }
        
        .btn {
            border-radius: 10px;
            font-size: 0.9rem;
            padding: 8px 20px;
        }
    </style>
</head>

<body>
<div class="container mt-5">
    <h1 class="text-center mb-4">Daftar Resep</h1>
    <div class="row">
        <?php
        // Include file koneksi database
        include "../db/koneksi.php";
        // Query untuk menampilkan semua data dari tabel details dengan join ke tabel category dan difficulty
        $query = "SELECT d.*, c.tipe AS nama_kategori, di.level AS nama_tingkat_kesulitan 
                  FROM details d 
                  JOIN category c ON d.id_category = c.id_category 
                  JOIN difficulty di ON d.id_difficulty = di.id_difficulty 
                  ORDER BY d.id_category, d.id_details DESC";
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='col-md-4 mb-4'>
                    <div class='card'>
                        <img src='../uploads/{$row['foto']}' class='card-img-top' alt='Foto Makanan'>
                        <div class='card-body'>
                            <a href='#' class='card-title'>{$row['nama_makanan']}</a>
                            <p class='card-text'>{$row['deskripsi']}</p>
                            <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#myModal{$row['id_details']}'>
                                Lihat Resep
                            </button>
                        </div>
                    </div>
                  </div>";
                  
            // Modal
            echo "<div class='modal fade' id='myModal{$row['id_details']}' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                    <div class='modal-dialog modal-lg' role='document'>
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <h5 class='modal-title' id='exampleModalLabel'>{$row['nama_makanan']}</h5>
                                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                </button>
                            </div>
                            <div class='modal-body'>
                                <img src='../uploads/{$row['foto']}' class='card-img-top mb-3' alt='Foto Makanan'>
                                <p><strong>Deskripsi:</strong> {$row['deskripsi']}</p>
                                <ul class='list-group list-group-flush'>
                                    <li class='list-group-item'><strong>Kategori:</strong> {$row['nama_kategori']}</li>
                                    <li class='list-group-item'><strong>Tingkat Kesulitan:</strong> {$row['nama_tingkat_kesulitan']}</li>
                                    <li class='list-group-item'><strong>Durasi:</strong> {$row['durasi']} Menit</li>
                                    <li class='list-group-item'><strong>Resep:</strong> {$row['resep']}</li>
                                </ul>
                            </div>
                            <div class='modal-footer'>
                                <button type='button' class='btn btn-secondary' data-dismiss='modal'>Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>";
        }

        
        ?>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
