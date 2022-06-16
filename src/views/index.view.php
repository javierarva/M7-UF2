<?php require('partials/head.php');?>

    <h1>Bienvenido, haz login o regístrate para acceder al sitio.</h1>

    <?php foreach($roles as $role):?>
        <p><?php echo $role -> role ;?></p>
    <?php endforeach;?>

<?php require('partials/footer.php');?>
