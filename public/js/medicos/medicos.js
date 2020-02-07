var url ='http://localhost/Salud/public/apimedico';
 // var route = document.querySelector("[name=route]").value;
new Vue({
	el:'#medicos',

	http:{
		headers:{
			'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
		}
	},
	data:{
		medicos:[],
		user:'hola',
		cedula:'',
		nombre:'',
		nivel_estudio:'',
		apellidop:'',
		apellidom:'',
		editando:false,
		buscar:''

	},

	created:function(){
		this.getMedicos();
		// this.getBuscar();
	},

	methods:{
		getMedicos:function(){
			this.$http.get(url)
			.then(function(json){
				this.medicos=json.data;
			});
		},

		// getBuscar:function(){
		// 	this.$http.get(url)
		// 	.then(function(json){
		// 		this.medicos=json.data;
		// 	});
		// },
		showModal:function(){
			$('#add_medicos').modal('show');
			this.limpiar();
		},

		agregarMedico:function()
		{
			// construir un objeto que necesitamos por el api
			var alumno={cedula:this.cedula,
				nombre:this.nombre,
				apellidop:this.apellidop,
				apellidom:this.apellidom,
				nivel_estudio:this.nivel_estudio}
				// limpiar campos
				this.cedula='';
				this.nombre='';
				this.apellidop='';
				this.apellidom='';
				this.nivel_estudio='';
				// para un metodo store se necesita un post
				this.$http.post('http://localhost/Salud/public/apimedico',alumno)
				.then(function(response){
					
					this.getMedicos();
					$('#add_medicos').modal('hide');
				});
		},

		// agregarMedico:function(){
		// 	var usuarios = {
		// 		cedula:this.cedula,
		// 		nombre:this.nombre,
		// 		apellidop:this.apellidop,
		// 		apellidom:this.apellidom,
		// 		nivel_estudio:this.nivel_estudio,


		// 	}
		// 		this.matricula='';
		// 		this.nombre='';
		// 		this.apellidop='';
		// 		this.apellidom='';
		// 		this.idcarrera='';
		// 	this.$http.post(url,usuarios)
		// 	.then(function(json){
		// 		alert('usuario agregado con exito');
		// 		this.getMedicos();
		// 		// console.log(json);
		// 		this.editando2=true;
		// 	});
			
		// },
		showMedicos:function(id){
			this.$http.get('http://localhost/Salud/public/apimedico/'+id)
			.then(function(json){
				this.cedula=json.data.cedula;
				this.nombre=json.data.nombre;
				this.apellidop=json.data.apellidop;
				this.apellidom=json.data.apellidom;
				this.nivel_estudio=json.data.nivel_estudio;
				this.editando=true;

			})	
		},

		eliminarMedico:function(id){
			var resp=confirm("se eliminara el Medico")
			if (resp==true) {
				this.$http.delete('http://localhost/Salud/public/apimedico/'+id)
				.then(function(json){
					this.getMedicos();
				})
			}
		},
		updateMedicos:function(id){
			// crear un json 
			var med={cedula:this.cedula,
					nombre:this.nombre,
					apellidop:this.apellidop,
					nivel_estudio:this.nivel_estudio,}
		    console.log();

			this.$http.patch('http://localhost/Salud/public/apimedico/'+ id,med)
			.then(function(json){
				this.getMedicos();
				this.limpiar();
			})
		},
		limpiar:function(){
			this.cedula='';
			this.nombre='';
			this.apellidom='';
			this.apellidop='';
			this.nivel_estudio='';
			this.editando=false;
		},

	},
	computed:{
	
		filtroMedicos:function(){
			return this.medicos.filter((med)=>{
				return med.nombre.match(this.buscar.trim()) ||
				med.apellidop.toLowerCase().match(this.buscar.trim().toLowerCase());

			});
		}	
	}



});