<?php
    session_start();
    if($_SESSION['user_email'] == ''){
        header("Location: ./login");
    }
?>
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item">Elections</li>
          <li class="breadcrumb-item active">List</li>
        </ol>
      </div>
    </div>
  </div>
</section>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Elections List</h3>
          </div>
          <div class="card-body">
            <table id="electionsDataTable" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th>County</th>
                <th>Political Party</th>
                <th>Vote Count</th>
                <th>Year</th>
              </tr>
              </thead>
              <tbody>
              </tbody>
              <tfoot>
              <tr>
                <th>County</th>
                <th>Political Party</th>
                <th>Vote Count</th>
                <th>Year</th>
              </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
      </div>
    </div>
  </div>
</section>

<script src="./node_modules/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="./node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="./node_modules/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="./node_modules/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
<script src="./node_modules/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="./node_modules/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="./node_modules/jszip/dist/jszip.min.js"></script>
<script src="./node_modules/pdfmake/build/pdfmake.min.js"></script>
<script src="./node_modules/pdfmake/build/vfs_fonts.js"></script>
<script src="./node_modules/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="./node_modules/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="./node_modules/datatables.net-buttons/js/buttons.colVis.min.js"></script>
<script src="./dist/js/elections-list-page.js"></script>
<script>
  
</script>
</body>
</html>
