function changeText(){
 var rezultat = 1;
 rezultat *= parseFloat(document.getElementById('cc-vysota').value);
 rezultat *= parseFloat(document.getElementById('cc-shirina').value); 
 document.getElementById('cc-area').innerHTML = rezultat;
}

$(document).ready(function(){ 

	$("a[href='#modal-zakaz']").click(function () {
		var dataform = $(this).data("form");
		var datatext = $(this).data("text");
		$(".modal-header h5").text(datatext);
		$(".modal-header [name=admin_data]").val(dataform);
	});

	$(".form-callback").submit(function() {
		var th = $(this);
		$.ajax({
			type: "POST",
			url: "mail.php", //Change
			data: th.serialize()
		}).done(function() {
			$(th).find('.success').addClass('active').css('display', 'flex').hide().fadeIn();
			setTimeout(function() {
				$(th).find('.success').removeClass('active').fadeOut();
				th.trigger("reset");
			}, 1000);
		});
		return false;
	});

});
