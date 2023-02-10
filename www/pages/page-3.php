<?php

$invoice_id = $_GET['id'];

// get invoice data
$sql = "SELECT * FROM invoices WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $invoice_id]);
$invoice = $stmt->fetch(PDO::FETCH_ASSOC);

// get invoice items
$sql = "SELECT * FROM invoice_items WHERE invoice_id = :invoice_id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['invoice_id' => $invoice_id]);
$invoice_items = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<h5><b>Viewing Invoice #<?php echo $invoice['id']; ?></b></h5>

<div class="col-md-8 col-12">

    <div id="error-group"></div>

    <form action="controllers/process.php" method="post">

        <div class="row mt-0">
            <div class="col-md-6">
                <label>Invoice Date</label>
                <?php echo $invoice['invoice_date']; ?>
            </div>

            <div class="col-md-6">
                <label>Due Date</label>
                <?php echo $invoice['due_date']; ?>
            </div>
        </div>
        <div class="row mt-0">
            <div class="col-md-6">
                <label>Company Name</label>
                <?php echo $invoice['company_name']; ?>
            </div>

            <div class="col-md-6">
                <label>Invoice Number</label>
                <?php echo $invoice['invoice_number']; ?>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col"><b>INVOICE ITEMS</b></div>
        </div>

        <div class="row mt-0 border-bottom">
            <div class="col-md-6">
                <label>Description</label>
            </div>

            <div class="col-md-6">
                <label>Amount</label>
            </div>
        </div>

        <?php foreach ($invoice_items as $invoice_item) : ?>
            <div class="row mt-0 border-bottom">
                <div class="col-md-6">
                    <?php echo $invoice_item['description']; ?>
                </div>

                <div class="col-md-6">
                    <?php echo formatCurrency($invoice_item['amount']); ?>
                </div>
            </div>
        <?php endforeach; ?>

        <div class="row mt-2">
            <div class="col-md-6 pt-2">
                <h3>Invoice Total</h3>
            </div>
            <div class="col-md-6">
                <h3><?php echo formatCurrency($invoice['invoice_total']); ?></h3>
            </div>
        </div>

</div>