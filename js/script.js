$(function(){
	
type="text/javascript">

	$(document).ready(function() {
		$.ajax({
			url: 'http://api.ipify.org/?format=json',
			dataType: 'json',
			success: function(resp){
				$("#ip").val(resp.ip)
			}
		})
	});


	$("#cep").focusout(function(){
		$.ajax({
			url: 'https://viacep.com.br/ws/'+$(this).val()+'/json/unicode/',
			dataType: 'json',
			success: function(resposta){
				$("#logradouro").val(resposta.logradouro)
				$("#complemento").val(resposta.complemento)
				$("#bairro").val(resposta.bairro)
				$("#cidade").val(resposta.localidade)
				$("#uf").val(resposta.uf)
				$("#numero").focus()
			}
		})
	})


	$('#formulario').submit(function(event){
		event.preventDefault()
			$.ajax({
				url:'./bd/insert.php',
				type:'post',
				data:$('#formulario').serialize(),
				beforeSend: function(){
					alert('Processando o pedido, aguarde...')
				},
				success: function(data){
					$('#formulario input').val('')
					alert('Pedido efetuado com sucesso!')
				},
				error: function(data){
					alert('Não foi possível realizar o pedido')
				}
			})
	})

	
	$('#formLogar').submit(function(event){
		event.preventDefault()
		$.ajax({
			url: '../bd/verificalogin.php',
			type:'post',
			data: $('#formLogar').serialize(),
			success: function(resposta){
				if (resposta) {
					location.href='./listar.php'
				}else{
					alert('Usuário ou senha incorretos!.')
					$('#formLogar input').val('')
					$('#formLogar textarea').val('')
				}         
			},
			error: function(resp){
				alert('Houve um erro ao enviar os dados ao servidor')
			}
		})
	})


	$('.visualizar').click(function(){
		event.preventDefault()
		var idVisualizacao = $(this).attr("id")
		//alert(`${id}`)
			$.ajax({
				url: '../bd/retornaDados.php',
				type: 'post',
				data: {idVisualizacao},
				dataType:'json',
				success: function(resposta){
					$('#id').html(resposta.id)
					$('#cep').html(resposta.cep)
					$('#estado').html(resposta.estado)
					$('#city').html(resposta.cidade)
					$('#bairro').html(resposta.bairro)
					$('#rua').html(resposta.logradouro)
					$('#compl').html(resposta.complemento)
					$('#numero').html(resposta.numero)
					$('#fone').html(resposta.telefone)
					$('#ip').html(resposta.ip)
					//document.getElementById('id').innerHTML = resposta.id => outra maneira de fazer
				}
			})
	})


	$('.abrirAtualizar').click(function(event){
		event.preventDefault()
		var idAtualizar = $(this).attr("id")
			$.ajax({
				url: '../bd/retornaDados.php',
				type: 'post',
				data: {idAtualizar},
				dataType: 'json',
				success: function(resposta){
					$('#idAtualizar').val(resposta)
				}
			})
	})


	$('#atualizar').click(function(event){
		event.preventDefault()
		var id = $('input[type=hidden]').attr("value")
		var situacao = $('input[type=radio][name=radio]:checked').attr("id")
		//var ids = $('input.id').attr("id")
		//alert(`${id}`)
		    $.ajax({
		    	url: '../bd/update.php',
				type: 'post',
		 	  	data: {id,situacao},
		 	  	success: function(){
			  		alert('atualizado com sucesso!')
		 	  		location.reload()
		 	  	},
		 	  	error: function(){
		 	  		alert('não foi possível atualizar')
		 	  	}
			})
	})


	$('.deletar').click(function(event){
		event.preventDefault()
		var id = $(this).attr("id")
			$.ajax({
				url: '../bd/delete.php',
				type: 'post',
				data: {id},
				success: function(resp){
					alert('apagado com sucesso!')
					location.reload()
				},
				error: function(resp){
					alert('não foi possível apagar')
				}
			})
	})


})