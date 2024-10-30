<!DOCTYPE html>
<html>

<head>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
    rel="stylesheet" />
    <style>
    body {
      background-color: #006ff83b; /* Light goldenrod color */
    }
    input{
      background-color: white;
    }
  </style>
</head>

<body>
  <section class="bg-primary text-white text-center py-2">
    <div class="container">
      <!-- <h1 class="display-2">જનરલ ક્રમાંક ચાર્ટ</h1> -->
      <h2 class="display-2">એડ્રેસ બુક </h2>
    </div>
  </section>
  <div class="container my-4">
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
                required
                />
            </div>
          </div>

          <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">4) ગામ</label>
            <div class="col-sm-10">
              <input
                class="form-control"
                type="text"
                placeholder="city"
                name="city" 
                required
                />
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
               રીટેલર કસ્મર
              </button>
            </div>
            <div class="col-6 col-md-2">
              <button class="btn btn-primary w-100 submit-button" type="button" data-category=" હોલસેલ કસ્ટમર">
              હોલસેલ કસ્ટમર 
              </button>
            </div>
            <div class="col-6 col-md-2">
              <button class="btn btn-primary w-100 submit-button" type="button" data-category="સબંધી">
                સબંધી
              </button>
            </div>
            <div class="col-6 col-md-2">
              <button class="btn btn-primary w-100 submit-button" type="button" data-category="મિત્રો">
              મિત્રો
              </button>
            </div>
            <div class="col-6 col-md-2">
              <button class="btn btn-primary w-100 submit-button" type="button" data-category="ટ્રાન્સપોર્ટર">
              ટ્રાન્સપોર્ટર 
              </button>
            </div>
            <div class="col-6 col-md-2">
              <button class="btn btn-primary w-100 submit-button" type="button" data-category="ધાર્મિક સંસ્થા">
              ધાર્મિક સંસ્થા
              </button>
            </div>
            <div class="col-6 col-md-2">
              <button class="btn btn-primary w-100 submit-button" type="button" data-category="ખરીદ વેપારી">
                ખરીદ વેપારી
              </button>
            </div>
            <div class="col-6 col-md-2">
              <button class="btn btn-primary w-100 submit-button" type="button" data-category="સેલ્સમેન">
                સેલ્સમેન
              </button>
            </div>
            <div class="col-6 col-md-2">
              <button class="btn btn-primary w-100 submit-button" type="button" data-category="કેટરર્સ">
              કેટરર્સ 
              </button>
            </div>
            <div class="col-6 col-md-2">
              <button class="btn btn-primary w-100 submit-button" type="button" data-category="મજુર">
              મજુર
              </button>
            </div>
            <div class="col-6 col-md-2">
              <button class="btn btn-primary w-100 submit-button" type="button" data-category="બ્રોકર્સ">
              બ્રોકર્સ 
              </button>
            </div>
            <div class="col-6 col-md-2">
              <button class="btn btn-primary w-100 submit-button" type="button" data-category="જનરલ">
              જનરલ 
              </button>
            </div>
          </div>
        </form>
      </div>
      <div class="col-md-3">
        <div class="row g-2" style="background-color: white; padding-bottom: .70rem; border-radius: .25rem;">
          <div class="col-12">
            <button class="btn btn-primary w-100" type="button" onclick="window.location.href='cetagory-list-data.php'">
              view all
            </button>
          </div>
          <div class="row g-2">
            <div class="col-6">
              <div class="row g-2">
                <div class="col-12">
                  <button class="btn btn-primary w-100" type="button" onclick="window.location.href='cetagory-list-data.php?category=રીટેલર%20કસ્મર'">
                  રીટેલર કસ્મર
                  </button>
                </div>
                <div class="col-12">
                  <button class="btn btn-primary w-100" type="button" onclick="window.location.href='cetagory-list-data.php?category=હોલસેલ%20કસ્ટમર'">
                  હોલસેલ કસ્ટમર
                  </button>
                </div>
                <div class="col-12">
                  <button class="btn btn-primary w-100" type="button" onclick="window.location.href='cetagory-list-data.php?category=સબંધી'">
                    સબંધી
                  </button>
                </div>
                <div class="col-12">
                  <button class="btn btn-primary w-100" type="button" onclick="window.location.href='cetagory-list-data.php?category=મિત્રો'">
                  મિત્રો
                  </button>
                </div>
                <div class="col-12">
                  <button class="btn btn-primary w-100" type="button" onclick="window.location.href='cetagory-list-data.php?category=ટ્રાન્સપોર્ટર'">
                  ટ્રાન્સપોર્ટર
                  </button>
                </div>
                <div class="col-12">
                  <button class="btn btn-primary w-100" type="button" onclick="window.location.href='cetagory-list-data.php?category=ધાર્મિક%20+%20સંસ્થા'">
                  ધાર્મિક સંસ્થા
                  </button>
                </div>
              </div>
            </div>
            <div class="col-6">
              <div class="row g-2">
                <div class="col-12">
                  <button class="btn btn-primary w-100" type="button" onclick="window.location.href='cetagory-list-data.php?category=ખરીદ%20વેપારી'">
                    ખરીદ વેપારી
                  </button>
                </div>
                <div class="col-12">
                  <button class="btn btn-primary w-100" type="button" onclick="window.location.href='cetagory-list-data.php?category=સેલ્સમેન'">
                    સેલ્સમેન
                  </button>
                </div>
                <div class="col-12">
                  <button class="btn btn-primary w-100" type="button" onclick="window.location.href='cetagory-list-data.php?category=કેટરર્સ'">
                  કેટરર્સ
                  </button>
                </div>
                <div class="col-12">
                  <button class="btn btn-primary w-100" type="button" onclick="window.location.href='cetagory-list-data.php?category=મજુર'">
                  મજુર
                  </button>
                </div>
                <div class="col-12">
                  <button class="btn btn-primary w-100" type="button" onclick="window.location.href='cetagory-list-data.php?category=બ્રોકર્સ'">
                  બ્રોકર્સ
                  </button>
                </div>
                <div class="col-12">
                  <button class="btn btn-primary w-100" type="button" onclick="window.location.href='cetagory-list-data.php?category=જનરલ'">
                  જનરલ  
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div
      id="message"
      style="display: none; margin: 20px; font-weight: bold; color: green; padding: 8px; background-color: beige; border-radius: 4px; border-color: aquamarine;"></div>

    <script>
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

      function checkDuplicateMobileNumber(mobileNumber) {
        fetch("./include/function.php", {
            method: "POST",
            body: new URLSearchParams({
              action: 'check_duplicate',
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
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>