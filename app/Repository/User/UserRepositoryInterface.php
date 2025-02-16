<?php

declare(strict_types=1);

namespace App\Repository\User;

use App\Models\User;
use App\Models\UserSave;

interface UserRepositoryInterface
{
    public function paginate(int $page, int $perPage = 20): array;

    public function show(int $id);

    public function create(UserSave $user): bool;

    public function update(User $user): bool;

    public function delete(int $id);
}
