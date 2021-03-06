<!doctype html>
<html lang="fr">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
          crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css"/>
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('style.css')); ?>">
	<!-- <link rel="stylesheet" href="/style-fake.css"> -->

    <title><?php echo $__env->yieldContent('title'); ?></title>
  </head>
  <body>
    <main>
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <div class="navbar-brand">
                <img src="/images/blason-min.png" alt="logo">
                <a class="navbar-brand" href="#"><?php echo e(config('app.name')); ?></a>
            </div>
            <button class="navbar-toggler navbar-dark"
                    type="button"
                    data-toggle="collapse"
                    data-target="#navbarResponsive"
                    aria-controls="navbarResponsive"
                    aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button><div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/">Index
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/produits">Produits disponibles</a>
                    </li>
                    
                    <?php if(Auth::user()): ?>
                        <li class="nav-item dropdown">

                            <a class="nav-link dropdown-toggle"
                               href="#"
                               id="navbarDropdown"
                               role="button"
                               data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                <?php echo e(Auth::user()->name); ?>

                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="<?php echo e(route('dashboard')); ?>">Tableau de Bord</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/produits">Commander</a>
                                <a class="dropdown-item" href="<?php echo e(route('order.index')); ?>">Mes commandes</a>
                                
                                <div class="dropdown-divider"></div>

                                <?php if(Auth::user()->hasRole('administrateur') or Auth::user()->hasRole('éditeur')): ?>
                                    <a class="dropdown-item" href="/backoffice">Administration</a>
                                    <div class="dropdown-divider"></div>
                                <?php endif; ?>

                                <?php if(Auth::user()->hasPermission('deliver')): ?>
                                    <a class="dropdown-item" href="<?php echo e(route('backoffice.deliver.index')); ?>">Livraisons</a>
                                    <div class="dropdown-divider"></div>
                                <?php endif; ?>

                                <a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Déconnexion
                                </a>

                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST"
                                      style="display: none;">
                                    <?php echo csrf_field(); ?>
                                </form>
                            </div>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/login">Connexion</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container page">
        <?php if(session('error')): ?>
            <div class="alert alert-danger">
                <strong>Erreur</strong>
                <?php echo e(session('error')); ?>

            </div>
        <?php endif; ?>
        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <?php echo $__env->yieldContent('content'); ?>
    </div>
    <div id="social">
        <ul>
            <li><a href="#" class="fb"></a></li>
            <li><a href="#" class="yt"></a></li>
            <li><a href="#" class="tw"></a></li>
        </ul>
    </div>

    <footer class="">
        <div class="container">
            <p class="m-0 text-center">Copyright &copy; Kaamelot'TSE 2019</p>
        </div>
      </footer>
    </main>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script  src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>$('.carousel').carousel();</script>
    <!--<script src=" <?php echo e(asset('js/app.js')); ?>"></script>-->
    <?php echo $__env->yieldContent('scripts'); ?>
  </body>
</html>
<?php /**PATH /home/alexandre/www/kaamelottse/resources/views/layouts/main.blade.php ENDPATH**/ ?>