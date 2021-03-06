<?php

namespace App\Policies;

use App\Conversation;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConversationPolicy
{
    use HandlesAuthorization;

    public function view(User $user, Conversation $conversation)
    {
        return $conversation->user->is($user);
    }

    /**
     * Determine whether the user can update the conversation.
     *
     * @param User $user
     * @param Conversation $conversation
     * @return mixed
     */
    public function update(User $user, Conversation $conversation)
    {
        return $conversation->user->is($user);
    }
}
