<?php require('partials/head.php');?>

<main>
    <h2>Register</h2>
    <form action="/register/register" method="post">
        <input name="email" type="email" placeholder="Email"><br>
        <input name="username" type="text" placeholder="Username"><br>
        <input name="password" type="password" placeholder="Password"><br>
        <select name="role">
            <option value="student">Alumno</option>
            <option value="teacher">Profesor</option>
        </select>
        <button type="submit">Register</button>
    </form>
</main>

<?php require('partials/footer.php');?>