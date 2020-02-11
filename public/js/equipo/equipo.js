var	route= document.querySelector("[name=route]").value;
var ulrEquipo = route + '/apiequipo';
var urlEq= ulrEquipo +'/';


// var url ='http://localhost/Salud/public/apiequipo';
 // var route = document.querySelector("[name=route]").value;
new Vue({
	el:'#equipo',

	// http:{
	// 	headers:{
	// 		'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
	// 	}
	// },
	data:{
		equipo:[],
		user:'hola',
		nick:'',
		nombre:'',
		password:'',
		apellidos:'',
		editando:false,

	},

	created:function(){
		this.getEquipo();
	},

	methods:{
		getEquipo:function(){
			this.$http.get(ulrEquipo)
			.then(function(json){
				this.equipo=json.data;
			});
		},
		showModal:function(){
		$('#add_medicamentos').modal('show');
		this.limpiar();
		},

		agregarMedicamento:function()
		{
			// construir un objeto que necesitamos por el api
			var medicina={clave_medicamento:this.clave_medicamento,
				nombre:this.nombre,
				fecha_caducidad:this.fecha_caducidad,
				tipo:this.tipo,}
				// limpiar campos
				this.clave_medicamento='';
				this.nombre='';
				this.fecha_caducidad='';
				this.tipo='';
				// para un metodo store se necesita un post
				this.$http.post(ulrEquipo,medicina)
				.then(function(response){
					alert('nuevo medicamento');
					this.getMedicamentos();
					$('#add_medicamentos').modal('hide');
				});
		},
		// agregarUsuario:function(){
		// 	var usuarios = {
		// 		nick:this.nick,
		// 		password:this.password,
		// 		nombre:this.nombre,
		// 		apellidos:this.apellidos,

		// 	}
		// 	this.$http.post('http://localhost/DemoSari/public/apiexusuario',usuarios)
		// 	.then(function(json){
		// 		alert('usuaio agregado con exito');
		// 		this.getUsuarios();
		// 		// console.log(json);
		// 		this.editando=true;
		// 	});
			
		// },
		// showUsuario:function(id){
		// 	this.$http.get('http://localhost/DemoSari/public/apiexusuario/'+id)
		// 	.then(function(json){
		// 		this.nick=json.data.nick;
		// 		this.nombre=json.data.nombre;
		// 		this.apellidos=json.data.apellidos;
		// 		this.password=json.data.password;
		// 		this.editando=true;

		// 	})	
		// },

		// eliminarUsuario:function(id){
		// 	var resp=confirm("se eliminara el usuario")
		// 	if (resp==true) {
		// 		this.$http.delete('http://localhost/DemoSari/public/apiexusuario/'+id)
		// 		.then(function(json){
		// 			this.getUsuarios();
		// 		})
		// 	}
		// },
		// updateUsuario:function(id){
		// 	// crear un json 
		// 	var usua={nick:this.nick,
		// 			  nombre:this.nombre,
		// 			  apellidos:this.apellidos,
		// 			password:this.password,}
		//     console.log();

		// 	this.$http.patch('http://localhost/DemoSari/public/apiexusuario/' + id,usua)
		// 	.then(function(json){
		// 		this.getUsuarios();
		// 		this.limpiar();
		// 	})
		// },
		// limpiar:function(){
		// 	this.editando=false;
		// },

	}

});