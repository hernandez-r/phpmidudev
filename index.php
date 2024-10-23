<?php 

const API_URL = "https://whenisthenextmcufilm.com/api";

#Inicializar una nueva sesion de cURL; ch = curl handle
$ch = curl_init(API_URL);

//Indicar que queremos recibir el resultado de la peticion y no mostralro en pantalla
curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);

/*Ejecutar la peticvion y 
guardmaos en un resultado*/
$result = curl_exec($ch);

//transformar el resultado en un array asociativo
$data = json_decode($result, true);

//cerramos la conexion
curl_close($ch);
   
//var_dump($data);


// si solo quieres hacer u GET de la api
// $result = file_get_content(API_URL)
?>
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="with=device-with, initial-scale=1.0"/>
    <meta name="description" content="La próxima pelicula de Marvel"/>
    <title>La proxima pelicula de marvel</title>
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"
    >
</head>

<main>

    <h2>La proxima pelicula de Marvel</h2>

    <section>
    <img
        src="<?= $data["poster_url"]?>" width="300" alt="<?= "Poster de ". $data["title"]?>"
        style="border-radius: 16px;">
    </section>

    <hgroup>
        <h2><?= $data["title"]?> se estrena en <?= $data["days_until"]?> dias </h2>
        <p>Fecha de estreno: <?= $data["release_date"]?></p>
        <p>La siguiente peli es <?= $data["following_production"]["title"]?></p>
    </hgroup>

</main>



<style>
    :root{
        color-scheme: light dark;
    }

    body{
        display: grid;
        place-content: center;
    }

    img{
        margin: 0 auto;
        display: flex;
    }
    section{
        display: flex;
        justify-content: center;
        text-align: center;
    }

    hgroup {
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: center;
    }

    h2{
        text-align: center;
    }

</style>