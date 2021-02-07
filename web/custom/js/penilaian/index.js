

const _CARDSOAL = '.card-soal';
const _BLOKSOAL = '#blok-soal';
const _BUTTONFIRST= '#nav-first';

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