<?php

namespace App\Http\Controllers\Web\Forms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Contact;
use App\Mail\AdminNotification;
use App\Mail\AdminNotifications;
use App\Mail\ContactUs as MailContactUs;
use App\Mail\CustomQuote;
use App\Mail\ProductQuote as MailProductQuote;
use App\Mail\RequestCallBack;
use App\Models\Quote;
use App\Models\Product;
use App\Models\Callback;
use App\Models\ProductQuote;
use Illuminate\Support\Facades\Validator;

class FormController extends Controller
{
    public function callBack(){
        // return $request;
        return view('web.forms.callback');
    }
    public function storeCallback(Request $request){
        // return $request;
        $validate = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric'
        ]);
        if($validate->fails()){
            return redirect()->back()->with('error',$validate->errors()->all()[0])->withInput();
        }
        // return $request->all();
        $callback = new Callback();
        $callback->name = $request->name;
        $callback->email = $request->email;
        $callback->phone = $request->phone;
        $callback->save();

        Mail::to('info@customcmykboxes.com')->send(new RequestCallBack($callback));

        return redirect()->to('/thank-you');
    }


    // Contact form View

    public function contactUs(){
        return view('web.forms.contactus');
    }


    // store contact form


    public function storeContact(Request $request)
    {
        // return $request;
        $validate = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required'
        ]);
        if($validate->fails()){
            return redirect()->back()->with('error',$validate->errors()->all()[0])->withInput();
        }
        // return $request->all();
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->save();

        Mail::to('info@customcmykboxes.com')->send(new MailContactUs($contact));

        return redirect()->to('/thank-you');
    }



    public function storeGetQuote(Request $request){
        // return $request;

        $validate = Validator::make($request->all(),[
            'name' =>       'required',
            'email' =>      'required|email',
            'phone' =>      'required|numeric',
            'color' =>     'required',
            'length' =>     'required',
            'width' =>      'required',
            'height' =>     'required',

        ]);
        if($validate->fails()){
            return redirect()->back()->with('error',$validate->errors()->all()[0])->withInput();
        }

        $data = $request->all();

        if($request->file('image')){

            $file = $request->file('image') ;
            $fileName = $file->getClientOriginalName() ;
            $destinationPath = public_path().'/forms/getQuote' ;
            $file->move($destinationPath,$fileName);
            $data['image'] = 'public/forms/getQuote'.$fileName;
        }
        else{
            $data['image'] = 'No Image';
        }

        // return "Image saved";


        $quote = new Quote();
        $quote->name = $request->name;
        $quote->email = $request->email;
        $quote->phone = $request->phone;
        $quote->image = $data['image'];
        $quote->subject = $request->subject;
        $quote->additional = $request->subject;
        $quote->length	= $request->length;
        $quote->width	= $request->width;
        $quote->height	= $request->height;
        $quote->quantity	= $request->quantity;
        $quote->color	= $request->color;
        $quote->message	= $request->message;
        $quote->save();


        // return 'data saved';


        Mail::to('info@customcmykboxes.com')->send(new CustomQuote($quote));
        // return "form submit";
        return redirect()->to('/thank-you');
    }

    public function productQuote(Request $request){

        // return $request;
        $validate = Validator::make($request->all(),[
            'product_id' => 'required',
            'length'  => 'required|numeric',
            'width' => 'required |numeric',
            'depth' => 'required |numeric',
            'unit'  => 'required ',
            'quantity' => 'required|numeric',
            'name' => 'required',
            'email' => 'required',
            'number' => 'required |numeric',
            'specification' => 'required'
        ]);
        if($validate->fails()){
            return redirect()->back()->with('error',$validate->errors()->all()[0])->withInput();
        }
        // return $request;
        //create a Product_Quote object and add data into the database.
        $ProductQuote = new ProductQuote();
        $ProductQuote->product_id = $request->product_id;
        $ProductQuote->length = $request->length;
        $ProductQuote->width  = $request->width;
        $ProductQuote->depth  = $request->depth;
        $ProductQuote->unit   = $request->unit;
        $ProductQuote->quantity    =   $request->quantity;
        $ProductQuote->specification   =   $request->specification;
        $ProductQuote->name = $request->name;
        $ProductQuote->email = $request->email;
        $ProductQuote->phone = $request->number;
        $ProductQuote->save();

        // find product through id
        $productName = Product::where('id', $ProductQuote->product_id)->first('prod_title');
        // return $productName;

        //  Mail::to('info@customcmykboxes.com')->send(new MailProductQuote($ProductQuote,$productName));
        // return $data;
        return redirect()->to('/thank-you');

    }
    public function thankyou(){
        return view('web.forms.thankyou');
    }

}
