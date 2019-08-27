/* Dore Theme Select & Initializer Script 

Table of Contents

01. Css Loading Util
02. Theme Selector And Initializer
*/

/* 01. Css Loading Util */
function loadStyle(href, callback) {
  for (var i = 0; i < document.styleSheets.length; i++) {
	if (document.styleSheets[i].href == href) {
	  return;
	}
  }
  var head = document.getElementsByTagName("head")[0];
  var link = document.createElement("link");
  link.rel = "stylesheet";
  link.type = "text/css";
  link.href = href;
  if (callback) {
	link.onload = function () {
	  callback();
	};
  }
  var mainCss = $(head).find('[href$="main.css"]');
  if (mainCss.length !== 0) {
	mainCss[0].before(link);
  } else {
	head.appendChild(link);
  }
}

/* 02. Theme Selector, Layout Direction And Initializer */

(function ($) {
  if ($().dropzone) {
	Dropzone.autoDiscover = false;
  }

  var themeColorsDom =
	`<div class="theme-colors">
	  <div class="p-4">
		<p class="text-muted mb-2">Light Theme</p>
		<div class="d-flex flex-row justify-content-between mb-4">
		  <a href="#" data-theme="dore.light.blue.min.css" class="theme-color theme-color-blue"></a>
		  <a href="#" data-theme="dore.light.purple.min.css" class="theme-color theme-color-purple"></a>
		  <a href="#" data-theme="dore.light.green.min.css" class="theme-color theme-color-green"></a>
		  <a href="#" data-theme="dore.light.orange.min.css" class="theme-color theme-color-orange"></a>
		  <a href="#" data-theme="dore.light.red.min.css" class="theme-color theme-color-red"></a>
		</div>
		<p class="text-muted mb-2">Dark Theme</p>
		<div class="d-flex flex-row justify-content-between">
		  <a href="#" data-theme="dore.dark.blue.min.css" class="theme-color theme-color-blue"></a>
		  <a href="#" data-theme="dore.dark.purple.min.css" class="theme-color theme-color-purple"></a>
		  <a href="#" data-theme="dore.dark.green.min.css" class="theme-color theme-color-green"></a>
		  <a href="#" data-theme="dore.dark.orange.min.css" class="theme-color theme-color-orange"></a>
		  <a href="#" data-theme="dore.dark.red.min.css" class="theme-color theme-color-red"></a>
		</div>
	  </div>
	  <div class="p-4">
		<p class="text-muted mb-2">Border Radius</p>
		<div class="custom-control custom-radio custom-control-inline">
		  <input type="radio" id="roundedRadio" name="radiusRadio" class="custom-control-input radius-radio" data-radius="rounded">
		  <label class="custom-control-label" for="roundedRadio">Rounded</label>
		</div>
		<div class="custom-control custom-radio custom-control-inline">
		  <input type="radio" id="flatRadio" name="radiusRadio" class="custom-control-input radius-radio" data-radius="flat">
		  <label class="custom-control-label" for="flatRadio">Flat</label>
		</div>
	  </div>
	  <div class="p-4">
		<p class="text-muted mb-2">Direction</p>
		<div class="custom-control custom-radio custom-control-inline">
		  <input type="radio" id="ltrRadio" name="directionRadio" class="custom-control-input direction-radio" data-direction="ltr">
		  <label class="custom-control-label" for="ltrRadio">Ltr</label>
		</div>
		<div class="custom-control custom-radio custom-control-inline">
		  <input type="radio" id="rtlRadio" name="directionRadio" class="custom-control-input direction-radio" data-direction="rtl">
		  <label class="custom-control-label" for="rtlRadio">Rtl</label>
		</div>
	  </div>
	  <a href="#" class="theme-button"> <i class="simple-icon-magic-wand"></i> </a> 
	</div>`;

  $("body").append(themeColorsDom);


  /* Default Theme Color, Border Radius and  Direction */
  var theme = "dore.light.blue.min.css";
  var direction = "ltr";
  var radius = "rounded";

  if (typeof Storage !== "undefined") {
	if (localStorage.getItem("dore-theme")) {
	  theme = localStorage.getItem("dore-theme");
	} else {
	  localStorage.setItem("dore-theme", theme);
	}
	if (localStorage.getItem("dore-direction")) {
	  direction = localStorage.getItem("dore-direction");
	} else {
	  localStorage.setItem("dore-direction", direction);
	}
	if (localStorage.getItem("dore-radius")) {
	  radius = localStorage.getItem("dore-radius");
	} else {
	  localStorage.setItem("dore-radius", radius);
	}
  }

  $(".theme-color[data-theme='" + theme + "']").addClass("active");
  $(".direction-radio[data-direction='" + direction + "']").attr("checked", true);
  $(".radius-radio[data-radius='" + radius + "']").attr("checked", true);
  $("#switchDark").attr("checked", theme.indexOf("dark") > 0 ? true : false);

  loadStyle("css/" + theme, onStyleComplete);
  function onStyleComplete() {
	setTimeout(onStyleCompleteDelayed, 300);
  }

  function onStyleCompleteDelayed() {
	$("body").addClass(direction);
	$("html").attr("dir", direction);
	$("body").addClass(radius);
	$("body").dore();
  }

  $("body").on("click", ".theme-color", function (event) {
	event.preventDefault();
	var dataTheme = $(this).data("theme");
	if (typeof Storage !== "undefined") {
	  localStorage.setItem("dore-theme", dataTheme);
	  window.location.reload();
	}
  });

  $("input[name='directionRadio']").on("change", function (event) {
	var direction = $(event.currentTarget).data("direction");
	if (typeof Storage !== "undefined") {
	  localStorage.setItem("dore-direction", direction);
	  window.location.reload();
	}
  });

  $("input[name='radiusRadio']").on("change", function (event) {
	var radius = $(event.currentTarget).data("radius");
	if (typeof Storage !== "undefined") {
	  localStorage.setItem("dore-radius", radius);
	  window.location.reload();
	}
  });

  $("#switchDark").on("change", function (event) {
	var mode = $(event.currentTarget)[0].checked ? "dark" : "light";
	if (mode == "dark") {
	  theme = theme.replace("light", "dark");
	} else if (mode == "light") {
	  theme = theme.replace("dark", "light");
	}
	if (typeof Storage !== "undefined") {
	  localStorage.setItem("dore-theme", theme);
	  window.location.reload();
	}
  });

  $(".theme-button").on("click", function (event) {
	event.preventDefault();
	$(this)
	  .parents(".theme-colors")
	  .toggleClass("shown");
  });

  $(document).on("click", function (event) {
	if (
	  !(
		$(event.target)
		  .parents()
		  .hasClass("theme-colors") ||
		$(event.target)
		  .parents()
		  .hasClass("theme-button") ||
		$(event.target).hasClass("theme-button") ||
		$(event.target).hasClass("theme-colors")
	  )
	) {
	  if ($(".theme-colors").hasClass("shown")) {
		$(".theme-colors").removeClass("shown");
	  }
	}
  });
  
})(jQuery);

