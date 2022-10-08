<form method="POST" v-on:submit.prevent="createDato">
    <div class="modal fade" id="create">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span>cerrar</span>
                    </button>

                </div>
                <div class="modal-body">
                    <label for="marca">Marca</label>
                    <input type="text" name="marca" class="form-control" v-model="newMarca">

                    <label for="modelo">Modelo</label>
                    <input type="text" name="modelo" class="form-control" v-model="newModelo">

                    <label for="ano">ano</label>
                    <input type="text" name="ano" class="form-control" v-model="newAno">

                    <label for="clase">Clase</label>
                    <input type="text" name="clase" class="form-control" v-model="newClase">

                    <span v-for="error in errors" class="text-danger">@{{ error }}</span>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" value="Guardar">
                </div>
            </div>
        </div>
    </div>
</form>
