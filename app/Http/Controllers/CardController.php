<?php

namespace App\Http\Controllers;
use App\Models\Card;
use App\Models\User;
use App\Models\SocialLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use QrCode;

class CardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['store','username']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Card::latest()->get();
        return view('admin.card.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.card.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email|string|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
        
        $user =  User::create([
            'name' => $request->first_name . ' '. $request->last_name ,
            'email' => $request->email,
            'role' => 'user',
            'password' => Hash::make($request->password),
        ]);

        $card = New Card;
        $card->user_id = $user->id;
        $card->first_name = $request->first_name;
        $card->last_name = $request->last_name;
        $card->email = $request->email;
        $card->cover_photo = 1;
        if ($card->save()) {
            $name = strtolower($card->first_name);
            $card->user_name = sprintf($name.'%04d', $card->id);
        }
        $card->save();

        $to = 'support@nfc.bz';
        $subject = 'Your Smart Card Info';
        $message = 'Your Smart link '. route('card.username',$card->user_name);
        mailSend($subject,$message,$to);
        return redirect()->route('card.index')->with('message', 'New Account successfully created!');   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $socialLink=SocialLink::all();
        $card = Card::where('user_id',auth()->user()->id)->first();
        return view('admin.card.show',compact('card','socialLink'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function edit(Card $card)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'nullable|email',
            'phone' => 'nullable|string',
            'photo' => 'nullable|mimes:jpeg,jpg,png',
        ]);
        $data = Card::find($id);
        $data->first_name = $request->first_name;
        $data->last_name = $request->last_name;
        $data->email = $request->email;
        $data->designation = $request->designation;
        $data->phone = $request->phone;
        if($request->hasFile('photo')){
            $data->photo = $request->photo->store('uploads/card');
        }
        $data->cover_photo = $request->cover_photo;
        $data->description = $request->description;
        $data->conpany_name = $request->conpany_name;

        $data->link_2 = $request->link_2;
        $data->link_3 = $request->country_code;


        $linkdata1['key'] =  $request->type1;
        $linkdata1['link'] =  $request->link1;
        $data->link_1 = json_encode($linkdata1);

        $linkdata2['key'] =  $request->type2;
        $linkdata2['link'] =  $request->link2;
        $data->link_4 = json_encode($linkdata2);

        $linkdata3['key'] =  $request->type3;
        $linkdata3['link'] =  $request->link3;
        $data->link_5 = json_encode($linkdata3);

        $linkdata4['key'] =  $request->type4;
        $linkdata4['link'] =  $request->link4;
        $data->link_6 = json_encode($linkdata4);


        $data->save();
        return redirect()->back()->with('message', 'Form successfully submitted!');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function destroy(Card $card)
    {
        $card->user->delete();
        $card->delete();
        return back();
    }

    public function username($username='')
    {
        if(empty($username))
        {
            return redirect(url('login'))->with('message', 'Please login again.');
        }
        $card = Card::where('user_name',$username)->first();
        return view('cardView',compact('card'));
    }

}
