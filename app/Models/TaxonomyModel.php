<?php namespace App\Models;
use CodeIgniter\Model;

class TaxonomyModel extends Model
{

  protected $table = 'post';

  public function getTax($page,$tax)
  {
    if ($page ==  'category') {
      return $this->select('post.*,c.name,c.slug as sslug')->asArray()->where(['c.slug' =>  $tax])
              ->join('category c','cat_id = c.id')->findAll();
    }
    elseif ($page ==  'date') {

      $uplimit =$tax.'-00';
      $lowlimit = $tax.'-31';
      $where = "updated_at BEWTWEEN $uplimit and $lowlimit";
      return $this->select('post.*,c.name,c.slug as sslug')->asArray()->where('updated_at >', $uplimit)->where('updated_at <', $lowlimit)
              ->join('category c','cat_id = c.id')->findAll();
      //$query = "SELECT * FROM post WHERE updated_at BETWEEN $uplimit and $lowlimit";
      //$result = $this->db->query($query);
      //return $result;
      //return $this->query("SELECT * FROM post WHERE updated_at >= '2020-10-06' AND updated_at < '2020-10-30'");
    }
    return false;
  }


}
