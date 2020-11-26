<?php namespace App\Controllers;
use App\Models\PostModel_a;
use App\Models\CategoryModel_a;


class Post_a extends BaseController
{
	public function index()
		{
			$model = new PostModel_a();
			$pager = service('pager');

				$data = [
						'posts' => $model->paginate(10,'group'),
						'pager' => $model->pager
				];

		echo view('admin/templates/header');
		echo view('admin/templates/nav');
		echo view('admin/all_posts',$data);
		echo view('admin/templates/footer');

	}

	public function add_post()
	{
		$model = new PostModel_a();
		helper(['form']);

		    if ($this->request->getMethod() === 'post' && $this->validate([
		            'title' => 'required|min_length[3]|max_length[255]',
		            'body'  => 'required',
								'excerpt'  => 'required',
								'cat_id'  => 'required',
		        ]))
		    {
					$published = ($this->request->getPost('published'))?$this->request->getPost('published'):'0';

					$newData = [
							'title' => $this->request->getPost('title'),
							'excerpt'=> $this->request->getPost('excerpt'),
							'slug'  => url_title($this->request->getPost('title'), '-', TRUE),
							'body'  => $this->request->getPost('body'),
							'photo_string'  => $this->request->getPost('picture'),
							'cat_id'  => $this->request->getPost('cat_id'),
							'user_id'  => session()->get('id'),
							'cat_id'  => $this->request->getPost('cat_id'),
							'published'  => $published
					];
		        $model->save($newData);
						$session = session();
						$session->setFlashdata('success','successful added');

						return redirect()->to('./admin');
		    }
		    else
		    {
					$id = $this->request->getVar('id');
					if ($id) {
						$data['post'] = $model->getPosts($id);
					}
					$cat_model = new CategoryModel_a();
					$data['cats'] = $cat_model->getCategories();

					echo view('admin/templates/header',['editor'=>true]);
			    echo view('admin/templates/nav');
			    echo view('admin/add_form',$data);
			    echo view('admin/templates/footer');

				}
			}

			public function edit_post()
			{
				$model = new PostModel_a();
				helper(['form']);

				    if ($this->request->getMethod() === 'post' && $this->validate([
				            'title' => 'required|min_length[3]|max_length[255]',
				            'body'  => 'required',
										'excerpt'  => 'required',
										'cat_id'  => 'required',
				        ]))
				    {
							$published = ($this->request->getPost('published'))?$this->request->getPost('published'):'0';
							$newData = [
								'id' => $this->request->getPost('id'),
									'title' => $this->request->getPost('title'),
									'excerpt'=> $this->request->getPost('excerpt'),
									'slug'  => url_title($this->request->getPost('title'), '-', TRUE),
									'body'  => $this->request->getPost('body'),
									'photo_string'  => $this->request->getPost('picture'),
									'cat_id'  => $this->request->getPost('cat_id'),
									'user_id'  => session()->get('id'),
									'cat_id'  => $this->request->getPost('cat_id'),
									'published'  => $published
							];
				        $model->save($newData);
								$session = session();
								$session->setFlashdata('success','successful updated');

								return redirect()->to('./admin');
				    }
				    else
				    {
							$id = $this->request->getVar('id');
							if ($id) {
								$data['post'] = $model->getPosts($id);
							}
							$cat_model = new CategoryModel_a();
							$data['cats'] = $cat_model->getCategories();

							echo view('admin/templates/header',['editor'=>true]);
					    echo view('admin/templates/nav');
					    echo view('admin/edit_form',$data);
					    echo view('admin/templates/footer');

						}
					}

	public function delete_post()
	{
		$model = new PostModel_a();

		$id = $this->request->getVar('id');
		$model->deletePost($id );
		$session = session();
		$session->setFlashdata('success','Succesfully deleted');
		return redirect()->to('./admin');
	}
	//--------------------------------------------------------------------

}
