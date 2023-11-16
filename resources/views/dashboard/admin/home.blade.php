<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard | Home</title>
    <link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">

    <style>
    body { padding-top: 65px; }
        .navbar-brand img { height: 30px; }
    
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
<body style="background-color: #d7dadb">


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
                        <a class="nav-link" href="#">{{ Auth::guard('admin')->user()->name }}</a>
                    </li>
                    <li class="nav-item">
                    <a href="{{ route('admin.logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                                     <form action="{{ route('admin.logout') }}" id="logout-form" method="post">@csrf</form>      
                </li>
                </ul>
            </div>
        </div>
    </nav>


 <!-- Main Container -->
 <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                 <h4> Dashboard</h4><hr>
                 <!-- Contenu de la page -->
                 <div>
                     <!-- Ici vous pouvez ajouter plus de contenu, par exemple un message de bienvenue, des liens vers d'autres pages, ou d'autres informations utiles pour l'utilisateur. -->
                     <p>Welcome to your dashboard, {{ Auth::guard('admin')->user()->name }}. Here you can add and consult your school documents.</p>
                     <!-- Ajoutez d'autres éléments ici selon les besoins -->

                     <br><br><br><br>
     
                    <div class="card-container">

                    <a href="{{ route('admin.adddocument') }}">
    <div class="card">
    <img src="{{ asset('images/adddoc.png') }}" alt="Description" />    
        <div class="card-text">Add documents</div>
    </div>
    </a>

                    <a href="{{ route('user.userlocal') }}">
    <div class="card">
   
    <img src="{{ asset('images/local.jpeg') }}" alt="Description" />
        <div class="card-text">Local documents</div>
   
    </div>
    </a>

    <a href="{{ route('user.userpublic') }}">
    <div class="card">
    <img src="{{ asset('images/public.jpeg') }}" alt="Description" />    
        <div class="card-text">Public documents</div>
    </div>
    </a>
    
    
</div>


                    </div>
            </div>
        </div>
    </div>



</body>
</html>