$(document).ready(function() {
    $( "#item" ).autocomplete({
      serviceUrl: "load/auto-fill.php",   
      dataType: "JSON",          
      onSelect: function (suggestion) {
          $( "#item" ).val(suggestion.item);
          $( "#harga" ).val(suggestion.harga);
      }
    });
    $( "#pelanggan" ).autocomplete({
        serviceUrl: "load/auto-fill.php?act=pelanggan",   
        dataType: "JSON",          
        onSelect: function (suggestion) {
            $( "#pelanggan" ).val(suggestion.pelanggan);
        }
    });
})



		