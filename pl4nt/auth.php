
<?php
session_start();
header('Content-Type: application/json');
require_once 'dp.php';

$response = ['status' => 'error', 'message' => 'Invalid Request'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    if ($action === 'register') {
        $fullname = trim($_POST['fullname'] ?? '');
        $email    = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        if (empty($fullname) || empty($email) || empty($password)) {
            $response['message'] = 'All fields are required.';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $response['message'] = 'Invalid email address format.';
        } else {
            // Check if user exists
            $stmt = $pdo->prepare('SELECT id FROM login WHERE email = ?');
            $stmt->execute([$email]);
            if ($stmt->fetch()) {
                $response['message'] = 'An account with this email already exists.';
            } else {
                $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
                $insert = $pdo->prepare('INSERT INTO login (fullname, email, password) VALUES (?, ?, ?)');
                if ($insert->execute([$fullname, $email, $hashedPassword])) {
                    $response = ['status' => 'success', 'message' => 'Registration successful! You can now sign in.'];
                } else {
                    $response['message'] = 'Failed to register account.';
                }
            }
        }
    } elseif ($action === 'login') {
        $email    = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        if (empty($email) || empty($password)) {
            $response['message'] = 'Please enter both email and password.';
        } else {
            $stmt = $pdo->prepare('SELECT * FROM login WHERE email = ?');
            $stmt->execute([$email]);
            $user = $stmt->fetch();

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user_id']    = $user['id'];
                $_SESSION['user_name']  = $user['fullname'];
                $_SESSION['user_email'] = $user['email'];

                // Check if the email matches your specific admin email
                $adminEmail = 'admin@pl4nt.com'; 
                $redirectUrl = (strtolower($user['email']) === strtolower($adminEmail)) ? 'admin.php' : 'index.php';

                $response = [
                    'status'   => 'success',
                    'message'  => 'Login successful! Redirecting...',
                    'redirect' => $redirectUrl
                ];
            } else {
                $response['message'] = 'Invalid email or password.';
            }
        }
    }
}

echo json_encode($response);
exit();
?>