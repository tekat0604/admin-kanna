function Angka(evt) {
	var charCode = (evt.which) ? evt.which : event.keyCode
	if (charCode > 31 && (charCode < 48 || charCode > 57))
 
	return false;
	return true;
}

function validasitelp(){
    pola_telp=/^[0-9]+$/;
    //cek telp
    if (!pola_telp.test(document.getElementById("telp").value)){
        document.getElementById("telp1").innerHTML = "Hanya inputkan angka";
        document.validasi_form.selesai.disabled=true;
    }
    else {
        document.getElementById("telp1").innerHTML = "";
        document.validasi_form.selesai.disabled=false;
    }
}

function validasiEkstensi(){
    var inputFile = document.getElementById('upload');
    var pathFile = inputFile.value;
    var ekstensiOk = /(\.jpg|\.jpeg|\.png|\.gif|\.svg|\.json)$/i;
    if(!ekstensiOk.exec(pathFile)){
		document.getElementById("upload1").innerHTML = "ekstensi file gambar tidak sesuai";
        inputFile.value = '';
        return false;
    }else{
        // Preview gambar
        if (inputFile.files && inputFile.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('targetLayer').innerHTML = '<img src="'+e.target.result+'" class="img-profile" width="100%"/>';
            };
            reader.readAsDataURL(inputFile.files[0]);
        }
    }
}
// function validasiEmail(){
//     let emailInput = document.getElementById("email2");
//     let emailMessage = document.getElementById("emailMessage"); 
//     let submitButton = document.getElementById("submitButton");

//     let pola_email = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

//     if (!pola_email.test(emailInput.value)) {
//         emailMessage.textContent = "Penulisan email tidak benar";
//         emailMessage.classList.add("text-danger");
//         emailMessage.classList.remove("text-success");
//         submitButton.disabled=true;
//     } else {
//         emailMessage.textContent = "Penulisan email sudah benar";
//         emailMessage.classList.add("text-success");
//         emailMessage.classList.remove("text-danger");
//         submitButton.disabled=false;
//     }
// }
function validatePassword() {
    let form = document.getElementById("passwordForm");
    let passwordInput = form.querySelector('input[name="password"]');
    let confirmPasswordInput = form.querySelector('input[name="confirmPassword"]');
    let passwordMessage = form.querySelector("#passwordMessage");
    let confirmMessage = form.querySelector("#confirmMessage");
    let submitButton = form.querySelector("#submitButton");

    let password = passwordInput.value;
    let confirmPassword = confirmPasswordInput.value;

    let minLength = /.{8,}/;
    let uppercase = /[A-Z]/;
    let lowercase = /[a-z]/;
    let number = /[0-9]/;
    let valid = true; // Mulai dengan asumsi valid

    // Validasi Password
    if (!minLength.test(password)) {
        passwordMessage.textContent = "Password harus minimal 8 karakter.";
        passwordMessage.classList.add("text-danger");
        passwordMessage.classList.remove("text-success");
        valid = false;
    } else if (!uppercase.test(password)) {
        passwordMessage.textContent = "Password harus mengandung huruf besar.";
        passwordMessage.classList.add("text-danger");
        passwordMessage.classList.remove("text-success");
        valid = false;
    } else if (!lowercase.test(password)) {
        passwordMessage.textContent = "Password harus mengandung huruf kecil.";
        passwordMessage.classList.add("text-danger");
        passwordMessage.classList.remove("text-success");
        valid = false;
    } else if (!number.test(password)) {
        passwordMessage.textContent = "Password harus mengandung angka.";
        passwordMessage.classList.add("text-danger");
        passwordMessage.classList.remove("text-success");
        valid = false;
    } else {
        passwordMessage.textContent = "Password sudah sesuai ketentuan.";
        passwordMessage.classList.remove("text-danger");
        passwordMessage.classList.add("text-success");
    }
    // Validasi Konfirmasi Password
    if (confirmPassword === "") {
        confirmMessage.textContent = "Konfirmasi password harus diisi";
        confirmMessage.classList.add("text-danger");
        confirmMessage.classList.remove("text-success");
        valid = false;
    } else if (confirmPassword !== password) {
        confirmMessage.textContent = "Konfirmasi password tidak cocok.";
        confirmMessage.classList.add("text-danger");
        confirmMessage.classList.remove("text-success");
        valid = false;
    } else {
        confirmMessage.textContent = "Konfirmasi password cocok.";
        confirmMessage.classList.remove("text-danger");
        confirmMessage.classList.add("text-success");
    }
    // Aktifkan atau nonaktifkan tombol submit berdasarkan hasil validasi
    if (submitButton) {
        submitButton.disabled = !valid;
    }
}

