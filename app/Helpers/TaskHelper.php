<?php

namespace App\Helpers;

class TaskHelper
{
    public static function getSubjectColor($subject)
    {
        $colors = [
            'english' => ['class' => 'bg-english', 'border' => 'border-english', 'hover' => 'hover:bg-pink-500'],
            'informatics' => ['class' => 'bg-informatics', 'border' => 'border-informatics', 'hover' => 'hover:bg-red-500'],
            'math' => ['class' => 'bg-math', 'border' => 'border-math', 'hover' => 'hover:bg-green-500'],
            'history' => ['class' => 'bg-history', 'border' => 'border-history', 'hover' => 'hover:bg-yellow-500'],
            'physics' => ['class' => 'bg-physics', 'border' => 'border-physics', 'hover' => 'hover:bg-blue-600'],
            'chemistry' => ['class' => 'bg-chemistry', 'border' => 'border-chemistry', 'hover' => 'hover:bg-purple-600'],
        ];

        return $colors[strtolower($subject)] ?? ['class' => 'bg-primary', 'border' => 'border-primary', 'hover' => 'hover:bg-indigo-700'];
    }

    public static function getStatusBadge($dueDate)
    {
        $now = \Carbon\Carbon::now();
        $due = \Carbon\Carbon::parse($dueDate);

        if ($due->isPast()) {
            return ['text' => 'Overdue', 'class' => 'bg-red-100 text-red-800', 'status' => 'overdue'];
        }

        $daysUntilDue = $now->diffInDays($due);

        if ($daysUntilDue === 0) {
            return ['text' => 'Due Today', 'class' => 'bg-orange-100 text-orange-800', 'status' => 'due-today'];
        } elseif ($daysUntilDue === 1) {
            return ['text' => 'Due Tomorrow', 'class' => 'bg-red-100 text-red-800', 'status' => 'due-tomorrow'];
        } elseif ($daysUntilDue <= 7) {
            return ['text' => "Due in $daysUntilDue days", 'class' => 'bg-yellow-100 text-yellow-800', 'status' => 'pending'];
        } else {
            return ['text' => "Due in $daysUntilDue days", 'class' => 'bg-green-100 text-green-800', 'status' => 'pending'];
        }
    }
}
