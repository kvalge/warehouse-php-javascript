<?php

if (!isset($currentCommand)) {
    $currentCommand = $_GET['command'] ?? 'homepage';
}
?>

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../static/styles.css">
    <script src="https://use.fontawesome.com/0c7a3095b5.js"></script>
</head>
<body>

<div class="main_container">
    <div class="container">
        <div class="dashboard_sidebar" id="dashboard_sidebar">
            <div class="dashboard_sidebar_user">
                <img src="../static/images/<?php echo $photo; ?>" alt="User image" id="user_image">
                <br>
                <span><?php echo $firstName . " " . $lastName; ?></span>
            </div>
            <div class="dashboard_sidebars_menus">
                <ul class="dashboard_menu_lists">
                    <li class="<?php echo ($currentCommand == 'homepage') ? 'menu_active' : ''; ?>">
                        <a href="../index.php?command=homepage"><span>Dashboard</span></a>
                    </li>
                    <li class="<?php echo ($currentCommand == 'inventory') ? 'menu_active' : ''; ?>">
                        <a href="../index.php?command=inventory"><span>Inventory</span></a>
                    </li>
                    <li class="<?php echo ($currentCommand == 'order') ? 'menu_active' : ''; ?>">
                        <a href="../index.php?command=order">Orders</span></a>
                    </li>
                    <li class="<?php echo ($currentCommand == 'supplier') ? 'menu_active' : ''; ?>">
                        <a href="../index.php?command=supplier"><span>Suppliers</span></a>
                    </li>
                    <li class="<?php echo ($currentCommand == 'customer') ? 'menu_active' : ''; ?>">
                        <a href="../index.php?command=customer"><span>Customers</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="navbar_container">
            <div class="navbar_button"><a href=""><i class="fa fa-navicon"></i></a></div>
            <div class="navbar_button"><a href="../index.php?command=logout"><i class="fa fa-power-off"> Logout</i></a>
            </div>
        </div>

        <div class="pale_container"></div>

        <div class="content_container">
            <?php include $template ?>
        </div>

    </div>
</div>

</body>
