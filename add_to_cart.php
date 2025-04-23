$userId = $_SESSION['user_id'];
$productId = $_POST['product_id'];
$quantity = $_POST['quantity'];

$stmt = $pdo->prepare("SELECT * FROM cart WHERE user_id = ? AND product_id = ?");
$stmt->execute([$userId, $productId]);

if ($stmt->rowCount()) {
    $pdo->prepare("UPDATE cart SET quantity = ? WHERE user_id = ? AND product_id = ?")
        ->execute([$quantity, $userId, $productId]);
} else {
    $pdo->prepare("INSERT INTO cart (user_id, product_id, quantity) VALUES (?, ?, ?)")
        ->execute([$userId, $productId, $quantity]);
}
