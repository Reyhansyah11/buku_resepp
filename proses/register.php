
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="shortcut icon" href="../assets/Group 24.png" type="image/x-icon">
    <title>ALS || FOOD</title>
    <style>
          .btnn-primary {
            background: linear-gradient(135deg, #E61717, #F87E08);
            color: white;
            border: none;
        }

        .btnn-primary:hover {
            background: linear-gradient(135deg, #F87E08, #E61717);
        }

        .btnn-primary:not(.disabled):not(:disabled) {
            color: white;
        }

        .form-outline {
            position: relative;
            margin-bottom: 1.5rem;
        }
        .form-outline i {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            left: 10px;
            font-size: 1.2rem;
            color: #6c757d;
        }
        .form-control {
            padding-left: 2.5rem;
        }
        .form-label {
            position: absolute;
            top: 50%;
            left: 2.5rem;
            transform: translateY(-50%);
            color: #6c757d;
            pointer-events: none;
            transition: all 0.3s ease;
        }
        .form-control:focus ~ .form-label,
        .form-control:not(:placeholder-shown) ~ .form-label {
            top: -10px;
            left: 0.75rem;
            font-size: 0.75rem;
            color: #495057;
        }
    </style>
</head>
<body>
<section class="vh-100" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                <form id="registerForm" class="mx-1 mx-md-4" action="proses_register.php" method="POST">

                  <div class="form-outline">
                    <i class="fas fa-user"></i>
                    <input type="text" id="form3Example1c" name="user_name" class="form-control" placeholder=" " required />
                    <label class="form-label" for="form3Example1c">Your Name</label>
                  </div>

                  <div class="form-outline">
                    <i class="fas fa-lock"></i>
                    <input type="password" id="form3Example4c" name="password" class="form-control" placeholder=" " required />
                    <label class="form-label" for="form3Example4c">Password</label>
                  </div>

                  <div class="form-outline">
                    <i class="fas fa-key"></i>
                    <input type="password" id="form3Example4cd" name="repeat_password" class="form-control" placeholder=" " required />
                    <label class="form-label" for="form3Example4cd">Repeat your password</label>
                  </div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" class="btn btnn-primary btn-lg">Register</button>
                  </div>

                </form>

              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <img src="../assets/34062.jpg"
                  class="img-fluid" alt="Sample image">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>



<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
