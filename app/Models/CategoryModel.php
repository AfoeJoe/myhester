<?php namespace App\Models;
use CodeIgniter\Model;


class CategoryModel_a extends Model
{

  protected $table = 'category';


  public function getCategories($slug='')
  {
    if (!$slug) {
      return $this->asArray()->findAll();
    }
    return $this->asArray()->where(['slug' => $slug])
            ->first();
  }


}
