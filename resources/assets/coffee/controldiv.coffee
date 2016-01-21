$ ->
  $('[name=typepopup]').change ->
    console.log $(this).val()
    if $(this).val() == '2'
      $('#imagebox').css 'display', ''
      $('#youtubebox').css 'display', 'none'
    else if $(this).val() == '1'
      $('#imagebox').css 'display', 'none'
      $('#youtubebox').css 'display', ''
    return
  return

@PopupCenter = (url, title, w, h) ->
  # Fixes dual-screen position                       Most browsers      Firefox
  dualScreenLeft = if window.screenLeft != undefined then window.screenLeft else screen.left
  dualScreenTop = if window.screenTop != undefined then window.screenTop else screen.top
  left = screen.width / 2 - (w / 2) + dualScreenLeft
  top = screen.height / 2 - (h / 2) + dualScreenTop
  newWindow = window.open(url, title, 'scrollbars=yes, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left)
  # Puts focus on the newWindow
  if window.focus
    newWindow.focus()
  return

@uploadimage = (type) ->
  PopupCenter linkUploadImage + '?type=' + type, 'title', '500', '600'
  return

@returnImageUpload = (url,path) ->
  $('#showImageTemp').html '<img src="' + url + '"><input value="' + path + '">'
  return

@alertMsg = (title, body, status) ->
  if !title
    title = titleErrorAlert
  $('#myModalLabel').html title
  $('#bodyFullbox').html body
  $('#myModal').modal 'show'
  return

@resetForm = (myForm) ->
  if !myForm
    myForm = 'formSubmit'
  document.getElementById(myForm).reset();

linkDelete = undefined

@deleteFn = (link) ->
  linkDelete = link
  $('#closeFullbox .btnClose').css 'display', 'none'
  $('#closeFullbox .btnDelete').css 'display', ''
  $('#myModalLabel').html titleErrorAlert
  $('#bodyFullbox').html msgConfirmDelete
  $('#myModal').modal 'show'
  return

$.ajaxSetup headers: 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

@ajaxDelete = ->
  $.ajax
    type: 'POST'
    url: linkDelete
    cache: false
    data: '&_method=delete'
    success: (msg) ->
      console.log msg
      if msg == '1'
        location.reload()
      return
  return