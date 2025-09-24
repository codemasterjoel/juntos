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
                          <form wire:submit="register" action="#" method="POST" role="form text-left">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-lg-5 text-center mx-auto">
                                        <h4 class="text-info text-gradient mb-2">DATOS BASICOS</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-2 col-sm-12 mb-3">
                                    <label for="name">CÉDULA</label>
                                    <div class="@error('cedula') border border-danger rounded-3  @enderror">
                                        <input wire:model.live="cedula" type="number" class="form-control" placeholder="cédula" aria-label="cedula">
                                    </div>
                                </div>
                                <div class="col-xl-4 col-sm-12 mb-3">
                                    <label for="name">NOMBRE Y APELLIDO</label>
                                    <div class="@error('nombre') border border-danger rounded-3  @enderror">
                                        <input wire:model.live="nombre" type="text" class="form-control" placeholder="nombre">
                                    </div>
                                </div>
                                <div class="col-xl-3 col-sm-12 mb-3">
                                    <label for="name">NÚMERO DE CONTACTO</label>
                                    <div class="@error('nombre') border border-danger rounded-3  @enderror">
                                        <input wire:model.live="telefono" type="number" class="form-control" placeholder="telefono">
                                    </div>
                                </div>
                                <div class="col-xl-3 col-sm-12 mb-3">
                                    <label for="name">TELEFONO DE EMERGENCIA</label>
                                    <div class="@error('nombre') border border-danger rounded-3  @enderror">
                                        <input wire:model.live="telefonoEmergencia" type="number" class="form-control" placeholder="telefono de emergencia">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 mb-3">
                                    <label for="name">SEXO DE NACIMIENTO</label>
                                    <select class="form-select" wire:model.live="comoSeEntero">
                                        <option selected>SELECCIONE</option>
                                        <option value="MUJER">MUJER</option>
                                        <option value="HOMBRE">HOMBRE</option>
                                        <option value="INTERSEXUAL">INTERSEXUAL</option>
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 mb-3">
                                    <label for="comoSeEntero" >GÉNERO</label>
                                    <select class="form-select" wire:model.live="comoSeEntero">
                                        <option selected>SELECCIONE</option>
                                        <option value="MUJER">FEMENINA</option>
                                        <option value="HOMBRE">MASCULINO</option>
                                        <option value="NO BINARIO/QUEER/GÉNERO FLUIDO">NO BINARIO/QUEER/GÉNERO FLUIDO</option>
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 mb-3">
                                    <label for="comoSeEntero" >FECHA NACIMIENTO</label>
                                    <input type="date" name="fecha_nac" id="fecha_nac" class="form-control">
                                </div>
                                <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 mb-3">
                                    <label for="comoSeEntero" >EDAD</label>
                                    <select class="form-select" wire:model.live="comoSeEntero">
                                        <option selected>SELECCIONE</option>
                                        <option value="15">15</option>
                                        <option value="16">16</option>
                                        <option value="17">17</option>
                                        <option value="18">18</option>
                                        <option value="19">19</option>
                                        <option value="20">20</option>
                                        <option value="21">21</option>
                                        <option value="22">22</option>
                                        <option value="23">23</option>
                                        <option value="24">24</option>
                                        <option value="25">25</option>
                                        <option value="26">26</option>
                                        <option value="27">27</option>
                                        <option value="28">28</option>
                                        <option value="29">29</option>
                                        <option value="30">30</option>
                                        <option value="31">31</option>
                                        <option value="32">32</option>
                                        <option value="33">33</option>
                                        <option value="34">34</option>
                                        <option value="35">35</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-4 col-sm-12 mb-3">
                                    <label for="name">CÉDULA REPRESENTANTE</label>
                                    <div class="@error('cedula') border border-danger rounded-3  @enderror">
                                        <input wire:model.live="cedula" type="number" class="form-control" placeholder="cédula" aria-label="cedula">
                                    </div>
                                </div>
                                <div class="col-xl-4 col-sm-12 mb-3">
                                    <label for="name">NOMBRE Y APELLIDO REPRESENTANTE</label>
                                    <div class="@error('nombre') border border-danger rounded-3  @enderror">
                                        <input wire:model.live="nombre" type="text" class="form-control" placeholder="nombre">
                                    </div>
                                </div>
                                <div class="col-xl-4 col-sm-12 mb-3">
                                    <label for="name">NÚMERO DE CONTACTO DEL REPRESENTANTE</label>
                                    <div class="@error('nombre') border border-danger rounded-3  @enderror">
                                        <input wire:model.live="telefono" type="number" class="form-control" placeholder="telefono">
                                    </div>
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
                                <div class="col-xl-4 col-sm-12 mb-3">
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
                                        <div class="col-xl-4 col-sm-12 mb-3">
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
                                        <div class="col-xl-4 col-sm-12 mb-3">
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
                                        <span for="consejoComunal" >CONSEJO COMUNAL</span>
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
                                    <label for="name">DIRECCIÓN</label>
                                    <div class="@error('direccion') border border-danger rounded-3  @enderror">
                                        <input wire:model.live="direccion" type="text" class="form-control" placeholder="direccion">
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
                                    <select class="form-select" aria-label="Default select example" wire:model.live="comoSeEntero">
                                        <option selected>SELECCIONE</option>
                                        <option value="GRAN MISION VUELTA LA PATRIA">GRAN MISION VUELTA LA PATRIA</option>
                                        <option value="REDES SOCIALES">REDES SOCIALES</option>
                                        <option value="RECOMENDACIÓN DE UN AMIGO">RECOMENDACIÓN DE UN AMIGO</option>
                                        <option value="RECOMENDACIÓN DE ALGUN ESPECIALISTA">RECOMENDACIÓN DE ALGUN ESPECIALISTA</option>
                                        <option value="ACTIVIDAD COMUNITARIA">ACTIVIDAD COMUNITARIA</option>
                                        <option value="UNIVERSIDAD BOLIVARIANA DE VENEZUELA">UNIVERSIDAD BOLIVARIANA DE VENEZUELA</option>
                                        <option value="GRAN MISIÓN VENEZUELA JOVEN">GRAN MISIÓN VENEZUELA JOVEN</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3">
                                    <label for="name">MODALIDAD EN QUE PUEDE RECIBIR LA ATENCIÓN</label>
                                    <div class="@error('direccion') border border-danger rounded-3  @enderror">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                            <label class="form-check-label" for="inlineRadio1">PRESENCIAL</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                            <label class="form-check-label" for="inlineRadio2">ONLINE</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
                                            <label class="form-check-label" for="inlineRadio3">AMBAS</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
                                            <label class="form-check-label" for="inlineRadio3">PRESENCIAL EN GRUPO (VARIAS PERSONAS)</label>
                                        </div>
                                    </div>
                                </div>
                            </div>                            
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3">
                                    <label for="comoSeEntero" >MOTIVO CONSULTA</label>
                                    <p>Lee detenidamente cada una de las opciones y selecciona la opción con las que más se identifique tu motivo de consulta</p>
                                    <select class="form-select" aria-label="Default select example" wire:model.live="comoSeEntero">
                                        <option selected>SELECCIONE</option>
                                        <option value="ME HE SENTIDO ANSIOSO">ME HE SENTIDO ANSIOSO</option>
                                        <option value="HE ESTADO DEPRIMIDO">HE ESTADO DEPRIMIDO</option>
                                        <option value="HE ESTADO ESTRESADO">HE ESTADO ESTRESADO</option>
                                        <option value="HE TENIDO FOBIAS">HE TENIDO FOBIAS</option>
                                        <option value="HE TENIDO PROBLEMAS CON LA ADICCIÓN">HE TENIDO PROBLEMAS CON LA ADICCIÓN</option>
                                        <option value="HE TENIDO PROBLEMAS FAMILIARES">HE TENIDO PROBLEMAS FAMILIARES</option>
                                        <option value="HE TENIDO PROBLEMAS CON MI PAREJA">HE TENIDO PROBLEMAS CON MI PAREJA</option>
                                        <option value="HE TENIDO PROBLEMAS EN MI COMUNIDAD">HE TENIDO PROBLEMAS EN MI COMUNIDAD</option>
                                        <option value="HE TENIDO PROBLEMAS EN MI TRABAJO">HE TENIDO PROBLEMAS EN MI TRABAJO</option>
                                        <option value="HE ESTADO EN DUELO POR LA PÉRDIDA DE UN TRABAJO">HE ESTADO EN DUELO POR LA PÉRDIDA DE UN TRABAJO</option>
                                        <option value="HE ESTADO EN DUELO POR LA PÉRDIDA DE UN FAMILIAR">HE ESTADO EN DUELO POR LA PÉRDIDA DE UN FAMILIAR</option>
                                        <option value="HE ESTADO EN DUELO POR UNA PÉRDIDA MATERIAL">HE ESTADO EN DUELO POR UNA PÉRDIDA MATERIAL</option>
                                        <option value="HE ESTADO EN DUELO POR LA MIGRACIÓN DE UN SER QUERIDO">HE ESTADO EN DUELO POR LA MIGRACIÓN DE UN SER QUERIDO</option>
                                        <option value="HE SUFRIDO VIOLENCIA POR PARTE DE MI PAREJA">HE SUFRIDO VIOLENCIA POR PARTE DE MI PAREJA</option>
                                        <option value="HE SUFRIDO VIOLENCIA DE GÉNERO">HE SUFRIDO VIOLENCIA DE GÉNERO</option>
                                        <option value="HE SUFRIDO VIOLENCIA LABORAL">HE SUFRIDO VIOLENCIA LABORAL</option>
                                        <option value="HE SUFRIDO VIOLENCIA POLÍTICA">HE SUFRIDO VIOLENCIA POLÍTICA</option>
                                        <option value="HE SUFRIDO VIOLENCIA SEXUAL">HE SUFRIDO VIOLENCIA SEXUAL</option>
                                        <option value="HE SUFRIDO VIOLENCIA CRIMINAL">HE SUFRIDO VIOLENCIA CRIMINAL</option>
                                        <option value="HE SIDO VIOLENTO">HE SIDO VIOLENTO</option>
                                        <option value="HE TENIDO PROBLEMA CON MI AUTOESTIMA">HE TENIDO PROBLEMA CON MI AUTOESTIMA</option>
                                        <option value="HE TENIDO PROBLEMAS EN MI INSTITUCIÓN EDUCATIVA">HE TENIDO PROBLEMAS EN MI INSTITUCIÓN EDUCATIVA</option>
                                        <option value="QUIERO TRABAJAR EN MI SEXUALIDAD">QUIERO TRABAJAR EN MI SEXUALIDAD</option>
                                        <option value="QUIERO TRABAJAR EN MI PROYECTO DE VIDA">QUIERO TRABAJAR EN MI PROYECTO DE VIDA</option>
                                        <option value="QUIERO CONOCERME MÁS">QUIERO CONOCERME MÁS</option>
                                        <option value="QUIERO HERRAMIENTAS DE CRIANZA PARA MIS HIJOS(AS)">QUIERO HERRAMIENTAS DE CRIANZA PARA MIS HIJOS(AS)</option>
                                        <option value="QUIERO HERRAMIENTAS PARA MI EMBARAZO(PARTO Y POSTPARTO)">QUIERO HERRAMIENTAS PARA MI EMBARAZO(PARTO Y POSTPARTO)</option>
                                        <option value="QUIERO TRABAJAR EN MI IDENTIDAD DE GÉNERO">QUIERO TRABAJAR EN MI IDENTIDAD DE GÉNERO</option>
                                        <option value="HE TENIDO PENSAMIENTOS NEGATIVOS">HE TENIDO PENSAMIENTOS NEGATIVOS</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 mb-3">
                                    <label for="name">¿HAS RECIBIDO ATENCIÓN PSICOLÓGICA O PSIQUIÁTRICA ANTERIORMENTE?</label>
                                    <div class="@error('direccion') border border-danger rounded-3  @enderror">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                            <label class="form-check-label" for="inlineRadio1">SI</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                            <label class="form-check-label" for="inlineRadio2">NO</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 mb-3">
                                    <label for="name">¿HAS SIDO DIAGNOSTICADO(A) CON ALGUNA CONDICIÓN O TRASTORNO PSICOLÓGICO O PSIQUIÁTRICO?</label>
                                    <div class="@error('direccion') border border-danger rounded-3  @enderror">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                            <label class="form-check-label" for="inlineRadio1">SI</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                            <label class="form-check-label" for="inlineRadio2">NO</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div>
                                        <p>Por favor, cargue una foto de su cédula de identidad. Es importante verificar sus datos personales para poder ofrecerle la atención segura, confidencial y gratuita.</p>
                                        <div class="mb-4 d-flex justify-content-center">
                                            <img id="selectedImage" src="{{ asset('assets/img/cedula.jpg') }}"
                                            alt="example placeholder" style="width: 300px;" />
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <div data-mdb-ripple-init class="btn btn-primary btn-rounded">
                                                <label class="form-label text-white m-1" for="customFile1">SUBIR IMAGEN</label>
                                                <input type="file" class="form-control d-none" id="customFile1" onchange="displaySelectedImage(event, 'selectedImage')" />
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
