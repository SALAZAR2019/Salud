var url ='http://localhost/Salud/public/apiusu';
 // var route = document.querySelector("[name=route]").value;
new Vue({
	el:'#usuarios',

	http:{
		headers:{
			'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
		}
	},
	data:{
		usuarios:[],
		clave_usuario:'',
		id_rol:'1',
		nombre:'',
		apellidop:'',
		apellidom:'',
		contraseña:'',
		user:'',
		foto:'',
		editando:false,
		preview:'',
	},

	created:function(){
		this.getUsuarios();
	},

	methods:{
		getUsuarios:function(){
			this.$http.get(url)
			.then(function(json){
				this.usuarios=json.data;
			});
		},
		alSeleccionar(event){
			this.foto=event.target.files[0];
			// console.log(this.foto);
			this.preview = URL.createObjectURL(this.foto);
		},
		guardarUser:function(){
			var data = new FormData();
			data.append('clave_usuario',this.clave_usuario);
			data.append('id_rol',this.id_rol);
			data.append('nombre',this.nombre);
			data.append('apellidop',this.apellidop);
			data.append('apellidom',this.apellidom);
			data.append('user',this.user);
			data.append('contraseña',this.contraseña);
			data.append('foto',this.foto);

			var config={
				header:{'Contend-Type':'image/jpg'}
			}
				this.$http.post(url,data,config)
				.then(function(json){
					alert('usuario registrado');
				})
				.catch(function(json){
					console.log(json);
				})
			},
		

		// agregarUsuario:function(){
		// 	var usuarios = {
		// 		clave_usuario:this.clave_usuario,
		// 		id_rol:this.id_rol,
		// 		nombre:this.nombre,
		// 		apellidop:this.apellidop,
		// 		apellidom:this.apellidom,
		// 		contraseña:this.contraseña,
		// 		user:this.user

		// 	}
		// 	this.$http.post('http://localhost/Salud/public/apiusu',usuarios)
		// 	.then(function(json){
		// 		alert('usuaio agregado con exito');
		// 		this.getUsuarios();
		// 		// console.log(json);
		// 		// this.editando=true;
		// 	});
			
		// },
		showUsuario:function(id){
			this.$http.get('http://localhost/Salud/public/apiusu/'+id)
			.then(function(json){
				this.clave_usuario=json.data.clave_usuario;
				this.nombre=json.data.nombre;
				this.apellidop=json.data.apellidop;
				this.apellidom=json.data.apellidom;
				this.editando=true;

			})	
		},

		// eliminarUsuario:function(id){
		// 	var resp=confirm("se eliminara el usuario")
		// 	if (resp==true) {
		// 		this.$http.delete('http://localhost/DemoSari/public/apiexusuario/'+id)
		// 		.then(function(json){
		// 			this.getUsuarios();
		// 		})
		// 	}
		// },
		updateUsuario:function(id){
			// crear un json 
			var usua={clave_usuario:this.clave_usuario,
					  nombre:this.nombre,
					  apellidop:this.apellidop,
					apellidom:this.apellidom,}
		    console.log();

			this.$http.patch('http://localhost/Salud/public/apiusu/'+ id,usua)
			.then(function(json){
				this.getUsuarios();
				this.limpiar();
			})
		},
		limpiar:function(){
			this.editando=false;
		},

	}

});