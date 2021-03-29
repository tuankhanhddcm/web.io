<?php

class Danhmucmodel extends DB{

    public $table ="loaisanpham";
    // lấy sản phẩm với tham số cột , sắp xếp, limit
    public function getloaisp($column =["*"],$orderbys = [],$limit=18){

        $data = $this->selectall($this->table,$column,$orderbys,$limit);
        return $data;

    }
    public function gettenloai($val){
        $qr ="SELECT ten_loai from loaisanpham where ma_loai = $val";
        $data = $this->fristquery($qr);
        return $data;
    }
}

?>