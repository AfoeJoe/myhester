<?php namespace App\Controllers;
use App\Models\PostModel;
use App\Models\CategoryModel_a;

class Posts extends BaseController
{
	public function singlePost()
	{
		$model = new PostModel();
		$modelCat = new CategoryModel_a();

		$data['cats'] = $modelCat->getCategories();
		$uri = $this->request->uri;
		$slug = $uri->getSegment(1);
		$data['post'] = $model->getPosts($slug);
		if (empty($data['post']))
		    {
		        throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the post : '. $slug);
		    }
    $data['nextpost'] = $model->getPrevNext($data['post']['id']);


		echo view('templates/header',$data);
		echo view('single_post',$data);
		echo view('templates/aside');

		echo view('/templates/footer');
	}
	//--------------------------------------------------------------------

}
