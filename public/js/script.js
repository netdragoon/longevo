function ValidationCPF(cpf)
{
	cpf = cpf.replace(/[^\d]+/g,'');
	if(cpf == '') return false;
	if (cpf.length != 11 ||
		cpf == "00000000000" ||
		cpf == "11111111111" ||
		cpf == "22222222222" ||
		cpf == "33333333333" ||
		cpf == "44444444444" ||
		cpf == "55555555555" ||
		cpf == "66666666666" ||
		cpf == "77777777777" ||
		cpf == "88888888888" ||
		cpf == "99999999999")
		return false;
	add = 0;
	for (i=0; i < 9; i ++)
		add += parseInt(cpf.charAt(i)) * (10 - i);
	rev = 11 - (add % 11);
	if (rev == 10 || rev == 11)
		rev = 0;
	if (rev != parseInt(cpf.charAt(9)))
		return false;
	add = 0;
	for (i = 0; i < 10; i ++)
		add += parseInt(cpf.charAt(i)) * (11 - i);
	rev = 11 - (add % 11);
	if (rev == 10 || rev == 11)
		rev = 0;
	if (rev != parseInt(cpf.charAt(10)))
		return false;
	return true;
}
function ValidationCnpj(cnpj)
{
	cnpj = cnpj.replace(/[^\d]+/g,'');
	if(cnpj == '') return false;
	if (cnpj.length != 14)
		return false;
	if (cnpj == "00000000000000" ||
		cnpj == "11111111111111" ||
		cnpj == "22222222222222" ||
		cnpj == "33333333333333" ||
		cnpj == "44444444444444" ||
		cnpj == "55555555555555" ||
		cnpj == "66666666666666" ||
		cnpj == "77777777777777" ||
		cnpj == "88888888888888" ||
		cnpj == "99999999999999")
		return false;
	tamanho = cnpj.length - 2
	numeros = cnpj.substring(0,tamanho);
	digitos = cnpj.substring(tamanho);
	soma = 0;
	pos = tamanho - 7;
	for (i = tamanho; i >= 1; i--) {
		soma += numeros.charAt(tamanho - i) * pos--;
		if (pos < 2)
			pos = 9;
	}
	resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
	if (resultado != digitos.charAt(0))
		return false;

	tamanho = tamanho + 1;
	numeros = cnpj.substring(0,tamanho);
	soma = 0;
	pos = tamanho - 7;
	for (i = tamanho; i >= 1; i--) {
		soma += numeros.charAt(tamanho - i) * pos--;
		if (pos < 2)
			pos = 9;
	}
	resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
	if (resultado != digitos.charAt(1))
		return false;

	return true;
}
function ValidationCpfOrCnpj($value)
{
	if ($value.length == 11) return ValidationCPF($value);
	if ($value.length == 14) return ValidationCnpj($value);
	return false;
}
function getTimes(week){
	if (week === 0) return []; //domingo sunday		
	if (week === 6){
		return ['08:00',
				'08:15','08:30','08:45','09:00',
				'09:15','09:30','09:45','10:00',
				'10:15','10:30','10:45','11:00',
				'11:15','11:30','11:45','12:00',
				'12:15','12:30'];
	} else {
		return ['08:00',
				'08:15','08:30','08:45','09:00',
				'09:15','09:30','09:45','10:00',
				'10:15','10:30','10:45','11:00',
				'11:15','11:30','11:45','12:00',
				'12:15','12:30','12:45','13:00',
				'13:15','13:30','13:45','14:00',
				'14:15','14:30','14:45','15:00',
				'15:15','15:30','15:45','16:00',
				'16:15','16:30','16:45','17:00',
				'17:15','17:30','17:45'];
	}
}
function FindVerification() {
	if ($('#formBuscar #busca').val().length === 0){
		alert("Digite a pesquisa !!!");
		$('#formBuscar #busca').focus();
		return false;
	}
	return true;
}
function ClearInputTypeText(name) {
	console.log($(name + ' input[type="text"]'));
	$.each($(name + ' input[type="text"]'), function(index, value){
		$("#" + value.id).val('');
	});
}
function ValidationEmail(str) {
	var filter = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    return filter.test(str);
}
function ObjectBorderRed(name) {
	$(name).css('border', '1px solid red')
}
function ObjectBorderGray(name) {
	$(name).css('border', '1px solid #cbcbcb')
}
function ChangeStatusInput(name) {
	$(name).blur(function(){
		if ($(name).val() != null) {
			if ($(name).val().length > 0) {
				ObjectBorderGray('#' + $(name).attr('id'));
			} else {
				ObjectBorderRed('#' + $(name).attr('id'));
			}
		}
	});
}
// PLACEHOLDER
var placeholder = function(selector, value) 
{
	$(selector).focus(function()
	{
		if ($(this).val() == value) 
		{
			$(this).val('');
		}
	})
	.blur(function()
	{
		if ($(this).val().length == 0) 
		{
			$(this).val(value);
		}
	});
},

