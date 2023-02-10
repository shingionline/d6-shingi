$(document).ready(function () {

    $("form").submit(function (event) {

    $("#error-group").removeClass("alert alert-danger");
    $(".help-block").remove();

      var formData = {
        invoice_date: $("#invoice_date").val(),
        due_date: $("#due_date").val(),
        company_name: $("#company_name").val(),
        invoice_number: $("#invoice_number").val(),
        item_1: $("#item_1").val(),
        item_1_value: $("#item_1_value").val(),
        item_2: $("#item_2").val(),
        item_2_value: $("#item_2_value").val(),
        item_3: $("#item_3").val(),
        item_3_value: $("#item_3_value").val(),
        invoice_total: $("#invoice_total").val(),
      };
  
      $.post({
        type: "POST",
        url: "controllers/process.php",
        data: formData,
        dataType: "json",
        encode: true,
      }).done(function (data) {
        console.log(data);
  
        if (!data.success) {
          if (data.errors.invoice_date) {
            $("#error-group").addClass("alert alert-danger");
            $("#error-group").append(
              '<div class="help-block">' + data.errors.invoice_date + "</div>"
            );
          }
  
          if (data.errors.due_date) {
            $("#error-group").addClass("alert alert-danger");
            $("#error-group").append(
              '<div class="help-block">' + data.errors.due_date + "</div>"
            );
          }
  
          if (data.errors.company_name) {
            $("#error-group").addClass("alert alert-danger");
            $("#error-group").append(
              '<div class="help-block">' + data.errors.company_name + "</div>"
            );
          }

          if (data.errors.invoice_number) {
            $("#error-group").addClass("alert alert-danger");
            $("#error-group").append(
              '<div class="help-block">' + data.errors.invoice_number + "</div>"
            );
          }

          if (data.errors.item_1) {
            $("#error-group").addClass("alert alert-danger");
            $("#error-group").append(
              '<div class="help-block">' + data.errors.item_1 + "</div>"
            );
          }

          if (data.errors.item_1_value) {
            $("#error-group").addClass("alert alert-danger");
            $("#error-group").append(
              '<div class="help-block">' + data.errors.item_1_value + "</div>"
            );
          }

          if (data.errors.database) {
            $("#error-group").addClass("alert alert-danger");
            $("#error-group").append(
              '<div class="help-block">' + data.errors.database + "</div>"
            );
          }

        } else {
          $("form").html(
            '<div class="alert alert-success">' + data.message + "</div>"
          );
        }
  
      }).fail(function (data) {
        console.log(data);

        $("#error-group").addClass("alert alert-danger");
            $("#error-group").append(
              '<div class="help-block">' + data.responseText + "</div>"
            );
      });
  
      event.preventDefault();

    });

    // Calculate the total of the invoice
    $("#item_1_value, #item_2_value, #item_3_value").on("keyup", function () {
        var item_1_value = $("#item_1_value").val();
        var item_2_value = $("#item_2_value").val();
        var item_3_value = $("#item_3_value").val();
        var total = 0;
        if (item_1_value != "") {
            total += parseFloat(item_1_value);
        }
        if (item_2_value != "") {
            total += parseFloat(item_2_value);
        }
        if (item_3_value != "") {
            total += parseFloat(item_3_value);
        }
        $("#invoice_total").val(total.toFixed(2));
        });

  });