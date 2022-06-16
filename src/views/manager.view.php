<?php require('partials/head.php');?>

<main style="margin-left:20px;">
    <p>Bienvenido al Panel de Mánager, <?= $_SESSION['role']??'Role';?> <?= $_SESSION['username']??'User';?>.</p>
    <br>
    <h3>Lista de Materias:</h3>
    <ul style="list-style:unset;margin-left:20px;display:block;">
        <?php foreach($resultSubject as $subject) { ?>
            <li><?= $subject; ?></li>
        <?php } ?>
    </ul>

    <?php if($_SESSION['role'] == 'student'): ?>
        <h3>Lista de Profesores:</h3>
        <ul style="list-style:unset;margin-left:20px;display:block;">
            <?php foreach($resultTeacher as $teacher) { ?>
                <li><?= $teacher; ?></li>
            <?php } ?>
        </ul>
    <?php elseif($_SESSION['role'] == 'teacher'): ?>
        <h3>Lista de Estudiantes:</h3>
        <ul style="list-style:unset;margin-left:20px;display:block;">
            <?php foreach($resultStudent as $student) { ?>
                <li><?= $student; ?></li>
            <?php } ?>
        </ul>
    <?php endif;?>

    <h3>Editar tareas</h3>
    <form action="manager/tasksEdit" method="post">
        <input type="text" name="taskId" placeholder="ID de la tarea"><br>
        <input type="text" name="taskName" placeholder="Nombre de la tarea"><br>
        <button type="submit">Editar tarea</button>
    </form>
</main>

<?php require('partials/footer.php');?>