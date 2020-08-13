<?php $__env->startSection('content'); ?>
    <div class="container">
        <h3 class="mb-5">Liste des citations</h3>
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Citation</th>
                <th>Auteur</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $quotes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quote): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td>
                        <a href="<?php echo e(route('backoffice.quote.edit', $quote)); ?>">
                            <?php echo e($quote->id); ?>

                        </a>
                    </td>
                    <td><?php echo substr(e($quote->content), 0, 50) . '...'; ?></td>
                    <td>
                        <?php echo e(($quote->author) ? $quote->author : "Inconnu"); ?>

                    </td>
                    <td>
                        <a href="<?php echo e(route('backoffice.quote.edit', $quote)); ?>" class="btn btn-primary">
                            Voir
                        </a>
                        <form class="form-inline d-inline" action="<?php echo e(route('backoffice.quote.destroy', $quote)); ?>">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <input type="submit" value="Supprimer" class="btn btn-danger">
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>

        <a class="btn btn-info pull-right" href="<?php echo e(route('backoffice.quote.create')); ?>">Ajouter une citation</a>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.backoffice', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/alexandre/www/kaamelottse/resources/views/backoffice/quotes/index.blade.php ENDPATH**/ ?>