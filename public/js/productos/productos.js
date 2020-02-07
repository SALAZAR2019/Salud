var ruta='http://localhost/DemoSari/public/apiProducto';
new Vue({
	el:'#producto',

	data:{
		nombre:'hola munod cruel',
		productos:[],
		buscar:''
	},

	created:function(){
		this.getProductos();
	},

	methods:{
		getProductos:function(){

			this.$http.get(ruta)
			.then(function(json){
				this.productos=json.data;
			}).catch(function(json){
				console.log(json);
			})
		},
	},
	//fin de metodos

	computed:{
	
		filtroProductos:function(){
			return this.productos.filter((producto)=>{
				return producto.sku.match(this.buscar.trim()) ||
				producto.nombre.toLowerCase().match(this.buscar.trim().toLowerCase());

			});
		}	
	}
	//fin de computed
});