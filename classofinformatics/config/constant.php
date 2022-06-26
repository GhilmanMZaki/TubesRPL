<?php

use App\Models\Activity;
use App\Models\Content;
use App\Models\Experience;
use App\Models\User;

return [
    'user' => [
        'roles' => [
            User::ADMIN,
            User::TEACHER,
            User::STUDENT,
        ],
    ],
    'activity' => [
        'type' => [
            Activity::EXERCISE,
            Activity::EXAM,
        ],
        'status' => [
            Activity::PUBLISHED,
            Activity::DRAFT,
        ],
    ],
    'content' => [
        'status' => [
            Content::PUBLISHED,
            Content::DRAFT,
        ]
    ],
    'semesters' => [
        1 => 'I',
        2 => 'II',
        3 => 'III',
        4 => 'IV',
        5 => 'V',
        6 => 'VI',
        7 => 'VII',
        8 => 'VIII',
    ],
    'required_exp' => Experience::REQUIRED_XP,
];
