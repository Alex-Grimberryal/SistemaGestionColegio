<x-head></x-head>
<x-sidebar></x-sidebar>
<div class="container" style="margin-top: 8%">
    <main>
        <div class="content">
            <div class="row">
                <div class="col-12">

                </div>

                <div class="row">
                    <div class="col-md-4">
                        <H1>Ultimas reservaciones</H1>
                    </div>
                    <div class="col-md-8 text-right">
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#crearCitaModal">
                                Añadir
                            </button>
                            <button type="button" class="btn btn-success mx-2" data-bs-toggle="modal"
                                data-bs-target="#verHorario">
                                Ver horario dinamico
                            </button>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="crearCitaModal" tabindex="-1" role="dialog"
                            aria-labelledby="crearCitaModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="crearCitaModalLabel">Crear Cita</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('reservaciones.citas.store') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="ambientes_idambiente">Ubicacion</label>
                                                <select name="ambientes_idambiente" class="form-control" required>
                                                    <option value="">Seleccionar Ubicacion</option>
                                                    @foreach ($ambientes as $ambiente)
                                                        @if ($ambiente->estado == 0)
                                                            <option value="{{ $ambiente->idambiente }}">
                                                                {{ $ambiente->ambiente }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="profesores_idprofesor">Profesor</label>
                                                <select name="profesores_idprofesor" class="form-control" required>
                                                    <option value="">Seleccione Profesor</option>
                                                    @foreach ($profesores as $profesor)
                                                        @if ($profesor->estado == 0)
                                                            <option value="{{ $profesor->idprofesor }}">
                                                                {{ $profesor->profesor }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <label for="horarioI">Horario de inicio</label>
                                                        <select name="horarioI" class="form-control" required>
                                                            <option value="">Seleccione Horario</option>
                                                            <option value="07.00">07:00 AM</option>
                                                            <option value="08.00">08:00 AM</option>
                                                            <option value="09.00">09:00 AM</option>
                                                            <option value="10.00">10:00 AM</option>
                                                            <option value="11.00">11:00 AM</option>
                                                            <option value="12.00">12:00 PM</option>
                                                            <option value="01.00">01:00 PM</option>
                                                            <option value="02.00">02:00 PM</option>
                                                            <option value="03.00">03:00 PM</option>
                                                            <option value="04.00">04:00 PM</option>
                                                            <option value="05.00">05:00 PM</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="horarioF">Horario de termino</label>
                                                        <select name="horarioF" class="form-control" required>
                                                            <option value="">Seleccione Horario</option>
                                                            <option value="08.00">08:00 AM</option>
                                                            <option value="09.00">09:00 AM</option>
                                                            <option value="10.00">10:00 AM</option>
                                                            <option value="11.00">11:00 AM</option>
                                                            <option value="12.00">12:00 PM</option>
                                                            <option value="01.00">01:00 PM</option>
                                                            <option value="02.00">02:00 PM</option>
                                                            <option value="03.00">03:00 PM</option>
                                                            <option value="04.00">04:00 PM</option>
                                                            <option value="05.00">05:00 PM</option>
                                                            <option value="06.00">06:00 PM</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary mt-4">Guardar Cita</button>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- Modal grande de horario dinamico primaria -->
                        <div class="modal fade" id="verHorario" tabindex="-1" role="dialog">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title text-center">Horario semanal Primaria</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close">
                                        </button>
                                    </div>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-2 text-center">
                                                <h4>Hora</h4>

                                                @for ($i = 7; $i <= 11; $i++)
                                                    <div class="col-12 px-2 py-2 mx-1 my-1 bg-info pe-auto">
                                                        {{ $i }}:00 AM - {{ $i + 1 }}:00 AM
                                                    </div>
                                                @endfor
                                                <div class="col-12 px-2 py-2 mx-1 my-1 pe-auto bg-warning">R</div>
                                                <!-- Hora de almuerzo -->
                                                @for ($i = 1; $i <= 5; $i++)
                                                    <div class="col-12 px-2 py-2 mx-1 my-1 bg-info pe-auto">
                                                        {{ $i }}:00 PM - {{ $i + 1 }}:00 PM
                                                    </div>
                                                @endfor
                                            </div>

                                            <div class="col-2 text-center">
                                                <h4>Lunes</h4>
                                                @foreach ($horariosDisponibles['Lunes'] as $hora)
                                                    @php
                                                        $existeCitaPrimaria = $citas
                                                            ->where('diaSemana', 'Monday')
                                                            ->where('horarioI', '<=', $hora)
                                                            ->where('horarioF', '>=', $hora)
                                                            ->where('ambientes_idambiente', 1)
                                                            ->first();
                                                    @endphp

                                                    @if ($existeCitaPrimaria)
                                                        <div
                                                            class="col-12 text-center px-2 py-2 mx-1 my-1 pe-auto bg-danger">
                                                            <span role="button" tabindex="0">Cita Registrada</span>
                                                        </div>
                                                    @else
                                                        <div
                                                            class="col-12 text-center px-2 py-2 mx-1 my-1 pe-auto bg-success">
                                                            <span role="button" tabindex="0">Horario
                                                                Disponible</span>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                            <div class="col-2 text-center">
                                                <h4>Martes</h4>
                                                @foreach ($horariosDisponibles['Martes'] as $hora)
                                                    @php
                                                        $existeCitaPrimaria = $citas
                                                            ->where('diaSemana', 'Tuesday')
                                                            ->where('horarioI', '<=', $hora)
                                                            ->where('horarioF', '>=', $hora)
                                                            ->where('ambientes_idambiente', 1)
                                                            ->first();
                                                    @endphp

                                                    @if ($existeCitaPrimaria)
                                                        <div
                                                            class="col-12 text-center px-2 py-2 mx-1 my-1 pe-auto bg-danger">
                                                            <span role="button" tabindex="0">Cita Registrada</span>
                                                        </div>
                                                    @else
                                                        <div
                                                            class="col-12 text-center px-2 py-2 mx-1 my-1 pe-auto bg-success">
                                                            <span role="button" tabindex="0">Horario
                                                                Disponible</span>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                            <div class="col-2 text-center">
                                                <h4>Miercoles</h4>
                                                @foreach ($horariosDisponibles['Miercoles'] as $hora)
                                                    @php
                                                        $existeCitaPrimaria = $citas
                                                            ->where('diaSemana', 'Wednesday')
                                                            ->where('horarioI', '<=', $hora)
                                                            ->where('horarioF', '>=', $hora)
                                                            ->where('ambientes_idambiente', 1)
                                                            ->first();
                                                    @endphp

                                                    @if ($existeCitaPrimaria)
                                                        <div
                                                            class="col-12 text-center px-2 py-2 mx-1 my-1 pe-auto bg-danger">
                                                            <span role="button" tabindex="0">Cita Registrada</span>
                                                        </div>
                                                    @else
                                                        <div
                                                            class="col-12 text-center px-2 py-2 mx-1 my-1 pe-auto bg-success">
                                                            <span role="button" tabindex="0">Horario
                                                                Disponible</span>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                            <div class="col-2 text-center">
                                                <h4>Jueves</h4>
                                                @foreach ($horariosDisponibles['Jueves'] as $hora)
                                                    @php
                                                        $existeCitaPrimaria = $citas

                                                            ->where('diaSemana', 'Thursday')
                                                            ->where('horarioI', '<=', $hora)
                                                            ->where('horarioF', '>=', $hora)
                                                            ->where('ambientes_idambiente', 1)
                                                            ->first();
                                                    @endphp

                                                    @if ($existeCitaPrimaria)
                                                        <div
                                                            class="col-12 text-center px-2 py-2 mx-1 my-1 pe-auto bg-danger">
                                                            <span role="button" tabindex="0">Cita Registrada</span>
                                                        </div>
                                                    @else
                                                        <div
                                                            class="col-12 text-center px-2 py-2 mx-1 my-1 pe-auto bg-success">
                                                            <span role="button" tabindex="0">Horario
                                                                Disponible</span>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                            <div class="col-2 text-center">
                                                <h4>Viernes</h4>
                                                @foreach ($horariosDisponibles['Viernes'] as $hora)
                                                    @php
                                                        $existeCitaPrimaria = $citas
                                                            ->where('diaSemana', 'Friday')
                                                            ->where('horarioI', '<=', $hora)
                                                            ->where('horarioF', '>=', $hora)
                                                            ->where('ambientes_idambiente', 1)
                                                            ->first();
                                                    @endphp

                                                    @if ($existeCitaPrimaria)
                                                        <div
                                                            class="col-12 text-center px-2 py-2 mx-1 my-1 pe-auto bg-danger">
                                                            <span role="button" tabindex="0">Cita Registrada</span>
                                                        </div>
                                                    @else
                                                        <div
                                                            class="col-12 text-center px-2 py-2 mx-1 my-1 pe-auto bg-success">
                                                            <span role="button" tabindex="0">Horario
                                                                Disponible</span>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer justify-content-center">
                                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#verHorarioSecundaria">Horario Secundaria</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal grande de horario dinamico primaria -->
                        <div class="modal fade" id="verHorarioSecundaria" tabindex="-1" role="dialog"
                            aria-labelledby="modalSecundarioLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title text-center">Horario semanal Secundaria</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close">
                                        </button>
                                    </div>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-2 text-center">
                                                <h4>Hora</h4>

                                                @for ($i = 7; $i <= 11; $i++)
                                                    <div class="col-12 px-2 py-2 mx-1 my-1 bg-info pe-auto">
                                                        {{ $i }}:00 AM - {{ $i + 1 }}:00 AM
                                                    </div>
                                                @endfor
                                                <div class="col-12 px-2 py-2 mx-1 my-1 pe-auto bg-warning">R</div>
                                                <!-- Hora de almuerzo -->
                                                @for ($i = 1; $i <= 5; $i++)
                                                    <div class="col-12 px-2 py-2 mx-1 my-1 bg-info pe-auto">
                                                        {{ $i }}:00 PM - {{ $i + 1 }}:00 PM
                                                    </div>
                                                @endfor
                                            </div>

                                            <div class="col-2 text-center">
                                                <h4>Lunes</h4>
                                                @foreach ($horariosDisponibles['Lunes'] as $hora)
                                                    @php
                                                        $existeCitaSecundaria = $citas
                                                            ->where('diaSemana', 'Monday')
                                                            ->where('horarioI', '<=', $hora)
                                                            ->where('horarioF', '>=', $hora)
                                                            ->where('ambientes_idambiente', 2)
                                                            ->first();
                                                    @endphp

                                                    @if ($existeCitaSecundaria)
                                                        <div
                                                            class="col-12 text-center px-2 py-2 mx-1 my-1 pe-auto bg-danger">
                                                            <span role="button" tabindex="0">Cita Registrada</span>
                                                        </div>
                                                    @else
                                                        <div
                                                            class="col-12 text-center px-2 py-2 mx-1 my-1 pe-auto bg-success">
                                                            <span role="button" tabindex="0">Horario
                                                                Disponible</span>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                            <div class="col-2 text-center">
                                                <h4>Martes</h4>
                                                @foreach ($horariosDisponibles['Martes'] as $hora)
                                                    @php
                                                        $existeCitaSecundaria = $citas
                                                            ->where('diaSemana', 'Tuesday')
                                                            ->where('horarioI', '<=', $hora)
                                                            ->where('horarioF', '>=', $hora)
                                                            ->where('ambientes_idambiente', 2)
                                                            ->first();
                                                    @endphp

                                                    @if ($existeCitaSecundaria)
                                                        <div
                                                            class="col-12 text-center px-2 py-2 mx-1 my-1 pe-auto bg-danger">
                                                            <span role="button" tabindex="0">Cita Registrada</span>
                                                        </div>
                                                    @else
                                                        <div
                                                            class="col-12 text-center px-2 py-2 mx-1 my-1 pe-auto bg-success">
                                                            <span role="button" tabindex="0">Horario
                                                                Disponible</span>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                            <div class="col-2 text-center">
                                                <h4>Miercoles</h4>
                                                @foreach ($horariosDisponibles['Miercoles'] as $hora)
                                                    @php
                                                        $existeCitaSecundaria = $citas
                                                            ->where('diaSemana', 'Wednesday')
                                                            ->where('horarioI', '<=', $hora)
                                                            ->where('horarioF', '>=', $hora)
                                                            ->where('ambientes_idambiente', 2)
                                                            ->first();
                                                    @endphp

                                                    @if ($existeCitaSecundaria)
                                                        <div
                                                            class="col-12 text-center px-2 py-2 mx-1 my-1 pe-auto bg-danger">
                                                            <span role="button" tabindex="0">Cita Registrada</span>
                                                        </div>
                                                    @else
                                                        <div
                                                            class="col-12 text-center px-2 py-2 mx-1 my-1 pe-auto bg-success">
                                                            <span role="button" tabindex="0">Horario
                                                                Disponible</span>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                            <div class="col-2 text-center">
                                                <h4>Jueves</h4>
                                                @foreach ($horariosDisponibles['Jueves'] as $hora)
                                                    @php
                                                        $existeCitaSecundaria = $citas
                                                            ->where('diaSemana', 'Thursday')
                                                            ->where('horarioI', '<=', $hora)
                                                            ->where('horarioF', '>=', $hora)
                                                            ->where('ambientes_idambiente', 2)
                                                            ->first();
                                                    @endphp

                                                    @if ($existeCitaSecundaria)
                                                        <div
                                                            class="col-12 text-center px-2 py-2 mx-1 my-1 pe-auto bg-danger">
                                                            <span role="button" tabindex="0">Cita Registrada</span>
                                                        </div>
                                                    @else
                                                        <div
                                                            class="col-12 text-center px-2 py-2 mx-1 my-1 pe-auto bg-success">
                                                            <span role="button" tabindex="0">Horario
                                                                Disponible</span>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                            <div class="col-2 text-center">
                                                <h4>Viernes</h4>
                                                @foreach ($horariosDisponibles['Viernes'] as $hora)
                                                    @php
                                                        $existeCitaSecundaria = $citas
                                                            ->where('diaSemana', 'Friday')
                                                            ->where('horarioI', '<=', $hora)
                                                            ->where('horarioF', '>=', $hora)
                                                            ->where('ambientes_idambiente', 2)
                                                            ->first();
                                                    @endphp

                                                    @if ($existeCitaSecundaria)
                                                        <div
                                                            class="col-12 text-center px-2 py-2 mx-1 my-1 pe-auto bg-danger">
                                                            <span role="button" tabindex="0">Cita Registrada</span>
                                                        </div>
                                                    @else
                                                        <div
                                                            class="col-12 text-center px-2 py-2 mx-1 my-1 pe-auto bg-success">
                                                            <span role="button" tabindex="0">Horario
                                                                Disponible</span>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer justify-content-center">
                                        <button type="button" class="btn btn-secondary"
                                        data-bs-toggle="modal" data-bs-target="#verHorario">Horario Primaria</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Profesor</th>
                                        <th>Area</th>
                                        <th>Ambiente</th>
                                        <th>Hora de inicio</th>
                                        <th>Hora de termino</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($citas as $cita)
                                        <tr>
                                            <td>{{ $cita->id }}</td>
                                            <td>{{ $cita->profesor->profesor }}</td>
                                            <td>{{ $cita->profesor->area }}</td>
                                            <td>{{ $cita->ambiente->ambiente }}</td>
                                            <td>{{ $cita->horarioI }}</td>
                                            <td>{{ $cita->horarioF }}</td>
                                            <td>
                                                <div class="col-4">
                                                    <button type="button" class="btn btn-primary"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#editarCitaModal{{ $cita->id }}">
                                                        Editar
                                                    </button>
                                                </div>
                                                <!-- Modal -->
                                                <div class="modal fade" id="editarCitaModal{{ $cita->id }}"
                                                    tabindex="-1" role="dialog"
                                                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="crearCitaModalLabel">
                                                                    Editar Cita</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form
                                                                    action="{{ route('reservaciones.citas.update', $cita->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="form-group">
                                                                        <label
                                                                            for="ambientes_idambiente">Ubicacion</label>
                                                                        <select name="ambientes_idambiente"
                                                                            class="form-control" required>
                                                                            <option value="">Seleccionar
                                                                                Ubicacion
                                                                            </option>
                                                                            @foreach ($ambientes as $ambiente)
                                                                                @if ($ambiente->estado == 0)
                                                                                    <option
                                                                                        value="{{ $ambiente->idambiente }}">
                                                                                        {{ $ambiente->ambiente }}
                                                                                    </option>
                                                                                @endif
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label
                                                                            for="profesores_idprofesor">Profesor</label>
                                                                        <select name="profesores_idprofesor"
                                                                            class="form-control" required>
                                                                            <option value="">Seleccione Profesor
                                                                            </option>
                                                                            @foreach ($profesores as $profesor)
                                                                                <option
                                                                                    value="{{ $profesor->idprofesor }}">
                                                                                    {{ $profesor->profesor }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <div class="col-6">
                                                                                <label for="horarioI">Horario de
                                                                                    inicio</label>
                                                                                <select name="horarioI"
                                                                                    class="form-control" required>
                                                                                    <option value="">Seleccione
                                                                                        Horario</option>
                                                                                    <option value="07.00"
                                                                                        {{ $cita->horarioI == '07.00' ? 'selected' : '' }}>
                                                                                        07:00 AM</option>
                                                                                    <option value="08.00"
                                                                                        {{ $cita->horarioI == '08.00' ? 'selected' : '' }}>
                                                                                        08:00 AM</option>
                                                                                    <option value="09.00"
                                                                                        {{ $cita->horarioI == '09.00' ? 'selected' : '' }}>
                                                                                        09:00 AM</option>
                                                                                    <option value="10.00"
                                                                                        {{ $cita->horarioI == '10.00' ? 'selected' : '' }}>
                                                                                        10:00 AM</option>
                                                                                    <option value="11.00"
                                                                                        {{ $cita->horarioI == '11.00' ? 'selected' : '' }}>
                                                                                        11:00 AM</option>
                                                                                    <option value="12.00"
                                                                                        {{ $cita->horarioI == '12.00' ? 'selected' : '' }}>
                                                                                        12:00 PM</option>
                                                                                    <option value="01.00"
                                                                                        {{ $cita->horarioI == '01.00' ? 'selected' : '' }}>
                                                                                        01:00 PM</option>
                                                                                    <option value="02.00"
                                                                                        {{ $cita->horarioI == '02.00' ? 'selected' : '' }}>
                                                                                        02:00 PM</option>
                                                                                    <option value="03.00"
                                                                                        {{ $cita->horarioI == '03.00' ? 'selected' : '' }}>
                                                                                        03:00 PM</option>
                                                                                    <option value="04.00"
                                                                                        {{ $cita->horarioI == '04.00' ? 'selected' : '' }}>
                                                                                        04:00 PM</option>
                                                                                    <option value="05.00"
                                                                                        {{ $cita->horarioI == '05.00' ? 'selected' : '' }}>
                                                                                        05:00 PM</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-6">
                                                                                <label for="horarioF">Horario de
                                                                                    termino</label>
                                                                                <select name="horarioF"
                                                                                    class="form-control" required>
                                                                                    <option value="">Seleccione
                                                                                        Horario</option>
                                                                                    <option value="08.00"
                                                                                        {{ $cita->horarioI == '08.00' ? 'selected' : '' }}>
                                                                                        08:00 AM</option>
                                                                                    <option value="09.00"
                                                                                        {{ $cita->horarioI == '09.00' ? 'selected' : '' }}>
                                                                                        09:00 AM</option>
                                                                                    <option value="10.00"
                                                                                        {{ $cita->horarioI == '10.00' ? 'selected' : '' }}>
                                                                                        10:00 AM</option>
                                                                                    <option value="11.00"
                                                                                        {{ $cita->horarioI == '11.00' ? 'selected' : '' }}>
                                                                                        11:00 AM</option>
                                                                                    <option value="12.00"
                                                                                        {{ $cita->horarioI == '12.00' ? 'selected' : '' }}>
                                                                                        12:00 PM</option>
                                                                                    <option value="01.00"
                                                                                        {{ $cita->horarioI == '01.00' ? 'selected' : '' }}>
                                                                                        01:00 PM</option>
                                                                                    <option value="02.00"
                                                                                        {{ $cita->horarioI == '02.00' ? 'selected' : '' }}>
                                                                                        02:00 PM</option>
                                                                                    <option value="03.00"
                                                                                        {{ $cita->horarioI == '03.00' ? 'selected' : '' }}>
                                                                                        03:00 PM</option>
                                                                                    <option value="04.00"
                                                                                        {{ $cita->horarioI == '04.00' ? 'selected' : '' }}>
                                                                                        04:00 PM</option>
                                                                                    <option value="05.00"
                                                                                        {{ $cita->horarioI == '05.00' ? 'selected' : '' }}>
                                                                                        05:00 PM</option>
                                                                                    <option value="06.00"
                                                                                        {{ $cita->horarioI == '06.00' ? 'selected' : '' }}>
                                                                                        06:00 PM</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <button type="submit"
                                                                        class="btn btn-primary mt-4">Guardar
                                                                        Cita</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <!-- Puedes agregar más filas aquí con los datos correspondientes -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{ $citas->links('pagination::bootstrap-4') }}
                </div>


                <div class="col-3">

                </div>
            </div>
        </div>
    </main>
</div>
<x-footer></x-footer>

<script>
    // Obtener los elementos de los selectores de horario
    var horarioISelect = document.querySelector('select[name="horarioI"]');
    var horarioFSelect = document.querySelector('select[name="horarioF"]');

    // Agregar un evento de cambio a los selectores de horario
    horarioISelect.addEventListener('change', validarHorario);
    horarioFSelect.addEventListener('change', validarHorario);

    function validarHorario() {
        var horarioI = parseFloat(horarioISelect.value);
        var horarioF = parseFloat(horarioFSelect.value);

        // Verificar si horarioI es mayor que horarioF
        if (horarioI > horarioF) {
            mostrarNotificacion('No puedes seleccionar un horario que excede un día');
        } else {
            // Ocultar la notificación si se corrige el horario
            ocultarNotificacion();
        }
    }

    function mostrarNotificacion(mensaje) {
        // Mostrar la notificación en la parte inferior izquierda de la pantalla
        var notificacion = document.createElement('div');
        notificacion.innerHTML = mensaje;
        notificacion.style.position = 'fixed';
        notificacion.style.bottom = '10px';
        notificacion.style.left = '10px';
        notificacion.style.padding = '10px';
        notificacion.style.backgroundColor = 'red';
        notificacion.style.color = 'white';
        document.body.appendChild(notificacion);
    }

    function ocultarNotificacion() {
        // Eliminar la notificación si se corrige el horario
        var notificacion = document.querySelector('.notificacion');
        if (notificacion) {
            notificacion.remove();
        }
    }
</script>
