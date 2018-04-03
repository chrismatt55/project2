<?php

class Cogs extends DatabaseObject {

static protected $table_name = 'cogs';
static protected $db_columns = ['cogsid', 'date', 'amt'];

public $cogsid;
public $date;
public $amt


// construct method
public function __construct($args=[]) {
  $this->invoiceid = $args['invoiceid'] ?? NULL;
  $this->recieveDate = $args['recieveDate'] ?? '';
  $this->manufacturer = $args['manufacturer'] ?? '';
  $this->referenceNumber = $args['referenceNumber'] ?? '';
  $this->amount = $args['Amount'] ?? '';
 
  
}






?>
