<?php

use App\Models\Profile;
use App\Models\User;
use App\Policies\ProfilePolicy;

test('owner can update their own profile', function () {
    $policy = new ProfilePolicy;

    $owner = new User;
    $owner->id = '9b1deb4d-3b7d-4bad-9bdd-2b0d7b3dcb6d';
    $owner->role = 'customer';

    $profile = new Profile;
    $profile->user_id = $owner->id;

    expect($policy->update($owner, $profile))->toBeTrue();
});

test('non-owner customer cannot update another profile', function () {
    $policy = new ProfilePolicy;

    $user = new User;
    $user->id = '11111111-1111-1111-1111-111111111111';
    $user->role = 'customer';

    $profile = new Profile;
    $profile->user_id = '22222222-2222-2222-2222-222222222222';

    expect($policy->update($user, $profile))->toBeFalse();
});

test('super admin can update any profile', function () {
    $policy = new ProfilePolicy;

    $admin = new User;
    $admin->id = '33333333-3333-3333-3333-333333333333';
    $admin->role = 'super_admin';

    $profile = new Profile;
    $profile->user_id = '44444444-4444-4444-4444-444444444444';

    expect($policy->update($admin, $profile))->toBeTrue();
});
