
            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Xeria</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Extras</a></li>
                                            <li class="breadcrumb-item active">Profile</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Profile</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                            <div class="col-lg-4 col-xl-4">
                                <div class="card-box text-center">
                                    <img src="<?php echo base_url(); ?>xeria/light/dist/assets/images/users/user-1.jpg" class="rounded-circle avatar-lg img-thumbnail"
                                        alt="profile-image">

                                    <h4 class="mb-0"><?php echo $this->session->userdata('nickName'); ?></h4>
                                    <p class="text-muted">@<?php echo $this->session->userdata('rol'); ?></p>

                                    <button type="button" class="btn btn-success btn-xs waves-effect mb-2 waves-light">Follow</button>
                                    <button type="button" class="btn btn-danger btn-xs waves-effect mb-2 waves-light">Message</button>

                                    <div class="text-left mt-3">
                                        <!-- <h4 class="font-13 text-uppercase">Acerca de mi :</h4>
                                        <p class="text-muted font-13 mb-3">
                                            Hi I'm Johnathn Deo,has been the industry's standard dummy text ever since the
                                            1500s, when an unknown printer took a galley of type.
                                        </p> -->
                                        <p class="text-muted mb-2 font-13"><strong>Nombre :</strong> 
                                            <span class="ml-2">
                                                <?php echo $this->session->userdata('nombre'); ?> <?php echo $this->session->userdata('primerApellido');?> 
                                                <?php echo $this->session->userdata('segundoApellido'); ?>
                                            </span>
                                        </p>
                

                                        <p class="text-muted mb-2 font-13"><strong>Teléfono :</strong><span class="ml-2">(123)
                                                123 1234</span></p>

                                        <p class="text-muted mb-2 font-13"><strong>Email :</strong> <span class="ml-2 "><?php echo $this->session->userdata('email'); ?></span></p>

                                        <!-- <p class="text-muted mb-1 font-13"><strong>Location :</strong> <span class="ml-2">USA</span></p> -->
                                    </div>

                                    <!-- <ul class="social-list list-inline mt-3 mb-0">
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="social-list-item border-primary text-primary"><i
                                                    class="mdi mdi-facebook"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i
                                                    class="mdi mdi-google"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="social-list-item border-info text-info"><i
                                                    class="mdi mdi-twitter"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i
                                                    class="mdi mdi-github-circle"></i></a>
                                        </li>
                                    </ul> -->
                                </div> <!-- end card-box -->

                                <div class="card-box">
                                    <h4 class="header-title mb-3">Inbox</h4>

                                    <div class="inbox-widget slimscroll" style="max-height: 310px;">
                                        <div class="inbox-item">
                                            <div class="inbox-item-img"><img src="<?php echo base_url(); ?>xeria/light/dist/assets/images/users/user-2.jpg" class="rounded-circle" alt=""></div>
                                            <p class="inbox-item-author">Tomaslau</p>
                                            <p class="inbox-item-text">I've finished it! See you so...</p>
                                            <p class="inbox-item-date">
                                                <a href="javascript:(0);" class="btn btn-sm btn-link text-info font-13"> Reply </a>
                                            </p>
                                        </div>
                                        <div class="inbox-item">
                                            <div class="inbox-item-img"><img src="<?php echo base_url(); ?>xeria/light/dist/assets/images/users/user-3.jpg" class="rounded-circle" alt=""></div>
                                            <p class="inbox-item-author">Stillnotdavid</p>
                                            <p class="inbox-item-text">This theme is awesome!</p>
                                            <p class="inbox-item-date">
                                                <a href="javascript:(0);" class="btn btn-sm btn-link text-info font-13"> Reply </a>
                                            </p>
                                        </div>
                                        <div class="inbox-item">
                                            <div class="inbox-item-img"><img src="<?php echo base_url(); ?>xeria/light/dist/assets/images/users/user-4.jpg" class="rounded-circle" alt=""></div>
                                            <p class="inbox-item-author">Kurafire</p>
                                            <p class="inbox-item-text">Nice to meet you</p>
                                            <p class="inbox-item-date">
                                                <a href="javascript:(0);" class="btn btn-sm btn-link text-info font-13"> Reply </a>
                                            </p>
                                        </div>

                                        <div class="inbox-item">
                                            <div class="inbox-item-img"><img src="<?php echo base_url(); ?>xeria/light/dist/assets/images/users/user-5.jpg" class="rounded-circle" alt=""></div>
                                            <p class="inbox-item-author">Shahedk</p>
                                            <p class="inbox-item-text">Hey! there I'm available...</p>
                                            <p class="inbox-item-date">
                                                <a href="javascript:(0);" class="btn btn-sm btn-link text-info font-13"> Reply </a>
                                            </p>
                                        </div>
                                        <div class="inbox-item">
                                            <div class="inbox-item-img"><img src="<?php echo base_url(); ?>xeria/light/dist/assets/images/users/user-6.jpg" class="rounded-circle" alt=""></div>
                                            <p class="inbox-item-author">Adhamdannaway</p>
                                            <p class="inbox-item-text">This theme is awesome!</p>
                                            <p class="inbox-item-date">
                                                <a href="javascript:(0);" class="btn btn-sm btn-link text-info font-13"> Reply </a>
                                            </p>
                                        </div>

                                        <div class="inbox-item">
                                            <div class="inbox-item-img"><img src="<?php echo base_url(); ?>xeria/light/dist/assets/images/users/user-3.jpg" class="rounded-circle" alt=""></div>
                                            <p class="inbox-item-author">Stillnotdavid</p>
                                            <p class="inbox-item-text">This theme is awesome!</p>
                                            <p class="inbox-item-date">
                                                <a href="javascript:(0);" class="btn btn-sm btn-link text-info font-13"> Reply </a>
                                            </p>
                                        </div>
                                        <div class="inbox-item">
                                            <div class="inbox-item-img"><img src="<?php echo base_url(); ?>xeria/light/dist/assets/images/users/user-4.jpg" class="rounded-circle" alt=""></div>
                                            <p class="inbox-item-author">Kurafire</p>
                                            <p class="inbox-item-text">Nice to meet you</p>
                                            <p class="inbox-item-date">
                                                <a href="javascript:(0);" class="btn btn-sm btn-link text-info font-13"> Reply </a>
                                            </p>
                                        </div>
                                    </div> <!-- end inbox-widget -->

                                </div> <!-- end card-box-->

                            </div> <!-- end col-->

                            <div class="col-lg-8 col-xl-8">
                                <div class="card-box">
                                    <ul class="nav nav-pills navtab-bg">
                                        <li class="nav-item">
                                            <a href="#timeline" data-toggle="tab" aria-expanded="true" class="nav-link active">
                                                <i class="mdi mdi-timeline mr-1"></i>Eventos
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#settings" data-toggle="tab" aria-expanded="false" class="nav-link">
                                                <i class="mdi mdi-settings-outline mr-1"></i>Configuraciones
                                            </a>
                                        </li>
                                    </ul>

                                    <div class="tab-content">
                                        
                                        <div class="tab-pane show active" id="timeline">

                                            <!-- comment box -->
                                            <form action="#" class="comment-area-box mt-2 mb-3">
                                                <span class="input-icon">
                                                    <textarea rows="3" class="form-control" placeholder="Write something..."></textarea>
                                                </span>
                                                <div class="comment-area-btn">
                                                    <div class="float-right">
                                                        <button type="submit" class="btn btn-sm btn-dark waves-effect waves-light">Post</button>
                                                    </div>
                                                    <div>
                                                        <a href="#" class="btn btn-sm btn-light text-black-50"><i class="far fa-user"></i></a>
                                                        <a href="#" class="btn btn-sm btn-light text-black-50"><i class="fa fa-map-marker-alt"></i></a>
                                                        <a href="#" class="btn btn-sm btn-light text-black-50"><i class="fa fa-camera"></i></a>
                                                        <a href="#" class="btn btn-sm btn-light text-black-50"><i class="far fa-smile"></i></a>
                                                    </div>
                                                </div>
                                            </form>
                                            <!-- end comment box -->

                                            <!-- Story Box-->
                                            <div class="border border-light p-2 mb-3">
                                                <div class="media">
                                                    <img class="mr-2 avatar-sm rounded-circle" src="<?php echo base_url(); ?>xeria/light/dist/assets/images/users/user-3.jpg"
                                                        alt="Generic placeholder image">
                                                    <div class="media-body">
                                                        <h5 class="m-0">Jeremy Tomlinson</h5>
                                                        <p class="text-muted"><small>about 2 minuts ago</small></p>
                                                    </div>
                                                </div>
                                                <p>Story based around the idea of time lapse, animation to post soon!</p>

                                                <img src="<?php echo base_url(); ?>xeria/light/dist/assets/images/small/img-1.jpg" alt="post-img" class="rounded mr-1"
                                                    height="60" />
                                                <img src="<?php echo base_url(); ?>xeria/light/dist/assets/images/small/img-2.jpg" alt="post-img" class="rounded mr-1"
                                                    height="60" />
                                                <img src="<?php echo base_url(); ?>xeria/light/dist/assets/images/small/img-3.jpg" alt="post-img" class="rounded"
                                                    height="60" />

                                                <div class="mt-2">
                                                    <a href="javascript: void(0);" class="btn btn-sm btn-link text-muted"><i
                                                            class="mdi mdi-reply"></i> Reply</a>
                                                    <a href="javascript: void(0);" class="btn btn-sm btn-link text-muted"><i
                                                            class="mdi mdi-heart-outline"></i> Like</a>
                                                    <a href="javascript: void(0);" class="btn btn-sm btn-link text-muted"><i
                                                            class="mdi mdi-share-variant"></i> Share</a>
                                                </div>
                                            </div>

                                            <!-- Story Box-->
                                            <div class="border border-light p-2 mb-3">
                                                <div class="media">
                                                    <img class="mr-2 avatar-sm rounded-circle" src="<?php echo base_url(); ?>xeria/light/dist/assets/images/users/user-4.jpg"
                                                        alt="Generic placeholder image">
                                                    <div class="media-body">
                                                        <h5 class="m-0">Thelma Fridley</h5>
                                                        <p class="text-muted"><small>about 1 hour ago</small></p>
                                                    </div>
                                                </div>
                                                <div class="font-16 text-center font-italic text-dark">
                                                    <i class="mdi mdi-format-quote-open font-20"></i> Cras sit amet nibh libero, in
                                                    gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras
                                                    purus odio, vestibulum in vulputate at, tempus viverra turpis. Duis
                                                    sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper
                                                    porta. Mauris massa.
                                                </div>

                                                <div class="post-user-comment-box">
                                                    <div class="media">
                                                        <img class="mr-2 avatar-sm rounded-circle" src="<?php echo base_url(); ?>xeria/light/dist/assets/images/users/user-3.jpg"
                                                            alt="Generic placeholder image">
                                                        <div class="media-body">
                                                            <h5 class="mt-0">Jeremy Tomlinson <small class="text-muted">3 hours ago</small></h5>
                                                            Nice work, makes me think of The Money Pit.

                                                            <br/>
                                                            <a href="javascript: void(0);" class="text-muted font-13 d-inline-block mt-2"><i
                                                                class="mdi mdi-reply"></i> Reply</a>

                                                            <div class="media mt-3">
                                                                <a class="pr-2" href="#">
                                                                    <img src="<?php echo base_url(); ?>xeria/light/dist/assets/images/users/user-4.jpg" class="avatar-sm rounded-circle"
                                                                        alt="Generic placeholder image">
                                                                </a>
                                                                <div class="media-body">
                                                                    <h5 class="mt-0">Kathleen Thomas <small class="text-muted">5 hours ago</small></h5>
                                                                    i'm in the middle of a timelapse animation myself! (Very different though.) Awesome stuff.
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="media mt-2">
                                                        <a class="pr-2" href="#">
                                                            <img src="<?php echo base_url(); ?>xeria/light/dist/assets/images/users/user-1.jpg" class="rounded-circle"
                                                                alt="Generic placeholder image" height="31">
                                                        </a>
                                                        <div class="media-body">
                                                            <input type="text" id="simpleinput" class="form-control border-0 form-control-sm" placeholder="Add comment">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mt-2">
                                                    <a href="javascript: void(0);" class="btn btn-sm btn-link text-danger"><i
                                                            class="mdi mdi-heart"></i> Like (28)</a>
                                                    <a href="javascript: void(0);" class="btn btn-sm btn-link text-muted"><i
                                                            class="mdi mdi-share-variant"></i> Share</a>
                                                </div>
                                            </div>

                                            <!-- Story Box-->
                                            <div class="border border-light p-2 mb-3">
                                                <div class="media">
                                                    <img class="mr-2 avatar-sm rounded-circle" src="<?php echo base_url(); ?>xeria/light/dist/assets/images/users/user-6.jpg"
                                                        alt="Generic placeholder image">
                                                    <div class="media-body">
                                                        <h5 class="m-0">Jeremy Tomlinson</h5>
                                                        <p class="text-muted"><small>15 hours ago</small></p>
                                                    </div>
                                                </div>
                                                <p>The parallax is a little odd but O.o that house build is awesome!!</p>

                                                <iframe src='https://player.vimeo.com/video/87993762' height='300' class="img-fluid border-0"></iframe>
                                            </div>

                                            <div class="text-center">
                                                <a href="javascript:void(0);" class="text-danger"><i class="mdi mdi-spin mdi-loading mr-1"></i> Load more </a>
                                            </div>

                                        </div>
                                        <!-- end timeline content-->

                                        <div class="tab-pane" id="settings">
                                            <?php echo form_open_multipart("crudusers/cambiarpassword");
                                            ?>
                                                <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-account-circle mr-1"></i>Información Personal</h5>
                                                
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <input readonly type="hidden" name="id" value="<?php echo $this->session->userdata('idUsuario'); ?>">
                                                        <div class="form-group">
                                                            <label for="firstname">Nombre</label>
                                                            <input type="text" class="form-control" id="firstname" value="<?php echo $this->session->userdata('nombre'); ?>" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="lastname">Primer Apellido</label>
                                                            <input type="text" class="form-control" id="lastname" value="<?php echo $this->session->userdata('primerApellido'); ?>" readonly>
                                                        </div>
                                                    </div> <!-- end col -->
                                                </div> <!-- end row -->
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="useremail">Cambiar Email</label>
                                                                <input type="email" class="form-control" id="useremail" placeholder="Ingrese su nuevo email" autocomplete="off">
                                                                <span class="form-text text-muted"><small>Si desea cambiar su Email ingrese aqui</small></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="userpassword">Cambiar Contraseña</label>
                                                                <input type="password" name="password1" class="form-control" id="pass1" placeholder="Ingrese su nueva contraseña" autocomplete="new-password">
                                                                <span class="form-text text-muted"><small>Si desea cambiar su contraseña ingrese aqui</small></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="useremail">Confirmar Email</label>
                                                                <input type="email" class="form-control" id="useremail" placeholder="Confirme su Email" autocomplete="off">
                                                                <!-- <span class="form-text text-muted"><small>Si desea cambiar su Email ingrese aqui</small></span> -->
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="userpassword">Cambiar Contraseña</label>
                                                                <input type="password" name="password2" class="form-control" data-parsley-equalto="#pass1" id="pass2" placeholder="Confirme su contraseña" autocomplete="new-password" >
                                                                <!-- <span class="form-text text-muted"><small>Si desea cambiar su contraseña ingrese aqui</small></span> -->
                                                            </div>
                                                        </div><!-- end col -->
                                                    </div> <!-- end row -->
                                                    <div class="text-right">
                                                        <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i> Guardar Cambios</button>
                                                    </div>
                                                
                                            <?php
                                                echo form_close();
                                            ?>
                                        </div>
                                        <!-- end settings content-->

                                    </div> <!-- end tab-content -->
                                </div> <!-- end card-box-->

                            </div> <!-- end col -->
                        </div>
                        <!-- end row-->
                        
                    </div> <!-- container -->

                </div> <!-- content -->

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->