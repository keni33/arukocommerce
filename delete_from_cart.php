$pdo->prepare("DELETE FROM cart WHERE id = ? AND user_id = ?")
    ->execute([$_POST['cart_id'], $_SESSION['user_id']]);
