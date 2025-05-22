@extends('barra')

@section('title', 'Inicio - Biblioteca')

@section('content')

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Sistema de Gestión de Bibliotecaria - Book Organizer</title>
  <style>

    body {
        background-color:rgb(48, 63, 88);
        
      }
   
    .libro {
      display: flex;
      align-items: center;
      margin-bottom: 40px;
      gap: 10px; 
      
    }
    .libro:nth-child(even) {
      flex-direction: row-reverse;
    }
    .libro img {
      width: 150px;
      min-width: 150px;
      height: 220px;
      border-radius: 10px;
      margin: 0 20px;
      flex-shrink: 0;
    }
    .descripcion {
      max-width: 600px;
      background-color:rgb(199, 212, 241);
      padding: 15px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    h2 {
      color: #444;
    }

  
  </style>
</head>
<body>

<h1 style="text-align: center; color: #DAF7A6 ;">
  Sistema de Gestión de Bibliotecaria - Book Organizer
</h1>


  <div class="libro">
  <img src="{{ asset('imagenes/cruel.jpeg') }}" alt="El Príncipe Cruel">
    <div class="descripcion">
      <h2>El Príncipe Cruel</h2>
      <p>Una historia llena de intrigas, traiciones y romance en un mundo de hadas peligrosas. Jude, una humana criada en la corte de las hadas, lucha por conseguir su lugar.</p>
    </div>
  </div>

  <div class="libro">
  <img src="{{ asset('imagenes/roto.jpeg') }}" alt="Érase una vez un corazón roto">
    <div class="descripcion">
      <h2>Érase una vez un corazón roto</h2>
      <p>Jacks, el Príncipe de Corazones, lleva a Evangeline por un camino de amor, mentiras y magia en una historia donde los finales felices no siempre están asegurados.</p>
    </div>
  </div>

  <div class="libro">
  <img src="{{ asset('imagenes/malvado.jpeg') }}" alt="El Rey Malvado">
    <div class="descripcion">
      <h2>El Rey Malvado</h2>
      <p>Continuación de El Príncipe Cruel, esta secuela profundiza en el juego del poder mientras Jude intenta controlar el reino y lidiar con su relación con Cardan.</p>
    </div>
  </div>

  <div class="libro">
  <img src="{{ asset('imagenes/mancha.jpeg') }}" alt="Don Quijote de la Mancha">
    <div class="descripcion">
      <h2>Don Quijote de la Mancha</h2>
      <p>La célebre novela de Miguel de Cervantes que narra las aventuras del caballero loco Don Quijote y su fiel escudero Sancho en una mezcla de fantasía, sátira y realidad.</p>
    </div>
  </div>

  <div class="libro">
  <img src="{{ asset('imagenes/principito.jpeg') }}" alt="El Principito">
    <div class="descripcion">
      <h2>El Principito</h2>
      <p>Un cuento poético y filosófico que explora el amor, la soledad y la importancia de ver con el corazón. Un clásico que encanta tanto a niños como a adultos.</p>
    </div>
  </div>

</body>
</html>

@endsection
