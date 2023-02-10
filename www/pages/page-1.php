<div class="col-md-8 col-12">

    <div id="error-group"></div>

    <form action="controllers/process.php" method="post">

        <div class="row mt-0">
            <div class="col-md-6">
                <label>Invoice Date</label>
                <input type="date" id="invoice_date" class="form-control" />
            </div>

            <div class="col-md-6">
                <label>Due Date</label>
                <input type="date" id="due_date" class="form-control" />
            </div>
        </div>
        <div class="row mt-0">
            <div class="col-md-6">
                <label>Company Name</label>
                <input type="text" id="company_name" class="form-control" />
            </div>

            <div class="col-md-6">
                <label>Invoice Number</label>
                <input type="number" id="invoice_number" class="form-control" />
            </div>
        </div>
        <div class="row mt-2">
            <div class="col"><b>INVOICE ITEMS</b></div>
        </div>
        <div class="row mt-0">
            <div class="col-md-10">
                <label>Description</label>
                <input type="text" id="item_1" class="form-control" />
            </div>

            <div class="col-md-2 text-end">
                <label>Amount</label>
                <input type="number" id="item_1_value" step="0.01" class="form-control" />
            </div>
        </div>
        <div class="row mt-0">
            <div class="col-md-10">
                <input type="text" id="item_2" class="form-control" />
            </div>

            <div class="col-md-2">
                <input type="number" id="item_2_value" step="0.01" class="form-control" />
            </div>
        </div>
        <div class="row mt-0">
            <div class="col-md-10">
                <input type="text" id="item_3" class="form-control" />
            </div>

            <div class="col-md-2">
                <input type="number" id="item_3_value" step="0.01" class="form-control" />
            </div>
        </div>
        <div class="row mt-0">
            <div class="col-md-10 text-end pt-2">
                <b>Invoice Total</b>
            </div>
            <div class="col-md-2">
                <input type="text" id="invoice_total" name="invoice_total" class="form-control" value="0.00" disabled />
            </div>
        </div>
        <div class="col">
            <button type="submit" class="btn btn-success my-3 w-100 p-3">Submit Invoice</button>
        </div>

    </form>

</div>

<script src="js/form.js?v=<?php echo time(); ?>"></script>