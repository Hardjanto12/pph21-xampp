// dvs
function dvsFunction() {
    popname = window.open(
        "../dvs/selectdvs",
        "Pilih Divisi",
        "status=1, height=600, width=600, toolbar=0,resizable=1"
    );
    popname.window.focus();
}
function popupCallbackdvs(dvsdata) {
    document.getElementById("inputdvs").setAttribute('value',dvsdata);
}


// jbt
function jbtFunction() {
    popname = window.open(
        "../jbt/selectjbt",
        "Pilih Jabatan",
        "status=1, height=600, width=600, toolbar=0,resizable=1"
    );
    popname.window.focus();
}
function popupCallbackjbt(jbtdata) {
    document.getElementById("inputjbt").setAttribute('value',jbtdata);
}

// asr
function asrFunction() {
    popname = window.open(
        "../asr/selectasr",
        "Pilih Asuransi",
        "status=1, height=600, width=600, toolbar=0,resizable=1"
    );
    popname.window.focus();
}
function popupCallbackasr(asrdata) {
    document.getElementById("inputasr").setAttribute('value',asrdata);
}

// ktg
function ktgFunction() {
    popname = window.open(
        "../ktg/selectktg",
        "Pilih Kategori Penghasilan",
        "status=1, height=600, width=600, toolbar=0,resizable=1"
    );
    popname.window.focus();
}
function popupCallbackktg(ktgdata) {
    document.getElementById("inputktg").setAttribute('value',ktgdata);
}

// ptkp
function ptkpFunction() {
    popname = window.open(
        "../ptkp/selectptkp",
        "Pilih PTKP",
        "status=1, height=600, width=600, toolbar=0,resizable=1"
    );
    popname.window.focus();
}
function popupCallbackptkp(ptkpdata) {
    document.getElementById("inputptkp").setAttribute('value',ptkpdata);
}

// cbg
function cbgFunction() {
    popname = window.open(
        "../cbg/selectcbg",
        "Pilih Kategori Penghasilan",
        "status=1, height=600, width=600, toolbar=0,resizable=1"
    );
    popname.window.focus();
}
function popupCallbackcbg(cbgdata) {
    document.getElementById("inputcbg").setAttribute('value',cbgdata);
}

// bpjs
function bpjsFunction() {
    popname = window.open(
        "../bpjs/selectbpjs",
        "Pilih Kategori Penghasilan",
        "status=1, height=600, width=600, toolbar=0,resizable=1"
    );
    popname.window.focus();
}
function popupCallbackbpjs(bpjsdata) {
    document.getElementById("inputbpjs").setAttribute('value',bpjsdata);
}

// kry
function kryFunction() {
    popname = window.open(
        "../kry/selectkry",
        "Pilih Kategori Karyawan",
        "status=1, height=600, width=600, toolbar=0,resizable=1"
    );
    popname.window.focus();
}
function popupCallbackkry(krydata) {
    let kry = krydata[0];
    let nik = krydata[1];
    let name = krydata[2];
    document.getElementById("inputkry").setAttribute('value',kry);
    document.getElementById("inputnikkry").setAttribute('value',nik);
    document.getElementById("inputnamekry").setAttribute('value',name);
}

// mgj
function mgjFunction() {
    popname = window.open(
        "../mgj/selectmgj",
        "Pilih Penghasilan",
        "status=1, height=600, width=600, toolbar=0,resizable=1"
    );
    popname.window.focus();
}
function popupCallbackmgj(mgjdata) {
    // alert(mgjdata)
    let mgj = mgjdata[0];
    let name = mgjdata[1];
    let ktg = mgjdata[2];
    document.getElementById("inputmgj").setAttribute('value',mgj);
    document.getElementById("inputmgjname").setAttribute('value',name);
    document.getElementById("inputmgjktg").setAttribute('value',ktg);
}
