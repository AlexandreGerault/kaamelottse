<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
</head>
<body>
<h2>Réponse suite à votre demande sur {{ env('APP_NAME') }}</h2>
<p>
    {{ $response['answerContent'] }}
</p>
</body>
</html>