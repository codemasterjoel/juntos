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
                                @foreach ($pacientes as $item)
                                    <tr>
                                        <td><p class=" text-center mb-0">{{ $item->id }}</p></td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->parroquia->nombre}}</td>
                                        <td class=" text-center">
                                            <div class="d-flex align-items-center justify-content-center">
                                            <span class="me-2 text-xs font-weight-bold">60%</span>
                                            <div>
                                                <div class="progress">
                                                <div class="progress-bar bg-gradient-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                                                </div>
                                            </div>
                                            </div>
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
