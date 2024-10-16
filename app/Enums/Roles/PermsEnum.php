<?php

namespace App\Enums\Roles;

enum PermsEnum: string
{
    case CREATE_MANGA = 'create manga';
    case UPDATE_MANGA = 'update manga';
    case DELETE_MANGA = 'delete manga';

    case CREATE_CHAPTER = 'create chapter';
    case UPDATE_CHAPTER = 'update chapter';
    case UPLOAD_CHAPTER = 'upload chapter';
    case DELETE_CHAPTER = 'delete chapter';

}
