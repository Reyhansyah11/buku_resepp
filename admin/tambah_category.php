<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ALS || FOOD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="shortcut icon" href="../assets/Group 24.png" type="image/x-icon">
</head>

<style>
    .container{
        margin-top: 150px;
    }
</style>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="mt-4 mb-4 text-center">Tambah Kategori</h2>
                        <form action="proses_tambah_category.php" method="POST">
                            <div class="mb-3">
                                <label for="tipe" class="form-label">Kategori</label>
                                <input type="text" class="form-control" id="tipe" name="tipe" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
