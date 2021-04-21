<?php 
 class Diachi extends DB {

    public function select_tinh($table){
        $sql ="SELECT * from $table";
        return $this->_query($sql);
    }

    public function select_district($id){
        $sql ="SELECT * from district where _province_id = $id";
        return $this->_query($sql);
    }

    public function select_ward($distr){
        $sql ="SELECT * from ward where  _district_id=$distr ";
        return $this->_query($sql);
    }
    public function select_street($distr){
        $sql ="SELECT * from street where  _district_id=$distr ";
        return $this->_query($sql);
    }
 }

?>