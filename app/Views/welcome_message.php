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
                                        <form id="registerForm">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="name">Name</label>
                                                        <input type="text" class="form-control" id="name" name="name"
                                                            placeholder="Enter your name">
                                                        <div class="invalid-feedback" class="text-danger" id="name_msg">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="mobile">Mobile Number</label>
                                                        <input type="tel" class="form-control" id="mobile" name="mobile"
                                                            placeholder="Enter your mobile number" min="0"
                                                            maxlength="10" minlength="10" pattern="/^-?\d+\.?\d*$/"
                                                            onkeypress="if(this.value.length==10) return false;">
                                                        <div class="invalid-feedback" class="text-danger"
                                                            id="mobile_msg"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="gender">Gender</label>
                                                        <select class="form-control" id="gender" name="gender">
                                                            <option value="" disabled selected>Select your gender
                                                            </option>
                                                            <option name="gender" value="male">Male</option>
                                                            <option name="gender" value="female">Female</option>
                                                            <option name="gender" value="other">Other</option>
                                                        </select>
                                                        <div class="invalid-feedback" class="text-danger"
                                                            id="gender_msg"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="aadhar">Aadhar Number</label>
                                                        <input type="text" class="form-control" id="aadhar"
                                                            name="aadhar" placeholder="Enter your Aadhar number" min="0"
                                                            maxlength="12" minlength="12" pattern="/^-?\d+\.?\d*$/"
                                                            onkeypress="if(this.value.length==12) return false;">
                                                        <div class="invalid-feedback" class="text-danger"
                                                            id="aadhar_msg"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="address">Address</label>
                                                        <textarea class="form-control" id="address" name="address"
                                                            rows="1" placeholder="Enter your address"></textarea>
                                                        <div class="invalid-feedback" class="text-danger"
                                                            id="address_msg"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" id="save" name="save"
                                                class="btn btn-primary">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Customer Form -->
                <!-- table list users  -->
                <table class="table table-bordered table-hover mt-3" id="userData">
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
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            // OPEN REGISTRATION FORM
            $('#customer-form').hide();
            $('#add_customer').click(function (e) {
                e.preventDefault();
                // console.log('clicked');
                $('#customer-form').show();
            });
            // SAVE USER INFO
            $('#save').click(function (e) {
                e.preventDefault();
                // console.log('clicked');
                var formData = $('#registerForm').serialize();
                // console.log(formData);
                $.ajax({
                    method: "POST",
                    url: "<?= base_url('add_userdata') ?>",
                    data: formData,
                    dataType: "json",
                    success: function (response) {
                        // console.log(response);
                        if (response.status == 200) {
                            // console.log(response)
                            $('#customer-form').hide();
                            $('input').val('');
                            table.ajax.reload(null, false);
                        } else {
                            var errors = response.errors;
                            for (const key in errors) {
                                document.getElementById(key).classList.add('is-invalid');
                                document.getElementById(key + '_msg').innerHTML = errors[key];
                            }
                        }
                    }
                });
            });
        });

        // fetch user data
        jQuery(document).ready(function ($) {
            var table = $('#userData').DataTable({
                processing: true,
                serverSide: true,
                paging: true,
                "fnCreatedRow": function (row, data, index) {
                    var pageInfo = table.page.info();
                    var currentPage = pageInfo.page;
                    var pageLength = pageInfo.length;
                    var rowNumber = index + 1 + (currentPage * pageLength);
                    $('td', row).eq(0).html(rowNumber);
                },
                ajax: {
                    url: "<?= base_url('fetchUserData') ?>",
                    method: 'GET',
                },
                drawCallback: function (settings) {
                    // console.log('Table Redrwan', settings);
                    table.rows().every(function (index, element) {
                        // Get the node (HTML element) for the row
                        var rowNode = this.node();
                        // console.log(rowNode)
                        // Get text content of the fifth column (index 5)
                        var fifthColumn = $(rowNode).find('td:eq(5)'); // Select the fifth column (index 5)
                        var aadharNumber = fifthColumn.text(); // Extract text content

                        // Get last four digits of Aadhar number
                        var lastFourDigits = aadharNumber.slice(-4);

                        // Mask all but the last four digits
                        var maskedAadhar = "XXXX-XXXX-" + lastFourDigits; // Replace 'XXXX' with appropriate masking characters

                        // Set the masked Aadhar number as the new text content of the cell
                        fifthColumn.text(maskedAadhar);
                    });
                }
            });
        });
    </script>

    <?= $this->endSection() ?>