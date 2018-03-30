<?php

class Blog extends DatabaseObject {

static protected $table_name = 'blog';
static protected $db_columns = ['blogid', 'blogName', 'url', 'email', 'contactFName', 'contactLName', 'qualityScore', 'mozDA', 'sponsors', 'fqshop', 'gfairy', 'mstar'];

public $blogid;
public $blogName;
public $url;
public $email;
public $contactFName;
public $contactLName;
public $qualityScore;
public $mozDA;
public $sponsors;
public $fqshop;
public $gfairy;
public $mstar;

// construct method
public function __construct($args=[]) {
  $this->blogid = $args['blogid'] ?? NULL;
  $this->blogName = $args['blogName'] ?? '';
  $this->url = $args['url'] ?? '';
  $this->email = $args['email'] ?? '';
  $this->contactFName = $args['contactFName'] ?? '';
  $this->contactLName = $args['contactLName'] ?? '';
  $this->qualityScore = $args['qualityScore'] ?? '';
  $this->mozDA = $args['mozDA'] ?? '';
  $this->sponsors = $args['sponsors'] ?? '';
  $this->fqshop = $args['fqshop'] ?? '';
  $this->gfairy = $args['gfairy'] ?? '';
  $this->mstar = $args['mstar'] ?? '';
  
}

// remember to return out a value since this is a function.
static public function qualScore($mozDA, $sponsors, $fqshop, $gfairy, $mstar) {
	if($fqshop == 1){$fq = 10;}else{$fq = 0;}
	if($gfairy == 1){$gf = 10;}else{$gf = 0;}
	if($mstar == 1){$ms = 10;}else{$ms = 0;}
	$qualScore = $fq + $gf + $ms + $mozDA + $sponsors;
	return $qualScore;
}



}
?>
