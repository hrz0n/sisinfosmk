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
  var subUrl = url;
  subUrl = subUrl.substring(0, (subUrl.indexOf("#") == -1) ? subUrl.length : subUrl.indexOf("#"));
  subUrl = subUrl.substring(0, (subUrl.indexOf("?") == -1) ? subUrl.length : subUrl.indexOf("?"));
  subUrl = subUrl.substr(subUrl.lastIndexOf("/") - 10);
  var oksubUrl = url.replace(subUrl,'/index.html');
 
  $('.pcoded-item li').each(function(){
   var href = $(this).find('a').attr('href');
   if(url == href || href == oksubUrl){
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



