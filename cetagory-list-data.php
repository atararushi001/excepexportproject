<!DOCTYPE html>
<html>

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
  <link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.bootstrap5.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet" />
  <style>
    /* .button-container {
      display: flex;
      flex-direction: column;
      gap: 10px;
    } */

    body {
      background-color: #006ff83b;
      /* Light goldenrod color */
    }

    input {
      background-color: white;
    }

    table {
      background-color: white;
    }
  </style>
</head>

<body>
  <div>
  <section class="bg-primary text-white text-center py-2">
    <div class="container">
      <h1 class="display-4" id="header-title">એડ્રેસ બુક</h1>
      </div>
    </section>
    <div class="row g-2" style="background-color: white; padding-bottom: .70rem; border-radius: .25rem;">
      <div class="col-6 col-md-2">
        <button class="btn btn-primary w-100 " type="button" onclick="window.location.href='cetagory-list-data.php?category=રીટેલર%20કસ્મર'">
          રીટેલર કસ્મર (1) 
        </button>
      </div>
      <div class="col-6 col-md-2">
        <button class="btn btn-primary w-100" type="button" onclick="window.location.href='cetagory-list-data.php?category=હોલસેલ%20કસ્ટમર'">
          હોલસેલ કસ્ટમર (2)
        </button>
      </div>
      <div class="col-6 col-md-2">
        <button class="btn btn-primary w-100" type="button" onclick="window.location.href='cetagory-list-data.php?category=સબંધી'">
          સબંધી (3)
        </button>
      </div>
      <div class="col-6 col-md-2">
        <button class="btn btn-primary w-100" type="button" onclick="window.location.href='cetagory-list-data.php?category=મિત્રો'">
          મિત્રો (4)
        </button>
      </div>
      <div class="col-6 col-md-2">
        <button class="btn btn-primary w-100" type="button" onclick="window.location.href='cetagory-list-data.php?category=ટ્રાન્સપોર્ટર'">
          ટ્રાન્સપોર્ટર (5)
        </button>
      </div>
      <div class="col-6 col-md-2">
        <button class="btn btn-primary w-100" type="button" onclick="window.location.href='cetagory-list-data.php?category=ધાર્મિક%20સંસ્થા'">
          ધાર્મિક સંસ્થા (6)
        </button>
      </div>
      <div class="col-6 col-md-2">
        <button class="btn btn-primary w-100" type="button" onclick="window.location.href='cetagory-list-data.php?category=ખરીદ%20વેપારી'">
          ખરીદ વેપારી (7)
        </button>
      </div>
      <div class="col-6 col-md-2">
        <button class="btn btn-primary w-100" type="button" onclick="window.location.href='cetagory-list-data.php?category=સેલ્સમેન'">
          સેલ્સમેન (8)
        </button>
      </div>
      <div class="col-6 col-md-2">
        <button class="btn btn-primary w-100" type="button" onclick="window.location.href='cetagory-list-data.php?category=કેટરર્સ'">
          કેટરર્સ (9)
        </button>
      </div>
      <div class="col-6 col-md-2">
        <button class="btn btn-primary w-100" type="button" onclick="window.location.href='cetagory-list-data.php?category=મજુર'">
          મજુર (10)
        </button>
      </div>
      <div class="col-6 col-md-2">
        <button class="btn btn-primary w-100" type="button" onclick="window.location.href='cetagory-list-data.php?category=બ્રોકર્સ'">
          બ્રોકર્સ (11)
        </button>
      </div>
      <div class="col-6 col-md-2">
        <button class="btn btn-primary w-100" type="button" onclick="window.location.href='cetagory-list-data.php?category=જનરલ'">
          જનરલ (12)
        </button>
      </div>
      <div class="col-6 col-md-2">
        <button class="btn btn-primary w-100" type="button" onclick="window.location.href='index.php'">
          ડેટા ઉમેરો (13)
        </button>
      </div>
      <div class="col-6 col-md-2">
        <button class="btn btn-primary w-100" type="button" onclick="window.location.href='cetagory-list-data.php'">
          view all (14)
        </button>
      </div>
    </div>
  </div>
  <div class="p-2 ">


    <div class="row">

      <div class="col-md-12">
        <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
          <thead>
            <tr>
              <th>નામ</th>
              <th>સરનામુ</th>
              <th>ગામ</th>
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
      <!-- <div class="col-md-3">
        <div class="row g-2" style="background-color: white; padding-bottom: .70rem; border-radius: .25rem;">
          <div class="col-12">
            <button class="btn btn-primary w-100" type="button" onclick="window.location.href='index.php'">
              ડેટા ઉમેરો (13)
            </button>
          </div>
          <div class="col-12">
            <button class="btn btn-primary w-100" type="button" onclick="window.location.href='cetagory-list-data.php'">
              view all (14)
            </button>
          </div>
          <div class="row g-2">
            <div class="col-6">
              <div class="row g-2">
                <div class="col-12">
                  <button class="btn btn-primary w-100 " type="button" onclick="window.location.href='cetagory-list-data.php?category=રીટેલર%20કસ્મર'">
                    રીટેલર કસ્મર (1)
                  </button>
                </div>
                <div class="col-12">
                  <button class="btn btn-primary w-100" type="button" onclick="window.location.href='cetagory-list-data.php?category=હોલસેલ%20કસ્ટમર'">
                    હોલસેલ કસ્ટમર (2)
                  </button>
                </div>
                <div class="col-12">
                  <button class="btn btn-primary w-100" type="button" onclick="window.location.href='cetagory-list-data.php?category=સબંધી'">
                    સબંધી (3)
                  </button>
                </div>
                <div class="col-12">
                  <button class="btn btn-primary w-100" type="button" onclick="window.location.href='cetagory-list-data.php?category=મિત્રો'">
                    મિત્રો (4)
                  </button>
                </div>
                <div class="col-12">
                  <button class="btn btn-primary w-100" type="button" onclick="window.location.href='cetagory-list-data.php?category=ટ્રાન્સપોર્ટર'">
                    ટ્રાન્સપોર્ટર (5)
                  </button>
                </div>
                <div class="col-12">
                  <button class="btn btn-primary w-100" type="button" onclick="window.location.href='cetagory-list-data.php?category=ધાર્મિક%20સંસ્થા'">
                    ધાર્મિક સંસ્થા (6)
                  </button>
                </div>
              </div>
            </div>
            <div class="col-6">
              <div class="row g-2">
                <div class="col-12">
                  <button class="btn btn-primary w-100" type="button" onclick="window.location.href='cetagory-list-data.php?category=ખરીદ%20વેપારી'">
                    ખરીદ વેપારી (7)
                  </button>
                </div>
                <div class="col-12">
                  <button class="btn btn-primary w-100" type="button" onclick="window.location.href='cetagory-list-data.php?category=સેલ્સમેન'">
                    સેલ્સમેન (8)
                  </button>
                </div>
                <div class="col-12">
                  <button class="btn btn-primary w-100" type="button" onclick="window.location.href='cetagory-list-data.php?category=કેટરર્સ'">
                    કેટરર્સ (9)
                  </button>
                </div>
                <div class="col-12">
                  <button class="btn btn-primary w-100" type="button" onclick="window.location.href='cetagory-list-data.php?category=મજુર'">
                    મજુર (10)
                  </button>
                </div>
                <div class="col-12">
                  <button class="btn btn-primary w-100" type="button" onclick="window.location.href='cetagory-list-data.php?category=બ્રોકર્સ'">
                    બ્રોકર્સ (11)
                  </button>
                </div>
                <div class="col-12">
                  <button class="btn btn-primary w-100" type="button" onclick="window.location.href='cetagory-list-data.php?category=જનરલ'">
                    જનરલ (12)
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> -->
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
      // Extract category from URL
      const urlParams = new URLSearchParams(window.location.search);
      const category = urlParams.get('category');
      if (category) {
        $('#category-input').val(category);
        $('#header-title').text(category);
      } else {
        $('#header-title').text('Address Book ');
      }

      var table = $('#dataTable').DataTable({
        "ajax": {
          "url": "./include/function.php",
          "data": function(d) {
            d.category = $('#category-input').val();
          },
          "dataSrc": "data"
        },
        "columns": [{
            "data": "clientname"
          },
          {
            "data": "clientaddress"
          },
          {
            "data": "city"
          },
          {
            "data": "whatsappnumber"
          },
          {
            "data": "mobilenumber"
          },
          {
            "data": "Notes"
          },
          {
            "data": "category"
          },
          {
            "data": null,
            "defaultContent": '<button class="btn btn-sm btn-warning edit-button"><i class="fas fa-edit"></i></button> <button class="btn btn-sm btn-danger delete-button"><i class="fas fa-trash-alt"></i></button>'
          }
        ],
        "dom": 'Bfrtip',
        "buttons": [{
          extend: 'excelHtml5',
          text: 'Download',
          filename: 'જનરલક્રમાંકચાર્ટ'
        }]
      });

      // Custom search function for exact match
      $.fn.dataTable.ext.search.push(
        function(settings, data, dataIndex) {
          var category = $('#category-input').val();
          var rowCategory = data[6]; // Use data for the category column

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
            data: {
              action: 'delete',
              id: data.id
            },
            success: function(response) {
              table.ajax.reload();
            }
          });
        }
      });

      // Click event for mobile number
      $('#dataTable tbody').on('click', 'td:nth-child(4)', function() {
        var data = table.row($(this).parents('tr')).data();
        window.location.href = 'tel:' + data.mobilenumber;
      });

      // Click event for WhatsApp number
      $('#dataTable tbody').on('click', 'td:nth-child(3)', function() {
        var data = table.row($(this).parents('tr')).data();
        window.location.href = 'tel:' + data.whatsappnumber;
      });

      // Trigger initial table draw if category is set
      if (category) {
        table.draw();
      }
    });
  </script>
</body>

</html>