<!DOCTYPE html>
<!--
Author: Keenthemes
Product Name: Metronic | Bootstrap HTML, VueJS, React, Angular, Asp.Net Core, Blazor, Django, Flask & Laravel Admin Dashboard Theme
Purchase: https://1.envato.market/EA4JP
Website: http://www.keenthemes.com
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="en">
<!--begin::Head-->

<head>
    <base href="../../../" />
    <title>Metronic - the world's #1 selling Bootstrap Admin Theme Ecosystem for HTML, Vue, React, Angular & Laravel by Keenthemes</title>
    <meta charset="utf-8" />
    <meta name="description" content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 100,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue, Asp.Net Core, Blazor, Django, Flask & Laravel versions. Grab your copy now and get life-time updates for free." />
    <meta name="keywords" content="metronic, bootstrap, bootstrap 5, angular, VueJs, React, Asp.Net Core, Blazor, Django, Flask & Laravel starter kits, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Metronic | Bootstrap HTML, VueJS, React, Angular, Asp.Net Core, Blazor, Django, Flask & Laravel Admin Dashboard Theme" />
    <meta property="og:url" content="https://keenthemes.com/metronic" />
    <meta property="og:site_name" content="Keenthemes | Metronic" />
    <link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
    <link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="<?php echo constant('URL') ?>public/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo constant('URL') ?>public/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="app-blank">
    <!--begin::Theme mode setup on page load-->
    <script>
        var defaultThemeMode = "light";
        var themeMode;
        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-theme-mode");
            } else {
                if (localStorage.getItem("data-theme") !== null) {
                    themeMode = localStorage.getItem("data-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }
            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }
            document.documentElement.setAttribute("data-theme", themeMode);
        }
    </script>
    <!--end::Theme mode setup on page load-->
    <!--begin::Main-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Authentication - Sign-in -->
        <div class="d-flex flex-column flex-lg-row flex-column-fluid">
            <!--begin::Body-->
            <div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10 order-2 order-lg-1">
                <div class="d-flex flex-center flex-column flex-lg-row-fluid">
                    <div class="w-lg-500px p-10">
                    <?php
                                if (isset($success_log)) {
                                    echo '<div class="alert alert-success fw-bold ">';
                                    echo $success_log . "<br>";
                                    echo ' </div>';
                                }
                                ?>
                        <div id="SECC_LOG">
                            <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" action="" method="POST">
                                <div class="text-center mb-11">
                                    <h1 class="text-dark fw-bolder mb-3">Iniciar sesion</h1>
                                </div>
                                <div class="row g-3 mb-9">

                                </div>

                                <div class="fv-row mb-8">
                                    <input type="text" placeholder="Cédula" name="cedula" autocomplete="off" class="form-control bg-transparent" />
                                </div>
                                <div class="fv-row mb-3">
                                    <input type="password" placeholder="Contraseña" name="password" autocomplete="off" class="form-control bg-transparent" />
                                </div>
                                <div class="row g-9 mb-8">
                                    <!--begin::Col-->
                                    <div class="col-md-12 fv-row fv-plugins-icon-container">
                                        <select class="form-select form-select-solid fw-bold" data-control="select2" data-hide-search="true" data-placeholder="Select a Team Member" name="empresa" data-select2-id="select2-data-7-s87b" tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                                            <option value="0">Seleccione Empresa</option>
                                            <option value="1">Cartimex</option>
                                            <option value="2">Computron</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="d-grid mb-10">
                                    <button type="submit" class="btn btn-primary">
                                        <span class="indicator-label">Iniciar</span>
                                        <span class="indicator-progress">Please wait...
                                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    </button>
                                </div>
                                <?php
                                if (isset($errorlogin)) {
                                    echo '<div class="alert alert-danger fw-bold ">';
                                    echo $errorlogin . "<br>";
                                    echo ' </div>';
                                }
                                ?>

                            </form>
                            <div class="text-gray-500 text-center fw-semibold fs-6">No tienes usuario
                                <a onclick="REGISTRARSE()" class="link-primary">Registrate</a>
                            </div>
                        </div>



                        <div id="SECC_REG" style="display: none;">
                            <form class="form w-100 fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate" id="kt_sign_up_form" action="" method="POST">
                                <!--begin::Heading-->
                                <div class="text-center mb-11">
                                    <!--begin::Title-->
                                    <h1 class="text-dark fw-bolder mb-3">Registrarse</h1>

                                </div>
                                <!--begin::Heading-->
                                <!--begin::Login options-->
                                <div class="row g-3 mb-9">

                                </div>

                                <div class="fv-row mb-8 fv-plugins-icon-container">
                                    <!--begin::Email-->
                                    <input type="text" placeholder="Cedula" name="cedula_r" autocomplete="off" class="form-control bg-transparent">
                                    <!--end::Email-->
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--begin::Input group-->
                                <div class="fv-row mb-8 fv-plugins-icon-container" data-kt-password-meter="true">
                                    <!--begin::Wrapper-->
                                    <div class="mb-1">
                                        <!--begin::Input wrapper-->
                                        <div class="position-relative mb-3">
                                            <input class="form-control bg-transparent" type="password" placeholder="Password" name="password_r" autocomplete="off">
                                            <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                                                <i class="bi bi-eye-slash fs-2"></i>
                                                <i class="bi bi-eye fs-2 d-none"></i>
                                            </span>
                                        </div>
                                        <!--end::Input wrapper-->
                                        <!--begin::Meter-->
                                        <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                            <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                                        </div>
                                        <!--end::Meter-->
                                    </div>
                                    <!--end::Wrapper-->
                                    <!--begin::Hint-->
                                    <div class="text-muted">Use 8 or more characters with a mix of letters, numbers &amp; symbols.</div>
                                    <!--end::Hint-->
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Input group=-->
                                <!--end::Input group=-->
                                <div class="fv-row mb-8 fv-plugins-icon-container">
                                    <!--begin::Repeat Password-->
                                    <input placeholder="Repetir contraseña" name="confirm_password" type="password" autocomplete="off" class="form-control bg-transparent">
                                    <!--end::Repeat Password-->
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>

                                <div class="row g-9 mb-8">
                                    <!--begin::Col-->
                                    <div class="col-md-12 fv-row fv-plugins-icon-container">
                                        <select class="form-select form-select-solid fw-bold" data-control="select2" data-hide-search="true" data-placeholder="Select a Team Member" name="empresa" data-select2-id="select2-data-7-s87b" tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                                            <option value="0">Seleccione Empresa</option>
                                            <option value="1">Cartimex</option>
                                            <option value="2">Computron</option>
                                        </select>
                                    </div>

                                </div>
                                <!--end::Input group=-->

                                <div class="d-grid mb-10">
                                    <button name="Registrarse_b" type="submit" id="kt_sign_up_submit" class="btn btn-primary">
                                        <!--begin::Indicator label-->
                                        <span class="indicator-label">Registrarse</span>
                                        <!--end::Indicator label-->
                                        <!--begin::Indicator progress-->
                                        <span class="indicator-progress">Please wait...
                                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        <!--end::Indicator progress-->
                                    </button>
                                </div>
                                <!--end::Submit button-->
                                <!--begin::Sign up-->
                                <div class="text-gray-500 text-center fw-semibold fs-6">Ya tienes usuario
                                    <a onclick="LOGIN()" class="link-primary">Inicia Sesion</a>
                                </div>
                                <!--end::Sign up-->
                                <div></div>
                            </form>
                        </div>


                    </div>
                </div>
                <!--end::Form-->
                <div class="d-flex flex-center flex-wrap px-5">
                    <div class="d-flex fw-semibold text-primary fs-base">
                        <a href="../../demo17/dist/pages/team.html" class="px-5" target="_blank">Terms</a>
                        <a href="../../demo17/dist/pages/pricing/column.html" class="px-5" target="_blank">Plans</a>
                        <a href="../../demo17/dist/pages/contact.html" class="px-5" target="_blank">Contact Us</a>
                    </div>
                </div>
            </div>
            <!--end::Body-->
            <div class="d-flex flex-lg-row-fluid w-lg-50 bgi-size-cover bgi-position-center order-1 order-lg-2" style="background-image: url(<?php echo constant('URL') ?>public/assets/media/misc/auth-bg.png)">
                <!--begin::Content-->
                <div class="d-flex flex-column flex-center py-7 py-lg-15 px-5 px-md-15 w-100">
                    <!--begin::Logo-->
                    <a href="../../demo17/dist/index.html" class="mb-0 mb-lg-12">
                        <img alt="Logo" src="<?php echo constant('URL') ?>public/assets/media/logos/custom-1.png" class="h-60px h-lg-75px" />
                    </a>
                    <!--end::Logo-->
                    <!--begin::Image-->
                    <img class="d-none d-lg-block mx-auto w-275px w-md-50 w-xl-500px mb-10 mb-lg-20" src="<?php echo constant('URL') ?>public/assets/media/misc/auth-screens.png" alt="" />
                    <!--end::Image-->
                    <!--begin::Title-->
                    <h1 class="d-none d-lg-block text-white fs-2qx fw-bolder text-center mb-7">Fast, Efficient and Productive</h1>
                    <!--end::Title-->
                    <!--begin::Text-->
                    <div class="d-none d-lg-block text-white fs-base text-center">In this kind of post,
                        <a href="#" class="opacity-75-hover text-warning fw-bold me-1">the blogger</a>introduces a person they’ve interviewed
                        <br />and provides some background information about
                        <a href="#" class="opacity-75-hover text-warning fw-bold me-1">the interviewee</a>and their
                        <br />work following this is a transcript of the interview.
                    </div>
                    <!--end::Text-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Aside-->
        </div>
        <!--end::Authentication - Sign-in-->
    </div>
    <!--end::Root-->
    <!--end::Main-->
    <!--begin::Javascript-->
    <script>
        var hostUrl = "assets/";
    </script>
    <!--begin::Global Javascript Bundle(used by all pages)-->
    <script src="<?php echo constant('URL') ?>public/assets/plugins/global/plugins.bundle.js"></script>
    <script src="<?php echo constant('URL') ?>public/assets/js/scripts.bundle.js"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Custom Javascript(used by this page)-->
    <script src="<?php echo constant('URL') ?>public/assets/js/custom/authentication/sign-in/general.js">
    </script>
    <!--end::Custom Javascript-->
    <!--end::Javascript-->
</body>
<!--end::Body-->

</html>

<script>
    function LOGIN() {
        $("#SECC_LOG").show(100);
        $("#SECC_REG").hide();

    }

    function REGISTRARSE() {
        $("#SECC_LOG").hide();
        $("#SECC_REG").show(100);

    }
</script>