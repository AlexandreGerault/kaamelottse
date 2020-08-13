<?php $__env->startSection('title', "Kaamelot'Tse"); ?>

<?php $__env->startSection('content'); ?>
    <div class="row carre">
        <h2 class="m-0 p-2">
            Bonjour <?php echo e(Auth::user()->name); ?>

        </h2>
    </div>
    <div class="row carre">
        <?php echo $__env->make('includes.quote', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <div class="row">
        <div class="container panel panel-primary">
            <div class="row">
                <div class="col-sm-3">
					<div class="">
						<div class="card mb-3">
							<div class="card-body bg-warning">
								<h5 class="card-title">Quête du graal</h5>
                                <?php if(Auth::user()->totalPoints()>1): ?>
                                    <p class="card-text"><b><?php echo e(Auth::user()->totalPoints()); ?> points</b></p>
                                <?php else: ?>
                                    <p class="card-text"><b><?php echo e(Auth::user()->totalPoints()); ?> point</b></p>
                                <?php endif; ?>
							</div>
						</div>
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id=>$product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="card <?php if(!$product->available): ?> bg-light <?php endif; ?> mb-3">
                                <?php if($product->image): ?> <img class="card-img-top" src="<?php echo e($product->image); ?>" alt="<?php echo e($product->name); ?>" /> <?php endif; ?>
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo e($product->name); ?></h5>
                                    <p class="card-text"><?php echo e($product->description); ?></p>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>

                <div class="col-sm-9">
                    <div class="card-group mb-3 commandes">
                        <?php if(sizeof($orders)<1): ?>
                            <div class="bg-white p-2 carre mb-3" style="width: 100%">
                                Aucune commande n'a encore été trouvée
                            </div>
                        <?php endif; ?>
                        <?php if(isset($article_bienvenue->content)): ?>
                            <div class="carre my-3">
                                <?php echo e($article_bienvenue->content); ?>

                            </div>
                        <?php endif; ?>
                        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"><a href="<?php echo e(route('order.show', ['order' => $order])); ?>">Commande du <?php echo e($order->created_at); ?></a>
                                        <?php echo $__env->make('includes.delivering_status', ['status' => $order->status], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </h5>
                                    <ul class="list-group list-group-flush">
                                        <?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orderItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li class="list-group-item d-flex align-items-center">
                                                <span class="badge badge-primary badge-pill mr-4"><?php echo e($orderItem->quantity); ?></span>
                                                <?php echo e($orderItem->product->name); ?>

                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                                <div class="card-footer text-muted">
                                    <?php echo e($order->shipping_address); ?> <?php if(empty($order->shipping_address)): ?> <a class="btn btn-dark" href="<?php echo e(route('order.show', $order)); ?>">Modifier</a> Veuillez terminer votre commande en complétant les informations manquantes <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <a href="<?php echo e(route('order.create')); ?>" class="btn btn-primary btn-lg btn-block">Nouvelle commande</a>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/alexandre/www/kaamelottse/resources/views/frontoffice/dashboard.blade.php ENDPATH**/ ?>