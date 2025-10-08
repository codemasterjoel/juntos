<div class="main-content">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div><h5 class="mb-0 text-uppercase text-info text-gradient">PACIENTES</h5></div>
                        <a href="#" class="btn bg-gradient-info btn-sm mb-0" type="button">+&nbsp; NUEVO PACIENTE</a>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-center font-weight-bolder">#</th>
                                    <th class="text-uppercase font-weight-bolder ps-2">NOMBRE</th>
                                    <th class="text-uppercase font-weight-bolder">parroquia</th>
                                    <th class="text-uppercase text-center font-weight-bolder">AVANCE</th>
                                    <th class="text-center text-uppercase font-weight-bolder">ESTATUS</th>
                                    <th class="text-center text-uppercase font-weight-bolder">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!is_null($pacientes))
                                    @foreach ($pacientes as $item)
                                        <tr>
                                            <td><p class=" text-center mb-0">{{ $loop->iteration }}</p></td>
                                            <td>{{$item->nombre}}</td>
                                            <td>{{$item->parroquia->nombre}}</td>
                                            <td class=" text-center">
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <span class="me-2 text-xs font-weight-bold">0%</span>
                                                    <div>
                                                        <div class="progress">
                                                        <div class="progress-bar bg-gradient-info" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center text-sm"><span class="badge {{ $item->is_active ? 'badge-sm bg-gradient-success' : 'badge-sm bg-gradient-danger' }}">{{ $item->is_active ? 'activo' : 'inactivo' }}</span></td>
                                            <td class="text-center align-items-center">
                                                <a href="javascript:;" class="text-success font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user"><span class="material-icons">edit</span></a>
                                                <a href="javascript:;" wire:click="asignarEspecialista('{{$item->id}}')" class="text-info font-weight-bold" data-bs-toggle="modal" data-bs-target="#AgregarDoctor"><span class="material-icons">person_add</span></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade z-999" id="AgregarDoctor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h3 class="modal-title fs-5 mt-4 text-2xl text-cyan-400 font-bold text-center text-white">ASIGNAR ESPECIALISTA</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3">
                            <label for="especialista">ESPECIALISTA</label>
                            <select wire:model="especialista" class="form-select" id="especialista" name="especialista">
                                <option selected>SELECCIONE</option>
                                    @foreach ($especialistas as $item)
                                        <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                                    @endforeach
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-danger btn-sm mb-0" wire:click.prevent="limpiarCampos()" data-bs-dismiss="modal">Salir</button>
                    <button type="submit" class="btn bg-gradient-info btn-sm mb-0" wire:click.prevent="guardar({{ $item->id }})">GUARDAR</button>
                </div>
            </div>
        </div>
    </div>
</div>
