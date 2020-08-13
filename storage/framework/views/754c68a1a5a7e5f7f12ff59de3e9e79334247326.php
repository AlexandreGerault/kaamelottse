<?php $__env->startSection('content'); ?>
    <div class="container">
        <h3 class="mb-5">Liste des articles</h3>

        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Titre</th>
                <th>Priorité</th>
                <th>Utilisateur</th>
                <th>Creation</th>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($article->id); ?></td>
                    <td class="text-primary"><a href="<?php echo e(route('backoffice.article.edit', $article)); ?>">
                            <?php if($article->published): ?>
                                <strong><?php echo e($article->title); ?></strong>
                            <?php else: ?>
                                <?php echo e($article->title); ?>

                            <?php endif; ?>
                        </a></td>
                    <td><?php echo e($article->priority); ?></td>
                    <td><?php echo e($article->user->name); ?></td>
                    <td>
                        <pre><?php echo e($article->created_at); ?></pre>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <a class="btn btn-info pull-right" href="<?php echo e(route('backoffice.article.create')); ?>">Ajouter un article</a>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.backoffice', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/alexandre/www/kaamelottse/resources/views/backoffice/articles/index.blade.php ENDPATH**/ ?>