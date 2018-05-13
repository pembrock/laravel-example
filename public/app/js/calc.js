////////////////////////////
// цена ////////////////////
var tsena_za_Kvadratnyy_santimetr = 50; //цена за 1кв см
var tsena_za_Zolocheniye_doski = 10; //цена за Золочение доски - 1кв см 
var tsena_za_Chekanka_pozoloty = 24; //цена за Чеканка позолоты - 1кв см 
var tsena_za_Raskraska_chekannykh_poley = 5; //цена за Раскраска чеканных полей - 1кв см 
var tsena_za_Razdelka_odezhd_zolotom = 8; //цена за Разделка одежд золотом - 1кв см 
var tsena_za_Dopolnitelnyy_obraz = 8; //цена за Дополнительный образ - 1кв см 
var tsena_za_Ornamentalnyye_polya = 15; //цена за Орнаментальные поля - 1кв см 
var tsena_za_Arka_tron = 20; //цена за Арка, трон - 1кв см 

var tsena_za_Kolichestvo_figur_v_kompozitsii = 25; //цена за дополнительную 1 фигуру в композиции
var tsena_za_Zhivopisnyy_fon = 8; //цена за дополнительный 10% живописный фон
var tsena_za_Predstoyashchiye_na_polyakh = 10; //цена за дополнительные 2 предстоящие на полях
var tsena_za_Kartush = 10; //цена за дополнительный 1 Картуш

var tsena_za_Kuryera = 150; //цена за Курьера в пределах МКАД

////////////////////////////////////
// сумма данной опции //////////////
var zolocheniye_doski = 0;
var chekanka_pozoloty = 0;
var raskraska_chekannykh_poley = 0;
var razdelka_odezhd_zolotom = 0;
var dopolnitelnyy_obraz = 0;
var ornamentalnyye_polya = 0;
var arka_tron = 0;
var kolichestvo_figur_v_kompozitsii = 0;
var zhivopisnyy_fon = 0;
var predstoyashchiye_na_polyakh = 0;
var kartush = 0;
var kuryer = 0;

////////////////////////////////////////////////////
// значение площади, высоты и ширины по умолчанию //
var area = 1;
var cc_vysota = 1;
var cc_shirina= 1;

function getPrice() // Итоговая цена
{
	var totalPrice = 0;
	totalPrice = area * (tsena_za_Kvadratnyy_santimetr + zolocheniye_doski + chekanka_pozoloty + raskraska_chekannykh_poley + razdelka_odezhd_zolotom + dopolnitelnyy_obraz + ornamentalnyye_polya + arka_tron + kolichestvo_figur_v_kompozitsii + zhivopisnyy_fon + predstoyashchiye_na_polyakh + kartush + kuryer);
	totalPrice = parseInt(totalPrice);
	if (totalPrice) {
		$('#price').html(Math.round(totalPrice)+' руб.');
	}else{
		$('#price').html('не полные данные для расчета суммы');
	}
}

$(function() { // Остальные функции

  $('#cc-vysota').change(function() { // вычисление площади при изменении высоты
    cc_vysota = parseInt( $( "#cc-vysota" ).val() );
    if (cc_vysota) {
	    if (cc_vysota > 1000) { // максимальное значение высоты
	      $('#cc-vysota').val('1000');
	    }
	    if (cc_vysota < 1) { // минимальное значение высоты
	      $('#cc-vysota').val('1');
	      cc_vysota = 1;
	    }    	
	    area = cc_vysota * cc_shirina; // вычисление площади
	    $('#cc-area').val(area);
	    getPrice();
		}
  });

  $('#cc-shirina').change(function() { // вычисление площади при изменении ширины
    cc_shirina = parseInt( $( "#cc-shirina" ).val() );
    if (cc_shirina) {
	    if (cc_shirina > 1000) { // максимальное значение ширины
	      $('#cc-shirina').val('1000');
	    }
	    if (cc_shirina < 1) { // минимальное значение ширины
	      $('#cc-shirina').val('1');
	      cc_vysota = 1;
	    }    
	    area = cc_vysota * cc_shirina; // вычисление площади
	    $('#cc-area').val(area);
	    getPrice();
		}	    
  });

	$("#zolocheniye-doski").change(function(){ // Золочение доски
	    if(this.checked){
	      zolocheniye_doski = tsena_za_Zolocheniye_doski;
	    }else{
				zolocheniye_doski = 0;
	    }
	    getPrice();
	});

	$("#chekanka-pozoloty").change(function(){ // Чеканка позолоты
	    if(this.checked){
	      chekanka_pozoloty = tsena_za_Chekanka_pozoloty;
	    }else{
				chekanka_pozoloty = 0;
	    }
	    getPrice();
	});

	$("#raskraska-chekannykh-poley").change(function(){ // Раскраска чеканных полей
	    if(this.checked){
	      raskraska_chekannykh_poley = tsena_za_Razdelka_odezhd_zolotom;
	    }else{
				raskraska_chekannykh_poley = 0;
	    }
	    getPrice();
	});

	$("#razdelka-odezhd-zolotom").change(function(){ // Разделка одежд золотом
	    if(this.checked){
	      razdelka_odezhd_zolotom = tsena_za_Razdelka_odezhd_zolotom;
	    }else{
				razdelka_odezhd_zolotom = 0;
	    }
	    getPrice();
	});

	$("#dopolnitelnyy-obraz").change(function(){ // Дополнительный образ
	    if(this.checked){
	      dopolnitelnyy_obraz = tsena_za_Dopolnitelnyy_obraz;
	    }else{
				dopolnitelnyy_obraz = 0;
	    }
	    getPrice();
	});

	$("#ornamentalnyye-polya").change(function(){ // Орнаментальные поля
	    if(this.checked){
	      ornamentalnyye_polya = tsena_za_Ornamentalnyye_polya;
	    }else{
				ornamentalnyye_polya = 0;
	    }
	    getPrice();
	});

	$("#arka-tron").change(function(){ // Арка, трон
	    if(this.checked){
	      arka_tron = tsena_za_Arka_tron;
	    }else{
				arka_tron = 0;
	    }
	    getPrice();
	});

	$("#figures").change(function(){ // Количество фигур в композиции
		// сдесь должен быть код расчета цены от выбранного варианта
		// формула: if (данная опция изменена) то kolichestvo_figur_v_kompozitsii = tsena_za_Kolichestvo_figur_v_kompozitsii * (выбранное количество); else kolichestvo_figur_v_kompozitsii = 0;
	});

	$("#background").change(function(){ // Живописный фон
		// сдесь должен быть код расчета цены от выбранного варианта
		// формула: if (данная опция изменена) то zhivopisnyy_fon = tsena_za_Zhivopisnyy_fon * (выбранное количество); else zhivopisnyy_fon = 0;
	});

	$("#margin").change(function(){ // Предстоящие на полях
		// сдесь должен быть код расчета цены от выбранного варианта
		// формула: if (данная опция изменена) то predstoyashchiye_na_polyakh = tsena_za_Predstoyashchiye_na_polyakh * (выбранное количество); else predstoyashchiye_na_polyakh = 0;
	});

	$("#cartouche").change(function(){ // Картуш
		// сдесь должен быть код расчета цены от выбранного варианта
		// формула: if (данная опция изменена) то kartush = tsena_za_Kartush * (выбранное количество); else kartush = 0;
	});

	$("").change(function(){ // Курьер
		// сдесь должен быть код расчета цены от выбранного варианта
		// формула: if (данная опция выбрана) то kuryer = tsena_za_Kuryera; else kuryer = 0;
	});

});