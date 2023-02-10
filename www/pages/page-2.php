<?php
require_once('includes/db_connection.php');

// get all invoices
$sql = "SELECT * FROM invoices";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$invoices = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php if (!empty($invoices)) : ?>

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Company Name</th>
            <th scope="col">Invoice Number</th>
            <th scope="col">Invoice Date</th>
            <th scope="col">Due Date</th>
            <th scope="col">Invoice Total</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($invoices as $invoice) : ?>
            <tr>
                <td><?php echo $invoice['id']; ?></td>
                <td><a href="index.php?p=3&id=<?php echo $invoice['id']; ?>"><?php echo $invoice['company_name']; ?></a></td>
                <td><?php echo $invoice['invoice_number']; ?></td>
                <td><?php echo $invoice['invoice_date']; ?></td>
                <td><?php echo $invoice['due_date']; ?></td>
                <td><?php echo $invoice['invoice_total']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php else : ?>
    <div class="alert alert-danger text-center mt-2">No invoices found.</div>
<?php endif; ?>