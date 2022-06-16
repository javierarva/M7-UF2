<?php require('partials/head.php');?>

<main style="margin-left:20px;">
    <h2>Panel de Admin</h2>
    <br>
    <h2>Usuarios</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Rol</th>
            <th>ID de Curso</th>
        </tr>
        <?php foreach($users as $user) { ?>
            <tr>
                <td><?= $user->userId; ?></td>
                <td><?= $user->username; ?></td>
                <td><?= $user->email; ?></td>
                <td><?= $user->role; ?></td>
                <td><?= $user->courseId; ?></td>
            </tr>
        <?php } ?>

    </table>

    <br>
    <h3>Editar usuarios</h3>
    <form action="admin/usersEdit" method="post">
        <input type="text" name="userId" placeholder="ID del usuario"><br>
        <input type="text" name="username" placeholder="Username"><br>
        <input type="text" name="email" placeholder="Email"><br>
        <input type="text" name="role" placeholder="Rol"><br>
        <input type="text" name="courseId" placeholder="ID del curso"><br>
        <button type="submit">Editar usuario</button>
    </form>
    <br>
    <h3>Eliminar usuarios</h3>
    <form action="admin/usersDelete" method="post">
        <input type="text" name="deleteUserId" placeholder="ID del usuario"><br>
        <button type="submit">Eliminar usuario</button>
    </form>
    <br>

    <h2>Materias</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>ID de Curso</th>
        </tr>
        <?php foreach($subjects as $subject) { ?>
            <tr>
                <td><?= $subject->subjectId; ?></td>
                <td><?= $subject->name; ?></td>
                <td><?= $subject->courseId; ?></td>
            </tr>
        <?php } ?>

    </table>
    <br>
    <h3>Editar materias</h3>
    <form action="admin/subjectsEdit" method="post">
        <input type="text" name="subjectId" placeholder="ID de la materia"><br>
        <input type="text" name="subjectName" placeholder="Nombre de la materia"><br>
        <input type="text" name="courseId" placeholder="ID del curso"><br>
        <button type="submit">Editar materia</button>
    </form>
    <br>
    <h3>Eliminar materias</h3>
    <form action="admin/subjectsDelete" method="post">
        <input type="text" name="deleteSubjectId" placeholder="ID de la materia"><br>
        <button type="submit">Eliminar materia</button>
    </form>
    <br>
    <h2>Cursos</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
        </tr>
        <?php foreach($courses as $course) { ?>
            <tr>
                <td><?= $course->courseId; ?></td>
                <td><?= $course->courseName; ?></td>
            </tr>
        <?php } ?>

    </table>
    <br>
    <h3>Editar cursos</h3>
    <form action="admin/coursesEdit" method="post">
        <input type="text" name="courseId" placeholder="ID del curso"><br>
        <input type="text" name="courseName" placeholder="Nombre del curso"><br>
        <button type="submit">Editar curso</button>
    </form>
    <br>
    <h3>Eliminar cursos</h3>
    <form action="admin/coursesDelete" method="post">
        <input type="text" name="deleteCourseId" placeholder="ID de la curso"><br>
        <button type="submit">Eliminar curso</button>
    </form>
    <br>
</main>
<?php require('partials/footer.php');?>