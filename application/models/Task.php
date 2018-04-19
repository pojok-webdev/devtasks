<?php
class Task extends CI_Model{
    function gets(){
        $sql = "select * from dtasks ";
        $sql.= "order by createdate desc ";
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        $total = $que->num_rows();
        $result = $que->result();
        return array(
            'total'=>$total,
            'result'=>$result
        );
    }
    function get($id){
        $sql = "select * from dtasks ";
        $sql.= "where id=" . $id . " ";
        $sql.= "order by createdate desc ";
        $ci = & get_instance();
        $que = $ci->db->query($sql);
        $total = $que->num_rows();
        $result = $que->result();
        if($total>0){
            return $result[0];
        }
        return false;
    }
    function save($params){
        $keys = array();$vals = array();
        foreach($params as $key=>$val){
            array_push($keys,$key);
            array_push($vals,$val);
        }
        $sql = "insert into dtasks ";
        $sql.= "(".implode(",",$keys).") ";
        $sql.= "value ";
        $sql.= "('".implode("','",$vals)."')";
        $ci = & get_instance();
        $ci->db->query($sql);
        return $ci->db->insert_id();
    }
    function update($params){
        $arr = array();
        foreach($params as $key=>$val){
            array_push($arr,''.$key.'="'.$val.'"');
        }
        $sql = "update dtasks ";
        $sql.= "set ";
        $sql.= " ".implode(",",$arr)."  ";
        $sql.= "where id = " . $params['id'] . "";
        $ci = & get_instance();
        $ci->db->query($sql);
        return $sql;
    }
}