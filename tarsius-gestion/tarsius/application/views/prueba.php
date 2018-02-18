<!doctype html>
<html lang="us">
    <?php
// archivos de plantilla
    echo $this->load->view('head-prueba');
    ?>
    <body>
        <script>


            $(function () {
                $("#autocomplete").autocomplete({
                    source: '<?php echo site_url('utils/get_clientes'); ?>', // path to the get_birds method
                    minLength: 1,
                    // optional
                });

            });




        </script>


        <!-- Autocomplete -->
        <h2 class="demoHeaders">Autocomplete</h2>
        <div>
            <input type="text" id="autocomplete" />
                      <?php  print_r($resultado);?>

        </div>
    </body>
</html>
