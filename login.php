<?php

include 'koneksi.php';

session_start();

if (isset($_SESSION['login'])) {
    header("Location: penjemputan.php");
    exit;
}

if (isset($_POST["submit"])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    $query = "SELECT * FROM registrasi WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        $_SESSION["login"] = true;
?>
<script>
  location.reload();
</script>
<?php
        exit;
    } else {
        $error = true;
    }
}
?>


<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Masuk</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="LOGIN.CSS"> <!-- Hubungkan ke file CSS -->
</head>

<body>
  <div class="container">
    <div class="form-card">
      <div class="text-center mb-6">
        <h1 class="title">Masuk</h1>
        <img alt="Ilustrasi orang daur ulang" class="icon" src="LOGO.png" />
      </div>
      <form class="form">
        <!-- Input Email -->
        <div class="input-group">
          <label for="email" class="label">Masukkan Email</label>
          <div class="input-wrapper">
            <input type="email" id="email" class="input" placeholder="Masukkan Email" />
            <i class="fas fa-user icon-input"></i>
          </div>
        </div>

        <!-- Input Password -->
        <div class="input-group">
          <label for="password" class="label">Masukkan Kata Sandi</label>
          <div class="input-wrapper">
            <input type="password" id="password" class="input" placeholder="Masukkan Kata Sandi" />
            <i class="fas fa-eye" id="togglePassword"></i>
          </div>
        </div>

        <!-- Tombol Login -->
        <div class="button-wrapper">
          <button type="submit" class="btn-submit">MASUK</button>
        </div>
      </form>
      <div class="links">
        <a href="#" class="link">Belum Punya Akun?</a>
        <a href="#" class="link">Lupa Kata Sandi?</a>
      </div>
    </div>
  </div>

  <!-- Script untuk Logika Password -->
  <script>
    // Ambil elemen input password dan ikon toggle
    const togglePassword = document.getElementById("togglePassword");
    const passwordInput = document.getElementById("password");

    // Logika untuk menampilkan atau menyembunyikan password
    togglePassword.addEventListener("click", function () {
      // Ubah tipe input antara "password" dan "text"
      const isPasswordVisible = passwordInput.getAttribute("type") === "text";
      passwordInput.setAttribute("type", isPasswordVisible ? "password" : "text");

      // Ubah ikon mata sesuai kondisi
      this.classList.toggle("fa-eye");
      this.classList.toggle("fa-eye-slash");
    });
  </script>
</body>

</html>