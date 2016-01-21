(function() {
  var linkDelete;

  $(function() {
    $('[name=typepopup]').change(function() {
      console.log($(this).val());
      if ($(this).val() === '2') {
        $('#imagebox').css('display', '');
        $('#youtubebox').css('display', 'none');
      } else if ($(this).val() === '1') {
        $('#imagebox').css('display', 'none');
        $('#youtubebox').css('display', '');
      }
    });
  });

  this.PopupCenter = function(url, title, w, h) {
    var dualScreenLeft, dualScreenTop, left, newWindow, top;
    dualScreenLeft = window.screenLeft !== void 0 ? window.screenLeft : screen.left;
    dualScreenTop = window.screenTop !== void 0 ? window.screenTop : screen.top;
    left = screen.width / 2 - (w / 2) + dualScreenLeft;
    top = screen.height / 2 - (h / 2) + dualScreenTop;
    newWindow = window.open(url, title, 'scrollbars=yes, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);
    if (window.focus) {
      newWindow.focus();
    }
  };

  this.uploadimage = function(type) {
    PopupCenter(linkUploadImage + '?type=' + type, 'title', '500', '600');
  };

  this.returnImageUpload = function(url, path) {
    $('#showImageTemp').html('<img src="' + url + '"><input value="' + path + '">');
  };

  this.alertMsg = function(title, body, status) {
    if (!title) {
      title = titleErrorAlert;
    }
    $('#myModalLabel').html(title);
    $('#bodyFullbox').html(body);
    $('#myModal').modal('show');
  };

  this.resetForm = function(myForm) {
    if (!myForm) {
      myForm = 'formSubmit';
    }
    return document.getElementById(myForm).reset();
  };

  linkDelete = void 0;

  this.deleteFn = function(link) {
    linkDelete = link;
    $('#closeFullbox .btnClose').css('display', 'none');
    $('#closeFullbox .btnDelete').css('display', '');
    $('#myModalLabel').html(titleErrorAlert);
    $('#bodyFullbox').html(msgConfirmDelete);
    $('#myModal').modal('show');
  };

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  this.ajaxDelete = function() {
    $.ajax({
      type: 'POST',
      url: linkDelete,
      cache: false,
      data: '&_method=delete',
      success: function(msg) {
        console.log(msg);
        if (msg === '1') {
          location.reload();
        }
      }
    });
  };

}).call(this);

//# sourceMappingURL=controldiv.js.map
