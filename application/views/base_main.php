<!DOCTYPE html>

<html > <!--<![endif]-->

    <?php
// archivos de plantilla
    echo $this->load->view('base_head');
    ?>
    <body class="off-canvas" >
        <div id="container">
            <?php
            echo $this->load->view('base_headers-main');
            echo $this->load->view('base_sidebarLeft');

            if (isset($op)) {
                echo $this->load->view($op);
            }
            ?>
        </div>
        <?php
        echo $this->load->view('base_sidebarRight');
        ?>
       

    </body>
</html>
