<!doctype html>
<html lang="en">
    <head>
      <meta charset="utf8">
      <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>UTBM Local documents</title>
        <style>
         /* Apply a dark background to the body */
body {
  background-color: #121212; /* dark gray */
  color: white; /* light text for dark backgrounds */
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  margin: 0;
  padding: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  flex-direction: column;
  scroll-behavior: smooth;
  
}

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
  width: 80%;
  max-width: 600px;
  background-color: #333333; /* slightly lighter gray for contrast */
}

/* Style the file input and submit button to match the theme */
input{
  width: 500px;
  height: 30px;
  border: 1px solid #333;
  background-color: #555;
  color: white;
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
  width: 150px;
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
        color: black;
    }

    tr:nth-child(even) {
        background-color: black; /* Gris clair pour les lignes paires */
    }

    tr:nth-child(odd) {
        background-color: black; /* Blanc pour les lignes impaires */
    }

    tr:hover {
        background-color: #b0c4de; /* Bleu plus clair au survol */
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

</style>



<script>



</script>



    </head>


    <body>



        <div class="center-content logo">
            <img src="{{ asset('images/UTBM.png') }}" alt="Logo" />
        </div>
        <div class="center-content">
            <h1>Hello, here you can find UTBM's documents ! </h1>
            <br>
            <form action="{{ route('user.userlocal') }}" method="GET">
    <input type="text" name="search" placeholder="Rechercher par nom">
    <button type="submit">Rechercher</button>
</form>

        <div id="results">
               <br><br>
               <div class="scrollable-table-container">
               <table>
        <thead>
            <tr>
            
                <th>Name</th>
                <th>User</th>
                <th>Private/Public</th>
                <th>Created on</th>
                <th>Download</th>
            </tr>
        </thead>
        <tbody>


            @foreach ($documents as $document)
                <tr>
                   
                    <td>{{ $document->nom }}</td>
                    <td>{{ $document->nom_utilisateur }}</td>
                    <td>{{ $document->prive ? 'Privé' : 'Public' }}</td>
                    <td>{{ $document->created_at->toFormattedDateString() }}</td>
                    <td><a href="{{ route('documents.download', $document->id) }}">Download</a>                </tr>
            @endforeach
        </tbody>
    </table>
               </div>


</div> 
            </form>
        </div>
    </body>
</html>
