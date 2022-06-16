<?php require('partials/head.php');?>

<main>
    <h2>Login</h2>
    <form action="/login/login" method="post">
        <input name="email" type="email" placeholder="Email"><br>
        <input name="password" type="password" placeholder="Password"><br>
        <input name="remember" type="checkbox">Recuérdame<br>
        <button type="submit">Login</button>
    </form>
</main>

<?php require('partials/footer.php');?>