<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Profesor;
use App\Models\Ambiente;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CitaController extends Controller
{
    public function index()
    {
        $ambientes = Ambiente::all();
        $profesores = Profesor::all();
        $citas = Cita::paginate(10);
        // Obtener la fecha de inicio de la semana actual
        $fechaInicioSemana = Carbon::now()->startOfWeek();

        // Asignar el día de la semana a cada cita
        foreach ($citas as $cita) {
            $fechaCita = Carbon::parse($cita->fecha);
            $diaSemana = $fechaCita->format('l'); // Obtener el nombre completo del día de la semana
            $cita->diaSemana = $diaSemana;

            $horaInicio = $cita->horarioI;
            $horaFin = $cita->horarioF;

            $existeCitaPrimaria = $this->existeCitaPrimaria($fechaCita, $horaInicio, $horaFin);
            $existeCitaSecundaria = $this->existeCitaSecundaria($fechaCita, $horaInicio, $horaFin);

            $cita->existeCitaPrimaria = $existeCitaPrimaria;
            $cita->existeCitaSecundaria = $existeCitaSecundaria;
        }

        $horariosDisponibles = $this->getHorariosDisponibles();

        return view('reservaciones.index', compact('citas', 'ambientes', 'profesores', 'horariosDisponibles'));
    }

    public function existeCitaPrimaria($fecha, $horaInicio, $horaFin)
    {
        $cita = Cita::where('fecha', $fecha)
            ->where('ambientes_idambiente', 1)
            ->where('horarioI', '<=', $horaInicio)
            ->where('horarioF', '>=', $horaFin)
            ->first();

        return $cita ? true : false;
    }
    public function existeCitaSecundaria($fecha, $horaInicio, $horaFin)
    {
        $cita = Cita::where('fecha', $fecha)
            ->where('horarioI', '<=', $horaInicio)
            ->where('horarioF', '>=', $horaFin)
            ->where('ambientes_idambiente', 2) // Filtrar por idambiente igual a 2 (ambiente secundaria)
            ->first();

        return $cita ? true : false;
    }

    private function getHorariosDisponibles()
    {

        $horariosDisponibles = [
            'Lunes' => [07.00, 08.00, 09.00, 10.00, 11.00, 12.00, 01.00, 02.00, 03.00, 04.00, 05.00],
            'Martes' => [07.00, 08.00, 09.00, 10.00, 11.00, 12.00, 01.00, 02.00, 03.00, 04.00, 05.00],
            'Miercoles' => [07.00, 08.00, 09.00, 10.00, 11.00, 12.00, 01.00, 02.00, 03.00, 04.00, 05.00],
            'Jueves' => [07.00, 08.00, 09.00, 10.00, 11.00, 12.00, 01.00, 02.00, 03.00, 04.00, 05.00],
            'Viernes' => [07.00, 08.00, 09.00, 10.00, 11.00, 12.00, 01.00, 02.00, 03.00, 04.00, 05.00],
        ];

        return $horariosDisponibles;
    }

    public function create()
    {
        $ambientes = Ambiente::all();
        $profesores = Profesor::all();

        return view('reservaciones.index', compact('ambientes', 'profesores'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'ambientes_idambiente' => 'required',
            'profesores_idprofesor' => 'required',
            'horarioI' => 'required',
            'horarioF' => 'required|after:horarioI',
        ]);

        $horarioI = $request->input('horarioI');
        $horarioF = $request->input('horarioF');

        if ($horarioF <= $horarioI) {
            return redirect()->back()->withErrors(['horarioF' => 'El horario de fin debe ser mayor que el horario de inicio']);
        }


        $cita = new Cita;
        $cita->ambientes_idambiente = $request->input('ambientes_idambiente');
        $cita->profesores_idprofesor = $request->input('profesores_idprofesor');
        $cita->horarioI = $request->input('horarioI');
        $cita->horarioF = $request->input('horarioF');
        $cita->fecha = Carbon::today();
        $cita->save();

        return redirect()->route('reservaciones')->with('success', 'La cita ha sido creada exitosamente');
    }

    public function edit($id)
    {
        $cita = Cita::find($id);
        $ambientes = Ambiente::all(); // Asegúrate de tener el modelo Ambiente importado en el controlador
        $profesores = Profesor::all(); // Asegúrate de tener el modelo Profesor importado en el controlador
        return view('reservaciones.edit', compact('cita', 'ambientes', 'profesores'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'ambientes_idambiente' => 'required',
            'profesores_idprofesor' => 'required',
            'horarioI' => 'required',
            'horarioF' => 'required',
        ]);

        $cita = Cita::find($id);
        $cita->ambientes_idambiente = $request->input('ambientes_idambiente');
        $cita->profesores_idprofesor = $request->input('profesores_idprofesor');
        $cita->horarioI = $request->input('horarioI');
        $cita->horarioF = $request->input('horarioF');
        $cita->fecha = Carbon::today();

        $cita->save();
        return redirect()->route('reservaciones')->with('success', 'La cita ha sido actualizada exitosamente');
    }

    public function destroy($id)
    {
        $cita = Cita::find($id);
        $cita->delete();

        return redirect()->route('reservaciones.index')->with('success', 'La cita ha sido eliminada exitosamente');
    }
}
