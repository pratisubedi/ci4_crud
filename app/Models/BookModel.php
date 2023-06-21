<?php
namespace App\Models;
use CodeIgniter\Model;

class BookModel extends Model{
    protected $table='books';
    protected $allowedFields=['title','author','isbn_no','image'];

    public function getRecords(){
        return $this->orderBy('id','ASC')->findAll();
    }
    public function getRow($id){
        // SELECT*FROM books WHERE id=$id
        return $this->where('id',$id)->first();
    }
}
?>