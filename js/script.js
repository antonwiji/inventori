var keyword = document.getElementById("keyword");
var tombolCari = document.getElementById("tombol-cari");
var tabels = document.getElementById("tabels");

keyword.addEventListener('keyup', function(){
    

    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function (){
        if(xhr.readyState == 4 && xhr.status == 200){
            tabels.innerHTML = xhr.responseText;
        }
    }

    xhr.open('GET', 'ajax/barang.php?keyword=' + keyword.value, true);
    xhr.send();

})