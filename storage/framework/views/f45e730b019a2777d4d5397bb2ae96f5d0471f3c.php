<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 bg-light p-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Vos commandes</h3>
                    </div>
                    <?php if($orders->count() > 0): ?>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Status</th>
                                <th>Montant</th>
                                <th>Commandé le</th>
                                <th>Livrée le</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo $__env->make('includes.delivering_status', ['status' => $order->status], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></td>
                                    <td><?php echo e($order->total_price); ?> €</td>
                                    <td><?php echo e($order->created_at->formatLocalized('%A %d %B %Y')); ?></td>
                                    <td>
                                        <?php if($order->status == config('ordering.status.DELIVERED') && $order->shipped_at !== null): ?>
                                            <?php echo e($order->shipped_at->formatLocalized('%A %d %B %Y')); ?>

                                        <?php else: ?>
                                            Commande non livrée
                                        <?php endif; ?>
                                    </td>
                                    <td><a class="btn btn-primary"
                                           href="<?php echo e(route('order.show', ['order' => $order])); ?>">Voir</a></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    <?php else: ?>
                        <p>Vous n'avez passé aucune commande.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/alexandre/www/kaamelottse/resources/views/frontoffice/orders/index.blade.php ENDPATH**/ ?>