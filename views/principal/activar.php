<?php

require 'views/header.php';

?>
<div class="col-6">
    <div class="card">
        <!--begin::Card body-->
        <div class="card-body">
            <div id="kt_modal_new_target_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" action="#">

              

                <div class="mb-5">
                    <h4>Cedula</h4>
                    <div class="input-group mb-0">
                        <input id="cedula" require maxlength="13" minlength="10" type="text" class="form-control form-control-solid" placeholder="" name="target_title">
                        <div class="input-group-append">
                            <button onclick="Buscar_inactivos()" class="btn btn-primary" type="button"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table id="Tabla_Inactivos" class="table align-middle table-row-dashed table-striped fs-6 gy-3 dataTable no-footer">

                    </table>
                </div>


               
                <div></div>
            </div>
        </div>
        <!--end::Card body-->
    </div>
</div>






<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.14.5/xlsx.full.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment-with-locales.min.js"></script>
<?php require 'views/footer.php'; ?>
<?php require 'funciones/activar_js.php'; ?>

<script>
    let MODULO = 'Activar datos del cliente';
    $("#MODULO_NOMBRE").text(MODULO);
</script>