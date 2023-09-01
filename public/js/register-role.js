function enggak() {
    var openStore = document.getElementById('kode-token');
    
    openStore.removeAttribute('required');
}

function boleh() {
    var openStore = document.getElementById('kode-token');
    var able = document.createAttribute('required');

    openStore.setAttributeNode(able);
    document.getElementById("kode-token").value = "";
}

function onLoad(kelas, kelas2) {
    var group1 = document.getElementById('tokenDiv');
    group1.classList.remove(kelas);
    group1.classList.add(kelas2);
}