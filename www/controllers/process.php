<?php

$errors = [];
$data = [];

if (empty($_POST['invoice_date'])) {
    $errors['invoice_date'] = 'Invoice date is required.';
}

if (empty($_POST['due_date'])) {
    $errors['due_date'] = 'Due date is required.';
}

if (empty($_POST['company_name'])) {
    $errors['company_name'] = 'Company name is required.';
}

if (!empty($errors)) {
    $data['success'] = false;
    $data['errors'] = $errors;
} else {
    $data['success'] = true;
    $data['message'] = 'Invoice has been added successfully.';
}

echo json_encode($data);