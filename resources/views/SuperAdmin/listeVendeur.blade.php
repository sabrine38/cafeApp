<!--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liste des Vendeurs</title>
</head>
<body>
    <h1>Liste des Vendeurs</h1>

    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif

    @if($vendeurs->isEmpty())
        <p>Aucun vendeur ajouté pour le moment.</p>
    @else
        <table border="1">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Adresse</th>
                    <th>Image</th>
                    <th>ID Café</th>
                    <th>ID Admin</th>
                </tr>
            </thead>
            <tbody>
                @foreach($vendeurs as $vendeur)
                    <tr>
                        <td>{{ $vendeur->NomV }}</td>
                        <td>{{ $vendeur->PrénomV }}</td>
                        <td>{{ $vendeur->EmailV }}</td>
                        <td>{{ $vendeur->tele }}</td>
                        <td>{{ $vendeur->adress }}</td>
                        <td>{{ $vendeur->image }}</td>
                        <td>{{ $vendeur->id_cafe }}</td>
                        <td>{{ $vendeur->super_admin_id }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</body>
</html>-->
