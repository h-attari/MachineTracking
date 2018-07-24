
            <!-- Sidebar Holder -->
            <nav id="sidebar">
                <div class="sidebar-header">
                    <?php
                    if (!isset($_SESSION['id']))
                        echo '<a href="index.php"><h3>Machine Tracking</h3></a>';
                    else
                        echo '<a href="home.php"><h3>Machine Tracking</h3></a>';
                    ?>
                </div>

                <ul class="list-unstyled components">
                    
                    <li class="">
                        <a href="#contactmenu" aria-expanded="false">Contact</a>
                        <ul class="list-unstyled" id="contactmenu">
                            <li><a href="#add_member.php">phadnis.anurag@gmail.com</a></li>
                            <li><a href="#view_member.php">krishlalwani1@gmail.com</a></li>

                        </ul>
                    </li>
                </ul>
            </nav>
    <div class="container" id="content">
    <div class="page-header">
    <button type="button" id="sidebarCollapse" class="navbar-btn">
        <span></span>
        <span></span>
        <span></span>
    </button>
