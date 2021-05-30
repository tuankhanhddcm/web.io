<?php
class sanpham extends DB {
    
    public $table ="sanpham";
    // lấy sản phẩm với tham số cột , sắp xếp, limit
    public function getSP($column =["*"],$orderbys = [],$limit=2){
        if(!empty($orderbys)){
            $oderby = implode(" ",$orderbys);
            $qr ="SELECT * from sanpham where trang_thai = 0 order by $oderby limit $limit";
        }else{
            $qr ="SELECT * from sanpham where trang_thai = 0 limit $limit";
        }
       
        $kq = $this->_query($qr);
        return $kq;
        

    }

    public function num_rows($trang_thai =''){
        $sql = "SELECT * from sanpham where trang_thai = 0";
        if($trang_thai !=''){
            $sql ="SELECT * from sanpham where trang_thai = 1";
        }
        return mysqli_num_rows(mysqli_query($this->conn,$sql));
    }

    public function max_id($table,$col,$str){
        $sql = "SELECT max($col) as $col from $table where $col like '%$str%'";
        return mysqli_fetch_assoc(mysqli_query($this->conn,$sql));
    }

    public function find_sp_byID($column,$id){
        $data = $this->find($this->table,$column, $id);
        return $data;
    }

    public function get_sp_byId($col,$column ,$id){
        $data = $this->get_col($this->table,$col,$column,$id);
        return $data;
    }

    public function sptheoloai($column,$val,$limit=0){
        $qr = "SELECT * from sanpham 
                join loaisanpham on sanpham.ma_loai = loaisanpham.ma_loai join nhasanxuat on sanpham.ma_nsx=nhasanxuat.ma_nsx where sanpham.$column = '$val' and trang_thai =0";
        if($limit >0){
            $qr .= " limit $limit";
        }
        if(mysqli_num_rows(mysqli_query($this->conn,$qr)) == 1){
            $kq = $this->fristquery($qr);
        }else{
            $kq = $this->_query($qr);
        }
        return $kq;
    }
    public function sptheotskt($column,$val){
        $qr = "SELECT * from sanpham join thongsokythuat on sanpham.sp_ma=thongsokythuat.ma_sp where sanpham.$column = '$val' and trang_thai =0";
        if(mysqli_num_rows(mysqli_query($this->conn,$qr)) == 1){
            $kq = $this->fristquery($qr);
        }else{
            $kq = $this->_query($qr);
        }
        return $kq;
    }


    public function sptheogia($gia_start,$gia_end,$ma_loai,$ma_sp){
        $qr ="SELECT * from sanpham where ma_loai=$ma_loai and sp_ma != '$ma_sp'  and sp_giaban  between $gia_start and $gia_end";
        $kq = $this->_query($qr);
        return $kq;
    }

    public function filter_data($ma_loai,$gias =[],$hangs=[],$kichco =[],$loai_sp=[],$order,$sl=0,$limit=0){
        $dk = 0;
        $qr ="SELECT * FROM $this->table join thongsokythuat on sanpham.sp_ma = thongsokythuat.ma_sp  WHERE ma_loai =$ma_loai and trang_thai =0";
        if(!empty($hangs)){
            $hang = implode(',',$hangs);
            $qr .=" ". "and ma_nsx in($hang)";
        }

        if(!empty($kichco)){
            $v = implode(',',$kichco);
            $temp = array_values(explode(",",$v));
            $s ='';
            for ($i=0; $i < count($temp) ; $i++) { 
                if($temp[$i] <= "43"){
                        $s .=" ". "kich_co_tv <= $temp[$i]";
                }
                if($temp[$i] > 43 && $temp[$i] <= 73 ){ 

                    $s .=" or kich_co_tv between $temp[$i] and ".($temp[$i]+10); 
                }

                if($temp[$i] > 73){
                    $s .=" or kich_co_tv > $temp[$i]";
                }            
            }
            if(strpos($s,'or')==1){
                $s = substr($s,3);
            }
            $qr .=" and (".$s." )";
        }

        if( !empty($loai_sp)){
            $loai_sp = implode(',',$loai_sp);
            $mang = array_values(explode(",",$loai_sp));

            $t = "";
            foreach($mang as $val){
                $t.=" or loai_sp = '$val'";
            }
            
            if(strpos($t,'or')==1){
                $t = substr($t,3);
            }
            $qr .=" and (".$t." )"; 
        }

        if(!empty($hangs)){
            $dk+=1;
            $hang = implode(',',$hangs);
            $qr .=" ". "and ma_nsx in($hang)";
        }

        if(!empty($gias)){
            $gia = implode(',',$gias);
            $mang = array_values(explode(",",$gia));
            $sql ="";
            for ($i=0; $i < count($mang) ; $i++) {
                
                    if($mang[$i] == 5000000){
                        $sql .=" ". "sp_giaban < $mang[$i]";
                        
                    }
                
                    if($mang[$i] >= 1000000 && $mang[$i] < 9999999 && $mang[$i] !=5000000 && $mang[$i] !=5000001){
                        
                        $tong = (int)$mang[$i]+2999999;
                        $sql .=" or sp_giaban between $mang[$i] and $tong";
                    }elseif($mang[$i] > 5000000 && $mang[$i] < 25000000){
                        $tong = (int)$mang[$i]+5000000;
                        $sql .=" or sp_giaban between $mang[$i] and $tong";
                        
                    }
                    
                    
                    if($mang[$i] >= 25000000){
                        $sql .=" or sp_giaban > $mang[$i]";
                    }

                    if($mang[$i] ==999999){
                        $sql .=" ". "sp_giaban < $mang[$i]";
                    }
                    
                    
                    if($mang[$i] >= 9999999 &&$mang[$i] !=10000000  && $mang[$i] !=15000000  && $mang[$i] !=20000000){
                        $sql .=" or sp_giaban > $mang[$i]";
                    }
            }

            if(strpos($sql,'or')==1){
                $sql = substr($sql,3);
            }
            $qr .=" and (".$sql." )";
        }
        if($sl >0){
            $qr .=" and sp_sl > $sl";
        }

        if(!empty($order)){
            $qr .=" ". "order by sp_giaban $order";
        }

        if($limit >0){
            $qr .= " limit $limit";
        }

        $kq = null;
        if(mysqli_num_rows(mysqli_query($this->conn,$qr)) > 0){
            $kq = $this->_query($qr);
        }
        
        return $kq;

    }

