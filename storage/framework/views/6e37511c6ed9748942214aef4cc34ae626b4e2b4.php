<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">

            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="mb-3">Récapitulatif</h5>
                        <ul class="mb-0">
                            <li>Commandes en attente :
                                <e><?php echo e($nb_penting_orders); ?></e>
                            </li>
                            <li>Commandes en livraison : <em><?php echo e($nb_in_delivering_orders); ?></em></li>
                            <li>Commandes livrées : <em><?php echo e($nb_delivered_orders); ?></em></li>
                            <li>Recettes totales : <em><?php echo e($profits); ?> €</em></li>
                        </ul>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h5 class="mb-3">Derniers messages reçus</h5>
                        <ul class="list-group list-group-flush">
                            <?php $__currentLoopData = $last_messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="list-group-item"><strong><?php echo e($message->sender->name); ?>

                                        :</strong> <?php echo e($message->content); ?>

                                    <br><em><a href="<?php echo e(route('backoffice.order.show', $message->order_id)); ?>">Envoyé
                                            le <?php echo e($message->created_at); ?></a></em></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-2 mb-2">
                    <h5>Commandes en attente (<?php echo e($nb_penting_orders); ?>)</h5>
                </div>
                <?php $__currentLoopData = $pentind_orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="card mb-3 p-0">
                        <div class="bg-secondary text-white p-2">
                            <strong><?php echo e($order->customer->name); ?></strong> - <?php echo e($order->total_price); ?>€
                            <a href="<?php echo e(route('backoffice.order.show', $order)); ?>" class="btn btn-info ml-2">Détail</a>
                        </div>
                        <ul class="p-2 list-group">
                            <?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orderItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="list-group-item <?php if($orderItem->product->stock<20): ?> list-group-item-danger <?php elseif($orderItem->product->price*$orderItem->quantity > 10): ?> list-group-item-warning <?php endif; ?>">
                                    <span
                                        class="badge badge-secondary"><?php echo e($orderItem->quantity); ?></span> <?php echo e($orderItem->product->name); ?>

                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                        <div class="p-2 bg-secondary text-white">
                            <?php echo e($order->shipping_address); ?>

                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="col-md-4">
                <div class="card p-2 mb-2">
                    <h5>Commandes en livraison (<?php echo e($nb_in_delivering_orders); ?>)</h5>
                </div>
                <?php $__currentLoopData = $in_delivering_orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="card mb-3 p-0">
                        <div class="bg-warning text-white p-2">
                            <strong><?php echo e($order->customer->name); ?></strong> - <?php echo e($order->total_price); ?>€
                            <a href="<?php echo e(route('backoffice.order.show', $order)); ?>" class="btn btn-info ml-2">Détail</a>
                        </div>
                        <ul class="p-2 list-group">
                            <?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orderItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="list-group-item <?php if($orderItem->product->stock<20): ?> list-group-item-danger <?php elseif($orderItem->product->price*$orderItem->quantity > 10): ?> list-group-item-warning <?php endif; ?>">
                                    <span
                                        class="badge badge-secondary"><?php echo e($orderItem->quantity); ?></span> <?php echo e($orderItem->product->name); ?>

                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                        <div class="p-2 bg-secondary text-white">
                            <?php echo e($order->shipping_address); ?>

                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.backoffice', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/alexandre/www/kaamelottse/resources/views/backoffice/index.blade.php ENDPATH**/ ?>