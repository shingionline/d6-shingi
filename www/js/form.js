$(document).ready(function () {
    $("form").submit(function (event) {

    $("#error-group").removeClass("alert alert-danger");
    $(".help-block").remove();

      var formData = {
        invoice_date: $("#invoice_date").val(),
        due_date: $("#due_date").val(),
        company_name: $("#company_name").val(),
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
        } else {
          $("form").html(
            '<div class="alert alert-success">' + data.message + "</div>"
          );
        }
  
      }).fail(function (data) {
        $("form").html(
          '<div class="alert alert-danger">Could not reach server, please try again later.</div>'
        );
      });
  
      event.preventDefault();

    });
  });