function lihat_password() {
    const btn = document.getElementById("btn");
    var x = document.getElementById("exampleInputPassword1");
    if (x.type === "password") {
      x.type = "text";
      btn.classList.toggle("fa-solid");
      btn.classList.toggle("fa-eye");
    } else {
      x.type = "password";
      btn.classList.toggle("fa-solid");
      btn.classList.toggle("fa-eye-slash");
    }
  }

  function lihat_password2() {
    const btn = document.getElementById("btn2");
    var x = document.getElementById("exampleInputPassword2");
    if (x.type === "password") {
      x.type = "text";
      btn.classList.toggle("fa-solid");
      btn.classList.toggle("fa-eye");
    } else {
      x.type = "password";
      btn.classList.toggle("fa-solid");
      btn.classList.toggle("fa-eye-slash");
    }
  }