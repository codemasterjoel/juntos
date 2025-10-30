<div class="main-content">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div><h5 class="mb-0 text-uppercase text-info text-gradient">especialistas</h5></div>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#ModalEspecialista" class="btn bg-gradient-info btn-sm mb-0" type="button">+&nbsp; NUEVO ESPECIALISTA</a>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-center font-weight-bolder">#</th>
                                    <th class="text-uppercase font-weight-bolder">FOTO</th>
                                    <th class="text-uppercase font-weight-bolder ps-2">NOMBRE</th>
                                    <th class="text-uppercase font-weight-bolder">ESPECIALIDAD</th>
                                    <th class="text-center text-uppercase font-weight-bolder">ESTATUS</th>
                                    <th class="text-center text-uppercase font-weight-bolder">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($especialistas as $doctor)
                                    <tr>
                                        <td><p class=" text-center mb-0">{{ $loop->iteration }}</p></td>
                                        <td><div><img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3"></div></td>
                                        <td>
                                            <div>
                                                <div class="text-xs font-weight-bold mb-0"><h6 class="mb-0 text-sm">{{ $doctor->especialista->nombre }}</h6><p class="text-xs text-secondary mb-0">{{ $doctor->email ? $doctor->email : 'Sin email' }}</p></div>
                                                <p class="text-xs text-secondary">{{$doctor->especialista->tlf_contacto}}</p>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{ isset($doctor->especialista->especializacion->nombre) ? $doctor->especialista->especializacion->nombre : 'Sin especialización' }}</p>
                                            <p class="text-xs text-secondary">Organization</p>
                                        </td>
                                        <td class="align-middle text-center text-sm"><span class="badge {{ $doctor->especialista->is_active ? 'badge-sm bg-gradient-success' : 'badge-sm bg-gradient-danger' }}">{{ $doctor->especialista->is_active ? 'activo' : 'inactivo' }}</span></td>
                                        <td class="text-center">
                                            <a href="" wire:click="editarEspecialista('{{ $doctor->id }}')" class="text-success font-weight-bold text-xs" data-bs-toggle="modal" data-bs-target="#ModalEspecialista" data-toggle="tooltip" data-original-title="Editar user"><span class="material-icons">edit</span></a>
                                            <a href="" wire:click="verPacientes('{{ $doctor->id }}')" class="text-info font-weight-bold text-xs" data-bs-toggle="modal" data-bs-target="#ModalPacientes" data-toggle="tooltip" data-original-title="Ver Pacientes"><span class="material-icons">recent_actors</span></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div wire:ignore.self class="modal fade z-999" id="ModalEspecialista" tabindex="-1" aria-labelledby="ModalEspecialista" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h3 class="modal-title fs-5 mt-4 text-2xl text-cyan-400 font-bold text-center text-white">REGISTRAR UN ESPECIALISTA</h3>
                    <button wire:click="limpiarCampos()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit="guardar" action="#" enctype="multipart/form-data" method="POST" role="form text-left">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-5 text-center mx-auto">
                                    <h4 class="text-info text-gradient mb-2">DATOS BASICOS</h4>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-2 col-sm-12 mb-3">
                                <label for="cedula">CÉDULA</label>
                                <div class="@error('cedula') border border-danger rounded-3  @enderror">
                                    <input wire:model="cedula" type="number" class="form-control" placeholder="cédula" aria-label="cedula">
                                </div>
                            </div>
                            <div class="col-xl-4 col-sm-12 mb-3">
                                <label for="nombre">NOMBRE Y APELLIDO</label>
                                <div class="@error('nombre') border border-danger rounded-3  @enderror">
                                    <input wire:model="nombre" type="text" class="form-control" placeholder="nombre">
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-12 mb-3">
                                <label for="tlf_contacto">NÚMERO DE CONTACTO</label>
                                <div class="@error('tlf_contacto') border border-danger rounded-3  @enderror">
                                    <input wire:model="tlf_contacto" type="number" class="form-control" placeholder="telefono">
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-12 mb-3">
                                <label for="tlf_emergencia">TELEFONO DE EMERGENCIA</label>
                                <div class="@error('tlf_emergencia') border border-danger rounded-3  @enderror">
                                    <input wire:model="tlf_emergencia" type="number" class="form-control" placeholder="telefono de emergencia">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 mb-3">
                                <label for="sexo">SEXO DE NACIMIENTO</label>
                                <select wire:model="sexo" class="form-select" id="sexo" name="sexo">
                                    <option selected>SELECCIONE</option>
                                    @foreach ($sexos as $item)
                                        <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 mb-3">
                                <label for="genero" >GÉNERO</label>
                                <select class="form-select" wire:model="genero" id="genero" name="genero">
                                    <option selected>SELECCIONE</option>
                                    @foreach ($generos as $item)
                                        <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 mb-3">
                                <label for="fechaNac" >FECHA NACIMIENTO</label>
                                <input wire:model.live="fechaNac" type="date" name="fechaNac" id="fechaNac" class="form-control">
                            </div>
                            <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 mb-3">
                                <label for="edad">EDAD</label>
                                <input wire:model="edad" type="integer" name="edad" id="edad" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 mb-3">
                                <label for="name">USUARIO</label>
                                <div class="@error('name') border border-danger rounded-3  @enderror">
                                    <input wire:model.live="name" type="text" class="form-control" placeholder="Name" aria-label="Name">
                                </div>
                                @error('name') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 mb-3">
                                <label for="email">CONTRASEÑA</label>
                                <div class="@error('password') border border-danger rounded-3 @enderror">
                                    <input wire:model.live="password" type="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="password-addon">
                                </div>
                                @error('password') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6 col-sm-12 mb-3 mb-3">
                            <label for="email">CORREO</label>
                            <div class="@error('email') border border-danger rounded-3 @enderror">
                                <input wire:model.live="email" type="email" class="form-control" placeholder="Email" aria-label="Email">
                            </div>
                            @error('email') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-5 text-center mx-auto">
                                    <h4 class="text-info text-gradient mb-2">DATOS DE UBICACIÓN</h4>
                                </div>
                            </div>
                        </div>
                        <!-- #region ESTADO-->
                        <div class="row">
                            <div class="col-xl-3 col-sm-12 mb-3">
                                <label for="pais">PAIS</label>
                                <div class="@error('pais') border border-danger rounded-3 @enderror">
                                    <select class="form-select" aria-label="Default select example" wire:model.live="pais">
                                        <option selected>SELECCIONE</option>
                                        @foreach ($paises as $item)
                                            <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('pais') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-xl-3 col-sm-12 mb-3">
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
                                    <div class="col-xl-3 col-sm-12 mb-3">
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
                                    <div class="col-xl-3 col-sm-12 mb-3">
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
                        <!-- #region COMUNAS-->
                        <div class="row mb-3">
                            @if (!is_null($comunas)) {{-- campo Parroquia --}}
                                <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
                                    <label for="comuna" >COMUNA O CIRCUITO COMUNAL</label>
                                    <select class="form-select" aria-label="Default select example" wire:model.live="comuna">
                                        <option selected>SELECCIONE</option>
                                        @foreach ($comunas as $item)
                                            <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('comuna') <div class="text-danger">{{ $message }}</div> @enderror
                            @endif
                            @if (!is_null($consejoComunales)) {{-- campo Parroquia --}}
                                <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
                                    <label for="consejoComunal">CONSEJO COMUNAL</label>
                                    <select class="form-select" aria-label="Default select example" wire:model.live="consejoComunal">
                                        <option selected>SELECCIONE</option>
                                        @foreach ($consejoComunales as $item)
                                            <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('consejoComunal') <div class="text-danger">{{ $message }}</div> @enderror
                            @endif
                        </div>
                        <div class="row mb-3">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3">
                                <label for="direccion">DIRECCIÓN</label>
                                <div class="@error('direccion') border border-danger rounded-3  @enderror">
                                    <input wire:model="direccion" type="text" class="form-control" placeholder="direccion">
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-5 text-center mx-auto">
                                    <h4 class="text-info text-gradient mb-2">OTROS DATOS</h4>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 mb-3">
                                <label for="especialidad" >ESPECIALIZACIÓN</label>
                                <select class="form-select" aria-label="Default select example" wire:model="especialidad">
                                    <option selected>SELECCIONE</option>
                                    @foreach ($especialidades as $item)
                                        <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div>
                                <p>Por favor, cargue una foto de su cédula de identidad. Es importante verificar sus datos personales para poder ofrecerle la atención segura, confidencial y gratuita.</p>
                                <div class="mb-4 d-flex justify-content-center">
                                    <img {{ !$this->file ? 'wire.ingore' : '' }} id="selectedImage" src="{{ $this->file ? asset($this->file) : asset('assets/img/cedula.jpg') }}" alt="example placeholder" style="width: 300px;" />
                                </div>
                                <div class="d-flex justify-content-center">
                                    <div data-mdb-ripple-init class="btn btn-primary btn-rounded">
                                        <label class="form-label text-white m-1" for="customFile1">SUBIR IMAGEN</label>
                                        <input wire:model="file" type="file" class="form-control d-none" id="customFile1" onchange="displaySelectedImage(event, 'selectedImage')" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn bg-gradient-info w-100 my-4 mb-2" wire:click.prevent="guardar()">GUARDAR</button>
                    <button type="button" class="btn bg-gradient-danger w-100 mb-0" wire:click.prevent="limpiarCampos()" data-bs-dismiss="modal">Salir</button>
                </div>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade z-999" id="ModalPacientes" tabindex="-1" aria-labelledby="ModalPacientes" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h3 class="modal-title fs-5 mt-4 text-2xl text-cyan-400 font-bold text-center text-white">PACIENTES</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
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
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-danger w-100 mb-0" wire:click.prevent="limpiarCampos()" data-bs-dismiss="modal">Salir</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function displaySelectedImage(event, elementId) {
        const selectedImage = document.getElementById(elementId);
        const fileInput = event.target;

        selectedImage.setAttribute('wire:ignore.self', '');

        if (fileInput.files && fileInput.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                selectedImage.src = e.target.result;
            };

            reader.readAsDataURL(fileInput.files[0]);
        }
    }
</script>