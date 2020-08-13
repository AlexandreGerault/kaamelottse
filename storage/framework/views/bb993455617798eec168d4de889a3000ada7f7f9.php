<?php $__env->startSection('title', "Kaamelot'Tse"); ?>

<?php $__env->startSection('content'); ?>
    <div class="row carre carousel slide" id="diaporama">
        <div class="carousel-inner">
            <div class="carousel-item active">
		<img src="images/diapo1.jpg" alt="diapo1" class="d-block w-100">
            </div>
            <div class="carousel-item">
                <img src="<?php echo e(Storage::url('images/diapo3.jpg')); ?>" alt="diapo1" class="d-block w-100">
            </div>
            <div class="carousel-item">
                <img src="<?php echo e(Storage::url('images/diapo2.jpg')); ?>" alt="diapo1" class="d-block w-100">
            </div>
        </div>
    </div>
    <div class="row carre">
        <?php echo $__env->make('includes.quote', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <div class="row">
        <div class="card-columns">
            <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="card carre">
                    <?php if($article->image): ?>
                        <img src="<?php echo e($article->image); ?>" class="card-img-top" alt="logo">
                    <?php endif; ?>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo e($article->title); ?></h5>
                        <p class="card-text"><?php echo nl2br(e($article->content)); ?></p>
                    </div>
                    <?php if($article->slug): ?>
                        <div class="card-body">
                            <a href="<?php echo e($article->link); ?>" class="card-link"><?php echo e($article->slug); ?></a>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php echo e($articles->links()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/alexandre/www/kaamelottse/resources/views/frontoffice/index.blade.php ENDPATH**/ ?>