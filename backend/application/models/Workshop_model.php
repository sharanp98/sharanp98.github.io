<?php
class Workshop_model extends CI_Model{
public function add_workshop($workshop){
$this->db->insert('Workshops',$workshop);
}

public function retrieve_results($category){
    $sql = $this->db->query(
        "SELECT * FROM Workshops WHERE category='".$category."';"
    )->result();

    return $sql;

}

public function display_data(){
    $sql = $this->db->query(
        "SELECT Sno,Title FROM Workshops"
    )->result();
    return $sql;
}
function deleterecords($id)
	{
	    $this->db->query("DELETE  FROM Workshops where Sno='".$id."'");
	}
}

?>