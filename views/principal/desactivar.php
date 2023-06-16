<?php

require 'views/header.php';

?>
<div class="col-6">
    <div class="card">
        <!--begin::Card body-->
        <div class="card-body">
            <div id="kt_modal_new_target_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" action="#">

                <!--begin::Input group-->
                <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                    <!--begin::Label-->
                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                        <span class="required">Cédula</span>
                    </label>
                    <!--end::Label-->
                    <input id="cedula" require maxlength="13" minlength="10" type="text" class="form-control form-control-solid" placeholder="" name="target_title">
                    <div class="fv-plugins-message-container invalid-feedback"></div>
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="row g-9 mb-8">
                    <div class="col-md-12 fv-row fv-plugins-icon-container">
                        <label class="required fs-6 fw-semibold mb-2">Medio</label>
                        <select id="medio" class="form-select form-select-solid fw-bold" data-control="select2" data-hide-search="true" data-placeholder="Select a Team Member" name="target_assign" data-select2-id="select2-data-7-s87b" tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                            <option value="" data-select2-id="select2-data-9-fqbz">Seleccione medio</option>
                            <option value="1">teléfono fijo</option>
                            <option value="2">teléfono movil</option>
                            <option value="3">correo electrónico</option>
                        </select>
                    </div>
                </div>

                <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                    <!--begin::Label-->
                    <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                        <span class="required">Contacto</span>
                    </label>
                    <!--end::Label-->
                    <input id="contacto" require  type="text" class="form-control form-control-solid" placeholder="" name="target_title">
                    <div class="fv-plugins-message-container invalid-feedback"></div>
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="d-flex flex-column mb-8">
                    <label class="fs-6 fw-semibold mb-2">Comentario</label>
                    <textarea id="comentario" class="form-control form-control-solid" rows="3" name="target_details" placeholder="Comentario"></textarea>
                </div>

                <div class="text-center">
                    <button onclick=" limpiar()" type="reset" id="kt_modal_new_target_cancel" class="btn btn-light me-3">Cancel</button>
                    <button onclick="Guardar_Registro()" type="submit" id="kt_modal_new_target_submit" class="btn btn-primary">
                        <span class="indicator-label">Guardar</span>
                        <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                </div>
                <!--end::Actions-->
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
<?php require 'funciones/desactivar_js.php'; ?>

<script>
    let MODULO = 'Desactivar datos del cliente';
    $("#MODULO_NOMBRE").text(MODULO);
</script>