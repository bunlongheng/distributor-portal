<?php

class DistUsers extends BaseController
{


    public function index($id)
    {
        $dist = Distributor::findOrFail($id);
        $list = DistUser::where('distributor_id', $id)->get();
        return View::make('distusers.index')->with('list', $list)
            ->with('dist', $dist);
    }

    function createForm($id)
    {
        $dist = Distributor::findOrFail($id);
        return View::make('distusers.create')->with('dist', $dist);
    }


    function createFormSubmit($id)
    {
        $dist = Distributor::findOrFail($id);

        $validator = User::validator(Input::all());

        if ($validator->fails()) {
            return Redirect::to('distusers/' . $dist->id . '/create')
                ->withErrors($validator)
                ->withInput(Input::except('logo_path'));

        } else {
            $user = new User;
            $user->firstname = Input::get('firstname');
            $user->lastname = Input::get('lastname');
            $user->username = Input::get('username');
            $user->email = Input::get('email');
            $user->group = Input::get('group');
            $user->type = 'Distributor';
            $user->code = str_random(60);
            $user->active = 0;
            $logo_path = Input::file('logo_path');

            if (Input::hasFile('logo_path')) {

                $file = Input::file('logo_path');
                $destinationPath = base_path() . '/app/files/logo_path/';
                $filename = $file->getClientOriginalName();
                $extention = $file->getClientOriginalExtension();
                $uploadSuccess = $file->move($destinationPath, $filename);
                $user->logo_path = $filename;
            }

            $user->save();

            $distRel = new DistUser();
            $distRel->user_id = $user->id;
            $distRel->distributor_id = $id;
            $distRel->save();

            if (Input::get('send_invitation')) {
                $this->invite($id, $user->id);
            }

            return Redirect::to('/distusers/' . $dist->id)
                ->with('work', 'User account created.');

        }
    }

    function invite($distId, $userId)
    {

        $distributor = Distributor::findOrFail($distId);
        $user = User::findOrFail($userId);


        if ($distributor->type == "OEM") {

            Mail::send('emails.auth.activate_oem', array(
                'link' => URL::route('account-set-password', $user->code),
                'username' => $user->username),
                function ($message) use ($user) {
                    $message->to($user->email, $user->username)
                        ->replyTo('distributor@biossusa.com', 'Bioss Antibodies')
                        ->subject('Welcome to the Bioss Distributor Portal');
                }
            );

        } else {

            Mail::send('emails.auth.activate', array(
                'link' => URL::route('account-set-password', $user->code),
                'username' => $user->username),
                function ($message) use ($user) {
                    $message->to($user->email, $user->username)
                        ->replyTo('distributor@biossusa.com', 'Bioss Antibodies')
                        ->subject('Welcome to the Bioss Distributor Portal');
                }
            );
        }

        // Keep track of sending invitation
        $user->send_invitation = $user->send_invitation + 1;
        $user->save();
    }


    function delete($distId, $userId) {
        DistUser::where('distributor_id', $distId)->where('user_id', $userId)->delete();
        $user = User::find($userId);
        $user->delete();
        return Redirect::to('/distusers/' . $distId)
            ->with('work', 'User has been deleted.');

    }

}