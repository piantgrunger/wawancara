

const _CARDSOAL = '.card-soal';
const _BLOKSOAL = '#blok-soal';
const _BUTTONNAV = '.btn-navigation'
const _BUTTONFIRST = '#nav-first';
const _BUTTONELEMEN = '.btn-elemen';
const _RADIOWAWANCARA = '.radio-wawancara';
const _BLOKNILAI = '#blok-nilai';
const _SISAWAKTU = '#blok-sisa-waktu';


$(_RADIOWAWANCARA).click(function (o) {
  target = o.currentTarget;
  var url = $(_BLOKNILAI).data('url');
  var indikator = $(target).data('indikator');
  var penilai = $(target).data('penilai');
  var peserta = $(target).data('peserta');
  var nilai = $(target).val();
  // Request
  var req = $.ajax({
    url: url
    , data: {
      indikator: indikator,
      penilai: penilai,
      peserta: peserta,
      nilai: nilai

    }
    , dataType: 'json'
    , type: 'post'
  });

  req.done(function (data) {
    $("#btn-" + indikator).removeClass('btn-secondary');
    $("#btn-" + indikator).addClass('btn-success');

  })






})


$(_BUTTONELEMEN).click(function (o) {

  target = o.currentTarget;
  var id_elemen = parseInt($(target).data('id'));
  compElemen = $(_CARDSOAL + '[data-elemen=' + id_elemen + ']');

  // Ambil posisi dan jumlah soal
  var from = parseInt($(_BLOKSOAL).data('now'));
  var to = parseInt($(compElemen).data('no'));
  var max = parseInt($(_BLOKSOAL).data('max'));



  // Ubah tampilan
  if (from != to && to > 0 && to <= max) {
    $(_CARDSOAL + '[data-no=' + from + ']').addClass('d-none');
    $(_CARDSOAL + '[data-no=' + to + ']').removeClass('d-none');
    // Set variable
    $(_BLOKSOAL).data('now', to);
    // Enable all 2 button
    //  $(_NAVSOALPREV).removeClass('disabled');
    //  $(_NAVSOALNEXT).removeClass('disabled');
  }



})


$(_BUTTONNAV).click(function (o) {

  // Auto mulai
  target = o.currentTarget;


  // Ambil posisi dan jumlah soal
  var from = parseInt($(_BLOKSOAL).data('now'));
  var to = parseInt($(target).data('destination'));
  var max = parseInt($(_BLOKSOAL).data('max'));




  // Ubah tampilan
  if (from != to && to > 0 && to <= max) {
    $(_CARDSOAL + '[data-no=' + from + ']').addClass('d-none');
    $(_CARDSOAL + '[data-no=' + to + ']').removeClass('d-none');
    // Set variable
    $(_BLOKSOAL).data('now', to);
    // Enable all 2 button
    //  $(_NAVSOALPREV).removeClass('disabled');
    //  $(_NAVSOALNEXT).removeClass('disabled');
  }

});


$(_BUTTONFIRST).click(function () {

  // Auto mulai

  var time_in_minutes = $(_SISAWAKTU).data('waktu');
  var current_time = Date.parse(new Date());
  var deadline = new Date(current_time + time_in_minutes * 60 * 1000);


  run_clock(_SISAWAKTU, deadline);
  $("#card-soal").removeClass('d-none');
  // Ambil posisi dan jumlah soal
  var from = parseInt($(_BLOKSOAL).data('now'));
  var to = 1;
  var max = parseInt($(_BLOKSOAL).data('max'));


  // Ubah tampilan
  if (from != to && to > 0 && to < max) {
    $(_CARDSOAL + '[data-no=' + from + ']').addClass('d-none');
    $(_CARDSOAL + '[data-no=' + to + ']').removeClass('d-none');
    // Set variable
    $(_BLOKSOAL).data('now', to);
    // Enable all 2 button
    //  $(_NAVSOALPREV).removeClass('disabled');
    //  $(_NAVSOALNEXT).removeClass('disabled');
  }

});

function updateTimer(waktu)
{
  var url = $(_SISAWAKTU).data('url');
  var peserta = $(_SISAWAKTU).data('peserta');
  var penilai = $(_SISAWAKTU).data('penilai');
    // Request
    var req = $.ajax({
      url: url
      , data: {
        penilai: penilai,
        peserta: peserta,
        waktu: waktu
  
      }
      , dataType: 'json'
      , type: 'post'
    });
  
    req.done(function (data) {
   
    })
  
}


function time_remaining(endtime) {
  var t = Date.parse(endtime) - Date.parse(new Date());
  var seconds = Math.floor((t / 1000) % 60);
  var minutes = Math.floor((t / 1000 / 60) % 60);
  var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
  var days = Math.floor(t / (1000 * 60 * 60 * 24));
  return { 'total': t, 'days': days, 'hours': hours, 'minutes': minutes, 'seconds': seconds };
}
function run_clock(id, endtime) {
  var clock = $(id)[0];
  function update_clock() {
    var t = time_remaining(endtime);
     
    clock.innerHTML = '<h4>Sisa waktu  <b>' +   t.minutes.toString().padStart(2, '0') + ' : ' +  t.seconds.toString().padStart(2, '0') + '</b></h4>';
    //if(t.total<=0){ clearInterval(timeinterval); }
    if((t.total /1000) % 60 == 0){
      updateTimer(t.minutes);
    }  
    if (t.total <= 0) {
      updateTimer(0);
      alert('Waktu habis.');
      clearInterval(timeinterval);
      location.href = 'index';
    }
  }
  update_clock();
  var timeinterval = setInterval(update_clock, 1000);
}

