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
        <h1 class="display-4">Edit Record</h1>
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

      <form method="POST">
        <input type="hidden" name="id" value="<?php echo $record['id']; ?>">
        <div class="mb-3">
          <label class="form-label">નામ</label>
          <input class="form-control" type="text" name="clientname" value="<?php echo $record['client_name']; ?>">
        </div>
        <div class="mb-3">
          <label class="form-label">સરનામુ</label>
          <input class="form-control" type="text" name="clientaddress" value="<?php echo $record['client_address']; ?>">
        </div>
        <div class="mb-3">
          <label class="form-label">વોટસપ નં</label>
          <input class="form-control" type="text" name="whatsappnumber" value="<?php echo $record['whatsapp_number']; ?>">
        </div>
        <div class="mb-3">
          <label class="form-label">મોબાઈલ નં</label>
          <input class="form-control" type="text" name="mobilenumber" value="<?php echo $record['mobile_number']; ?>">
        </div>
        <div class="mb-3">
          <label class="form-label">નોંધ</label>
          <textarea class="form-control" name="Notes"><?php echo $record['notes']; ?></textarea>
        </div>
        <div class="mb-3">
          <label class="form-label">કેટેગરી</label>
          <input class="form-control" type="text" name="category" value="<?php echo $record['category']; ?>">
        </div>
        <button class="btn btn-primary" type="submit">Update</button>
        <button class="btn btn-secondary" type="button" onclick="window.location.href='index.php'">
             ડેટા ઉમેરો
            </button>
        <button class="btn btn-secondary" type="button" onclick="window.location.href='cetagory-list-data.php'">             
          બધા જુઓ
        </button>
      </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>