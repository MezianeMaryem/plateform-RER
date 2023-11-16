<!doctype html>
<html lang="en">
    <head>
      <meta charset="utf8">
      <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>UTBM</title>
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
input[type='file'],
input[type='submit'] {
  border: 1px solid #333;
  background-color: #555;
  color: white;
  padding: 10px 15px;
  margin: 5px 0;
  border-radius: 5px;
}

/* Hover effect for buttons */
button[type='submit']:hover {
  background-color: #117a8b; /* a blue shade */
}

/* Specific color for the button to match the logo */
button[type='submit'] {
  background-color: #d9534f; /* red shade from the logo */
  border-color: #d43f3a;
  margin-left: 10px;
}

/* Additional styling can be added for other elements as needed */

        </style>


<script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('upload-form');

    form.addEventListener('submit', function (e) {
        e.preventDefault();

        const formData = new FormData(this);
        fetch("{{ route('admin.documents.store') }}", {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
            },
            body: formData
        })
        .then(response => {
            if (!response.ok) throw response;
            return response.text(); // Traitez la réponse en tant que texte
        })
        .then(data => {
            alert('File succefully added'); // Affichez le message de réussite
        })
        .catch(error => {
            error.text().then(errorMessage => {
                alert(errorMessage); // Affichez le message d'erreur en tant que texte
            });
        });
    });
});

</script>



    </head>
    <body>
        <div class="center-content logo">
            <img src="{{ asset('images/UTBM.png') }}" alt="Logo" />
        </div>
        <div class="center-content">
            <h1>Hello, Professor ! </h1>
            <br>
           <form id="upload-form" method="POST" action="{{ route('admin.documents.store') }}" data-url="{{ route('admin.documents.store') }}" enctype="multipart/form-data">
           @csrf     
           <input type="file" name="files" aria-label="choose document" directory multiple>
                <br>
                <br>
                <label>
                  <input type="checkbox" name="public" value="yes"> Make it public ? 
              </label>
              
                <button type="submit">Upload Document</button>
            </form>
        </div>
    </body>
</html>
