<?php

return [
    'order' => [
        'status' => [
            config('ordering.status.NOT_COMPLETED') => 'Non confirmée',
            config('ordering.status.PENDING') => 'En attente de livreur',
            config('ordering.status.IN_DELIVERY') => 'En livraison',
            config('ordering.status.DELIVERED') => 'Livrée',
            config('ordering.status.CANCELLED') => 'Annulée',
        ]
    ]
];