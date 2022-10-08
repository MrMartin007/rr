@extends('app')


@section('content')


    <div id="crud" class="row">
        <div class="col-xs-12">
            <h1 class="page-header">Crud Customer Desarrollo Web</h1>
        </div>
        <div class="col-sm-12">
            <a href="#" class="btn btn-primary pull-right" data-toggle="modal" data-target="#create">
                Nueva tarea
            </a>
            <table class="table table-hover table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Ano</th>
                    <th>Clase</th>
                    <th colspan="2">
                        &nbsp;
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="dato in datos">
                    <td width="10px">@{{ dato.id }}</td>
                    <td>@{{ dato.marca }}</td>
                    <td>@{{ dato.modelo }}</td>
                    <td>@{{ dato.ano }}</td>
                    <td>@{{ dato.clase }}</td>
                    <td width="10px">
                        <a href="#" class="btn btn-warning btn-sm" v-on:click.prevent="editDato(dato)">Editar</a>
                    </td>
                    <td width="10px">
                        <a href="#" class="btn btn-danger btn-sm" v-on:click.prevent="deleteDato(dato)">Eliminar</a>
                    </td>
                </tr>
                </tbody>
            </table>

            <nav>
                <ul class="pagination">
                    <li v-if="pagination.current_page > 1">
                        <a href="#" @click.prevent="changePage(pagination.current_page - 1)">
                            <span>Atras</span>
                        </a>
                    </li>

                    <li v-for="page in pagesNumber" v-bind:class="[ page == isActived ? 'active' : '']">
                        <a href="#" @click.prevent="changePage(page)">
                            @{{ page }}
                        </a>
                    </li>

                    <li v-if="pagination.current_page < pagination.last_page">
                        <a href="#" @click.prevent="changePage(pagination.current_page + 1)">
                            <span>Siguiente</span>
                        </a>
                    </li>
                </ul>
            </nav>

            @include('create')
            @include('edit')
        </div>

    </div>

@endsection
