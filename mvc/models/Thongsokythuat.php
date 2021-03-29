<?php 
class Thongsokythuat extends DB {

    public $table = 'thongsokythuat';
    // lấy sản phẩm với tham số cột , sắp xếp, limit

    public function get_thongso_byId($column ,$id){

        $data = $this->find($this->table,$column,$id);
        return $data;
    }
    
}

?>