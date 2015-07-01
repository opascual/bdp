<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
        <li <?php if($sidebar == 'home') echo 'class="active"'?> >
            <a href="index.php"><i class="fa fa-fw fa-home"></i> Inici</a>
        </li>
        <li <?php if($sidebar == 'seasons') echo 'class="active"'?> >
            <a href="seasons.php"><i class="fa fa-fw fa-signal"></i> Temporades</a>
        </li>
        <li <?php if($sidebar == 'sports') echo 'class="active"'?> >
            <a href="sports.php"><i class="fa fa-fw fa-futbol-o"></i> Esports</a>
        </li>
        <li <?php if($sidebar == 'clubs') echo 'class="active"'?> >
            <a href="clubs.php"><i class="fa fa-fw fa-shield"></i> Clubs</a>
        </li>
        <li <?php if($sidebar == 'players') echo 'class="active"'?> >
            <a href="players.php"><i class="fa fa-fw fa-user"></i> Jugadors</a>
        </li>
        <li <?php if($sidebar == 'checkups') echo 'class="active"'?> >
            <a href="checkups.php"><i class="fa fa-fw fa-folder-open"></i> Revisions</a>
        </li>
    </ul>
</div>