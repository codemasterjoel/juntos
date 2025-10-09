<div class="main-content">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div><h5 class="mb-0 text-uppercase text-info text-gradient">COMUNAS</h5></div>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#AgregarComuna" class="btn bg-gradient-info btn-sm mb-0" type="button">+&nbsp; NUEVA COMUNA</a>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-center font-weight-bolder">#</th>
                                    <th class="text-uppercase text-center font-weight-bolder">estado</th>
                                    <th class="text-uppercase text-center font-weight-bolder">municipio</th>
                                    <th class="text-uppercase text-center font-weight-bolder">parroquia</th>
                                    <th class="text-uppercase font-weight-bolder ps-2">NOMBRE</th>
                                    <th class="text-center text-uppercase font-weight-bolder">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($comunas as $item)
                                    <tr>
                                        <td><p class=" text-center mb-0">{{ $loop->iteration }}</p></td>
                                        <td>{{$item->parroquia->municipio->estado->nombre}}</td>
                                        <td>{{$item->parroquia->municipio->nombre}}</td>
                                        <td>{{$item->parroquia->nombre}}</td>
                                        <td>{{$item->nombre}}</td>
                                        <td class="text-center align-items-center">
                                            <a href="" wire:click.prevent="editar('{{ $item->id }}')" class="text-success font-weight-bold text-xs" data-bs-toggle="modal" data-bs-target="#AgregarComuna"><span class="material-icons">edit</span></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    {{$comunas->links()}}
                </div>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade z-999" id="AgregarComuna" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h3 class="modal-title fs-5 mt-4 text-2xl text-cyan-400 font-bold text-center text-white">AGREGAR COMUNA</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-xl-12 col-sm-12 mb-3">
                                <label for="estado">ESTADO</label>
                                <div class="@error('estado') border border-danger rounded-3 @enderror">
                                    <select class="form-select" aria-label="Default select example" wire:model.live="estado">
                                        <option selected>SELECCIONE</option>
                                        @foreach ($estados as $item)
                                            <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('estado') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                            <!-- #region MUNICIPIOS-->
                                @if (!is_null($municipios))
                                    <div class="col-xl-12 col-sm-12 mb-3">
                                        <label for="municipio">MUNICIPIO</label>
                                        <div class="@error('municipio') border border-danger rounded-3 @enderror">
                                            <select class="form-select" aria-label="Default select example" wire:model.live="municipio">
                                                <option selected>SELECCIONE</option>
                                                @foreach ($municipios as $item)
                                                    <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('municipio') <div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                @endif
                            <!-- #region PARROQUIAS-->
                                @if (!is_null($parroquias))
                                    <div class="col-xl-12 col-sm-12 mb-3">
                                        <label for="parroquia">PARROQUIA</label>
                                        <div class="@error('parroquia') border border-danger rounded-3 @enderror">
                                            <select class="form-select" aria-label="Default select example" wire:model.live="parroquia">
                                                <option selected>SELECCIONE</option>
                                                @foreach ($parroquias as $item)
                                                    <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('parroquia') <div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                @endif
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3">
                            <label for="especialista">NOMBRE</label>
                            <input wire:model="comunaNombre" type="text" class="form-control" id="comunaNombre" name="comunaNombre">
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