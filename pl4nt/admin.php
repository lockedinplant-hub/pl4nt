<?php
session_start();
require_once 'dp.php';

// Protect the admin page: only allow the specific admin email
$adminEmail = 'admin@pl4nt.com';

if (!isset($_SESSION['user_email']) || strtolower($_SESSION['user_email']) !== strtolower($adminEmail)) {
    header('Location: login.php');
    exit();
}

$message = '';
$message_type = '';

// Handle Actions: Delete User or Change Password
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    // Delete User
    if ($action === 'delete') {
        $userId = $_POST['user_id'] ?? '';
        if (!empty($userId)) {
            $stmt = $pdo->prepare('DELETE FROM login WHERE id = ?');
            if ($stmt->execute([$userId])) {
                $message = 'User deleted successfully.';
                $message_type = 'success';
            } else {
                $message = 'Failed to delete user.';
                $message_type = 'danger';
            }
        }
    }

    // Change Password
    if ($action === 'change_password') {
        $userId = $_POST['user_id'] ?? '';
        $newPassword = $_POST['new_password'] ?? '';

        if (!empty($userId) && !empty($newPassword)) {
            $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);
            $stmt = $pdo->prepare('UPDATE login SET password = ? WHERE id = ?');
            if ($stmt->execute([$hashedPassword, $userId])) {
                $message = 'User password updated successfully.';
                $message_type = 'success';
            } else {
                $message = 'Failed to update password.';
                $message_type = 'danger';
            }
        } else {
            $message = 'Password cannot be empty.';
            $message_type = 'danger';
        }
    }
}

// Fetch all registered users from the database
$stmt = $pdo->query('SELECT id, fullname, email FROM login ORDER BY id DESC');
$users = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PL4NT | Admin Control Panel</title>
  
  <!-- Stylesheets -->
  <link rel="stylesheet" href="exam1.css"> <!--[cite: 1] -->
  <link rel="stylesheet" href="admin.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
</head>
<body>

  <!-- Announcement Bar -->
  <div class="announcement-bar py-2 text-center text-dark bg-yellow">
    <i class="bi bi-shield-lock me-2"></i><strong>ADMINISTRATOR PORTAL</strong> - RAM HOARDER Control Suite
  </div>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg sticky-top border-bottom border-success">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center gap-2" href="index.php"> <!--[cite: 5] -->
        <i class="bi bi-flower2 text-accent fs-3"></i>
        <span class="fw-bold text-white">PL4NT <span class="badge bg-yellow text-dark fs-6 ms-2 admin-badge">Admin</span></span>
      </a>
      
      <div class="d-flex align-items-center gap-3">
        <a href="index.php" class="btn btn-outline-light btn-sm"><i class="bi bi-shop me-1"></i> View Shop</a> <!--[cite: 5] -->
        <a href="logout.php" class="btn btn-accent btn-sm"><i class="bi bi-box-arrow-right me-1"></i> Logout</a> <!--[cite: 7] -->
      </div>
    </div>
  </nav>

  <!-- Main Container -->
  <div class="container py-5">
    <div class="row mb-4 align-items-center">
      <div class="col-md-8">
        <h2 class="fw-bold text-dark"><i class="bi bi-people-fill text-success me-2"></i> User Management Panel</h2>
        <p class="text-muted">Control registered customer accounts, reset passwords, or remove unauthorized users.</p>
      </div>
    </div>

    <!-- Alert Messages -->
    <?php if (!empty($message)): ?>
      <div class="alert alert-<?php echo $message_type; ?> alert-dismissible fade show shadow-sm" role="alert">
        <?php echo htmlspecialchars($message); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php endif; ?>

    <!-- Users Table Card -->
    <div class="card shadow-sm border-0 rounded-4 overflow-hidden">
      <div class="card-header bg-white py-3 border-0">
        <h5 class="fw-bold mb-0 text-dark">Registered Accounts (<?php echo count($users); ?>)</h5>
      </div>
      <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
          <thead>
            <tr>
              <th class="ps-4">ID</th>
              <th>Full Name</th>
              <th>Email Address</th>
              <th class="text-end pe-4">Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php if (count($users) > 0): ?>
              <?php foreach ($users as $user): ?>
                <tr>
                  <td class="ps-4 fw-bold text-muted">#<?php echo $user['id']; ?></td>
                  <td>
                    <div class="d-flex align-items-center gap-2">
                      <div class="avatar-circle">
                        <?php echo strtoupper(substr($user['fullname'], 0, 1)); ?>
                      </div>
                      <span class="fw-semibold text-dark"><?php echo htmlspecialchars($user['fullname']); ?></span>
                    </div>
                  </td>
                  <td><span class="text-muted"><?php echo htmlspecialchars($user['email']); ?></span></td>
                  <td class="text-end pe-4">
                    <!-- Change Password Trigger Button -->
                    <button class="btn btn-sm btn-outline-dark me-2" data-bs-toggle="modal" data-bs-target="#passwordModal<?php echo $user['id']; ?>">
                      <i class="bi bi-key me-1"></i> Change Password
                    </button>

                    <!-- Delete User Trigger Button -->
                    <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $user['id']; ?>">
                      <i class="bi bi-trash me-1"></i> Remove
                    </button>
                  </td>
                </tr>

                <!-- Modal: Change Password -->
                <div class="modal fade" id="passwordModal<?php echo $user['id']; ?>" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content rounded-4 border-0 shadow">
                      <form method="POST">
                        <div class="modal-header border-0 pb-0">
                          <h5 class="modal-title fw-bold">Change Password for <?php echo htmlspecialchars($user['fullname']); ?></h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body text-start">
                          <input type="hidden" name="action" value="change_password">
                          <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                          <div class="mb-3">
                            <label class="form-label text-muted small">New Password</label>
                            <input type="password" name="new_password" class="form-control" placeholder="Enter new password" required>
                          </div>
                        </div>
                        <div class="modal-footer border-0 pt-0">
                          <button type="button" class="btn btn-light btn-sm" data-bs-dismiss="modal">Cancel</button>
                          <button type="submit" class="btn btn-accent btn-sm">Update Password</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>

                <!-- Modal: Confirm Delete -->
                <div class="modal fade" id="deleteModal<?php echo $user['id']; ?>" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content rounded-4 border-0 shadow">
                      <form method="POST">
                        <div class="modal-header border-0 pb-0">
                          <h5 class="modal-title fw-bold text-danger"><i class="bi bi-exclamation-triangle-fill me-2"></i> Confirm Deletion</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body text-start">
                          <input type="hidden" name="action" value="delete">
                          <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                          <p class="mb-0">Are you sure you want to permanently remove user <strong><?php echo htmlspecialchars($user['fullname']); ?></strong> (<?php echo htmlspecialchars($user['email']); ?>)? This action cannot be undone.</p>
                        </div>
                        <div class="modal-footer border-0 pt-0">
                          <button type="button" class="btn btn-light btn-sm" data-bs-dismiss="modal">Cancel</button>
                          <button type="submit" class="btn btn-danger btn-sm">Yes, Remove User</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>

              <?php endforeach; ?>
            <?php else: ?>
              <tr>
                <td colspan="4" class="text-center py-4 text-muted">No registered users found in database.</td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
