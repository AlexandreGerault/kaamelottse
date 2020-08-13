<!DOCTYPE html>
<html lang="<?php echo e(config('app.locale')); ?>">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $__env->yieldContent('title'); ?></title>

    <!-- Custom fonts for this template-->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo e(asset('css/sb-admin-2.css')); ?>" rel="stylesheet">
</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo e(route('backoffice.order.index')); ?>">
            <div class="sidebar-brand-icon rotate-n-15">
                <img src="<?php echo e(Storage::url('images/blason-min.png')); ?>" alt="logo" />
            </div>
            <div class="sidebar-brand-text mx-3"><?php echo e(config('app.name')); ?></div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="<?php echo e(route('backoffice.index')); ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Aperçu</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Interface
        </div>

        <!-- Nav Item - Orders Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="<?php echo e(route('backoffice.order.index')); ?>" data-toggle="collapse" data-target="#collapseOrders"
               aria-expanded="true" aria-controls="collapseOrders">
                <i class="fas fa-tag"></i>
                <span>Commandes</span>
            </a>
            <div id="collapseOrders" class="collapse" aria-labelledby="headingOrders" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Actions</h6>
                    <a class="collapse-item" href="<?php echo e(route('backoffice.order.index')); ?>">Liste</a>
                    <a class="collapse-item" href="<?php echo e(route('backoffice.order.create')); ?>">Créer une commande</a>
                </div>
            </div>
        </li>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('deliver')): ?>
        <!-- Nav Item - Orders Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('backoffice.deliver.index')); ?>">
                <i class="fas fa-truck"></i>
                <span>Livraisons</span>
            </a>
        </li>
        <?php endif; ?>

        <!-- Nav Item - Articles Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="<?php echo e(route('backoffice.article.index')); ?>" data-toggle="collapse" data-target="#collapseArticles"
               aria-expanded="true" aria-controls="collapseArticles">
                <i class="fas fa-newspaper"></i>
                <span>Articles</span>
            </a>
            <div id="collapseArticles" class="collapse" aria-labelledby="headingArticles"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Actions</h6>
                    <a class="collapse-item" href="<?php echo e(route('backoffice.article.index')); ?>">Liste</a>
                    <a class="collapse-item" href="<?php echo e(route('backoffice.article.create')); ?>">Écrire un article</a>
                </div>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="<?php echo e(route('backoffice.product.index')); ?>" data-toggle="collapse" data-target="#collapseProducts"
               aria-expanded="true" aria-controls="collapseProducts">
                <i class="fas fa-tags"></i>
                <span>Produits</span>
            </a>
            <div id="collapseProducts" class="collapse" aria-labelledby="headingArticles"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Actions</h6>
                    <a class="collapse-item" href="<?php echo e(route('backoffice.product.index')); ?>">Liste</a>
                </div>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="<?php echo e(route('backoffice.message.index')); ?>" data-toggle="collapse" data-target="#collapseMessages"
               aria-expanded="true" aria-controls="collapseMessages">
                <i class="fas fa-comment"></i>
                <span>Messages</span>
            </a>
            <div id="collapseMessages" class="collapse" aria-labelledby="headingMessages"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Actions</h6>
                    <a class="collapse-item" href="<?php echo e(route('backoffice.message.index')); ?>">Liste</a>
                </div>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="<?php echo e(route('backoffice.quote.index')); ?>" data-toggle="collapse" data-target="#collapseQuotes"
               aria-expanded="true" aria-controls="collapseQuotes">
                <i class="fas fa-quote-left"></i>
                <span>Citations</span>
            </a>
            <div id="collapseQuotes" class="collapse" aria-labelledby="headingQuotes"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Actions</h6>
                    <a class="collapse-item" href="<?php echo e(route('backoffice.quote.index')); ?>">Liste</a>
                    <a class="collapse-item" href="<?php echo e(route('backoffice.quote.create')); ?>">Ajouter une citation</a>
                </div>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="<?php echo e(route('backoffice.user.index')); ?>" data-toggle="collapse" data-target="#collapseUsers"
               aria-expanded="true" aria-controls="collapseUsers">
                <i class="fas fa-user"></i>
                <span>Utilisateurs</span>
            </a>
            <div id="collapseUsers" class="collapse" aria-labelledby="headingUsers"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Actions</h6>
                    <a class="collapse-item" href="<?php echo e(route('backoffice.user.index')); ?>">Liste</a>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Search -->
                <form style="visibility: hidden" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                               aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>


                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">
                    

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo e(Auth::user()->name); ?></span>
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="userDropdown">
                            <!-- DROPDOWN ITEM EXAMPLE
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                Activity Log
                            </a>-->
                            <a class="dropdown-item" href="<?php echo e(route('home')); ?>">
                                <i class="fas fa-arrow-left fa-sm fa-fw mr-2 text-gray-400"></i>
                                Retour au frontoffice
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Déconnexion
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
            <?php endif; ?>

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Administration</h1>
                    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
                </div>

                <!-- Content Row -->
                <div class="row">
                    <?php echo $__env->yieldContent('content'); ?>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; <?php echo e(env('APP_NAME')); ?> 2019</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Cliquer sur le bouton de déconnexion pour vous déconneter.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Annuler</button>
                <form method="POST" action="<?php echo e(route('logout')); ?>">
                    <?php echo csrf_field(); ?>
                    <input class="btn btn-primary" type="submit" value="Déconnexion">
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?php echo e(asset('js/app.js')); ?>"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Custom scripts for all pages-->
<script src="<?php echo e(asset('js/sb-admin-2.js')); ?>"></script>

<?php echo $__env->yieldContent('scripts'); ?>
</body>

</html>
<?php /**PATH /home/alexandre/www/kaamelottse/resources/views/layouts/backoffice.blade.php ENDPATH**/ ?>