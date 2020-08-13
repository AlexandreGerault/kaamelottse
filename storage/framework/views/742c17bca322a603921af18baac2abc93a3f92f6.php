<?php $__env->startSection('content'); ?>
    <div class="container">
        <h3 class="mb-5">
            Profil de  <?php echo e($user->name); ?>

        </h3>

        <div class="d-flex flex-wrap">
            <div class="card m-3">
                <div class="card-body">
                    <h4 class="mb-3">Roles</h4>
                    <table class="table">
                        <tr>
                            <th>Nom du rôle</th>
                        </tr>
                        <?php $__currentLoopData = $user->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="text-capitalize"><?php echo e($role->name); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>

                    <div class="row">
                        <form method="POST" action="<?php echo e(route('backoffice.user.roles.attach', $user)); ?>" class="col">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label>Ajouter des rôles :</label>
                                <select class="form-control text-capitalize" name="roles[]" multiple>
                                    <?php $__currentLoopData = App\Models\Role::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(! $user->roles()->get()->contains($role)): ?>
                                        <option value="<?php echo e($role->id); ?>"><?php echo e($role->name); ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <input type="submit" value="Ajouter les rôles sélectionnés" class="btn btn-primary my-3" >
                            </div>
                        </form>
                        <form method="post" action="<?php echo e(route('backoffice.user.roles.detach', $user)); ?>" class="col">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label>Enlever des roles :</label>
                                <select class="form-control text-capitalize" name="roles[]" multiple>
                                    <?php $__currentLoopData = $user->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($role->id); ?>"><?php echo e($role->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <input type="submit" value="Enlever les rôles sélectionnés" class="btn btn-danger my-3" >
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.backoffice', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/alexandre/www/kaamelottse/resources/views/backoffice/users/show.blade.php ENDPATH**/ ?>