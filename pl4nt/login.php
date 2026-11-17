<?php require_once 'dp.php'; ?>





<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PL4NT | Account Sign In</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="exam1.css">
</head>
<body>

  <!-- Announcement Bar -->
  <div class="announcement-bar py-2 text-center text-dark bg-yellow">
    <i class="bi bi-truck me-2"></i> Free delivery in Seychelles if you give me <strong>SCR 800</strong>!
  </div>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg sticky-top border-bottom border-success">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center gap-2" href="index.html">
        <i class="bi bi-flower2 text-accent fs-3"></i>
        <span class="fw-bold text-white">PL4NT</span>
      </a>
      
      <button class="navbar-toggler text-white border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navContent">
        <i class="bi bi-list fs-2"></i>
      </button>

      <div class="collapse navbar-collapse" id="navContent">
        <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
          <li class="nav-item"><a class="nav-link" href="index.php#home">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="index.php#shop">Shop</a></li>
          <li class="nav-item"><a class="nav-link" href="https://xampp.ramhoarders.dpdns.org/team.html">The Team</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Auth Section -->
  <section class="py-5">
    <div class="container py-4">
      <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
          <div class="card auth-card p-4">
            
            <div class="text-center mb-4">
              <i class="bi bi-flower2 text-accent fs-1"></i>
              <h3 class="fw-bold text-white mt-2" id="formTitle">Sign In to PL4NT</h3>
              <p class="text-muted small">RAM HOARDER Supplies Account Access</p>
            </div>

            <!-- Feedback Alert -->
            <div id="alertBox" class="alert d-none" role="alert"></div>

            <!-- Sign In Form -->
            <form id="loginForm" class="auth-form">
              <div class="mb-3">
                <label class="form-label text-light">Email Address</label>
                <div class="input-group">
                  <span class="input-group-text bg-dark border-secondary text-accent"><i class="bi bi-envelope"></i></span>
                  <input type="email" name="email" class="form-control" placeholder="name@example.com" required>
                </div>
              </div>

              <div class="mb-4">
                <label class="form-label text-light">Password</label>
                <div class="input-group">
                  <span class="input-group-text bg-dark border-secondary text-accent"><i class="bi bi-lock"></i></span>
                  <input type="password" name="password" class="form-control" placeholder="Password please" required>
                </div>
              </div>

              <button type="submit" class="btn btn-accent w-100 py-2 mb-3">Sign In</button>
            </form>

            <!-- Sign Up Form (Hidden by default) -->
            <form id="registerForm" class="auth-form d-none">
              <div class="mb-3">
                <label class="form-label text-light">Full Name</label>
                <div class="input-group">
                  <span class="input-group-text bg-dark border-secondary text-accent"><i class="bi bi-person"></i></span>
                  <input type="text" name="fullname" class="form-control" placeholder="John Doe" required>
                </div>
              </div>

              <div class="mb-3">
                <label class="form-label text-light">Email Address</label>
                <div class="input-group">
                  <span class="input-group-text bg-dark border-secondary text-accent"><i class="bi bi-envelope"></i></span>
                  <input type="email" name="email" class="form-control" placeholder="name@example.com" required>
                </div>
              </div>

              <div class="mb-4">
                <label class="form-label text-light">Password</label>
                <div class="input-group">
                  <span class="input-group-text bg-dark border-secondary text-accent"><i class="bi bi-lock"></i></span>
                  <input type="password" name="password" class="form-control" placeholder="Create pass PLEASE" required>
                </div>
              </div>

              <button type="submit" class="btn btn-accent w-100 py-2 mb-3">Create Account</button>
            </form>

            <div class="text-center mt-3">
              <span class="text-muted small" id="toggleText">Don't have an account?</span>
              <a href="#" id="toggleAuthBtn" class="text-accent fw-bold small ms-1 text-decoration-none">Sign Up</a>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  
  <!-- JavaScript Authentication Controller -->
  <script>
    const loginForm = document.getElementById('loginForm');
    const registerForm = document.getElementById('registerForm');
    const toggleAuthBtn = document.getElementById('toggleAuthBtn');
    const toggleText = document.getElementById('toggleText');
    const formTitle = document.getElementById('formTitle');
    const alertBox = document.getElementById('alertBox');

    let isLogin = true;

    // Toggle forms
    toggleAuthBtn.addEventListener('click', (e) => {
      e.preventDefault();
      isLogin = !isLogin;
      alertBox.classList.add('d-none');

      if (isLogin) {
        formTitle.textContent = 'Sign In to PL4NT';
        loginForm.classList.remove('d-none');
        registerForm.classList.add('d-none');
        toggleText.textContent = "Don't have an account?";
        toggleAuthBtn.textContent = 'Sign Up';
      } else {
        formTitle.textContent = 'Join PL4NT';
        loginForm.classList.add('d-none');
        registerForm.classList.remove('d-none');
        toggleText.textContent = 'Already have an account?';
        toggleAuthBtn.textContent = 'Sign In';
      }
    });

    // Form Submission Handler
    async function handleAuthSubmit(form, action) {
      const formData = new FormData(form);
      formData.append('action', action);

      try {
        const response = await fetch('auth.php', {
          method: 'POST',
          body: formData
        });
        const data = await response.json();

        alertBox.classList.remove('d-none', 'alert-danger', 'alert-success');
        if (data.status === 'success') {
          alertBox.classList.add('alert-success');
          alertBox.textContent = data.message;
          form.reset();

          if (action === 'login') {
            setTimeout(() => {
              window.location.href = data.redirect || 'index.php';
            }, 1200);
          }
        } else {
          alertBox.classList.add('alert-danger');
          alertBox.textContent = data.message;
        }
      } catch (err) {
        alertBox.classList.remove('d-none', 'alert-success');
        alertBox.classList.add('alert-danger');
        alertBox.textContent = 'An unexpected server error occurred.';
      }
    }

    loginForm.addEventListener('submit', (e) => {
      e.preventDefault();
      handleAuthSubmit(loginForm, 'login');
    });

    registerForm.addEventListener('submit', (e) => {
      e.preventDefault();
      handleAuthSubmit(registerForm, 'register');
    });
  </script>
</body>
</html>