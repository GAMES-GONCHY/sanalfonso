<!-- Footer Start -->
<footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                2024 &copy; todos los derechos reservados... by <a href="">Games</a> 
                            </div>
                            <div class="col-md-6">
                                <div class="text-md-right footer-links d-none d-sm-block">
                                    <a href="javascript:void(0);">Nosotros</a>
                                    <a href="javascript:void(0);">Ayuda</a>
                                    <a href="javascript:void(0);">Contáctanos</a>
                                </div>
                            </div>
                        </div>
                    </div>
</footer>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

        <!-- Right Sidebar -->
        <div class="right-bar">
            <div class="rightbar-title">
                <a href="javascript:void(0);" class="right-bar-toggle float-right">
                    <i class="mdi mdi-close"></i>
                </a>
                <h5 class="m-0 text-white">Settings</h5>
            </div>
            <div class="slimscroll-menu">
                <!-- User box -->
                <div class="user-box">
                    <div class="user-img">
                        <img src="<?php echo base_url(); ?>xeria/light/dist/assets/images/users/user-1.jpg" alt="user-img" title="Mat Helme" class="rounded-circle img-fluid">
                        <a href="javascript:void(0);" class="user-edit"><i class="mdi mdi-pencil"></i></a>
                    </div>
            
                    <h5><a href="javascript: void(0);">Marcia J. Melia</a> </h5>
                    <p class="text-muted mb-0"><small>Product Owner</small></p>
                </div>

                <!-- Settings -->
                <hr class="mt-0" />
                <div class="row">
                    <div class="col-6 text-center">
                        <h4 class="mb-1 mt-0">8,504</h4>
                        <p class="m-0">Balance</p>
                    </div>
                    <div class="col-6 text-center">
                        <h4 class="mb-1 mt-0">8,504</h4>
                        <p class="m-0">Balance</p>
                    </div>
                </div>
                <hr class="mb-0" />

                <div class="p-3">
                    <div class="custom-control custom-switch mb-2">
                        <input type="checkbox" class="custom-control-input" id="customSwitch1" checked>
                        <label class="custom-control-label" for="customSwitch1">Notifications</label>
                    </div>
                    <div class="custom-control custom-switch mb-2">
                        <input type="checkbox" class="custom-control-input" id="customSwitch2">
                        <label class="custom-control-label" for="customSwitch2">API Access</label>
                    </div>
                    <div class="custom-control custom-switch mb-2">
                        <input type="checkbox" class="custom-control-input" id="customSwitch3" checked>
                        <label class="custom-control-label" for="customSwitch3">Auto Updates</label>
                    </div>
                    <div class="custom-control custom-switch mb-2">
                        <input type="checkbox" class="custom-control-input" id="customSwitch4" checked>
                        <label class="custom-control-label" for="customSwitch4">Online Status</label>
                    </div>
                </div>

                <!-- Timeline -->
                <hr class="mt-0" />
                <h5 class="pl-3 pr-3">Messages <span class="float-right badge badge-pill badge-danger">25</span></h5>
                <hr class="mb-0" />
                <div class="p-3">
                    <div class="inbox-widget">
                        <div class="inbox-item">
                            <div class="inbox-item-img"><img src="<?php echo base_url(); ?>xeria/light/dist/assets/images/users/user-2.jpg" class="rounded-circle" alt=""></div>
                            <p class="inbox-item-author"><a href="javascript: void(0);" class="text-dark">Tomaslau</a></p>
                            <p class="inbox-item-text">I've finished it! See you so...</p>
                        </div>
                        <div class="inbox-item">
                            <div class="inbox-item-img"><img src="<?php echo base_url(); ?>xeria/light/dist/assets/images/users/user-3.jpg" class="rounded-circle" alt=""></div>
                            <p class="inbox-item-author"><a href="javascript: void(0);" class="text-dark">Stillnotdavid</a></p>
                            <p class="inbox-item-text">This theme is awesome!</p>
                        </div>
                        <div class="inbox-item">
                            <div class="inbox-item-img"><img src="<?php echo base_url(); ?>xeria/light/dist/assets/images/users/user-4.jpg" class="rounded-circle" alt=""></div>
                            <p class="inbox-item-author"><a href="javascript: void(0);" class="text-dark">Kurafire</a></p>
                            <p class="inbox-item-text">Nice to meet you</p>
                        </div>

                        <div class="inbox-item">
                            <div class="inbox-item-img"><img src="<?php echo base_url(); ?>xeria/light/dist/assets/images/users/user-5.jpg" class="rounded-circle" alt=""></div>
                            <p class="inbox-item-author"><a href="javascript: void(0);" class="text-dark">Shahedk</a></p>
                            <p class="inbox-item-text">Hey! there I'm available...</p>
                        </div>
                        <div class="inbox-item">
                            <div class="inbox-item-img"><img src="<?php echo base_url(); ?>xeria/light/dist/assets/images/users/user-6.jpg" class="rounded-circle" alt=""></div>
                            <p class="inbox-item-author"><a href="javascript: void(0);" class="text-dark">Adhamdannaway</a></p>
                            <p class="inbox-item-text">This theme is awesome!</p>
                        </div>
                    </div> <!-- end inbox-widget -->
                </div> <!-- end .p-3-->

            </div> <!-- end slimscroll-menu-->
        </div>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- Custom Modal -->
        <div id="custom-modal" class="modal-demo custom-modal-width">
            <button type="button" class="close" onclick="Custombox.modal.close();">
                <span>&times;</span><span class="sr-only">Close</span>
            </button>
            <h4 class="custom-modal-title text-center">¿Está seguro de cerrar sesión?</h4>
            <div class="custom-modal-text">
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <a href="<?php echo base_url(); ?>index.php/usuario/logout" id="cerrarsesion" class="w-100">
                            <button type="button" class="btn btn-outline-danger btn-rounded waves-effect waves-light w-100">Confirmar</button>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="#" class="w-100">
                            <button type="button" class="btn btn-outline-success btn-rounded waves-effect waves-light w-100" onclick="Custombox.modal.close();">Cancelar</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>




        <!-- Modal-Effect -->
        <script src="<?php echo base_url(); ?>xeria/light/dist/assets/libs/custombox/custombox.min.js"></script>

        <!-- Vendor js -->
        <script src="<?php echo base_url(); ?>xeria/light/dist/assets/js/vendor.min.js"></script>

        <script src="<?php echo base_url(); ?>xeria/light/dist/assets/libs/jquery-nice-select/jquery.nice-select.min.js"></script>
        <script src="<?php echo base_url(); ?>xeria/light/dist/assets/libs/switchery/switchery.min.js"></script>
        <script src="<?php echo base_url(); ?>xeria/light/dist/assets/libs/select2/select2.min.js"></script>
        <script src="<?php echo base_url(); ?>xeria/light/dist/assets/libs/bootstrap-select/bootstrap-select.min.js"></script>
        <script src="<?php echo base_url(); ?>xeria/light/dist/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
        <script src="<?php echo base_url(); ?>xeria/light/dist/assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>

        <!-- Plugin js-->
        <script src="<?php echo base_url(); ?>xeria/light/dist/assets/libs/parsleyjs/parsley.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#demo-form').parsley();
            });
        </script>

        <!-- Validation init js-->
        <script src="<?php echo base_url(); ?>xeria/light/dist/assets/js/pages/form-validation.init.js"></script>

        <!-- third party js -->
        <script src="<?php echo base_url(); ?>xeria/light/dist/assets/libs/jquery-knob/jquery.knob.min.js"></script>
        <script src="<?php echo base_url(); ?>xeria/light/dist/assets/libs/peity/jquery.peity.min.js"></script>
        <script src="<?php echo base_url(); ?>xeria/light/dist/assets/libs/apexcharts/apexcharts.min.js"></script>
        <script src="<?php echo base_url(); ?>xeria/light/dist/assets/libs/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url(); ?>xeria/light/dist/assets/libs/datatables/dataTables.bootstrap4.js"></script>
        <script src="<?php echo base_url(); ?>xeria/light/dist/assets/libs/datatables/dataTables.responsive.min.js"></script>
        <script src="<?php echo base_url(); ?>xeria/light/dist/assets/libs/datatables/responsive.bootstrap4.min.js"></script>
        <script src="<?php echo base_url(); ?>xeria/light/dist/assets/libs/datatables/dataTables.buttons.min.js"></script>
        <script src="<?php echo base_url(); ?>xeria/light/dist/assets/libs/datatables/buttons.bootstrap4.min.js"></script>
        <script src="<?php echo base_url(); ?>xeria/light/dist/assets/libs/datatables/buttons.html5.min.js"></script>
        <script src="<?php echo base_url(); ?>xeria/light/dist/assets/libs/datatables/buttons.flash.min.js"></script>
        <script src="<?php echo base_url(); ?>xeria/light/dist/assets/libs/datatables/buttons.print.min.js"></script>
        <script src="<?php echo base_url(); ?>xeria/light/dist/assets/libs/datatables/dataTables.keyTable.min.js"></script>
        <script src="<?php echo base_url(); ?>xeria/light/dist/assets/libs/datatables/dataTables.select.min.js"></script>
        <script src="<?php echo base_url(); ?>xeria/light/dist/assets/libs/pdfmake/pdfmake.min.js"></script>
        <script src="<?php echo base_url(); ?>xeria/light/dist/assets/libs/pdfmake/vfs_fonts.js"></script>
        <!-- third party js ends -->

        <!-- Init js-->
        <script src="<?php echo base_url(); ?>xeria/light/dist/assets/js/pages/form-advanced.init.js"></script>

        <!-- Datatables init -->
        <script src="<?php echo base_url(); ?>xeria/light/dist/assets/js/pages/datatables.init.js"></script>

        <!-- App js -->
        <script src="<?php echo base_url(); ?>xeria/light/dist/assets/js/app.min.js"></script>

        <!-- Dashboard init -->
        <script src="<?php echo base_url(); ?>xeria/light/dist/assets/js/pages/dashboard-2.init.js"></script>
        
    </body>
</html>