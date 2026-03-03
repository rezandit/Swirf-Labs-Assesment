<?php
include 'db.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name       = $_POST['name'] ?? '';
    $id_num     = $_POST['id_num'] ?? '';
    $age        = $_POST['age'] ?? '';
    $address    = $_POST['address'] ?? '';
    $occupation = $_POST['occupation'] ?? '';
    $place      = $_POST['pob'] ?? '';
    $dob        = $_POST['dob'] ?? '';

    if (empty($name) || empty($id_num) || empty($dob) || empty($occupation)) {
        echo json_encode(['success' => false, 'message' => 'Please fill all required fields.']);
        exit;
    }

    try {
        $q = $pdo->prepare("INSERT INTO employees (identification_number, name, address, occupation, place_of_birth, date_of_birth) VALUES (?, ?, ?, ?, ?, ?)");
        $q->execute([$id_num, $name, $address, $occupation, $place, $dob]);

        echo json_encode(['success' => true, 'message' => 'Employee added successfully!']);
    } catch (PDOException $e) {
        if ($e->getCode() == 23000) {
            echo json_encode(['success' => false, 'message' => 'This ID and Name already exist.']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Database error: ' . $e->getMessage()]);
        }
    }
}
