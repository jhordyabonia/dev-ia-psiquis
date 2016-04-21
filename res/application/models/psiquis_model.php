<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Psiquis_model extends CI_Model {

    public function construct() 
    {
        parent::__construct();
        
    }
  public function get($where = NULL,$select='*',$table='usuarios',$id='id') 
  {
        $this->db->select($select);
        $this->db->from($table);
        if ($where !== NULL) {
            if (is_array($where)) {
                foreach ($where as $field=>$value) {
                    $this->db->where($field, $value);
                }
            } else {
                $this->db->where($id, $where);
            }
        }
        $result = $this->db->get()->result();
        if ($result) {
            if ($where !== NULL) {
                return array_shift($result);
            } else {
                return $result;
            }
        } else {
            return false;
        }
  }
  public function get_all($where = NULL,$select='*',$table='usuarios',$id='id') 
  {
        $this->db->select($select);
        $this->db->from($table);
        if ($where !== NULL) {
            if (is_array($where)) {
                foreach ($where as $field=>$value) {
                    $this->db->where($field, $value);
                }
            } else {
                $this->db->where($id, $where);
            }
        }
        unset($result);
        $result = $this->db->get()->result();
        if ($result)
        {   return $result; }
        else 
        {   return false;   }
  }
  private function rand($rand,$i,$f,$r,$s,$h=-1)
   {        
      $out=$r[$i>=$f?$f-1:$i];
      
      if($rand=='TRUE')
          {$x=rand($i,$f);$out=$r[$x>=$f?$f-1:$x];}
          
      if(!($s==''||$s=='*'))
           $out=$out->$s;
                
       $out=$out=='FALSE'?FALSE:$out;
       $out=$out=='system'?FALSE:$out;
       $out=$out=='estandar'?FALSE:$out;
   
       return $out;
    }
    public function get_ran($cantidad,$fuente,$select='valor',$index=0)
    {
        $fuente=$this->get(array('nombre'=>$fuente),'id','item')->id;
            
        $r=$this->get_all(array('item'=>$fuente),$select,'data_item');
        $RAN=$this->get(array('item'=>$fuente,'clave'=>'ran'),'valor','data_item')->valor;
        $size=count($r);
       
        unset($out);     
        $out=array();
        for($i=0;$i<$cantidad*3||$i<$size;$i++)   
            $out[$i]=$this->rand($RAN,$i,$size,$r,$select);
            
        $tmp=array();$a=$cantidad;
        foreach ($out as $key => $value)
         if(!$value||0>=$a--) continue;
         else  $tmp[]=$out[$RAN=='TRUE'?$key:$index+$key];
                
        return $tmp;        
    }
    public function insert(Array $data,$table='usuarios') 
     {
        if ($this->db->insert($table, $data)) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    public function update(Array $data, $where = array(),$table='usuarios',$id='id') 
    {
            if (!is_array($where)) {
                $where = array($id => $where);
            }
        $this->db->update($table, $data, $where);
        return $this->db->affected_rows();
    }

    public function delete($where = array(),$table='usuarios',$id='id') 
     {
        if (!is_array($where)) {
            $where = array($id => $where);
        }
        $this->db->delete($table, $where);
        return $this->db->affected_rows();
    }
}
        