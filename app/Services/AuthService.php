<?php

namespace App\Services;

use App\Http\Requests\Auth\AdminLoginRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\SignupRequest;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AuthService
{
    /**
     * Create a new service instance.
     *
     * @param  UserService  $userService
     * @param  AdminService  $adminService
     * @return void
     */
    public function __construct(private UserService $userService, private AdminService $adminService)
    {
        //
    }

    /**
     * Signup a user.
     *
     * @param  SignupRequest  $request
     * @return User
     */
    public function signupUser(SignupRequest $request): User
    {
        $user_values = [
            'type' => $request->type,
            'first_name' => $request->firstName,
            'last_name' => $request->lastName,
            'email' => $request->email,
            'address' => $request->address,
            'city' => $request->city,
            'country' => $request->country,
            'phone_number' => $request->phoneNumber,
            'nationality' => $request->nationality,
            'terms_and_condition' => $request->termsAndCondition,
            'privacy_policy' => $request->privacyPolicy,
            'password' => Hash::make($request->password),
        ];

        if( $request->type == 'hero' ) {
            $user_values += [
                'why_our_initiative_is_important' => $request->whyOurInitiativeIsImportant,
                'what_do_you_hope_to_get_out_of_the_heros_academy_course' => $request->whatDoYouHopeToGetOutOfTheHerosAcademyCourse,
                'project_length_of_project_on_weeks' => $request->projectLengthOfProjectOnWeeks,
                'what_passsion_do_you_have' => $request->whatPasssionDoYouHave,
                'what_expertise_would_you_like_to_sell_to_international_clients' => $request->whatExpertiseWouldYouLikeToSellToInternationalClients,
                'what_do_you_plan_to_spend_the_initial_kickstart_sponsorship' => $request->whatDoYouPlanToSpendTheInitialKickstartSponsorship,
                'project_name' => $request->projectName,
                'project_impact' => $request->projectImpact,
                'project_theme' => $request->projectTheme,
            ];
        } else {
            $user_values += [
                'company_esg_initiatives' => $request->companyESGInitiatives,
                'ideal_esg_project' => $request->idealESGProject,
                'most_important_un_sdgs' => $request->mostImportantUNSDGS,
            ];
        }

        $user = $this->userService->storeUser($user_values);

        return $user;
    }

    /**
     * Login a user.
     *
     * @param  LoginRequest  $request
     * @return User
     *
     * @throws HttpException
     * @throws NotFoundHttpException
     */
    public function loginUser(LoginRequest $request): User
    {
        $user = $this->userService->getByEmail($request->email);

        if (!$user || !Hash::check($request->password, $user->password)) {
            return abort(401, 'Invalid credentials.');
        }

        return $user;
    }

    /**
     * Logout a user.
     *
     * @param  User  $user
     * @return bool
     */
    public function logoutUser(User $user): bool
    {
        return $user->currentAccessToken()->delete();
    }

    /**
     * Login an admin.
     *
     * @param  AdminLoginRequest  $request
     * @return Admin
     *
     * @throws HttpException
     * @throws NotFoundHttpException
     */
    public function loginAdmin(AdminLoginRequest $request): Admin
    {
        $admin = $this->adminService->getByEmail($request->email);

        if (!$admin || !Hash::check($request->password, $admin->password)) {
            return abort(401, 'Invalid credentials.');
        }

        return $admin;
    }

    /**
     * Logout an admin.
     *
     * @param  Admin  $admin
     * @return bool
     */
    public function logoutAdmin(Admin $admin): bool
    {
        return $admin->currentAccessToken()->delete();
    }
}
