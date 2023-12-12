<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;
use OpenApi\Attributes as OAT;


class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|Arrayable|JsonSerializable
     */
    public function toArray($request): array|Arrayable|JsonSerializable
    {
        $avatar_urls = [
            'https://gravatar.com/avatar/24809f1f1cbc6e79ffbb01b71a17a523?s=400&d=robohash&r=x',
            'https://gravatar.com/avatar/664c0978c2fe7065e58737c7dd945e35?s=400&d=robohash&r=x',
            'https://gravatar.com/avatar/b14d67a6aa1bc4ec6ee30541eb6fc7d9?s=400&d=robohash&r=x',
            'https://gravatar.com/avatar/b0ce02781d3232293fe779aab159ce7d?s=400&d=robohash&r=x',
            'https://gravatar.com/avatar/956fc2d19f68f713a014552e00779e85?s=400&d=robohash&r=x',
            'https://gravatar.com/avatar/0b9ecb265cae3fe0deeb4dd27a4f9dbb?s=400&d=robohash&r=x',
            'https://gravatar.com/avatar/5f5494327fe4622c25e063eeda3438dd?s=400&d=robohash&r=x',
            'https://gravatar.com/avatar/9449c79266697ec5b7af17c7a290495b?s=400&d=robohash&r=x',
            'https://gravatar.com/avatar/ff35f058b4a748f67a43a4b9a7d6e799?s=400&d=robohash&r=x',
            'https://gravatar.com/avatar/6488fbefb08e3de36f7b380627dbb0a9?s=400&d=robohash&r=x',
        ];

        $response = [
            'id' => $this->id,
            'type' => $this->type,
            'firstname' => $this->first_name,
            'lastName' => $this->last_name,
            'email' => $this->email,
            'address' => $this->address,
            'city' => $this->city,
            'country' => $this->country,
            'phoneNumber' => $this->phone_number,
            'nationality' => $this->nationality,
            'avatar_url' => $avatar_urls[array_rand($avatar_urls)],
            'created_at' => $this->created_at,
        ];

        if( $this->type == 'hero' ) {
            $response['whyOurInitiativeIsImportant'] = $this->why_our_initiative_is_important;
            $response['whatDoYouHopeToGetOutOfTheHerosAcademyCourse'] = $this->what_do_you_hope_to_get_out_of_the_heros_academy_course;
            $response['projectLengthOfProjectOnWeeks'] = $this->project_length_of_project_on_weeks;
            $response['whatPasssionDoYouHave'] = $this->what_passsion_do_you_have;
            $response['whatExpertiseWouldYouLikeToSellToInternationalClients'] = $this->what_expertise_would_you_like_to_sell_to_international_clients;
            $response['whatDoYouPlanToSpendTheInitialKickstartSponsorship'] = $this->what_do_you_plan_to_spend_the_initial_kickstart_sponsorship;
            $response['projectName'] = $this->project_name;
            $response['projectImpact'] = $this->project_impact;
            $response['projectTheme'] = $this->project_theme;
        } else {
            $response['companyESGInitiatives'] = $this->company_esg_initiatives;
            $response['idealESGProject'] = $this->ideal_esg_project;
            $response['mostImportantUNSDGS'] = $this->most_important_un_sdgs;
        }

        return $response;
    }
}