$('.theme-button').remove();





// PAGAMENTOS

	// |--- pagamento_novo 
		// marcar pagamento como pago quando é criado
		$('#pagamento-marcar-pago').click(function(){
			if($(this).hasClass('btn-success')){
				$(this).removeClass('btn-success');
				$('i',this).addClass('far text-muted').removeClass('fas');
				$('.txt',this).html('Marcar como pago');
				$('#marcar-pago').val(false);
			}else{
				$(this).addClass('btn-success');
				$('i',this).removeClass('far text-muted').addClass('fas');
				$('.txt',this).html('Remover pagamento');
				$('#marcar-pago').val(true);
			}
		});

		// envia dados para cadastrar novo pagamento
		$('#submit-form-pagamento-novo').click(function(){
			$('#form-pagamento-novo').submit();		
		});

		$('#form-pagamento-novo').validate({
    		submitHandler: function(form) {

				pg_descricao = $('#pg_descricao').val();
				pg_valor = $('#pg_valor').val();

				ct_id = $('#ct_id').val();
				cd_id = $('#cd_id').val();

				pg_data = $('#pg_data').val();
				if(pg_data != ''){
					parts = pg_data.split('/');
					pg_data = parts[2]+'-'+parts[1]+'-'+parts[0];
				}

				pg_observacao = $('#pg_observacao').val();

				pg_datapagamento = $('#marcar-pago').val();

				/*console.log({
					pg_descricao,
					pg_valor,
					pg_data,
					pg_observacao,
					pg_datapagamento,
					cd_id,
					ct_id
				});*/
				
				$.getJSON("db/pagamento_novo.php", { 
					pg_descricao:pg_descricao,
					pg_valor:pg_valor,
					pg_data:pg_data,
					pg_observacao:pg_observacao,
					pg_datapagamento:pg_datapagamento,
					cd_id:cd_id,
					ct_id:ct_id
				}, function(result){
					$('#form-pagamento').modal('hide');
					//alert(result);
					console.log(result);
					//alert(result);
					//url_cadastro = '<?php echo $home_url; ?>?&novopagamento=success';
					//alert(url_cadastro);
					//$(location).attr('href',url_cadastro);

					$.notify({
						// options
						title: 'Novo pagamento cadastrado com sucesso!',
						message: result
					},{
						// settings
						type: 'success',
						placement: {
							from: "bottom",
							align: "right"
						},
					});


					return false;
				});
    		}
    	});




	// |--- pagamento_status
	function pagamento_status(status,id,data){ //alert(status);

		var data_current = new Date().toJSON().slice(0,10).replace(/-/g,'-');
		//alert(data_current);

		$.getJSON("db/pagamento_status.php", { 
			pg_id:id,
			pg_data:data,
			pg_datapagamento:data_current,
			pg_status:status
		}, function(result){
			
			/*$('#editar_categoria').modal('hide');
			$('#form-categoria-editar').trigger("reset");

			$('#categoria-'+result.ct_id+' .fa-square').css('color',result.ct_color);
			$('#categoria-'+result.ct_id+' a').html(result.ct_nome).attr('data-nome',result.ct_nome).attr('data-cor',result.ct_color);*/

			//alert('ID: '+result.pg_id);
			//alert('STATUS: '+result.pg_status);
			//alert('DATA DE PAGAMENTO: '+result.pg_datapagamento);
			if(result.pg_status == 'pago'){
				ico_status = '<i class="fas fa-circle text-success"></i>';
				btn_onclick = 'pagamento_status(\'pago\','+result.pg_id+',\''+result.pg_data+'\')';
				txt_status = 'Pagamento efetuado em ';
				btn_class = 'fas fa-thumbs-up text-success';
				//btn_status = '<a class="btn" onclick="pagamento_status(pago,'+result.pg_id+','+result.pg_data+')"><i class="fas fa-lg fa-thumbs-up text-success"></i></a>';
				//alert('PAGO!');
			}else{
				if(result.pg_data < data_current){
					ico_status = '<i class="fas fa-circle text-danger"></i>';
					//alert('data passada');
				}else{
					if(result.pg_data == data_current){
						ico_status = '<i class="fas fa-circle text-warning"></i>';
						//alert('VENCE HOJE!');
					}else{
						ico_status = '<i class="fas fa-circle text-muted"></i>';
						//alert('NO PRAZO!');
					}
				}

				btn_class = 'far fa-thumbs-up text-muted';
				btn_onclick = 'pagamento_status(\'pendente\','+result.pg_id+',\''+result.pg_data+'\')';
				txt_status = 'Marcar como pago '
				//btn_status = '<a class="btn" onclick="pagamento_status(pendente,'+result.pg_id+','+result.pg_data+')"><i class="fas fa-lg fa-thumbs-up text-muted"></i></a>';
			}

			//alert(btn_onclick);
			$('#pagamento-'+result.pg_id+' .ico-status').html(ico_status);
			$('#pagamento-'+result.pg_id+' .btn-status a').attr('onclick',btn_onclick);
			$('#pagamento-'+result.pg_id+' .btn-status a i').removeClass('far fas text-muted text-success').addClass(btn_class);

			$('#detalhe-pagamento-'+result.pg_id+' .modal-title .ico-title').html(ico_status);
			$('#detalhe-pagamento-'+result.pg_id+' .status-pag-modal a').attr('onclick',btn_onclick);
			$('#detalhe-pagamento-'+result.pg_id+' .status-pag-modal a i').removeClass('far fas text-muted text-success').addClass(btn_class);
			$('#detalhe-pagamento-'+result.pg_id+' .status-pag-modal a .txt').html(txt_status);

			if(result.pg_status == 'pago'){
				$('#detalhe-pagamento-'+result.pg_id+' .status-pag-modal a .data').html(result.pg_datapagamento);
			}else{
				$('#detalhe-pagamento-'+result.pg_id+' .status-pag-modal a .data').html('');
			}

            $.notify({
                // options
                title: 'Status do pagamento alterado com sucesso!',
                message: ''

            },{
                // settings
                type: 'success',
                placement: {
                    from: "bottom",
                    align: "right"
                },
            });


			/*tabela_categoria
			.row.add( [
				'<td width="30"><i class="fas fa-square" style="font-size: 1.5rem; color: '+result.color+'"></i>',
				'<td class="align-middle"><a href="javascript:" class="editar_categoria" rel="'+result.id+'">'+result.titulo+'</a></td>'
			] )
			.draw( false );

			/*tabela_categoria
			.order( [ 1, 'asc' ] )
			.draw();*/

			return false;
		});

	}



	// |--- pagamento_excluir
	function pagamento_excluir(id){
		result = new Array();

		$.getJSON("db/pagamento_excluir.php", { 
			pg_id:id,
		}, function(result){
			
			$('#detalhe-pagamento-'+id).modal('hide');

			tabela_pagamento
			.row( $('#pagamento-'+result.pg_id) )
			.remove()
			.draw();

            $.notify({
                title: 'Pagamento excluido com sucesso!',
                message: ''

            },{
                type: 'success',
                placement: {
                    from: "bottom",
                    align: "right"
                },
            });

			return false;
		});
	}

	$("body").on("click", ".pagamento_excluir", function (event) {
		pagamento_excluir($(this).attr('rel'));
	});



	// |--- editar_pagamento
	function editar_pagamento(){

	}

	$("body").on("click", ".submit-form-pagamento-editar", function (event) {
		id = $(this).attr('rel');
		$('#form-pagamento-editar-'+id).submit(); 
	});

	$('.form-pagamento-editar').validate({
		submitHandler: function(form) {

			//id = $(this).attr('rel');


			pg_id = $('#form-pagamento-editar-'+id+' input[name="pg_id"]').val();
			pg_descricao = $('#form-pagamento-editar-'+id+' input[name="pg_descricao"]').val();
			pg_valor = $('#form-pagamento-editar-'+id+' input[name="pg_valor"]').val(); 

			ct_id = $('input[name="ct_id-'+id+'"]').val(); //alert(ct_id);
			cd_id = $('#form-pagamento-editar-'+id+' input[name="cd_id"]').val(); //alert(cd_id);

			pg_data = $('#form-pagamento-editar-'+id+' input[name="pg_data"]').val();
			if(pg_data != ''){
				parts = pg_data.split('/');
				pg_data = parts[2]+'-'+parts[1]+'-'+parts[0];
			}

			pg_categoria = $('#form-pagamento-editar-'+id+' input[name="pg_categoria"]').val(); //alert(pg_categoria);
			pg_observacao = $('#form-pagamento-editar-'+id+' input[name="pg_observacao"]').val(); //alert(pg_observacao);
		
				$.getJSON("db/pagamento_editar.php", { 
					pg_id:pg_id,
					pg_descricao:pg_descricao,
					pg_valor:pg_valor,
					pg_data:pg_data,
					pg_observacao:pg_observacao,
					cd_id:cd_id,
					ct_id:ct_id
				}, function(result){
					//alert(result);
					url_cadastro = '?&editarpagamento=success';
					//alert(url_cadastro);
					$(location).attr('href',url_cadastro);
					return false;
				});
		}
	});