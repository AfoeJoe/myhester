<?php namespace App\Models;
use CodeIgniter\Model;

class SearchModel extends Model
{

  protected $table = 'post';

  public function getSearch($term)
  {
      return $this->select('post.*,c.name')->asArray()->like('title', $term, 'both')->orLike('excerpt', $term, 'both')
      ->orLike('body', $term, 'both')
              ->join('category c','cat_id = c.id')->findAll();
  }

}
