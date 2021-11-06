<!-- This page includes the config.php page and does the database connection with inserting, deleting, getting and updating the users information. -->
<?php 
include("config.php");
class Connection{
    protected $db;
    protected $table;
    public function __construct(){
        $this->db = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
        if($this->db->connect_error)
        {
            die('Error in establishing database connection');
        }
    }

    public function get($where = array(),$wherekey=null,$limit = null){
        $sel = "SELECT * FROM ".$this->table." ";
        if(is_array($where)){
            $i = 0;
            foreach($where as $key => $value){
                $i++;
                if($i == 1){
                    $sel .= " WHERE ".$key." = '".$value."' ";
                }
                else{
                    $sel .= " AND ".$key." = '".$value."'";
                }
                
            }
        }
        if($wherekey != null){
            if(count($where)>0){
                $sel .= " AND ".$wherekey;
            }
            else{
                $sel .= " WHERE ".$wherekey;
            }
        }
        if($limit != null){
            $sel .= " ".$limit;
        }
        $qry = $this->db->query($sel);
        $rows = array();
        while($row = $qry->fetch_assoc()){
            $rows[] = $row;
        }
        return $rows;

    }
    
    public function insert(array $data):int{
        $ins = "INSERT INTO ".$this->table." (";
        if(count($data)){
            $ins .= implode(",",array_keys($data)).") VALUES (";
            $i = 0;
            foreach($data as $key => $value){
                $i++;
                if($i == 1){
                    $ins .= "'$value'";
                }
                else{
                    $ins .= ",'$value'";
                }
                
            }
            $ins .= " )";
        }
        $qry = $this->db->query($ins);
        if($qry){
            return $this->db->insert_id;
        }
        else{
            return 0;
        }
    }

    public function delete(array $where){
        $del = "DELETE FROM ".$this->table." ";
        if(is_array($where)){
            $i = 0;
            foreach($where as $key => $value){
                $i++;
                if($i == 1){
                    $del .= " WHERE ".$key." = '".$value."' ";
                }
                else{
                    $del .= " AND ".$key." = '".$value."'";
                }
                
            }
        }
        $this->db->query($del);
        return true;
    }

    public function update(array $data, $where = array()){
        $upd = "UPDATE ".$this->table." SET ";
        $cols = array();
        foreach($data as $key=>$val) {
            $cols[] = "$key = '$val'";
        }
        $upd .= implode(', ', $cols);
        if(is_array($where)){
            $i = 0;
            foreach($where as $key => $value){
                $i++;
                if($i == 1){
                    $upd .= " WHERE ".$key." = '".$value."' ";
                }
                else{
                    $upd .= " AND ".$key." = '".$value."'";
                }
                
            }
        }
        $this->db->query($upd);
        return true;

    }
}