<?php
session_start();
if ($_SESSION['user_email'] == '') {
    header('Location: ./login');
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
            <li class="breadcrumb-item active">Insert Data</li>
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
            <h3 class="card-title">Election</h3>
            </div>
            <div class="card-body">
            <form id="formElection">
                <div class="card-body">
                    <div class="form-group">
                        <label for="year">Year:</label>
                        <select class="form-control searchSelect" id="year" placeholder="Enter year" name="year">
                            <option value="" selected>Select option</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="political_party">Political Party:</label>
                        <select class="form-control searchSelect" id="political_party" name="political_party">
                            <option value="" selected>Select option</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="county">County:</label>
                        <select class="form-control searchSelect" id="county" name="county">
                            <option value="" selected>Select option</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="vote_count">Vote Count:</label>
                        <input type="number" class="form-control" id="vote_count" name="vote_count" placeholder="Enter Number" min="0">
                    </div>
                </div>  
                <div class="card-footer">
                    <div class="row">
                        <div class="col-10" id="msgResponse">
                        </div>
                        <div class="col text-right">
                            <button type="submit" class="btn btn-primary" style="">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
            </div>
        </div>
        </div>
    </div>
    </div>
</section>
<script src="./node_modules/select2/dist/js/select2.js"></script>
<script src="./node_modules/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="./node_modules/jquery-validation/dist/additional-methods.min.js"></script>
<script src="./dist/js/elections-insert-page.js"></script>
</body>
</html>
