function updateLoginBox(signupurl, loginboxurl) {
    $.ajax({
        url: signupurl,
        error: function () { alert('Oops! Can\'t connect'); },
        success: function(msg) { location.reload();  }
    });
    //$("#loginbox").load(loginboxurl);
}