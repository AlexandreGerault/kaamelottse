<?php if($status == config('ordering.status.NOT_COMPLETED')): ?>
	<span class="badge badge-secondary">Non confirmée</span>
<?php elseif($status == config('ordering.status.PENDING')): ?>
	<span class="badge badge-primary">En Attente de livreur</span>
<?php elseif($status == config('ordering.status.IN_DELIVERY')): ?>
	<span class="badge badge-warning">En Cours</span>
<?php elseif($status == config('ordering.status.DELIVERED')): ?>
	<span class="badge badge-success"><?php echo e(config('enums.order.status.' . $status)); ?></span>
<?php else: ?>
	<span class="badge badge-danger">Commande Annulée</span>
<?php endif; ?>
<?php /**PATH /home/alexandre/www/kaamelottse/resources/views/includes/delivering_status.blade.php ENDPATH**/ ?>