new Vue({
    el:'#app',
    data: {
        url:"http://localhost:8080/Optica2020/",
        rut:"",
        recetas: [],
    },
    methods:{
        buscarRut: async function(){
            var recurso = "controllers/BuscarRecetaRut.php";
            var form = new FormData();
            form.append("rut", this.rut);
            try {
                const res = await fetch(this.url + recurso,{
                    method: "post",
                    body: form,
                });
                const data = await res.json();
                console.log(data);
                this.recetas = data;
            } catch (error) {
                console.log(error);
            }
        }
    },
    created(){}
});