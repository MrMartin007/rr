new Vue({
    el: '#crud',
    created: function() {
        this.getDatos();
    },
    data: {
        datos: [],
        pagination: {
            'total': 0,
            'current_page': 0,
            'per_page': 0,
            'last_page': 0,
            'from': 0,
            'to': 0
        },
        newMarca: '',
        newModelo: '',
        newAno: '',
        newClase: '',
        fillDato: {'id': '', 'marca': '', 'modelo': '', 'ano': '', 'clase': ''},
        errors: '',
        offset: 3,
    },
    computed: {
        isActived: function() {
            return this.pagination.current_page;
        },
        pagesNumber: function() {
            if(!this.pagination.to){
                return [];
            }

            var from = this.pagination.current_page - this.offset;
            if(from < 1){
                from = 1;
            }

            var to = from + (this.offset * 2);
            if(to >= this.pagination.last_page){
                to = this.pagination.last_page;
            }

            var pagesArray = [];
            while(from <= to){
                pagesArray.push(from);
                from++;
            }
            return pagesArray;
        }
    },
    methods: {
        getDatos: function(page) {
            var urlDatos = 'carros?page='+page;
            axios.get(urlDatos).then(response => {
                this.datos = response.data.carros.data,
                    this.pagination = response.data.pagination
            });
        },
        editDato: function(dato) {
            this.fillDato.id   = dato.id;
            this.fillDato.marca = dato.marca;
            this.fillDato.modelo = dato.modelo;
            this.fillDato.ano = dato.ano;
            this.fillDato.clase = dato.clase;
            $('#edit').modal('show');
        },
        updateDato: function(id) {
            var url = 'carros/' + id;
            axios.put(url, this.fillDato).then(response => {
                this.getDatos();
                this.fillDato = {'id': '', 'marca': '', 'modelo': '', 'ano': '', 'clase': ''};
                this.errors	  = [];
                $('#edit').modal('hide');
                toastr.success('Tarea actualizada con éxito');
            }).catch(error => {
                this.errors = 'Corrija para poder editar con éxito'
            });
        },
        deleteDato: function(dato) {
            var url = 'carros/' + dato.id + dato.marca + dato.modelo + dato.ano + dato.clase;
            axios.delete(url).then(response => { //eliminamos
                this.getDatos(); //listamos
                toastr.success('Eliminado correctamente'); //mensaje
            });
        },

        createDato: function() {
            var url = 'carros';
            axios.post(url, {
                marca: this.newMarca,
                modelo: this.newModelo,
                ano: this.newAno,
                clase: this.newClase,
            }).then(response => {
                this.getDatos();
                this.newMarca = '';
                this.newModelo = '';
                this.newAno = '';
                this.newClase = '';
                this.errors = [];
                $('#create').modal('hide');
                toastr.success('Nueva tarea creada con éxito');
            }).catch(error => {
                this.errors = 'Corrija para poder crear con éxito'
            });
        },
        changePage: function(page) {
            this.pagination.current_page = page;
            this.getDatos(page);
        }
    }
});
































