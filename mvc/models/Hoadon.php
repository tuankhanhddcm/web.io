<?php

class Hoadon extends DB {
    

    public function select_all(){
        $sql = "SELECT * from $this->table ";
        return $this->_query($sql);
    }

    public function num_row($table){
        $sql = "SELECT * from $table ";
        return mysqli_num_rows(mysqli_query($this->conn,$sql));
    }
    public function max_id($table,$col,$str){
        $sql = "SELECT max($col) as $col from $table where $col like '%$str%'";
        return mysqli_fetch_assoc(mysqli_query($this->conn,$sql));
    }

    public function insert_hd($mahd, $kh,$date,$total, $note, $update){
        $sql ="INSERT into hoadon (id, ma_hd, khachhang, date, total_money, trangthai, ghichu, created, updated)
                value ('','$mahd','$kh','$date', '$total', 0,'$note', current_timestamp(),'$update')";
        if(mysqli_query($this->conn,$sql)){
            $kq ='true';
        }else{
            $kq = 'false';
        }
        
        return $kq;
    }
    public function insert_detail($mahd, $masp,$sl,$gia, $update){
        $sql ="INSERT into chitiethoadon (id, ma_hd, sp_ma, soluong, gia,created, updated)
                value ('','$mahd','$masp',$sl, $gia, current_timestamp(),'$update')";
        if(mysqli_query($this->conn,$sql)){
            $kq ='true';
        }else{
            $kq = 'false';
        }
        return $kq;
    }

    public function select_hd_detail($mahd){
        $sql ="SELECT * FROM hoadon JOIN chitiethoadon on hoadon.ma_hd =chitiethoadon.ma_hd join sanpham on sanpham.sp_ma=chitiethoadon.sp_ma 
        WHERE hoadon.ma_hd ='$mahd'";
        return $this->_query($sql);
    }
    


}

?>