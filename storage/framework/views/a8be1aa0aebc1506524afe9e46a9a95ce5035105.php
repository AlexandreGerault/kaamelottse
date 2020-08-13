<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="mb-5">
            <h3>Créer une commande manuellement</h3>

            <a class="btn btn-primary" href="<?php echo e(url()->previous()); ?>"><i class="fas fa-arrow-left"></i>
                Retour
            </a>
        </div>

        <form method="post" action="<?php echo e($action); ?>">
            <?php echo csrf_field(); ?>
            <?php if(isset($method)): ?>
                <?php echo method_field($method); ?>
            <?php endif; ?>

            <div class="form-group">
                <label for="status">Status de la commande</label>
                <select class="form-control" name="status">
                    <option value="<?php echo e(config('ordering.status.NOT_COMPLETED')); ?>"
                            <?php if(isset($order) && $order->status == config('ordering.status.NOT_COMPLETED')): ?>
                            selected="selected"
                            <?php endif; ?>>
                        <?php echo e(config('enums.order.status.' . config('ordering.status.NOT_COMPLETED'))); ?>

                    </option>
                    <option value="<?php echo e(config('ordering.status.PENDING')); ?>"
                            <?php if(isset($order) && $order->status == config('ordering.status.PENDING')): ?>
                            selected="selected"
                            <?php endif; ?>>
                        <?php echo e(config('enums.order.status.' . config('ordering.status.PENDING'))); ?>

                    </option>
                    <option value="<?php echo e(config('ordering.status.IN_DELIVERY')); ?>"
                            <?php if(isset($order) && $order->status == config('ordering.status.IN_DELIVERY')): ?>
                            selected="selected"
                            <?php endif; ?>>
                        <?php echo e(config('enums.order.status.' . config('ordering.status.IN_DELIVERY'))); ?>

                    </option>
                    <option value="<?php echo e(config('ordering.status.DELIVERED')); ?>"
                            <?php if(isset($order) && $order->status == config('ordering.status.DELIVERED')): ?>
                            selected="selected"
                            <?php endif; ?>>
                        <?php echo e(config('enums.order.status.' . config('ordering.status.DELIVERED'))); ?>

                    </option>
                    <option value="<?php echo e(config('ordering.status.CANCELLED')); ?>"
                            <?php if(isset($order) && $order->status == config('ordering.status.CANCELLED')): ?>
                            selected="selected"
                            <?php endif; ?>>
                        <?php echo e(config('enums.order.status.' . config('ordering.status.CANCELLED'))); ?>

                    </option>
                </select>
            </div>

            <div class="form-group">
                <label for="autocomplete">Email du client</label>
                <input id="autocomplete"
                       class="autocomplete form-control col mr-2"
                       name="customer_email"
                       type="email"
                       placeholder="Client (email)"
                       autocomplete="off"
                       required
                       value="<?php if(isset($order) && isset($order->customer)): ?> <?php echo e($order->customer->email); ?> <?php else: ?> <?php echo e(old('customer_email')); ?> <?php endif; ?>"
                />
            </div>

            <div class="form-group">
                <label for="shipping_address">Adresse de livraison</label>
                <input id="shipping_address" class="form-control col mr-2" name="shipping_address"
                       type="text" placeholder="Adresse de livraison"
                       value="<?php if(isset($order) && $order->shipping_address != null): ?> <?php echo e($order->shipping_address); ?> <?php else: ?> <?php echo e(old('shipping_address')); ?> <?php endif; ?>"
                       required
                />
            </div>

            <div class="form-group">
                <label>N° de téléphone pour la livraison :</label>
                <input id="phone"
                       class="form-control col mr-2"
                       name="phone"
                       type="tel"
                       placeholder="N° de téléphone pour la livraison"
                       value="<?php if(isset($order) && $order->phone != null): ?> <?php echo e($order->phone); ?> <?php else: ?> <?php echo e(old('phone')); ?> <?php endif; ?>"
                       required/>
            </div>


            
            <div class="mt-2">
                <input class="btn btn-primary" type="submit" value="Valider la commande"/>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('js/no-pending-order-username-autocomplete.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.backoffice', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/alexandre/www/kaamelottse/resources/views/backoffice/orders/create.blade.php ENDPATH**/ ?>