runScript = function() {

	//Estado Inicial dos Campos	
	$("#palavraBuscar").css("color","#686868").val("Buscar:");
	/*
	// PLACEHOLDER PESQUISA
	if ($('#formBuscar').length > 0) {
		placeholder($('#palavraBuscar'), 'Buscar:');
	}
	
	if ($('#FormContato').length > 0) {
		placeholder($('#nameContact'), 'Nome:(*)');
		placeholder($('#emailContact'), 'E-mail:(*)');
		placeholder($('#cityContact'), 'Cidade:(*)');
		placeholder($('#phoneContact'), 'Telefone:');
		placeholder($('#msgContact'), 'Digite sua mensagem aqui:(*)');
	}
	*/
	// SLIDER
	if ($('#runCycle').size() > 0) {
		$('#runCycle')
			.before('<div id="navSlider">')
			.cycle({
				fx:     'fade', 
				speed:  'fast', 
				timeout: 5000, // Velocidade da mudança de slide 5000 = 5s
				pager:  '#navSlider',
				slideExpr: 'img',
				after:	function() {
					var relClass = $(this).attr('rel');

					$('#runTitle').html($('.description.'+relClass).html()).css('display','block');
				}
			}
		);
	};
	
	// LightBox
	if ($("a[rel=group]").size() > 0){
		$("a[rel=group]").fancybox({
			'titlePosition'  : 'inside'
		});
	};
	
	if ($("a[rel=group1]").size() > 0){
		$("a[rel=group1]").fancybox({
			'titlePosition'  : 'inside'
		});
	};

	if ($("a[rel=group2]").size() > 0){
		$("a[rel=group2]").fancybox({
			'titlePosition'  : 'inside'
		});
	};

	if ($("a[rel=group3]").size() > 0){
		$("a[rel=group3]").fancybox({
			'titlePosition'  : 'inside'
		});
	};

	if ($("a[rel=group]").size() > 0){
		$("a[rel=group4]").fancybox({
			'titlePosition'  : 'inside'
		});
	};

	if ($("a[rel=group5]").size() > 0){
		$("a[rel=group5]").fancybox({
			'titlePosition'  : 'inside'
		});
	};
	
	$(".abas ul li a").click(function()
	{
		//Procura pelo botão selecionado anteriormente
		$(".abas ul li a").each(function()
		{
			$(this).attr("class","");			
		});
		
		//Seleciona o Item Clicado
		$(this).attr("class","selected");
		
		//Obtém o Id
		var link = '/agendamento/' + $(this).attr("id");	
			
		//Equanto a Página não for Totalmente Carregada
		$(".abas .tipoAgendamento2").ajaxStart(function ()
		{
			//Exibe o Carregamento
			$(this).html("</br></br></br></br><p align='center'>Carregando...<p>");	
		});

		$.post(link, {}, function(data){
			$(".tipoAgendamento .tipoAgendamento2").html(data);	
		}, 'html');
		return false;
	});
	
	//Obtém o Conteúdo do Primeiro Item Selecionado
	/*$(".abas ul li a[class=selected]").click();*/
	
	$(document).ready(function()
	{		
		$("#lista-erros span").live("click",function()
		{
			$(this).css("display","none");
			$("#resultProposta").css("display","none");		
		});

		$("#lista-sucesso span").live("click",function()
		{
			$(this).css("display","none");
			$("#resultProposta").css("display","none");		
		});
		
		/*Equipe*/ 	
		$(".empresa a").click(function()
		{		
			$(".empresa div").each(function()
			{
				$(this).css("display","none");			
			});
			
			var pos = $(this).attr("id");
			$(".triangles"+pos).css("display","block");
			$(".uparrowdiv"+pos).css("display","block");	
			return false;
		});
		
	});	
	
};

$(document).ready(runScript);