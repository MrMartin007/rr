<form method="POST" v-on:submit.prevent="updateDato(fillDato.id)">
    <div class="modal fade" id="edit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                    <h4>Editar</h4>
                </div>
                <div class="modal-body">
                    <label for="marca">Actualizar Nombre</label>
                    <input type="text" name="marca" class="form-control" v-model="fillDato.marca">

                    <label for="modelo">Actualizar Addres</label>
                    <input type="text" name="modelo" class="form-control" v-model="fillDato.modelo">

                    <label for="ano">Actualizar Phone Number</label>
                    <input type="text" name="ano" class="form-control" v-model="fillDato.ano">

                    <label for="clase">Actualizar Phone Number</label>
                    <input type="text" name="clase" class="form-control" v-model="fillDato.clase">

                    <span v-for="error in errors" class="text-danger">@{{ error }}</span>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" value="Actualizar">
                </div>
            </div>
        </div>
    </div>
</form>
