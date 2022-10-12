<nav>
    <ul class="nav nav-justified">
        <li><a href="index.php?controller=shop&action=list">Shop</a></li>
        <?php
        if(isset($_SESSION['right']) && $_SESSION['right'] == 'admin'){
        ?>
            <li><a href="index.php?controller=admin&action=index">Gestion des articles</a></li>
            <li><a href="index.php?controller=admin&action=listUsers&field=useLogin">Gestion des utilisateurs</a></li>
        <?php
        }
        ?>
        <li><a href="index.php?controller=home&action=contact">Contact</a></li>
        <?php
        if(isset($_SESSION['right']) && $_SESSION['right'] == 'admin'){
        ?>
            <li><a href="index.php?controller=login&action=logout">Se déconnecter</a></li>
        <?php
        } else {
        ?>
            <li><a href="index.php?controller=login&action=index">Se connecter</a></li>
        <?php
        }
        ?>
    </ul>
</nav>
</div>


