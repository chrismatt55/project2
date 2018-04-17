<?php

class Cogs extends DatabaseObject {

static protected $table_name = 'cogs';
static protected $db_columns = ['cogsid', 'date', 'amt'];

public $cogsid;
public $date;
public $amt;


// construct method
public function __construct($args=[]) {
  $this->cogsid = $args['cogsid'] ?? NULL;
  $this->date = $args['date'] ?? '';
  $this->amt = $args['amt'] ?? '';
  
 
  
}

static public function find_cogs($id) {
		$sql = "SELECT * FROM cogs";
		$sql .= " Where cogsid='" . $id . "'";
		return static::find_by_sql($sql);
	}

}



?>
