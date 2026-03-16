<h1>TIN TRONG LOẠI {{ $idLT }} </h1><hr>
@php
    foreach($data as $tin) {
        echo "<div class='row'>";
        echo "<h3> <a href='/tin/{$tin->id}'>{$tin->tieuDe}</a> </h3>"; 
        echo "<p>{$tin->tomTat} </p>";
        echo "</div><hr>";
    }
@endphp