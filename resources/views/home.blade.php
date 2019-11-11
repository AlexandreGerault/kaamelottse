@extends('layouts.main')

@section('content')
<div class="row carre">
  <h2 class="m-0 p-2">
	Tableau de Bord
  </h2>
</div>
<div class="row carre">
	@include('layouts.citation')
</div>
<div class="row">
	<div class="col carre mr-2">
		<h5>Quiche Loraine</h5>
		<p class="lead">Le sommum du repas du véritable guerrier</p>
	</div>
	<div class="col carre mr-2">
		<h5>Crêpe</h5>
		<p class="lead"><em>Si simple, si tendre</em></p>
	</div>
	<div class="col carre">
		<h5>Cookie</h5>
	</div>
</div>
<div class="row">
  <div class="container">
	  <div class="row">
		  <div class="col-sm-2 carre">
			  <h4>Points</h4>
		  </div>
		  <div class="col-sm-10 carre">
			  <h5>Vos Commandes et prestations</h5>
			  <div class="card-group mb-3">
				  <div class="card">
					  <div class="card-body">
						  <h5 class="card-title">Commande du 5/11</h5>
						  <ul class="list-group list-group-flush">
							<li class="list-group-item d-flex justify-content-between align-items-center">
							  <img src="images/produits/cookie.png" alt="." class="mr-1">Cookie au chocolat
							  <span class="badge badge-primary badge-pill">2</span>
							</li>
							<li class="list-group-item d-flex justify-content-between align-items-center">
							  <img src="images/produits/quiche.png" alt="." class="mr-1">Part de Quiche Loraine
							  <span class="badge badge-primary badge-pill">1</span>
							</li>
							<li class="list-group-item d-flex justify-content-between align-items-center">
							  <img src="images/produits/crepe.png" alt="." class="mr-1">Crêpe
							  <span class="badge badge-primary badge-pill">5</span>
							</li>
						  </ul>
						  <p class="card-text"><small class="text-muted"></p>
					  </div>
					  <div class="card-footer text-muted">
						  Livraison en attente - prévue au 10 rue Pierre Richard
					  </div>
				  </div>
				  <div class="card">
					  <div class="card-body">
						  <h5 class="card-title">Commande du 3/11</h5>
						  <ul class="list-group list-group-flush">
							<li class="list-group-item d-flex justify-content-between align-items-center">
							  <img src="images/produits/cookie.png" alt="." class="mr-1">Cookie au chocolat
							  <span class="badge badge-primary badge-pill">5</span>
							</li>
						  </ul>
						  <p class="card-text"><small class="text-muted"></p>
					  </div>
					  <div class="card-footer text-muted">
						  Livraison effectuée au 10 rue Pierre Richard
					  </div>
				  </div>
			  </div>
			  <a href="commande.html" class="btn btn-secondary btn-lg btn-block">Nouvelle commande</a>
		  </div>
	  </div>
  </div>
</div>
@endsection
