<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 bg-light p-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Liste des articles</h3>
                    </div>
                    <form method="post" action="<?php echo e($action); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="card-deck d-flex flex-wrap">
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="card mr-2 <?php if(!$product->available): ?> bg-light <?php endif; ?> my-3"
                                     style="min-width: 200px; max-width: 220px;">
                                     <?php if(!empty($product->image)): ?>
                                        <img class="card-img-top" src="<?php echo e($product->image); ?>" alt="<?php echo e($product->name); ?>">
                                     <?php endif; ?>
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo e($product->name); ?></h5>
                                        <p class="card-text"><?php echo e($product->description); ?></p>
                                            <?php if(!$product->available or $product->stock<1): ?>
                                                <span class="badge badge-danger">Non disponible</span>
                                            <?php endif; ?>
                                        <?php if($product->available and $product->stock>0): ?>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <button onclick="this.parentNode.parentNode.parentNode.querySelector('input[type=number]').stepDown(1); return false"
                                                            class="btn border"
                                                            type="button"
                                                            id="button-addon1">
                                                        <i class="fas fa-minus"></i>
                                                    </button>
                                                </div>

                                                <input class="form-control text-center no-spins-button" min="0"
                                                       name="<?php echo e($product->id); ?>" value="0" type="number">

                                                <div class="input-group-append">
                                                    <button onclick="this.parentNode.parentNode.parentNode.querySelector('input[type=number]').stepUp(1); return false"
                                                            class="btn border"
                                                            type="button"
                                                            id="button-addon1">
                                                        <i class="fas fa-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <p class="card-text" style="text-align: right">
                                            <small class="text-muted"><?php echo e($product->price); ?> €</small>
                                            <span class="badge badge-warning ml-2"><?php echo e($product->points); ?>

                                                <?php if($product->points>1): ?>
                                                    points
                                                <?php else: ?>
                                                    point
                                                <?php endif; ?>
                                        </span>
                                        </p>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <div class="mt-2">
                            <input class="btn btn-primary" type="submit" value="Commander"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/alexandre/www/kaamelottse/resources/views/frontoffice/orders/create.blade.php ENDPATH**/ ?>