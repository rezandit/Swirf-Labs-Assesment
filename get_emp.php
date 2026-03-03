<?php
include 'db.php';

header('Content-Type: application/json');

try {
    $stmt = $pdo->query("SELECT name, identification_number, address, occupation, date_of_birth FROM employees ORDER BY created_at DESC");
    $employees = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($employees);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}
