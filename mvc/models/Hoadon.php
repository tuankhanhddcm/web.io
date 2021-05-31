<?php

class Hoadon extends DB {
    
    public $table ="hoadon";

    public function select_all($limit=18){
        $sql = "SELECT * from $this->table limit $limit ";
        return $this->_query($sql);
    }

    public function num_rows(){
        return $this->num_row('hoadon');
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
        WHERE  hoadon.ma_hd ='$mahd' ";
        return $this->_query($sql);
    }
    
    public function select_hd_user($user,$start=0, $limit=0,$ma_hd=''){
        $sql ="SELECT * FROM hoadon WHERE khachhang ='$user' ";
        if($ma_hd !=''){
            $sql .=" and ma_hd ='$ma_hd'";
            $kq = $this->fristquery($sql);
        }else{
            $kq = $this->_query($sql);
        }
        if($limit >0){
            $sql .="  limit $start,$limit";
            $kq = $this->_query($sql);
        }
            
        return $kq;
    }

    public function select_oders_detail($user,$mahd){
        $sql = "SELECT * FROM hoadon JOIN chitiethoadon on hoadon.ma_hd =chitiethoadon.ma_hd join sanpham on sanpham.sp_ma=chitiethoadon.sp_ma
        where hoadon.khachhang='$user' and hoadon.ma_hd='$mahd'";
        return $this->_query($sql);
    }

    public function hd_theo_ngay($date,$newdate,$start=0,$limit =0,$detail =''){
        if($limit >0){
            $sql ="SELECT * FROM hoadon join user on hoadon.khachhang = user.username  WHERE date >= '$date' and date <'$newdate' ORDER by date limit $start,$limit";
        }elseif($detail !=''){
            $sql  ="SELECT * FROM hoadon join user on hoadon.khachhang = user.username join chitiethoadon on chitiethoadon.ma_hd=hoadon.ma_hd WHERE date >= '$date' and date <'$newdate' ORDER by date";
        }else{
            $sql  ="SELECT * FROM hoadon join user on hoadon.khachhang = user.username WHERE date >= '$date' and date <'$newdate' ORDER by date";
        }
        $kq = $this->_query($sql);
        return $kq;
    }
    
    public function filter_hd($txt_search='',$date='',$trangthai='',$start=0,$limit=0){
        $sql ="SELECT * FROM hoadon join user on hoadon.khachhang=user.username where 1";
        if($txt_search !=''){
            $sql .=" and (ma_hd like '%$txt_search%' or khachhang like '%$txt_search%')";
        }
        if($date !=''){
            $newdate = date('Y-m-d', strtotime('+1 day', strtotime($date)));
            $sql .=" and date >='$date' and date < '$newdate' ";
        }
        if($trangthai !=''){
            if($trangthai == 10){
                $trangthai =0;
            }
            $sql .=" and trangthai = '$trangthai'";
        }
        $sql .=" ORDER by date";
        if($limit >0){
            $sql .= " limit $start,$limit";
        }
        $kq = null;
        if(mysqli_num_rows(mysqli_query($this->conn,$sql)) > 0){
            $kq = $this->_query($sql);
        }
        
        return $kq;
    }

    public function set_status_hd($status, $ma_hd){
        $date = date("Y-m-d H:i:s", time());
        $sql ="UPDATE hoadon set trangthai='$status',updated='$date' where ma_hd = '$ma_hd'";
        if(mysqli_query($this->conn,$sql)){
            $kq = 'true';
        }else {
            $kq = " false";
        }
        return $kq;
    }

    public function delete_hd($ma_hd){
        $sql ="DELETE from hoadon where ma_hd = '$ma_hd' and deleted='1'";
        if(mysqli_query($this->conn,$sql)){
            $kq = 'true';
        }else {
            $kq = " false";
        }
        return $kq;
    }

    public function set_delete_hd($ma_hd){
        $date = date("Y-m-d H:i:s", time());
        $sql ="UPDATE hoadon set deleted='1',updated='$date' where ma_hd ='$ma_hd'";
        if(mysqli_query($this->conn,$sql)){
            $kq = 'true';
        }else {
            $kq = " false";
        }
        return $kq;
    }

    public function doanh_so($from,$to,$start=0,$limit=0){
        $sql ="SELECT hoadon.*,sum(sanpham.sp_gia)as gia,sum(soluong) as soluong FROM `hoadon` JOIN chitiethoadon on hoadon.ma_hd = chitiethoadon.ma_hd 
                    JOIN sanpham on sanpham.sp_ma=chitiethoadon.sp_ma where deleted !=1 and trangthai =2";

        if($from !='' && $to !=''){
            $to = date('Y-m-d', strtotime('+1 day', strtotime($to)));
            $sql .=" and date >='$from' AND date <'$to'";
        }
        $sql .= " GROUP by hoadon.ma_hd ORDER by date";
        if($limit > 0){
            $sql .=" Limit $start,$limit";
        }
        // echo  $sql;
        return $this->_query($sql);
    }   
}

?>