<div class="main-content">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div><h5 class="mb-0 text-uppercase text-info text-gradient">Como se entero</h5></div>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#AgregarEntero" class="btn bg-gradient-info btn-sm mb-0" type="button">+&nbsp; NUEVO REGISTRO</a>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-center font-weight-bolder">#</th>
                                    <th class="text-uppercase font-weight-bolder ps-2">NOMBRE</th>
                                    <th class="text-center text-uppercase font-weight-bolder">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($enteros as $item)
                                    <tr>
                                        <td><p class=" text-center mb-0">{{ $loop->iteration }}</p></td>
                                        <td>{{$item->nombre}}</td>
                                        <td class="text-center align-items-center">
                                            <a href="" wire:click.prevent="editar('{{ $item->id }}')" class="text-success font-weight-bold text-xs" data-bs-toggle="modal" data-bs-target="#AgregarEntero"><span class="material-icons">edit</span></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    {{$enteros->links()}}
                </div>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade z-999" id="AgregarEntero" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h3 class="modal-title fs-5 mt-4 text-2xl text-cyan-400 font-bold text-center text-white">AGREGAR REGISTRO</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3">
                            <label for="especialista">NOMBRE</label>
                            <input wire:model="enteroNombre" type="text" class="form-control" id="enteroNombre" name="enteroNombre">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-danger btn-sm mb-0" wire:click.prevent="limpiarCampos()" data-bs-dismiss="modal">Salir</button>
                    <button type="submit" class="btn bg-gradient-info btn-sm mb-0" wire:click.prevent="guardar()">GUARDAR</button>
                </div>
            </div>
        </div>
    </div>
</div>