<div class="main-content">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div><h5 class="mb-0 text-uppercase text-info text-gradient">especialistas</h5></div>
                        <a href="#" class="btn bg-gradient-info btn-sm mb-0" type="button">+&nbsp; NUEVO ESPECIALISTA</a>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-center font-weight-bolder">#</th>
                                    <th class="text-uppercase font-weight-bolder ps-2">NOMBRE</th>
                                    <th class="text-uppercase font-weight-bolder">ESPECIALIDAD</th>
                                    <th class="text-center text-uppercase font-weight-bolder">ESTATUS</th>
                                    <th class="text-center text-uppercase font-weight-bolder">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($doctores as $item)
                                    <tr>
                                        <td><p class=" text-center mb-0">{{ $item->id }}</p></td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div><img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3"></div>
                                                <div class="d-flex flex-column justify-content-center"><h6 class="mb-0 text-sm">{{ $item->name }}</h6><p class="text-xs text-secondary mb-0">{{ $item->email }}</p></div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{ $item->especializacion }}</p>
                                            <p class="text-xs text-secondary">Organization</p>
                                        </td>
                                        <td class="align-middle text-center text-sm"><span class="badge {{ $item->is_active ? 'badge-sm bg-gradient-success' : 'badge-sm bg-gradient-danger' }}">{{ $item->is_active ? 'activo' : 'inactivo' }}</span></td>
                                        <td class="text-center"><a href="javascript:;" class="text-success font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user"><span class="material-icons">edit</span></a></td>
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
