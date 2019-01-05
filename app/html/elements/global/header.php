<?
	$active_tree = split('', $active);
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
            <a data-toggle="dropdown" class="dropdown-toggle nav-link <? echo $active_root == 'missions' ? 'active' : ''; ?> clickable" href="/missions.php">Forside<b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li class="divider">Omkring Os</li>
              <li><a class="dropdown-item <? echo $active_leaf == 'smugglers' ? 'active' : ''; ?>" href="/missions/smugglers.php">Filosofi</a></li>
              <li><a class="dropdown-item <? echo $active_leaf == 'powder' ? 'active' : ''; ?>" href="/missions/powder.php">Hvem er vi?</a></li>
              <li><a class="dropdown-item <? echo $active_leaf == 'ramparts' ? 'active' : ''; ?>" href="/missions/ramparts.php">Kontakt os</a></li>
              <li class="divider">Ydelser</li>
              <li><a class="dropdown-item <? echo $active_leaf == 'magnus' ? 'active' : ''; ?>" href="/missions/magnus.php">Tag vask</a></li>
              <li><a class="dropdown-item <? echo $active_leaf == 'supply' ? 'active' : ''; ?>" href="/missions/supply.php">Flise vask</a></li>
              <li><a class="dropdown-item <? echo $active_leaf == 'wizard' ? 'active' : ''; ?>" href="/missions/wizard.php">Rengøring</a></li>
              <li><a class="dropdown-item <? echo $active_leaf == 'engines' ? 'active' : ''; ?>" href="/missions/engines.php">Vinduespolering</a></li>
            </ul>
        </li>
        <li class="dropdown nav-item">
          <a class="dropdown-toggle nav-link <? echo $active_root == 'equipment' ? 'active' : ''; ?>" href="#">Rewards</a>
          <ul class="dropdown-menu">
            <li class="divider">General</li>
            <li><a href="/equipment/levels.php" class="dropdown-item <? echo $active_leaf == 'levels' ? 'active' : ''; ?>">Mission Rewards</a></li>
            <li><a href="/equipment/weaponstrait.php" class="dropdown-item <? echo $active_leaf == 'wepstrait' ? 'active' : ''; ?>">Weapon Traits</a></li>
            <li class="divider">Equipment</li>
            <li><a href="/equipment/trinkets.php" class="dropdown-item <? echo $active_leaf == 'trinkets' ? 'active' : ''; ?>">Trinkets</a></li>
            <li><a href="/equipment/hats.php" class="dropdown-item <? echo $active_leaf == 'hats' ? 'active' : ''; ?>">Head Gear</a></li>
            <li><a href="/equipment/items.php" class="dropdown-item <? echo $active_leaf == 'items' ? 'active' : ''; ?>">Weapon List</a></li>
            <li><a href="/equipment/analyseweap.php" class="dropdown-item <? echo $active_leaf == 'analyse' ? 'active' : ''; ?>">Send us a weapon</a></li>
            
          </ul>
        </li>
        <li class="nav-item">
          <div class="dropdown">
            <a class="dropdown-toggle nav-link <? echo $active_root == 'skavens' ? 'active' : ''; ?> " href="#">Skaven</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item <? echo $active_leaf == 'globadier' ? 'active' : ''; ?>" href="/skavens/globadier.php">Globadier</a></li>
              <li><a class="dropdown-item <? echo $active_leaf == 'assassin' ? 'active' : ''; ?>" href="/skavens/assassins.php">Gutter Runner</a></li>
              <li><a class="dropdown-item <? echo $active_leaf == 'packmaster' ? 'active' : ''; ?>" href="/skavens/packmaster.php">Packmaster</a></li>
              <li><a class="dropdown-item <? echo $active_leaf == 'ogre' ? 'active' : ''; ?>" href="/skavens/rat_ogre.php">Rat Ogre</a></li>
              <li><a class="dropdown-item <? echo $active_leaf == 'ratling' ? 'active' : ''; ?>" href="/skavens/ratling_gunner.php">Ratling Gunner</a></li>
              <li><a class="dropdown-item <? echo $active_leaf == 'sack' ? 'active' : ''; ?>" href="/skavens/sack_rat.php">Sack Rat</a></li>
              <li><a class="dropdown-item <? echo $active_leaf == 'storm' ? 'active' : ''; ?>" href="/skavens/stormvermin.php">Stormvermin</a></li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <div class="dropdown">
            <a class="dropdown-toggle nav-link <? echo $active_root == 'data' ? 'active' : ''; ?>" href="#">Game Data</a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item <? echo $active_leaf == 'datamining' ? 'active' : ''; ?>" href="/datamining.php">Data Mining</a></li>
                <!--<li><a href="/equipment/probability.php" class="dropdown-item <? echo $active_leaf == 'probability' ? 'active' : ''; ?> disabled">Loot Probability</a></li>-->
                <li><a class="dropdown-item <? echo $active_leaf == 'patches' ? 'active' : ''; ?>" href="/patchnotes.php">Patch notes</a></li>
              </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav pull-right">
        <li class="nav-item">
          <a href="/sendinfo.php">
            <button class="btn <? echo $active_root == 'sendinfo' ? 'active' : ''; ?>" type="submit">Send us info</button>  
          </a>
        </li>
      </ul>  
    </div>
  </div>
</nav>
