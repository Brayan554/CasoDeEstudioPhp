
// var arrCategories = []
showCategories()
//Llamar funcion de j query accion del Botonb addElemnt 

$("#addElement").click(function (e) {

e.preventDefault()



	let idCategory = $("#category").val()
	let nameCategory = $("#category option:selected").text()

	if (idCategory != '') {

		if (typeof existCategory(idCategory) === 'undefined'){

			arrCategories.push({

			'id' : idCategory,
			'name_movie' : nameCategory
		})

		}else{

			alert("La Categoria ya se encuentra seleccionada seleccione otra diferente")
		}

		showCategories()		
	}else{

		alert("debe Seleccionar una Categoria ")
	}

});


function existCategory(idCategory){

	let existCategory = arrCategories.find(function (category){
	return category.id == idCategory

	})
	return existCategory
}

function showCategories(){
	
	$("#list-Categories").empty()
	arrCategories.forEach(function (category) {

		$("#list-Categories").append('<div class="form-group"><button onclick="removeElement('+category.id+')" class="btn btn-danger">X</button><span>'+category.name_movie+'</span></div>')

	})
}

function removeElement(idCategory){

	let index = arrCategories.indexOf(existCategory(idCategory)) 
	arrCategories.splice(index, 1)
	showCategories()

}

//generar metodo de enviuo al back-end

$("#submit").click(function (e) {

e.preventDefault()

let url = "?controller=movie&method=save"
let params = {

	name :         $("#name_movie").val(),
	description:   $("#description_movie").val(),
	id_user:       $("#id_user").val(),
	categories:    arrCategories
}
	//metodo post Usando ajax para enviar informacion al backend
	$.post(url,params, function(response) {

		//respuestas del Request
			if (typeof response.error !== 'undefined') {
					alert(response.error)
			}else{
				alert("Insercion Satisfactoria")
				//Redireccion al metodo de listar peliculas
				location.href = '?controller=movie'
			}

	}, 'json').fail(function (error) {
		alert("Insercion Fallida("+error+")")

	});

});

$("#update").click(function (e) {

e.preventDefault()

let url = "?controller=movie&method=update"
let params = {

	id:            $("#id_movie").val(),   
	name :         $("#name_movie").val(),
	description:   $("#description_movie").val(),
	id_user:       $("#id_user").val(),
	id_status:     $("#id_status").val(),
	categories:    arrCategories
}
	//metodo post Usando ajax para enviar informacion al backend
	$.post(url,params, function(response) {

		//respuestas del Request
			if (typeof response.error !== 'undefined') {
					alert(response.error)
			}else{
				alert("Actualizacion Satisfactoria")
				//Redireccion al metodo de listar peliculas
				location.href = '?controller=movie'
			}

	}, 'json').fail(function (error) {
		alert("Actualizacion Fallida("+error+")")

	});

});