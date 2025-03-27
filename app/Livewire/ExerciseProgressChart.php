<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Exercise;
use App\Models\SessionExercise;

class ExerciseProgressChart extends Component
{
    public Exercise $exercise;
    public $chartData = [];
    public $timeRange = 'all';

    public function mount(Exercise $exercise)
    {
        $this->exercise = $exercise;
        $this->updateChartData();
    }

    public function updateChartData()
    {
        $query = SessionExercise::where('exercise_id', $this->exercise->id)
            ->whereNotNull('lifted_weight')
            ->with('userSession');

        if ($this->timeRange !== 'all') {
            $query->whereHas('userSession', function($q) {
                $q->where('estimated_date', '>=', now()->sub($this->timeRange));
            });
        }

        $records = $query->orderBy('created_at')->get();

        $this->chartData = [
            'labels' => $records->pluck('userSession.estimated_date')
                ->map(fn($date) => \Carbon\Carbon::parse($date)->format('d/m/Y'))
                ->toArray(),
            'weights' => $records->pluck('lifted_weight')->toArray()
        ];

        // Disparar evento Livewire para actualizar el gráfico
        $this->dispatch('updateChart', chartData: $this->chartData);
    }

    public function updatedTimeRange()
    {
        $this->updateChartData();
    }

    public function render()
    {
        return view('livewire.exercise-progress-chart');
    }
}
