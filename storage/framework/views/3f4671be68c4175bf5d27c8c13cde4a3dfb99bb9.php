<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="panel panel-primary bg-light p-4">
            <div class="panel-heading">
                <h3 class="panel-title">
                    Commande N°<?php echo e($order->id); ?> -
                    <?php echo $__env->make('includes.delivering_status', ['status' => $order->status], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </h3>
            </div>
            <div class="d-flex flex-wrap">
                <?php if(isset($order->customer) || $order->phone !== null || $order->method_payment !== null): ?>
                    <div class="card m-3">
                        <div class="card-body">
                            <h4>Vos informations</h4>
                            <ul>
                                <?php if(isset($order->customer)): ?>
                                    <li><b>Nom du client : </b> <?php echo e($order->customer->name); ?></li>
                                <?php endif; ?>
                                <?php if($order->phone !== null): ?>
                                    <li><b>N° de téléphone : </b> <?php echo e($order->phone); ?></li>
                                <?php endif; ?>
                                <?php if($order->method_payment !== null): ?>
                                    <li><b>Moyen de paiment : </b> <?php echo e($order->method_payment); ?></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if(isset($order->deliveryDriver) || $order->shipping_address !== null): ?>
                    <div class="card m-3">
                        <div class="card-body">
                            <h4>Informations de livraison</h4>
                            <ul>
                                <?php if(isset($order->deliveryDriver)): ?>
                                    <li><b>Nom du livreur : </b> <?php echo e($order->deliveryDriver->name); ?></li>
                                <?php endif; ?>
                                <?php if($order->shipping_address !== null): ?>
                                    <li><b>Adresse de livraison :</b> <?php echo e($order->shipping_address); ?></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $order)): ?>
                    <form class="card m-3" action="<?php echo e(route('order.update', $order)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="card-body">
                            <h4>Renseigner des informations de contact</h4>

                            <div class="form-group">
                                <label for="customer_phone">Téléphone de contact</label>
                                <input type="tel" class="form-control" name="phone" id="customer_phone"
                                       value="<?php echo e(old('customer_phone', $order->phone)); ?>">
                            </div>
                            <div class="form-group">
                                <label for="shipping_address">Adresse de livraison</label>
                                <input type="text" class="form-control" name="shipping_address" id="shipping_address"
                                       value="<?php echo e(old('shipping_address', $order->shipping_address)); ?>">
                            </div>
                            <input type="submit" class="btn btn-primary" value="Terminer la commande"/>
                        </div>
                    </form>
                <?php endif; ?>

                <div class="card m-3">
                    <div class="card-body">
                        <h4 class="mb-4">Produits</h4>

                        <table class="table">
                            <thead>
                            <tr>
                                <th class="text-center">Produit</th>
                                <th class="text-center">Quantité</th>
                                <th class="text-center">Prix unité</th>
                                <th class="text-center">Prix</th>
                                <th class="text-center">Point à l'unité</th>
                                <th class="text-center">Points</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orderItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="text-primary">
                                        <?php echo e($orderItem->product->name); ?>

                                    </td>
                                    <td>
                                        <?php echo e($orderItem->quantity); ?>

                                    </td>
                                    <td>
                                        <?php echo e($orderItem->product->price); ?> €
                                    </td>
                                    <td>
                                        <?php echo e($orderItem->product->price * $orderItem->quantity); ?> €
                                    </td>
                                    <td class="text-center">
                                        <?php echo e($orderItem->product->points); ?>

                                    </td>
                                    <td class="text-center">
                                        <?php echo e($orderItem->product->points * $orderItem->quantity); ?>

                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card m-3">
                        <div class="card-body">
                            <p>
                                <b>Prix total : </b> <?php echo e($order->total_price); ?> €<br />
                                <b>Points totaux : </b> <span class="badge badge-warning"><?php echo e($order->total_points); ?></span>
                            </p>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $order)): ?>
                            <form action="<?php echo e(route('order.destroy', $order)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <input type="submit" class="btn btn-danger btn-sm" value="Annuler la commande" />
                            </form>
                            <?php endif; ?>
                        </div>
                    </div>

                <div class="card m-3">

                    <div class="card m-3 p-3">
                        <form class="mb-3" method="post" action="<?php echo e(route('frontoffice.order.message', $order)); ?>" style="width: 100%">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label for="message">Envoyer un message</label>
                                <textarea id="message" class="form-control" name="content"></textarea>
                            </div>
                            <input type="submit" class="btn btn-primary btn-sm bt-block" value="Envoyer">
                        </form>
                        <ul class="list-group list-group-flush">
                            <?php $__currentLoopData = $order->messages->sortByDesc(function ($message, $key) {
                                return $message->created_at;
                            }); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="list-group-item <?php if($order->delivery_driver_id == $message->user_sender_id ): ?> bg-warning <?php endif; ?>"><strong><?php echo e($message->sender->name); ?> :</strong> <?php echo e($message->content); ?>

                                    <br><em>Envoyé le <?php echo e($message->created_at); ?></em></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/alexandre/www/kaamelottse/resources/views/frontoffice/orders/show.blade.php ENDPATH**/ ?>