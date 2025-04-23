$stmt = $pdo->prepare("SELECT c.id AS cart_id, p.name, p.price, c.quantity 
                       FROM cart c JOIN products p ON c.product_id = p.id 
                       WHERE c.user_id = ?");
$stmt->execute([$_SESSION['user_id']]);
echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
