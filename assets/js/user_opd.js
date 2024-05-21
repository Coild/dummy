

$(document).ready(function () {

    $('.btn-block-user').click(function () {
        
        var id = $(this).attr('uid');
        var status = $(this).attr('ustatus');
        var email = $(this).attr('uemail');

       
        $('#user_id').val(id);
        $('#user_status').val(status);
        $('#user_email').val(email);
    })


    $('.btn-block-user').click(function () {
        
      // sweet alert
        const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
         })
  
        Toast.fire({
            icon: 'warning',
            title: 'User Telah Di Block'
        })

            })
    
            $('.btn-aktif-user').click(function () {
        
      // sweet alert
        const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
         })
  
        Toast.fire({
            icon: 'success',
            title: 'User Telah Aktif'
        })

            })

})


$(document).ready(function () {

    $('.btn-edit-user').click(function () {
        var id = $(this).attr('uid'); //get attribute value in variable
        var name = $(this).attr('uname'); //get attribute value in variable
        var email = $(this).attr('uemail'); //get attribute value in variable
        var jenis = $(this).attr('ujenis'); //get attribute value in variable
       
        $('#id').val(id); //pass attribute value in ID
        $('#name').val(name); //pass attribute value in ID
        $('#email').val(email); //pass attribute value in ID
        $('#Jenis').val(jenis); //pass attribute value in ID
        
    })

})

$(document).ready(function () {

    $('.btn-lupa-password').click(function () {
        var id = $(this).attr('uid'); //get attribute value in variable
        var pass = $(this).attr('upass'); //get attribute value in variable
       
       
        $('#id').val(id); //pass attribute value in ID
        $('#user_password').val(pass); //pass attribute value in ID
      
    })

})


