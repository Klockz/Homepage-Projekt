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
  $active = 'sendinfo';
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
  <div class="container sendinfo">
    <div class="row">
      <div class="col-sm-12">
        <h2 class="gold-bottom-border"></h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      </div>
    </div>
    <form>
      <div class="col-sm-12">
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
          <div class="col-sm-10">
            <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
            <small class="text-muted"></small>
          </div>
        </div>
        <div class="form-group row">
          <label for="inputNick3" class="col-sm-2 control-label">Navn</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="inputNick3" placeholder="Fornavn Efternavn">
            <small class="text-muted"></small>
          </div>
        </div>
        <div class="form-group row">
          <label for="inputPhone3" class="col-sm-2 control-label">TelefonNummer</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="inputSubject3" placeholder="Nummer til at kontakte dig">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputSubject3" class="col-sm-2 control-label">Emne</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="inputSubject3" placeholder="Facaderens, Tagrens, Algebehandling">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputMessage3" class="col-sm-2 control-label">Besked</label>
          <div class="col-sm-10">
            <textarea class="form-control" id="inputMessage3" rows="4" placeholder="En lille besked om dit projekt"></textarea>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" role="button" class="btn">Send</button>
          </div>
        </div>
      </div>
    </form>
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