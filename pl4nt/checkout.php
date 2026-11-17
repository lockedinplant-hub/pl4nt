<?php
session_start();

// Capture cart JSON posted from index.php and store it in the PHP session
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cart_data'])) {
    $decoded = json_decode($_POST['cart_data'], true);
    if (is_array($decoded)) {
        $_SESSION['cart'] = $decoded;
    }
}

$cart = $_SESSION['cart'] ?? [];
$orderPlaced = false;
$selectedPayment = '';
$customerName = '';
$customerAddress = '';

// Handle final order confirmation
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirm_order'])) {
    $selectedPayment = htmlspecialchars($_POST['payment_method'] ?? 'Cash on Delivery');
    $customerName = htmlspecialchars($_POST['customer_name'] ?? 'Customer');
    $customerAddress = htmlspecialchars($_POST['customer_address'] ?? 'Mahe, Seychelles');
    $orderPlaced = true;
}

// Calculate totals
$subtotal = 0;
foreach ($cart as $item) {
    $subtotal += ($item['price'] * $item['qty']);
}

// Free delivery in Seychelles if subtotal >= SCR 800
$shipping = ($subtotal >= 800 || $subtotal == 0) ? 0 : 100;
$grandTotal = $subtotal + $shipping;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Checkout | PL4NT</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="checkout.css">
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
      <a href="index.php" class="btn btn-outline-light btn-sm">
        <i class="bi bi-arrow-left me-1"></i> Back to Shop
      </a>
    </div>
  </nav>

  <!-- Main Checkout Content -->
  <main class="container my-5 flex-grow-1">
    <?php if ($orderPlaced): ?>
      <div class="checkout-card p-5 text-center mx-auto" style="max-width: 650px;">
        <i class="bi bi-check-circle-fill text-success display-1 mb-3"></i>
        <h2 class="fw-bold mb-2">Order Confirmed!</h2>
        <p class="text-muted mb-4">Thank you, <strong><?= $customerName ?></strong>. Your RAM HOARDER supplies are being prepared for delivery to <strong><?= $customerAddress ?></strong>.</p>
        <div class="bg-light rounded-3 p-3 mb-4 text-start">
          <div class="d-flex justify-content-between mb-1">
            <span>Payment Method:</span>
            <strong><?= $selectedPayment ?></strong>
          </div>
          <div class="d-flex justify-content-between">
            <span>Total Paid / Due:</span>
            <strong class="price-tag">SCR <?= number_format($grandTotal, 2) ?></strong>
          </div>
        </div>
        <a href="index.php?cleared=1" class="btn btn-accent px-4 py-3">Continue Shopping</a>
      </div>
      <?php unset($_SESSION['cart']); ?>

    <?php elseif (empty($cart)): ?>
      <div class="checkout-card p-5 text-center mx-auto" style="max-width: 550px;">
        <i class="bi bi-bag-x text-muted display-1 mb-3"></i>
        <h3 class="fw-bold">Your cart is empty</h3>
        <p class="text-muted mb-4">Add some items from the shop before heading to checkout.</p>
        <a href="index.php" class="btn btn-accent px-4 py-2">Go to Shop</a>
      </div>

    <?php else: ?>
      <h2 class="fw-bold mb-4">Checkout</h2>
      <form method="POST" action="checkout.php">
        <div class="row g-4">
          
          <!-- Left Column: Items Bought -->
          <div class="col-lg-7">
            <div class="checkout-card p-4 mb-4">
              <h5 class="fw-bold mb-3"><i class="bi bi-bag-check me-2 text-success"></i>Items You Bought</h5>
              <div class="table-responsive">
                <table class="table align-middle mb-0">
                  <thead class="table-light">
                    <tr>
                      <th>Item</th>
                      <th class="text-center">Qty</th>
                      <th class="text-end">Price</th>
                      <th class="text-end">Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($cart as $item): ?>
                      <tr>
                        <td class="fw-semibold"><?= htmlspecialchars($item['name']) ?></td>
                        <td class="text-center"><?= (int)$item['qty'] ?></td>
                        <td class="text-end">SCR <?= number_format($item['price'], 2) ?></td>
                        <td class="text-end fw-bold">SCR <?= number_format($item['price'] * $item['qty'], 2) ?></td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>

            <!-- Delivery Details -->
            <div class="checkout-card p-4">
              <h5 class="fw-bold mb-3"><i class="bi bi-geo-alt me-2 text-success"></i>Delivery Details (Seychelles)</h5>
              <div class="row g-3">
                <div class="col-md-6">
                  <label class="form-label fw-semibold">Full Name</label>
                  <input type="text" name="customer_name" class="form-control" placeholder="e.g. Jean-Luc" required>
                </div>
                <div class="col-md-6">
                  <label class="form-label fw-semibold">Phone Number</label>
                  <input type="text" name="customer_phone" class="form-control" placeholder="+248 ..." required>
                </div>
                <div class="col-12">
                  <label class="form-label fw-semibold">Island / District Address</label>
                  <input type="text" name="customer_address" class="form-control" placeholder="Victoria, Mahé" required>
                </div>
              </div>
            </div>
          </div>

          <!-- Right Column: Payment Options & Summary -->
          <div class="col-lg-5">
            <div class="checkout-card p-4">
              <h5 class="fw-bold mb-3"><i class="bi bi-credit-card me-2 text-success"></i>Payment Options</h5>
              
              <div class="d-flex flex-column gap-2 mb-4">
                <label class="payment-option d-flex align-items-center gap-3">
                  <input class="form-check-input mt-0" type="radio" name="payment_method" value="Cash on Delivery (SCR)" checked>
                  <div>
                    <div class="fw-bold"><i class="bi bi-cash-coin me-1"></i> Cash on Delivery (SCR)</div>
                    <small class="text-muted">Pay in Seychelles Rupees when your order arrives.</small>
                  </div>
                </label>

                <label class="payment-option d-flex align-items-center gap-3">
                  <input class="form-check-input mt-0" type="radio" name="payment_method" value="Credit / Debit Card">
                  <div>
                    <div class="fw-bold"><i class="bi bi-credit-card-2-front me-1"></i> Credit / Debit Card</div>
                    <small class="text-muted">Visa, Mastercard, or local Seychelles bank card.</small>
                  </div>
                </label>

                <label class="payment-option d-flex align-items-center gap-3">
                  <input class="form-check-input mt-0" type="radio" name="payment_method" value="Instant Bank Transfer (MCB / Nouvobanq)">
                  <div>
                    <div class="fw-bold"><i class="bi bi-bank me-1"></i> Instant Bank Transfer</div>
                    <small class="text-muted">Direct transfer via MCB Seychelles or Nouvobanq.</small>
                  </div>
                </label>
              </div>

              <hr>

              <!-- Order Summary -->
              <div class="d-flex justify-content-between mb-2">
                <span class="text-muted">Subtotal</span>
                <span class="fw-bold">SCR <?= number_format($subtotal, 2) ?></span>
              </div>
              <div class="d-flex justify-content-between mb-3">
                <span class="text-muted">Shipping</span>
                <?php if ($shipping === 0): ?>
                  <span class="text-success fw-bold">FREE</span>
                <?php else: ?>
                  <span class="fw-bold">SCR <?= number_format($shipping, 2) ?></span>
                <?php endif; ?>
              </div>
              <div class="d-flex justify-content-between align-items-center border-top pt-3 mb-4">
                <span class="fs-5 fw-bold">Total</span>
                <span class="price-tag fw-bold fs-4">SCR <?= number_format($grandTotal, 2) ?></span>
              </div>

              <button type="submit" name="confirm_order" class="btn btn-accent w-100 py-3 fs-6">
                Confirm & Place Order <i class="bi bi-arrow-right ms-2"></i>
              </button>
            </div>
          </div>

        </div>
      </form>
    <?php endif; ?>
  </main>

  <!-- Footer -->
  <footer class="footer py-4 mt-auto">
    <div class="container text-center text-light opacity-75 small">
      &copy; 2026 PL4NT Inc. All rights reserved. Prices listed in Seychelles Rupee (SCR).
    </div>
  </footer>

</body>
</html>