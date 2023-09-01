function imgApp() {
    var optionValue = document.getElementById("kategori").value;

    if(optionValue == 'Line') {
        var inputId = document.getElementById('gambar');
        var labelId = document.getElementById('img-input');

        inputId.removeAttribute('required');
        labelId.classList.add('hidden');

        document.getElementById('nama').value = "LINE";
    } else {
        var labelId = document.getElementById('img-input');
        var inputId = document.getElementById('gambar');
        var reqAttr = document.createAttribute('required');

        inputId.setAttributeNode(reqAttr);
        labelId.classList.remove('hidden');
    }
}

function imgAppUpdate() {
    var optionValue = document.getElementById("kategori").value;

    if(optionValue == 'Line') {
        var labelId = document.getElementById('img-input');

        labelId.classList.add('hidden');

        // document.getElementById('nama').value = "LINE";
    } else {
        var labelId = document.getElementById('img-input');

        labelId.classList.remove('hidden');
    }
}