<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use OpenApi\Attributes as OAT;

class SignupRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'type' => [
                'in:hero,impactor',
            ],
            'firstName' => [
                'required',
                'string',
            ],
            'lastName' => [
                'required',
                'string',
            ],
            'email' => [
                'required',
                'email',
                'unique:App\Models\User,email',
            ],
            'address' => [
                'required',
                'string',
            ],
            'city' => [
                'required',
                'string',
            ],
            'country' => [
                'required',
                'string',
            ],
            'phoneNumber' => [
                'required',
                'numeric',
                'min:10'
            ],
            'nationality' => [
                'required',
                'string'
            ],
            'termsAndCondition' => [
                'required',
                'boolean',
                'in:1'
            ],
            'privacyPolicy' => [
                'required',
                'boolean',
                'in:1'
            ],
            'companyESGInitiatives' => [
                'required_if:type,impactor'
            ],
            'idealESGProject' => [
                'required_if:type,impactor'
            ],
            'mostImportantUNSDGS' => [
                'required_if:type,impactor'
            ],
            'whyOurInitiativeIsImportant' => [
                'required_if:type,hero'
            ],
            'whatDoYouHopeToGetOutOfTheHerosAcademyCourse' => [
                'required_if:type,hero'
            ],
            'projectLengthOfProjectOnWeeks' => [
                'required_if:type,hero',
                'numeric'
            ],
            'whatPasssionDoYouHave' => [
                'required_if:type,hero'
            ],
            'whatExpertiseWouldYouLikeToSellToInternationalClients' => [
                'required_if:type,hero'
            ],
            'whatDoYouPlanToSpendTheInitialKickstartSponsorship' => [
                'required_if:type,hero'
            ],
            'projectName' => [
                'required_if:type,hero'
            ],
            'projectImpact' => [
                'required_if:type,hero'
            ],
            'projectTheme' => [
                'required_if:type,hero'
            ],
            'password' => [
                'required',
                'min:6',
                'string',
                'confirmed',
            ],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'companyESGInitiatives.required_if' => 'The company ESG Initiatives field is required',
            'idealESGProject.required_if' => 'The ideal ESG project field is required',
            'mostImportantUNSDGS.required_if' => 'The most important UN SDGS field is required',
            'whyOurInitiativeIsImportant.required_if' => 'The question "We would like to know why our initiative is important for us to be a part of?" should be answered',
            'whatDoYouHopeToGetOutOfTheHerosAcademyCourse.required_if' => 'The question "What do you hope to get out of the heros academy course?" should be answered',
            'projectLengthOfProjectOnWeeks.required_if' => 'The question "project length of project on weeks?" should be answered',
            'projectLengthOfProjectOnWeeks.numeric' => 'The question "project length of project on weeks?" should be answered in numbers',
            'whatPasssionDoYouHave.required_if' => 'The question "What passsion do you have?" should be answered',
            'whatExpertiseWouldYouLikeToSellToInternationalClients.required_if' => 'The question "What expertise would you like to sell to international clients?" should be answered',
            'whatDoYouPlanToSpendTheInitialKickstartSponsorship.required_if' => 'The question "What do you plan to spend the initial kickstart sponsorship money on?" should be answered',
            'projectName.required_if' => 'The project name field is required',
            'projectImpact.required_if' => 'The project impact field is required',
            'projectTheme.required_if' => 'The most project theme field is required',
            'termsAndCondition.*' => 'Please accept the terms and condition',
            'privacyPolicy.*' => 'Please accept the privacy policy',
        ];
    }
}
