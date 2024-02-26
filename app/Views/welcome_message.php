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
                <!-- View User Installment data modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog installment_data">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">User Data</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <table class="atble table-bordered" id="installmentTable">
                                    <thead>
                                        <tr>
                                            <th>Installment</th>
                                            <th>Name</th>
                                            <th>Payment Amount</th>
                                            <th>Payment Date</th>
                                            <th>Mode of Payment</th>
                                            <th>Transaction Id</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Shubham Gupta</td>
                                            <td>6000</td>
                                            <td>20-01-2024</td>
                                            <td>Paytm</td>
                                            <td>TR63288UY8329</td>
                                            <td>
                                                <button class="btn btn-outline-info edit" id="edit"><i
                                                        class="bi bi-pencil-square"></i></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Chiru</td>
                                            <td>6000</td>
                                            <td>20-02-2024</td>
                                            <td>Phonepay</td>
                                            <td>TR6378YGY8329</td>
                                            <td>
                                                <button class="btn btn-outline-info edit" id="edit"><i
                                                        class="bi bi-pencil-square"></i></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Demo 3</td>
                                            <td>6000</td>
                                            <td>20-03-2024</td>
                                            <td>Paytm</td>
                                            <td>TR63279UGJ899D345</td>
                                            <td>
                                                <button class="btn btn-outline-info edit" id="edit"><i
                                                        class="bi bi-pencil-square"></i></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End View User Installment data modal -->
                <!-- Add User Installment data modal -->
                <div class="modal fade" id="AddModal" tabindex="-1" aria-labelledby="AddModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="AddModalLabel">Add Installment Data</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="installmentFormID">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Installment</label>
                                                <input type="text" class="form-control" id="installment"
                                                    name="installment" placeholder="Enter your installment number">
                                                <div class="invalid-feedback" class="text-danger" id="installment_msg">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="mobile">Pay Amount</label>
                                                <input type="tel" class="form-control" id="amount" name="amount"
                                                    placeholder="Enter your Amount">
                                                <div class="invalid-feedback" class="text-danger" id="amount_msg"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="aadhar">Payment Date</label>
                                                <input type="date" class="form-control" id="pay_date" name="pay_date">
                                                <div class="invalid-feedback" class="text-danger" id="pay_date_msg">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="gender">Mode of Payment</label>
                                                <select class="form-control" id="pay_mode" name="pay_mode">
                                                    <option value="" disabled selected>Select your Payment Method
                                                    </option>
                                                    <option name="pay_mode" value="paytm">Paytm</option>
                                                    <option name="pay_mode" value="phonepay">PhonePay</option>
                                                    <option name="pay_mode" value="googlepay">GooglePay</option>
                                                    <option name="pay_mode" value="cash/card">Cash/Card</option>
                                                </select>
                                                <div class="invalid-feedback" class="text-danger" id="pay_mode_msg">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="address">Transaction Id</label><span> (If Cash: Enter
                                                    Cash)</span>
                                                <input class="form-control" id="trans_id" name="trans_id" rows="1"
                                                    placeholder="Enter your Transaction Id / Refrence Id">
                                                <div class="invalid-feedback" class="text-danger" id="trans_id_msg">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" id="add_inst" name="add_inst"
                                    class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Add User Installment data modal -->
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
                <!-- End of table list -->
            </div>
        </div>
    </div>

    <script>
        // fetch user data
        // jQuery(document).ready(function ($) {
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
        // });

        // OPEN REGISTRATION FORM
        $(document).ready(function () {
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
    </script>
    <script>
        // Fetch user Data
        $(document).ready(function () {
            $(document).on('click', '.see-data', function (e) {
                e.preventDefault();
                // console.log('clicked');
                // Get the ID of the row
                var button = $(this);
                var data = table.row(button.closest('tr')).data();
                var Id = data[0]; // Assuming the product ID is in the first column
                var name = data[1];
                console.log('id: ', Id, 'name: ', name);
            });

            // Add Installment
            $(document).on('click', '.add_installment', function (e) {
                e.preventDefault();
                // console.log('clicked');
                // Get the ID of the row
                var button = $(this);
                var data = table.row(button.closest('tr')).data();
                var Id = data[0]; // Assuming the product ID is in the first column
                var name = data[1];
                // console.log('id: ', Id, 'name: ', name);
            });
            $('#add_inst').click(function (e) {
                e.preventDefault();
                var formData = $('#installmentFormID').serialize();
                var UserName = name;
                var formDataWithUserName = formData + '&name=' + UserName;
                console.log(formDataWithUserName);
            });
        });
    </script>

    <?= $this->endSection() ?>