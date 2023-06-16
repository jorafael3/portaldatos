<?php
$url_Guardar_Datos = constant('URL') . 'desactivardatos/Guardar_Datos/';

?>
<script>
    var url_Guardar_Datos = '<?php echo $url_Guardar_Datos ?>';

    function Mensaje(texto1, texto2, icon) {
        Swal.fire(
            texto1,
            texto2,
            icon
        )
    }

    function Guardar_Registro() {
        let cedula = $("#cedula").val();
        let medio_id = $("#medio").val();
        let medio_text = $("#medio option:selected").text();
        let contacto = $("#contacto").val();
        let comentario = $("#comentario").val();
        let param = {
            cedula: cedula,
            medio_id: medio_id,
            medio_text: medio_text,
            contacto: contacto,
            comentario: comentario,
        };
        console.log('param: ', param);
        if (cedula == '') {
            Mensaje("Escriba un numero de cedula", "", "error");
        } else if (cedula.length < 10) {
            Mensaje("la cedula debe tener almenos 10 digitos", "", "error");
        } else if (contacto == '') {
            Mensaje("Escriba un numero de contacto", "", "error");
        } else if (contacto.length < 10) {
            Mensaje("Escriba un numero de contacto", "", "error");
        } else if (medio_id == '') {
            Mensaje("Debe seleccionar un medio", "", "error");
        } else {
            AjaxSendReceiveData(url_Guardar_Datos, param, function(x) {
                console.log('x: ', x);
                if (x[1] == 1) {
                    Mensaje(x[0], "", "success");
                    limpiar();
                } else {
                    Mensaje(x[0], "", "error");
                }
            });
        }


    }

    function limpiar() {
        $("#cedula").val("");
        $("#contacto").val("");
        $("#comentario").val("");
    }


    function AjaxSendReceiveData(url, data, callback) {
        var xmlhttp = new XMLHttpRequest();
        // $.blockUI({
        //     message: '<div class="d-flex justify-content-center align-items-center"><p class="mr-50 mb-0">Cargando ...</p> <div class="spinner-grow spinner-grow-sm text-white" role="status"></div> </div>',
        //     css: {
        //         backgroundColor: 'transparent',
        //         color: '#fff',
        //         border: '0'
        //     },
        //     overlayCSS: {
        //         opacity: 0.5
        //     }
        // });

        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var data = this.responseText;
                data = JSON.parse(data);
                callback(data);
            }
        }
        xmlhttp.onload = () => {
            // $.unblockUI();
            // 
        };
        xmlhttp.onerror = function() {
            // $.unblockUI();
        };
        data = JSON.stringify(data);
        xmlhttp.open("POST", url, true);
        xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xmlhttp.send(data);
    }
</script>