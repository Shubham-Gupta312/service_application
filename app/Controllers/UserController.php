<?php

namespace App\Controllers;
use App\Libraries\Hash;
class UserController extends BaseController
{
    public function add_userdata()
    {
        $validation = $this->validate([
            'name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "Your Name is Required"
                ]
            ],
            'mobile' => [
                'rules' => 'required|integer|min_length[10]|max_length[10]',
                'errors' => [
                    'required' => 'Mobile No. is required',
                    'integer' => 'Only Numeric value Accepted',
                    'min_length' => 'Mobile No. must have atleast 10 characters in length',
                    'max_length' => 'Mobile No. must not have more that 10 characters in length',
                ]
            ],
            'gender' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Please Select an option from the dropdown'
                ]
            ],
            'aadhar' => [
                'rules' => 'required|integer|min_length[12]|max_length[12]',
                'errors' => [
                    'required' => 'Adhar No. is required',
                    'integer' => 'Only Numeric value Accepted',
                    'min_length' => 'Adhar No. must have atleast 12 characters in length',
                    'max_length' => 'Adhar No. must not have more that 12 characters in length',
                ]
            ],
            'address' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Address is Required',
                ]
            ],
        ]);

        // Check validation
        if (!$validation) {
            $validation = \Config\Services::validation();
            $errors = $validation->getErrors();
            $message = ['status' => 400, 'data' => 'Form is Validated', 'errors' => $errors];
            return $this->response->setJSON($message);
        } else {
            $name = $this->request->getPost('name');
            $mobile = $this->request->getPost('mobile');
            $gender = $this->request->getPost('gender');
            $aadhar = $this->request->getPost('aadhar');
            $address = $this->request->getPost('address');

            // Encrypt Aadhar number
            $encryptedAadhar = Hash::encryptAadhar($aadhar);


            $data = [
                'name' => $name,
                'mobile' => $mobile,
                'gender' => $gender,
                'aadhar' => $encryptedAadhar,
                'address' => $address
            ];

            $insertUser = new \App\Models\UserModel();
            $query = $insertUser->insert($data);

            if (!$query) {
                $message = ['status' => 500, 'message' => "Something went Wrong!!"];
                return $this->response->setJSON($message);
            } else {
                $message = ['status' => 200, 'message' => "User Data Add Successfully!!"];
                return $this->response->setJSON($message);
            }
        }
    }

    public function fetchUserData()
    {
        $fetchUser = new \App\Models\UserModel();

        $draw = $_GET['draw'];
        $start = $_GET['start'];
        $length = $_GET['length'];
        $searchValue = $_GET['search']['value'];

        // data order in descending order
        $fetchUser->orderBy('id', 'DESC');

        // Apply search Filter
        if (!empty($searchValue)) {
            $fetchUser->groupStart();
            $fetchUser->like('id', $searchValue);
            $fetchUser->orLike('name', $searchValue);
            $fetchUser->orLike('gender', $searchValue);
            $fetchUser->groupEnd();
        }
        ;

        $data['user'] = $fetchUser->findAll($length, $start);
        $totalRecords = $fetchUser->countAll();
        $associativeArray = [];

        foreach ($data['user'] as $row) {
            // Decrypt Aadhar number
            $aadhar = Hash::decryptAadhar($row['aadhar']);

            $associativeArray[] = array(
                0 => $row['id'],
                1 => $row['name'],
                2 => $row['mobile'],
                3 => $row['gender'],
                4 => $row['address'],
                5 => $aadhar,
                6 => '<button class="btn btn-outline-warning see-data" id="see-data" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-eye-fill"></i></button>
                <button class="btn btn-outline-success add_installment" id="add_installment" data-bs-toggle="modal" data-bs-target="#AddModal"><i class="bi bi-plus-lg"></i></button>
                <button class="btn btn-outline-info edit" id="edit"><i class="bi bi-pencil-square"></i></button>
                <button class="btn btn-outline-danger delete" id="delete"><i class="bi bi-trash"></i></i></button>'

            );
        }

        if (empty($data['user'])) {
            $output = array(
                "draw" => intval($draw),
                'recordsTotal' => 0,
                'recordsFiltered' => 0,
                'data' => []
            );
        } else {
            $output = array(
                "draw" => intval($draw),
                'recordsTotal' => $totalRecords,
                'recordsFiltered' => $totalRecords,
                'data' => $associativeArray
            );
        }
        return $this->response->setJSON($output);
    }
}
