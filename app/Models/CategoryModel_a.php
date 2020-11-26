<?php namespace App\Models;
use CodeIgniter\Model;


class CategoryModel_a extends Model
{

  protected $table = 'category';
  protected $allowedFields = ['name','slug'];
  //protected $beforeInsert = ['beforeInsert'];
  //protected $beforeUpdate = ['beforeUpdate'];

  public function getCategories($id='')
  {
    if (!$id) {
      return $this->asArray()->findAll();
    }
    return $this->asArray()->where(['id' => $id])
            ->first();
  }


  public function deleteCategory($id)
  {
    return $this->where('id',$id)->delete();

  }

}
