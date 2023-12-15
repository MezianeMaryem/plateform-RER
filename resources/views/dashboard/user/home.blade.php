<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Dashboard | Home</title>
    <link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

    <style>
        body { padding-top: 65px; 
        margin-bottom: 40px;}
        .navbar-brand img { height: 30px; }
    
  

/* Style the header to match the logo colors */
h1 {
  color: #ffffff; /* white text */
  margin-bottom: 20px;
}

/* Add a border and padding to the main content area */
.main-container {
  border: 2px solid #a0a0a0; /* gray border */
  padding: 20px;
  border-radius: 5px;

  max-width: 600px;
  background-color: #333333; /* slightly lighter gray for contrast */
}

/* Style the file input and submit button to match the theme */
input{
  width: 400px;
  height: 30px;
  border: 1px solid #333;
  background-color: #fff;
  color: black;
  padding: 10px 15px;
  margin: 5px 0;
  border-radius: 5px;
  font-size: large;

}

/* Hover effect for buttons */
button[type='submit']:hover {
  background-color: #117a8b; /* a blue shade */
}

/* Specific color for the button to match the logo */
button[type='submit'] {
  width: 50px;
  height: 45px;
  font-size: large;
  background-color: #d9534f; /* red shade from the logo */
  border-color: #d43f3a;
  margin-left: 10px;
}


    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th, td {
      
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #007bff; /* Bleu */
        color: white;
    }

    tr:nth-child(even) {
        background-color: white; /* Gris clair pour les lignes paires */
    }

    tr:nth-child(odd) {
        background-color: white; /* Blanc pour les lignes impaires */
    }

    tr:hover {
        background-color: black; /* Bleu plus clair au survol */
    }

    th, td {
        padding: 15px;
        text-align: left;
    }

    /* Style the table container to allow scrolling */
.scrollable-table-container {
  max-height: 400px; /* ou la hauteur que vous voulez */
  overflow: auto; /* Permet le défilement si le contenu dépasse la hauteur max */
}     



    
        .card-container {
            display: flex;
            justify-content: center;
            align-items: stretch; /* Alignement vertical des cartes */
        }

        .card {
  position: relative;
  margin: 10px;
  flex: 0 0 calc(50% - 20px); /* Adjust width as necessary, assuming two cards per row */
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  cursor: pointer;
  overflow: hidden;
  height: 300px; /* Adjust height as necessary */
  width: 250px;
  transition: transform 0.3s ease, box-shadow 0.3s ease; /* Smooth transition for hover effects */
}

.card:hover {
  transform: scale(1.05); /* Slightly scale up the card */
  box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); /* Enhance shadow effect */
}

.card img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: opacity 0.3s ease; /* Smooth transition for opacity */
}

.card:hover img {
  opacity: 0.8; /* Dim the image on hover */
}
        .card-text {
            position: absolute;
            bottom: 0; /* Positionné en bas de la carte */
            width: 100%;
            background: rgba(0, 0, 0, 0.5); /* Fond semi-transparent pour le texte */
            color: white;
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            padding: 10px 0; /* Espacement à l'intérieur de la zone de texte */
        }

        .card-text {
  position: absolute;
  bottom: 0;
  width: 100%;
  background: rgba(0, 0, 0, 0.5);
  color: white;
  text-align: center;
  font-size: 24px;
  font-weight: bold;
  padding: 10px 0;
  transition: background 0.3s ease; /* Smooth transition for background */
}

.card:hover .card-text {
  background: rgba(0, 0, 0, 0.7); /* Darken the background on hover */
}


    </style>
</head>
<body>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-md navbar-light bg-light fixed-top">
        <div class="container">
            <!-- Logo à gauche -->
            <a class="navbar-brand" href="{{ url('/') }}">
           <img src="{{ asset('images/utbm.png') }}" alt="Description" />
              
            </a>
            <!-- Utilisateur et Logout à droite -->
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">{{ Auth::guard('web')->user()->name }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                        <form action="{{ route('user.logout') }}" method="post" class="d-none" id="logout-form">@csrf</form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Container -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                 <h4> Dashboard</h4><hr>
                 <!-- Contenu de la page -->
                 <div>
                     <!-- Ici vous pouvez ajouter plus de contenu, par exemple un message de bienvenue, des liens vers d'autres pages, ou d'autres informations utiles pour l'utilisateur. -->
                     <p>Welcome to your dashboard, {{ Auth::guard('web')->user()->name }}. Here you can consult your school documents.</p>
                     <!-- Ajoutez d'autres éléments ici selon les besoins -->

                     <br><br><br><br>
     
                     <div class="card-container">


                     <div class="center-content">
            <br>
            <form action="{{ route('user.home') }}" method="GET">
    <input type="text" name="search" placeholder="search">
    <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
</form>


        <div id="results">
               <br><br>

               <div class="scrollable-table-container">

        <table>
        <thead>
            <tr>
            
                <th>Name</th>
                <th>User</th>
                <th>University</th>
                <th>Created on</th>
                <th>download</th>
            </tr>
        </thead>
        <tbody>
            
 @foreach ($localDocuments as $document)
        <tr>
            <td>  @php
        $parts = explode('_', $document->nom, 2); // Sépare le nom en utilisant '_' comme séparateur
        $displayName = count($parts) > 1 ? $parts[1] : $document->nom; // Utilise la partie après '_', sinon le nom entier
    @endphp
    {{ $displayName }}</td>
            <td>{{ $document->nom_utilisateur }}</td>
            <td>{{ $document->Univ }}</td>
            <td>{{ $document->created_at }}</td>
            <td><a href="{{ route('documents.download', $document->id) }}">Download</a></td>

        </tr>
    @endforeach
    @foreach ($publicDocuments as $document)
        <tr>
            <td>  @php
        $parts = explode('_', $document->nom, 2); // Sépare le nom en utilisant '_' comme séparateur
        $displayName = count($parts) > 1 ? $parts[1] : $document->nom; // Utilise la partie après '_', sinon le nom entier
    @endphp
    {{ $displayName }}</td>
            <td>{{ $document->nom_utilisateur }}</td>
            <td>{{ $document->Univ }}</td>
            <td>{{ $document->created_at }}</td>
            <td><a href="{{ route('documents.download.remote', $document->id) }}">Download</a></td>

        </tr>
    @endforeach
           
               
          
        </tbody>
    </table>
               </div>


</div> 
            </form>
        </div>




</div>
      


                   

<!--
    <a href="{{ route('user.userpublic') }}">
    <div class="card">
    <img src="{{ asset('images/public.jpeg') }}" alt="Description" />    
        <div class="card-text">Public documents</div>
    </div>
    </a>
-->
    
    
</div>


               
            </div>
        </div>
    </div>
    
    <!-- Scripts (Bootstrap JS and its dependencies) -->
    <script src="{{ asset('jquery.min.js') }}"></script>
    <script src="{{ asset('popper.min.js') }}"></script>
    <script src="{{ asset('bootstrap.min.js') }}"></script>
</body>
</html>
