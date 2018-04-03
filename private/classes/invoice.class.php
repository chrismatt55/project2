<?php

class Invoice extends DatabaseObject {

static protected $table_name = 'invoice';
static protected $db_columns = ['invoiceid', 'recieveDate', 'manufacturer', 'referenceNumber', 'amount'];

public $invoiceid;
public $recieveDate;
public $manufacturer;
public $referenceNumber;
public $amount;


// construct method
public function __construct($args=[]) {
  $this->invoiceid = $args['invoiceid'] ?? NULL;
  $this->recieveDate = $args['recieveDate'] ?? '';
  $this->manufacturer = $args['manufacturer'] ?? '';
  $this->referenceNumber = $args['referenceNumber'] ?? '';
  $this->amount = $args['amount'] ?? '';
 
  
}






?>
