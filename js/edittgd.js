function editTgd(data) {
    // console.log(data);
    let mgj = data[0];
    let nama = data[1];
    let ktg = data[2];
    let umk = data[3];
    document.getElementById("inputmgj").setAttribute("value", mgj);
    document.getElementById("inputmgjname").setAttribute("value", nama);
    document.getElementById("inputmgjktg").setAttribute("value", ktg);
    document.getElementById("umk").setAttribute("value", umk);
}
