<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Permission;
use App\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminUser = User::create([
            'name' => 'system_user',
            'email' => 'system@scoalaaltfel.ro',
            'password' => bcrypt('system_pass'),
        ]);
        $student = new Role();
        $student->name         = 'student';
        $student->display_name = 'Student';
        $student->description  = 'Activities member';
        $student->save();

        $teacher = new Role();
        $teacher->name         = 'teacher';
        $teacher->display_name = 'Teacher';
        $teacher->description  = 'Activity organizer';
        $teacher->save();

        $admin = new Role();
        $admin->name         = 'admin';
        $admin->display_name = 'User Administrator';
        $admin->description  = 'User is allowed to manage everything';
        $admin->save();

        $createEvent = new Permission();
        $createEvent->name         = 'create-event';
        $createEvent->display_name = 'Create events';
        $createEvent->description  = 'create new acitivty';
        $createEvent->save();

        $readEvent = new Permission();
        $readEvent->name         = 'read-event';
        $readEvent->display_name = 'Read events';
        $readEvent->description  = 'Read events';
        $readEvent->save();

        $updateEvent = new Permission();
        $updateEvent->name         = 'update-event';
        $updateEvent->display_name = 'update events';
        $updateEvent->description  = 'update events';
        $updateEvent->save();

        $deleteEvent = new Permission();
        $deleteEvent->name         = 'delete-event';
        $deleteEvent->display_name = 'delete events';
        $deleteEvent->description  = 'delete events';
        $deleteEvent->save();


        $joinEvent = new Permission();
        $joinEvent->name         = 'join-event';
        $joinEvent->display_name = 'join events';
        $joinEvent->description  = 'join events';
        $joinEvent->save();

        $inviteUser = new Permission();
        $inviteUser->name         = 'invite-user';
        $inviteUser->display_name = 'invite users';
        $inviteUser->description  = 'invite users';
        $inviteUser->save();

        $deleteUser = new Permission();
        $deleteUser->name         = 'delete-user';
        $deleteUser->display_name = 'delete users';
        $deleteUser->description  = 'delete users';
        $deleteUser->save();


        $admin->attachPermissions([$createEvent, $readEvent, $updateEvent, $deleteEvent, $inviteUser, $deleteUser ]);
        $teacher->attachPermissions([$createEvent, $readEvent, $updateEvent, $deleteEvent]);
        $student->attachPermissions([$readEvent, $joinEvent]);

        $adminUser->attachRole($admin);
    }
}
