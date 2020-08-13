<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
</head>
<body>
<h2>Prise de contact sur {{ env('APP_NAME') }}</h2>
<p>
    Nous avons bien réceptionné votre demande. En voici un récapitulatif :</p>
<ul>
    <li><strong>Email</strong> : {{ $demand['email'] }}</li>
    <li><strong>Email</strong> : {{ $demand['subject'] }}</li>
    <li><strong>Message</strong> : {{ $demand['content'] }}</li>
</ul>
</body>
</html>