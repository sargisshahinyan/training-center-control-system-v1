<?php
/**
 * Created by IntelliJ IDEA.
 * User: shahi
 * Date: 12.04.2017
 * Time: 23:47
 */

$target = isset($target) ? $target : null;
$active = [];
for($i = 0; $i < 5; ++$i) {
    $active[] = $target === $i ? "active" : "";
}

?>
<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
				<li class="<?= $active[0]; ?>"><a href="/home">Ուսանողներ</a></li>
				<li class="<?= $active[1]; ?>"><a href="/registration">Գրանցում</a></li>
				<li class="<?= $active[2]; ?>"><a href="/users">Օգտագործող</a></li>
				<li class="<?= $active[3]; ?>"><a href="/home/archive">Արխիվ</a></li>
				<li class="<?= $active[4]; ?>"><a href="/report">Հաշվետվություն</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/authorization/logout"><span class="glyphicon glyphicon-log-in"> Ելք</span> </a></li>
            </ul>
        </div>
    </div>
</nav>
