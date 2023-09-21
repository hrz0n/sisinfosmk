const notyf = new Notyf({
  duration: 5000,
  dismissible: true,
  position: {
    x: 'right',
    y: 'top',
  },
  types: [
    {
      type: 'success',
      duration: 5000,
      dismissible: true
    },
    {
      type: 'warning',
      duration: 5000,
      dismissible: true
    },
    {
      type: 'error',
      background: 'indianred',
      duration: 5000,
      dismissible: true
    }
  ]
});






$(document).ready(function(){


  var url = window.location.href;
  // url = url.substring(0, (url.indexOf("#") == -1) ? url.length : url.indexOf("#"));
  // url = url.substring(0, (url.indexOf("?") == -1) ? url.length : url.indexOf("?"));
  // url = url.substr(url.lastIndexOf("/") + 1);
  // url = url;
  // if(url == '/'){
  //   url = 'index';
  // }


  $('.pcoded-item li').each(function(){
   var href = $(this).find('a').attr('href');
   if(url == href){
      var parentClass = $(this).parent('ul').attr('class');
      var classMenu = parentClass.replace(/ .*/,'');
      if(classMenu == 'pcoded-submenu'){
        $(this).addClass('active');
        $(this).parents('.pcoded-hasmenu').addClass('pcoded-trigger');
      }else{
        $(this).addClass('active');
      }
   }
  });

  $('.select2').select2({
    theme: 'bootstrap-5',
    tags: "true",
    placeholder: 'Pilih item',
        selectOnClose: false,
        tokenSeparators: [',', ' '],
        separator: ";" ,
        // escapeMarkup: function (m) { return m; }
    });

});



