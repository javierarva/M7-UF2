<?php require('partials/head.php');?>

<main style="margin-left:20px;">
    <h2>Dashboard</h2>
    <br>
    <div>
        <h3>Has iniciado sesión correctamente.</h3>
        <p>Bienvenido, <?= $_SESSION['username']??'User';?></p>
    </div>

    <br>

    <h3>Todas tus listas:</h3>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre de la lista</th>
        </tr>
        <?php foreach($lists as $list) { ?>
            <tr>
                <td><?= $list->listId; ?></td>
                <td><?= $list->listName; ?></td>
            </tr>
        <?php } ?>
    </table>

    <br><br>

    <h3>Todas tus tareas:</h3>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre de la tarea</th>
        </tr>
        <?php foreach($tasks as $task) { ?>
            <tr>
                <td><?= $task->taskId; ?></td>
                <td><?= $task->taskName; ?></td>
            </tr>
        <?php } ?>
    </table>

    <br><br>

    <h3>Crear una lista:</h3>
    <form action="dashboard/listsCreate" method="post">
        <input type="text" name="listName" placeholder="Nombre de la lista"><br>
        <button type="submit">Crear lista</button>
    </form>

    <h3>Crear una tarea:</h3>
    <form action="dashboard/tasksCreate" method="post">
        <input type="text" name="taskName" placeholder="Nombre de la tarea"><br>
        <input type="text" name="listId" placeholder="ID de la lista"><br>
        <button type="submit">Crear tarea</button>
    </form>

</main>

<?php require('partials/footer.php');?>