<header id="header">
    <!--logo start-->
    <div class="brand">
        <a href="" class="logo"><span>PRANA</span></a>
    </div>
    <!--logo end-->
    <div class="toggle-navigation toggle-left">
        <button type="button" class="btn btn-default" id="toggle-left" data-toggle="tooltip" data-placement="right" title="Toggle Navigation">
            <i class="fa fa-bars"></i>
        </button>
    </div>
    <div class="user-nav">
        <ul>
            <li class="dropdown messages">
<!--                <span class="badge badge-danager animated bounceIn" id="new-messages">1</span>-->
<!--                <button type="button" class="btn btn-default dropdown-toggle options" id="toggle-mail" data-toggle="dropdown">
                    <i class="fa fa-envelope"></i>
                </button>-->
                <ul class="dropdown-menu alert animated fadeInDown">
                    <li>
<!--                        <h1>Tiene mensajes <strong>1</strong> nuevos </h1>-->
                    </li>
                    <li>
                        <a href="#">
<!--                            <div class="profile-photo">
                                
                                <img src="content-lab/assets/img/avatar.gif" alt="" class="img-circle">
                                
                            </div>-->
                            <div class="message-info">
                                <span class="sender"><?php echo $_SESSION["nombre"]?></span>
<!--                                <div class="message-content">Lorem ipsum dolor sit amet, elit rutrum felis sed erat augue fusce...</div>-->
                            </div>
                        </a>
                    </li>


<!--                    <li><a href="#">Ver todos los mensajes <i class="fa fa-angle-right"></i></a>
                    </li>-->
                </ul>

            </li>
<!--            <li class="profile-photo">
                <img src="content-lab/assets/img/avatar.png" alt="" class="img-circle">
            </li>-->
            <li class="dropdown settings">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <?php echo $_SESSION["nombre"]?> <i class="fa fa-angle-down"></i>
                </a>
                <ul class="dropdown-menu animated fadeInDown">
                    <li>
                        <a href="#"><i class="fa fa-user"></i> <?php echo $_SESSION["perfil"]?></a>
                    </li>
                    <li>
                        <a href="http://www.isatix.org/tarsius/index.php/main/unlogin"><i class="fa fa-power-off"></i> Salir</a>
                    </li>
                </ul>
            </li>
            <li>
                <div class="toggle-navigation toggle-right">
                    <a href="#right-menu" class="btn btn-default" id="toggle-right">
                        <i class="fa fa-comment"></i>
                    </a>
                </div>
            </li>

        </ul>

    </div>
</header>