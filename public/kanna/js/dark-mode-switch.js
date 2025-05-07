if(localStorage.getItem('preferredTheme') == 'dark') {
  setDarkMode(true)
}

function setDarkMode(isDark) {
  var darkBtn = document.getElementById('darkBtn')
  var lightBtn = document.getElementById('lightBtn')
  if(isDark) {
    $('#boxid').removeAttr('checked');
  //tambahan localstorage
      localStorage.setItem('preferredTheme', 'dark');
  } else {
    $('#boxid').attr('checked', true);
  //tambahan localstorage
      localStorage.removeItem('preferredTheme');
  }

  document.body.classList.toggle("darkmode");

  if(isDark) {
      $(".dropdown-item, .collapse-item").toggleClass('dark-item');
      $(".form-control").toggleClass('form-dark');
      $(".icon-header").toggleClass('icon-header-dark');
      $(".icon-samping").toggleClass('icon-samping-dark');
      $(".table").toggleClass('text-white');
      $(".dropdown-item").toggleClass('dropdown-item-dark');
      $(".modal-content").toggleClass('bg-dark-2');
      //
      $(".navbar-light").removeClass('navbar-light').toggleClass('navbar-dark');
      $(".sidebar").removeClass('sidebar-light').toggleClass('sidebar-dark');
      $(".job").removeClass('job-list-light').toggleClass('job-list-dark');
      $(".line2").removeClass('line2').toggleClass('line-dark');
      $(".shadow").removeClass('shadow').toggleClass('shadow-dark');
      $(".bg-gray-100").removeClass('bg-gray-100').toggleClass('bg-dark-2');
      $(".table-striped").removeClass('table-striped').toggleClass('table-striped-dark');
      $(".table-produk").removeClass('table-produk').toggleClass('table-produk-dark');
      $(".form-top-table").removeClass('form-top-table').toggleClass('form-top-table-dark');
      $(".fill").removeClass('fill').toggleClass('fill-dark');
      $(".hr").removeClass('hr').toggleClass('hr-dark');
  } else {
      $(".dropdown-item, .collapse-item").removeClass('dark-item');
      $(".form-control").removeClass('form-dark');
      $(".icon-header").removeClass('icon-header-dark');
      $(".icon-samping").removeClass('icon-samping-dark');
      $(".table").removeClass('text-white');
      $(".dropdown-item").removeClass('dropdown-item-dark');
      $(".modal-content").removeClass('bg-dark-2');
      //
      $(".navbar-dark").removeClass('navbar-dark').toggleClass('navbar-light');
      $(".sidebar").removeClass('sidebar-dark').toggleClass('sidebar-light');
      $(".job").removeClass('job-list-dark').toggleClass('job-list-light');
      $(".line-dark").removeClass('line-dark').toggleClass('line2');
      $(".shadow-dark").removeClass('shadow-dark').toggleClass('shadow');
      $(".bg-dark-2").removeClass('bg-dark-2').toggleClass('bg-gray-100');
      $(".table-striped-dark").removeClass('table-striped-dark').toggleClass('table-striped');
      $(".table-produk-dark").removeClass('table-produk-dark').toggleClass('table-produk');
      $(".form-top-table-dark").removeClass('form-top-table-dark').toggleClass('form-top-table');
      $(".fill-dark").removeClass('fill-dark').toggleClass('fill');
      $(".hr-dark").removeClass('hr-dark').toggleClass('hr');
  }
}