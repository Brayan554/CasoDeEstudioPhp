//Declarar  array Gobal que contendra la lista de Categorias

// var arrMovies = []
showMovies()

//Llamar funcion de j query accion del Botonb addElemnt 

$("#addElement").click(function (e) {

e.preventDefault()

let idMovie = $("#movie").val()
let nameMovie = $("#movie option:selected").text()

if (idMovie != '') {

	//Agregar Categoria Al Array 
	if (typeof existMovie(idMovie) === 'undefined') {

		arrMovies.push({

		'id' : idMovie,
		'name_movie' : nameMovie
	})
	}else{

		alert("La pelicula ya se encuentra seleccionada seleccione otra diferente")
	}

	showMovies()	
}else{

	alert("Debe Seleccionar Una Pelicula")
}
});


function existMovie(idMovie){

let existMovie = arrMovies.find(function (movie){
return movie.id == idMovie

})

return existMovie
}

function showMovies(){

	$("#list-movies").empty()
	arrMovies.forEach(function (movie) {
		$("#list-movies").append('<div class="form-group"><button onclick="removeElement('+movie.id+')" class="btn btn-danger">X</button><span>'+movie.name_movie+'</span></div>')
	})	
}

function removeElement(idMovie){

	let index = arrMovies.indexOf(existMovie(idMovie))
	arrMovies.splice(index, 1)
	showMovies()
}

//generar metodo de enviuo al back-end
$("#submit").click(function (e){

	e.preventDefault()

	let url = "?controller=rental&method=save"
	let params = {

		start_date_rentals:     $("#start_date_rentals").val(),
		end_date_rentals:   	$("#end_date_rentals").val(),
		total_rentals:  		$("#total_rentals").val(),
		id_user:          		$("#id_user").val(),		
		movies:           		arrMovies
	}

	//metodo post Usando ajax para enviar informacion al backend
	$.post(url,params, function(response){

		//respuestas del Request
		if (typeof response.error !== 'undefined') {
				alert(response.error)
		}else{
			alert("Insercion Satisfactoria")
			//Redireccion al metodo de Listar Alquiler 
			location.href ='?controller=rental'
		}

	},'json').fail(function (error) {

		alert("Insercion Fallida("+error+")")
	});
});

$("#update").click(function (e){

	e.preventDefault()

	let url = "?controller=rental&method=update"
	let params = {

		id:                     $("#id_rentals").val(),
		start_date_rentals:     $("#start_date_rentals").val(),
		end_date_rentals:   	$("#end_date_rentals").val(),
		total_rentals:  		$("#total_rentals").val(),
		id_user:          		$("#id_user").val(),
		id_status:     			$("#id_status").val(),		
		movies:           		arrMovies
	}

	//metodo post Usando ajax para enviar informacion al backend
	$.post(url,params, function(response){

		//respuestas del Request
		if (typeof response.error !== 'undefined') {
				alert(response.error)
		}else{
			alert("Actualizacion Satisfactoria")
			//Redireccion al metodo de Listar Alquiler 
			location.href ='?controller=rental'
		}

	},'json').fail(function (error) {

		alert("Actualizacion Fallida("+error+")")
	});
});


