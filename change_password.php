$current = $_POST['current_password'];
$new = password_hash($_POST['new_password'], PASSWORD_DEFAULT);

$stmt = $pdo->prepare("SELECT password FROM users WHERE id = ?");
$stmt->execute([$_SESSION['user_id']]);
$user = $stmt->fetch();

if (password_verify($current, $user['password'])) {
    $pdo->prepare("UPDATE users SET password = ? WHERE id = ?")
        ->execute([$new, $_SESSION['user_id']]);
    echo "Password updated.";
}
