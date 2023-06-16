<?php
$url_Buscar_inactivos = constant('URL') . 'activardatos/Buscar_inactivos/';
$url_actualizar_inactivos = constant('URL') . 'activardatos/actualizar_inactivos/';

?>
<script>
    var url_Buscar_inactivos = '<?php echo $url_Buscar_inactivos ?>';
    var url_actualizar_inactivos = '<?php echo $url_actualizar_inactivos ?>';
    var CEDULA;

    function Mensaje(texto1, texto2, icon) {
        Swal.fire(
            texto1,
            texto2,
            icon
        )
    }

    function Buscar_inactivos() {
        let cedula = $("#cedula").val();
        CEDULA = cedula;
        let param = {
            cedula: CEDULA
        }
        AjaxSendReceiveData(url_Buscar_inactivos, param, function(x) {
            console.log('x: ', x);
            Tabla_Inactivos(x);
        })

    }

    function Tabla_Inactivos(data) {

        var format = $.fn.dataTable.render.number(',', '.', 2, '$');
        var buttonCommon = {
            exportOptions: {
                format: {
                    body: function(data, row, column, node) {
                        var elm = $(data).text();
                        return elm;
                        //check if type is input using jquery
                        // if (column == 5) {
                        //     var elm = $(node).text()
                        //     //val = val[0];
                        //     return elm;
                        //     //return $(data).is("td") ? $(data).text() : data
                        // } else {
                        //     return node.firstChild.tagName === "INPUT" ?
                        //         node.firstElementChild.value :
                        //         data;
                        // }
                    }
                },
                //columns: cl
            }
        };

        $('#Tabla_Inactivos').empty();
        if ($.fn.dataTable.isDataTable('#Tabla_Inactivos')) {
            $('#Tabla_Inactivos').DataTable().destroy();
            $('#Tabla_Inactivos').empty();
        }
        // $('#Tabla_Deudas').empty();
        var table = $('#Tabla_Inactivos').DataTable({
            destroy: true,
            data: data,
            dom: 'rtip',
            // responsive: true,
            // deferRender: true,


            columns: [{
                    data: "contacto",
                    title: "contacto",

                }, {
                    data: null,
                    title: "Activar",
                    className: "btn_Activar",
                    // id: "Boton()",
                    defaultContent: '<button type="button" id="btn_Activar" class="btn btn-light-primary"><i class="bi bi-check-square-fill fs-1"></i></button>',
                    orderable: "",
                    // width: 20
                }

            ],


            "createdRow": function(row, data, index) {

                $('td', row).eq(0).addClass("fw-bolder");

            }

        });

        setTimeout(function() {
            $($.fn.dataTable.tables(true)).DataTable().columns.adjust().draw();
        }, 100);


        // $('#Tabla_Deudas tbody').on('click', 'td.btn_detalles', function(respuesta) {
        //     var data = table.row(this).data();
        //     console.log('data: ', data);
        //     Empresa_guardar = data["Empres"];
        //     ID = data["ID"];

        //     $("#Modal_archivo").modal("show");
        //     $("#Archivo_pfd").val('');
        // })
        $('#Tabla_Inactivos tbody').on('click', 'td.btn_Activar', function(respuesta) {
            var data = table.row(this).data();
            console.log('data: ', data);
            let param = {
                CONTACTO: data["contacto"],
                CEDULA: CEDULA,
                FECHA:moment().format("YYYYMMDD hh:mm:ss")
            }
            console.log('param: ', param);

            Swal.fire({
                title: 'Estas Seguro?',
                text: "Se marcará el documento como firmado!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, continuar!'
            }).then((result) => {
                if (result.isConfirmed) {
                    AjaxSendReceiveData(url_actualizar_inactivos, param, function(x) {
                        console.log('x: ', x);
                        if (x == true) {
                            let param = {
                                cedula: CEDULA
                            }
                            AjaxSendReceiveData(url_Buscar_inactivos, param, function(x) {
                                console.log('x: ', x);
                                Tabla_Inactivos(x);
                            })
                        }
                    });
                }
            })
        });


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