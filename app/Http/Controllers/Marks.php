<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Marks extends Controller
{
    public function marks(Request $req)
    {
        $errors = array();

        $maths = $req->input('maths');
        $this->validateMarks($maths, 'Maths', $errors);

        $physics = $req->input('physics');
        $this->validateMarks($physics, 'Physics', $errors);

        $english = $req->input('english');
        $this->validateMarks($english, 'English', $errors);

        $chemistry = $req->input('chemistry');
        $this->validateMarks($chemistry, 'Chemistry', $errors);

        $biology = $req->input('biology');
        $this->validateMarks($biology, 'Biology', $errors);

        if (count($errors) > 0) {
            return view('marks', ['errors' => $errors]);
        }

        $percentage = ($maths + $biology + $chemistry + $english + $physics) / 5;
        $grades = ['H', 'G', 'F', 'E', 'D', 'C', 'B', 'B+', 'A', 'A+', 'O'];
        $gradeIndex = (int) ($percentage / 10);
        $grade = $grades[$gradeIndex];

        return view('marks', ['percentage' => $percentage, 'grade' => $grade]);

    }

    private function validateMarks($marks, $name, &$errors)
    {
        if (!is_numeric($marks) || $marks > 100 || $marks < 0) {
            $marks = 0;
            array_push($errors, "$name");
        }
    }
}
