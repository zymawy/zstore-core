<?php

/*
 * This file is part of the Zstore Shop package.
 *
 * (c) Gustavo Ocanto <gustavoocanto@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zstore\Features\Requests;

use Zstore\Http\Request;
use Illuminate\Validation\Rule;

class FeaturesRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() : bool
    {
        return true;
    }

    /**
     * Validation rules.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'help_message' => 'required',

            'name' => [
                'required',
                Rule::unique('features')->ignore($this->request->get('current_feature')),
            ],
        ];
    }
}
