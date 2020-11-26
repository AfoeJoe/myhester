<?php namespace App\Controllers;
use App\Models\TaxonomyModel;
use App\Models\CategoryModel_a;


/**
 *
 */

class Taxonomy extends BaseController
{

	public function index()
	{
		$model = new TaxonomyModel();
		$modelCat = new CategoryModel_a();

		$data['cats'] = $modelCat->getCategories();
		$uri = $this->request->uri;
		$cat = $uri->getSegment(2);
		$page = $uri->getSegment(1);
		$data['page'] = $page;
		$data['cat'] = $cat;
		$data['posts'] = $model->getTax($page,$cat);




		echo view('templates/header',$data);
		echo view('list_posts',$data);
		echo view('templates/aside');

		echo view('/templates/footer');
	}
	//--------------------------------------------------------------------

}
