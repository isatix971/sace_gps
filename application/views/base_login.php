<!DOCTYPE html>

<html > <!--<![endif]-->

    <?php
// archivos de plantilla
    echo $this->load->view('head');
    ?>

    <script type="text/javascript">
    </script>


    <body class="off-canvas" >
        <div id="container">
            <?php
            
                echo $this->load->view('loginForm');
            
//                echo $this->load->view('sidebarLeft');
            ?>
        </div>
<?php
echo $this->load->view('sidebarRight');
echo $this->load->view('scriptJS')
?>

    </body>
</html>
