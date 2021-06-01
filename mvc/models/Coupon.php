<?php 
class Coupon extends DB {

    public function select($text,$soluong,$start,$limit){
        $sql = "select * from code_giamgia where 1";

        if($text !=""){
            $sql .=" and ma_code like '%$text%'";
        }
        if($soluong !=""){
            if($soluong ==2){
                $sql .= " and so_luong >'0'";
            }elseif($soluong == 1){
                $sql .= " and so_luong <='0'";
            }
        }
        if($limit >0){
            $sql .=" limit $start,$limit";
        }
        return $this->_query($sql);
    }
   
    public function insert($ma,$sl,$phantram){
        $updated = date("Y-m-d H:i:s", time());
        $sql ="INSERT into code_giamgia (id,ma_code,phan_tram,so_luong,created,updated) values('','$ma','$phantram','$sl',current_timestamp(),'$updated')";
        if(mysqli_query($this->conn,$sql)){
            $kq = 'true';
        }else{
            $kq ='false';
        }
        return $kq;
    }
    public function delete($ma){
       
        $sql ="DELETE from code_giamgia where id ='$ma'";
        if(mysqli_query($this->conn,$sql)){
            $kq = 'true';
        }else{
            $kq ='false';
        }
        return $kq;
    }

    public function check($ma){
        $sql ="select * from code_giamgia where ma_code = '$ma'";
        $mang =[];
        $phantram =0;
        $soluong = 0;
        if(mysqli_num_rows(mysqli_query($this->conn,$sql)) >0){
            $dk1 ='true';
            $kq = $this->fristquery($sql);
            $phantram = $kq['phan_tram'];
            $soluong =$kq['so_luong'];
            if($kq['so_luong'] > 0){
                $dk2 ='true';
            }else{
                $dk2='false';
            }
        }else{
            $dk1='false';
            $dk2 ='false';
        }
        
        
        return $mang=[$dk1,$dk2,$phantram,$soluong];
    }

    public function update_sl($ma,$sl){
        $sql ="UPDATE code_giamgia set so_luong=$sl where ma_code = '$ma'";
        if(mysqli_query($this->conn,$sql)){
            $kq = 'true';
        }else{
            $kq ='false';
        }
        return $kq;
    }
}

?>