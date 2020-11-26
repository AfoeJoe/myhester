<?php namespace App\Controllers;
use App\Models\PostModel;
use App\Models\CategoryModel_a;

class Home extends BaseController
{
	public function index()
	{
		$model = new PostModel();
		$modelCat = new CategoryModel_a();

		$data['cats'] = $modelCat->getCategories();
		$data['posts'] = $model->getPosts();
		$data['featured'] = $model->getFeatured();

		echo view('templates/header',$data);
		echo view('home',$data);
		echo view('templates/aside');

		echo view('/templates/footer');
	}

	//--------------------------------------------------------------------

}
