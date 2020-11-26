<?php namespace App\Controllers;
use App\Models\CategoryModel_a;


class Category_a extends BaseController
{
	public function index()
		{
			$model = new CategoryModel_a();

			$data['categories'] = $model->getCategories();

			echo view('admin/templates/header');
			echo view('admin/templates/nav');
			echo view('admin/all_category',$data);
			echo view('admin/templates/footer');

	}

	public function add_category()
	{
		$model = new CategoryModel_a();
		helper(['form']);

		    if ($this->request->getMethod() === 'post' && $this->validate([
		            'name' => 'required|min_length[3]|max_length[30]'
		        ]))
		    {
					$newData = [
							'name' => $this->request->getPost('name'),
							'slug'  => url_title($this->request->getPost('name'), '-', TRUE),

					];
		        $model->save($newData);
						$session = session();
						$session->setFlashdata('success','successful added');

						return redirect()->to('./admin/category');
		    }
		    else
		    {
					echo view('admin/templates/header');
			    echo view('admin/templates/nav');
			    echo view('admin/add_cat_form');
			    echo view('admin/templates/footer');

				}
			}

			public function edit_category()
			{
				$model = new CategoryModel_a();
				helper(['form']);

				    if ($this->request->getMethod() === 'post' && $this->validate([
				            'name' => 'required|min_length[3]|max_length[255]'
				        ]))
				    {
							$newData = [
								'id' => $this->request->getPost('id'),
									'name' => $this->request->getPost('name'),
									'slug'  => url_title($this->request->getPost('name'), '-', TRUE),

							];
				        $model->save($newData);
								$session = session();
								$session->setFlashdata('success','successful updated');

								return redirect()->to('./admin/category');
				    }
				    else
				    {
							$id = $this->request->getVar('id');
							if ($id) {
								$data['cat'] = $model->getCategories($id);
							}

							echo view('admin/templates/header');
					    echo view('admin/templates/nav');
					    echo view('admin/edit_cat_form',$data);
					    echo view('admin/templates/footer');

						}
					}

	public function delete_category()
	{
		$model = new CategoryModel_a();

		$id = $this->request->getVar('id');
		$model->deleteCategory($id );
		$session = session();
		$session->setFlashdata('success','Succesfully deleted');
		return redirect()->to('./admin/category');
	}
	//--------------------------------------------------------------------

}
