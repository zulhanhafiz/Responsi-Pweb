// validasi.js
function validateForm() {
  const email = document.getElementById("email").value;
  const pass = document.getElementById("password").value;
  const konfirmasi = document.getElementById("konfirmasi").value;
  const checkbox = document.getElementById("persetujuan").checked;
  const errorMsg = document.getElementById("errorMsg");

  // Validasi email sederhana
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!emailRegex.test(email)) {
    errorMsg.textContent = "Format email tidak valid.";
    return false;
  }

  // Password minimal 6 karakter
  if (pass.length < 6) {
    errorMsg.textContent = "Password minimal 6 karakter.";
    return false;
  }

  // Konfirmasi password cocok
  if (pass !== konfirmasi) {
    errorMsg.textContent = "Konfirmasi password tidak cocok.";
    return false;
  }

  // Checkbox disetujui
  if (!checkbox) {
    errorMsg.textContent = "Anda harus menyetujui syarat & ketentuan.";
    return false;
  }

  errorMsg.textContent = ""; // Kosongkan pesan jika lolos
  return true;
}
