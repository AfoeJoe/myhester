<?php namespace App\Controllers;


class File extends BaseController
{
	public function index()
		{
	//get all files

		echo view('admin/templates/header');
		echo view('admin/templates/nav');
		echo view('admin/all_files',$data);
		echo view('admin/templates/footer');

	}

	public function add_upload()
	{
		helper(['form']);

		    if ($this->request->getMethod() === 'post')
		    {
					$config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 100;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('userfile'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('./admin/upload_form', $error);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());
												echo "hvhv";

                        //$this->load->view('upload_success', $data);
                }
		        //$model->save($newData);
						$session = session();
						$session->setFlashdata('success','successful uploaded');

						return redirect()->to('./admin');
		    }
		    else
		    {


			    echo view('admin/upload_form',array('error' => ' ' ));

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
