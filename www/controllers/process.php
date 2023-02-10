<?php
require_once '../includes/db_connection.php';

$errors = [];
$data = [];

// invoice date
if (empty($_POST['invoice_date'])) {
    $errors['invoice_date'] = 'Invoice date is required.';
} else {
    $invoice_date = $_POST['invoice_date'];
}

// due date
if (empty($_POST['due_date'])) {
    $errors['due_date'] = 'Due date is required.';
} else {
    $due_date = $_POST['due_date'];
}

// company name
if (empty($_POST['company_name'])) {
    $errors['company_name'] = 'Company name is required.';
} else {
    $company_name = $_POST['company_name'];
}

// invoice number
if (empty($_POST['invoice_number'])) {
    $errors['invoice_number'] = 'Invoice number is required.';
} else {
    $invoice_number = $_POST['invoice_number'];
}

// item 1
if (empty($_POST['item_1'])) {
    $errors['item_1'] = 'At least one item description is required.';
} else {
    $item_1 = $_POST['item_1'];
}

if (empty($_POST['item_1_value'])) {
    $errors['item_1_value'] = 'At least one item amount is required.';
} else {
    $item_1_value = $_POST['item_1_value'];
}

// item 2 and 3 are optional
if (!empty($_POST['item_2'])) {
    $item_2 = $_POST['item_2'];
}

if (!empty($_POST['item_2_value'])) {
    $item_2_value = $_POST['item_2_value'];
}

if (!empty($_POST['item_3'])) {
    $item_3 = $_POST['item_3'];
}

if (!empty($_POST['item_3_value'])) {
    $item_3_value = $_POST['item_3_value'];
}

// invoice total
$invoice_total = $_POST['invoice_total'];

if (!empty($errors)) {
    $data['success'] = false;
    $data['errors'] = $errors;
} else {

    // save invoice in database

    $sql = "INSERT INTO invoices (invoice_date, due_date, company_name, invoice_number, invoice_total) VALUES (:invoice_date, :due_date, :company_name, :invoice_number, :invoice_total)";

    $stmt = $pdo->prepare($sql);

    if ($stmt->execute(['invoice_date' => $invoice_date, 'due_date' => $due_date, 'company_name' => $company_name, 'invoice_number' => $invoice_number, 'invoice_total' => $invoice_total])) {

        // get id of last invoice
        $invoice_id = $pdo->lastInsertId();

        // item 1
        $sql2 = "INSERT INTO invoice_items (invoice_id, description, amount) VALUES (:invoice_id, :description, :amount)";
        $stmt = $pdo->prepare($sql2);
        $stmt->execute(['invoice_id' => $invoice_id, 'description' => $item_1, 'amount' => $item_1_value]);

        // save item 2 if it exists
        if (!empty($item_2) && !empty($item_2_value)) {
            $sql2 = "INSERT INTO invoice_items (invoice_id, description, amount) VALUES (:invoice_id, :description, :amount)";
            $stmt = $pdo->prepare($sql2);
            $stmt->execute(['invoice_id' => $invoice_id, 'description' => $item_2, 'amount' => $item_2_value]);
        }

        // save item 3 if it exists
        if (!empty($item_3) && !empty($item_3_value)) {
            $sql2 = "INSERT INTO invoice_items (invoice_id, description, amount) VALUES (:invoice_id, :description, :amount)";
            $stmt = $pdo->prepare($sql2);
            $stmt->execute(['invoice_id' => $invoice_id, 'description' => $item_3, 'amount' => $item_3_value]);
        }

        // check if invoice was saved
        if ($stmt->rowCount() > 0) {
            $data['success'] = true;
            $data['message'] = 'Invoice has been added successfully (#' . $invoice_id . ') - <a href="index.php?p=3&id=' . $invoice_id . '">View Invoice</a>';
        } else {
            $data['success'] = false;
            $data['message'] = 'Error: ' . $stmt->errorInfo();
        }

    }

    // close database connection
    $pdo = null;
}

echo json_encode($data);
