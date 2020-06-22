<?php

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('DashBoard', route('home'));
});

// Home > student
Breadcrumbs::for('student', function ($trail) {
    $trail->parent('home');
    $trail->push('Student', route('student.index'));
});

//Home > student > Create
Breadcrumbs::for('createStudent', function ($trail) {
    $trail->parent('student');
    $trail->push('Create New Student', route('student.store'));
});
//Home > student > student name
Breadcrumbs::for('studentDetail', function ($trail, $student) {
    $trail->parent('student');
    $trail->push($student->name, route('student.edit', $student));
});

//attendance
// Home > attendance
Breadcrumbs::for('attendance', function ($trail) {
    $trail->parent('student');
    $trail->push('Attendance', route('attendance.index'));
});

//setting
Breadcrumbs::for('setting', function ($trail) {
    $trail->parent('home');
    $trail->push('School Profile', route('setting.index'));
});

//fee
Breadcrumbs::for('fees', function ($trail) {
    $trail->parent('home');
    $trail->push('Fees', route('fees.index'));
});

//driver
Breadcrumbs::for('driver', function ($trail) {
    $trail->parent('home');
    $trail->push('Driver', route('driver.index'));
});

//notice
Breadcrumbs::for('notice', function ($trail) {
    $trail->parent('home');
    $trail->push('Notice', route('notice.index'));
});

Breadcrumbs::for('notice.show', function ($trail, $notice) {
    $trail->parent('notice');
    $trail->push($notice->title, route('notice.show', $notice));
});


//Class
Breadcrumbs::for('classes', function ($trail) {
    $trail->parent('home');
    $trail->push('Class', route('classes.index'));
});

//Home > teacher 
Breadcrumbs::for('teacher', function ($trail) {
    $trail->parent('home');
    $trail->push('Teacher List', route('teacher.index'));
});
//Home > teacher >crate Teacher
Breadcrumbs::for('teacherCreate', function ($trail) {
    $trail->parent('teacher');
    $trail->push('New Teacher Create', route('teacher.create'));
});
//Home > teacher >teacher name
Breadcrumbs::for('teacher.show', function ($trail, $teacher) {
    $trail->parent('teacher');
    $trail->push($teacher->name, route('teacher.show', $teacher));
});

//leave
Breadcrumbs::for('leave', function ($trail) {
    $trail->parent('home');
    $trail->push('Leaves', route('leave.index'));
});

//holiday
Breadcrumbs::for('holiday', function ($trail) {
    $trail->parent('home');
    $trail->push('Holiday', route('holiday.index'));
});

//calender
Breadcrumbs::for('events', function ($trail) {
    $trail->parent('home');
    $trail->push('Calender', route('events.index'));
});

//calender
Breadcrumbs::for('result', function ($trail) {
    $trail->parent('home');
    $trail->push('Result', route('result.index'));
});

//calender > create
Breadcrumbs::for('eventCreate', function ($trail) {
    $trail->parent('home');
    $trail->push('Calender', route('events.create'));
});

//Gallery
Breadcrumbs::for('gallery', function ($trail) {
    $trail->parent('home');
    $trail->push('Gallery', route('gallery.index'));
});

//Home > facility 
Breadcrumbs::for('facility', function ($trail) {
    $trail->parent('home');
    $trail->push('Facility', route('facility.index'));
});

//diary
Breadcrumbs::for('diary', function ($trail) {
    $trail->parent('home');
    $trail->push('Diary', route('diary.index'));
});

Breadcrumbs::for('diary-create', function ($trail) {
    $trail->parent('diary');
    $trail->push('Create', route('diary.create'));
});

//Subject
Breadcrumbs::for('subject', function ($trail) {
    $trail->parent('home');
    $trail->push('Subject', route('subject.index'));
});






//Home > Student > [Category]
// Breadcrumbs::for('notices', function ($trail, $notice) {
//     $trail->parent('blog');
//     $trail->push($notice->title, route('notice.show', $notice->id));
// });

// Home > Blog > [Category] > [Post]
Breadcrumbs::for('post', function ($trail, $post) {
    $trail->parent('category', $post->category);
    $trail->push($post->title, route('post', $post->id));
});