 <!--begin::Aside-->
 <div id="kt_aside" class="aside" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="auto" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_toggle">
     <!--begin::Logo-->
     <div class="aside-logo flex-column-auto py-13" id="kt_aside_logo">
         <a href="../../demo17/dist/index.html">
             <img alt="Logo" src="<?php echo constant('URL') ?>public/logo.jpeg" class="h-70px" />
         </a>
     </div>
     <!--end::Logo-->
     <!--begin::Nav-->
     <div class="aside-menu flex-column-fluid pt-0 pb-7 py-lg-10" id="kt_aside_menu">
         <!--begin::Aside menu-->
         <div id="kt_aside_menu_wrapper" class="w-100 hover-scroll-overlay-y scroll-ps d-flex" data-kt-scroll="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside, #kt_aside_menu" data-kt-scroll-offset="0">
             <div id="kt_aside_menu" class="menu menu-column menu-rounded menu-title-gray-600 menu-state-primary menu-state-icon-primary menu-state-bullet-primary menu-icon-gray-400 menu-arrow-gray-400 fw-semibold fs-6" data-kt-menu="true">
                 <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="right-start" class="menu-item py-2">
                     <!--begin:Menu link-->
                     <span class="menu-link menu-center">
                         <span class="menu-icon me-0">
                             <!--begin::Svg Icon | path: icons/duotune/abstract/abs027.svg-->
                             <span class="svg-icon svg-icon-2x">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                                     <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                                 </svg>
                             </span>
                             <!--end::Svg Icon-->
                         </span>
                     </span>
                     <!--end:Menu link-->
                     <!--begin:Menu sub-->
                     <div class="menu-sub menu-sub-dropdown menu-sub-indention px-2 py-4 w-250px">
                         <!--begin:Menu item-->
                         <div class="menu-item">
                             <!--begin:Menu content-->
                             <div class="menu-content">
                                 <span class="menu-section fs-5 fw-bolder ps-1 py-1">Apps</span>
                             </div>
                             <!--end:Menu content-->
                         </div>
                         <div class="menu-item">
                             <!--begin:Menu link-->
                             <a class="menu-link" href="<?php echo constant("URL") . "desactivardatos"; ?>">
                                 <span class="menu-icon">
                                     <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                                     <span class="svg-icon svg-icon-2">
                                         <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-square-fill" viewBox="0 0 16 16">
                                             <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.354 4.646L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708z" />
                                         </svg>
                                     </span>
                                     <!--end::Svg Icon-->
                                 </span>
                                 <span class="menu-title">Desactivar datos</span>
                             </a>
                             <!--end:Menu link-->
                         </div>
                         <div class="menu-item">
                             <!--begin:Menu link-->
                             <a class="menu-link" href="<?php echo constant("URL") . "activardatos"; ?>">
                                 <span class="menu-icon">
                                     <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                                     <span class="svg-icon svg-icon-2">
                                         <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-square-fill" viewBox="0 0 16 16">
                                             <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm10.03 4.97a.75.75 0 0 1 .011 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.75.75 0 0 1 1.08-.022z" />
                                         </svg>
                                     </span>
                                     <!--end::Svg Icon-->
                                 </span>
                                 <span class="menu-title">Activar datos</span>
                             </a>
                             <!--end:Menu link-->
                         </div>
                         <!--end:Menu item-->
                     </div>
                     <!--end:Menu sub-->
                 </div>
                 <!--end:Menu item-->
             </div>
         </div>
         <!--end::Aside menu-->
     </div>
     <!--end::Nav-->
     <!--begin::Footer-->
     <div class="aside-footer flex-column-auto pb-5 pb-lg-10" id="kt_aside_footer">
         <!--begin::Menu-->
         <div class="d-flex flex-center w-100 scroll-px" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-dismiss="click" title="Quick actions">
             <a href="<?php echo constant('URL'); ?>principal/closeSession" type="button" class="btn btn-custom" data-kt-menu-trigger="click" data-kt-menu-overflow="true" data-kt-menu-placement="top-start">
                 <!--begin::Svg Icon | path: icons/duotune/arrows/arr076.svg-->
                 <span class="svg-icon svg-icon-2x">
                     <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                         <rect opacity="0.3" width="12" height="2" rx="1" transform="matrix(-1 0 0 1 15.5 11)" fill="currentColor" />
                         <path d="M13.6313 11.6927L11.8756 10.2297C11.4054 9.83785 11.3732 9.12683 11.806 8.69401C12.1957 8.3043 12.8216 8.28591 13.2336 8.65206L16.1592 11.2526C16.6067 11.6504 16.6067 12.3496 16.1592 12.7474L13.2336 15.3479C12.8216 15.7141 12.1957 15.6957 11.806 15.306C11.3732 14.8732 11.4054 14.1621 11.8756 13.7703L13.6313 12.3073C13.8232 12.1474 13.8232 11.8526 13.6313 11.6927Z" fill="currentColor" />
                         <path d="M8 5V6C8 6.55228 8.44772 7 9 7C9.55228 7 10 6.55228 10 6C10 5.44772 10.4477 5 11 5H18C18.5523 5 19 5.44772 19 6V18C19 18.5523 18.5523 19 18 19H11C10.4477 19 10 18.5523 10 18C10 17.4477 9.55228 17 9 17C8.44772 17 8 17.4477 8 18V19C8 20.1046 8.89543 21 10 21H19C20.1046 21 21 20.1046 21 19V5C21 3.89543 20.1046 3 19 3H10C8.89543 3 8 3.89543 8 5Z" fill="currentColor" />
                     </svg>
                 </span>
                 <!--end::Svg Icon-->
             </a>

         </div>
         <!--end::Menu-->
     </div>
     <!--end::Footer-->
 </div>