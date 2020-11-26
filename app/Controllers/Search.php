<?php namespace App\Controllers;
use App\Models\SearchModel;
use App\Models\CategoryModel_a;

/**
 *
 */

class Search extends BaseController
{

	public function index()
	{
		$model = new SearchModel();
		$modelCat = new CategoryModel_a();

		$data['cats'] = $modelCat->getCategories();

			helper(['form']);
			if ($this->request->getMethod() == 'get') {
						$search_term = $this->request->getVar('search');
						$data['posts'] = $model->getSearch($search_term );
				}
			$data['page'] = 'search';
			$data['cat'] = $search_term;

		echo view('templates/header',$data);
		echo view('list_posts',$data);
		echo view('templates/aside');
		echo view('/templates/footer');
	}
	//--------------------------------------------------------------------

}
