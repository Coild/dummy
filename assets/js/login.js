//function for se mati menyala mata...

function myFunction() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

// $(document).ready(function () {
//   $('.fa-solid.fa-eye').on('click', function () {
//     var passInput = $("#password");
//     if (passInput.attr('type') === 'password') {
//       passInput.attr('type', 'text');
//     } else {
//       passInput.attr('type', 'password');
//     }
//   })
// })