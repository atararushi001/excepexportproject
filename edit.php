<!DOCTYPE html>
<html>
  <head>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <style>
      body {
        background-color: #006ff83b; /* Light goldenrod color */
      }
      input {
        background-color: white;
      }
    </style>
  </head>
  <body>
    <section class="bg-primary text-white text-center py-2">
      <div class="container">
        <h2 class="display-2">એડ્રેસ બુક</h2>
      </div>
    </section>
    <div class="container my-4">
      <?php
      include './include/conection.php';

      if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM general WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $record = $result->fetch_assoc();
      }

      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST['id'];
        $clientName = $_POST['clientname'];
        $clientAddress = $_POST['clientaddress'];
        $whatsappNumber = $_POST['whatsappnumber'];
        $mobileNumber = $_POST['mobilenumber'];
        $notes = $_POST['Notes'];
        $category = $_POST['category'];

        $sql = "UPDATE general SET client_name = ?, client_address = ?, whatsapp_number = ?, mobile_number = ?, notes = ?, category = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssi", $clientName, $clientAddress, $whatsappNumber, $mobileNumber, $notes, $category, $id);

        if ($stmt->execute()) {
          echo "<div class='alert alert-success'>Record updated successfully!</div>";
        } else {
          echo "<div class='alert alert-danger'>Failed to update record.</div>";
        }
      }
      ?>
      <div class="row">
        <div class="col-md-9">
          <form id="form" method="POST">
            <input type="hidden" name="id" value="<?php echo $record['id']; ?>">
            <div class="mb-3 row">
              <label class="col-sm-2 col-form-label">મોબાઈલ નંબર </label>
              <div class="col-sm-10">
                <input
                  class="form-control"
                  type="text"
                  placeholder="Mobile Number"
                  name="mobilenumber"
                  value="<?php echo $record['mobile_number']; ?>"
                  required
                />
              </div>
            </div>

            <div class="mb-3 row">
              <label class="col-sm-2 col-form-label">વોટસપ નંબર</label>
              <div class="col-sm-10">
                <input
                  class="form-control"
                  type="text"
                  placeholder="Whatsapp Number"
                  name="whatsappnumber"
                  value="<?php echo $record['whatsapp_number']; ?>"
                />
              </div>
            </div>

            <div class="mb-3 row">
              <label class="col-sm-2 col-form-label">નામ</label>
              <div class="col-sm-10">
                <input
                  class="form-control"
                  type="text"
                  placeholder="Name"
                  name="clientname"
                  value="<?php echo $record['client_name']; ?>"
                />
              </div>
            </div>

            <div class="mb-3 row">
              <label class="col-sm-2 col-form-label">ગામ</label>
              <div class="col-sm-10">
                <input
                  class="form-control"
                  type="text"
                  placeholder="city"
                  name="city"
                  value="<?php echo $record['city']; ?>"
                />
              </div>
            </div>

            <div class="mb-3 row">
              <label class="col-sm-2 col-form-label">સરનામુ</label>
              <div class="col-sm-10">
                <input
                  class="form-control"
                  type="text"
                  placeholder="address"
                  name="clientaddress"
                  value="<?php echo $record['client_address']; ?>"
                />
              </div>
            </div>

            <div class="mb-3 row">
              <label class="col-sm-2 col-form-label">નોંધ</label>
              <div class="col-sm-10">
                <textarea
                  class="form-control"
                  placeholder="Notes"
                  name="Notes"
                ><?php echo $record['notes']; ?></textarea>
              </div>
            </div>

            <!-- Hidden input for category -->
            <input type="hidden" name="category" id="category-input" value="<?php echo $record['category']; ?>">

         
            <div class="mt-3">
              <button class="btn btn-success" type="submit">Update Record</button>
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
              alert(data.message);x
              document.querySelector("input[name='mobilenumber']").value = '';
            }
          })
          .catch(error => console.error('Error:', error));
      }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>