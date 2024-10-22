<!DOCTYPE html>
<html>
  <head>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css"
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
      <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
        <thead>
          <tr>
            <th>નામ</th>
            <th>સરનામુ</th>
            <th>વોટસપ નં</th>
            <th>મોબાઈલ નં</th>
            <th>નોંધ</th>
            <th>કેટેગરી</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script>
      $(document).ready(function() {
        $('#dataTable').DataTable({
          "ajax": "./include/function.php",
          "columns": [
            { "data": "clientname" },
            { "data": "clientaddress" },
            { "data": "whatsappnumber" },
            { "data": "mobilenumber" },
            { "data": "Notes" },
            { "data": "category" }
          ]
        });
      });
    </script>
  </body>
</html>