<?php namespace App\Controllers;
use App\Models\UserModel;

class Dashboard extends BaseController
{

  public function profile()
  {
    helper(['form']);
      $data = [];
      $model = new UserModel();

      if ($this->request->getMethod() == 'post') {
          $rules = [
            'first_name' => 'required|min_length[3]|max_length[20]',
            'last_name' => 'required|min_length[3]|max_length[20]',
          ];
          if ($this->request->getPost('password') !=  '') {
            $rules['password'] = 'required|min_length[5]|max_length[255]';
          }
          if (!$this->validate($rules)) {
            $data['validation'] = $this->validator;
          } else {
            $newData = [
              'id' => session()->get('id'),
              'first_name' => $this->request->getVar('first_name'),
              'last_name' => $this->request->getVar('last_name'),
            ];
            if ($this->request->getPost('password') != '') {
              $newData['password'] = $this->request->getVar('password');
            }

            $model->save($newData);
            $session = session();
            $session->setFlashdata('success','successful Updated');
            //cho print_r($newData);		       // echo view('admin/templates/success');

            return redirect()->to('./admin/profile');
          }

        }

        $data['user'] =  $model->where('id',session()->get('id'))->first();
    echo view('admin/templates/header');
    echo view('admin/templates/nav');
        echo view('admin/profile',$data);
    echo view('admin/templates/footer');

  }

	//--------------------------------------------------------------------

}
