<?php namespace App\Models;
use CodeIgniter\Model;


class PostModel_a extends Model
{

  protected $table = 'post';
  protected $allowedFields = ['title','excerpt','body','cat_id','slug','photo_string','user_id','published'];
  //protected $beforeInsert = ['beforeInsert'];
  //protected $beforeUpdate = ['beforeUpdate'];

  public function getPosts($id='')
  {
    if (!$id) {
      return $this->select('post.*,c.name')->asArray()
              ->join('category c','cat_id = c.id','inner')->findAll();
    }
    return $this->select('post.*,c.name')->asArray()->where(['post.id' => $id])
            ->join('category c','cat_id = c.id')
            ->first();
  }
  public function deletePost($id)
  {
    return $this->where('id',$id)->delete();
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
