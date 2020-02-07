var urlprod='http://localhost/DemoSari/public/apiProducto';
var urlVenta='http://localhost/DemoSari/public/apiVentas';

function init()
{
new Vue({
		http:{
			headers:{
				'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
			}
		},


	el:'#ventas',

	created:function(){
		this.foliarVenta();
	},
	data:{
		nombre:'hola mundo',
		produtos:[],
		ventas:[],
		codigo:'',
		pago:0,
		tot:0,
		folio:'',
		//alamacenar un conjunto de cantidades
		cantidades:[1,1,1,1,1,1,1,1,1,1],

	},

	methods:{
		getProducto:function(){
			this.$http.get(urlprod + '/' + this.codigo)
			.then(function(json){
				var venta={'sku':json.data.sku,
				'nombre':json.data.nombre,
				'precio':json.data.precio,
				'cantidad':1,
				total:json.data.precio
				}

				if(venta.sku)
				this.ventas.push(venta);
				this.codigo='';
				this.$refs.buscar.focus();

			})
			// FIN DE METODO PRODUCTO
		},
		// 
		eliminarProducto:function(id){
			this.ventas.splice(id,1);
		},
		addProducto:function(id){
			this.ventas[id].cantidad++;
			this.ventas[id].total= this.ventas[id].cantidad * this.ventas[id].precio;
		},
		minusProducto:function(id){
			if(this.ventas[id].cantidad>=2)
			this.ventas[id].cantidad--;
			this.ventas[id].total= this.ventas[id].cantidad * this.ventas[id].precio;
		},
		foliarVenta:function(){
			this.folio='VTA-'+ moment().format('YYMMDDhmmss')
		},
		Venta:function(){
			var detalles2=[];

			for (var i = 0; i <this.ventas.length; i++) {
				detalles2.push({
					sku:this.ventas[i].sku,
					precio:this.ventas[i].precio,
					cantidad:this.cantidades[i],
					total:this.ventas[i].precio*this.cantidades[i]
				})
			}
			// console.log(detalles2);

			var unaVenta={
				folio:this.folio,
				id_vendedor:1,
				id_tienda:1,
				tipo:'EF',
				fecha_venta:this.fecha_venta,
				total:this.tot,
				detalles:detalles2,
			}
			console.log(unaVenta);

			this.$http.post(urlVenta,unaVenta)
			.then(function(json){
				console.log(json.data);
			}).catch(function(j){
				console.log(j.data);
			});
		}
	},

	// fin de metodos
	computed:{
		total:function(){
			var sum=0;
			for (var i = 0; i < this.ventas.length; i++) {
				sum=sum + (this.cantidades[i]*this.ventas[i].precio);
			}
			this.tot=sum;
			return sum;
		},
		cambio:function(){
			return this.pago - this.tot;
		},

		totalProd(){
			return(id)=>{
				var total=0;
				if(this.cantidades[id]!=null)
					total=this.cantidades[id]*this.ventas[id].precio
				//regresa el total con decimal
				return total.toFixed(1);
			}
		}
	}
});

}

window.onload=init;