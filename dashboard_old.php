<!--<div id="dashboard_main_container">-->
<!--    <div class="dashboard_sidebar" id="dashboard_sidebar">-->
<!--        <div class="dashboard_sidebar_user">-->
<!--            <img src="../static/images/teddy_bear.png" alt="User image" id="user_image">-->
<!--            <br>-->
<!--            <span>BARRY BEAR</span>-->
<!--        </div>-->
<!--        <div class="dashboard_sidebars_menus">-->
<!--            <ul class="dashboard_menu_lists">-->
<!--                <li class="menu_active">-->
<!--                    <a href="?command=inventory"><span class="menu_text">Inventory</span></a>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <a href=""><span class="menu_text">Purchases</span></a>-->
<!--                </li>-->
<!--            </ul>-->
<!--        </div>-->
<!--    </div>-->
<!---->
<!--    <div class="dashboard_content_container" id="dashboard_content_container">-->
<!--        <div class="dashboard_top_nav">-->
<!--            <a href="" id="toggle_btn"><i class="fa fa-navicon"></i></a>-->
<!--            <a href="" id="logout_btn"><i class="fa fa-power-off"></i></a>-->
<!--        </div>-->
<!--        <div class="dashboard_content">-->
<!--            <div>-->
<!---->
<!--            </div>-->
<!--        </div>-->
<!---->
<!--    </div>-->
<!--</div>-->
<!---->
<!--<script>-->
<!--    let side_bar_open = true;-->
<!---->
<!--    toggle_btn.addEventListener('click', (event) => {-->
<!--        event.preventDefault();-->
<!---->
<!--        if (side_bar_open) {-->
<!--            dashboard_sidebar.style.width = '25%';-->
<!--            dashboard_sidebar.style.transition = '0.5s all';-->
<!--            dashboard_content_container.style.width = '85%';-->
<!--            user_image.style.width = '60px';-->
<!---->
<!--            menu_text = document.getElementsByClassName('menu_text');-->
<!--            for (let i = 0; i < menu_text.length; i++) {-->
<!--                menu_text[i].style.display = 'none';-->
<!--            }-->
<!--            side_bar_open = false;-->
<!--        } else {-->
<!--            dashboard_sidebar.style.width = '30%';-->
<!--            dashboard_sidebar.style.transition = '0.5s all';-->
<!--            dashboard_content_container.style.width = '80%';-->
<!--            user_image.style.width = '80px';-->
<!---->
<!--            menu_text = document.getElementsByClassName('menu_text');-->
<!--            for (let i = 0; i < menu_text.length; i++) {-->
<!--                menu_text[i].style.display = 'inline-block';-->
<!--            }-->
<!--            side_bar_open = true;-->
<!--        }-->
<!--    });-->
<!---->
<!--</script>-->
