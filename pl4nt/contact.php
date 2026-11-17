<?php
$messageSent = false;
$errorMsg = '';
$name = '';
$email = '';
$subject = '';
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $subject = trim($_POST['subject'] ?? '');
    $message = trim($_POST['message'] ?? '');

    if ($name === '' || $email === '' || $message === '') {
        $errorMsg = 'Please fill in all required fields.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMsg = 'Please enter a valid email address.';
    } else {
        $logEntry = "[" . date('Y-m-d H:i:s') . "] Name: $name | Email: $email | Subject: $subject | Message: $message" . PHP_EOL;
        file_put_contents('contact_messages.txt', $logEntry, FILE_APPEND);
        $messageSent = true;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us | PL4NT</title>

  <link rel="stylesheet" href="contact.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100">

  <!-- Announcement Bar -->
  <div class="announcement-bar py-2 text-center text-dark">
    <i class="bi bi-truck me-2"></i> Free delivery in Seychelles if you give me <strong>SCR 800</strong>!
  </div>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center gap-2" href="index.php">
        <i class="bi bi-flower2 text-accent fs-3"></i>
        <span>PL4NT</span>
      </a>

      <button class="navbar-toggler text-white border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navContent">
        <i class="bi bi-list fs-2"></i>
      </button>

      <div class="collapse navbar-collapse" id="navContent">
        <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
          <li class="nav-item"><a class="nav-link" href="index.php#home">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="index.php#shop">Shop</a></li>
          <li class="nav-item"><a class="nav-link" href="https://xampp.ramhoarders.dpdns.org/team.html">The Team</a></li>
          <li class="nav-item"><a class="nav-link" href="login.php">sign(๑•ᴗ•๑)in</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Hero Banner -->
  <section class="hero-section hero-section-compact text-center text-white">
    <div class="container">
      <span class="badge bg-yellow text-dark px-3 py-2 rounded-pill fs-6 mb-3">🌿 Need Help or Have Questions?</span>
      <h1 class="display-4 fw-bold mb-3">Contact <span class="text-accent">DR PL4NT'S</span> Crew</h1>
      <p class="lead opacity-90 mb-0">Reach out about orders, rare plants, or Seychelles delivery.</p>
    </div>
  </section>

  <!-- Contact Section -->
  <section class="py-5 flex-grow-1">
    <div class="container">
      <div class="row g-4">

        <!-- Contact Details Card -->
        <div class="col-lg-5">
          <div class="contact-card p-4 h-100 d-flex flex-column">
            <h4 class="fw-bold mb-3">Get in Touch</h4>
            <p class="text-muted mb-4">Have a question about one of our items or your delivery in Seychelles? Send us a message and the RAM HOARDER crew will get back to you.</p>

            <div class="d-flex align-items-start gap-3 mb-3">
              <div class="contact-icon-circle">
                <i class="bi bi-geo-alt-fill"></i>
              </div>
              <div>
                <h6 class="fw-bold mb-1">Location</h6>
                <p class="text-muted mb-0">Victoria, Mahé, Seychelles</p>
              </div>
            </div>

            <div class="d-flex align-items-start gap-3 mb-3">
              <div class="contact-icon-circle">
                <i class="bi bi-envelope-fill"></i>
              </div>
              <div>
                <h6 class="fw-bold mb-1">Email</h6>
                <p class="text-muted mb-0">drpl4nt@ramhoarders.com</p>
              </div>
            </div>

            <div class="d-flex align-items-start gap-3 mb-4">
              <div class="contact-icon-circle">
                <i class="bi bi-telephone-fill"></i>
              </div>
              <div>
                <h6 class="fw-bold mb-1">Phone</h6>
                <p class="text-muted mb-0">+248 4 181821</p>
              </div>
            </div>

            <div class="store-hours-box mt-auto p-3">
              <small class="text-muted d-block fw-semibold">Store Hours</small>
              <small class="text-dark">Monday – Saturday: 8:00 AM – 4:00 PM (SCT)</small>
            </div>
          </div>
        </div>

        <!-- Contact Form Card -->
        <div class="col-lg-7">
          <div class="contact-card p-4 p-md-5">
            <?php if ($messageSent): ?>
              <div class="text-center py-4">
                <i class="bi bi-check-circle-fill text-success display-1 mb-3"></i>
                <h3 class="fw-bold mb-2">Message Sent!</h3>
                <p class="text-muted mb-4">Thanks, <strong><?= htmlspecialchars($name) ?></strong>. We received your message and will reply to <strong><?= htmlspecialchars($email) ?></strong> soon.</p>
                <a href="contact.php" class="btn btn-accent px-4 py-2">Send Another Message</a>
                <a href="index.php" class="btn btn-outline-dark px-4 py-2 ms-2">Back to Shop</a>
              </div>
            <?php else: ?>
              <h4 class="fw-bold mb-4">Send Us a Message</h4>

              <?php if ($errorMsg !== ''): ?>
                <div class="alert alert-danger" role="alert">
                  <i class="bi bi-exclamation-triangle-fill me-2"></i><?= htmlspecialchars($errorMsg) ?>
                </div>
              <?php endif; ?>

              <form method="POST" action="contact.php">
                <div class="row g-3">
                  <div class="col-md-6">
                    <label for="name" class="form-label fw-semibold">Your Name *</label>
                    <input type="text" class="form-control contact-input py-2" id="name" name="name" placeholder="Enter your name" value="<?= htmlspecialchars($name) ?>" required>
                  </div>

                  <div class="col-md-6">
                    <label for="email" class="form-label fw-semibold">Email Address *</label>
                    <input type="email" class="form-control contact-input py-2" id="email" name="email" placeholder="you@example.com" value="<?= htmlspecialchars($email) ?>" required>
                  </div>

                  <div class="col-12">
                    <label for="subject" class="form-label fw-semibold">Subject</label>
                    <select class="form-select contact-input py-2" id="subject" name="subject">
                      <option value="Order Inquiry" <?= $subject === 'Order Inquiry' ? 'selected' : '' ?>>Order Inquiry</option>
                      <option value="Seychelles Delivery" <?= $subject === 'Seychelles Delivery' ? 'selected' : '' ?>>Seychelles Delivery</option>
                      <option value="Product Question" <?= $subject === 'Product Question' ? 'selected' : '' ?>>Product Question</option>
                      <option value="Other" <?= $subject === 'Other' ? 'selected' : '' ?>>Other</option>
                    </select>
                  </div>

                  <div class="col-12">
                    <label for="message" class="form-label fw-semibold">Message *</label>
                    <textarea class="form-control contact-input" id="message" name="message" rows="5" placeholder="Write your message here..." required><?= htmlspecialchars($message) ?></textarea>
                  </div>

                  <div class="col-12 mt-4">
                    <button type="submit" class="btn btn-accent w-100 py-3">
                      Send Message <i class="bi bi-send ms-2"></i>
                    </button>
                  </div>
                </div>
              </form>
            <?php endif; ?>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="footer py-5 mt-auto">
    <div class="container">
      <div class="row g-4">
        <div class="col-lg-4">
          <a class="navbar-brand d-flex align-items-center gap-2 mb-3" href="index.php">
            <i class="bi bi-flower2 text-accent fs-3"></i>
            <span class="text-white">PL4NT</span>
          </a>
          <p class="text-light opacity-75">Seychelles’ undergound Legal Suppliers. Amazing tranquility and freshness for everyone i guess.</p>
        </div>
        <div class="col-6 col-lg-2">
          <h6 class="text-accent fw-bold mb-3">Quick Links</h6>
          <ul class="list-unstyled">
            <li><a href="index.php#home" class="text-light opacity-75 text-decoration-none">Home</a></li>
            <li><a href="index.php#shop" class="text-light opacity-75 text-decoration-none">Shop</a></li>
            <li><a href="https://xampp.ramhoarders.dpdns.org/team.html" class="text-light opacity-75 text-decoration-none">The Team</a></li>
          </ul>
        </div>
        <div class="col-6 col-lg-2">
          <h6 class="text-accent fw-bold mb-3">Support</h6>
          <ul class="list-unstyled">
            <li><a href="#" class="text-light opacity-75 text-decoration-none">Plant Care Guide</a></li>
            <li><a href="#" class="text-light opacity-75 text-decoration-none">Shipping Info</a></li>
            <li><a href="contact.php" class="text-light opacity-75 text-decoration-none">Contact Us</a></li>
          </ul>
        </div>
      </div>
      <hr class="my-4 border-secondary opacity-25">
      <div class="text-center text-light opacity-50 small">
        &copy; 2026 PL4NT Inc. All rights reserved. Prices listed in Seychelles Rupee (SCR).
      </div>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>