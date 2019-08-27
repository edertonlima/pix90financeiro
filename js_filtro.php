<script type="text/javascript">
// RELATÓRIOS

	// |--- data inical
	var tabela = $('#relatorio').DataTable( {
	    bLengthChange: false,
	    searching: true,
	    destroy: true,
	    info: false,

		"columns": [
						
			{ "data": "pg_data"},
			{ "data": "pg_descricao"},
			{ "data": "cd_id"},
			{ "data": "ct_id"},
			{ "data": "pg_valor"},
			{ "data": "pg_datapagamento"}			
		],

	    dom: 'Bfrtip',
	    buttons: [
	        'excelHtml5',
	        'csvHtml5',
	        'pdfHtml5',
	        {
	            extend: 'print',
	            text: 'IMPRIMIR',
	            autoPrint: true
	        }
	    ],
	    pageLength: 20,
	    language: {
	      sSearch: "Pesquisar:&nbsp;&nbsp;&nbsp;",
	      emptyTable: "Nenhum pagamento foi encontrado",
	      paginate: {
	        previous: "<i class='simple-icon-arrow-left'></i>",
	        next: "<i class='simple-icon-arrow-right'></i>"
	      }
	    },
	});



	// |--- filtro
	/*$(".filtro-status-pg").click(function(){
		if($('input',this).prop('checked') == false){ 
			//alert('false');
			
			$('#todos').removeClass('active').find('input').prop('checked', false).prop('disabled', false);
			//$('#vencidas input').prop('checked', false);
			//$('#pagas input').prop('checked', false);*
		}else{
			//alert('true');
			//$(this).addClass('active').find('input').prop('checked', true);
		}
	});*/



	// |--- filtro
	$("#filtro").click(function(){

		data1 = $('#data1').val();
		if(data1 != ''){
			parts = data1.split('/');
			data1 = parts[2]+'-'+parts[1]+'-'+parts[0];
		}else{
			data1 = false;
		}

		data2 = $('#data2').val();
		if(data2 != ''){
			parts = data2.split('/');
			data2 = parts[2]+'-'+parts[1]+'-'+parts[0];
		}else{
			data2 = false;
		}

		categoria = $('#filtro_categoria option:selected').val();
		//alert(categoria);

		cadastro = $('#filtro_cadastro option:selected').val();
		//alert(categoria);

		status = $('input[name=status]:checked').val();
		//alert(status);

		$.getJSON("db/filtro_relatorio.php", { 
			data1:data1,
			data2:data2,
			categoria:categoria,
			cadastro:cadastro,
			status:status
		}, function(result){
			//alert(result);
			console.log(JSON.stringify(result));

			data = JSON.parse(JSON.stringify(result));
			tabela.clear().draw();
			tabela.rows.add(data).draw();

		});

	});

</script>