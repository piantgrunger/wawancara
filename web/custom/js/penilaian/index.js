

const _CARDSOAL = '.card-soal';
const _BLOKSOAL = '#blok-soal';
const _BUTTONNAV = '.btn-navigation'
const _BUTTONFIRST= '#nav-first';
const _BUTTONELEMEN = '.btn-elemen';


$(_BUTTONELEMEN).click(function(o){
   
  target = o.currentTarget;
  var id_elemen=parseInt($(target).data('id'));
  compElemen =  $(_CARDSOAL + '[data-elemen=' + id_elemen + ']');

  // Ambil posisi dan jumlah soal
  var from = parseInt($(_BLOKSOAL).data('now'));
  var to = parseInt($(compElemen).data('no'));
  var max = parseInt($(_BLOKSOAL).data('max'));
  


  // Ubah tampilan
  if(from != to && to > 0 && to <= max) {
    $(_CARDSOAL + '[data-no=' + from + ']').addClass('d-none');
    $(_CARDSOAL + '[data-no=' + to + ']').removeClass('d-none');
    // Set variable
    $(_BLOKSOAL).data('now',to);
    // Enable all 2 button
  //  $(_NAVSOALPREV).removeClass('disabled');
  //  $(_NAVSOALNEXT).removeClass('disabled');
}
  


})


$(_BUTTONNAV).click(function(o) {

  // Auto mulai
  target = o.currentTarget;


  // Ambil posisi dan jumlah soal
  var from = parseInt($(_BLOKSOAL).data('now'));
  var to = parseInt($(target).data('destination'));
  var max = parseInt($(_BLOKSOAL).data('max'));
  

  

  // Ubah tampilan
  if(from != to && to > 0 && to <= max) {
      $(_CARDSOAL + '[data-no=' + from + ']').addClass('d-none');
      $(_CARDSOAL + '[data-no=' + to + ']').removeClass('d-none');
      // Set variable
      $(_BLOKSOAL).data('now',to);
      // Enable all 2 button
    //  $(_NAVSOALPREV).removeClass('disabled');
    //  $(_NAVSOALNEXT).removeClass('disabled');
  }

});


$(_BUTTONFIRST).click(function() {

    // Auto mulai

    // Ambil posisi dan jumlah soal
    var from = parseInt($(_BLOKSOAL).data('now'));
    var to = 1;
    var max = parseInt($(_BLOKSOAL).data('max'));
    

    // Ubah tampilan
    if(from != to && to > 0 && to < max) {
        $(_CARDSOAL + '[data-no=' + from + ']').addClass('d-none');
        $(_CARDSOAL + '[data-no=' + to + ']').removeClass('d-none');
        // Set variable
        $(_BLOKSOAL).data('now',to);
        // Enable all 2 button
      //  $(_NAVSOALPREV).removeClass('disabled');
      //  $(_NAVSOALNEXT).removeClass('disabled');
    }

});