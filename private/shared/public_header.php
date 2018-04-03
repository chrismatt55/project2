<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Invoices and Cogs Manager | <?php echo $page_title; //gets the $page_title from the page and puts it here ?></title>
    <link rel="stylesheet" href="http://sofab1.com/lm_2018/public/stylesheets/styles.css?modified=20012009">
    <style>
    .owe {color: red; }
    .refund { color: green; }
    </style>
  </head>

  <body>
    <header>
      <div class="container">
        <div id="branding">
          <h1><span class="highlight">Invoices</span> Cogs</h1>
        </div>
        <nav>
          <ul>
            <li <?php if ($current == 'home') {echo 'class="current"';} ?>><a href="<?php echo WWW_ROOT?>/home.php">Home</a></li>
            <li <?php if ($current == 'user') {echo 'class="user"';} ?>><a href="<?php echo WWW_ROOT?>/user/index.php">Users</a></li>
            <li <?php if ($current == 'invoice') {echo 'class="invoice"';} ?>><a href="<?php echo WWW_ROOT?>/invoice/index.php">Invoices</a></li>
            <li <?php if ($current == 'inventory') {echo 'class="inventory"';} ?>><a href="<?php echo WWW_ROOT?>/inventory/index.php">Inventory</a></li>
            <li <?php if ($current == 'cogs') {echo 'class="cogs"';} ?>><a href="<?php echo WWW_ROOT?>/cogs/index.php">Cogs</a></li>
            <li <?php if ($current == 'logout') {echo 'class="logout"';} ?>><a href="<?php echo WWW_ROOT?>/logout.php">Logout</a></li>
          </ul>
        </nav>
      </div>
    </header>
