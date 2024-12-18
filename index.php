<?php 
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    // User is logged in
} else {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>

<head>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
    rel="stylesheet" />
  <style>
    body {
      background-color: #006ff83b;
      /* Light goldenrod color */
    }

    input {
      background-color: white;
    }

  </style>
</head>

<body>
  <section class="bg-primary text-white text-center py-2">
  <div class="container d-flex justify-content-between align-items-center">
      <h2>Address Book</h2>
      <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>
    </section>
  <div class="p-4 my-4">
    <div class="row">
      <div class="col-md-9">
        <form id="form" method="POST">
          <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">1) મોબાઈલ નંબર </label>
            <div class="col-sm-10">
              <input
                class="form-control"
                type="text"
                placeholder="Mobile Number"
                name="mobilenumber"
                required />
            </div>
          </div>

          <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">2) વોટસપ નંબર</label>
            <div class="col-sm-10">
              <input
                class="form-control"
                type="text"
                placeholder="Whatsapp Number"
                name="whatsappnumber" />
            </div>
          </div>

          <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">3) નામ</label>
            <div class="col-sm-10">
              <input
                class="form-control"
                type="text"
                placeholder="Name"
                name="clientname"
                required />
            </div>
          </div>

          <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">4) ગામ</label>
            <div class="col-sm-8">
              <select class="form-control" id="city" name="city" required>
                <option value="">Select City</option>
              </select>
            </div>
            <div class="col-sm-2">
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCityModal">
                Add City
              </button>
            </div>
          </div>

          <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">5) સરનામુ</label>
            <div class="col-sm-10">
              <input
                class="form-control"
                type="text"
                placeholder="address"
                name="clientaddress" />
            </div>
          </div>

          <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">6) નોંધ</label>
            <div class="col-sm-10">
              <textarea
                class="form-control"
                placeholder="Notes"
                name="Notes"></textarea>
            </div>
          </div>

          <!-- Hidden input for category -->
          <input type="hidden" name="category" id="category-input">

          <div class="row g-2" style="background-color: white; padding-bottom: .70rem; border-radius: .25rem;">
            <div class="col-6 col-md-2">
              <button class="btn btn-primary w-100 submit-button" type="button" data-category="રીટેલર કસ્મર">
                1) રીટેલર કસ્મર
              </button>
            </div>
            <div class="col-6 col-md-2">
              <button class="btn btn-primary w-100 submit-button" type="button" data-category=" હોલસેલ કસ્ટમર">
                2) હોલસેલ કસ્ટમર
              </button>
            </div>
            <div class="col-6 col-md-2">
              <button class="btn btn-primary w-100 submit-button" type="button" data-category="સબંધી">
                3) સબંધી
              </button>
            </div>
            <div class="col-6 col-md-2">
              <button class="btn btn-primary w-100 submit-button" type="button" data-category="મિત્રો">
                4) મિત્રો
              </button>
            </div>
            <div class="col-6 col-md-2">
              <button class="btn btn-primary w-100 submit-button" type="button" data-category="ટ્રાન્સપોર્ટર">
                5) ટ્રાન્સપોર્ટર
              </button>
            </div>
            <div class="col-6 col-md-2">
              <button class="btn btn-primary w-100 submit-button" type="button" data-category="ધાર્મિક સંસ્થા">
                6) ધાર્મિક સંસ્થા
              </button>
            </div>
            <div class="col-6 col-md-2">
              <button class="btn btn-primary w-100 submit-button" type="button" data-category="ખરીદ વેપારી">
                7) ખરીદ વેપારી
              </button>
            </div>
            <div class="col-6 col-md-2">
              <button class="btn btn-primary w-100 submit-button" type="button" data-category="સેલ્સમેન">
                8) સેલ્સમેન
              </button>
            </div>
            <div class="col-6 col-md-2">
              <button class="btn btn-primary w-100 submit-button" type="button" data-category="કેટરર્સ">
                9) કેટરર્સ
              </button>
            </div>
            <div class="col-6 col-md-2">
              <button class="btn btn-primary w-100 submit-button" type="button" data-category="મજુર">
                10) મજુર
              </button>
            </div>
            <div class="col-6 col-md-2">
              <button class="btn btn-primary w-100 submit-button" type="button" data-category="બ્રોકર્સ">
                11) બ્રોકર્સ
              </button>
            </div>
            <div class="col-6 col-md-2">
              <button class="btn btn-primary w-100 submit-button" type="button" data-category="જનરલ">
                12) જનરલ
              </button>
            </div>
          </div>
        </form>
      </div>
      <div class="col-md-3">
        <div class="row g-2" style="background-color: white; padding-bottom: .70rem; border-radius: .25rem;">
          <div class="col-12">
            <button class="btn btn-primary w-100" type="button" onclick="window.location.href='cetagory-list-data.php'">
              13) view all
            </button>
          </div>
          <div class="row g-2">
            <div class="col-6">
              <div class="row g-2">
                <div class="col-12">
                  <button class="btn btn-primary w-100" type="button" onclick="window.location.href='cetagory-list-data.php?category=રીટેલર%20કસ્મર'">
                    1) રીટેલર કસ્મર
                  </button>
                </div>
                <div class="col-12">
                  <button class="btn btn-primary w-100" type="button" onclick="window.location.href='cetagory-list-data.php?category=હોલસેલ%20કસ્ટમર'">
                    2) હોલસેલ કસ્ટમર
                  </button>
                </div>
                <div class="col-12">
                  <button class="btn btn-primary w-100" type="button" onclick="window.location.href='cetagory-list-data.php?category=સબંધી'">
                    3) સબંધી
                  </button>
                </div>
                <div class="col-12">
                  <button class="btn btn-primary w-100" type="button" onclick="window.location.href='cetagory-list-data.php?category=મિત્રો'">
                    4) મિત્રો
                  </button>
                </div>
                <div class="col-12">
                  <button class="btn btn-primary w-100" type="button" onclick="window.location.href='cetagory-list-data.php?category=ટ્રાન્સપોર્ટર'">
                    5) ટ્રાન્સપોર્ટર
                  </button>
                </div>
                <div class="col-12">
                  <button class="btn btn-primary w-100" type="button" onclick="window.location.href='cetagory-list-data.php?category=ધાર્મિક%20+%20સંસ્થા'">
                    6) ધાર્મિક સંસ્થા
                  </button>
                </div>
              </div>
            </div>
            <div class="col-6">
              <div class="row g-2">
                <div class="col-12">
                  <button class="btn btn-primary w-100" type="button" onclick="window.location.href='cetagory-list-data.php?category=ખરીદ%20વેપારી'">
                    7) ખરીદ વેપારી
                  </button>
                </div>
                <div class="col-12">
                  <button class="btn btn-primary w-100" type="button" onclick="window.location.href='cetagory-list-data.php?category=સેલ્સમેન'">
                    8) સેલ્સમેન
                  </button>
                </div>
                <div class="col-12">
                  <button class="btn btn-primary w-100" type="button" onclick="window.location.href='cetagory-list-data.php?category=કેટરર્સ'">
                    9) કેટરર્સ
                  </button>
                </div>
                <div class="col-12">
                  <button class="btn btn-primary w-100" type="button" onclick="window.location.href='cetagory-list-data.php?category=મજુર'">
                    10) મજુર
                  </button>
                </div>
                <div class="col-12">
                  <button class="btn btn-primary w-100" type="button" onclick="window.location.href='cetagory-list-data.php?category=બ્રોકર્સ'">
                    11) બ્રોકર્સ
                  </button>
                </div>
                <div class="col-12">
                  <button class="btn btn-primary w-100" type="button" onclick="window.location.href='cetagory-list-data.php?category=જનરલ'">
                    12) જનરલ
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal for adding a new city -->
    <div class="modal fade" id="addCityModal" tabindex="-1" aria-labelledby="addCityModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addCityModalLabel">Add New City</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="addCityForm">
              <div class="mb-3">
                <label for="newCity" class="form-label">City Name</label>
                <input type="text" class="form-control" id="newCity" name="newCity" required>
              </div>
              <button type="submit" class="btn btn-primary">Add City</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div
      id="message"
      style="display: none; margin: 20px; font-weight: bold; color: green; padding: 8px; background-color: beige; border-radius: 4px; border-color: aquamarine;"></div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
      $(document).ready(function() {
        // Fetch cities and populate the city selector
        $.ajax({
          url: './include/function.php',
          method: 'GET',
          data: { action: 'fetch_cities' },
          success: function(data) {
            const cities = JSON.parse(data);
            const citySelect = $('#city');
            cities.forEach(city => {
              citySelect.append(new Option(city, city));
            });
          }
        });

        // Handle the form submission to add a new city
        $('#addCityForm').on('submit', function(e) {
          e.preventDefault();
          const newCity = $('#newCity').val();
          $.ajax({
            url: './include/function.php',
            method: 'POST',
            data: { action: 'add_city', city: newCity },
            success: function(response) {
              $('#addCityModal').modal('hide');
              $('#city').append(new Option(newCity, newCity));
              $('#newCity').val('');
            }
          });
        });

        // Add event listeners to all submit buttons
        document.querySelectorAll(".submit-button").forEach(function(button) {
          button.addEventListener("click", function() {
            // Set the hidden input value to the data-category attribute of the clicked button
            document.getElementById("category-input").value = this.getAttribute("data-category");
            // Trigger form submission
            if (validateForm()) {
              submitForm();
            }
          });
        });

        document.querySelector("input[name='mobilenumber']").addEventListener("blur", function() {
          checkDuplicateMobileNumber(this.value);
        });

        document.querySelector("input[name='whatsappnumber']").addEventListener("blur", function() {
          checkDuplicateWhatsAppNumber(this.value);
        });

        function checkDuplicateMobileNumber(mobileNumber) {
          fetch("./include/function.php", {
              method: "POST",
              body: new URLSearchParams({
                action: 'check_duplicate_mobile',
                mobilenumber: mobileNumber
              }),
              headers: {
                "Content-Type": "application/x-www-form-urlencoded;charset=UTF-8",
              },
            })
            .then(response => response.json())
            .then(data => {
              if (data.status === 'error') {
                alert(data.message);
                document.querySelector("input[name='mobilenumber']").value = '';
              }
            })
            .catch(error => console.error('Error:', error));
        }

        function checkDuplicateWhatsAppNumber(whatsappNumber) {
          fetch("./include/function.php", {
              method: "POST",
              body: new URLSearchParams({
                action: 'check_duplicate_whatsapp',
                whatsappnumber: whatsappNumber
              }),
              headers: {
                "Content-Type": "application/x-www-form-urlencoded;charset=UTF-8",
              },
            })
            .then(response => response.json())
            .then(data => {
              if (data.status === 'error') {
                alert(data.message);
                document.querySelector("input[name='whatsappnumber']").value = '';
              }
            })
            .catch(error => console.error('Error:', error));
        }

        function submitForm() {
          document.getElementById("message").textContent = "Submitting..";
          document.getElementById("message").style.display = "block";

          var form = document.getElementById("form");
          var formData = new FormData(form);
          var keyValuePairs = [];
          for (var pair of formData.entries()) {
            keyValuePairs.push(pair[0] + "=" + pair[1]);
          }

          var formDataString = keyValuePairs.join("&");

          console.log(formDataString);

          var submitButtons = document.querySelectorAll(".submit-button");
          submitButtons.forEach(function(button) {
            button.disabled = true;
          });

          fetch("./include/function.php", {
              redirect: "follow",
              method: "POST",
              body: formDataString,
              headers: {
                "Content-Type": "application/x-www-form-urlencoded;charset=UTF-8",
              },
            })
            .then(function(response) {
              if (response.ok) {
                return response.json();
              } else {
                throw new Error("Failed to submit the form.");
              }
            })
            .then(function(data) {
              document.getElementById("message").textContent = data.message;
              document.getElementById("message").style.display = "block";
              if (data.status === 'success') {
                document.getElementById("message").style.backgroundColor = "green";
                document.getElementById("message").style.color = "beige";
                form.reset();
              } else {
                document.getElementById("message").style.backgroundColor = "red";
                document.getElementById("message").style.color = "white";
              }

              submitButtons.forEach(function(button) {
                button.disabled = false;
              });

              setTimeout(function() {
                document.getElementById("message").textContent = "";
                document.getElementById("message").style.display = "none";
              }, 2600);
            })
            .catch(function(error) {
              console.error(error);
              document.getElementById("message").textContent = "An error occurred while submitting the form.";
              document.getElementById("message").style.display = "block";

              submitButtons.forEach(function(button) {
                button.disabled = false;
              });
            });
        }

        function validateForm() {
          var form = document.getElementById("form");
          if (form.checkValidity() === false) {
            form.reportValidity();
            return false;
          }
          return true;
        }
      });
    </script>
</body>
</html>