    public function filter_gia($ma_loai,$order){
        $qr ="SELECT * FROM $this->table  WHERE ma_loai =$ma_loai order by sp_giaban $order ";
        $kq = $this->_query($qr);
        return $kq;
    }

    public function filter_banchay($ma_loai){
        $qr ="SELECT * FROM $this->table  WHERE ma_loai =$ma_loai and sp_sl > 6 ";
        $kq = $this->_query($qr);
        return $kq;
    }



    public function sortSP_theogia($ma_loai,$orderbys){
        $qr ="SELECT * FROM $this->table  WHERE ma_loai = $ma_loai order by sp_giaban $orderbys";
        $kq = $this->_query($qr);
        return $kq;
    }

    public function loc_sp($dk,$val,$column){
        $data = $this->loc($this->table,$dk,$val,$column);
        return $data;

    }

    public function update_sl($masp,$sl){
        $sql = "UPDATE sanpham set sp_sl='$sl' where sp_ma = '$masp'";
        if(mysqli_query($this->conn,$sql)){
            $kq ='true';
        }else{
            $kq = 'false';
        }
        return $kq;
    }
    

    public function search($text,$count=5){
        $sql = "SELECT * from sanpham where sp_name like '%$text%'and trang_thai =0 limit $count";
        
        return $this->_query($sql);
    }

    public function search_home($text,$count=0,$sort,$banchay){
        $sql = "SELECT * from sanpham where  trang_thai =0";
        if(!empty($text)){
            $sql .=" and sp_name like '%$text%' ";
        }
        if(!empty($banchay)){
            $sql .=' and sp_sl >'.$banchay;
        }

        if(!empty($sort)){
            $sql .=' order by sp_giaban '.$sort;
        }
        
        if($count !=0){
            $sql .=" limit $count";
        }
        
        
        return $this->_query($sql);
    }


    public function list_product($text='',$ma_loai='',$ma_nsx='',$start=0,$limit=0,$trang_thai =''){
        $sql ="SELECT * FROM `sanpham` JOIN loaisanpham on sanpham.ma_loai=loaisanpham.ma_loai JOIN nhasanxuat on sanpham.ma_nsx = nhasanxuat.ma_nsx where 1";
        if($text !==''){
            $sql .= " and sanpham.sp_ma like '%$text%' or sanpham.sp_name like '%$text%' ";
        }

        if($ma_loai !==""){
            $sql .= " and sanpham.ma_loai=$ma_loai";
        }
        if(!empty($ma_nsx)){
            $sql .= " and sanpham.ma_nsx=$ma_nsx";
        }
        if(!empty($trang_thai)){
            $sql .= " and sanpham.trang_thai = 1";
        }else{
            $sql .= " and sanpham.trang_thai = 0";
        }
        if( $limit !==0){
            $sql .= " limit ".$start.",".$limit;
        }
        return $this->_query($sql);
    }

    public function insert_product($masp, $tensp,$sl,$gia, $giaban,$giagiam,$sp_url, $sp_img, $sp_mota,$ma_loai,$ma_nsx,$update){
        $sql = "INSERT INTO sanpham (id, sp_ma, sp_name, sp_sl, sp_gia, sp_giaban,sp_giagiam, sp_url, sp_img, sp_mota, ma_loai, ma_nsx, created, updated)
                values('','$masp','$tensp','$sl','$gia','$giaban','$giagiam','$sp_url','$sp_img','$sp_mota','$ma_loai','$ma_nsx', current_timestamp(), '$update')";

        if(mysqli_query($this->conn,$sql)){
            $kq = 'true';
        }else {
            $kq = " false";
        }
        
        return $kq;
    }


    public function update_product($ma_sp,$sp_name,$sp_sl,$sp_gia,$sp_giaban,$gia_giam,$sp_url,$sp_img,$sp_mota,$ma_loai,$ma_nsx,$update){
        $sql ="UPDATE sanpham set sp_name='$sp_name',sp_sl=$sp_sl,sp_gia = '$sp_gia',sp_giaban= '$sp_giaban',sp_giagiam='$gia_giam',sp_url='$sp_url',sp_img='$sp_img',sp_mota='$sp_mota',ma_loai = $ma_loai,ma_nsx = $ma_nsx,updated='$update'
                where sp_ma ='$ma_sp'";
        if(mysqli_query($this->conn,$sql)){
            $kq = 'true';
        }else {
            $kq = " false";
        }
        return $kq;
    }
    public function delete($id){
        $sql = "UPDATE  sanpham set trang_thai = 1 where sp_ma = '$id'";
        if(mysqli_query($this->conn,$sql)){
            $kq = "true";
        }else{
            $kq = "false";
        }
        return $kq;
    }

    
}
?>