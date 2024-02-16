<?php

namespace App\Controllers;
use App\Libraries\Hash;

class AuthController extends BaseController
{
    public function register()
    {
        if($this->request->getMethod() == 'get'){
            return view('auth/register');
        } else if($this->request->getMethod() == 'post'){
            // validate form, save and submit the form
            $validation = $this->validate([
                'name' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Name Field is Required',
                    ],
                ],
                'email' => [
                    'rules' => 'required|valid_email',
                    'errors' => [
                        'required' => 'Your Email is required',
                        'valid_email' => 'You must enter a valid email'
                    ]
                ],
                'password' => [
                    'rules' => 'required|min_length[5]|max_length[10]',
                    'errors' => [
                        'required' => 'Password is required',
                        'min_length' => 'Password must have atleast 5 characters in length',
                        'max_length' => 'Password must not have more that 10 characters in length',
                    ]
                ],
                'confirm_password' => [
                    'rules' => 'required|matches[password]',
                    'errors' => [
                        'required' => 'Confirm Password is required',
                        'matches' => 'Your password should be match with entered Password'
                    ]
                ],
            ]);
            
            // check validation condition
            if(!$validation){
                $validation = \Config\Services::validation();
                $errors = $validation->getErrors();
                $message = ['status' => 'error', 'data' => 'Validated Form', 'errors' => $errors];
                return $this->response->setJSON($message);
            }
            else{
                $name = $this->request->getPost('name');
                $email = $this->request->getPost('email');
                $password = $this->request->getPost('password');

                $value = [
                    'name' => $name,
                    'email' => $email,
                    'password' => Hash::pass_enc($password),
                    // 'password' => $password,
                ];

                // calling model to submit data to database
                $register = new \App\Models\AdminModel();
                $query = $register->insert($value);

                if (!$query) {
                    $message = ['status' => 'error', 'message' => 'Something went Wrong!'];
                    return $this->response->setJSON($message);
                } else {
                    $message = ['status' => 'success', 'message' => 'Registered Successfully!!'];
                    return $this->response->setJSON($message);
                }
            }
        }
    }
    public function login()
    {
        return view('auth/login');
    }
}
