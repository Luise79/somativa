// Se os livros recomendados estiverem aparecendo mudar o estilo do campo recomendados
if (document.getElementById("recomendados").childElementCount > 1) {
    document.getElementById("changePage").style.display = "none";
    document.getElementById("recomendados").style.height = "300px";
    document.getElementById('novosRecomendados').style.display = "block";
    document.getElementById('apagarRecomendados').style.display = "block";
} 
