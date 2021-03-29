<?php 
class Nhasanxuat extends DB {

    public $table = 'nhasanxuat';
    // lấy sản phẩm với tham số cột , sắp xếp, limit
    public function select_all_nsx($column =["*"],$orderbys = [],$limit=18){

        $data = $this->selectall($this->table,$column,$orderbys,$limit);
        return $data;
    }

    public function get_nsx_byId($col,$column ,$id){

        $data = $this->get_col($this->table,$col,$column,$id);
        return $data;
    }
}

?>