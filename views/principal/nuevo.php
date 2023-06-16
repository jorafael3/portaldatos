<?php

require 'views/header.php';
?>







<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.14.5/xlsx.full.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment-with-locales.min.js"></script>
<?php require 'views/footer.php'; ?>
<!-- <?php require 'funciones/valecaja_js.php'; ?> -->

<script>
    var fl2 = $(".fl_fecha").flatpickr({
        // minDate: "today"
    });
    var fl22 = $("#Fecha_hasta_2").flatpickr({

    });
</script>