<div>
    <div class="dashboard_sidebar" id="dashboard_sidebar">
        <div class="dashboard_sidebar_user">
            <img src="../static/images/<?php echo $photo; ?>" alt="User image" id="user_image">
            <br>
            <span><?php echo $firstName . " " . $lastName; ?></span>
        </div>
        <div class="dashboard_sidebars_menus">
            <ul class="dashboard_menu_lists">
                <li class="menu_active">
                    <a href="../index.php?command=inventory"><span>Inventory</span></a>
                </li>
                <li>
                    <a href=""><span class="menu_text">Purchases</span></a>
                </li>
            </ul>
        </div>
    </div>

</div>
