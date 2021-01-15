<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\ApiReturnFormat;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Config;
use DB;
use App\Models\Menu;
use URL;
use App\Models\Disease;
use App\Models\Treatment;

class ApiController extends Controller
{
    use ApiReturnFormat;
    public function authenticate(Request $request)
    {
        // return $request;

            $validator = Validator::make($request->all(), [
                'email' => 'required|max:255',
                'password' => 'required|min:5|max:30',
            ]);
            
           if($validator->fails()){
               return $this->responseWithError('Invalid Credentials', $validator->errors(), 422);
                // return response()->json($validator->errors(), 422);
            }

            $credentials = $request->only('email', 'password');
            
            try {
                if (! $token = JWTAuth::attempt($credentials)) {
                    return $this->responseWithError('Invalid Credentials');
                }
            } catch (JWTException $e) {
                return $this->responseWithError('could_not_create_token');
            
            } catch (ThrottlingException $e) {
                return $this->responseWithError("Suspicious activity has occured on your IP address and you have been denied access for another ". $e->getDelay() ." second(s)",[], 500);

            } catch (NotActivatedException $e) {
                return $this->responseWithError('You account is not active yet. Please check your mail');
            
            } catch (Exception $e) {
                return $this->responseWithError('Something want wrong',[], 500);
            }

            return $this->responseWithSuccess('Successfully Login',$token);
    }

    public function register(Request $request)
    {
        // return $request;
        // return Config::get('app.locale');
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|unique:users|max:255',
                // 'user_role' => 'required|min:2|max:30',
                'password' => 'confirmed|required|min:5|max:30',
                'password_confirmation' => 'required|min:5|max:30'
            ]);
            

            if($validator->fails()){
                // return $validator->getMessageBag()->all();
                
                return $this->responseWithError('Invalid Credentials', $validator->errors(), 422);
            }
            $user= User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            return $this->responseWithSuccess( 'Registration Successful',$user);

    }

    public function getAuthenticatedUser()
    {
                try {
                    if (! $user = JWTAuth::parseToken()->authenticate()) {
                        return response()->json(['user_not_found'], 404);
                    }

                } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
                    return response()->json(['token_expired'], $e->getStatusCode());
                } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
                    return response()->json(['token_invalid'], $e->getStatusCode());
                } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {
                    return response()->json(['token_absent'], $e->getStatusCode());
                }
                return $this->responseWithSuccess('Success',$user);
    }

    public function logout()
    {  
            try {
                JWTAuth::invalidate(JWTAuth::getToken());
                return $this->responseWithSuccess('Logout Successfully');
            } catch (JWTException $e) {
                JWTAuth::unsetToken();
                // something went wrong tries to validate a invalid token
                return $this->responseWithError(__('Error','Failed to logout, please try again.'));
                // return response()->json(['message' => 'Failed to logout, please try again.']);
            }
    }





    public function updateUserInfo(Request $request, $id)
    {
            $validator = Validator::make($request->all(), [
                'first_name' => 'required',
                'last_name' => 'required|min:2|max:30'
            ]);

            if($validator->fails()){
                return $this->responseWithError('Invalid Credentials', $validator->errors(), 422);
            }

            $user = User::find($id);
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->image_id = $request->image_id;
            $user->newsletter_enable = $request->newsletter_enable;
            $user->save();

            return $this->responseWithSuccess(__('successfully_updated'),$user);

    }

    public function changePassword(Request $request)
        {
            $validator = Validator::make($request->all(), [
                'old_password' => 'required',
                'password' => 'required|min:2|max:30'
            ]);

            if($validator->fails()){
                return $this->responseWithError('Invalid Credentials', $validator->errors(), 422);
            }

            $hasher = Sentinel::getHasher();

            $oldPassword = $request->old_password;
            $password = $request->password;
            $passwordConf = $request->password_confirmation;

            $user = Sentinel::getUser();

            if (!$hasher->check($oldPassword, $user->password) || $password != $passwordConf) {
                
                // return $this->responseWithError(__('please_check_again'),$user);
                return $this->responseWithError(__('please_check_again'), $user, 422);
            }

            Sentinel::update($user, array('password' => $password));

            return $this->responseWithSuccess(__('successfully_updated'),$user);
        }




    public function test(Request $request){
        return 'ok';
    }

    public function menuList(){
        $menus=Menu::orderBy('id','ASC')->where('status',1)->get();
        $menuList=[]; 
        if(count($menus)==0){
            $menu['id']                          = '';
            $menu['name']                        = '';
            $menu['status']                      = '';
            $menu['description']                 = '';
            $menu['image']                       = '';
            $menu['error']                       = true;

            $menuList[]=$menu;
        }else{     
            foreach($menus as $menuItem){
           
 
                $menu['id']                          = $menuItem->id;
                $menu['name']                        = $menuItem->name;
                $menu['status']                      = $menuItem->status;
                $menu['description']                 = $menuItem->description;
                
                if($menuItem->image != null){
                    $menu['image']                   = URL::to("/").'/'.$menuItem->image;
                }else{
                    $menu['image']                   = asset('default-image/default.jpg');
                }
                $menu['error']                       = false;
                $menuList[]=$menu;
            }
            
        }
        

        return $menuList;

    }
    public function diseaseByMenu($menu_id){
        $diseases=Disease::where('menu_id',$menu_id)->get();

        $diseaseList=[]; 
        if(count($diseases)==0){
            $disease['id']                          = '';
            $disease['name']                        = '';
            $disease['status']                      = '';
            $disease['type']                        = '';
            $disease['image']                       = '';
            $disease['error']                       = true;

            $diseaseList[]=$disease;
        }else{     
            foreach($diseases as $diseaseItem){
           
 
                $disease['id']                          = $diseaseItem->id;
                $disease['name']                        = $diseaseItem->name;
                $disease['status']                      = $diseaseItem->status;
                $disease['type']                        = $diseaseItem->type;
                
                if($diseaseItem->image != null){
                    $disease['image']                   = URL::to("/").'/'.$diseaseItem->image;
                }else{
                    $disease['image']                   = asset('default-image/default.jpg');
                }
                $disease['error']                       = false;
                $diseaseList[]=$disease;
            }
            
        }
        

        return $diseaseList;
    }
    public function treatmentByDisease($menu_id,$disease_id){
        $treatments=Treatment::where('disease_id',$disease_id)->get();

        $treatmentList=[]; 
        if(count($treatments)==0){
            $treatment['id']                          = '';
            $treatment['amount']                      = '';
            $treatment['fertilizer']                  = '';
            $treatment['pesticides']                  = '';
            $treatment['description']                 = '';
            $treatment['error']                       = true;

            $treatmentList[]=$treatment;
        }else{    
            foreach($treatments as $treatmentItem){
           
                $treatment['id']                          = $treatmentItem->id;
                $treatment['amount']                      = $treatmentItem->amount;
                $treatment['fertilizer']                  = $treatmentItem->fertilizer;
                $treatment['pesticides']                  = $treatmentItem->pesticides;
                $treatment['description']                 = $treatmentItem->description;
                $treatment['error']                       = false;
                $treatmentList[]=$treatment;
            }
            
        }
        
        return $treatmentList;
    }

}
