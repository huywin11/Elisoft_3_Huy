$( document ).ready(function() {
    $('#btn-submit-form').click(function(){
        fullname = $('input[name ="fullname"]').val();
        username = $('input[name ="username"]').val();
        password = $('input[name ="password"]').val();
        repassword = $('input[name ="repassword"]').val();
        gender = $('input[name ="gender"]').val();
        avt = $('input[name ="avt"]').val();
        address = $('textarea[name ="address"]').val();
        if(fullname == '' || username == ''){
            alert('Vui lòng điển đủ thông tin');
            return false;
        };
        if(password == ''){
            alert('Vui lòng nhập mật khẩu');
            return false;
        };
        if(/(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*\W)/.test(password) == false)
        {
          alert('Vui lòng nhập đúng đúng bảo mật');
          return false;
        };
        if(repassword == ''){
            alert('Vui lòng nhập mật khẩu');
            return false;
        };
        if(repassword != password){
            alert('Mật khẩu không khớp nhau');
            return false;
        };
        if(gender == ''|| gender == null){
            alert('Chọn giới tính');
            return false;
        };

        //check img
            switch(avt.substring(avt.lastIndexOf('.') + 1).toLowerCase()){
                case 'gif': case 'jpg': case 'png':
                    break;
                default:
                    $(this).val('');
                    // error message here
                    alert("Vui lòng chọn hình ảnh dúng định dạng!");
                    return false;
                    break;

            }

        //check address min 10 character
        if(address.length < 10){
            alert("Địa chỉ dài hơn 10 kí tự");
            return false;
        }

        //check checked agree


        var genderMaleCheckbox = document.getElementById('agree');
        var isGenderMale = genderMaleCheckbox.checked;
        if( isGenderMale == false)
        {
          alert("tích vào ô Agree with on conditions")
          return false;
        }
        else return true;

        // if($('input[name ="agree"]').prop == 'false'){
        //     alert("Must agree with all the conditions");
        //     return false;
        // }
        // else{
        //     return true;
        // }
    });
});
