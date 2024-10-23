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
    <link
      href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.bootstrap5.min.css"
      rel="stylesheet"
    />
    <style>
      .button-container {
        display: flex;
        flex-direction: column;
        gap: 10px;
      }
    </style>
  </head>
  <body>
    <section class="bg-primary text-white text-center py-5">
      <div class="container">
        <h1 class="display-4">Data Table</h1>
      </div>
    </section>
    <div class="container my-4">
      <div class="row">
        <div class="col-md-9">
          <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th>નામ</th>
                <th>સરનામુ</th>
                <th>વોટસપ નં</th>
                <th>મોબાઈલ નં</th>
                <th>નોંધ</th>
                <th>કેટેગરી</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
        <div class="col-md-3">
          <div class="button-container">
            <button class="btn btn-secondary w-100 mt-3" type="button" onclick="window.location.href='index.php'">
             ડેટા ઉમેરો
            </button>
            <button class="btn btn-primary w-100 submit-button" type="button" data-category="ગ્રાહક મિત્રો">
              ગ્રાહક મિત્રો
            </button>
            <button class="btn btn-primary w-100 submit-button" type="button" data-category="મિત્રો">
              મિત્રો
            </button>
            <button class="btn btn-primary w-100 submit-button" type="button" data-category="સબંધી">
              સબંધી
            </button>
            <button class="btn btn-primary w-100 submit-button" type="button" data-category="સાગમટે">
              સાગમટે
            </button>
            <button class="btn btn-primary w-100 submit-button" type="button" data-category="કન્દોય">
              કન્દોય
            </button>
            <button class="btn btn-primary w-100 submit-button" type="button" data-category="વેપારી/ગ્રાહકો">
              વેપારી/ગ્રાહકો
            </button>
            <button class="btn btn-primary w-100 submit-button" type="button" data-category="ખરીદ વેપારી">
              ખરીદ વેપારી
            </button>
            <button class="btn btn-primary w-100 submit-button" type="button" data-category="સેલ્સમેન">
              સેલ્સમેન
            </button>
            <button class="btn btn-primary w-100 submit-button" type="button" data-category="વાહન + મજુર">
              વાહન + મજુર
            </button>
            <button class="btn btn-primary w-100 submit-button" type="button" data-category="ધાર્મિક + સંસ્થા">
              ધાર્મિક + સંસ્થા
            </button>
            <button class="btn btn-primary w-100 submit-button" type="button" data-category="જનરલ">
              જનરલ
            </button>
            <button class="btn btn-primary w-100 submit-button" type="button" data-category="અન્ય">
              અન્ય
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Hidden input for category -->
    <input type="hidden" id="category-input" value="">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script>
      $(document).ready(function() {
        var table = $('#dataTable').DataTable({
          "ajax": {
            "url": "./include/function.php",
            "dataSrc": "data"
          },
          "columns": [
            { "data": "clientname" },
            { "data": "clientaddress" },
            { "data": "whatsappnumber" },
            { "data": "mobilenumber" },
            { "data": "Notes" },
            { "data": "category" },
            {
              "data": null,
              "defaultContent": '<button class="btn btn-sm btn-warning edit-button">Edit</button> <button class="btn btn-sm btn-danger delete-button">Delete</button>'
            }
          ],
          "dom": 'Bfrtip',
          "buttons": [
            {
              extend: 'excelHtml5',
              text: 'Download',
              filename: 'જનરલક્રમાંકચાર્ટ'
            }
          ]
        });

        // Custom search function for exact match
        $.fn.dataTable.ext.search.push(
          function(settings, data, dataIndex) {
            var category = $('#category-input').val();
            var rowCategory = data[5]; // Use data for the category column

            // Debugging: Log the values of category and rowCategory
            console.log('Category:', category);
            console.log('Row Category:', rowCategory);

            if (category === "" || rowCategory === category) {
              return true;
            }
            return false;
          }
        );

        // Add event listeners to all submit buttons
        document.querySelectorAll(".submit-button").forEach(function(button) {
          button.addEventListener("click", function() {
            var category = this.getAttribute("data-category");
            $('#category-input').val(category);
            table.draw();
          });
        });

        // Edit button click event
        $('#dataTable tbody').on('click', '.edit-button', function() {
          var data = table.row($(this).parents('tr')).data();
          window.location.href = 'edit.php?id=' + data.id;
        });

        // Delete button click event
        $('#dataTable tbody').on('click', '.delete-button', function() {
          var data = table.row($(this).parents('tr')).data();
          if (confirm('Are you sure you want to delete this record?')) {
            $.ajax({
              url: './include/function.php',
              type: 'POST',
              data: { action: 'delete', id: data.id },
              success: function(response) {
                table.ajax.reload();
              }
            });
          }
        });
      });
    </script>
  </body>
</html>