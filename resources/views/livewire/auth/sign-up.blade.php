  <section class="h-100-vh mb-8">
      <div class="page-header align-items-start section-height-50 pt-5 pb-11 m-3 border-radius-lg"
          style="background-image: url('../assets/img/curved-images/curved14.jpg');">
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
                            <div class="row">
                                <div class="col-xl-6 col-sm-12 mb-3">
                                    <label for="name">USUARIO</label>
                                    <div class="@error('name') border border-danger rounded-3  @enderror">
                                        <input wire:model.live="name" type="text" class="form-control" placeholder="Name" aria-label="Name" aria-describedby="email-addon">
                                    </div>
                                    @error('name') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                                <div class="col-xl-6 col-sm-12 mb-3">
                                    <label for="email">CONTRASEÑA</label>
                                    <div class="@error('password') border border-danger rounded-3 @enderror">
                                        <input wire:model.live="password" type="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="password-addon">
                                    </div>
                                    @error('password') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                            </div>
                            <div class="row">
                              <div class="col-xl-6 col-sm-12 mb-3">
                                <label for="email">CORREO</label>
                                <div class="@error('email') border border-danger rounded-3 @enderror">
                                    <input wire:model.live="email" type="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="email-addon">
                                </div>
                                @error('email') <div class="text-danger">{{ $message }}</div> @enderror
                              </div>
                              <div class="col-xl-6 col-sm-12 mb-3">
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
                                        <span for="comuna" >Comuna o Circuito Comunal</span>
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
                                        <span for="consejoComunal" >Comuna o Circuito Comunal</span>
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
