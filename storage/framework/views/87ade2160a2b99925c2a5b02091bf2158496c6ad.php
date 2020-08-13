<?php $__env->startSection('content'); ?>
    <div class="container">
        <h3 class="mb-5">Utilisateurs</h3>
        <table class="table">
            <thead>
            <tr class="text-center">
                <th>Nom</th>
                <th>Email</th>
                <th>Roles</th>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td class="align-middle text-primary">
                        <a href="<?php echo e(route('backoffice.user.show', $user)); ?>"><b><?php echo e($user->name); ?></b></a>
                    </td>
                    <td class="align-middle text-primary">
                        <b><?php echo e($user->email); ?></b>
                    </td>
                    <td class="align-middle text-primary">
                        <?php $__currentLoopData = $user->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo e($role->name); ?>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>

        <?php echo e($users->links()); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.backoffice', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/alexandre/www/kaamelottse/resources/views/backoffice/users/index.blade.php ENDPATH**/ ?>