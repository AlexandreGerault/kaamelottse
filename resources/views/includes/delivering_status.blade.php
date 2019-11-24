@if($status == config('ordering.status.NOT_COMPLETED'))
	<span class="badge badge-secondary">Non confirmée</span>
@elseif($status == config('ordering.status.PENDING'))
	<span class="badge badge-primary">En Attente de livreur</span>
@elseif($status == config('ordering.status.IN_DELIVERY'))
	<span class="badge badge-warning">En Cours</span>
@elseif($status == config('ordering.status.DELIVERED'))
	<span class="badge badge-success">{{ config('enums.order.status.' . $status) }}</span>
@else
	<span class="badge badge-danger">Commande Annulée</span>
@endif
