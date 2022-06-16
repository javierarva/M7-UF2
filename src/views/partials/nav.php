<div class="nav">
    <h1 class="title">ESCUELA</h1>
    <nav>
        <ul>
            <?php if(isset($_SESSION['logged'])): ?>
            <li>
                <button onclick="window.location.href='/login/logout'">Logout</button>

            </li>
            <?php else: ?>
            <li>
                <button onclick="window.location.href='/login'">Login</button>

            </li>
            <li>
                <button onclick="window.location.href='/register'">Register</button>

            </li>
            <?php endif;?>
            <?php if(isset($_SESSION['logged'])): ?>
            <li>
                <button onclick="window.location.href='/dashboard'">Dashboard</button>
            </li>
            <li>
                <button onclick="window.location.href='/manager'">Manager</button>
            </li>
            <?php else: ?>
            <li>
                <button onclick="window.location.href='/index'">Home</button>
            </li>
            <?php endif;?>
            <?php if($_SESSION['role'] == 'admin'): ?>
            <li>
                <button onclick="window.location.href='/admin'">Admin Panel</button>
            </li>
            <?php endif;?>
        </ul>
    </nav>
</div>