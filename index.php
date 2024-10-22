<!DOCTYPE html>
<html>
  <head>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css"
    />
  </head>
  <body>
    <section class="hero is-primary is-bold">
      <div class="hero-body">
        <div class="container">
          <h1 class="title" style="text-align: center;">જનરલ ક્રમાંક ચાર્ટ</h1>
        </div>
      </div>
    </section>
    <form id="form" class="container m-4 pl-4" method="POST">
      <div class="field">
        <label class="label">નામ</label>
        <div class="control">
          <input
            class="input"
            type="text"
            placeholder="નામ"
            name="clientname"
          />
        </div>
      </div>

      <div class="field">
        <label class="label">સરનામુ</label>
        <div class="control">
          <input
            class="input"
            type="text"
            placeholder="સરનામુ"
            name="clientaddress"
          />
        </div>
      </div>

      <div class="field">
        <label class="label">વોટસપ નં</label>
        <div class="control">
          <input
            class="input"
            type="text"
            placeholder="વોટસપ નં"
            name="whatsappnumber"
          />
        </div>
      </div>

      <div class="field">
        <label class="label">મોબાઈલ નં</label>
        <div class="control">
          <input
            class="input"
            type="text"
            placeholder="મોબાઈલ નં"
            name="mobilenumber"
          />
        </div>
      </div>

      <div class="field">
        <label class="label">નોંધ</label>
        <div class="control">
          <textarea
            class="textarea"
            placeholder="નોંધ"
            name="Notes"
          ></textarea>
        </div>
      </div>

      <!-- Hidden input for category -->
      <input type="hidden" name="category" id="category-input">

      <div class="field is-grouped">
        <div class="control">
          <button class="button is-primary submit-button" type="button" data-category="ગ્રાહક મિત્રો">
            ગ્રાહક મિત્રો
          </button>
        </div>
        <div class="control">
          <button class="button is-primary submit-button" type="button" data-category="મિત્રો">
            મિત્રો
          </button>
        </div>
        <div class="control">
          <button class="button is-primary submit-button" type="button" data-category="સબંધી">
            સબંધી
          </button>
        </div>
        <div class="control">
          <button class="button is-primary submit-button" type="button" data-category="સાગમટે">
            સાગમટે
          </button>
        </div>
        <div class="control">
          <button class="button is-primary submit-button" type="button" data-category="કન્દોય">
            કન્દોય
          </button>
        </div>
        <div class="control">
          <button class="button is-primary submit-button" type="button" data-category="વેપારી/ગ્રાહકો">
            વેપારી/ગ્રાહકો
          </button>
        </div>
   
      </div>
      <div class="field is-grouped">
               <div class="control">
          <button class="button is-primary submit-button" type="button" data-category="ખરીદ વેપારી">
            ખરીદ વેપારી
          </button>
        </div>
        <div class="control"> 
          <button class="button is-primary submit-button" type="button" data-category="સેલ્સમેન">
            સેલ્સમેન
          </button>
        </div>
        <div class="control">
          <button class="button is-primary submit-button" type="button" data-category="વાહન + મજુર">
            વાહન + મજુર
          </button>
        </div>
        <div class="control">
          <button class="button is-primary submit-button" type="button" data-category="ધાર્મિક + સંસ્થા">
            ધાર્મિક + સંસ્થા
          </button>
        </div>
        <div class="control">
          <button class="button is-primary submit-button" type="button" data-category="જનરલ">
             જનરલ
          </button>
        </div>
        <div class="control">
          <button class="button is-primary submit-button" type="button" data-category="અન્ય">
            અન્ય
          </button>
        </div>
      </div>
    </form>
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
  </body>
</html>