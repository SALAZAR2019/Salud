var ruta='http://localhost/DemoSari/public/apiZona';
new Vue({
	el:'#zona',

	data:{
		nombre:'hola mundo cruel',
		zonas:[],
		buscar:''
	},

	created:function(){
		this.getZonas();
	},

	methods:{
		getZonas:function(){

			this.$http.get(ruta)
			.then(function(json){
				this.zonas=json.data;
			}).catch(function(json){
				console.log(json);
			})
		},
	},
	// fin de metodos

	computed:{

		filtroZonas:function(){
			return this.zonas.filter((zona)=>{
				return zona.nombre.match(this.buscar.trim()) ||
				zona.nombre.toLowerCase().match(this.buscar.trim().toLowerCase());
			});
		}
	}
});