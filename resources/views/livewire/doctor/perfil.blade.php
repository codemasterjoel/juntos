<div>
    <div class="container-fluid">
        <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('../assets/img/curved-images/curved0.jpg'); background-position-y: 50%;">
            <span class="mask bg-gradient-primary opacity-6"></span>
        </div>
        <div class="card card-body blur shadow-blur mx-4 mt-n6">
            <div class="row gx-4">
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative">
                        <img src="../assets/img/bruce-mars.jpg" alt="..." class="w-100 border-radius-lg shadow-sm">
                        <a href="javascript:;" class="btn btn-sm btn-icon-only position-absolute bottom-0 end-0 mb-n2 me-n2">
                            <span class="material-icons text-info">add_photo_alternate</span>
                        </a>
                    </div>
                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1"> {{ $nombre }} </h5>
                        <p class="mb-0 font-weight-bold text-sm">{{ auth()->user()->especialista->especializacion->nombre }}</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                    <div class="nav-wrapper position-relative end-0">
                        <ul class="nav nav-pills nav-fill p-1 bg-transparent" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1 active " data-bs-toggle="tab" href="javascript:;" role="tab" aria-controls="overview" aria-selected="true">
                                    <span class="material-icons mt-n2">view_list</span>
                                    <span class="">Datos Basicos</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1 " data-bs-toggle="tab" href="javascript:;" role="tab" aria-controls="teams" aria-selected="false">
                                    <span class="material-icons mt-n2">pending_actions</span>
                                    <span class="ms-1">Citas</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1 " data-bs-toggle="tab" href="javascript:;" role="tab"aria-controls="dashboard" aria-selected="false">
                                    <span class="material-icons mt-n2">pending_actions</span>
                                    <span class="ms-1">{{ __('Projects') }}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-body pt-4 p-3">
                
                @if ($showDemoNotification)
                    <div wire:model.live="showDemoNotification" class="mt-3  alert alert-primary alert-dismissible fade show" role="alert">
                        <span class="alert-text text-white"> {{ __('You are in a demo version, you can\'t update the profile.') }}</span>
                        <button wire:click="$set('showDemoNotification', false)" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                
                @if ($showSuccesNotification)
                    <div wire:model.live="showSuccesNotification" class="mt-3 alert alert-primary alert-dismissible fade show" role="alert">
                        <span class="alert-icon text-white"><i class="ni ni-like-2"></i></span>
                        <span class="alert-text text-white">{{ __('Your profile information have been successfuly saved!') }}</span>
                        <button wire:click="$set('showSuccesNotification', false)" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>
            
            <form wire:submit="save" action="#" method="POST" role="form text-left">

                <div class="row px-3">
                    <div class="col-lg-12 mt-2">
                        <h4 class="text-info text-gradient mb-2">DATOS BASICOS</h4>
                    </div>
                </div>
                <div class="row px-3">
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
                <div class="row px-3">
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
                <div class="row px-3">
                    <div class="col-lg-12 mt-2">
                        <h4 class="text-info text-gradient mb-2">DATOS DE UBICACIÓN</h4>
                    </div>
                </div>
                <!-- #region ESTADO-->
                <div class="row px-3">
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
                <div class="row px-3">
                    @if (!is_null($comunas)) {{-- campo Parroquia --}}
                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
                            <span for="comuna" >COMUNA O CIRCUITO COMUNAL</span>
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
                            <span for="consejoComunal">CONSEJO COMUNAL</span>
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
                <div class="row px-3">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3">
                        <label for="direccion">DIRECCIÓN</label>
                        <div class="@error('direccion') border border-danger rounded-3  @enderror">
                            <input wire:model="direccion" type="text" class="form-control" placeholder="direccion">
                        </div>
                    </div>
                </div>
                <div class="row px-3">
                    <div class="col-lg-12 mt-2">
                        <h4 class="text-info mb-2">OTROS DATOS</h4>
                    </div>
                </div>
                <div class="row px-3">
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
                <div class="row px-3">
                    <div>
                        <p>Por favor, cargue una foto de su cédula de identidad. Es importante verificar sus datos personales para poder ofrecerle la atención segura, confidencial y gratuita.</p>
                        <div class="mb-4 d-flex justify-content-center">
                            <img wire:ignore.self id="selectedImage" src="{{ $this->file ? asset($this->file) : asset('assets/img/cedula.jpg') }}" alt="example placeholder" style="width: 300px;" />
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
    </div>
</div>
<script>
function displaySelectedImage(event, elementId) {
    const selectedImage = document.getElementById(elementId);
    const fileInput = event.target;

    if (fileInput.files && fileInput.files[0]) {
        const reader = new FileReader();

        reader.onload = function(e) {
            selectedImage.src = e.target.result;
        };

        reader.readAsDataURL(fileInput.files[0]);
    }
}
</script>
