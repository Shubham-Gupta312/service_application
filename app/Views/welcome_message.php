<?= $this->extend('inc/snippet.php'); ?>
<?= $this->section('content'); ?>

<div class="preloader">
    <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
    </div>
</div>

<div id="main-wrapper" style="margin-top: 70px;">
    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="table-head d-flex">
                    <div class="table-title" style="margin-right: auto;">
                        <h3>List of Customer's</h3>
                    </div>
                    <div class="table-add">
                        <button type="button" class="btn btn-outline-info add_customer" id="add_customer"><i
                                class="bi bi-person-fill-add"></i></button>
                    </div>
                </div>
                <!-- Add customer form -->
                <div id="customer-form">
                    <div class="container-fluid mt-3">
                        <div class="row justify-content-center">
                            <div class="col">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Registration Form</h4>
                                    </div>
                                    <div class="card-body">
                                        <form>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="name">Name</label>
                                                        <input type="text" class="form-control" id="name" name="name"
                                                            placeholder="Enter your name">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="mobile">Mobile Number</label>
                                                        <input type="tel" class="form-control" id="mobile" name="mobile"
                                                            placeholder="Enter your mobile number">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="gender">Gender</label>
                                                        <select class="form-control" id="gender" name="gender">
                                                            <option value="" disabled selected>Select your gender
                                                            </option>
                                                            <option value="male">Male</option>
                                                            <option value="female">Female</option>
                                                            <option value="other">Other</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="aadhar">Aadhar Number</label>
                                                        <input type="text" class="form-control" id="aadhar" name="aadhar"
                                                            placeholder="Enter your Aadhar number">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="address">Address</label>
                                                        <textarea class="form-control" id="address" name="address" rows="1"
                                                            placeholder="Enter your address"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" id="save" name="save" class="btn btn-primary">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Customer Form -->
                <!-- table list users  -->
                <table class="table table-bordered table-hover mt-3">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Mobile No.</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Address</th>
                            <th scope="col">Adhar No.</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>97947197149</td>
                            <td>Male</td>
                            <td>xyz city, state, zip code</td>
                            <td>0987 6543 1234</td>
                            <td>
                                <button class="btn btn-outline-warning"><i class="bi bi-eye-fill"></i></button>
                                <button class="btn btn-outline-success"><i class="bi bi-plus-lg"></i></button>
                                <button class="btn btn-outline-info"><i class="bi bi-pencil-square"></i></button>
                                <button class="btn btn-outline-danger"><i class="bi bi-trash"></i></i></button>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>97947197149</td>
                            <td>Male</td>
                            <td>xyz city, state, zip code</td>
                            <td>0987 6543 1234</td>
                            <td>
                                <button class="btn btn-outline-warning"><i class="bi bi-eye-fill"></i></button>
                                <button class="btn btn-outline-success"><i class="bi bi-plus-lg"></i></button>
                                <button class="btn btn-outline-info"><i class="bi bi-pencil-square"></i></button>
                                <button class="btn btn-outline-danger"><i class="bi bi-trash"></i></i></button>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Larry the Bird</td>
                            <td>97947197149</td>
                            <td>Male</td>
                            <td>xyz city, state, zip code</td>
                            <td>0987 6543 1234</td>
                            <td>
                                <button class="btn btn-outline-warning"><i class="bi bi-eye-fill"></i></button>
                                <button class="btn btn-outline-success"><i class="bi bi-plus-lg"></i></button>
                                <button class="btn btn-outline-info"><i class="bi bi-pencil-square"></i></button>
                                <button class="btn btn-outline-danger"><i class="bi bi-trash"></i></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('#customer-form').hide();
            $('#add_customer').click(function (e) {
                e.preventDefault();
                // console.log('clicked');
                $('#customer-form').show();
            });
        });
    </script>

    <?= $this->endSection() ?>