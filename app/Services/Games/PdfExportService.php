<?php

namespace App\Services\Games;

use App\Models\Game;
use App\Services\Games\Contracts\GamesPdfServiceContract;
use Dompdf\Dompdf;

class PdfExportService implements GamesPdfServiceContract
{
    public function export(Game $game)
    {
        $data = [
            'title' => 'Отчёт игры',
        ];

        $pdf = new Dompdf();
        $pdf->loadHtml(view('pdf.game_pdf', compact('data', 'game')));
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();

        $pdf->stream('game.pdf');
    }
}
