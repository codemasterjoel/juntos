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
                                                <a href="" wire:click="verPaciente('{{$item->id}}')" class="text-success font-weight-bold text-xs" data-bs-toggle="modal" data-bs-target="#verPaciente" data-toggle="tooltip" data-original-title="Ver Paciente"><span class="material-icons">edit</span></a>
                                                {{-- <a href="javascript:;" wire:click="asignarEspecialista('{{$item->id}}')" class="text-info font-weight-bold" data-bs-toggle="modal" data-bs-target="#AgregarDoctor"><span class="material-icons">person_add</span></a> --}}
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

    @if (!is_null($paciente))
        <div wire:ignore.self class="modal fade z-999" id="verPaciente" tabindex="-1" aria-labelledby="verPaciente" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header bg-info">
                        <h3 class="modal-title fs-5 mt-4 text-2xl text-cyan-400 font-bold text-center text-white">DATOS DEL PACIENTE</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form wire:submit="save" action="#" method="POST" role="form text-left">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12 mx-auto mt-2">
                                        <h4 class="text-info text-gradient mb-2">DATOS BASICOS</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="row px-3">
                                <div class="col-xl-2 col-sm-12 mb-3">
                                    <label for="cedula">CÉDULA</label>
                                    <input value="{{ $paciente->cedula }}" type="number" class="form-control" disabled>
                                </div>
                                <div class="col-xl-4 col-sm-12 mb-3">
                                    <label for="nombre">NOMBRE Y APELLIDO</label>
                                    <input value="{{ $paciente->nombre }}" type="text" class="form-control" disabled>
                                </div>
                                <div class="col-xl-3 col-sm-12 mb-3">
                                    <label for="tlf_contacto">NÚMERO DE CONTACTO</label>
                                    <input value="{{ $paciente->tlf_contacto }}" type="number" class="form-control" disabled>
                                </div>
                                <div class="col-xl-3 col-sm-12 mb-3">
                                    <label for="tlf_emergencia">TELEFONO DE EMERGENCIA</label>
                                    <input value="{{ $paciente->tlf_emergencia }}" type="number" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="row px-3">
                                <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 mb-3">
                                    <label for="sexo">SEXO DE NACIMIENTO</label>
                                    <input value="{{ $paciente->sexo->nombre }}" type="text" class="form-control" disabled>
                                </div>
                                <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 mb-3">
                                    <label for="genero" >GÉNERO</label>
                                    <input value="{{ $paciente->genero->nombre }}" type="text" class="form-control" disabled>
                                </div>
                                <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 mb-3">
                                    <label for="fechaNac" >FECHA NACIMIENTO</label>
                                    <input value="{{ $paciente->fecha_nac }}" type="date" class="form-control" disabled>
                                </div>
                                <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 mb-3">
                                    <label for="edad">EDAD</label>
                                    <input value="{{ $paciente->edad }}" type="integer" name="edad" id="edad" class="form-control" disabled>
                                </div>
                            </div>
                            @if ($paciente->edad < 18) {{-- campo Edad --}}
                                <div class="row px-3">
                                    <div class="col-xl-4 col-sm-12 mb-3">
                                        <label for="cedula_representante">CÉDULA REPRESENTANTE</label>
                                        <div class="@error('cedula_representante') border border-danger rounded-3  @enderror">
                                            <input value="{{ $paciente->cedula_representante }}" type="number" class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-sm-12 mb-3">
                                        <label for="nombre_representante">NOMBRE Y APELLIDO REPRESENTANTE</label>
                                        <div class="@error('nombre_representante') border border-danger rounded-3  @enderror">
                                            <input value="{{ $paciente->nombre_representante }}" type="text" class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-sm-12 mb-3">
                                        <label for="tlf_representante">NÚMERO DE CONTACTO DEL REPRESENTANTE</label>
                                        <div class="@error('tlf_representante') border border-danger rounded-3  @enderror">
                                            <input value="{{ $paciente->tlf_representante }}" type="number" class="form-control" disabled>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12 mx-auto mt-2">
                                        <h4 class="text-info text-gradient mb-2">DATOS DE UBICACIÓN</h4>
                                    </div>
                                </div>
                            </div>
                            <!-- #region ESTADO-->
                            <div class="row px-3">
                                <div class="col-xl-3 col-sm-12 mb-3">
                                    <label for="pais">PAIS</label>
                                    <input type="text" class="form-control" value="{{ $paciente->pais->nombre }}" disabled>
                                </div>
                                <div class="col-xl-3 col-sm-12 mb-3">
                                    <label for="estado">ESTADO</label>
                                    <input type="text" class="form-control" value="{{ $paciente->estado->nombre }}" disabled>
                                </div>
                                <!-- #region MUNICIPIOS-->
                                <div class="col-xl-3 col-sm-12 mb-3">
                                    <label for="municipio">MUNICIPIO</label>
                                    <input type="text" class="form-control" value="{{ $paciente->municipio->nombre }}" disabled>
                                </div>
                                <!-- #region PARROQUIAS-->
                                <div class="col-xl-3 col-sm-12 mb-3">
                                    <label for="parroquia">PARROQUIA</label>
                                    <input type="text" class="form-control" value="{{ $paciente->parroquia->nombre }}" disabled>
                                </div>
                            </div>
                            <!-- #region COMUNAS-->
                            <div class="row px-3">
                                <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
                                    <label for="comuna" >COMUNA O CIRCUITO COMUNAL</label>
                                    <input type="text" class="form-control" value="{{ $paciente->comuna->nombre }}" disabled>
                                </div>
                                <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
                                    <label for="consejoComunal">CONSEJO COMUNAL</label>
                                    <input type="text" class="form-control" value="{{ $paciente->consejo_comunal->nombre }}" disabled>
                                </div>
                            </div>
                            <div class="row px-3">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3">
                                    <label for="direccion">DIRECCIÓN</label>
                                    <div class="@error('direccion') border border-danger rounded-3  @enderror">
                                        <input value="{{ $paciente->direccion }}" type="text" class="form-control" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12 mx-auto">
                                        <h4 class="text-info mb-2">OTROS DATOS</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="row px-3">
                                <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 mb-3">
                                    <label for="comoSeEntero" >¿COMO TE ENTERASTE DE SIEMPRE JUNTOS?</label>
                                    <input type="text" class="form-control" value="{{ $paciente->comoSeEntero }}" disabled>
                                </div>
                            </div>
                            <div class="row px-3">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3">
                                    <label for="modalidad">MODALIDAD EN QUE PUEDE RECIBIR LA ATENCIÓN</label>
                                    <div class="@error('modalidad') border border-danger rounded-3  @enderror">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="modalidad" id="inlineRadio1" {{ $paciente->modalidad == 1 ? 'checked' : '' }}>
                                            <label class="form-check-label" for="inlineRadio1">PRESENCIAL</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="modalidad" id="inlineRadio2" {{ $paciente->modalidad == 2 ? 'checked' : '' }}>
                                            <label class="form-check-label" for="inlineRadio2">ONLINE</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="modalidad" id="inlineRadio3" {{ $paciente->modalidad == 3 ? 'checked' : '' }}>
                                            <label class="form-check-label" for="inlineRadio3">AMBAS</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="modalidad" id="inlineRadio4" {{ $paciente->modalidad == 4 ? 'checked' : '' }}>
                                            <label class="form-check-label" for="inlineRadio4">PRESENCIAL EN GRUPO (VARIAS PERSONAS)</label>
                                        </div>
                                    </div>
                                </div>
                            </div>                            
                            <div class="row px-3">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3">
                                    <label for="motivo" >MOTIVO CONSULTA</label>
                                    <input type="text" class="form-control" value="{{ $paciente->motivo }}" disabled>
                                </div>
                            </div>
                            <div class="row px-3">
                                <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 mb-3">
                                    <label for="atencion_psicologica">¿HAS RECIBIDO ATENCIÓN PSICOLÓGICA O PSIQUIÁTRICA ANTERIORMENTE?</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="atencion_psicologica" id="inlineRadio1" {{ $paciente->atencion_psicologica == 1 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="inlineRadio1">SI</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="atencion_psicologica" id="inlineRadio2" {{ $paciente->atencion_psicologica == 0 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="inlineRadio2">NO</label>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 mb-3">
                                    <label for="trastorno_psicologico">¿HAS SIDO DIAGNOSTICADO(A) CON ALGUNA CONDICIÓN O TRASTORNO PSICOLÓGICO O PSIQUIÁTRICO?</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="trastorno_psicologico" id="inlineRadio1" {{ $paciente->trastorno_psicologico == 1 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="inlineRadio1">SI</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="trastorno_psicologico" id="inlineRadio2" {{ $paciente->trastorno_psicologico == 0 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="inlineRadio2">NO</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div>
                                        <div class="mb-4 d-flex justify-content-center">
                                            <img  id="selectedImage" src="{{ $paciente->file ? asset($paciente->file) : asset('assets/img/cedula.jpg') }}" style="width: 300px;" />
                                        </div>
                                    </div>
                                </div>
                            </div>  
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-gradient-danger btn-sm mb-0" wire:click.prevent="limpiarCampos()" data-bs-dismiss="modal">Salir</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
