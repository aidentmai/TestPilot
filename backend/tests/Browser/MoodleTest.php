<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

test('moodle homepage', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/')
                ->assertTitle('Home | Mount Orange');
    });
});

test('student can log in', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/login/index.php')
                ->type('username', 'student')
                ->type('password', 'moodle25')
                ->click('#loginbtn')
                ->assertPathIs('/my/courses.php')
                ->assertSee('Barbara');
    });
});

// test('teacher can log in', function () {
//     $this->browse(function (Browser $browser) {
//         $browser->visit('/login/index.php')
//                 ->type('username', 'teacher')
//                 ->type('password', 'moodle25')
//                 ->click('#loginbtn')
//                 ->assertPathIs('/my/courses.php')
//                 ->assertSee('Thomas');
//     });
// });

// test('manager can log in', function () {
//     $this->browse(function (Browser $browser) {
//         $browser->visit('/login/index.php')
//                 ->type('username', 'manager')
//                 ->type('password', 'moodle25')
//                 ->click('#loginbtn')
//                 ->assertPathIs('/my/courses.php')
//                 ->assertSee('Mary');
//     });
// });

// test('parent can log in', function () {
//     $this->browse(function (Browser $browser) {
//         $browser->visit('/login/index.php')
//                 ->type('username', 'parent')
//                 ->type('password', 'moodle25')
//                 ->click('#loginbtn')
//                 ->assertPathIs('/my/courses.php')
//                 ->assertSee('Peter');
//     });
// });

// test('privacy officer can log in', function () {
//     $this->browse(function (Browser $browser) {
//         $browser->visit('/login/index.php')
//                 ->type('username', 'privacyofficer')
//                 ->type('password', 'moodle25')
//                 ->click('#loginbtn')
//                 ->assertPathIs('/my/courses.php')
//                 ->assertSee('Samantha');
//     });
// });
