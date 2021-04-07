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

    public function num_rows(){
        return $this->num_row('loaisanpham');
    }

    public function insert_loai($ma_loai,$ten_loai, $loai_img,$updated){
        $sql =" INSERT INTO loaisanpham (`id`, `ma_loai`, `ten_loai`, `loai_img`, `created`, `updated`) 
        values ('', '$ma_loai', '$ten_loai', '$loai_img', current_timestamp(),'$updated')";
        $kq ='';
        if(mysqli_query($this->conn, $sql)){
            $kq = 'true';
        }else {
            $kq = 'false';
        }
        return $kq;
    }

    public function check_loai($ten){
        $sql = "SELECT * from loaisanpham where ten_loai ='$ten'";
        $query = mysqli_query($this->conn,$sql);
        if(mysqli_num_rows($query)>0){
            $kq = "false";
        }else{
            $kq = "true";
        }
        return $kq;
    }

    public function phan_trang($table,$trang,$item_in_page){
        $sql =" SELECT * FROM $table limit $trang,$item_in_page";
        return $this->_query($sql);
    }
}

?>