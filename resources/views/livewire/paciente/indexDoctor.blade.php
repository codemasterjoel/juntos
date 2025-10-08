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
                        <div class="mt-4">
                            <figure class="highcharts-figure"><div id="luchador"></div></figure>
                            <!-- Menú de pestañas -->
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation"><button class="nav-link active" id="basico-tab" data-bs-toggle="tab" data-bs-target="#basico-tab-pane" type="button" role="tab">DATOS BASICOS</button></li>
                                <li class="nav-item" role="presentation"><button class="nav-link" id="ubicacion-tab" data-bs-toggle="tab" data-bs-target="#ubicacion-tab-pane" type="button" role="tab">DATOS DE UBICACION</button></li>
                                <li class="nav-item" role="presentation"><button class="nav-link" id="otros-tab" data-bs-toggle="tab" data-bs-target="#otros-tab-pane" type="button" role="tab">OTROS DATOS</button></li>
                                <li class="nav-item" role="presentation"><button class="nav-link" id="citas-tab" data-bs-toggle="tab" data-bs-target="#citas-tab-pane" type="button" role="tab">CITAS</button></li>
                            </ul>
                            <!-- Contenido de las pestañas -->
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="basico-tab-pane" role="tabpanel">
                                    <div class="row px-3">
                                        <div class="col-xl-2 col-sm-12 mb-3">
                                            <label for="cedula">CÉDULA:</label><br>
                                            <span for="cedula">{{ $paciente->cedula }}</span>
                                            {{-- <input value="{{ $paciente->cedula }}" type="number" class="form-control" disabled> --}}
                                        </div>
                                        <div class="col-xl-4 col-sm-12 mb-3">
                                            <label for="nombre">NOMBRE Y APELLIDO</label><br>
                                            <span for="nombre">{{ $paciente->nombre }}</span>
                                            {{-- <input value="{{ $paciente->nombre }}" type="text" class="form-control" disabled> --}}
                                        </div>
                                        <div class="col-xl-3 col-sm-12 mb-3">
                                            <label for="tlf_contacto">NÚMERO DE CONTACTO</label><br>
                                            <span for="tlf_contacto">{{ $paciente->tlf_contacto }}</span>
                                            {{-- <input value="{{ $paciente->tlf_contacto }}" type="number" class="form-control" disabled> --}}
                                        </div>
                                        <div class="col-xl-3 col-sm-12 mb-3">
                                            <label for="tlf_emergencia">TELEFONO DE EMERGENCIA</label><br>
                                            <span for="tlf_emergencia">{{ $paciente->tlf_emergencia }}</span>
                                            {{-- <input value="{{ $paciente->tlf_emergencia }}" type="number" class="form-control" disabled> --}}
                                        </div>
                                    </div>
                                    <div class="row px-3">
                                        <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 mb-3">
                                            <label for="sexo">SEXO DE NACIMIENTO</label><br>
                                            <span for="sexo">{{ $paciente->sexo->nombre }}</span>
                                            {{-- <input value="{{ $paciente->sexo->nombre }}" type="text" class="form-control" disabled> --}}
                                        </div>
                                        <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 mb-3">
                                            <label for="genero">GÉNERO</label><br>
                                            <span for="genero">{{ $paciente->genero->nombre }}</span>
                                        </div>
                                        <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 mb-3">
                                            <label for="fechaNac">FECHA NACIMIENTO</label><br>
                                            <span for="fechaNac">{{ $paciente->fecha_nac }}</span>
                                        </div>
                                        <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 mb-3">
                                            <label for="edad">EDAD</label><br>
                                            <span for="edad">{{ $paciente->edad }}</span>
                                        </div>
                                    </div>
                                    @if ($paciente->edad < 18) {{-- campo Edad --}}
                                        <div class="row px-3">
                                            <div class="col-xl-4 col-sm-12 mb-3">
                                                <label for="cedula_representante">CÉDULA REPRESENTANTE</label><br>
                                                <span for="cedula_representante">{{ $paciente->cedula_representante }}</span>
                                                {{-- <input value="{{ $paciente->cedula_representante }}" type="number" class="form-control" disabled> --}}
                                            </div>
                                            <div class="col-xl-4 col-sm-12 mb-3">
                                                <label for="nombre_representante">NOMBRE Y APELLIDO REPRESENTANTE</label><br>
                                                <span for="nombre_representante">{{ $paciente->nombre_representante }}</span>
                                                {{-- <input value="{{ $paciente->nombre_representante }}" type="text" class="form-control" disabled> --}}
                                            </div>
                                            <div class="col-xl-4 col-sm-12 mb-3">
                                                <label for="tlf_representante">NÚMERO DE CONTACTO DEL REPRESENTANTE</label><br>
                                                <span for="tlf_representante">{{ $paciente->tlf_representante }}</span>
                                                {{-- <input value="{{ $paciente->tlf_representante }}" type="number" class="form-control" disabled> --}}
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="tab-pane fade" id="ubicacion-tab-pane" role="tabpanel">
                                    <div class="row px-3">
                                        <div class="col-xl-3 col-sm-12 mb-3">
                                            <label for="pais">PAIS</label><br>
                                            <span for="pais">{{ $paciente->pais->nombre }}</span>
                                            {{-- <input type="text" class="form-control" value="{{ $paciente->pais->nombre }}" disabled> --}}
                                        </div>
                                        <div class="col-xl-3 col-sm-12 mb-3">
                                            <label for="estado">ESTADO</label><br>
                                            <span for="estado">{{ $paciente->estado->nombre }}</span>
                                            {{-- <input type="text" class="form-control" value="{{ $paciente->estado->nombre }}" disabled> --}}
                                        </div>
                                        <!-- #region MUNICIPIOS-->
                                        <div class="col-xl-3 col-sm-12 mb-3">
                                            <label for="municipio">MUNICIPIO</label><br>
                                            <span for="municipio">{{ $paciente->municipio->nombre }}</span>
                                            {{-- <input type="text" class="form-control" value="{{ $paciente->municipio->nombre }}" disabled> --}}
                                        </div>
                                        <!-- #region PARROQUIAS-->
                                        <div class="col-xl-3 col-sm-12 mb-3">
                                            <label for="parroquia">PARROQUIA</label><br>
                                            <span for="parroquia">{{ $paciente->parroquia->nombre }}</span>
                                            {{-- <input type="text" class="form-control" value="{{ $paciente->parroquia->nombre }}" disabled> --}}
                                        </div>
                                    </div>
                                    <div class="row px-3">
                                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
                                            <label for="comuna" >COMUNA O CIRCUITO COMUNAL</label><br>
                                            <span for="comuna">{{ $paciente->comuna->nombre }}</span>
                                            {{-- <input type="text" class="form-control" value="{{ $paciente->comuna->nombre }}" disabled> --}}
                                        </div>
                                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
                                            <label for="consejoComunal">CONSEJO COMUNAL</label><br>
                                            <span for="consejoComunal">{{ $paciente->consejo_comunal->nombre }}</span>
                                            {{-- <input type="text" class="form-control" value="{{ $paciente->consejo_comunal->nombre }}" disabled> --}}
                                        </div>
                                    </div>
                                    <div class="row px-3">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3">
                                            <label for="direccion">DIRECCIÓN</label>
                                            <span for="direccion">{{ $paciente->direccion }}</span>
                                            {{-- <input value="{{ $paciente->direccion }}" type="text" class="form-control" disabled> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="otros-tab-pane" role="tabpanel">
                                    <div class="row px-3">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3">
                                            <label for="comoSeEntero" >¿COMO TE ENTERASTE DE SIEMPRE JUNTOS?</label><br>
                                            <span for="comoSeEntero">{{ $paciente->entero->nombre }}</span>
                                            {{-- <input type="text" class="form-control" value="{{ $paciente->entero->nombre }}" disabled> --}}
                                        </div>
                                    </div>
                                    <div class="row px-3">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3">
                                            <label for="modalidad">MODALIDAD EN QUE PUEDE RECIBIR LA ATENCIÓN</label>
                                            <div class="@error('modalidad') border border-danger rounded-3  @enderror">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="modalidad" id="inlineRadio1" {{ $paciente->modalidad_id == 1 ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="inlineRadio1">PRESENCIAL</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="modalidad" id="inlineRadio2" {{ $paciente->modalidad_id == 2 ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="inlineRadio2">ONLINE</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="modalidad" id="inlineRadio3" {{ $paciente->modalidad_id == 3 ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="inlineRadio3">AMBAS</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="modalidad" id="inlineRadio4" {{ $paciente->modalidad_id == 4 ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="inlineRadio4">PRESENCIAL EN GRUPO (VARIAS PERSONAS)</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                            
                                    <div class="row px-3">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3">
                                            <label for="motivo" >MOTIVO CONSULTA</label><br>
                                            <span for="motivo">{{ $paciente->motivo->nombre }}</span>
                                            {{-- <input type="text" class="form-control" value="{{ $paciente->motivo->nombre }}" disabled> --}}
                                        </div>
                                    </div>
                                    <div class="row px-3">
                                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 mb-3">
                                            <label for="atencion_psicologica">¿HAS RECIBIDO ATENCIÓN PSICOLÓGICA O PSIQUIÁTRICA ANTERIORMENTE?</label><br>
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
                                            <label for="trastorno_psicologico">¿HAS SIDO DIAGNOSTICADO(A) CON ALGUNA CONDICIÓN O TRASTORNO PSICOLÓGICO O PSIQUIÁTRICO?</label><br>
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
                                </div>
                                <div class="tab-pane fade" id="citas-tab-pane" wire:ignore role="tabpanel">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-gradient-danger btn-sm mb-0" data-bs-dismiss="modal">Salir</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
