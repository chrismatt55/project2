<?php

class Invoice extends DatabaseObject {

static protected $table_name = 'invoice';
static protected $db_columns = ['invoiceid', 'recieveDate', 'manufacturer', 'referenceNum', 'amount'];

public $invoiceid;
public $recieveDate;
public $manufacturer;
public $referenceNum;
public $amount;


// construct method
public function __construct($args=[]) {
  $this->invoiceid = $args['invoiceid'] ?? NULL;
  $this->recieveDate = $args['recieveDate'] ?? '';
  $this->manufacturer = $args['manufacturer'] ?? '';
  $this->referenceNumber = $args['referenceNum'] ?? '';
  $this->amount = $args['amount'] ?? '';
 
  
}






?>
