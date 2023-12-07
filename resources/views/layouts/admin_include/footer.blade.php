   <!-- BEGIN: Vendor JS-->
   <script src="{{ asset('public/admin_asset') }}/app-assets/vendors/js/vendors.min.js"></script>
   <!-- BEGIN Vendor JS-->

   <!-- BEGIN: Page Vendor JS-->
   <script src="{{ asset('public/admin_asset') }}/app-assets/vendors/js/charts/apexcharts/apexcharts.min.js"></script>
   <!-- END: Page Vendor JS-->

   <!-- BEGIN: Theme JS-->

   <script src="{{ asset('public/admin_asset') }}/app-assets/js/core/app-menu.min.js"></script>
   <script src="{{ asset('public/admin_asset') }}/app-assets/js/core/app.min.js"></script>
   <script src="{{ asset('public/admin_asset') }}/app-assets/js/scripts/customizer.min.js"></script>
   <!-- END: Theme JS-->
   <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
   <!-- BEGIN: Page JS-->
   <script src="{{ asset('public/admin_asset') }}/app-assets/js/scripts/cards/card-statistics.min.js"></script>
   <!-- END: Page JS-->

   {{-- Jquery Validator --}}
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 <script src="https://cdn.tiny.cloud/1/nfd45xwyplrjfw195pwfkplzpn4e5e01j7oj6bszbpryfv7t/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

 <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

 <!-- sweet alert -->
 <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


 <style>
    .border-none{
        border: none;
    }
    .is-invalid{
        color: red;
    }
 </style>

 @stack('scripts')
