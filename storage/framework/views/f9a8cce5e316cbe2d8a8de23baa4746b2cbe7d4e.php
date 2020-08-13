<?php $__env->startSection('content'); ?>
    <div class="container">
        <h3 class="mb-5">Dernières commandes</h3>
        <table class="table">
            <thead>
            <tr class="text-center">
                <th>Client</th>
                <th>Statut</th>
                <th>Prix total</th>
                <th>Points totaux</th>
                <th>Téléphone</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td class="align-middle text-primary">
                        <?php if(isset($order->customer)): ?>
                            <strong><?php echo e($order->customer->name); ?></strong>
                        <?php else: ?>
                            Aucun client
                        <?php endif; ?>
                    </td>
                    <td class="align-middle text-center">
                        <?php echo e(config('enums.order.status.' . $order->status)); ?>

                    </td>
                    <td class="align-middle">
                        <?php echo e($order->total_price); ?> €
                    </td>
                    <td class="text-center align-middle">
                        <?php echo e($order->total_points); ?>

                    </td>
                    <td class="align-middle">
                        <?php echo e($order->phone); ?>

                    </td>
                    <td class="text-center">
                        <a class="btn btn-primary d-block mb-2"
                           href="<?php echo e(route('backoffice.order.show', $order)); ?>">
                            Voir
                        </a>
                        <a class="btn btn-primary d-block"
                           href="<?php echo e(route('backoffice.order.show', $order)); ?>">
                            Annuler
                        </a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>

        <?php echo e($orders->links()); ?>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backoffice', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/alexandre/www/kaamelottse/resources/views/backoffice/orders/index.blade.php ENDPATH**/ ?>