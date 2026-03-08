<?php
namespace App\Http\Requests;

class UpdateProjectRequest extends StoreProjectRequest {
    public function rules(): array {
        return array_merge(parent::rules(), [
            'name' => 'sometimes|required|string|max:255',
        ]);
    }
}
