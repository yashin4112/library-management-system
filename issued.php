<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Issue Book</title>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="issue.css" />
  </head>
  <body>
    <h2
      style="
        padding-bottom: 10px;
        text-align: center;
        font-family: 'Times New Roman', Times, serif;
        font-weight: bolder;
        text-shadow: 2px 2px 5px rgb(197, 183, 183);
      "
    >
      Issue the Book From Library
    </h2>
    <div class="d-flex justify-content-center">
      <form
        action="issue.php"
        method="post"
        class="needs-validation"
        novalidate
      >
        <div class="form-row">
          <div class="col-md-6 mb-3">
            <label for="validationCustom01">First name</label>
            <input
              type="text"
              name="firstname"
              class="form-control"
              id="validationCustom01"
              placeholder="First name"
              required
            />
            <div class="valid-feedback">Looks good!</div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="validationCustom02">Last name</label>
            <input
              type="text"
              class="form-control"
              id="validationCustom02"
              placeholder="Last name"
              name="lastname"
              required
            />
            <div class="valid-feedback">Looks good!</div>
          </div>
        </div>
        <div class="form-row">
          <div class="col-md-6 mb-3">
            <label for="validationCustom03">Enter College ID</label>
            <input
              type="number"
              class="form-control"
              id="validationCustom03"
              placeholder="PRN"
              name="prn"
              required
            />
          </div>

          <div class="col-md-6 mb-3">
            <label for="validationCustom04">Enter College E-mail ID</label>
            <input
              type="email"
              class="form-control"
              id="validationCustom04"
              placeholder="E-mail ID"
              name="email"
              required
            />
          </div>
        </div>

        <div class="form-row">
          <div class="col-md-6 mb-3">
            <label for="validationCustom05">Enter Mobile No.</label>
            <input
              type="number"
              class="form-control"
              id="validationCustom05"
              placeholder="Mobile Number"
              name="mobile"
              required
            />
          </div>

          <div class="col-md-6 mb-3">
            <label for="validationCustom06">Date</label>
            <input
              type="date"
              class="form-control"
              id="validationCustom04"
              placeholder="Date"
              name="date"
              required
            />
          </div>
        </div>

        <?php
          require("fetchbook.php");
        ?>

        <div class="form-row">
          <div class="col-md-12 mb-3">
            <label for="validationCustom07">Select a Book</label>
            <br />
            <select class="custom-select"  name="BookName" id="BookName">
              <option value="selected" selected>Select Book</option>

              <?php
                foreach($option as $option){
              ?>
              <option value="<?php echo $option['BookName']; ?>" name="<?php echo $option['BookName']; ?>" >
                <?php
                  echo  $option['BookName'];
                ?>
              </option>
              <?php
                }
              ?>
            </select>
          </div>
        </div>

        <?php
          require("fetchid.php");
        ?>
        <div class="form-row">
          <div class="col-md-12 mb-3">
            <label for="validationCustom07">Select Book ID</label>
            <br />
            <select class="custom-select"  name="BookID" id="BookID">
              <option value="selected" selected>Select Book</option>

              <?php
                foreach($option as $option){
              ?>
              <option value="<?php echo $option['BookID']; ?>" name="<?php echo $option['BookID']; ?>" >
                <?php
                  echo  $option['BookID'];
                ?>
              </option>
              <?php
                }
              ?>
            </select>
          </div>
        </div>


        <div class="form-group">
          <div class="form-check">
            <input
              class="form-check-input"
              type="checkbox"
              value=""
              id="invalidCheck"
              required
            />
            <label class="form-check-label" for="invalidCheck">
              Agree to terms and conditions
            </label>
            <div class="invalid-feedback">
              You must agree before submitting.
            </div>
          </div>
        </div>
        <button  class="btn btn-primary" type="submit" name="submit">Issue a Book</button>
      </form>
      
     
    </div>
    <script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function () {
        "use strict";
        window.addEventListener(
          "load",
          function () {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName("needs-validation");
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(
              forms,
              function (form) {
                form.addEventListener(
                  "submit",
                  function (event) {
                    if (form.checkValidity() === false) {
                      event.preventDefault();
                      event.stopPropagation();
                    }
                    form.classList.add("was-validated");
                  },
                  false
                );
              }
            );
          },
          false
        );
      })();
    </script>
  </body>
</html>
