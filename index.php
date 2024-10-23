<!DOCTYPE html>
<html>
  <head>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
  </head>
  <body>
    <section class="bg-primary text-white text-center py-5">
      <div class="container">
        <h1 class="display-4">જનરલ ક્રમાંક ચાર્ટ</h1>
      </div>
    </section>
    <div class="container my-4">
      <div class="row">
        <div class="col-md-9">
          <form id="form" method="POST">
            <div class="mb-3">
              <label class="form-label">નામ</label>
              <input
                class="form-control"
                type="text"
                placeholder="નામ"
                name="clientname"
              />
            </div>

            <div class="mb-3">
              <label class="form-label">સરનામુ</label>
              <input
                class="form-control"
                type="text"
                placeholder="સરનામુ"
                name="clientaddress"
              />
            </div>

            <div class="mb-3">
              <label class="form-label">વોટસપ નં</label>
              <input
                class="form-control"
                type="text"
                placeholder="વોટસપ નં"
                name="whatsappnumber"
              />
            </div>

            <div class="mb-3">
              <label class="form-label">મોબાઈલ નં</label>
              <input
                class="form-control"
                type="text"
                placeholder="મોબાઈલ નં"
                name="mobilenumber"
              />
            </div>

            <div class="mb-3">
              <label class="form-label">નોંધ</label>
              <textarea
                class="form-control"
                placeholder="નોંધ"
                name="Notes"
              ></textarea>
            </div>

            <!-- Hidden input for category -->
            <input type="hidden" name="category" id="category-input">

            <div class="row g-2">
              <div class="col-6 col-md-2">
                <button class="btn btn-primary w-100 submit-button" type="button" data-category="ગ્રાહક મિત્રો">
                  ગ્રાહક મિત્રો
                </button>
              </div>
              <div class="col-6 col-md-2">
                <button class="btn btn-primary w-100 submit-button" type="button" data-category="મિત્રો">
                  મિત્રો
                </button>
              </div>
              <div class="col-6 col-md-2">
                <button class="btn btn-primary w-100 submit-button" type="button" data-category="સબંધી">
                  સબંધી
                </button>
              </div>
              <div class="col-6 col-md-2">
                <button class="btn btn-primary w-100 submit-button" type="button" data-category="સાગમટે">
                  સાગમટે
                </button>
              </div>
              <div class="col-6 col-md-2">
                <button class="btn btn-primary w-100 submit-button" type="button" data-category="કન્દોય">
                  કન્દોય
                </button>
              </div>
              <div class="col-6 col-md-2">
                <button class="btn btn-primary w-100 submit-button" type="button" data-category="વેપારી/ગ્રાહકો">
                  વેપારી/ગ્રાહકો
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
                <button class="btn btn-primary w-100 submit-button" type="button" data-category="વાહન + મજુર">
                  વાહન + મજુર
                </button>
              </div>
              <div class="col-6 col-md-2">
                <button class="btn btn-primary w-100 submit-button" type="button" data-category="ધાર્મિક + સંસ્થા">
                  ધાર્મિક + સંસ્થા
                </button>
              </div>
              <div class="col-6 col-md-2">
                <button class="btn btn-primary w-100 submit-button" type="button" data-category="જનરલ">
                  જનરલ
                </button>
              </div>
              <div class="col-6 col-md-2">
                <button class="btn btn-primary w-100 submit-button" type="button" data-category="અન્ય">
                  અન્ય
                </button>
              </div>
            </div>
          </form>
        </div>
        <div class="col-md-3">
          <div class="button-container">
            <!-- Button to view all data -->
            <button class="btn btn-secondary w-100 mt-3" type="button" onclick="window.location.href='cetagory-list-data.php'">
              View All Data
            </button>
          </div>
        </div>
      </div>
    </div>

    <div
      id="message"
      style="
        display: none;
        margin: 20px;
        font-weight: bold;
        color: green;
        padding: 8px;
        background-color: beige;
        border-radius: 4px;
        border-color: aquamarine;
      "
    ></div>

    <script>
      // Add event listeners to all submit buttons
      document.querySelectorAll(".submit-button").forEach(function(button) {
        button.addEventListener("click", function() {
          // Set the hidden input value to the data-category attribute of the clicked button
          document.getElementById("category-input").value = this.getAttribute("data-category");
          // Trigger form submission
          submitForm();
        });
      });

      function submitForm() {
        document.getElementById("message").textContent = "Submitting..";
        document.getElementById("message").style.display = "block";

        // Collect the form data
        var form = document.getElementById("form");
        var formData = new FormData(form);
        var keyValuePairs = [];
        for (var pair of formData.entries()) {
          keyValuePairs.push(pair[0] + "=" + pair[1]);
        }

        var formDataString = keyValuePairs.join("&");

        // Debugging: Log the form data
        console.log(formDataString);

        // Disable all submit buttons
        var submitButtons = document.querySelectorAll(".submit-button");
        submitButtons.forEach(function(button) {
          button.disabled = true;
        });

        // Send a POST request to your PHP script
        fetch("./include/function.php", {
            redirect: "follow",
            method: "POST",
            body: formDataString,
            headers: {
              "Content-Type": "application/x-www-form-urlencoded;charset=UTF-8",
            },
          })
          .then(function (response) {
            // Check if the request was successful
            if (response.ok) {
              return response.json(); // Assuming your script returns JSON response
            } else {
              throw new Error("Failed to submit the form.");
            }
          })
          .then(function (data) {
            // Display a success message
            document.getElementById("message").textContent = data.message;
            document.getElementById("message").style.display = "block";
            document.getElementById("message").style.backgroundColor = "green";
            document.getElementById("message").style.color = "beige";

            // Enable all submit buttons
            submitButtons.forEach(function(button) {
              button.disabled = false;
            });

            form.reset();

            setTimeout(function () {
              document.getElementById("message").textContent = "";
              document.getElementById("message").style.display = "none";
            }, 2600);
          })
          .catch(function (error) {
            // Handle errors, you can display an error message here
            console.error(error);
            document.getElementById("message").textContent =
              "An error occurred while submitting the form.";
            document.getElementById("message").style.display = "block";

            // Enable all submit buttons
            submitButtons.forEach(function(button) {
              button.disabled = false;
            });
          });
      }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>