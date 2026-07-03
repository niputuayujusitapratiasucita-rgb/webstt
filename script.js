/* ===================================================
   SISTEM INFORMASI PENDATAAN ANGGOTA STT WIDYATMIKA
   File : script.js
==================================================== */

document.addEventListener("DOMContentLoaded", function () {

    aktifkanMenu();

    inisialisasiFilter();

});


/* ==========================================
   MENU AKTIF
========================================== */

function aktifkanMenu(){

    const halaman = window.location.pathname.split("/").pop();

    document.querySelectorAll(".navbar .nav-link, .sidebar a").forEach(function(menu){

        let href = menu.getAttribute("href");

        if(href === halaman){

            menu.classList.add("active");

        }

    });

}


/* ==========================================
   KONFIRMASI
========================================== */

function konfirmasiHapus(){

    return confirm("Apakah Anda yakin ingin menghapus data anggota?");

}

function konfirmasiLogout(){

    return confirm("Apakah Anda yakin ingin logout?");

}


/* ==========================================
   VALIDASI FORM ANGGOTA
========================================== */

function validasiForm(){

    const nama=document.getElementById("nama");
    const alamat=document.getElementById("alamat");
    const nohp=document.getElementById("no_hp");

    if(nama && nama.value.trim()==""){

        alert("Nama anggota wajib diisi.");

        nama.focus();

        return false;

    }

    if(alamat && alamat.value.trim()==""){

        alert("Alamat wajib diisi.");

        alamat.focus();

        return false;

    }

    if(nohp && nohp.value.trim()==""){

        alert("Nomor HP wajib diisi.");

        nohp.focus();

        return false;

    }

    return true;

}


/* ==========================================
   VALIDASI LOGIN
========================================== */

function validasiLogin(){

    const username=document.getElementById("username");
    const password=document.getElementById("password");

    if(username && username.value.trim()==""){

        alert("Username harus diisi.");

        username.focus();

        return false;

    }

    if(password && password.value.trim()==""){

        alert("Password harus diisi.");

        password.focus();

        return false;

    }

    return true;

}


/* ==========================================
   TAMPIL PASSWORD
========================================== */

function tampilPassword(){

    const password=document.getElementById("password");

    if(password){

        password.type=password.type==="password" ? "text" : "password";

    }

}


/* ==========================================
   FILTER DATA
========================================== */

function inisialisasiFilter(){

    const search=document.getElementById("search");
    const filter=document.getElementById("filterTempekan");

    if(search){

        search.addEventListener("keyup",filterData);

    }

    if(filter){

        filter.addEventListener("change",filterData);

    }

}


function filterData(){

    const tabel=document.getElementById("tabelAnggota");

    if(!tabel){

        return;

    }

    const keyword=document.getElementById("search") ?
        document.getElementById("search").value.toLowerCase() : "";

    const tempekan=document.getElementById("filterTempekan") ?
        document.getElementById("filterTempekan").value : "Semua";

    const rows=tabel.querySelectorAll("tbody tr");

    rows.forEach(function(row){

        const nama=row.cells[1].textContent.toLowerCase();

        const tp=row.cells[2].textContent.trim();

        const cocokNama=nama.includes(keyword);

        const cocokTempekan=(tempekan==="Semua" || tp===tempekan);

        row.style.display=(cocokNama && cocokTempekan) ? "" : "none";

    });

}


/* ==========================================
   RESET FILTER
========================================== */

function resetFilter(){

    const search=document.getElementById("search");
    const filter=document.getElementById("filterTempekan");

    if(search){

        search.value="";

    }

    if(filter){

        filter.value="Semua";

    }

    filterData();

}


/* ==========================================
   PREVIEW FOTO
========================================== */

function previewGambar(input){

    if(!input.files || !input.files[0]){

        return;

    }

    const reader=new FileReader();

    reader.onload=function(e){

        const preview=document.getElementById("preview");

        if(preview){

            preview.src=e.target.result;

        }

    };

    reader.readAsDataURL(input.files[0]);

}


/* ==========================================
   SCROLL TO TOP
========================================== */

window.addEventListener("scroll",function(){

    const btn=document.getElementById("btnTop");

    if(!btn){

        return;

    }

    btn.style.display=window.scrollY>250 ? "block" : "none";

});


function kembaliKeAtas(){

    window.scrollTo({

        top:0,

        behavior:"smooth"

    });

}