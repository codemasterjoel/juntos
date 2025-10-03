<div class="main-content">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0 text-info text-gradient">GESTIÓN DE USUARIOS</h5>
                        </div>
                        <a href="#" class="btn bg-gradient-info btn-sm mb-0" type="button">+&nbsp; NUEVO USUARIO</a>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary font-weight-bolder opacity-7">ID</th>
                                    <th class="text-uppercase text-secondary font-weight-bolder opacity-7 ps-2">Foto</th>
                                    <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7">Nombre</th>
                                    <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7">Usuario</th>
                                    <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7">Rol</th>
                                    <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7">Especialidad</th>
                                    <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td class="ps-4"><p class="text-xs font-weight-bold mb-0">{{ $user->id }}</p></td>
                                        <td><div><img src="{{ $user->photo ? asset($user->photo) : asset('assets/img/photo.jpg') }}" class="avatar avatar-sm me-3"></div></td></div></td>
                                        <td class="text-center"><p class="text-xs font-weight-bold mb-0">{{ $user->nombre }}</p></td>
                                        <td class="text-center"><p class="text-xs font-weight-bold mb-0">{{ $user->name }}</p></td>
                                        <td class="text-center"><p class="text-xs font-weight-bold mb-0">{{ $user->role }}</p></td>
                                        <td class="text-center"><p class="text-xs font-weight-bold mb-0">{{ $user->especializacion_id }}</p></td>
                                        <td class="text-center"><a href="#" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit user">
                                            <i class="fas fa-user-edit text-secondary"></i></a>
                                            <i class="cursor-pointer fas fa-trash text-secondary"></i>
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
</div>
