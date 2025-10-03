  <section class="h-100-vh mb-8">
      <div class="page-header align-items-start section-height-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('../assets/img/portada.png');">
          <span class="mask bg-gradient-dark opacity-6"></span>
          <div class="container">
              <div class="row justify-content-center">
                  <div class="col-lg-5 text-center mx-auto">
                      <h1 class="text-info text-gradient mb-2 mt-5">BIENVENIDO!</h1>
                  </div>
              </div>
          </div>
      </div>
      <div class="container">
          <div class="row mt-lg-n10 mt-md-n11 mt-n10">
              <div class="col-xl-12 col-lg-5 col-md-7 mx-auto">
                  <div class="card z-index-0">
                      <div class="card-body">
                          <form wire:submit="register" action="#" enctype="multipart/form-data" method="POST" role="form text-left">
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
                            @if ($this->edad < 18) {{-- campo Edad --}}
                                <div class="row">
                                    <div class="col-xl-4 col-sm-12 mb-3">
                                        <label for="cedula_representante">CÉDULA REPRESENTANTE</label>
                                        <div class="@error('cedula_representante') border border-danger rounded-3  @enderror">
                                            <input wire:model="cedula_representante" type="number" class="form-control" placeholder="Cédula Representante" aria-label="cedula_representante">
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-sm-12 mb-3">
                                        <label for="nombre_representante">NOMBRE Y APELLIDO REPRESENTANTE</label>
                                        <div class="@error('nombre_representante') border border-danger rounded-3  @enderror">
                                            <input wire:model="nombre_representante" type="text" class="form-control" placeholder="Nombre del Representante">
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-sm-12 mb-3">
                                        <label for="tlf_representante">NÚMERO DE CONTACTO DEL REPRESENTANTE</label>
                                        <div class="@error('tlf_representante') border border-danger rounded-3  @enderror">
                                            <input wire:model="tlf_representante" type="number" class="form-control" placeholder="Telefono Representante">
                                        </div>
                                    </div>
                                </div>
                            @endif
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
                            <div class="row">
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
                            <div class="row">
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
                                    <label for="comoSeEntero" >¿COMO TE ENTERASTE DE SIEMPRE JUNTOS?</label>
                                    <select class="form-select" aria-label="Default select example" wire:model="comoSeEntero">
                                        <option selected>SELECCIONE</option>
                                        @foreach ($enteros as $item)
                                            <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3">
                                    <label for="modalidad">MODALIDAD EN QUE PUEDE RECIBIR LA ATENCIÓN</label>
                                    <div class="@error('modalidad') border border-danger rounded-3  @enderror">
                                        <div class="form-check form-check-inline">
                                            <input wire:model="modalidad" class="form-check-input" type="radio" name="modalidad" id="inlineRadio1" value="1">
                                            <label class="form-check-label" for="inlineRadio1">PRESENCIAL</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input wire:model="modalidad" class="form-check-input" type="radio" name="modalidad" id="inlineRadio2" value="2">
                                            <label class="form-check-label" for="inlineRadio2">ONLINE</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input wire:model="modalidad" class="form-check-input" type="radio" name="modalidad" id="inlineRadio3" value="3">
                                            <label class="form-check-label" for="inlineRadio3">AMBAS</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input wire:model="modalidad" class="form-check-input" type="radio" name="modalidad" id="inlineRadio4" value="4">
                                            <label class="form-check-label" for="inlineRadio4">PRESENCIAL EN GRUPO (VARIAS PERSONAS)</label>
                                        </div>
                                    </div>
                                </div>
                            </div>                            
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3">
                                    <label for="motivo" >MOTIVO CONSULTA</label>
                                    <p>Lee detenidamente cada una de las opciones y selecciona la opción con las que más se identifique tu motivo de consulta</p>
                                    <select class="form-select" aria-label="Default select example" wire:model="motivo">
                                        <option selected>SELECCIONE</option>
                                        @foreach ($motivos as $item)
                                            <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 mb-3">
                                    <label for="atencion_psicologica">¿HAS RECIBIDO ATENCIÓN PSICOLÓGICA O PSIQUIÁTRICA ANTERIORMENTE?</label>
                                    <div class="@error('atencion_psicologica') border border-danger rounded-3  @enderror">
                                        <div class="form-check form-check-inline">
                                            <input wire:model="atencion_psicologica" class="form-check-input" type="radio" name="atencion_psicologica" id="inlineRadio1" value="1">
                                            <label class="form-check-label" for="inlineRadio1">SI</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input wire:model="atencion_psicologica" class="form-check-input" type="radio" name="atencion_psicologica" id="inlineRadio2" value="0">
                                            <label class="form-check-label" for="inlineRadio2">NO</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 mb-3">
                                    <label for="trastorno_psicologico">¿HAS SIDO DIAGNOSTICADO(A) CON ALGUNA CONDICIÓN O TRASTORNO PSICOLÓGICO O PSIQUIÁTRICO?</label>
                                    <div class="@error('trastorno_psicologico') border border-danger rounded-3  @enderror">
                                        <div class="form-check form-check-inline">
                                            <input wire:model="trastorno_psicologico" class="form-check-input" type="radio" name="trastorno_psicologico" id="inlineRadio1" value="1">
                                            <label class="form-check-label" for="inlineRadio1">SI</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input wire:model="trastorno_psicologico" class="form-check-input" type="radio" name="trastorno_psicologico" id="inlineRadio2" value="0">
                                            <label class="form-check-label" for="inlineRadio2">NO</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div>
                                        <p>Por favor, cargue una foto de su cédula de identidad. Es importante verificar sus datos personales para poder ofrecerle la atención segura, confidencial y gratuita.</p>
                                        <div class="mb-4 d-flex justify-content-center">
                                            <img wire:ignore.self id="selectedImage" src="{{ asset('assets/img/cedula.jpg') }}" alt="example placeholder" style="width: 300px;" />
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <div data-mdb-ripple-init class="btn btn-primary btn-rounded">
                                                <label class="form-label text-white m-1" for="customFile1">SUBIR IMAGEN</label>
                                                <input wire:model="file" type="file" class="form-control d-none" id="customFile1" onchange="displaySelectedImage(event, 'selectedImage')" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                                <div class="text-center">
                                    <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">REGISTRARSE</button>
                                </div>
                                <p class="text-sm mt-3 mb-0">¿YA TIENES UNA CUENTA?<a href="{{ route('login') }}" class="text-dark font-weight-bolder"> INICIAR SESIÓN</a>
                                </p>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>

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
