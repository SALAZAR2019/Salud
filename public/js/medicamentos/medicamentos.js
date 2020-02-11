var	route= document.querySelector("[name=route]").value;
var ulrMedicamento = route + '/apimedi';
var urlas= ulrMedicamento +'/';

// var url ='http://localhost/Salud/public/apimedi';
// var urla ='http://localhost/Salud/public/apimedi/';
 // var route = document.querySelector("[name=route]").value;
new Vue({
	el:'#medicamentos',

	http:{
		headers:{
			'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
		}
	},
	data:{
		medicamentos:[],
		clave_medicamento:'hola',
		nombre:'',
		fecha_caducidad:'',
		tipo:'',
		editando:false,

	},

	created:function(){
		this.getMedicamentos();
	},

	methods:{
		getMedicamentos:function(){
			this.$http.get(ulrMedicamento)
			.then(function(json){
				this.medicamentos=json.data;
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
				this.$http.post(ulrMedicamento,medicina)
				.then(function(response){
					alert('nuevo medicamento');
					this.getMedicamentos();
					$('#add_medicamentos').modal('hide');
				});
		},
		showMedicamentos:function(id){
			this.$http.get(ulrMedicamento+'/'+id)
			.then(function(json){
				this.clave_medicamento=json.data.clave_medicamento;
				this.nombre=json.data.nombre;
				this.fecha_caducidad=json.data.fecha_caducidad;
				this.tipo=json.data.tipo;
				this.editando=true;
			})	
		},

		eliminarMedicamento:function(id){
			var resp=confirm("se eliminara el Medicamento")
			if (resp==true) {
				this.$http.delete(urlas+id)
				.then(function(json){
					this.getMedicamentos();
				})
			}
		},
		updateMedicamento:function(id){
			// crear un json 
			var usua={clave_medicamento:this.clave_medicamento,
					  nombre:this.nombre,
					  fecha_caducidad:this.fecha_caducidad,
						tipo:this.tipo,}
		    console.log();

			this.$http.patch(urlas+id,usua)
			.then(function(json){
				this.getMedicamentos();
				this.limpiar();
			})
		},
		limpiar:function(){
			this.clave_medicamento='';
			this.nombre='';
			this.fecha_caducidad='';
			this.tipo='';
			this.editando=false;
		},

	}

});