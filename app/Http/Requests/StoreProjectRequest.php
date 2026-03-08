<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest {
    public function authorize(): bool {
        return auth()->user() && (auth()->user()->isAdmin() || auth()->user()->isManager());
    }

    public function rules(): array {
        return [
            'name' => 'required|string|max:255',
            'company_id' => 'required|exists:companies,id',
            'manager_id' => 'required|exists:users,id',
            'description' => 'nullable|string',
            'status' => 'required|in:planned,in_progress,completed,on_hold',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'budget' => 'nullable|numeric|min:0',
        ];
    }
}
