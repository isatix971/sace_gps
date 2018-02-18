<!DOCTYPE html>

<html > <!--<![endif]-->

    <?php
// archivos de plantilla
    echo $this->load->view('head');
    ?>
    <body class="off-canvas" >
        <div id="container">
            <?php
            echo $this->load->view('headers-main');
            echo $this->load->view('sidebarLeft');

            if (isset($op)) {
                echo $this->load->view($op);
            }
            ?>
        </div>
        <?php
        echo $this->load->view('sidebarRight');
        ?>

    </body>
</html>
