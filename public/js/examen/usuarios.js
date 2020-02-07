var url ='http://localhost/DemoSari/public/apiexusuario';
 // var route = document.querySelector("[name=route]").value;
new Vue({
	el:'#nuevo',

	http:{
		headers:{
			'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
		}
	},
	data:{
		usuarios:[],
		user:'hola',
		nick:'',
		nombre:'',
		password:'',
		apellidos:'',
		editando:false,

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

		agregarUsuario:function(){
			var usuarios = {
				nick:this.nick,
				password:this.password,
				nombre:this.nombre,
				apellidos:this.apellidos,

			}
			this.$http.post('http://localhost/DemoSari/public/apiexusuario',usuarios)
			.then(function(json){
				alert('usuaio agregado con exito');
				this.getUsuarios();
				// console.log(json);
				this.editando=true;
			});
			
		},
		showUsuario:function(id){
			this.$http.get('http://localhost/DemoSari/public/apiexusuario/'+id)
			.then(function(json){
				this.nick=json.data.nick;
				this.nombre=json.data.nombre;
				this.apellidos=json.data.apellidos;
				this.password=json.data.password;
				this.editando=true;

			})	
		},

		eliminarUsuario:function(id){
			var resp=confirm("se eliminara el usuario")
			if (resp==true) {
				this.$http.delete('http://localhost/DemoSari/public/apiexusuario/'+id)
				.then(function(json){
					this.getUsuarios();
				})
			}
		},
		updateUsuario:function(id){
			// crear un json 
			var usua={nick:this.nick,
					  nombre:this.nombre,
					  apellidos:this.apellidos,
					password:this.password,}
		    console.log();

			this.$http.patch('http://localhost/DemoSari/public/apiexusuario/' + id,usua)
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