<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>RensFyn APS</title>
  <meta name="description" content="Blablabla Info omkring hvad virksomheden laver">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="icon" type="image/ico" href="/favicon.gif">
  <!-- Place Favicon in Root directory -->

  <link rel="stylesheet" type="text/css" href="">
  <link rel="stylesheet" href="/default.css">

</head>
<body>


<?php 
  $active = 'equipment levels';
?>

<?
  $active_tree = split(' ', $active);
  $active_root = $active_tree[0];

  if(isset($active_tree[1])) {
    $active_leaf = $active_tree[1];  
  }
?>

<nav class="navbar topnav navbar-fixed-top">
  <div class="container">
    <button class="navbar-toggler nav-expand" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
    Menu
    </button>
    <a class="navbar-brand logo" href="/"></a>
    <div class="navitems">
      <ul class="nav navbar-nav">
        <li class="dropdown nav-item">
            <a data-toggle="dropdown" class="dropdown-toggle nav-link <? echo $active_root == 'missions' ? 'active' : ''; ?> clickable" href="/index.php">Forside<b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li class="divider">RensFyn</li>
              <li><a class="dropdown-item <? echo $active_leaf == 'smugglers' ? 'active' : ''; ?>" href="/aboutus.php">Hvem er vi?</a></li>
              <li><a class="dropdown-item <? echo $active_leaf == 'powder' ? 'active' : ''; ?>" href="/filosofi.php">Filosofi</a></li>
            </ul>
        </li>
        <li class="dropdown nav-item">
          <a class="dropdown-toggle nav-link <? echo $active_root == 'equipment' ? 'active' : ''; ?>" href="#">Ydelser</a>
          <ul class="dropdown-menu">
            <li class="divider">Services</li>
            <li><a href="/Fliserens.php" class="dropdown-item <? echo $active_leaf == 'levels' ? 'active' : ''; ?>">Fliserens</a></li>
            <li><a href="/Tagrens.php" class="dropdown-item <? echo $active_leaf == 'wepstrait' ? 'active' : ''; ?>">Tagrens</a></li>
            <li><a href="/Facaderens.php" class="dropdown-item <? echo $active_leaf == 'trinkets' ? 'active' : ''; ?>">Facaderens</a></li>
            <li><a href="/Algebehandling.php" class="dropdown-item <? echo $active_leaf == 'hats' ? 'active' : ''; ?>">Algebehandling</a></li>         
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav pull-right">
        <li class="nav-item">
          <a href="/sendinfo.php">
            <button class="btn <? echo $active_root == 'sendinfo' ? 'active' : ''; ?>" type="submit">Kontakt Os</button>  
          </a>
        </li>
      </ul>  
    </div>
  </div>
</nav>
<div class="fullwidth-wrap">
  <div class="fullwidth-wrap__background">
    <img src="/img/banner2.jpg">
  </div>
  <div class="row">
    <div class="container">
      <div class="col-sm-12">
        <h2 class="gold-bottom-border">Fliserens</h2>
        <p></p>
        <hr>
        <hr>
        <h4></h4>
        <p></p>
        <table class="table table-sm">
          <thead>
            <tr>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tr>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td></td>
            <td></td>
          </tr>
        </table>
        <hr>
        <hr>
        <h4></h4>
        <p></p>
      </div>
    </div>  
  </div>
</div>
<footer class="bd-footer text-muted">
  <div class="container">
    <div>
      <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </div>
  </div>
</footer>
    <script>window.jQuery || document.write('<script src="/js/libs/jquery-1.11.3.js"><\/script>')</script>
    <script src="/js/main.min.js"></script>
  </body>
</html>