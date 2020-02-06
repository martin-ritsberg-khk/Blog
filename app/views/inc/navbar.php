<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMain" aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarMain">
        <a class="navbar-brand" href="<?php echo URLROOT; ?>"><?php echo PROJECT_NAME; ?></a>
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo URLROOT; ?>">Home</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <?php
            if (isset($_SESSION['user_id'])){
                echo '
            <li class="nav-item">
                <a class="nav-link" href="'.URLROOT.'/users/logout">Logout</a>
            </li>';
            } else {
                echo '
            <li class="nav-item">
                <a class="nav-link" href="'.URLROOT.'/users/register">Register</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="'.URLROOT.'/users/login">Login</a>
            </li>';
            }
            ?>
        </ul>
    </div>
</nav>