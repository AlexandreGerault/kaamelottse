<?php $__env->startSection('content'); ?>
    <div class="container">
        <h3 class="mb-5">Liste des produits</h3>

        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Nom</th>
                <th>Prix</th>
                <th>Points</th>
                <th>Stock</th>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($product->id); ?></td>
                    <td class="text-primary"><a href="<?php echo e(route('backoffice.product.edit', $product)); ?>">
                            <?php if($product->available): ?>
                                <strong><?php echo e($product->name); ?></strong>
                            <?php else: ?>
                                <?php echo e($product->name); ?>

                            <?php endif; ?>
                        </a></td>
                    <td><?php echo e($product->price); ?></td>
                    <td><?php echo e($product->points); ?></td>
                    <td>
                        <pre><?php echo e($product->stock); ?></pre>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <a class="btn btn-info pull-right" href="<?php echo e(route('backoffice.product.create')); ?>">Ajouter un produit</a>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.backoffice', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/alexandre/www/kaamelottse/resources/views/backoffice/products/index.blade.php ENDPATH**/ ?>