<?php namespace App\Controllers;
use App\Models\UserModel;

class Users extends BaseController
{

	public function login()
	{
		helper(['form']);
		$data = [];
		if ($this->request->getMethod() == 'post') {
				$rules = [
					'email' => 'required|valid_email',
					'password' => 'required|validateUser[email,password]',
				];
				$errors = [
					'password' =>  [
						'validateUser' => 'Email or password don\'t match'
					]
				];
				if (!$this->validate($rules,$errors)) {
					$data['validation'] = $this->validator;
				} else {
					$model = new UserModel();
					$user = $model->where('email', $this->request->getVar('email'))->first();

					$this->setUserSession($user);
					return redirect()->to('./admin');

				}

			}
				echo view('admin/login',$data);

	}
	private function setUserSession($user)
	{
		$data = [
			'id' => $user['id'],
			'first_name' => $user['first_name'],
			'last_name' => $user['last_name'],
			'email' => $user['email'],
			'isLoggedIn' => true,
		];
		session()->set($data);
		return true;
	}
	public function register()
	{
		helper(['form']);
		$data = [];
		if ($this->request->getMethod() == 'post') {
				$rules = [
					'first_name' => 'required|min_length[3]|max_length[20]',
					'last_name' => 'required|min_length[3]|max_length[20]',
					'email' => 'required|min_length[3]|max_length[50]|valid_email|is_unique[users.email]',
					'password' => 'required|min_length[5]|max_length[255]',
				];
				if (!$this->validate($rules)) {
					$data['validation'] = $this->validator;
				} else {
					$model = new UserModel();
					$newData = [
						'first_name' => $this->request->getVar('first_name'),
						'last_name' => $this->request->getVar('last_name'),
						'email' => $this->request->getVar('email'),
						'password' => $this->request->getVar('password'),
					];
					$model->save($newData);
					$session = session();
					$session->setFlashdata('success','successful registration');
					return redirect()->to('./admin/login');
				}

			}

				echo view('admin/register',$data);

	}
	public function logout()
	{
		session()->destroy();
		return redirect()->to('./admin/login');
	}

	//--------------------------------------------------------------------

}
