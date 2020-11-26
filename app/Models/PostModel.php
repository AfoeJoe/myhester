<?php namespace App\Models;
use CodeIgniter\Model;


class PostModel extends Model
{

  protected $table = 'post';
  protected $allowedFields = ['first_name','last_name','email','password','slug'];
  protected $beforeInsert = ['beforeInsert'];
  protected $beforeUpdate = ['beforeUpdate'];

  public function getPosts($slug='')
  {
    if (!$slug) {
      return $this->select('post.*,c.name')->asArray()
              ->join('category c','cat_id = c.id','inner')->findAll();
    }
    return $this->select('post.*,c.name')->asArray()->where(['post.slug' => $slug])
            ->join('category c','cat_id = c.id')
            ->first();
  }
  public function getFeatured()
  {
    return $this->asArray()->from('featured f')->where(['f.id' => '1'])->join('post p','p.id = f.post_id ')->first();
  }

  public function getPrevNext($id='')
  {
    $ret = $this->asArray()->where(['id' => $id+1])->first();
    if (empty($ret)) {
      return $this->getPrevNext($id-2);
    }
    return $ret;

  }

}
