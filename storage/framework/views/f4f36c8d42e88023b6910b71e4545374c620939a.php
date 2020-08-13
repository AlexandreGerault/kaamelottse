<?php $__env->startSection('content'); ?>
    <div class="container">
        <div>
            <h3 class="panel-title mb-5">Messages reçus</h3>

            <table class="table">
                <thead>
                <tr class="text-center">
                    <th>#</th>
                    <th>Sujet</th>
                    <th>Catégorie</th>
                    <th>Message</th>
                    <th>Depuis</th>
                    <th>Répondu</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr  class="text-center">
                        <td><?php echo e($message->id); ?></td>
                        <td class="text-primary"><a href="<?php echo e(route('backoffice.message.edit', $message)); ?>">
                                <strong><?php echo e($message->subject); ?></strong>
                            </a></td>
                        <td><?php echo e($categories_messages[$message->category]); ?></td>
                        <td><?php echo e($message->content); ?></td>
                        <td>
                            <pre><?php echo e($message->created_at->formatLocalized('%A %d %B %Y')); ?></pre>
                        </td>
                        <td>
                            <?php echo $message->responded ? '<i class="fas fa-check"></i>' : '<i class="fas fa-times"></i>'; ?>

                        </td>
                        <td>
                            <a class="btn btn-primary" href="<?php echo e(route('backoffice.message.show', $message)); ?>">Lire</a>
                            <a class="btn btn-primary"
                               href="<?php echo e(route('backoffice.message.respond', $message)); ?>">Répondre</a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.backoffice', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/alexandre/www/kaamelottse/resources/views/backoffice/messages/index.blade.php ENDPATH**/ ?>